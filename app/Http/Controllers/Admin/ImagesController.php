<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ImagesService;

/**
 * Class ImagesController
 * @package App\Http\Controllers\Admin
 */
class ImagesController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(ImagesService $service)
    {
        $this->service = $service;
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }
}
