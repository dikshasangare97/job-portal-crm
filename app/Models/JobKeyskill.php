<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobKeyskill extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'key_skill_id',
    ];

    public function postjob()
    {
        return $this->belongsTo(PostJob::class, 'job_id');
    }

    public function keyskill()
    {
        return $this->belongsTo(KeySkill::class, 'key_skill_id');
    }
}
