<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobRole extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'role_category_id',
        'job_role_name',
        'status'
    ];

    public function roleCategory()
    {
        return $this->belongsTo(Role::class, 'role_category_id');
    }

}
