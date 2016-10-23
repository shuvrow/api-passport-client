<?php

namespace App\Listeners;

use App\Events\HelloEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HelloEventListener implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  HelloEvent  $event
     * @return void
     */
    public function handle(HelloEvent $event)
    {
        
        $this->attempts($event->hello());
    }
}
