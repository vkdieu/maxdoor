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
  <div class="vline tline"></div>
  <header class="pg-header style2 bg-img parallaxie valign" data-background="{{ $image_background }}"
    data-overlay-dark="4">
    <div class="container-xxl ontop">
      <div class="row wow fadeInUp" data-wow-delay="0.5s">
        <div class="col-lg-12">
          <div class="cont mb-80">
            <h6 class="sub-title">
              <span class="main-color">@lang('About us')</span>
            </h6>
            <h1 class="fw-700 fz-70">
              {!! $brief !!}
            </h1>
          </div>
        </div>
      </div>
    </div>
    <div class="curve">
      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100%" viewBox="0 0 100 100"
        preserveAspectRatio="none">
        <path d="M0 100 0 0 C15 120 35 120 100 0 L 100 100 Z" fill="#191b1d"></path>
      </svg>
    </div>
  </header>

@endif
