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

  <section class="hero-serv section-padding bord-thin-bottom">
    <div class="container-xxl">
      <div class="sec-head mb-40">
        <div class="row wow fadeIn" data-wow-delay="0.5s">
          <div class="col-lg-12">
            <div>
              <h3 class="mb-30 fz-40">
                {!! nl2br($brief) !!}
              </h3>
              <h5 class="sub-title main-color fz-18">
                {!! nl2br($content) !!}
              </h5>

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
              $style = $item->json_params->style ?? '';
              $icon = $item->icon ?? 'pe-7s-bell';
            @endphp

            <div class="col-lg-4 wow fadeInRight mb-50" data-wow-delay="{{ $loop->index * 0.5 }}s">
              <div class="item flex md-mb50">
                <div class="icon mr-30">
                  <span class="main-color fz-55 {{ $icon }}"></span>
                </div>
                <div class="cont">
                  <h6 class="mb-15">{{ $title }}</h6>
                  <p class="text-justify">{!! $brief !!}</p>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </section>
@endif
