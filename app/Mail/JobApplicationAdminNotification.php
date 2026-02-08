<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class JobApplicationAdminNotification extends Mailable
{
    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('New Job Application Received')
            ->view('emails.job-application-admin');
    }
}
