@extends('template')

@section('title')
BLOG ADMIN
@stop

@section('content')
<h1>Login</h1>

@if($errors->any())
<ul class="alert">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

{!! Form::open(['route'=>'auth.authenticate', 'method'=>'post']) !!}

@include('admin.auth._form')

<div class="form-group">
    {!! Form::checkbox('remember', 'value', true) !!}
    {!! Form::label('remember', 'Remember me:') !!}<br>
</div>

<div class="form-group">
    {!! Form::submit('Post', ['class'=>'btn btn-primary']) !!}<br>
</div>

{!! Form::close() !!}
@stop
