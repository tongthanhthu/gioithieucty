<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\Http\Request;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Admin
 */
class DashboardController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(DashboardService $service)
    {
        $this->service = $service;
    }

    public function dashboard(Request $request){
        $count = $this->service->getCounts();
        return view('admin.dashboard.index',compact('count'));
    }

    
}
