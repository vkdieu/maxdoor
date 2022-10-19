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
      <section class="product-one">
        <div class="container">
          <div class="sec-title text-center">
            <h2 class="sec-title__title">{{$title}}</h2>
            <p class="sec-title__text">
              {{$brief}}
            </p>
          </div>
          <div class="row">

  
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

      
      <div
      class="col-xl-4 col-lg-4 col-md-6 wow fadeInLeft"
      data-wow-delay="0ms"
      data-wow-duration="1500ms"
    >
      <div class="product-one__single">
        <div class="product-one__single-img">
          <img
            src="{{$image}}"
            alt=""
          />
        </div>

        <div class="product-one__single-content text-center">
          <h2><a href="{{$alias_category}}l">{{$title}}</a></h2>
          <p>
            <span><del>{!! isset($item->json_params->price_old) && $item->json_params->price_old > 0
              ? number_format($item->json_params->price_old, 0, ',', '.') . ' ₫'
              : '&nbsp;' !!}</del></span> {{ isset($item->json_params->price) && $item->json_params->price > 0 ? number_format($item->json_params->price, 0, ',', '.') . ' ₫' : __('Contact') }}
          </p>
        </div>
      </div>
    </div>
    @endforeach
  @endisset
</div>
</div>
</section>

