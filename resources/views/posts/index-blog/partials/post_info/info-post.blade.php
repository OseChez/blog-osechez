   <div class="col-lg-3  col-md-3">
        <div class="blog_info text-right">
          <div class="post_tag">
            {{ EvaluatorVisitant::isGuest($_SERVER['REMOTE_ADDR'],$_SERVER['HTTP_USER_AGENT']) }}
            <a class="active" href="#">Tecnología,</a>
            <a href="#">{{ $subcategoryName }},</a><!---->
            <a href="#">{{ $nameLang }}</a>
          </div><!---->
         <ul class="blog_meta list">
             <li><a href="#">{{ $fechaPost }}<i class="lnr lnr-calendar-full"></i></a></li>
             <li><a href="#">{{ $views }} Vistas<i class="lnr lnr-eye"></i></a></li>
             <li><a href="#">{{ $cuantos }} Comentarios <i class="lnr lnr-bubble"></i></a></li>
         </ul>
         <ul class="social-links">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-github"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
         </ul>
        </div>
   </div>