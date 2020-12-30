  <aside class="single_sidebar_widget post_category_widget">
        <h4 class="widget_title">Temas</h4>
             <ul class="list cat-list">
                @foreach($topics as $topic)  
                 <li>
                  <?php $url="/posts/temas/{$topic->url_topic}";?>
                  <a href="{{ url($url) }}" class="d-flex justify-content-between">
                    <p>{{ $topic->title_topic }}</p>
                        <p>0</p>
                  </a>
                     </li>        
                   @endforeach                    
                 </ul>
            <div class="br"></div>
  </aside>
