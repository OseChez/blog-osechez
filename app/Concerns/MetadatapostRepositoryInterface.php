<?php
namespace App\Concerns;

interface MetadataposRepositoryInterfeace{
	public function guardar($attr);
	public function actualizar($id);
	public function borrar($id);
}