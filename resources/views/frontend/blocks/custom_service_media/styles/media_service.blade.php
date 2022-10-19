@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = $block->json_params->style ?? 'text-right';
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp

  <section class="hero-serv section-padding text-center">
    <div class="container-xxl">
      <div class="sec-head mb-80 bord-thin-bottom">
        <div class="row wow fadeIn" data-wow-delay="0.5s">
          <div class="col-lg-12">
            <div>
              <h3 class="mb-30 fz-50">
                {!! nl2br($brief) !!}
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="row ">
        @if ($block_childs)
          @foreach ($block_childs as $item)
            @php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $style = $item->json_params->style ?? '';
              $icon = $item->icon ?? 'pe-7s-bell';
            @endphp


            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ ($loop->index + 1) * 0.5 }}s">
              <div class="serv-item md-mb50 mb-30 p-1">
                <div class="icons mb-40">
                  <span class="icon fz-80 {{ $icon }} main-color"></span>
                </div>
                <h6 class="mb-15 pt-20 bord-thin-top">
                  {{ $title }}
                </h6>
                <p class="text-justify">
                  {!! nl2br($brief) !!}
                </p>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </section>
@endif
