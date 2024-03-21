<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Chat extends Model
{
    use HasFactory;

    protected $hidden = [
        'updated_at',
        'created_at'
    ];

    public function user() : BelongsToMany {
        return $this->belongsToMany(User::class, 'chat_user');
    }
}
