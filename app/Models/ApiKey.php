<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApiKey extends Model
{
    protected $fillable = [
        'user_id',
        'api_key',
        'organization_id',
        'secret_key',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function assistants(): HasMany
    {
        return $this->hasMany(Assistant::class);
    }

    public function scenarios(): HasMany
    {
        return $this->hasMany(Scenario::class);
    }
}