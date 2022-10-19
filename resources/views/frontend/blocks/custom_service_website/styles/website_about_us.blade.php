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
  <section class="about-busin section-padding o-hidden">
    <div class="container-xxl">
      <div class="row">
        <div class="col-lg-6 valign">
          <div class="cont md-mb50">
            <h3 class="mb-30 nav-tabs pb-30 fz-50 wow fadeInRight" data-wow-delay="0.5s">
              {!! $brief !!}
            </h3>
            <p class="text-light fz-20 text-justify wow fadeInUp" data-wow-delay="1s">
              {!! $content !!}
            </p>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1 wow fadeInLeft" data-wow-delay="0.5s">
          <div class="img-exp no-bg">
            <img src="{{ $image }}" alt="">
            <div class="exp">
              <h6 class="sub-title mb-0">FHM AGENCY</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
