<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ "Blog" }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <!-- Scripts -->
    <script src="{{  url('js/jquery-3.3.1.min.js') }}"></script>
    @section('styles')
    @show
    @section('scriptspluginsjs')
    @show
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/dashboard') }}">
                    {{ "Blog" }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar. -->
                    <ul class="navbar-nav mr-auto">
                       @can('roles.index')
                        <li class="nav-items">
                            <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                        </li>
                        @endcan
                        @can('roles.index')
                        <li class="nav-items">
                            <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
                        </li>
                        @endcan
                        @can('roles.index')
                        <li class="nav-items">
                            <a class="nav-link" href="{{ route('images.index') }}">Subir Imágenes</a>
                        </li>
                        @endcan
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @if(isset($errors) && $errors->any())
                 <div class="alert alert-danger">
                     <ul>
                        @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                 </div>
                @endif
                 @if(session()->has('success'))
                 <div class="alert alert-success">
                     <ul>
                        @foreach(session()->get('success') as $msg)
                          <li>{{ $msg }}</li>
                        @endforeach
                     </ul>
                 </div>
                @endif
            </div>
            @yield('content')
        </main>
        @section('scriptsjs')

        @show
    </div>
</body>
</html>
