 {{--Inicializacion del contenido del blog--}}
 @if(isset($titulo))
   @include('posts.index-blog.partials.index-postblog')
   @include('posts.area-comments.comments-area')
   @include('posts.area-comments.comment-form')
 @else
   @include('posts.index-blog.partials.index-emptypost')
 @endif
  @include('posts.index-blog.partials.series-posts.navigation-area')
 
