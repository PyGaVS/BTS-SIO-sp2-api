<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    use HasFactory;

    protected $hidden = [
        'updated_at',
    ];
    public function user() : BelongsToMany {
        return $this->belongsToMany(User::class);
    }

    public function messages() : HasMany {
        return $this->hasMany(Message::class, 'chat_id');
    }
}
