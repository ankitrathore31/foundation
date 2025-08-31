<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkingArea extends Model
{
    protected $fillable = [
        'area_type',
        'area',
        'academic_session',
    ];
}
