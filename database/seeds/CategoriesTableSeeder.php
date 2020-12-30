<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date('Y-m-d H:i:s');
        DB::table('categories')->insert([
                  'parent_id' => 0,
                  'nombre_lenguaje' => 'Java',
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);

        DB::table('categories')->insert([
                  'parent_id' => 0,
                  'nombre_lenguaje' => 'JavaScript',
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
         DB::table('categories')->insert([
                  'parent_id' => 0,
                  'nombre_lenguaje' => 'Php',
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
        DB::table('categories')->insert([
                  'parent_id' => 0,
                  'nombre_lenguaje' => 'Python',
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);

         DB::table('categories')->insert([
                  'parent_id' => 1,
                  'nombre_lenguaje' => 'CodexJava',
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
         
         DB::table('categories')->insert([
                  'parent_id' => 2,
                  'nombre_lenguaje' => 'CodexJavaScript',
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
         DB::table('categories')->insert([
                  'parent_id' => 2,
                  'nombre_lenguaje' => 'Vue',
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
          DB::table('categories')->insert([
                  'parent_id' => 2,
                  'nombre_lenguaje' => 'JQuery',
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
        
         DB::table('categories')->insert([
                  'parent_id' => 3,
                  'nombre_lenguaje' => 'CodexPHP',
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
         DB::table('categories')->insert([
                  'parent_id' => 3,
                  'nombre_lenguaje' => 'Laravel',
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
           DB::table('categories')->insert([
                  'parent_id' => 3,
                  'nombre_lenguaje' => 'CakePHP',
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
                   DB::table('categories')->insert([
                  'parent_id' => 4,
                  'nombre_lenguaje' => 'CodexPython',
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
    }
}
