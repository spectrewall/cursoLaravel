@extends('template')

@section('title')
BLOG ADMIN
@stop

@section('content')
<div style="display:flex; align-items:center; flex-direction:column; margin-top:100px;">
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
        {!! Form::label('remember', 'Remember me:') !!}
        {!! Form::checkbox('remember', 'value', true) !!}
        <br>
    </div>

    <div class="form-group" style="text-align:center;">
        {!! Form::submit('Sign In', ['class'=>'btn btn-primary']) !!}<br>
    </div>

    {!! Form::close() !!}

    <div class="form-group" style="text-align:center;">
        <b>Or</b><br>
    </div>

    <div class="form-group" style="text-align:center;">
        <a href="{{ route('discord.login') }}"><img src="https://i.imgur.com/X39u4me.png" alt="Login with Discord" width="40px" height="40px"></a>
    </div>
</div>

@stop
