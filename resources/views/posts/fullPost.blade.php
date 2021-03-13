@extends('template')

@section('title')
{{$post->title}}
@stop



@section('content')


<br>
<div style="display:flex;
            border:1px solid #ddd;
            border-radius: 30px;
            background-color: #ffffff;
            margin: auto;
">
    <div>
        <div style="padding: 10px 20px;">
            <h1 id="top">{{$post->title}}</h1>
            <br>
            <p style="margin:10px;">{{$post->content}}</p>
            <br>
            <b style="margin:10px">Tags:</b>
            <ul style="margin:10px">
                @foreach($post->tags as $tag)
                <li>{{$tag->name}}</li>
                @endforeach
            </ul>
            <div id="comments">
                <h3 style="margin:10px">{{$post->comments->count()}} Comments:</h3>
                @if($post->comments == '[]')
                <p style="margin:10px">Be the first one to comment!</p>
                @endif
                @foreach($post->comments as $comment)
                <div style="margin:10px; display:flex;">
                    @include('_userImg')
                    <div style="display:inline-block;">
                        <b>{{$comment->name}}</b><br>
                        {{$comment->comment}}<br>
                    </div>
                </div>
                @endforeach
            </div>
            <br>
            <div style="margin:10px;">
                {!! Form::open(['route'=>['post.newComment', $post->id], 'method'=>'post']) !!}
                <div class=" form-group">
                    {!! Form::label('name', 'Name:') !!}<br>
                    {!! Form::text('name', null, array()); !!}<br>
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}<br>
                    {!! Form::email('email', null, array()); !!}<br>
                </div>
                <div class="form-group">
                    {!! Form::label('comment', 'Comment:') !!}<br>
                    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}<br>
                </div>
                <div class="form-group">
                    {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}<br>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="center" style="
                            position:fixed;
                            display:flex;
                            bottom:3%;
                            align-items:center;
                            text-align:center;
                            left: 50%;
                            -ms-transform: translate(-50%, -50%);
                            transform: translate(-50%, -50%);
">
    <a href="#top"><button class="btn btn-info">Climb Top</button></a>
</div>
<br>

@stop
