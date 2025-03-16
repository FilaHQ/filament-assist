<?php

namespace FilaHQ\FilamentAssist\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Assist extends Model
{
    protected $fillable = ["title", "source", "type", "content", "user_id"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
