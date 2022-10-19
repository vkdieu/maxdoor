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
  <section class="works-header d-flex align-items-end bord-thin-bottom">
    <div class="background bg-img parallaxie" data-background="{{ $image_background }}" data-overlay-dark="3"></div>
    <div class="container-xxl">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="cont mb-80 wow fadeInUp" data-wow-delay=".5s">
            <h6 class="sub-title main-color">@lang('Our services')</h6>
            <h1 class="fw-700 text-uppercase">{{ $brief }}</h1>
          </div>
          <div class="row wow fadeInRight d-none d-md-block" data-wow-delay="1s">
            <div class="col-md-12">
              <div class="item">
                <p class="fw-500 text-light fz-18 text-justify">{!! nl2br($content) !!}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
