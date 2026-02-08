<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class JobApplicationUserConfirmation extends Mailable
{
    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Application Received – Thank You')
            ->view('emails.job-application-user');
    }
}
