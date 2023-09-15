<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostJob extends Model
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
        'location_id',
        'locality',
        'industry_id',
        'functional_area',
        'role_id',
        'reference_code',
        'vacancy',
        'education_qualification_id',
        'company_name',
        'company_type_id',
        'company_detail',
        'posted_by',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function education()
    {
        return $this->belongsTo(Education::class, 'education_qualification_id');
    }

    public function companyType()
    {
        return $this->belongsTo(CompanyType::class, 'company_type_id');
    }
}
