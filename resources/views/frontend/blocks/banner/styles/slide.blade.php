@if ($block)
@php
$title = $block->json_params->title->{$locale} ?? $block->title;
$brief = $block->json_params->brief->{$locale} ?? $block->brief;
$content = $block->json_params->content->{$locale} ?? $block->content;
$image_background = $block->image_background != '' ? $block->image_background : '';
$url_link = $block->url_link != '' ? $block->url_link : '';
$url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
$style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
// Filter all blocks by parent_id
$block_childs = $blocks->filter(function ($item, $key) use ($block) {
    return $item->parent_id == $block->id;
});
@endphp
  <section class="main-slider main-slider-one">
    <div
      class="swiper-container thm-swiper__slider"
      data-swiper-options='{"slidesPerView": 1, "loop": true, "effect": "fade", "pagination": {
        "el": "#main-slider-pagination",
        "type": "bullets",
        "clickable": true
        },
        "navigation": {
        "nextEl": "#main-slider__swiper-button-next",
        "prevEl": "#main-slider__swiper-button-prev"
        },
        "autoplay": {
        "delay": 7000
        }}'
    >
      <div class="swiper-wrapper">
        <!--Start Single Swiper Slide-->
       

        <!--Start Single Swiper Slide-->
      
        @if ($block_childs)
          @foreach ($block_childs as $item)
            @php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image != '' ? $item->image : null;
              $image_background = $item->image_background != '' ? $item->image_background : null;
              $video = $item->json_params->video ?? null;
              $video_background = $item->json_params->video_background ?? null;
              $url_link = $item->url_link != '' ? $item->url_link : '';
              $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              $icon = $item->icon != '' ? $item->icon : '';
              $style = isset($item->json_params->style) ? $item->json_params->style : '';
              
              $image_for_screen = null;
              if ($agent->isDesktop() && $image_background != null) {
                  $image_for_screen = $image_background;
              } else {
                  $image_for_screen = $image;
              }
              
            @endphp
            <div class="swiper-slide">
              <div
                class="image-layer"
                style="
                  background-image: url({{$image}});
                "
              ></div>
              <div class="container">
                <div class="row">
                  <div class="col-xl-12">
                    <div class="main-slider-one__inner text-center">
                      <p class="main-slider-one__text">{{$title}}</p>
                      <h2 class="main-slider-one__title">
                       {{$brief}}
                      </h2>
                      <div class="main-slider-one__btn">
                        <a href="#" class="thm-btn">{{$url_link_title}}</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </section>

@endif
