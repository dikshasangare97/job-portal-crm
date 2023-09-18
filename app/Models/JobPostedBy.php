<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPostedBy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'posted_by_name',
        'status'
    ];
}
