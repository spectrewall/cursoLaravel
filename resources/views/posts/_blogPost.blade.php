<div style="padding-top:0px;
            background-color: rgba(160, 153, 194, 0.7);
            background-position: center center;
            background-size: cover;
            border:1px solid #ddd;
            border-radius: 10px;
            display:inline-block;
            width:90%;
">
    @if($post->created_at_format == $post->updated_at_format)
    <p style="margin:10px">Created at: {{ $post->created_at_format }}</p>
    @else
    <p style="margin:10px">Created at: {{ $post->created_at_format }} | Last update: {{ $post->updated_at_format }}</p>
    @endif
    <a href="{{ route('post', ['id'=>$post->id]) }}">
        <h2 style="text-align:left; margin:10px; margin-top:2%;">{{$post->title}}</h2>
    </a>
    @if(strlen($post->content) > 1024)
    <p style="margin:10px">{{ substr($post->content, 0, 1024) }} <b>...Open the post to see more.</b></p>
    @else
    <p style="margin:10px">{{ $post->content }}</p>
    @endif
    <b style="margin:10px">Tags:</b>
    <ul style="margin:10px">
        @foreach($post->tags as $tag)
        <li>{{$tag->name}}</li>
        @endforeach
    </ul>

    <a href="{{ route('post', ['id'=>$post->id]) }}#comments">
        <h3 style="margin:10px">{{$post->comments->count()}} Comments:</h3>
    </a>
    @if($post->comments == '[]')
    <p style="margin:10px">Be the first one to comment!</p>
    @else
    <p hidden>{{$comment = $post->comments->first()}}</p>
    <div style="margin:10px; display:flex;">
        @include('_userImg')
        <div style="display:inline-block;">
            <b>{{$comment->name}}</b><br>
            {{$comment->comment}}<br>
        </div>
    </div>
    @endif
</div>
