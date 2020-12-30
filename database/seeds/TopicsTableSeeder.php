<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
 use App\Utils\UrlConverter;
use App\Category;
class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat  = Category::find(3);
        $cat_2= Category::find(7);
        $cat_3= Category::find(4);
        $date = date('Y-m-d H:i:s');
        $themeOne = 'PHP un lenguaje sencillo de aprender pero poderoso';
        $themeTwo = 'El lenguje por excelecia del frontend en las webs modernas';
        $themeThree = 'Laravel es un framework del que te enamoráras';
        $url_1 = new UrlConverter();
        $url_2 = new UrlConverter();
        $url_3 = new UrlConverter();
        DB::table('topics')->insert([
                  'category_id' => $cat->id,
                  'title_topic'=>$themeOne,
                  'description' => 'Te convencerás de que aprender este lenguaje es una excelente desición',
                  'subcategory_name' => 'CodexPHP',
                  'url_topic' => $url_1->convertTitleToUrl($themeOne),
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
        DB::table('topics')->insert([
                  'category_id' => $cat_2->id,
                  'title_topic'=>$themeTwo,
                  'description' => 'Javascript será por muchos años el rey del frontend',
                  'subcategory_name' => 'CodexJavaScript',
                  'url_topic' => $url_2->convertTitleToUrl($themeTwo),
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
        DB::table('topics')->insert([
                  'category_id' => $cat_3->id,
                  'title_topic'=>$themeThree,
                  'description' => '',
                  'subcategory_name' => 'Laravel',
                  'url_topic' => $url_3->convertTitleToUrl($themeThree),
                  'created_at'=>$date,
                  'updated_at'=>$date,
                  ]);
        
    }
}
