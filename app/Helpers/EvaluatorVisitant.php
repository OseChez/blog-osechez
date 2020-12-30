<?php

namespace App\Helpers;
use App\Visitant;
class EvaluatorVisitant{
	public static function isGuest($ip=null,$browser){
		$listIps=null;
		$ipRegistered = false;
		$pattern = "/([1-9]{3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})/";
		if($ip != null && @preg_match($pattern, $ip)){
          $listIps = Visitant::where('ip', $ip)->get();
          if($listIps != null){
          	foreach ($listIps as $key => $ipreg) {
          	if(!strcmp($ip, $ipreg) == 0){
              $ipRegistered = true;
                break;
          	}
           }
          }

		}
		if(!$ipRegistered){
			Visitant::create([
				'ip'=>$ip,
				'type_browser'=>$browser
			]);
		}
		return $ipRegistered;
	}
}