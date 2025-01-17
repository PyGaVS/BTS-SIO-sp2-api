<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Report extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'purpose',
        'content',
        'importance_rate',
        'message_id'
    ];

    public function message() : BelongsTo  {
        return $this->belongsTo(Message::class);
    }

    public function sanction() : HasMany {
        return $this->hasMany(Sanction::class);
    }
}
