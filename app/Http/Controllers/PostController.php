<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Post;
use App\Category;
use App\Comment;
use App\Metadatapost;
use App\Topic;
use App\Repo\PostRepository;
use App\Repo\PostStore;
use Session;
class PostController extends Controller
{
   public function __construct() {}
    /**
     * Display el post mas reciente.
     *
     * @return view  welcome
    */
   public function index() {
      $titulo='';
      $contenido='';
      $id=0;
      $view=0;
      $cuantos=0;
      $nombres=null;
      $fchasComments=null;
      $comentarios=null;
      $fechaPost='';
      $nameLang='';
      $posiciones=0;
      $subcategoryName="";
      $twoPosts=null;
      $type_code;
       $post = Post::orderBy('created_at', 'desc')
                     ->first();
      if(!is_null($post)){
        $id = (int) $post->id;
     
        $subCatName         = Topic::where('id', $post->topic_id)->first();
        $subcategoryName    = $subCatName->subcategory_name;
        $nLang              = Category::where('id', '=', $subCatName->category_id)->first();
        $nameLang           = $nLang->nombre_lenguaje;
        $comentarios        = Post::find($id)->comments;
        $cuantos            = Comment::countCommentsByPost($id);
        $codes              = Post::find($id)->codes;
        $fechaPost          = Post::getDatesOfPost($id);
        $posiciones         = array();
        /*
         * Matadata Post
         */
        $metadataPost = Post::find($id)->metadatapost;
        /*
         * Otras variables
         */
        $titulo        = $post->titulo;
        $content       = $post->contenido;
        $views         = $metadataPost->views;
        $prev          = $metadataPost->preview;
        $next          = $metadataPost->next;
        $twoPosts      = array('post-preview'=>array(),'post-next'=>array());
     
        if($prev > 0){  
          $postPreview   = Post::find($prev);
          $twoPosts['post-preview'][0] = $postPreview->urlpost;
          $twoPosts['post-preview'][1] = $postPreview->titulo;
        }
        else if($next > 0){
          $postNext = Post::find($next);
          $twoPosts['post-next'][0] = $postNext->urlpost;
          $twoPosts['post-next'][1] = $postNext->titulo;
        }
         //dd($twoPosts);
        $nombres       = Comment::getNameUsers($id);
        $fchasComments = Comment::getDatesOfComments($id);

        $chunks     = preg_split('/\n/', $content);
        $contenido  = array();
        $c          = array();
        $type_codes = array();
        $type_code  = array();
        foreach ($codes as $code) {
            $c[] = $code->code;
            $type_codes[] = $code->type_code;
        }

        for ($index = 0; $index < count($chunks); $index++) {
            if (preg_match('/\S/', $chunks[$index]))
                $contenido[] = $chunks[$index];
        }
        $j = 0;
        for ($index = 0; $index < count($contenido); $index++) {
            if (strcmp($contenido[$index], "--pre--") == 0) {
                $contenido[$index] = $c[$j];
                $posiciones[] = $index;
                $type_code[$index] = $type_codes[$j];
                $j++;
            }
        }
       
       return view('welcome', compact('titulo', 'contenido', 'id',
                                      'views', 'cuantos','nombres', 
                                      'fchasComments', 'comentarios','fechaPost',
                                      'nameLang', 'posiciones',
                                      'subcategoryName','twoPosts','type_code'));
      }else{
         return view('welcome');
      }
    }

