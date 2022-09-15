<?php

namespace App\Actions;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Models\Website;
use Illuminate\Database\Eloquent\Model;

class CreateWebsiteSubscriptionAction extends Action
{
    public function handle(StoreSubscriptionRequest $request): Model|Website
    {
        /** @var Website $website */
        $website = Website::query()->findOrFail($request->website());
        return $website->subscriptions()->create([
            'email' => $request->email()
        ]);
    }
}
