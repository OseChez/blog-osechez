<div class="single-post row">
    <div class="col-lg-9 col-md-10 col-sm-12 col-xs-10 blog_details">
    <h2>{{ $titulo }}</h2>
    @foreach($contenido as $key => $paragraph)
      @if(in_array($key,$posiciones))
        @if(strcmp($type_code[$key],'html') == 0 )
          <pre class="brush: html">{{ $paragraph }}</pre>
        @elseif(strcmp($type_code[$key],'php') == 0 )
          <pre class="brush: php">{{ $paragraph }}</pre>
        @elseif(strcmp($type_code[$key],'js') == 0)
          <pre class="brush: js">{{ $paragraph }}</pre>
        @endif
      @elseif($key > 0)
        <p>{{ $paragraph }}</p>
      @else
       <p>{{ $paragraph }}</p>
      
      @endif
    @endforeach

</div>
   @include('posts.sub-content.post-description')
</div>