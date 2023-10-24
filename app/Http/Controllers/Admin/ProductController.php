<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\Image;
use App\Repositories\Image\ImageRepository;
use App\Services\ProductService;

/**
 * Class ProductController
 * @package App\Http\Controllers\Admin
 */
class ProductController extends Controller
{
    protected $service, $imageRepo;

    /**
     * Map model
     * @return mixed
     */
    public function __construct(ProductService $service, ImageRepository $imageRepo)
    {
        $this->service = $service;
        $this->imageRepo = $imageRepo;
    }

    public function index()
    {
        $products = $this->service->getAll();

        return view('admin.products.index', compact('products'));
    }

    public function imageLibrary()
    {
        $images = $this->imageRepo->with('product')->paginate(10);

        return view('admin.image_library.index', compact('images'));
    }

    public function add()
    {
        $categories = $this->service->getCategory();

        return view('admin.products.add', compact('categories'));
    }

    public function postAdd(ProductRequest $request)
    {
        $request = $request->validated();
        // dd(array_combine($request['key_vi'], $request['value_vi']));

        $data = $this->service->add($request);

        if ($data){
            return redirect(route('admin.products.index'))->with('msg', 'Thêm sản phẩm thành công');
        }else{
            return redirect()->back()->with('msg', 'Đã xảy ra lỗi, vui long thử lại');
        }

    }

    public function update($id)
    {
        $product = $this->service->getById($id);

        $categories = $this->service->getCategory();

        return view('admin.products.update', compact('product','categories'));
    }

    public function postUpdate(UpdateProductRequest $request, $id)
    {
        $request = $request->validated();

        $data = $this->service->update($request, $id);

        if ($data){
            return redirect(route('admin.products.index'))->with('msg', 'Cập nhật sản phẩm thành công');
        }else{
            return redirect()->back()->with('msg', 'Đã xảy ra lỗi, vui long thử lại');
        }

    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }
}
