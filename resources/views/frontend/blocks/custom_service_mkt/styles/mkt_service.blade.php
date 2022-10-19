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
  <section class="intro-box section-padding bg-dark">
    <div class="container-xxl ">
      <div class="row">
        @if ($style == 'text-right')
          <div class="col-lg-6 wow fadeInRight">
            <div class="img md-mb50">
              <img src="{{ $image }}" alt="">
            </div>
          </div>
          <div class="col-lg-6 valign">

            <div class="cont">

              @if ($block_childs)
                @foreach ($block_childs as $item)
                  @php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $style = $item->json_params->style ?? '';
                  @endphp
                  <div class="flex mb-30 wow fadeInUp" data-wow-delay="{{ ($loop->index + 1) * 0.5 }}s">

                    <div class="text">
                      <h4 class="mb-15">
                        {{ $title }}
                      </h4>
                      <p class="text-light text-justify">
                        {!! nl2br($brief) !!}
                      </p>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
          </div>
        @else
          <div class="col-lg-6 valign">

            <div class="cont">

              @if ($block_childs)
                @foreach ($block_childs as $item)
                  @php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $style = $item->json_params->style ?? '';
                  @endphp
                  <div class="flex mb-30 wow fadeInUp" data-wow-delay="{{ ($loop->index + 1) * 0.5 }}s">

                    <div class="text">
                      <h4 class="mb-15">
                        {{ $title }}
                      </h4>
                      <p class="text-light text-justify">
                        {!! nl2br($brief) !!}
                      </p>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
          </div>

          <div class="col-lg-6 wow fadeInLeft">
            <div class="img md-mb50">
              <img src="{{ $image }}" alt="">
            </div>
          </div>

        @endif

      </div>
    </div>
  </section>

@endif
