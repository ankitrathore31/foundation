<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeneficiareSurvey extends Model
{
    protected $casts = [
        'surveyfacility_status' => 'array',
    ];

    public function beneficiarie()
    {
        return $this->belongsTo(Beneficiarie::class, 'beneficiarie_id');
    }

    public function facilities()
    {
        return $this->hasMany(BeneficiareFacilities::class, 'survey_id');
    }
}
