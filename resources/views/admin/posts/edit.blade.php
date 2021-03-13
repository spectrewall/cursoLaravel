@extends('template')

@section('title')
BLOG ADMIN
@stop

@section('content')
<h1>Edit Post</h1>

<div style="padding: 10px 20px;
            background-color: rgba(160, 153, 194, 0.7);
            background-position: center center;
            background-size: cover;
            border-radius: 10px;
            display:inline-block;
            width:90%;
">
    @if($errors->any())
    <ul class=" alert">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    {!! Form::model($post, ['route'=>['admin.posts.update', $post->id], 'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}<br>
        {!! Form::text('title', $post->title, ['class' => 'form-control']) !!}<br>
    </div>

    <div class="form-group">
        {!! Form::label('content', 'Content:') !!}<br>
        {!! Form::textarea('content', $post->content, ['class' => 'form-control']) !!}<br>
    </div>

    <div class="form-group">
        {!! Form::label('tags', 'Tags:') !!}<br>
        {!! Form::text('tags[]', $post->TagList, ['class' => 'form-control']) !!}<br>
    </div>

    <div class="form-group">
        {!! Form::submit('save', ['class'=>'btn btn-success']) !!}<br>
    </div>

    {!! Form::close() !!}
</div>
@stop
