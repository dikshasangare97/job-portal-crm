<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KeySkill extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'key_skill_name',
        'status'
    ];
}
