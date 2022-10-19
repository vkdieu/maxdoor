@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp

  <section class="crv-footer section-padding sub-bg position-re bord-thin-bottom">
    <div class="container-xxl ontop">
      <div class="row">
        <div class="col-lg-8 valign wow fadeInRight" data-wow-delay="0.5s">
          <div class="cal">
            <h3 class="fw-700">
              {{ $brief }}
            </h3>
            <span class="text-light fz-20">
              {!! $content !!}
            </span>
          </div>
        </div>
        <div class="col-lg-4 wow fadeInLeft" data-wow-delay="1s">
          @if ($url_link != '')
            <div class="call-buton valign text-center">
              <a href="{{ $url_link }}">
                <h6 class="fw-800">{{ $url_link_title }}</h6>
              </a>
            </div>
          @endif
        </div>
      </div>
    </div>

    <div class="bg-pattern2 bg-img" data-background="{{ asset('themes/frontend/fhm/arch/img/pattern.svg') }}"></div>
  </section>

@endif
