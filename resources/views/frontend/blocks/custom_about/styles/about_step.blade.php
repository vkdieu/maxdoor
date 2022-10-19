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

  <section class="section-padding pb-80 bg-dark bord-thin-top">
    <div class="container-xxl">
      <div class="sec-head mb-80 text-center ">
        <div class="row wow fadeIn" data-wow-delay="0.5s">
          <div class="col-lg-12">
            <div>
              <h3 class="mb-30 fz-50 text-uppercase">
                {!! nl2br($brief) !!}
              </h3>
              <h5 class="fz-18 fw-400 font-content">
                {!! nl2br($content) !!}
              </h5>

            </div>
          </div>
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
          @if ($loop->index % 2 == 0)
            <section class="about-busin section-padding o-hidden bord-thin-top">
              <div class="container-xxl">
                <div class="row">
                  <div class="col-lg-6 valign">
                    <div class="cont md-mb50">
                      <h3 class="mb-30 nav-tabs pb-30 fz-40 wow fadeInRight text-uppercase" data-wow-delay="0.5s">
                        {!! $title !!}
                      </h3>
                      <p class="text-light fz-18 text-justify wow fadeInUp" data-wow-delay="1s">
                        {!! $brief !!}
                      </p>
                    </div>
                  </div>
                  <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.5s">
                    <div class="img-exp no-bg">
                      <img src="{{ $image }}" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </section>
          @else
            <section class="about-busin section-padding o-hidden bord-thin-top">
              <div class="container-xxl">
                <div class="row">
                  <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.5s">
                    <div class="img-exp no-bg">
                      <img src="{{ $image }}" alt="">
                    </div>
                  </div>

                  <div class="col-lg-6 valign">
                    <div class="cont md-mb50">
                      <h3 class="mb-30 nav-tabs pb-30 fz-40 wow fadeInLeft text-uppercase" data-wow-delay="0.5s">
                        {!! $title !!}
                      </h3>
                      <p class="text-light fz-18 text-justify wow fadeInUp" data-wow-delay="1s">
                        {!! $brief !!}
                      </p>
                    </div>
                  </div>
                  
                </div>
              </div>
            </section>
          @endif
        @endforeach
      @endif
    </div>
  </section>

@endif
