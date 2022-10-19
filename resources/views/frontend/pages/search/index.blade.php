@extends('frontend.layouts.default')

@php
$page_title = $taxonomy->title ?? ($page->title ?? $page->name);
$image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
@endphp

@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
  <section class="page-title" id="page-title" style="background: url('{{ $image_background }}') center center no-repeat;">
    <div class="container">
      <div class="content">
        <h2 class="text-uppercase">
          {{ $page_title }}
          @if (isset($params['keyword']) && $params['keyword'] != '')
            {!! ': ' . $params['keyword'] !!}
          @endif
        </h2>
      </div>
    </div>
  </section>

  <section class="blog bg-light" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          @if ($posts)
            <div class="row">

              @foreach ($posts as $item)
                @php
                  $title = $item->json_params->title->{$locale} ?? $item->title;
                  $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                  $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                  $date = date('H:i d/m/Y', strtotime($item->created_at));
                  // Viet ham xu ly lay alias bai viet
                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_title, $item->taxonomy_id);
                  $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id, 'detail');
                @endphp

                <div class="col-lg-6 col-12">
                  <div class="post">
                    <!-- Post Image -->
                    <div class="post-img">
                      <a href="{{ $alias }}">
                        <img src="{{ $image }}" class="img-fluid" alt="{{ $title }}">
                      </a>
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                      <div class="post-title">
                        <a href="{{ $alias }}">
                          <h4>{{ $title }}</h4>
                        </a>
                      </div>
                      <div class="post-text">
                        <p>{{ Str::limit($brief, 100) }}</p>
                      </div>
                      <ul class="post-info list-unstyled">
                        <li class="pull-left">
                          <a href="{{ $alias }}" class="post-more">
                            @lang('Read more')
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              @endforeach

            </div>

            {{ $posts->withQueryString()->links('frontend.pagination.default') }}
          @else
            <div class="row">
              <div class="col-12">
                <p>@lang('not_found')</p>
              </div>
            </div>
          @endif
        </div>
        <div class="col-lg-4">
          <div class="blog-sidebar">
            <div class="sidebar-search">
              <form action="{{ route('frontend.search.index') }}" method="GET">
                <div class="form-group">
                  <input type="text" class="form-control" name="keyword" placeholder="@lang('Type and hit enter...')" required>
                  <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                </div>
              </form>
            </div>

            @if (count($latestPosts) > 0)
              <div class="sidebar-posts">
                <h4 class="title-widget text-uppercase">@lang('Latest post')</h4>
                @foreach ($latestPosts as $item)
                  @php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                    $date = date('d/m/Y', strtotime($item->created_at));
                    // Viet ham xu ly lay slug
                    $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_title, $item->taxonomy_id);
                    $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id, 'detail');
                  @endphp
                  <div class="post-inner mb-5">
                    <div class="post-image">
                      <a href="{{ $alias }}">
                        <img class="img-fluid" src="{{ $image }}" alt="{{ $title }}">
                      </a>
                    </div>
                    <div class="post-info">
                      <h5>
                        <a href="{{ $alias }}">
                          {{ Str::limit($title, 20) }}
                        </a>
                      </h5>
                      <p>{{ $date }}</p>
                    </div>
                  </div>
                @endforeach
              </div>
            @endif
            @if (count($viewPosts) > 0)
              <div class="sidebar-posts">
                <h4 class="title-widget text-uppercase">@lang('Most viewed post')</h4>
                @foreach ($viewPosts as $item)
                  @php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                    $date = date('d/m/Y', strtotime($item->created_at));
                    // Viet ham xu ly lay slug
                    $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_title, $item->taxonomy_id);
                    $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id, 'detail');
                  @endphp
                  <div class="post-inner mb-5">
                    <div class="post-image">
                      <a href="{{ $alias }}">
                        <img class="img-fluid" src="{{ $image }}" alt="{{ $title }}">
                      </a>
                    </div>
                    <div class="post-info">
                      <h5>
                        <a href="{{ $alias }}">
                          {{ Str::limit($title, 20) }}
                        </a>
                      </h5>
                      <p>{{ $date }}</p>
                    </div>
                  </div>
                @endforeach
              </div>
            @endif

            @if (isset($featuredTags) && count($featuredTags) > 0)
              <div class="sidebar-tags">
                <h4 class="text-uppercase">@lang('Tags')</h4>
                <ul class="tags-list list-unstyled">
                  @foreach ($featuredTags as $item)
                    @php
                      $title = $item->json_params->title->{$locale} ?? $item->title;
                      $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['tags'], $title, $item->id);
                    @endphp
                    <li>
                      <a href="{{ $alias }}">
                        {{ $title }}
                      </a>
                    </li>
                  @endforeach
                </ul>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- End content --}}
@endsection
