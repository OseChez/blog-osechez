<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitant extends Model
{
    protected $fillable=['ip','type_browser'];
}
