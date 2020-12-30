<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Utils\FormatoFechas;
use Illuminate\Support\Facades\DB;
class Post extends Model
{
   protected $fillable = [
        'titulo','contenido','urlpost','topic_id'
    ];
   public function getRouteKeyName(){
      return 'urlpost';
    }
    public function comments(){
      return $this->hasMany('App\Comment');
    }

    public function codes(){
      return $this->hasMany('App\Code');
    }
    public function topic(){
       return $this->belongsTo('App\Topic');
    }
    public function metadatapost(){
        return $this->hasOne('App\Metadatapost');
    }
    public function images(){
      return $this->morphMany('App\Image','imageable');
    }
    public static function getDatesOfPost($id){
        $fecha =self::where('id','=',$id)
                      ->first();
        $formatFecha = new FormatoFechas($fecha->created_at);

        $f = $formatFecha->getDateAbreviado();
        return $f;
    } 
    public static function selectByJoin($subcategory){
       $posts = DB::table('posts')
                    ->join('topics', 'posts.topic_id', '=', 'topics.id')
                    ->select('posts.*', 'topics.category_id', 'topics.subcategory_name',
                             'topics.description')
                    ->where('topics.subcategory_name','=',$subcategory)
                    ->orderBy('posts.created_at','desc')
                    ->get();
      return $posts;
    }
    public function guardar($attributes){
       $this->id         = $attributes['id'];
       $this->titulo     = $attributes['titulo'];
       $this->contenido  = $attributes['contenido'];
       $this->urlpost    = $attributes['urlpost'];
       $this->topic_id   = $attributes['topic_id'];
       $this->created_at = $attributes['created_at'];
       $this->updated_at = $attributes['updated_at'];
       $this->save();
    }
 
}
