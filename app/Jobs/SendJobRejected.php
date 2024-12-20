<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\JobRejected;

class SendJobRejected implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    // public $mailContent;

    public function __construct()
    {
        // $this->mailContent = $mailContent;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $email = new JobRejected();
        Mail::to('info@larashout.com')->send($email);
    }
}