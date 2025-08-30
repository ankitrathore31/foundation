<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'academic_session',
        'code',
        'name',
        'category',
        'sub_category',
        'image',

    ];

    public function reports()
    {
        return $this->hasMany(ProjectReport::class, 'project_id', 'id');
    }

    public static function getNamesFromValidCategories()
    {
        $categories = \App\Models\Category::pluck('category');
        return self::whereIn('category', $categories)->get();
    }
}
