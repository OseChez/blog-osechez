<?php

namespace App\Listeners;

use App\Events\RegisterNewUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationEmail;
class NotificationSend
{
    /**
     * Create the event listener.
     *
     * @return void
     */
   
   public function __construct(){
      
   }

    /**
     * Handle the event.
     *
     * @param  RegisterNewUser  $event
     * @return void
     */
    public function handle(RegisterNewUser $event)
    {
        Mail::to($event->preregister->email)->send(
           new NotificationEmail($event->preregister, $event->hash)
          );
    }
}
