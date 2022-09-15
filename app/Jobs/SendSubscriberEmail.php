<?php

namespace App\Jobs;

use App\Mail\PostCreatedMail;
use App\Models\Delivery;
use App\Models\Post;
use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendSubscriberEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        public Subscription $subscription,
        public Post $post
    ) {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->subscription->email)->send(new PostCreatedMail($this->post));
        Delivery::query()->create([
            'post_id' => $this->post->id,
            'subscription_id' => $this->subscription->id,
            'delivered_at' => now()
        ]);
    }
}
