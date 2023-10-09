<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserEducationDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'education_name',
        'university_name',
        'course_name',
        'specialization_name',
        'course_type',
        'course_duration_to',
        'course_duration_from',
        'grading_system',
        'marks',
        'primary_graduation_status',
        'board_name',
        'passing_out_year',
        'school_medium',
        'total_marks'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
