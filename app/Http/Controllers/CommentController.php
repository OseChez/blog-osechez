<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Utils\Forms\TextFormsVerifier;
use App\Comment;
use App\User;
use Response;
class CommentController extends Controller
{
   public function  store(Request $request, Comment $comment){
   	if($request->ajax()){
      $verifier = new TextFormsVerifier();
      $this->validator($request->all());
      $com = $verifier->analizeText($request->message);
      $user = User::where('email','=',$request->email)->get()->first();
      $msgErr = 'Necesitas estar registrado para dejar un comentario';
     if($user != null){
       $comment::create([
          'post_id'=>$request->post_id,
          'user_id'=>$user->id,
          'comentario'=>$com,
          'published'=>1]);
        $response = Response::json([
               'message' => 'Se ha registrado tu Comentario.',
                'data' => [],
             ], 200);
          return $response;
         }else{
            $response = Response::json([
               'message' => 'Necesitas estar registrado para dejar un Comentario en este post.',
             ], 200);
          return $response;
         }
     }
   }
   protected function validator(array $data)
    {
        return Validator::make($data, [
            'post_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:45'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'titulo' => ['required', 'string','max:75'],
            'message' => ['required', 'string', 'max:295'],
        ]);
    }
}
