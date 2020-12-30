<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="top_menu row m0">
        <div class="container">
            <div class="float-left">
                <ul class="list header_social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                </ul>
            </div>
            <div class="float-right">
                @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="dn_btn">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="dn_btn">Login</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="dn_btn">Registrarse</a>
                    @endif
                    @endauth
                </div>
                @endif
            </div>
        </div>  
    </div>  
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ url('/') }}"><img src="{{ url($img_path.'/favicon.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling. -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li> 
                       @foreach($names as $item) 
                           <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $item['nombre_lenguaje'] }}</a>
                            <ul class="dropdown-menu">
                            @foreach($subcategories as $sub)
                                @if($sub['parent_id' ] == $item['id'])
                                 <li class="nav-item">
                                  <a class="nav-link" href=" {{  route('posts.topics.topics_areapage', ['subcategory' => $sub['nombre_lenguaje']]) }}">{{ $sub['nombre_lenguaje'] }}
                                 </a>
                                </li>
                                @endif
                               @endforeach
                            </li>
                            </ul>
                        </li>
                       @endforeach
                    </ul>
                </div> 
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->
