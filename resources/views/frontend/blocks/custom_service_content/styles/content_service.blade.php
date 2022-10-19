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
  <section class="serv-box section-padding position-re pb-40">
    <div class="container-xxl ontop">
      <div class="sec-head">
        <div class="row wow fadeInUp" data-wow-delay=".5s">
          <div class="col-lg-12">
            <div class="text-center">
              <h2 class="fw-700">
                {!! $title !!}
              </h2>
              <p class="fw-400 text-light fz-18">
                {!! nl2br($brief) !!}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-pattern2 bg-img" data-background="{{ asset('themes/frontend/fhm/arch/img/pattern.svg') }}"></div>
  </section>

  @if ($block_childs)
    <section class="process-line section-padding pt-0">
      <div class="container-xxl">
        <div class="row">
          @foreach ($block_childs as $item)
            @php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $content_sub = $item->json_params->content->{$locale} ?? $item->content;
              $image = $item->image != '' ? $item->image : null;
              $url_link = $item->url_link != '' ? $item->url_link : '';
              $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              $icon = $item->icon != '' ? $item->icon : '';
              $style = $item->json_params->style ?? '';
            @endphp
            <div class="col-lg-4 wow fadeInRight" data-wow-delay="{{ ($loop->index + 1) * 0.5 }}s">
              <div class="item">
                <span class="numb stroke fz-70 fw-800 opacity-1">{{ $title_sub }}</span>
                <h5 class="mb-15">
                  {!! $brief_sub !!}
                </h5>
                <p>
                  {!! $content_sub !!}
                </p>
              </div>
            </div>
          @endforeach
        </div>
        <div class="row mt-50">
          <div class="col-lg-12">
            <p class="fw-400 text-light fz-18 wow fadeInUp" data-wow-delay="1s">
              {!! nl2br($content) !!}
            </p>
          </div>
        </div>
      </div>
      <div class="bg-pattern2 bg-img" data-background="{{ asset('themes/frontend/fhm/arch/img/pattern.svg') }}"></div>
    </section>
  @endif
@endif
