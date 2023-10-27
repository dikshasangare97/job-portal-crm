<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCompanyDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'company_type_id',
        'industry_type_id',
        'contact_person',
        'contact_person_designation',
        'website_url',
        'phone_number_1',
        'phone_number_2',
        'fax_number',
        'pan_number',
        'pan_number_name',
        'address_label',
        'company_address',
        'country',
        'state',
        'city',
        'company_pincode',
        'gstin_number',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function companyType()
    {
        return $this->belongsTo(CompanyType::class, 'company_type_id');
    }

    public function industryType()
    {
        return $this->belongsTo(Industry::class, 'industry_type_id');
    }
}
