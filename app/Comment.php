<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Utils\FormatoFechas;
class Comment extends Model
{
   protected $fillable = [
        'post_id','user_id','comentario','published',
    ];
     
   public static function countCommentsByPost($id){
        return self::where('post_id','=',$id)
                    ->count();
    }
    public static function getNameUsers($id){
        $nameUsers = self::join('users','comments.user_id','=','users.id')
                          ->select('comments.id','users.name')
                          ->where('comments.post_id','=',$id)
                          ->get()
                          ->toArray();
        return $nameUsers;
    }
    public static function getDatesOfComments($id){
        $fechas =self::where('post_id','=',$id)
                       ->select('created_at') 
                       ->get();
        $fchs = array();
        foreach($fechas as $f){
            $formatFecha = new FormatoFechas($f->created_at);
            $fchs[] = $formatFecha->getFechaFormateada();
        }
        return $fchs;
    }  
}
