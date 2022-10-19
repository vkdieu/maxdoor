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

  <section class="section-padding skills sub-bg">
    <div class="container-xxl">
      <div class="row">
        <div class="col-lg-6">
          <div class="cont md-mb50">
            <h2 class="wow fw-700 mb-20">{!! $brief !!}</h2>
            <p class="text-justify text-light fz-18">{!! nl2br($content) !!}</p>
            @if ($url_link != '')
              <a href="{{ $url_link }}" class="mt-30 butn butn-lg butn-bord">
                <span>{{ $url_link_title }}</span>
              </a>
            @endif
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1 valign">
          @if ($block_childs)
            <div class="skills-box full-width">
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
                <div class="skill-item mb-50">
                  <h6 class="sub-title">{{ $title }}</h6>
                  <div class="skill-progress">
                    <div class="progres custom-font" data-value="{{ $brief }}"></div>
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
@endif
