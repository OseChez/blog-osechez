<?php
namespace App\Repo;
use App\Concerns\PostRepositoryInterace;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostRepository
 *
 * @author osechez
 */
class PostRepository implements PostRepositoryInterace{
    private $post;
    public function __construct($post) {
        if($post != null){
           $this->post = $post;
        }
    }
    public function actualizar($request, $id) {
        
    }

    public function borrar($id) {
        
    }

    public function guardar($attr) {
        $postObj = $this->post->guardar($attr);
        return $postObj;
    }

}
