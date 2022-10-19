<aside class="page-sidebar content-section">
  @php
    $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params['taxonomy'] = App\Consts::TAXONOMY['post'];
    
    $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
  @endphp
  @isset($taxonomys)
    <section class="side-content-section" data-inview-showup="showup-translate-up">
      <h5 class="shift-sm offs-md">@lang('Post category')</h5>
      <ul class="categories-list text-medium solid-color">
        @foreach ($taxonomys as $item)
          @if ($item->parent_id == 0 || $item->parent_id == null)
            @php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id);
            @endphp
            <li>
              <span class="category-line">
                <a class="content-link" href="{{ $alias_category }}">
                  <span class="single-line-text">
                    {{ Str::limit($title, 30) }}
                  </span>
                </a>
              </span>
            </li>
            @foreach ($taxonomys as $sub)
              @if ($sub->parent_id == $item->id)
                @php
                  $title_sub = $sub->json_params->title->{$locale} ?? $sub->title;
                  $alias_category_sub = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title_sub, $sub->id);
                @endphp
                <li>
                  <span class="category-line" style="padding-left:40px;">
                    <a class="content-link" href="{{ $alias_category_sub }}">
                      <span class="single-line-text">
                        {{ Str::limit($title_sub, 30) }}
                      </span>
                    </a>
                  </span>
                </li>
              @endif
            @endforeach
          @endif
        @endforeach
      </ul>
    </section>
    <div class="line-sides main-bg out-lg" data-inview-showup="showup-translate-up"></div>
  @endisset

  @php
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_type'] = App\Consts::POST_TYPE['post'];
    $params['order_by'] = 'id';
    
    $recents = App\Http\Services\ContentService::getCmsPost($params)
        ->limit(App\Consts::DEFAULT_SIDEBAR_LIMIT)
        ->get();
  @endphp
  @isset($recents)
    <section class="side-content-section" data-inview-showup="showup-translate-up">

      <h5 class="shift-sm offs-md">@lang('Latest post')</h5>
      <div class="items">
        @foreach ($recents as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id, 'detail');
          @endphp
          <div class="shop-side-item">
            <div class="item-side-image">
              <a href="{{ $alias }}" class="item-image responsive-1by1">
                <img src="{{ $image }}" alt="{{ $title }}">
              </a>
            </div>
            <div class="item-side">
              <div class="item-title">
                <a href="{{ $alias }}" class="content-link text-upper">{{ Str::limit($title, 50) }}</a>
              </div>
              <div class="item-categories"><a href="{{ $alias_category }}"
                  class="content-link">{{ Str::limit($item->taxonomy_title, 20) }}</a></div>
            </div>
          </div>
        @endforeach
      </div>
    </section>
    <div class="line-sides main-bg out-lg" data-inview-showup="showup-translate-up"></div>
  @endisset

  @php
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_type'] = App\Consts::POST_TYPE['post'];
    $params['order_by'] = 'count_visited';
    
    $mostViews = App\Http\Services\ContentService::getCmsPost($params)
        ->limit(App\Consts::DEFAULT_SIDEBAR_LIMIT)
        ->get();
  @endphp
  @isset($recents)
    <section class="side-content-section" data-inview-showup="showup-translate-up">

      <h5 class="shift-sm offs-md">@lang('Most viewed post')</h5>
      <div class="items">
        @foreach ($mostViews as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id, 'detail');
          @endphp
          <div class="shop-side-item">
            <div class="item-side-image">
              <a href="{{ $alias }}" class="item-image responsive-1by1">
                <img src="{{ $image }}" alt="{{ $title }}">
              </a>
            </div>
            <div class="item-side">
              <div class="item-title">
                <a href="{{ $alias }}" class="content-link text-upper">{{ Str::limit($title, 50) }}</a>
              </div>
              <div class="item-categories"><a href="{{ $alias_category }}"
                  class="content-link">{{ Str::limit($item->taxonomy_title, 20) }}</a></div>

            </div>
          </div>
        @endforeach
      </div>
    </section>
  @endisset
</aside>
