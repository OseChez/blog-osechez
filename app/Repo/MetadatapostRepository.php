<?php 
 namespace App\Repo;
use App\Concerns\MetadataposRepositoryInterfeace;
 class MetadatapostRepository implements MetadataposRepositoryInterfeace{
 	private $mpost;
    public function __construct($mpost) {
        if($mpost != null){
           $this->mpost = $mpost;
        }
    }
    public function actualizar($request, $id) {
        
    }

    public function borrar($id) {
        
    }

    public function guardar($attr) {
        $mpostObj = $this->mpost->guardar($attr);
        return $postObj;
    }
 }