<?php

namespace App\Console\Commands;

use App\Jobs\SendSubscriberEmail;
use App\Mail\PostCreatedMail;
use App\Models\Delivery;
use App\Models\Post;
use App\Models\Subscription;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SubscribersPostsEmailSyncCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriber:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Syncs subscribers of a website with new published post that haven\'t received email yet';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $subscriptions = Subscription::all();

        $subscriptions->each(function (Subscription $subscription) {
            $subscription->website->posts()->each(function (Post $post) use ($subscription) {
                if ($subscription->created_at > $post->created_at) {
                    return;
                }

                $isDelivered = Delivery::query()
                    ->where('post_id', $post->id)
                    ->where('subscription_id', $subscription->id)
                    ->exists();

                if ($isDelivered) {
                    return;
                }

                SendSubscriberEmail::dispatch($subscription, $post);
            });
        });

        return Command::SUCCESS;
    }
}
