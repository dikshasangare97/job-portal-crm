<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationStatusLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'job_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function job()
    {
        return $this->belongsTo(PostJob::class, 'job_id');
    }

    public function applicationJobStatus()
    {
        return $this->belongsTo(ApplicationStatus::class, 'status');
    }
}
