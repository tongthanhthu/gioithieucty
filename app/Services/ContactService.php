<?php

namespace App\Services;

use App\Mail\ContactMail;
use App\Repositories\Contact\ContactRepository;
use App\Repositories\ReceiveEmail\ReceiveEmailRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/**
 * Class ContactService
 * @package App\Services\ContactService
 */
class ContactService
{
    protected $contactRepository, $receiveRepo;

    public function __construct(ContactRepository $contactRepository , ReceiveEmailRepository $receiveRepo) {
        $this->contactRepository = $contactRepository;
        $this->receiveRepo = $receiveRepo;
    }

    public function getFrirstContact()
    {
        return $this->contactRepository->first();
    }

    public function store($params)
    {
        return $this->contactRepository->create($params);
    }

    public function update($id, $params)
    {
        return $this->contactRepository->update($id, $params);
    }

    public function sendmail($request)
    {
        try {
            $contact =  $this->getFrirstContact();
            if(isset($contact) && isset($contact->email)){
                Mail::to($contact->email)->send(new ContactMail($request));
                return true;
            }
            return false;
        }catch (\Exception $e){
            Log::info($e);
            return false;
        }
    }

    // receiveMail
    public function receiveMail($params)
    {
        return $this->receiveRepo->create($params);
    }
}
