<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sanction extends Model
{
    use HasFactory;

    protected $hidden = [
        'updated_at',
        'created_at'
    ];


    public function user() : BelongsTo  {
        return $this->belongsTo(User::class);
    }
}
