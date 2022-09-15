<?php

namespace App\Http\Controllers\Api;

use App\Actions\CreateWebsiteAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateWebsiteRequest;
use App\Http\Resources\WebsiteResource;
use App\Models\Website;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WebsiteController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return WebsiteResource::collection(
            Website::query()->paginate()
        );
    }

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
