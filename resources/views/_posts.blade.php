@if ($posts->hasPages())
<nav>
    {{-- Previous Page Link --}}
    @if ($posts->onFirstPage())
    @else
    <a href="{{ implode('',array($posts->previousPageUrl(), '&tag-page=', $tags->currentPage())) }}" rel="prev"><button type="button" class="btn btn-primary">@lang('pagination.previous')</button></a>
    @endif

    {{-- Next Page Link --}}
    @if ($posts->hasMorePages())
    <a href="{{ implode('',array($posts->nextPageUrl(), '&tag-page=', $tags->currentPage())) }}" rel="next"><button type="button" class="btn btn-primary">@lang('pagination.next')</button></a>
    @endif
</nav>
@endif
