<?php

use Illuminate\Support\Facades\Route;
use App\Post;
use App\Category;
use App\Comment;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|-
*/

Route::get('/', 'PostController@index')->name('welcome');

#########################
                        #
#########################
Route::get('/posts/{subcategory}', 'PostController@show')->name('posts.topics.topics_areapage')
       ->where('subcategory', '[A-Za-z]$');
Route::get('/publicaciones','PostController@view_posts');

########################################
  # acceder a los modelos como rutas   #
#######################################
Route::get('/posts/temas/{topic}', 'PostController@show_topics')->name('posts.post_categories');
     
Route::get('/posts/{category}/{post}','PostController@single_post')
       ->where(['category','post'],'[a-z]$');
Route::post('storecomment','CommentController@store');
#########################
                        #
#########################
Route::get('/topics','TopicController@index')->name('view_catagories');
Route::apiResource('posts', 'PostController');
Auth::routes();


Route::middleware(['auth'])->group(function(){
  Route::get('/dashboard', 'HomeController@index')->name('inicio.dashboard');
 
  Route::get('matadata-posts','MetadatapostController@getAllMetadata')->middleware('permission:metadataposts.get-all');
  Route::get('temas','TopicController@view_topics');
  
  Route::post('roles/store','RoleController@store')->name('roles.store')
               ->middleware('permission:roles.store');

  Route::get('roles','RoleController@index')->name('roles.index')
               ->middleware('permission:roles.index');

  Route::get('roles/create','RoleController@create')->name('roles.create')
               ->middleware('permission:roles.create');

  Route::put('roles/{role}','RoleController@update')->name('roles.update')
               ->middleware('permission:roles.edit');

  Route::get('roles/{role}','RoleController@show')->name('roles.show')
               ->middleware('permission:roles.show');

  Route::delete('roles/{role}','RoleController@destroy')->name('roles.destroy')
               ->middleware('permission:roles.destroy');

  Route::get('roles/{role}/edit','RoleController@edit')->name('roles.edit')
               ->middleware('permission:roles.edit');

  ##############################################                                 # Rutas de acceso a modulo usuarios  #
  ##############################################
  Route::get('users','UserController@index')->name('users.index')
                                         ->middleware('permission:users.index');
              
  Route::put('users/{user}','UserController@update')->name('users.update')//Se refiere a la definicion del controlador
                                               ->middleware('permission:users.edit');
  
  Route::get('users/{user}','UserController@show')->name('users.show')
                                             ->middleware('permission:users.show');

  Route::delete('users/{user}','UserController@destroy')->name('users.destroy')
                                                   ->middleware('permission:users.destroy');

  Route::get('users/{user}/edit','UserController@edit')->name('users.edit')
                                                  ->middleware('permission:users.edit');

  Route::get('/images','ImageController@index')->name('images.index')
                                                  ->middleware('permission:images.index');
############################################
// Subida de Imágenes                     ##
############################################
 Route::post('upload', 'ImageController@store');
});

