@extends('template')

@section('title')
BLOG
@stop

@section('content')

<h1>Blog</h1>
<br>


<br>
{{ $posts->links('pagination.default', compact('tags')) }}
<div style="display:flex; justify-content:space-between;">
    <br>
    <div style="display:inline-block;">
        @foreach($posts as $post)
        <br>
        @include('posts._blogPost')
        <br>
        @endforeach
    </div>
    <div style="display:inline-block;">
        @include('posts._searchByTag')
    </div>
</div>
<br>
{{ $posts->links('pagination.default', compact('tags')) }}
<br>
@stop
