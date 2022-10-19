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
    }

    .posts-sm .entry-image {
      width: 75px;
    }

    img {
      max-width: 100%;
    }

    .entry-image,
    .entry-image>a,
    .entry-image .slide a,
    .entry-image img {
      display: block;
      position: relative;
      width: 100%;
      height: 250px;
    }
  </style>
@endpush

@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}

  <section class="page-title" id="page-title" style="background: url('{{ $image_background }}') center center no-repeat;">
    <div class="container">
      <div class="content">
        <h2 class="text-uppercase">{{ $title }}</h2>
      </div>
    </div>
  </section>

  <section class="blog bg-light" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="blog-single">
            <div class="post">
              <!-- Post Content -->
              <div class="post-content">
                <div class="post-text">
                  {!! $content ?? '' !!}


                  @isset($detail->json_params->gallery_video)
                    @foreach ($detail->json_params->gallery_video as $key => $item)
                      @if ($item->source != '')
                        @if (Str::contains($item->source, 'youtu.be') || Str::contains($item->source, 'youtube.com'))
                          @php
                            if (Str::contains($item->source, 'youtu.be')) {
                                $video_code = 'https://www.youtube.com/embed/' . Str::afterLast($item->source, '/');
                            } else {
                                $video_code = 'https://www.youtube.com/embed/' . Str::afterLast($item->source, 'v=');
                            }
                          @endphp
                          <p class="pt-3">
                            <iframe title="{{ $item->title ?? '' }}" width="100%" height="500" src="{{ $video_code }}"
                              frameborder="0"
                              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                              allowfullscreen>
                            </iframe>
                          </p>
                          <p class="pt-3 text-center"><strong>{{ $item->title ?? '' }}</strong></p>
                        @else
                          <p class="pt-3 center" title="{{ $item->title ?? '' }}">
                            <video preload="auto" controls style="display: block; width: 100%;">
                              <source src='{{ $item->source ?? '' }}' />
                            </video>
                          </p>
                          <p class="pt-3 text-center"><strong>{{ $item->title ?? '' }}</strong></p>
                        @endif
                      @endif
                    @endforeach
                  @endisset


                </div>


              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  {{-- End content --}}
@endsection
