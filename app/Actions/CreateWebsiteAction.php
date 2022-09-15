<?php

namespace App\Actions;

use App\Http\Requests\CreateWebsiteRequest;
use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Eloquent\Model;

class CreateWebsiteAction extends Action
{
    public function handle(CreateWebsiteRequest $request): Model|User
    {
        return Website::query()->create([
            'name' => $request->name(),
            'url' => $request->websiteUrl(),
            'owner_id' => auth()->id()
        ]);
    }
}
