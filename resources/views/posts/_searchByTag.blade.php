<br>
<div style="display:inline-block;
            text-align:left;
            padding-top:0px;
            background-color:rgba(160, 153, 194, 0.7);
            border:1px solid #ddd;
            border-radius: 10px;
">
    <center>
        <h7>Search by tags:</h7>
    </center>
    <ul style="
            display: block;
            list-style-type: disc;
            margin-top: 1em;
            margin-bottom: 1 em;
            margin-left: 5px;
            margin-right: 10px;
            padding-left: 18px;
    ">
        @foreach($tags as $tag)
        <li style="margin:1%;"><a href=" {{ route('post.searchByTag', ['id'=>$tag->id]) }}">{{$tag->name}}</a></li>
        @endforeach
    </ul>
    <center style="margin:7%;">{{ $tags->links('pagination.tagdefault', compact('posts')) }}</center>
</div>
