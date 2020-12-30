@extends('layouts.master_categoryposts')
@section('topheader')
     @include('posts.nav-posts.top-header')
@endsection

@section('postlist_area')
   @include('posts.post_viewcategories')
@endsection

@section('blog_right_sidebar')
   @include('posts.content_sidebar')
@endsection