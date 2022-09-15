<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $title
 * @property string $description
 * @property User $author
 * @property Website $website
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author_id',
        'website_id'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'author_id');
    }

    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }
}
