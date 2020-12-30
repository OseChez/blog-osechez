<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Topic;
use App\Category;
//use App\Category;
class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.-
     *
     * @return void
     */
    public function register()
    {
       
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    { 
      $c = $this->menuCategories();
        $sub = $this->menuSubCategories();
        view()->share('names', $c);
        view()->share('subcategories',$sub);
        view()->share('img_path',$this->getImgPath());
        $this->composeNavigation();
    }
    public function composeNavigation(){
        view()->composer(
           ['posts.sidebar.single_sidebar_widget',],
              function ($view) {
                     $view->with('topics',Topic::all());
                 }
       );
    }
    public function menuCategories(){
        $categories = Category::where('parent_id','=',0)->get();
        return $categories;
    }
    public function menuSubCategories(){
        $subcategories = Category::where('parent_id','!=',0)->get();
        return $subcategories;
    }
    public function getImgPath(){
        $html = array(
          'img_path' => htmlentities('/img', ENT_QUOTES, 'UTF-8'),
       );
        return $html['img_path'];
    }
}
