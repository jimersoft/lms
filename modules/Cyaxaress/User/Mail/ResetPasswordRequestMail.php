<?php

namespace Cyaxaress\User\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $code;
    public function __construct($code)
    {
       $this->code=$code;
        //you will receive  a code   from VerifyMailNotification.php : return (new VerifyCodeMail($code)
        //Also here we need to declare $code Method  :   public $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('User::mails.verify-mail')->
        subject('وب اموز | ایلیل فعال سازی');
    }
}
