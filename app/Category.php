<?php

namespace App;//

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'parent_id','nombre_lenguaje'
    ];
   public function getRouteKeyName(){
      return 'nombre_lenguaje';
    }
    public function topics(){
      return $this->hasMany('App\Topic');
    }
  
}
