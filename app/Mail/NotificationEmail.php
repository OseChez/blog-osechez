<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\PreRegister;
class NotificationEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $preregister;
    public $hash;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PreRegister $preregister,$hash)
    {
        $this->preregister = $preregister;
        $this->hash = $hash;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Te has registrado al blog de Osechez!')
                    ->view('email.notifications.notification_email')
                    ->with(['hash' => $this->hash]);
    }
}
