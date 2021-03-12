<ul class="list">
    <h4>Search by tags:</h4>
    @foreach($tags as $tag)
    <li><a href="{{ route('post.searchByTag', ['id'=>$tag->id]) }}">{{$tag->name}}</a></li>
    @endforeach
</ul>
