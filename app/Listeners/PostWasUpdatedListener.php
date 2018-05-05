<?php

namespace App\Listeners;

use App\Jobs\NotifyAdmins;
use App\Events\PostWasUpdated;

class PostWasUpdatedListener
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
     * @param  PostWasUpdated  $event
     *
     * @return void
     */
    public function handle(PostWasUpdated $event)
    {
        NotifyAdmins::dispatch($event->post);
    }
}
