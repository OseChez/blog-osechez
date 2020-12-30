<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Post;
class CodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    $code_php='class Student{'."\n";
    $code_php.=' public $name = \'\''."\n";
    $code_php.='  function name ($newname = NULL){'."\n";
    $code_php.='   if (!is_null($newname)) {'."\n";
    $code_php.='     $tname = $newname;'."\n";
    $code_php.=" }\n";
    $code_php.="}";

 $codTwo_php=<<<CODE
\$ed = new Student;
\$ed->name('Michel');
echo "Hola, \{\$ed->name}\\n";
\$tc = new Student;
\$tc->name('Héctor');
echo "Un estudiante distraído \{\$tc->name}\\n";
CODE;
$codThree_php=<<<CODE
 \$person = array("Edison", "Wankel","Crapper");
 \$creator = array('Foco'=>"Edison",'Motor Rotorio' =>"Wankel",'Toilet'=>"Crapper");
 foreach (\$person as \$name) {
   echo "Hello, \{\$name}\\n";
  }
foreach (\$creator as \$invention => \$inventor){
  echo "\{\$inventor} creo el \{\$invention}\n";
}
CODE;
$post = Post::find(1);
       $date = date('Y-m-d H:i:s');
         DB::table('codes')->insert([
                  'code' => $code_php,
                  'type_code' => 'php',
                  'post_id'=>$post->id,
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
        DB::table('codes')->insert([
                  'code' => $codTwo_php,
                  'type_code' => 'php',
                  'post_id'=>$post->id,
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
      DB::table('codes')->insert([
                  'code' => $codThree_php,
                  'type_code' => 'php',
                  'post_id'=>$post->id,
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
    }
}
