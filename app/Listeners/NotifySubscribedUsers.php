<?php

namespace App\Listeners;

use App\Events\NewPostPublished;
use App\Jobs\SendSubscriberEmail;
use App\Mail\PostCreatedMail;
use App\Models\Delivery;
use App\Models\Subscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotifySubscribedUsers implements ShouldQueue
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
     * @param NewPostPublished $event
     * @return void
     */
    public function handle(NewPostPublished $event)
    {
        $subscriptions = $event->post->website->subscriptions();

        $subscriptions->each(function (Subscription $subscription) use ($event) {
            SendSubscriberEmail::dispatch($subscription, $event->post);
        });
    }
}
