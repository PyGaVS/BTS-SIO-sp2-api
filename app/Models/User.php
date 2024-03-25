<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Seeders\MessageSeeder;
use Database\Seeders\SanctionSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function region() : BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function chat() : BelongsToMany
    {
        return $this->belongsToMany(Chat::class, 'chat_user', 'user_id', 'chat_id');
    }

    public function certification_request() : BelongsTo
    {
        return $this->belongsTo(CertificationRequest::class);
    }

    public function sanction() : BelongsTo
    {
        return $this->belongsTo(Sanction::class);
    }

    public function message() : BelongsTo
    {
        return $this->belongsTo(Message::class);
    }

//    public function () : BelongsTo
//    {
//        return $this->belongsTo();
//    }
//
//    public function () : BelongsTo
//    {
//        return $this->belongsTo();
//    }
}
