<div class="single-post row">
    @include('posts.index-blog.partials.post_info.info-post')
    <div class="col-lg-9 col-md-10 col-sm-12 col-xs-12 blog_details">
    <h2>{{ $titulo }}</h2>
    @foreach($contenido as $key => $paragraph)
      @if(in_array($key,$posiciones))
        @if(strcmp($type_code[$key],'html') == 0)
          <pre class="brush: html">{{ $paragraph }}</pre>
        @elseif(strcmp($type_code[$key],'php') == 0)
          <pre class="brush: php">{{ $paragraph }}</pre>
        @elseif(strcmp($type_code[$key],'js') == 0)
          <pre class="brush: js">{{ $paragraph }}</pre>
        @endif
      @elseif($key >0)
       <p class="excert">{{ $paragraph }}</p>
      @else
       <p>{{ $paragraph }}</p>
      @endif
    @endforeach

</div>
   @include('posts.index-blog.partials.description.description_blog')
</div>


