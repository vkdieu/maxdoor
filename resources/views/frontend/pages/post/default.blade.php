@extends('frontend.layouts.default')

@php
$page_title = $taxonomy->title ?? ($page->title ?? $page->name);
$image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
@endphp

@push('style')
  <style>

  </style>
@endpush
@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
  <section class="page-header">
    <div class="page-header__bg" style="background-image: url{{$$image_background}});">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-header__wrapper">
                    <div class="page-header__content">
                        <h2>Services</h2>
                        <div class="page-header__menu">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Service</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
          <li>{{ $page_title }}</li>
        </ul>
      </div>
    </div>
  </section>

  <div class="clearfix page-sidebar-right container">
    <div class="page-content">
      <section class="content-section">
        <div class="articles">
          @if ($posts)
            @foreach ($posts as $item)
              @php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                $image = $item->image != '' ? $item->image : ($item->image_thumb != '' ? $item->image_thumb : null);
                $date = date('d', strtotime($item->created_at));
                $month = date('M', strtotime($item->created_at));
                $year = date('Y', strtotime($item->created_at));
                // Viet ham xu ly lay alias bai viet
                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_title, $item->taxonomy_id);
                $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id, 'detail');
              @endphp
              <article class="article" data-inview-showup="showup-translate-up">
                <a href="{{ $alias }}" class="block-link text-center offs-lg">
                  <span class="image-wrap">
                    <img class="image" src="{{ $image }}" alt="{{ $title }}">
                  </span>
                  <span class="hover">
                    <span class="hover-show">
                      <span class="back">
                      </span>
                      <span class="content">
                        <i class="fas fa-search" aria-hidden="true"></i>
                      </span>
                    </span>
                  </span>
                  <span class="date-square main-bg text-center pos-bottom pos-right">
                    <span class="middle-block">
                      <span class="month">{{ $month }}</span>
                      <span class="day">{{ $date }}</span>
                      <span class="year">{{ $year }}</span>
                    </span>
                  </span>
                </a>
                <h3 class="offs-sm"><a class="content-link" href="{{ $alias }}">{{ $title }}</a></h3>
                <p>{{ $brief }}</p>
                <div class="table">
                  <div class="col col-middle">
                    <div class="author">
                      <a class="text-upper" href="{{ $alias_category }}">{{ $item->taxonomy_title }}</a>
                    </div>
                  </div>
                  <div class="col text-right">
                    <a href="{{ $alias }}" class="btn btn-md btns-bordered text-upper">
                      @lang('Read more')
                      <i class="fa fa-angle-double-right"></i>
                    </a>
                  </div>
                </div>
              </article>
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

    @include('frontend.components.sidebar.post')
  </div>

  {{-- End content --}}
@endsection
