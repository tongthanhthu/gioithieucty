<?php

namespace App\Services;


use App\Models\Image;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\Image\ImageRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Categories\CategoriesRepository;

/**
 * Class ProductService
 * @package App\Services\ProductService
 */
class ProductService
{
    protected $productRepository;
    protected $categoriesRepository;
    protected $imageRepository;
    public function __construct(ProductRepository $productRepository, CategoriesRepository $categoriesRepository, ImageRepository $imageRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoriesRepository = $categoriesRepository;
        $this->imageRepository = $imageRepository;
    }
    public function getAll($params = null)
    {
        return $this->productRepository->when($params, function ($q) use ($params) {
            if (isset($params['slug'])) {
                $q->whereHas('category', function ($query) use ($params) {
                    $query->where('slug_vi', $params['slug'])->orWhere('slug_en', $params['slug'])
                    ->orWhere('slug_jp', $params['slug'])->orWhere('slug_kr', $params['slug']);
                });
            }
        })->with('image')->orderByDesc('updated_at')->paginate(10);
    }

    public function getAllCount()
    {
        return $this->productRepository->all()->count();
    }

    public function getInHome()
    {
        return $this->productRepository->with('image')->orderByDesc('updated_at')->get();
    }

    public function getById($id)
    {
        return $this->productRepository->where('id', $id)
                      ->with('image', 'images')->first();
    }

    public function get($slug)
    {
        return $this->productRepository->where('slug_vi', $slug)
                      ->orWhere('slug_en', $slug)
                      ->orWhere('slug_jp', $slug)
                      ->orWhere('slug_kr', $slug)
                      ->with('images','category')->first();
    }

    public function getCategory()
    {
        return $this->categoriesRepository->with('products')->orderBy('id')->get();
    }

    public function add($request)
    {
        DB::beginTransaction();
        try {
            $request = $this->handleData($request);
            $newProduct = $this->productRepository->create($request);

            $this->uploadFile($request, $newProduct['id'], 'add');
            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();

            return false;
        }
    }

    public function handleData($request)
    {
        $data[] = array_combine($request['key_vi'], $request['value_vi']);
        $data[] = array_combine($request['key_en'], $request['value_en']);
        $data[] = array_combine($request['key_jp'], $request['value_jp']);
        $data[] = array_combine($request['key_kr'], $request['value_kr']);
        foreach ($data as $index => $infoProduct){
            foreach ($infoProduct as $key => $value){
                if (!$key){
                    unset($infoProduct[$key]);
                }
            }
            if ($index == 0) $request['info_product_vi'] = json_encode($infoProduct);
            if ($index == 1) $request['info_product_en'] = json_encode($infoProduct);
            if ($index == 2) $request['info_product_jp'] = json_encode($infoProduct);
            if ($index == 3) $request['info_product_kr'] = json_encode($infoProduct);
        }

        return $request;
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            if (array_key_exists('files', $request) || array_key_exists('file', $request)) {
                $this->uploadFile($request, $id, 'update');
                unset($request['file'], $request['files']);
            }
            $request = $this->handleData($request);
            unset($request['key_vi'],$request['key_en'],$request['key_jp'],$request['key_kr'],$request['value_vi'],$request['value_en'],$request['value_jp'],$request['value_kr']);

            $request['slug_vi'] = Str::slug($request['name_vi']);
            $request['slug_en'] = Str::slug($request['name_en']);
            $request['slug_jp'] = Str::slug($request['name_en']);
            $request['slug_kr'] = Str::slug($request['name_en']);
            $this->productRepository->where('id', $id)->update($request);
            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);

            return false;
        }
    }

    public function uploadFile($request, $id = null, $action)
    {
        $dataFile = [];
        if (array_key_exists('files', $request)){
            foreach ($request['files'] as $file) {
                $numberRandom = mt_rand(1, 9999);
                $nameFile     = Carbon::now()->format('ymdHis') . $numberRandom . '.webp';
                $path         = $file->storeAs('public/uploads/products', $nameFile);
                $dataFile[]   = [
                    "name"       => $nameFile,
                    "path"       => str_replace("public/", '', $path),
                    "is_default" => false,
                    "table_name" => "products",
                    "table_id"   => $id,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ];
            }
        }

        if (array_key_exists('file', $request)){
            $numberRandom = mt_rand(1, 9999);
            $nameFile     = Carbon::now()->format('ymdHis') . $numberRandom . '.webp';
            $path         = $request['file']->storeAs('public/uploads/products', $nameFile);

            $dataFile[]   = [
                "name"       => $nameFile,
                "path"       => str_replace("public/", '', $path),
                "is_default" => true,
                "table_name" => "products",
                "table_id"   => $id,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ];

            if ($action === 'update'){
                $image = Image::query()->where('table_name', 'products')
                              ->where('table_id', $id)
                              ->where('is_default', true)->first();

                (new ImagesService($this->imageRepository))->delete($image['id']);
                $image->delete();
            }
        }

        $this->imageRepository->insert($dataFile);
    }

    public function delete($id)
    {
        $product = $this->productRepository->find($id);
        if (!$product) {
            return redirect(route('admin.products.index'))->with('msg', 'Không tìm thấy sản phẩm');
        }
        (new ImagesService($this->imageRepository))->deleteAll($id, 'products');
        $product->delete();

        return redirect()->back()->with('msg', 'Xóa sản phẩm thành công');
    }
}
