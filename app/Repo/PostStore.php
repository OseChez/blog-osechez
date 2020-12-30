<?php 
namespace App\Repo;

use App\Post;
use App\Metadatapost;
use App\Utils\UrlConverter;
use Illuminate\Support\Arr;
class PostStore{
	private $postModel;
   public function __construct(){
      $this->postModel = new Post();
    }
   public function guardar($attr){
   	$modelAttributes = Arr::except($attr, ['isserie','preview','next']);
   	$converter = new UrlConverter();
   	$modelAttributes['urlpost'] = $converter->convertTitleToUrl($attr['titulo']);
    $modelAttributes['contenido'] =
   	$post = Post::create($modelAttributes);
   	 $this->postModel = $post;
     if($this->postModel != null){
        $maxMetaData = Metadatapost::max('id');
        $metadatapost = new Metadatapost;
        $metadatapost->id = $maxMetaData + 1;//
        $metadatapost->isserie = $attr['isserie'];
        $metadatapost->views = 0;
        $metadatapost->published = 1;
        $metadatapost->preview = $attr['preview'];
        $metadatapost->next = $attr['next'];
        $metadatapost->post_id = $this->postModel->id;
        
       $this->postModel->metadatapost()->save($metadatapost);
     }
      return $post;
   }
}