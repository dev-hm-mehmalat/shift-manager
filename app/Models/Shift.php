<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;  // Wichtig für die Relation

class Shift extends Model
{
    protected $fillable = [
        'user_id', 'type', 'start_time', 'end_time', 'status', 'note'
    ];

    // Damit Laravel start_time und end_time als Carbon-Datetime behandelt
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    // Beziehung zum User (Mitarbeiter)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}