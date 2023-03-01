<?php

namespace App\Observers;

use App\Models\Pedidos;
use App\Services\SendMailService;
use App\Jobs\SendEmail;

class OrderObserver
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
     * Handle the Pedidos "created" event.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return void
     */
    public function created(Pedidos $pedidos)
    {
        $this->sendMailJobs::dispatch($this->sendMailServices)->onQueue('emails');
    }

    /**
     * Handle the Pedidos "updated" event.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return void
     */
    public function updated(Pedidos $pedidos)
    {
        //
    }

    /**
     * Handle the Pedidos "deleted" event.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return void
     */
    public function deleted(Pedidos $pedidos)
    {
        //
    }

    /**
     * Handle the Pedidos "restored" event.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return void
     */
    public function restored(Pedidos $pedidos)
    {
        //
    }

    /**
     * Handle the Pedidos "force deleted" event.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return void
     */
    public function forceDeleted(Pedidos $pedidos)
    {
        //
    }
}
