
<div class="row latest_blog_inner">
    @foreach($topics as $topic)
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="l_blog_item">
            <img class="img-fluid" src="#" alt="">
            <a class="date" href="#">{{$topic->created_at}} |  By Osechez</a>
             <?php $url="/posts/temas/{$topic->url_topic}";?>
            <a href="{{ url($url) }}"><h4>{{$topic->title_topic}}</h4></a>
            <p>{{$topic->description}}</p>
        </div>
    </div>
    @endforeach
</div>