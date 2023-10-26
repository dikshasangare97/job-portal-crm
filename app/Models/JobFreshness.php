<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobFreshness extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'last_day_number',
        'status'
    ];

}
