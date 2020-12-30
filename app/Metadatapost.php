<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metadatapost extends Model
{
	protected $fillable = [
       'isserie','views','published','preview','next','post_id'
    ];
    public function metadatapost(){
        return $this->belongsTo('App\Metadatapost');
    }
}
