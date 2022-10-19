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

  <section class="we-do section-padding sub-bg">
    <div class="container-xxl">
      <div class="row">
        <div class="col-lg-6 wow fadeInRight">
          <div class="img md-mb50">
            <img src="{{ $image }}" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="text">
            <h3 class="mb-15 text-uppercase">
              {!! nl2br($brief) !!}
            </h3>
            <p class="fw-400 text-light fz-18">
              {!! nl2br($content) !!}
            </p>
          </div>
        </div>
      </div>
      <div class="row mt-100">
        @if ($block_childs)
          @foreach ($block_childs as $item)
            @php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image != '' ? $item->image : null;
              $url_link = $item->url_link != '' ? $item->url_link : '';
              $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              $icon = $item->icon != '' ? $item->icon : 'pe-7s-bell';
              $style = $item->json_params->style ?? '';
            @endphp
            <div class="col-lg-4 wow fadeInRight mb-50" data-wow-delay="{{ $loop->index * 0.5 }}s">
              <div class="item flex md-mb50">
                <div class="icon mr-30">
                  <span class="main-color fz-55 {{$icon}}"></span>
                </div>
                <div class="cont">
                  <h6 class="mb-15">{{ $title }}</h6>
                  <p>{!! $brief !!}</p>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </section>
@endif
