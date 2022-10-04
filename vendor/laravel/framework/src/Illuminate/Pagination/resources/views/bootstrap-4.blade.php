<?php //echo "<pre>"; print_r($paginator); ?>
@if ($paginator->hasPages())
    <div class="pagination-area mt-20 mb-20">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <!-- <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a class="page-link"><i class="fi-rs-arrow-small-left"></i></a>
                </li> -->
            @else
                <li class="page-item">
                    <a class="page-link" href="{{url(Request::segment(1))}}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fi-rs-arrow-small-left"></i><i class="fi-rs-arrow-small-left"></i></a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fi-rs-arrow-small-left"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fi-rs-arrow-small-right"></i></a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="{{url(Request::segment(1).'?page='.$paginator->lastPage())}}" rel="next" aria-label="@lang('pagination.next')"><i class="fi-rs-arrow-small-right"></i><i class="fi-rs-arrow-small-right"></i></a>
                </li>
            @else
                <!-- <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="page-link"><i class="fi-rs-arrow-small-left"></i></a>
                </li> -->
            @endif
            </ul>
        </nav>
    </div>
@endif
