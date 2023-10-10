<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLanguageDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'language_name',
        'proficiency',
        'read',
        'write',
        'speak',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
