<?php

namespace App\Concerns;

interface PostRepositoryInterace{
    public function guardar($attr);
    public function actualizar($request,$id);
    public function borrar($id);
}

