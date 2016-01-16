<?php

namespace App\Events;

use App\Events\Event;
use App\Form;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class FormWasSubmited extends Event
{
    use SerializesModels;

    public $form;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
