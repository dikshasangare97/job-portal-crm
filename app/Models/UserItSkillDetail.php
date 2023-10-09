<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserItSkillDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'key_skill_id',
        'software_version',
        'last_used',
        'experience_year',
        'experience_month',
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
