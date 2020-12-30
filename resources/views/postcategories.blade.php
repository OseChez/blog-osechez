@extends('layouts.master_categoryposts')
@section('topheader')
     @include('partials.menu.top-header')
@endsection

@section('postlist_area')
   @include('posts.post_viewcategories')
@endsection

@section('blog_right_sidebar')
   @include('partials.content_sidebar')
@endsection