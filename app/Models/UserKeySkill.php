<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKeySkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'key_skill_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function keySkill()
    {
        return $this->belongsTo(KeySkill::class, 'key_skill_id');
    }
}
