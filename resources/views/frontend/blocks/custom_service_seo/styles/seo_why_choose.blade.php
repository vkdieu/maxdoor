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

  <section class="serv-box section-padding bord-thin-top">
    <div class="container-xxl">
      <div class="sec-head mb-30">
        <div class="row wow fadeIn">
          <div class="col-lg-12">
            <div>
              <h3 class="mb-30 fz-40 text-center">
                {!! nl2br($brief) !!}
              </h3>
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

            <div class="col-lg-4 col-md-6 wow fadeInUp mb-30" data-wow-delay="{{ ($loop->index + 1) * 0.2 }}s">
              <div class="serv-item {{ $loop->index == 0 ? 'bg-danger text-white': ' sub-bg2 '}} md-mb50 text-center mb-30 p-5">
                <span class="icon mb-30">
                  <span class="icon fz-80 {{ $icon }}"></span>
                </span>
                <h6 class="pt-20 bord-thin-top">
                  {!! nl2br($title) !!}
                </h6>
              </div>

            </div>
          @endforeach
        @endif
      </div>
    </div>
  </section>
@endif
