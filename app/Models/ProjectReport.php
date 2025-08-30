<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectReport extends Model
{
    protected $fillable = [
        'academic_session',
        'project_id',
        'report',
        'mission',
        'conclusion',
    ];

    public function items(){
        return $this->hasMany(ProjectExpense::class, 'report_id');
    }
}
