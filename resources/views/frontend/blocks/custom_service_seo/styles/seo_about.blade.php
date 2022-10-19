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
  <section class="intro-box section-padding sub-bg position-re">
    <div class="container-xxl">
      <div class="row">
        <div class="col-lg-6">
          <div class="img md-mb50">
            <img src="{{ $image }}" alt="">
            <div class="vid-show non-icon md-hide">
              <div class="rotate-circle fz-30 text-u">
                <svg class="textcircle" viewBox="0 0 500 500">
                  <defs>
                    <path id="textcircle" d="M250,400 a150,150 0 0,1 0,-300a150,150 0 0,1 0,300Z">
                    </path>
                  </defs>
                  <text>
                    <textPath xlink:href="#textcircle" textLength="900">
                      FHM AGENCY - FHM AGENCY - FHM AGENCY
                    </textPath>
                  </text>
                </svg>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 valign">

          <div class="accordion">

            <div class="cont mb-3">
              <h3 class="fw-700 mb-15">
                {!! $brief !!}
              </h3>
              <p class="fw-400 text-light fz-18">
                {!! nl2br($content) !!}
              </p>
            </div>

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
                <div class="item wow fadeInUp {{ $loop->index == 0 ? 'active' : '' }} mb-5"
                  data-wow-delay=".{{ ($loop->index + 1) * 2 }}s">
                  <div class="title">
                    <h6 class="fz-18">
                      <i class="fa fa-check mr-15"></i>
                      {{ $title }}
                    </h6>
                  </div>
                </div>
              @endforeach
            @endif

          </div>
        </div>
      </div>
    </div>
    <div class="bg-pattern2 bg-img" data-background="{{ asset('themes/frontend/fhm/arch/img/pattern.svg') }}"></div>
  </section>

@endif
