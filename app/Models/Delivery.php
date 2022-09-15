<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Delivery extends Model
{
    use HasFactory;

    protected $primaryKey = null;
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'subscription_id',
        'post_id',
        'delivered_at',
    ];

    protected $dates = [
        'delivered_at',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }
}
