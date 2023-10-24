<?php

namespace App\Services;


use App\Models\Image;
use App\Models\Product;
use App\Repositories\Image\ImageRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

/**
 * Class ImagesService
 * @package App\Services\ImagesService
 */
class ImagesService
{
    protected $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $image = $this->imageRepository->where('id', $id);
            $name = $image->first('name')['name'];
            $image->delete();
            Storage::delete('public/uploads/products/'. $name);
            DB::commit();

            return redirect()->back()->with('msg', 'Xóa ảnh sản phẩm thành công');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);

            return redirect()->back()->with('msg', 'Đã xảy ra lỗi, vui lòng thử lại');
        }
    }

    public function deleteAll($idParent, $nametable)
    {
        DB::beginTransaction();
        try {
            $image = $this->imageRepository->where('table_id', $idParent)->where('table_name', $nametable);
            $names = $image->pluck('name');
            $image->delete();
            foreach ($names as $name){
                Storage::delete('public/uploads/products/'. $name);
            }
            DB::commit();

            return redirect()->back()->with('msg', 'Xóa ảnh sản phẩm thành công');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);

            return redirect()->back()->with('msg', 'Đã xảy ra lỗi, vui lòng thử lại');
        }
    }
}
