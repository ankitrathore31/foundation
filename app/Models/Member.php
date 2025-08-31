<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
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
        'image',
        'by',
        'status',
        'delete_reason',
        'delete_date',
    ];
}
