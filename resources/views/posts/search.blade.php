@extends('template')

@section('title')
BLOG
@stop



@section('content')

<h1>Search result: {{App\Models\Tag::find($id)->name}}</h1>
<br>

{{ $posts->links('pagination.tagdefault', compact('posts')) }}
<br>
<div style="display:flex; justify-content:space-between;">
    <div style="display:inline-block;">
        <br>
        @unless(count($posts))
        <h1>None.</h1>
        @endunless
        @foreach($posts as $post_tag)
        <p hidden>{{ $post = App\Models\Post::find($post_tag->post_id) }}</p>
        @include('posts._blogPost')
        @endforeach
    </div>
    <div style="display:inline-block;">
        @include('posts._searchByTag')
    </div>
</div>
<br>
{{ $posts->links('pagination.default', compact('tags')) }}
@stop
