@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['post'];
    
    $rows = App\Http\Services\ContentService::getCmsPost($params)->get();
  @endphp

  <section class="events" id="blog">
    <div class="container-fluid">
      <div class="main-title text-center">
        <span class="separator">
          <i class="flaticon-chakra"></i>
        </span>
        <h2>{!! $title !!}</h2>
      </div>
      <div class="row">
        @foreach ($rows as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id, 'detail');
          @endphp
          <div class="col-lg-4">
            <div class="event">
              <div class="event-img">
                <img src="{{ $image }}" alt="{{ $title }}" />
              </div>
              <div class="event-content p-3">
                <div class="event-title">
                  <a href="{{ $alias }}">
                    <h4>{{ $title }}</h4>
                  </a>
                </div>
                <ul class="event-info list-unstyled">
                  <li class="time">
                    <i class="flaticon-clock-circular-outline"></i>{{ $date }}
                  </li>
                </ul>
                <div class="event-text">
                  <p>
                    {{ Str::limit($brief, 50) }}
                  </p>
                </div>
                <a class="event-more" href="{{ $alias }}">@lang('View detail')</a>
              </div>
            </div>
          </div>
        @endforeach

      </div>
      @if ($url_link != '')
        <div class="my-btn text-center">
          <a href="{{ $url_link }}" target="_blank" class="main-btn"><span>{{ $url_link_title }}</span></a>
        </div>
      @endif

    </div>
  </section>
@endif
