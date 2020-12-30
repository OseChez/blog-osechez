<div class="comments-area">
        <h4>{{ $cuantos }} Comentarios</h4>
    @foreach($comentarios as $key => $comment)  
      <div class="comment-list">
            <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                    <div class="thumb">
                        <img src="#" alt="">
                    </div>
                    <div class="desc">
                        <h5><a href="#">{{ $nombres[$key]['name']}}</a></h5>
                        <p class="date"> {{ $fchasComments[$key] }} </p>
                        <p class="comment">
                           {{ $comment->comentario}}
                        </p>
                    </div>
                </div>
            </div>
        </div>  
    @endforeach                                           				
    </div>