<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Assistant extends Model
{
    protected $fillable = [
        'user_id',
        'api_key_id',
        'assistant_id',
        'name',
        'alphanumeric_name',
        'instructions',
        'model',
        'tools',
        'metadata'
    ];

    protected $casts = [
        'tools' => 'array',
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

    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }
}