<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $mailContent;

    public function __construct($mailContent)
    {
        $this->mailContent = $mailContent;
    }

    public function build()
    {
        return $this->subject('Your Job Post in Felance is approved')
            ->view('emails.job-approved');
    }
}
