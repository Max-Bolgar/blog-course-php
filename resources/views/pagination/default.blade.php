<!--Так лучше не надо делать, но мне лень создавать отдельный файл со стилями-->
<style>
    .pagination {
        text-align: center;
        border: 1px #000 solid;
    }
        .pagination li {
        list-style-type: none;
        display: inline-block;
        padding: 10px 10px;
    }
   .pagination a {
        color: #000;
        font-weight: bold;
    }
    .pagination a:hover {
        text-decoration: underline;
    }
</style>
@if ($paginator->hasPages())
<ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="disabled"><span>Назад</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" >Назад</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" >{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" >Вперед</a></li>
        @else
            <li class="disabled"><span>Вперед</span></li>
        @endif
    </ul>
@endif