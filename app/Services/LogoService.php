<?php

namespace App\Services;

use App\Models\Logo;
use App\Repositories\Logo\LogoRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

/**
 * Class LogoService
 * @package App\Services\LogoService
 */
class LogoService
{
    protected $logoRepository;

    public function __construct(LogoRepository $logoRepository)
    {
        $this->logoRepository = $logoRepository;
    }
    public function getAll()
    {
        return $this->logoRepository->orderByDesc('created_at')->paginate(20);
    }

    public function get($id)
    {
        return $this->logoRepository->where('id', $id)->first();
    }

    public function add($request)
    {
        DB::beginTransaction();
        try {
            $request['image'] = $this->uploadFile($request['file']);
            $request['icon'] = $this->uploadIcon($request['icon']);
            $request['image_share'] = $this->uploadImageShare($request['image_share']);
            $request['status'] = false;
            $this->logoRepository->create($request);
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
                $image = $this->logoRepository->where('id', $id)->first('image');
                Storage::delete('public/'. $image['image']);
                $request['image'] = $this->uploadFile($file['file']);
            }

            if (array_key_exists('icon', $request)){
                $file['icon'] = $request['icon'];
                unset($request['icon']);
                $image = $this->logoRepository->where('id', $id)->first('icon');
                Storage::delete('public/'. $image['icon']);
                $request['icon'] = $this->uploadIcon($file['icon']);
            }
            
            if (array_key_exists('image_share', $request)){
                $file['image_share'] = $request['image_share'];
                unset($request['image_share']);
                $image = $this->logoRepository->where('id', $id)->first('image_share');
                Storage::delete('public/'. $image['image_share']);
                $request['image_share'] = $this->uploadImageShare($file['image_share']);
            }

            $request['status'] = array_key_exists('status', $request) ? true : false;
            if ($request['status'] == true){
                Logo::query()->update([
                    'status' => false
                                      ]);
            }
            $this->logoRepository->where('id', $id)->update($request);
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
        $path         = $file->storeAs('public/uploads/logo', $nameFile);

        return str_replace("public/", '', $path);
    }

    public function uploadIcon($file)
    {
        // $typeFile     = $file->getClientOriginalExtension();
        // $fullNameFile = str_replace("." . $typeFile, '', $file->getClientOriginalName());
        // $numberRandom = mt_rand(1, 9999);
        $nameFile     = Carbon::now()->format('ymdHis') . $file->getClientOriginalName();
        $path         = $file->storeAs('public/uploads/logo', $nameFile);

        return str_replace("public/", '', $path);
    }

    public function uploadImageShare($file)
    {
        $nameFile     = Carbon::now()->format('ymdHis') . $file->getClientOriginalName();
        $path         = $file->storeAs('public/uploads/logo', $nameFile);

        return str_replace("public/", '', $path);
    }

    public function delete($id)
    {
        $logo = $this->logoRepository->find($id);
        if (!$logo) {
            return redirect(route('admin.logos.index'))->with('msg', 'Không tìm thấy Logo');
        }
        Storage::delete('public/'. $logo['image']);
        $logo->delete();

        return redirect()->back()->with('msg', 'Xóa logo thành công');
    }
}
