<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\PreRegister;
use App\Events\RegisterNewUser;
class SendNotificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $preregister;
    public $hash;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(PreRegister $preregister,$hash)
    {
        $this->preregister = $preregister;
        $this->hash = $hash;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        event(new RegisterNewUser($this->preregister,$this->hash));
    }
}
