<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecruitmentMail extends Mailable
{
    use Queueable, SerializesModels;

    private $request;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $request = $this->request;
        return $this->from($this->request['email'])
                    ->subject($this->request['title'])
                    ->view('email.recruitment', compact('request'));
    }
}
