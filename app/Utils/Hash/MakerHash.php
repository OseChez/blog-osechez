<?php

namespace App\Utils\Hash;

class MakerHash{

	public function  __construct(){}
	public static function makeHash(){
      return sha1(uniqid(mt_rand(), TRUE));
	}
}