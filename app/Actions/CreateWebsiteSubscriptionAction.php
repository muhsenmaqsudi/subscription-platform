<?php

namespace App\Actions;

use App\Http\Requests\StoreWebsiteSubscriptionRequest;
use App\Models\Website;
use Illuminate\Database\Eloquent\Model;

class CreateWebsiteSubscriptionAction extends Action
{
    public function handle(StoreWebsiteSubscriptionRequest $request): Model|Website
    {
        /** @var Website $website */
        $website = Website::query()->findOrFail($request->website());
        return $website->subscriptions()->create([
            'email' => $request->email()
        ]);
    }
}
