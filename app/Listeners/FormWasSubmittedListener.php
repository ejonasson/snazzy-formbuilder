<?php

namespace App\Listeners;

use App\Events\FormWasSubmited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormWasSubmittedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  FormWasSubmited  $event
     * @return void
     */
    public function handle(FormWasSubmited $event)
    {
        //
    }
}
