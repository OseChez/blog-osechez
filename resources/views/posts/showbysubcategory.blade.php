@foreach($posts as $key=> $post)
<article class="row blog_item">
    <div class="col-md-3">
        <div class="blog_info text-right">
            <div class="post_tag">
                <a class="active" href="#">Tecnología</a>
                <a href="#">{{ $nameLang }},</a>
                <a href="#">{{ $subcategory }}</a><!---->
            </div>
            <ul class="blog_meta list">
                <li><a href="#">{{ $showDates[$key] }}<i class="lnr lnr-calendar-full"></i></a></li>
                <li><a href="#">{{ $views[$key] }}<i class="lnr lnr-eye"></i></a></li>
                <li><a href="#">{{ $totalComments[$key] }} Comentarios<i class="lnr lnr-bubble"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <div class="blog_post">
            <img src="img/blog/main-blog/m-blog-2.jpg" alt="">
            <div class="blog_details_category">
                <?php $url="/posts/{$subcategory}/{$post->urlpost}";?>
                <a href="{{ url($url) }}"><h2>{{ $post->titulo }}</h2></a>
                <p> {{ $subcontenidos[$key] }} ...</p>
                <a href="{{ url($url) }}" class="white_bg_btn">Ver Más</a>
            </div>
        </div>
    </div>
</article>
@endforeach
