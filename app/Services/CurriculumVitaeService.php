<?php

namespace App\Services;


use App\Models\CurriculumVitae;
use App\Repositories\CurriculumVitae\CurriculumVitaeRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Class CurriculumVitaeService
 * @package App\Services\CurriculumVitaeService
 */
class CurriculumVitaeService
{
    protected $curriculumVitaeRepository;

    public function __construct(CurriculumVitaeRepository $curriculumVitaeRepository)
    {
        $this->curriculumVitaeRepository = $curriculumVitaeRepository;
    }
    public function getAll()
    {
        return $this->curriculumVitaeRepository->orderByDesc('created_at')->paginate(20);
    }

    public function getAllCount()
    {
        return $this->curriculumVitaeRepository->count();
    }

    public function download($id)
    {
        $cv = $this->curriculumVitaeRepository->find($id);
        if ($cv['path']){
            $filePath = "public/" . $cv['path'];
            return Storage::download($filePath);
        }else{
            return redirect()->back()->with('msg', 'Tải file thất bại');;
        }
    }

    public function delete($id)
    {
        $curriculumVitae = $this->curriculumVitaeRepository->find($id);
        if (!$curriculumVitae) {
            return redirect(route('admin.curriculum_vitaes.index'))->with('msg', 'Không tìm thấy CV');
        }
        Storage::delete('public/'. $curriculumVitae['path']);
        $curriculumVitae->delete();

        return redirect()->back()->with('msg', 'Xóa CV thành công');
    }
}
