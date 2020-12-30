@extends('layouts.app')
@if(Auth::user()->hasPermissionTo('posts.reader'))
  @includeIf('inicio.partials.view_admin',['isAdmin'=>Auth::user()->hasPermissionTo('posts.reader')])
@else
@section('content')
  @include('inicio.partials.view_visitants')
@endsection

@endif


