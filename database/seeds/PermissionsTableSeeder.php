<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.-
     *
     * @return void
     */
    public function run()
    {
      $date = date('Y-m-d H:i:m');
     DB::table('permissions')->insert([
                  'name' => 'Navegar Usuarios',
                  'slug' => 'users.index',
                  'description'=>'Lista y navega todos los Usuarios del sistema',
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
       DB::table('permissions')->insert([
                  'name'=>'Ver detalle de usuarios',
                  'slug'=>'users.show',
                  'description'=>'Ver en detalle de cada Usuario del sistema',
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
       DB::table('permissions')->insert([
                'name'=>'Edición de usuarios',
                'slug'=>'users.edit',
                'description'=>'Editar cualquier dato de un Usuario del sistema',
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
       DB::table('permissions')->insert([
               'name'=>'Eliminar usuarios',
               'slug'=>'users.destroy',
               'description'=>'Eliminar cualquier Usuario del sistema',
                'created_at'=>$date,
                'updated_at'=>$date,
                  ]);
        //Posts
       DB::table('permissions')->insert([
               'name'=>'Crear Posts',
               'slug'=>'posts.create',
               'description'=>'Crear posts en el sistema',
                'created_at'=>$date,
                'updated_at'=>$date,
                  ]);
        //roles
          DB::table('permissions')->insert([
                'name'=>'Navegar roles',
               'slug'=>'roles.index',
               'description'=>'Lista y navega todos los Roles del sistema',
                'created_at'=>$date,
                'updated_at'=>$date,
                  ]);
 
           DB::table('permissions')->insert([
                 'name'=>'Ver detalle de roles',
               'slug'=>'roles.show',
               'description'=>'Ver en detalles cada Rol del sistema',
                'created_at'=>$date,
                'updated_at'=>$date,
                  ]);
         
          DB::table('permissions')->insert([
                 'name'=>'Creación de roles',
               'slug'=>'roles.create',
               'description'=>'Crear Roles en el sistema',
                'created_at'=>$date,
                'updated_at'=>$date,
                  ]);
       DB::table('permissions')->insert([
                'name'=>'Edición de roles',
               'slug'=>'roles.edit',
               'description'=>'Editar  dato de un Rol en el sistema',
                'created_at'=>$date,
                'updated_at'=>$date,
                  ]);
      DB::table('permissions')->insert([
               'name'=>'Eliminar roles',
               'slug'=>'roles.destroy',
               'description'=>'Eliminar cualquier Rol del sistema' ,
               'created_at'=>$date,
               'updated_at'=>$date,
                  ]);
      
        //comments
       DB::table('permissions')->insert([
               'name'=>'Navegar Comentarios',
               'slug'=>'comments.index',
               'description'=>'Lista y navega todos los Comentarios dde usuarios del sistema' ,
               'created_at'=>$date,
               'updated_at'=>$date,
                  ]);
     
     DB::table('permissions')->insert([
               'name'=>'Ver detalle de Comentarios',
               'slug'=>'comments.show',
               'description'=>'Ver en detalle cada Comentarios de Usuario del sistema',
               'created_at'=>$date,
               'updated_at'=>$date,
                  ]);
       DB::table('permissions')->insert([
               'name'=>'Creación de Comentarios',
               'slug'=>'comments.create',
               'description'=>'Crear Comentarios en el sistema',
               'created_at'=>$date,
               'updated_at'=>$date,
                  ]); 
        DB::table('permissions')->insert([
               'name'=>'Edición de Comentarios',
               'slug'=>'comments.edit',
               'description'=>'Editar comentarios de un Usuario del sistema',
               'created_at'=>$date,
               'updated_at'=>$date,
                  ]);  
        DB::table('permissions')->insert([
               'name'=>'Eliminar Comentarios',
               'slug'=>'comments.destroy',
               'description'=>'Eliminar cualquier Comentario de un Usuario del sistema',
               'created_at'=>$date,
               'updated_at'=>$date,
                  ]);
        DB::table('permissions')->insert([
               'name'=>'Metadata Posts',
               'slug'=>'metadataposts.get-all',
               'description'=>'Obtener toda la metadata de los posts',
               'created_at'=>$date,
               'updated_at'=>$date,
                  ]);
         DB::table('permissions')->insert([
               'name'=>'Subir Imágenes',
               'slug'=>'images.index',
               'description'=>'El usuario puede subir imágenes al server',
               'created_at'=>$date,
               'updated_at'=>$date,
                  ]); 
          DB::table('permissions')->insert([
               'name'=>'Leer posts',
               'slug'=>'posts.reader',
               'description'=>'El usuario puede leer todos los posts',
               'created_at'=>$date,
               'updated_at'=>$date,
                  ]);        
    }
}
