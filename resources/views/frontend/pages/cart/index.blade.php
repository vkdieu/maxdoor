@extends('frontend.layouts.default')

@php
$page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
$image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
@endphp

@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}

  <section class="with-bg solid-section">
    <div class="fix-image-wrap" data-image-src="{{ $image_background }}" data-parallax="scroll"></div>
    <div class="theme-back"></div>
    <div class="container page-info">
      <div class="section-alt-head container-md">
        <h1 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">{{ $page_title }}</h1>
      </div>
    </div>
    <div class="section-footer">
      <div class="container" data-inview-showup="showup-translate-down">
        <ul class="page-path">
          <li><a href="{{ route('frontend.home') }}">@lang('Home')</a></li>
          <li class="path-separator"><i class="fas fa-chevron-right" aria-hidden="true"></i></li>
          <li>{{ $page_title }}</li>
        </ul>
      </div>
    </div>
  </section>

  <section class="content-section">
    <div class="container">
      @if (session('cart'))
        <div class="cart-line-items offs-lg" data-inview-showup="showup-translate-up">
          <div class="items-head text-upper">
            <div class="item-image">@lang('Product')</div>
            <div class="item-name">&nbsp;</div>
            <div class="item-price">@lang('Price')</div>
            <div class="item-quantity">@lang('Quantity')</div>
            <div class="item-total">@lang('Total')</div>
            <div class="item-remove">&nbsp;</div>
          </div>
          <div class="items">

            @php $total = $quantity = 0 @endphp
            @foreach (session('cart') as $id => $details)
              @php
                $total += $details['price'] * $details['quantity'];
                $quantity += $details['quantity'];
                $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $details['title'], $id, 'detail');
              @endphp

              <div class="item cart-item-line cart_item" data-inview-showup="showup-translate-up"
                data-id="{{ $id }}">
                <div class="item-image">
                  <div class="responsive-1by1">
                    <img src="{{ $details['image_thumb'] ?? $details['image'] }}" alt="{{ $details['title'] }}">
                  </div>
                </div>
                <div class="item-name">
                  <a href="{{ $alias }}" class="content-link">{{ $details['title'] }}</a>
                </div>
                <div class="item-price">
                  {{ isset($details['price']) && $details['price'] > 0 ? number_format($details['price'], 0, ',', '.') . ' ₫' : __('Contact') }}
                </div>
                <div class="item-quantity" style="padding-top: 20px; ">
                  <input class="montserrat-bold alt-color text-sm text-center update-cart qty" type="number"
                    name="quantity" value="{{ $details['quantity'] }}" min="1" autocomplete="off"
                    style="width: 100%;padding: 5px 0px;">

                </div>
                <div class="item-total">
                  {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') . ' ₫' }}
                </div>
                <div class="item-remove"><a href="javascript:void(0)" class="remove remove-from-cart"
                    title="@lang('Remove this item')">
                    <i class="fas fa-times"></i>
                  </a>
                </div>
              </div>
            @endforeach
          </div>
        </div>

        <div class="muted-bg block-md" data-inview-showup="showup-translate-up">

          <form method="POST" action="{{ route('frontend.order.store.product') }}">
            @csrf
            <div class="row cols-lg rows-lg">
              <div class="sm-col-6" data-inview-showup="showup-translate-right">
                <h4 class="text-upper">@lang('Submit Order Cart')</h4>
                <div class="field-group">
                  <div class="field-wrap">
                    <input class="field-control" name="name" placeholder="@lang('Fullname') *" type="text"
                      value="{{ old('name') }}" required="required">
                    <span class="field-back"></span>
                  </div>
                </div>
                <div class="field-group">
                  <div class="field-wrap">
                    <input class="field-control" name="email" type="email" placeholder="Email" required="required"
                      value="{{ old('email') }}">
                    <span class="field-back"></span>
                  </div>
                </div>
                <div class="field-group">
                  <div class="field-wrap">
                    <input class="field-control" name="phone" placeholder="@lang('Phone') *" type="text"
                      value="{{ old('phone') }}" required="required">
                    <span class="field-back"></span>
                  </div>
                </div>

                <div class="field-group shift-md">
                  <div class="field-wrap">
                    <textarea class="field-control" name="address" placeholder="@lang('Address')" required="required">{{ old('address') }}</textarea>
                    <span class="field-back"></span>
                  </div>
                </div>

                <div class="field-group shift-md">
                  <div class="field-wrap">
                    <textarea class="field-control" name="customer_note" placeholder="@lang('Content note')" required="required">{{ old('customer_note') }}</textarea>
                    <span class="field-back"></span>
                  </div>
                </div>
              </div>
              <div class="sm-col-6" data-inview-showup="showup-translate-left">
                <h4 class="text-upper">@lang('Order detail')</h4>
                <div class="muted-bg offs-lg">
                  <div class="checkout-total-line text-sm text-semibold">
                    <div class="title text-upper">
                      @lang('Product total')
                    </div>
                    <div class="value">
                      {{ $quantity }}
                    </div>
                  </div>
                  <div class="checkout-total-separator"></div>
                  <div class="checkout-total-line text-sm">
                    <div class="title text-upper text-semibold">
                      @lang('Total money')
                    </div>
                    <div class="value text-colorful text-bold">
                      {{ number_format($total, 0, ',', '.') . ' ₫' }}
                    </div>
                  </div>
                </div>
                <button class="btn text-upper shift-md col-12 md-col-6 lg-col-4" type="submit">
                  @lang('Submit Order')
                </button>
              </div>
            </div>
          </form>

        </div>
      @else
        <div class="row">
          <div class="col-lg-12">
            <div class="style-msg alertmsg">
              <div class="sb-msg">
                {{-- <i class="icon-warning-sign"></i> --}}
                {{-- <strong>@lang('Warning!')</strong> --}}
                @lang('Cart is empty!')
              </div>
            </div>
          </div>
        </div>
      @endif

    </div>
  </section>

  {{-- End content --}}
@endsection
