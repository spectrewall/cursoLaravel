@extends('template')

@section('title')
BLOG
@stop



@section('content')

<h1>Blog</h1>
<br>

<div style="display:flex; justify-content:space-between;">
    <div style="display:inline-block; width: 60%">
        @foreach($posts as $post)
        @include('posts._blogPost')
        @endforeach
    </div>
    <div style="display:inline-block; text-align:left; padding-top:0px">
        @include('posts._searchByTag')
    </div>
</div>
<br>
@include('_posts')
<hr>
@stop
