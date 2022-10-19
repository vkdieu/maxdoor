@if ($paginator->hasPages())
  <ul class="pagination mt-5">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
      <a class="previous">
        <i class="fas fa-angle-left"></i>
      </a>
    @else
      <a class="previous" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
        <i class="fas fa-angle-left"></i>
      </a>
    @endif


    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
      {{-- "Three Dots" Separator --}}
      @if (is_string($element))
        <span class="active">{{ $element }}</span>
      @endif

      {{-- Array Of Links --}}
      @if (is_array($element))
        @foreach ($element as $page => $url)
          @if ($page == $paginator->currentPage())
            <span class="active">{{ $page }}</span>
          @else
            <a href="{{ $url }}">{{ $page }}</a>
          @endif
        @endforeach
      @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
      <a href="{{ $paginator->nextPageUrl() }}" class="next">
        <i class="fas fa-angle-right" aria-hidden="true"></i>
      </a>
    @else
      <a class="next">
        <i class="fa fa-angle-right"></i>
      </a>
    @endif
  </ul>
@endif
