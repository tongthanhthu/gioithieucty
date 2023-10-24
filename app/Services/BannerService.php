<?php

namespace App\Services;


use App\Models\Banner;
use App\Models\Product;
use App\Repositories\Banner\BannerRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

/**
 * Class BannerService
 * @package App\Services\BannerService
 */
class BannerService
{
    protected $bannersRepository;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(BannerRepository $bannersRepository)
    {
        $this->bannersRepository = $bannersRepository;
    }
    public function getAll()
    {
        return $this->bannersRepository->orderByDesc('created_at')->paginate(20);
    }

    public function get($id)
    {
        return $this->bannersRepository->where('id', $id)->first();
    }

    public function add($request)
    {
        DB::beginTransaction();
        try {
            $request['image'] = $this->uploadFile($request['file']);
            $request['status'] = true;
            $this->bannersRepository->create($request);
            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);

            return false;
        }
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            if (array_key_exists('file', $request)){
                $file['file'] = $request['file'];
                unset($request['file']);
                $image = $this->bannersRepository->where('id', $id)->first('image');
                Storage::delete('public/'. $image['image']);
                $request['image'] = $this->uploadFile($file['file']);
            }

            $request['status'] = array_key_exists('status', $request) ? true : false;
            $this->bannersRepository->where('id', $id)->update($request);
            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);

            return false;
        }
    }

    public function uploadFile($file)
    {
        $typeFile     = $file->getClientOriginalExtension();
        $fullNameFile = str_replace("." . $typeFile, '', $file->getClientOriginalName());
        $numberRandom = mt_rand(1, 9999);
        $nameFile     = Carbon::now()->format('ymdHis') . $numberRandom . '.webp';
        $path         = $file->storeAs('public/uploads/banners', $nameFile);

        return str_replace("public/", '', $path);
    }

    public function delete($id)
    {
        $banner = $this->bannersRepository->find($id);
        if (!$banner) {
            return redirect(route('admin.banners.index'))->with('msg', 'Không tìm thấy banner');
        }
        Storage::delete('public/'. $banner['image']);
        $banner->delete();

        return redirect()->back()->with('msg', 'Xóa sản phẩm thành công');
    }
}
