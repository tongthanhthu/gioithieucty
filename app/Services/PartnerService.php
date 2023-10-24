<?php

namespace App\Services;
use App\Repositories\Partner\PartnerRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;


/**
 * Class PartnerService
 * @package App\Services\PartnerService
 */
class PartnerService
{
    protected $partnerRepo;

    public function __construct(PartnerRepository $partnerRepo)
    {
        $this->partnerRepo = $partnerRepo;
    }

    public function getAll()
    {
        return $this->partnerRepo->paginate(20);
    }

    public function store($params)
    {
        DB::beginTransaction();
        try {
            $params['image'] = $this->uploadFile($params['file']);
            $this->partnerRepo->create($params);
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
        $path         = $file->storeAs('public/uploads/partner', $nameFile);

        return str_replace("public/", '', $path);
    }

    public function getById($id)
    {
        return $this->partnerRepo->find($id);
    }

    public function update($params, $id)
    {
        if (isset($params['file']) && !empty($params['file'])) {
            $oldImage = $this->getById($id)->image;
            if ($oldImage) {
                $this->deleteFile($oldImage);
            }
            $params['image'] = $this->uploadFile($params['file']);
        }
        return $this->getById($id)->update($params);

    }

    public function deleteFile($filePath)
    {
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            return true;
        }

        return false;
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $oldImage = $this->getById($id)->image;
            if ($oldImage) {
                $this->deleteFile($oldImage);
            }
            $this->partnerRepo->delete($id);
            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);

            return false;
        }
    }

}
