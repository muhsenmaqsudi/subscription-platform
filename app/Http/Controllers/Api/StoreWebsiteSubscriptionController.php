<?php

namespace App\Http\Controllers\Api;

use App\Actions\CreateWebsiteSubscriptionAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriptionRequest;

class StoreWebsiteSubscriptionController extends Controller
{
    public function __invoke(StoreSubscriptionRequest $request)
    {
        try {
            $subscription = CreateWebsiteSubscriptionAction::make()->handle($request);

            return response()->json([
                'status' => true,
                'message' => 'You have successfully subscribed to a website',
                'data' => $subscription
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
