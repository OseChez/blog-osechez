@extends('layouts.master')
@section('topheader')
     @include('posts.nav-posts.top-header')
@endsection
@section('blog_area')
   @include('posts.partials.blog-area')
@endsection
@section('blog_right_sidebar')
   @include('posts.content_sidebar')
@endsection