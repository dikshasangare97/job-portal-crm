<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPersonalDetail extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'user_id',
        'name',
        'date_of_birth',
        'gender',
        'marital_status',
        'category',
        'differently_abled',
        'career_break',
        'work_permit_usa',
        'work_permit_country',
        'permanent_address',
        'hometown',
        'pincode',
        'total_experience_year',
        'total_experience_month',
        'current_salary',
        'current_location',
        'current_location_name',
        'notice_period',
        'resume',
        'resume_headline',
        'profile_summary',
        'industry_id',
        'department_id',
        'role_category_id',
        'job_role_id',
        'desired_job_type',
        'desired_employment_type',
        'preferred_shift',
        'preferred_work_location',
        'expected_salary',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

    public function department()
    {
        return $this->belongsTo(Departments::class, 'department_id');
    }

    public function roleCategory()
    {
        return $this->belongsTo(Role::class, 'role_category_id');
    }

    public function jobRole()
    {
        return $this->belongsTo(JobRole::class, 'job_role_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'preferred_work_location');
    }
}