    /**
     * Extraer todos los posts.
     *
     * @return \App\Post
     */
    public function view_posts() {
      return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
       
        $attr = array();
        $date = date('Y-m-d');
        $attr['topic_id'] = $request->topic_id;
        $attr['titulo'] = $request->titulo;
        $attr['contenido'] = $request->contenido;
        $attr['created_at'] = $date;
        $attr['updated_at'] = $date;
        $attr['isserie'] = $request->isserie;
        $attr['preview'] = $request->preview;
        $attr['next'] = $request->next;
    if(auth()->user()->hasPermissionTo('posts.create')){
        $post = new PostRepository(new PostStore());
        if($post->guardar($attr)){
            Session::put('guardado','Post Guardado con Éxito');
            $id_post = Post::max('id');
            $response = Response::json([
               'message' => 'El Post ha sido Registrado éxitosamente.',
                'data' => $id_post,
             ], 500);
          return json_encode($response);
        }else{
             $response = Response::json([
               'message' => 'El Post no se ha podido Registrar.',
                'data' => null,
             ], 500);
          return json_encode($response);
        }
    }else{
        abort('403');
    }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show($subcategory) {
     $exist_nameLang = Category::where('nombre_lenguaje', '=', $subcategory)->first();
     $subcat = '';
      if (!is_object($exist_nameLang)) {
            return view('posts.not-found.page_notfound');
      }else {
        $topics = Topic::where('subcategory_name', '=', $subcategory)->get();
        $subcat = $subcategory;
            return view('posts.topics.topics_areapage', compact('topics', 'subcat'));
      }
    }

    public function show_topics(Topic $topic) {
     $tema = Topic::where('url_topic', '=', $topic->url_topic)->first();
        if (!is_object($tema)) {
            return view('posts.not-found.page_notfound');
        } else {
            $posts = Post::where('topic_id', '=', $topic->id)->get();

            $views = array();
            $nLang = Category::where('id', '=', $topic->category_id)->first();
            $nameLang = $nLang->nombre_lenguaje;
            $subcontenidos = array();
            $totalComments = array();
            $showDates = array();
            $subcategory = $topic->subcategory_name;
            foreach ($posts as $post) {
                $subcontenidos[] = substr($post->contenido, 0, 231);
                $showDates[] = Post::getDatesOfPost($post->id);
                $totalComments[] = Comment::countCommentsByPost($post->id);
                $views[] = Metadatapost::find($post->id)->views;
            }

            $subcategoryPhp = Category::where('nombre_lenguaje', $subcategory)->get();

            return view('posts.post_categories', compact('posts', 'nameLang',
                            'showDates', 'subcontenidos', 'subcategory',
                            'subcategoryPhp', 'totalComments', 'views'));
        }
    }

    /**
     * Display the specified topic related with subcategory.
     *
     * @param  string  $subca
     * @return \Illuminate\Http\Response
     */
 public function single_post($category, Post $post){
    $exist_nameLang = Category::where('nombre_lenguaje', '=', $category)->first();
        if (is_object($exist_nameLang)) {
            $id = (int) $post->id;
            $metadataPost = Post::find($id)->metadatapost;
            $v = $metadataPost->views + 1;
            Metadatapost::where('post_id', '=', $id)
                    ->update(['views' => $v]);
            $codes       = $post::find($id)->codes;
            $content     = $post->contenido;
            $comentarios = $post::find($id)->comments;
            $fechaPost   = $post::getDatesOfPost($id);
            $cuantos     = Comment::countCommentsByPost($id);
            $titulo      = $post->titulo;
            $metadataPost = Post::find($id)->metadatapost;
            $views       = $metadataPost->views;
            $nombres     = Comment::getNameUsers($id);
            $fchasComments = Comment::getDatesOfComments($id);
            $subCatName = Topic::where('id', $post->topic_id)->first();
            $subcategoryName = $subCatName->subcategory_name;
            $nLang = Category::where('id', '=', $subCatName->category_id)->first();
        /*
         * Otras variables
         */
        $titulo        = $post->titulo;
        $content       = $post->contenido;
        $views         = $metadataPost->views;
        $prev          = $metadataPost->preview;
        $next          = $metadataPost->next;
        $twoPosts      = array('post-preview'=>array(),'post-next'=>array());
        
        if($prev > 0){  
         $postPreview   = Post::find($prev);
         $twoPosts['post-preview'][0] =$postPreview->urlpost;
         $twoPosts['post-preview'][1] =$postPreview->titulo;
          if($next > 0){
           $postNext  = Post::find($next);
           $twoPosts['post-next'][0] =$postNext->urlpost;
           $twoPosts['post-next'][1] =$postNext->titulo;
          }
        }

            $nameLang = $nLang->nombre_lenguaje;
            $chunks = preg_split('/\n/', $content);
            $contenido = array();
            $c = array();
            $posiciones = array();
            $type_codes = array();
            $type_code = array();
            foreach ($codes as $code) {
                $c[] = $code->code;
                $type_codes[] = $code->type_code;
            }

            for ($index = 0; $index < count($chunks); $index++) {
                if (preg_match('/\S/', $chunks[$index]))
                    $contenido[] = $chunks[$index];
            }
            $j = 0;
            for ($index = 0; $index < count($contenido); $index++) {
                if (strcmp($contenido[$index], "--pre--") == 0) {
                    $contenido[$index] = $c[$j];
                    $posiciones[] = $index;
                    $type_code[$index] = $type_codes[$j];
                    $j++;
                }
            }
         
         return view('posts.single.single-postcategory',
                    compact('comentarios', 'contenido', 'cuantos',
                            'fchasComments', 'fechaPost', 'id', 'nameLang',
                            'nombres', 'posiciones', 'subcategoryName',
                            'titulo', 'type_code','twoPosts','views'));
        } else {
            return view('posts.not-found.page_notfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Respons
     */
    public function update(Request $request, $id) {
        $id = (int)$id;
        $post = Post::find($id);

        $post->update(['contenido'=>$request->contenido]);
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $post = Post::find($id);
        $post->delete();
    }
}
