 @if(!empty($twoPosts['post-preview']) || !empty($twoPosts['post-next']))
<div class="navigation-area">
    <div class="row">
    @if(!empty($twoPosts['post-preview']))
         <?php $urlPrev="/posts/{$subcategoryName}/{$twoPosts['post-preview'][0]}";?>
         <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
         <div class="thumb">
            <a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
         </div>
         <div class="arrow">
           <a href="{{url($urlPrev)}}"><span class="lnr text-white lnr-arrow-left"></span></a>
         </div>
         <div class="detials">
            <p>Prev Post</p>
            <a href="{{url($urlPrev)}}"><h4>{{$twoPosts['post-preview'][1]}}</h4></a>
         </div>
        </div>
    @endif
  @if(!empty($twoPosts['post-next']))
   <?php $urlNext="/posts/{$subcategoryName}/{$twoPosts['post-next'][0]}";?>
    <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
      <div class="detials">
        <p>Next Post</p>
        <a href="{{url($urlNext)}}"><h4>{{$twoPosts['post-next'][1]}}</h4></a>
      </div>
      <div class="arrow">
        <a href="{{url($urlNext)}}"><span class="lnr text-white lnr-arrow-right"></span></a>
      </div>
       <div class="thumb">
          <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
       </div>                    
      </div>
  @endif            
    </div>
</div>
@endif  