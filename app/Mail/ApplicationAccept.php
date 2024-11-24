<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationAccept extends Mailable
{
    use Queueable, SerializesModels;

    public $mailContent;

    public function __construct($mailContent)
    {
        $this->mailContent = $mailContent;
    }

    public function build()
    {
        return $this->subject('Application Accepted')
            ->view('emails.applicationAccept');
    }
}
