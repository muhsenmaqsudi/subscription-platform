<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 * @property string $url
 * @property Collection<Subscription> $subscriptions
 * @property Collection<Post> $posts
 */
class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
    ];

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
