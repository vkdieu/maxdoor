@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp

  <section class="section-padding pb-90 bord-thin-bottom">
    <div class="container-xxl">
      <div class="row">
        <div class="col-lg-3">
          <div class="sec-head mb-50 wow fadeInRight" data-wow-delay="0.5s">
            <h2 class="fz-40">
              {!! $title !!}
            </h2>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="cont wow fadeInUp" data-wow-delay="1s">
            <h3 class="fw-600 font-content">
              {!! $brief !!}
            </h3>
            <div class="exp d-flex align-items-center mt-30 text-justify">
              <div>
                <span class="font-content fz-18">{!! nl2br($content) !!}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endif
