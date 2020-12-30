@extends('layouts.master_uploadimg')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/fileinput.min.css') }}">
@endsection
@section('scriptspluginsjs')
  <script type="text/javascript" src="{{ asset('js/fileinput/js/fileinput.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/fileinput/js/locales/es.js')
    }}"></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
           <div class="card">
              <div class="card-header">{{ __('Formulario para cargar una Imagen') }}</div>
                <div class="card-body">
                   <div class="card">
                     @include('images.partials.form')
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scriptsjs')
@parent
 <script type="text/javascript" src="{{ asset('js/responses/uploadimage/uploadimg.js') }}"></script>
@endsection
@section('footerScripts')

@endsection

