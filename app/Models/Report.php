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

    public function message() : BelongsTo  {
        return $this->belongsTo(Message::class);
    }

    public function sanction() : HasMany {
        return $this->hasMany(Sanction::class);
    }

    public function report_purpose() : BelongsTo {
        return $this->belongsTo(ReportPurpose::class);
    }



}
