@extends('template')

@section('title')
BLOG ADMIN
@stop

@section('content')
<h1>Blog Admin</h1>

<a href="{{ route('admin.posts.create') }}"><button type="button" class="btn btn-success">New Post</button></a><br><br>

<div style=" border:1px solid #ddd; border-radius: 10px; background-color: rgba(160, 153, 194, 0.7);">
    <table class="table">
        <tr>
            <th style="padding: 10px 20px; border:none;">Title</th>
            <th style="text-align:center; border:none;">Action</th>
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
</div>

{{ $posts->links('pagination.default', compact('tags')) }}

@stop
