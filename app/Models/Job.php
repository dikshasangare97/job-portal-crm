<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'job_headline',
        'employment_type',
        'job_description',
        'key_skill',
        'work_experience',
        'annual_salary',
        'salary_hide_status',
        'location',
        'locality',
        'industry',
        'functional_area',
        'role',
        'reference_code',
        'vacancy',
        'education_qualification',
        'company_name',
        'company_detail',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
