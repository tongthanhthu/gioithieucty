<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CurriculumVitaeService;

/**
 * Class CurriculumVitaeController
 * @package App\Http\Controllers\Admin
 */
class CurriculumVitaeController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(CurriculumVitaeService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $cvs = $this->service->getAll();

        return view('admin.curriculum_vitaes.index', compact('cvs'));
    }

    public function download($id)
    {
        return $this->service->download($id);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }
}
