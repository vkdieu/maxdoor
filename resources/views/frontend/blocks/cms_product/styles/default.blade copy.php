@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['product'];
    
    $rows = App\Http\Services\ContentService::getCmsPost($params)->get();
    
    $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params['taxonomy'] = App\Consts::TAXONOMY['product'];
    
    $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();

  @endphp
  <section class="solid-section">
    <div class="container">
      <div class="section-head container-md">
        <h2 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">{{ $title }}</h2>
        <p data-inview-showup="showup-translate-left">{{ $brief }}</p>
      </div>
      <div class="row cols-md rows-md">
        @foreach ($rows as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail');
          @endphp

          <div class="md-col-4 sm-col-6" title="{{ $title }}">
            <div class="item shop-item shop-item-simple" data-inview-showup="showup-scale">
              <div class="item-back"></div>
              <a href="{{ $alias }}" class="item-image responsive-1by1">
                <img src="{{ $image }}" alt="{{ $title }}">
              </a>
              <div class="item-content shift-md">
                <div class="item-textes">
                  <div class="item-title text-upper">
                    <a href="{{ $alias }}" class="content-link">{{ Str::limit($title, 20) }}</a>
                  </div>
                  <div class="item-categories">{{ Str::limit($brief, 50) }}</div>
                </div>
                <div class="item-prices">
                  <div class="item-price">
                    {{ isset($item->json_params->price) && $item->json_params->price > 0 ? number_format($item->json_params->price, 0, ',', '.') . ' ₫' : __('Contact') }}
                  </div>
                  <div class="item-old-price">
                    {!! isset($item->json_params->price_old) && $item->json_params->price_old > 0
                        ? number_format($item->json_params->price_old, 0, ',', '.') . ' ₫'
                        : '&nbsp;' !!}
                  </div>
                </div>
              </div>
              <div class="item-links">
                <a href="{{ $alias }}" class="btn text-upper btn-md btns-bordered">@lang('Detail')</a>
                <a href="javascript:void(0)" class="btn text-upper btn-md add-to-cart" data-id="{{ $item->id }}"
                  data-quantity="1">
                  @lang('Add to cart')
                </a>
              </div>
            </div>
          </div>
        @endforeach

      </div>

      <div class="text-center shift-xl"><a class="btn text-upper" href="{{ route('frontend.cms.product') }}"
          data-inview-showup="showup-translate-up"><i class="fas fa-th-large"
            aria-hidden="true"></i>&nbsp;&nbsp;@lang('View all')</a></div>
    </div>
  </section>
  
@endif
