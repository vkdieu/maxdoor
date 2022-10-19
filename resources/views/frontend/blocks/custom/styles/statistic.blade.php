@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp
     <section class="counter-one">
      <div class="shape1">
        <img src="{{$image_background}}" alt="#" />
      </div>
      <div class="container">
        <div class="row">

      @if ($block_childs)
          @foreach ($block_childs as $item)
            @php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $icon_sub = $item->json_params->icon->{$locale} ?? $item->icon;
              $image_sub = $item->image != '' ? $item->image : null;
            @endphp
          <div
          class="col-xl-4 col-lg-4 wow animated fadeInUp"
          data-wow-delay="0.1s"
        >
          <div class="counter-one__single text-center">
            <div class="icon-box">
              <span class="alori-icon-three-user-flow"></span>
            </div>

            <div class="text-box">
              <h2>
                <span class="odometer" data-count="{{$brief_sub}}">00</span>
              </h2>
              <p>{{$title_sub}}</p>
            </div>
          </div>
        </div>
          @endforeach
        @endif
      </div>
    </section>
@endif
