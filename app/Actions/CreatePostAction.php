<?php

namespace App\Actions;

use App\Events\NewPostPublished;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;

class CreatePostAction extends Action
{
    public function handle(StorePostRequest $request): Model|Post
    {
        $post = Post::query()->create([
            'title' => $request->title(),
            'description' => $request->description(),
            'author_id' => auth()->id(),
            'website_id' => $request->website(),
        ]);

        NewPostPublished::dispatch($post);

        return $post;
    }
}
