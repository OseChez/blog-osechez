<?php

namespace App\Http\Controllers;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Requests\ImageFormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
class ImageController extends Controller
{
   public function index(){
   	 return view('images.index');
   }
   public function store(ImageFormRequest $request){
     if($request->hasFile('image')){
       $req = Arr::except($request->all(), ['image']);
       $this->validator($req);
  		 $file = $request->file('image');
  		  $name = $file->getClientOriginalName();
  		  $file->move(public_path() . '/img/', $name);
        $img = new Image();
        $img->url = $req['url_img'];
        $img->imageable_id = $req['post_id'];
        $t ="App\\".$req['type'];
        $img->imageable_type = $t;
      if($img->save()){
		    return redirect('/images')
              ->with('status', 'Tu imagen ha sido cargada en el servidor!');
      }else{
        return redirect('/images')
              ->with('status', 'Ha habido un error al guardar los datos!');
      }
     
     }
   }
   protected function validator(array $data)
    {
        return Validator::make($data, [
            'type' => ['required', 'string', 'max:45'],
            'post_id' => ['required', 'integer'],
            'url-img' => ['required', 'string','max:75'],
        ]);
    }
}
