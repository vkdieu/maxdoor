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

  <section class="section-padding pb-80 sub-bg">
    <div class="container-xxl">
      <div class="row">
        <div class="col-lg-4 col-md-6 wow fadeInDown">
          <div class="cont mb-50">
            <h6 class="sub-title main-color">{!! $brief !!}</h6>
            <h4 class="wow fw-700">
              {!! nl2br($content) !!}
            </h4>
          </div>
        </div>

        @if ($block_childs)
          @foreach ($block_childs as $item)
            @php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $content = $item->json_params->content->{$locale} ?? $item->content;
              $image = $item->image != '' ? $item->image : null;
              $url_link = $item->url_link != '' ? $item->url_link : '';
              $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              $icon = $item->icon != '' ? $item->icon : '';
              $style = $item->json_params->style ?? '';
            @endphp
            <div class="col-lg-4 col-md-6 wow fadeInRight" data-wow-delay="{{ ($loop->index + 1) * 0.5 }}s">
              <div class="item mb-50 bord-thin-top pt-20">
                <span class="icon mb-15">
                  {{ $title }}
                </span>
                <h6 class="mb-20">
                  <span class="mr-10">/</span> {!! $brief !!}
                </h6>
                <p>
                  {!! nl2br($content) !!}
                </p>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </section>

@endif
