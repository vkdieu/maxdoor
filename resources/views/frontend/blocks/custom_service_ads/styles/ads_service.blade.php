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
  <section class="serv-box section-padding sub-bg position-re">
    <div class="container-xxl ontop">
      <div class="sec-head mb-80">
        <div class="row wow fadeInRight" data-wow-delay=".5s">
          <div class="col-lg-12">
            <div class="">
              <h2 class="fw-700">
                {!! $brief !!}
              </h2>
              <p class="fw-400 text-light fz-18">
                {!! nl2br($content) !!}
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        @if ($block_childs)
          @foreach ($block_childs as $item)
            @php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image != '' ? $item->image : null;
              $url_link = $item->url_link != '' ? $item->url_link : '';
              $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              $icon = $item->icon != '' ? $item->icon : '';
              $style = $item->json_params->style ?? '';
            @endphp
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="serv-item bg-dark md-mb50 text-center mb-30 p-3 wow fadeInUp"
                data-wow-delay="{{ $loop->index * 0.5 }}s">
                <span class="icon mb-30">
                  <img src="{{ $image }}" alt="">
                </span>
                <h5 class="pt-20 bord-thin-top">{{ $title }}</h5>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
    <div class="bg-pattern2 bg-img" data-background="{{ asset('themes/frontend/fhm/arch/img/pattern.svg') }}"></div>
  </section>


@endif
