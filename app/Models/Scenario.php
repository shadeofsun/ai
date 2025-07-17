<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Scenario extends Model
{
    protected $fillable = [
        'user_id',
        'api_key_id',
        'name',
        'description',
        'assistant_1_id',
        'assistant_2_id',
        'assistant_3_id',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function apiKey(): BelongsTo
    {
        return $this->belongsTo(ApiKey::class);
    }

    public function assistant1(): BelongsTo
    {
        return $this->belongsTo(Assistant::class, 'assistant_1_id');
    }

    public function assistant2(): BelongsTo
    {
        return $this->belongsTo(Assistant::class, 'assistant_2_id');
    }

    public function assistant3(): BelongsTo
    {
        return $this->belongsTo(Assistant::class, 'assistant_3_id');
    }

    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }
}