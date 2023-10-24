<?php

namespace App\Services;

use App\Models\Benefit;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

/**
 * Class BenefitService
 * @package App\Services\BenefitService
 */
class BenefitService
{
    public function getAll()
    {
        return Benefit::query()->orderByDesc('created_at')->paginate(20);
    }

    public function get($id)
    {
        return Benefit::query()->where('id', $id)->first();
    }

    public function add($request)
    {
        DB::beginTransaction();
        try {
            Benefit::query()->create($request);
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
            Benefit::query()->where('id', $id)->update($request);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);
            return false;
        }
    }


    public function delete($id)
    {
        $benefit = Benefit::find($id);
        if (!$benefit) {
            return redirect(route('admin.benefits.index'))->with('msg', 'Không tìm thấy phúc lợi');
        }
        $benefit->delete();

        return redirect()->back()->with('msg', 'Xóa phúc lợi thành công');
    }
}
