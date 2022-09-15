<?php

namespace App\Http\Controllers\Api;

use App\Actions\CreatePostAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

class StorePostController extends Controller
{
    public function __invoke(StorePostRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $post = CreatePostAction::make()->handle($request);

            return response()->json([
                'status' => true,
                'message' => 'Post Created Successfully',
                'data' => $post
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
