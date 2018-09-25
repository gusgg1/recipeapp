<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    protected $fillable = [
        'category_id',	
        'title',	
        'ingredients',	
        'steps',	
        'duration',	
        'publish'
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
