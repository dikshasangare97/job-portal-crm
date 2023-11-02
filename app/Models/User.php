<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'contact_number',
        'register_for',
        'company_info_for',
        'company_name',
        'designation',
        'pin_code',
        'street_address',
        'is_active',
        'is_user', // [is_user == 0 -> recruiter]  && [is_user == 1 -> user] && [is_user == 2 -> admin] 
        'profile_img'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userPersonalDetail()
    {
        return $this->hasMany(UserPersonalDetail::class);
    }

    public function userKeySkill()
    {
        return $this->hasMany(UserKeySkill::class);
    }

}
