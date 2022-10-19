@extends('frontend.layouts.default')

@php
$title = $detail->json_params->title->{$locale} ?? $detail->title;
$brief = $detail->json_params->brief->{$locale} ?? null;
$content = $detail->json_params->content->{$locale} ?? null;
$image = $detail->image != '' ? $detail->image : null;
$image_thumb = $detail->image_thumb != '' ? $detail->image_thumb : null;
$date = date('H:i d/m/Y', strtotime($detail->created_at));

// For taxonomy
$taxonomy_json_params = json_decode($detail->taxonomy_json_params);
$taxonomy_title = $taxonomy_json_params->title->{$locale} ?? $detail->taxonomy_title;
$image_background = $taxonomy_json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? null);
$taxonomy_alias = Str::slug($taxonomy_title);
$alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $taxonomy_alias, $detail->taxonomy_id);

$seo_title = $detail->json_params->seo_title ?? $title;
$seo_keyword = $detail->json_params->seo_keyword ?? null;
$seo_description = $detail->json_params->seo_description ?? $brief;
$seo_image = $image ?? ($image_thumb ?? null);

@endphp

@push('style')
  <style>
    #content-detail h2 {
      font-size: 30px;
    }

    #content-detail h3 {
      font-size: 24px;
    }

    #content-detail h4 {
      font-size: 18px;
    }

    #content-detail h5,
    #content-detail h6 {
      font-size: 16px;
    }

    #content-detail p {
      margin-top: 0;
      margin-bottom: 0;
    }

    #content-detail h1,
    #content-detail h2,
    #content-detail h3,
    #content-detail h4,
    #content-detail h5,
    #content-detail h6 {
      margin-top: 0;
      margin-bottom: .5rem;
    }

    #content-detail p+h2,
    #content-detail p+.h2 {
      margin-top: 1rem;
    }

    #content-detail h2+p,
    #content-detail .h2+p {
      margin-top: 1rem;
    }

    #content-detail p+h3,
    #content-detail p+.h3 {
      margin-top: 0.5rem;
    }

    #content-detail h3+p,
    #content-detail .h3+p {
      margin-top: 0.5rem;
    }

    #content-detail ul,
    #content-detail ol {
      list-style: inherit;
      padding: 0 0 0 50px;

    }

    #content-detail ul li,
    #content-detail ol li {
      display: list-item;
      list-style: inherit;
    }

    .posts-sm .entry-image {
      width: 75px;
    }
  </style>
@endpush

@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}

  <section class="with-bg solid-section">
    <div class="fix-image-wrap" data-image-src="{{ $image_background }}" data-parallax="scroll"></div>
    <div class="theme-back"></div>
    <div class="container page-info">
      <div class="section-alt-head container-md">
        <h1 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">{{ $title }}</h1>
      </div>
    </div>
    <div class="section-footer">
      <div class="container" data-inview-showup="showup-translate-down">
        <ul class="page-path">
          <li><a href="{{ route('frontend.home') }}">@lang('Home')</a></li>
          <li class="path-separator"><i class="fas fa-chevron-right" aria-hidden="true"></i></li>
          <li><a href="{{ $alias_category }}">{{ $taxonomy_title }}</a></li>
          <li class="path-separator"><i class="fas fa-chevron-right" aria-hidden="true"></i></li>
          <li>{{ $title }}</li>
        </ul>
      </div>
    </div>
  </section>

  <div class="clearfix page-sidebar-right container">
    <div class="page-content">
      <section class="content-section">
        <div class="product">
          <div class="row offs-lg cols-md rows-lg offs-lg" data-inview-showup="showup-translate-up">
            <div class="md-col-5">
              <div class="responsive-1by1 offs-md" data-preview-image="product-preview">
                <img src="{{ $image }}" alt="">
              </div>

            </div>
            <div class="md-col-7">
              <h4 class="text-upper offs-sm">{{ $title }}</h4>
              <div class="product-price">
                {{ isset($detail->json_params->price) && $detail->json_params->price > 0 ? number_format($detail->json_params->price, 0, ',', '.') . ' ₫' : __('Contact') }}
              </div>

              <div class="product-short">
                {!! nl2br($brief) !!}
              </div>

              <div class="row cols-md rows-md">
                <div class="sm-col-5">
                  <div class="field-group field-spin-sides">
                    <div class="field-wrap">
                      <input class="field-control montserrat-bold alt-color text-sm text-center" type="text"
                        name="quantity" value="1" min="1" max="100" id="quantity"
                        data-action-role="field-wheel-spin field-arrows-spin" autocomplete="off">
                      <span class="field-back"></span>
                      <span class="field-actions">
                        <span class="field-increment" data-action-role="field-increment">
                          <i class="fas fa-plus" aria-hidden="true"></i>
                        </span>
                        <span class="field-decrement" data-action-role="field-decrement">
                          <i class="fas fa-minus" aria-hidden="true"></i>
                        </span>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="sm-col-7">
                  <button class="btn text-upper col-12 add-to-cart" data-id="{{ $detail->id }}">
                    <i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp; @lang('Add to cart')
                  </button>
                </div>
              </div>

            </div>
          </div>
          <div class="tabs-lined" data-action-role="tabs" data-inview-showup="showup-translate-up">

            <div class="tabs-line">
              <div class="tab-active-line" data-action-role="active-tab-line"></div>
            </div>
            <div class="tabs-content">
              <div class="tab-content active" data-tab-content="description" style="display: block">
                <div class="content-text" id="content-detail">
                  {!! $content !!}
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="top-separator out-lg" data-inview-showup="showup-translate-up"></div>

        @if (isset($relatedPosts) && count($relatedPosts) > 0)
          <div data-inview-showup="showup-translate-up">

            <h4 class="text-upper">@lang('Related Products')</h4>

            <div class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false"
              data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-lg="3" data-items-xl="3">

              @foreach ($relatedPosts as $item)
                @php
                  $title = $item->json_params->title->{$locale} ?? $item->title;
                  $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                  $image = $item->image_thumb ?? ($item->image ?? null);
                  $date = date('H:i d/m/Y', strtotime($item->created_at));
                  // Viet ham xu ly lay alias bai viet
                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
                  $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail');
                @endphp
                <div class="item shop-item shop-item-lined text-center">
                  <div class="item-image-wrap">
                    <div class="item-back"></div>
                    <a href="{{ $alias }}" class="item-image responsive-1by1">
                      <img src="{{ $image }}" alt="{{ $title }}">
                    </a>
                  </div>
                  <div class="item-title text-upper"><a href="{{ $alias }}"
                      class="content-link">{{ Str::limit($title, 20) }}</a></div>
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
                  <div class="item-links">
                    <a href="javascript:void(0)" class="btn text-upper btn-sm add-to-cart"
                      data-id="{{ $item->id }}" data-quantity="1">
                      @lang('Add to cart')
                    </a>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endif
      </section>
    </div>


    @include('frontend.components.sidebar.product')

  </div>


  {{-- End content --}}
@endsection
