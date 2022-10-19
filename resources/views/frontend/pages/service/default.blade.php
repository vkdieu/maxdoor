@extends('frontend.layouts.service')

@php
$page_title = $taxonomy->title ?? ($page->title ?? $page->name);
$image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
$str_alias = '.html?id=';
$page_brief = $taxonomy->description ?? ($page->description ?? ($page->name ?? null));

@endphp
@push('style')
  <style>

  </style>
@endpush
@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}

  <section class="page-header">
    <div class="page-header__bg" style="background-image: url({{$image_background}});">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-header__wrapper">
                    <div class="page-header__content">
                        <h2>{{$page_title}}</h2>
                        <div class="page-header__menu">
                            <ul>
                                <li><a href="index.html">@lang('Home')</a></li>
                                <li>{{$page_title}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
    {{-- Print all content by [module - route - page] without blocks content at here --}}
    <section class="services-one clearfix">
      <div class="container">
          <div class="sec-title text-center">
              <h2 class="sec-title__title">{{$page_title}}</h2>
              <p class="sec-title__text">{{$page_brief}}</p>
          </div>
  
          <div class="row">
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
                  <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="services-one__single text-center">
                        <div class="services-one__single-icon">
                            <span class="icon-carpet"></span>
                        </div>
                        <h2><a href="{{ $alias }}">{{$title}}</a></h2>
                        <div class="text">
                            <p>{{$brief}}</p>
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
  
      {{-- @include('frontend.components.sidebar.product') --}}
    </div>
  {{-- End content --}}
@endsection
