@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params['is_featured'] = true;
    $params['taxonomy'] = App\Consts::TAXONOMY['product'];
    
    $rows = App\Http\Services\ContentService::getCmsTaxonomy($params)
        ->limit(4)
        ->get();
  @endphp
  <section class="md-stuck-top content-section">
    <div class="container hyped-block">
      <div class="row cols-md rows-md">
        @isset($rows)
          @foreach ($rows as $item)
            @php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->json_params->image != '' ? $item->json_params->image : ($item->json_params->image_thumb != '' ? $item->json_params->image_thumb : null);
              
              // Viet ham xu ly lay slug
              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id);
              
            @endphp
            <div class="sm-col-6 md-col-3">
              <div class="price-block simple" data-inview-showup="showup-translate-up">
                <div class="price-back"></div>
                <div class="price-image">
                  <a href="{{ $alias_category }}">
                    <img class="image" src="{{ $image }}" alt="{{ $title }}">
                  </a>
                </div>
                <div class="price-title">
                  <a href="{{ $alias_category }}">
                    {{ $title }}
                  </a>
                </div>
                <div class="price-subtext pb-15">{{ Str::limit($brief, 30) }}</div>
                <a class="btn-md btns-bordered btn text-upper" href="{{ $alias_category }}">@lang('View detail')</a>
              </div>
            </div>
          @endforeach
        @endisset
      </div>
    </div>
  </section>

@endif
