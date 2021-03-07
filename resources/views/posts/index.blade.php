@extends('template')

@section('title')
BLOG
@stop

@section('content')
<h1>Blog</h1>
@foreach($posts as $post)
<h2>{{$post->title}}</h2>
<p>{{$post->content}}</p>

<h3>Comments</h3>
@foreach($post->comments as $comment)
<b>{{$comment->name}}</b><br>
{{$comment->comment}}<br>
<br>
@endforeach

<hr>
@endforeach
@stop
