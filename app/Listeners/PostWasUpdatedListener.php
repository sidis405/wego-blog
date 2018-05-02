<?php

namespace App\Listeners;

use App\User;
use App\Events\PostWasUpdated;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyAdminPostWasUpdated;

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
        $admin = User::where('role', 'admin')->first(); //recipient

        Mail::to($admin)->send(new NotifyAdminPostWasUpdated($event->post));
    }
}
