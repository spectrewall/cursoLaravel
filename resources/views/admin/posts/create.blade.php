@extends('template')

@section('title')
BLOG ADMIN
@stop

@section('content')
<h1>Create new Post</h1>

@if($errors->any())
<ul class="alert">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

{!! Form::open(['route'=>'admin.posts.store', 'method'=>'post']) !!}

@include('admin.posts._form')

<div class="form-group">
    {!! Form::label('tags', 'Tags:') !!}<br>
    {!! Form::text('tags', null, ['class' => 'form-control']) !!}<br>
</div>

<div class="form-group">
    {!! Form::submit('Post', ['class'=>'btn btn-primary']) !!}<br>
</div>

{!! Form::close() !!}
@stop
