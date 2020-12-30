@extends('layouts.master_topicsposts')
@section('topheader')
     @include('posts.nav-posts.top-header')
@endsection

@section('posts_topics_area')
   @include('posts.topics.partials.content_topicarea')
@endsection

