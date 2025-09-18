<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeneficiareFacilities extends Model
{
    protected $fillable = [
        'academic_session',
        'beneficiarie_id',
        'survey_id',
        'facilities',
        'facilities_category',
        'distribute_place',
        'distribute_date',
        'facilities_status',
        'pending_reason',
        'distribute_by',
        'status'
    ];

    public function survey()
    {
        return $this->belongsTo(BeneficiareSurvey::class, 'survey_id');
    }

    public function beneficiarie()
    {
        return $this->belongsTo(Beneficiarie::class, 'beneficiarie_id');
    }
}
