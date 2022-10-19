@extends('frontend.layouts.default')

@php
$page_title = $taxonomy->title ?? ($page->title ?? $page->name);
$image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');

$title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
$image = $taxonomy->json_params->image ?? null;
$seo_title = $taxonomy->json_params->seo_title ?? $title;
$seo_keyword = $taxonomy->json_params->seo_keyword ?? null;
$seo_description = $taxonomy->json_params->seo_description ?? null;
$seo_image = $image ?? null;

@endphp

@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}

  <section class="with-bg solid-section">
    <div class="fix-image-wrap" data-image-src="{{ $image_background }}" data-parallax="scroll"></div>
    <div class="theme-back"></div>
    <div class="container page-info">
      <div class="section-alt-head container-md">
        <h1 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">{{ $page_title }}</h1>
      </div>
    </div>
    <div class="section-footer">
      <div class="container" data-inview-showup="showup-translate-down">
        <ul class="page-path">
          <li><a href="{{ route('frontend.home') }}">@lang('Home')</a></li>
          <li class="path-separator"><i class="fas fa-chevron-right" aria-hidden="true"></i></li>
          <li><a href="{{ route('frontend.cms.product') }}">{{ $page->name ?? '' }}</a></li>
          <li class="path-separator"><i class="fas fa-chevron-right" aria-hidden="true"></i></li>
          <li>{{ $page_title }}</li>
        </ul>
      </div>
    </div>
  </section>
  
  <div class="clearfix page-sidebar-right container">
    <div class="page-content">
      <section class="content-section">
        <div class="row cols-md rows-md">
          @if ($posts)
            @foreach ($posts as $item)
              @php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                $image = $item->image_thumb ?? ($item->image ?? null);
                $date = date('H:i d/m/Y', strtotime($item->created_at));
                // Viet ham xu ly lay alias bai viet
                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
                $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail');
              @endphp
              <div class="md-col-6" title="{{ $title }}">
                <div class="item shop-item shop-item-simple" data-inview-showup="showup-scale">
                  <div class="item-back"></div>
                  <a href="{{ $alias }}" class="item-image responsive-1by1">
                    <img src="{{ $image }}" alt="{{ $title }}">
                  </a>
                  <div class="item-content shift-md">
                    <div class="item-textes">
                      <div class="item-title text-upper">
                        <a href="{{ $alias }}" class="content-link">{{ Str::limit($title, 20) }}</a>
                      </div>
                      {{-- <div class="item-categories">{{ Str::limit($brief, 50) }}</div> --}}
                      <div class="tt-rating">
                        <i class="tt-star fa fa-star" aria-hidden="true"></i>
                        <i class="tt-star fa fa-star" aria-hidden="true"></i>
                        <i class="tt-star fa fa-star" aria-hidden="true"></i>
                        <i class="tt-star fa fa-star" aria-hidden="true"></i>
                        <i class="tt-star fa fa-star" aria-hidden="true"></i>
                      </div>
                    </div>
                    <div class="item-prices">
                      <div class="item-price">
                        {{ isset($item->json_params->price) && $item->json_params->price > 0 ? number_format($item->json_params->price, 0, ',', '.') . ' ₫' : __('Contact') }}
                      </div>
                      <div class="item-old-price">
                        {!! isset($item->json_params->price_old) && $item->json_params->price_old > 0
                            ? number_format($item->json_params->price_old, 0, ',', '.') . ' ₫'
                            : '&nbsp;' !!}
                      </div>
                    </div>
                  </div>
                  <div class="item-links">
                    <a href="{{ $alias }}" class="btn text-upper btn-md btns-bordered">@lang('Detail')</a>
                    <a href="javascript:void(0)" class="btn text-upper btn-md add-to-cart" data-id="{{ $item->id }}"
                      data-quantity="1">
                      @lang('Add to cart')
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <p>@lang('not_found')</p>
          @endif
        </div>

        <div class="text-center shift-lg" data-inview-showup="showup-translate-up">
          <div class="paginator">
            {{ $posts->withQueryString()->links('frontend.pagination.default') }}
          </div>
        </div>
      </section>
    </div>

    @include('frontend.components.sidebar.product')
  </div>
  {{-- End content --}}
@endsection
