<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sanction extends Model
{
    use HasFactory;

    protected $fillable = [
        'kindness_score',
        'user_id',
        'start_ban_time',
        'end_ban_time',
        'report_id',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user() : BelongsTo  {
        return $this->belongsTo(User::class);
    }

    public function report() : BelongsTo {
        return $this->belongsTo(Report::class);
    }
}
