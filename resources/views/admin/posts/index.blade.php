@extends('template')

@section('title')
BLOG ADMIN
@stop

@section('content')
<h1>Blog Admin</h1>

<a href="{{ route('admin.posts.create') }}"><button type="button" class="btn btn-success">New Post</button></a><br><br>

<table class="table">

    <tr>
        <th>Title</th>
        <th style="text-align:center;">Action</th>
    </tr>

    @foreach($posts as $post)
    <tr>
        <td style="width: 85%">
            {{$post->title}}
        </td>
        <td style="text-align:center;">
            <a href="{{ route('admin.posts.edit', ['id'=>$post->id]) }}"><button type="button" class="btn btn-warning">Edit</button></a>
            <a href="{{ route('admin.posts.destroy', ['id'=>$post->id]) }}"><button type="button" class="btn btn-danger">Delete</button></a>
        </td>
    </tr>
    @endforeach

</table>

@include('_posts')

@stop
