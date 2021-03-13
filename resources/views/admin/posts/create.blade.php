@extends('template')

@section('title')
BLOG ADMIN
@stop

@section('content')
<h1>Create new Post</h1>

<div style="padding: 10px 20px;
            background-color: rgba(160, 153, 194, 0.7);
            background-position: center center;
            background-size: cover;
            border-radius: 10px;
            display:inline-block;
            width:90%;
">
    @if($errors->any())
    <ul class="alert">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    {!! Form::open(['route'=>'admin.posts.store', 'method'=>'post']) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}<br>
        {!! Form::text('title', null, ['class' => 'form-control']) !!}<br>
    </div>

    <div class="form-group">
        {!! Form::label('content', 'Content:') !!}<br>
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}<br>
    </div>

    <div class="form-group">
        {!! Form::label('tags', 'Tags:') !!}<br>
        {!! Form::text('tags[]', null, ['class' => 'form-control']) !!}<br>
    </div>

    <div class="form-group">
        {!! Form::submit('Post', ['class'=>'btn btn-success']) !!}<br>
    </div>

    {!! Form::close() !!}
</div>
@stop
