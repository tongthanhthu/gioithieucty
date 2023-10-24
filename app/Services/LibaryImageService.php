<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Repositories\LibaryImage\LibaryImageRepository;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

/**
 * Class CeoService
 * @package App\Services\CeoService
 */
class LibaryImageService
{

    protected $lybaryImageRepo;
    public function __construct(LibaryImageRepository $lybaryImageRepo)
    {
        $this->lybaryImageRepo = $lybaryImageRepo;
    }

    public function getImage()
    {
        return $this->lybaryImageRepo->get();
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $this->uploadFile($request['files']);
            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();

            return false;
        }
    }

    public function uploadFile($files)
    {
        $dataFile = [];
        foreach ($files as $file) {
            $numberRandom = mt_rand(1, 9999);
            $nameFile     = Carbon::now()->format('ymdHis') . $numberRandom . '.webp';
            $path         = $file->storeAs('public/uploads/lybary_image', $nameFile);
            $dataFile[]   = [
                "image"       => str_replace("public/", '', $path),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ];
        }

        $this->lybaryImageRepo->insert($dataFile);
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $image = $this->lybaryImageRepo->where('id', $id)->first();
            Storage::delete('public/uploads/lybary_image'. $image->image);
            $image->delete();
            DB::commit();

            return redirect()->back()->with('msg', 'Xóa ảnh sản phẩm thành công');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);

            return redirect()->back()->with('msg', 'Đã xảy ra lỗi, vui lòng thử lại');
        }
    }
}
