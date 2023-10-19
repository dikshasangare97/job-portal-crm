<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProjectDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'project_title',
        'project_employment_name',
        'project_client_name',
        'project_status',
        'worked_from_year',
        'worked_from_month',
        'worked_till_year',
        'worked_till_month',
        'project_detail',
        'project_location',
        'project_site',
        'nature_of_employment',
        'team_size',
        'role',
        'role_descripion',
        'skill_used',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'project_location');
    }
}
