<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestUserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailInfo)
    {
        $this->emailInfo = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
  
            return $this->subject('Mail from Azhar.com')
                        ->view('backEnd.message.message-manage',);
    }
}
