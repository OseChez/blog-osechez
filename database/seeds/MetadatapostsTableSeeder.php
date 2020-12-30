<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Post;
class MetadatapostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date('Y-m-d H:i:s');
       
       /* for($i = 1; $i < 8; $i++){
          $post = Post::find($i);
          DB::table('metadataposts')->insert([
                  'isserie' => 1,
                  'views' => rand(0,7),
                  'published' => 1,
                  'post_id' => $post->id,
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
        }*/
      
       $post = Post::find(1);
          DB::table('metadataposts')->insert([
                  'isserie' => 1,
                  'views' => 0,
                  'published' => 1,
                  'post_id' => $post->id,
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
    }
}
