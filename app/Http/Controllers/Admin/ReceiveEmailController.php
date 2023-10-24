<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Repositories\ReceiveEmail\ReceiveEmailRepository;

class ReceiveEmailController extends Controller
{
    protected $dataRepo;

    public function __construct(ReceiveEmailRepository $dataRepo)
    {
        $this->dataRepo = $dataRepo;
    }

    public function index()
    {
        $data = $this->dataRepo->paginate(20);
        return view('admin.receive_mail.index', compact('data'));
    }

    public function search(Request $request)
    {
    }
}
