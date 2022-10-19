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
@push('style')
  <style>

  </style>
@endpush
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
          <li><a href="{{ route('frontend.cms.service') }}">{{ $page->name ?? '' }}</a></li>
          <li class="path-separator"><i class="fas fa-chevron-right" aria-hidden="true"></i></li>
          <li>{{ $page_title }}</li>
        </ul>
      </div>
    </div>
  </section>

  <section class="muted-bg solid-section">
    <div class="container">

      <div class="row cols-md rows-md">
        @foreach ($posts as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $title, $item->id, 'detail');
          @endphp
          <div class="md-col-4 sm-col-6">
            <div class="item" data-inview-showup="showup-translate-up">
              <a href="{{ $alias }}" class="block-link text-center">
                <span class="image-wrap">
                  <img class="image" src="{{ $image }}" alt="{{ $title }}">
                </span>
                <span class="hover">
                  <span class="hover-show">
                    <span class="back"></span>
                    <span class="content">
                      <i class="fas fa-search" aria-hidden="true"></i>
                    </span>
                  </span>
                </span>
              </a>
              <div class="item-content">
                <div class="item-title text-upper">
                  <a href="{{ $alias }}">{{ $title }}</a>
                </div>
                <div class="item-text">{{ Str::limit($brief, 100) }}</div>
                <a href="{{ $alias }}"
                  class="btn btn-md btns-bordered pull-right text-upper">@lang('View detail')</a>
              </div>
            </div>
          </div>
        @endforeach

      </div>

      <div class="text-center shift-lg" data-inview-showup="showup-translate-up">
        <div class="paginator">
          {{ $posts->withQueryString()->links('frontend.pagination.default') }}
        </div>
      </div>
    </div>
  </section>
  {{-- End content --}}
@endsection
