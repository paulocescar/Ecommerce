<?php

namespace App\Observers;

use App\Models\user;
use App\Services\SendMailService;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmail;

class UserObserver
{
    private $sendMailServices;
    private $sendMailJobs;

    public function __construct(SendMailService $sendMailService,
    SendEmail $sendMailJobs)
    {
        $this->sendMailServices = $sendMailService;
        $this->sendMailJobs = $sendMailJobs;
    }

    /**
     * Handle the user "created" event.
     *
     * @param  \App\Models\user  $user
     * @return void
     */
    public function created(user $user)
    {
        // $this->sendMailServices->sendMail();
        $this->sendMailJobs::dispatch($this->sendMailServices)->onQueue('emails');
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\Models\user  $user
     * @return void
     */
    public function updated(user $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\Models\user  $user
     * @return void
     */
    public function deleted(user $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\Models\user  $user
     * @return void
     */
    public function restored(user $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\Models\user  $user
     * @return void
     */
    public function forceDeleted(user $user)
    {
        //
    }
}
