@if ($paginator->count() > 1)
    <nav class="col full pagination">
        <ul>
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
             <li><span class="page-numbers prev inactive">Prev</span></li>
            {{--<li class="page-item disabled"><span class="page-link">&laquo;</span></li>--}}
        @else
                <li><span class="page-numbers prev"><a href="{{ $paginator->perviousPageUrl() }}" rel="prev">Prev</a></span></li>
            {{--<li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>--}}
        @endif

        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator -->
            {{--@if (is_string($element))--}}
                    {{--<li><span class="page-numbers current">{{ $element }}</span></li>--}}
                {{--<li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>--}}
            {{--@endif--}}

            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                            <li><a href="javascript:void(0)" class="page-numbers current">{{ $page }}</a></li>
                        {{--<li class="page-item active"><span class="page-link">{{ $page }}</span></li>--}}
                    @else
                            <li><a href="{{ $url }}" class="page-numbers">{{ $page }}</a></li>
                        {{--<li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>--}}
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
                <li><a href="#" class="page-numbers next"><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></a></li>
{{--            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>--}}
        @else
                <li><a href="#" class="page-numbers next inactive">Next</a></li>
            {{--<li class="page-item disabled"><span class="page-link">&raquo;</span></li>--}}
        @endif
    </ul>
    </nav>
@endif
