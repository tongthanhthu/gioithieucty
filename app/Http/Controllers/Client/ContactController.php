<?php

namespace App\Http\Controllers\Client;

use App\Services\ContactService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contacts\SendMailRequest;
use App\Http\Requests\Contacts\ReceiveMailRequest;

class ContactController extends Controller
{
    protected $contactService;
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }
    public function index()
    {
        $data = $this->contactService->getFrirstContact();
        return view('client.page.contacts.index', ['data' => $data]);
    }

    public function sendMail(SendMailRequest $request)
    {
        $request = $request->validated();
        $data = $this->contactService->sendMail($request);
        if ($data){
            return redirect()->back()->with('msgSendMail', __('message.send_mail_success'));
        }else{
            return redirect()->back()->with('msgSendMail', __('message.send_mail_failed'));
        }
    }
    
    public function receiveMail(ReceiveMailRequest $request)
    {
        $request = $request->validated();
        $data = $this->contactService->receiveMail($request);
        if ($data){
            return redirect()->back()->with('msgReceiveMail', __('message.register_mail_success'));
        }else{
            return redirect()->back()->with('msgReceiveMail', __('message.register_mail_failed'));
        }
    }
}
