<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $fillable = [
        'code','type_code','post_id'
    ];
    public function post(){
    	return $this->belongsTo('App\Post');
    }
}
