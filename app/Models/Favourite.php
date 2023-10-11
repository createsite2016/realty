<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MoonShine\Models\MoonshineUser;

class Favourite extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(MoonshineUser::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
