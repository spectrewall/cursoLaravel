<ul class="list">
    <h4>Search by tags:</h4>
    @foreach($tags as $tag)
    <li><a href="{{ route('post.searchByTag', ['id'=>$tag->id]) }}">{{$tag->name}}</a></li>
    @endforeach
    @if ($tags->hasPages())
    <nav>
        {{-- Previous Page Link --}}
        @if ($tags->onFirstPage())
        @else
        <a href="{{ implode('',array($tags->previousPageUrl(), '&page=', $posts->currentPage())) }}" rel="prev"><button type="button" class="btn btn-primary">@lang('pagination.previous')</button></a>
        @endif

        {{-- Next Page Link --}}
        @if ($tags->hasMorePages())
        <a href="{{ implode('',array($tags->nextPageUrl(), '&page=', $posts->currentPage())) }}" rel="next"><button type="button" class="btn btn-primary">@lang('pagination.next')</button></a>
        @endif
    </nav>
    @endif
</ul>
