<?php

namespace App\Http\Controllers\Api;

use App\Actions\CreateWebsiteAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateWebsiteRequest;
use Illuminate\Http\JsonResponse;

class WebsiteController extends Controller
{
    public function store(CreateWebsiteRequest $request): JsonResponse
    {
        try {
            $website = CreateWebsiteAction::make()->handle($request);

            return response()->json([
                'status' => true,
                'message' => 'Website Created Successfully',
                'data' => $website
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
