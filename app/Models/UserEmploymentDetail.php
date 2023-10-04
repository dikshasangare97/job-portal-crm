<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserEmploymentDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'current_employment',
        'employment_type',
        'total_experience_year',
        'total_experience_month',
        'company_name',
        'designation_name',
        'joining_date_year',
        'joining_date_month',
        'salary',
        'skill_used',
        'job_profile',
        'notice_period',
        'worked_till_year',
        'worked_till_month',
        'location',
        'department',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location');
    }

    public function department()
    {
        return $this->belongsTo(Departments::class, 'department');
    }
}
