<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectExpense extends Model
{
    protected $fillable = [
        'report_id',
        'category',
        'expense',
        'details',
    ];

    public function report(){
        return $this->belongsTo(ProjectReport::class, 'report_id');
    }
}
