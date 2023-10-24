<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contacts\ContactsStoreRequest;
use App\Services\ContactService;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

/**
 * Class ContactController
 * @package App\Http\Controllers\Admin
 */
class ContactController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $contact = $this->service->getFrirstContact();
        return view('admin.contacts.index', compact('contact'));
    }

    public function store(ContactsStoreRequest $request){
        $params = $request->validated();
        try
        {
            $this->service->store($params);
            Flash::success('Thêm mới thành công.');
            return redirect()->route('admin.contacts.index');
        }catch(\Exception $e){
            Flash::success('Thêm mới thất bại.');
            return redirect()->route('admin.contacts.index');
        }
    }

    public function update(ContactsStoreRequest $request, $id)
    {
        $params = $request->validated();
        try
        {
            $this->service->update($params, $id);
            Flash::success('Cập nhật thành công.');
            return redirect()->route('admin.contacts.index');
        }catch(\Exception $e){
            Flash::success('Cập nhật thất bại.');
            return redirect()->route('admin.contacts.index');
        }
    }
}
