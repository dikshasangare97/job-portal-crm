<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationStatusLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'job_apply_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jobApply()
    {
        return $this->belongsTo(JobApply::class, 'job_apply_id');
    }

    public function applicationJobStatus()
    {
        return $this->belongsTo(ApplicationStatus::class, 'status');
    }
}
