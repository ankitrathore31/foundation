<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beneficiarie extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'identity_no',
        'identity_type',
        'id_document',
        'academic_session',
        'application_date',
        'application_no',
        'registration_date',
        'registration_no',
        'reg_type',
        'name',
        'dob',
        'gender',
        'phone',
        'email',
        'gurdian_name',
        'mother_name',
        'village',
        'post',
        'block',
        'district',
        'state',
        'pincode',
        'country',
        'religion',
        'religion_category',
        'caste',
        'occupation',
        'eligibility',
        'marital_status',
        'area_type',
        'help_needed',
        'image',
        'by',
        'status',
        'survey_status',
        'delete_reason',
        'delete_date',
    ];

    public function Surveys()
    {
        return $this->hasMany(BeneficiareSurvey::class, 'beneficiarie_id');
    }
    public function facilities()
    {
        return $this->hasMany(BeneficiareFacilities::class, 'beneficiarie_id');
    }
}
