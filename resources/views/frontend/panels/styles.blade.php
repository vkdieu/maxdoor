<link
      rel="apple-touch-icon"
      sizes="180x180"
      href="{{ asset('themes/frontend/maxdoor/assets/images/favicons/apple-touch-icon.png') }}"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="{{ asset('themes/frontend/maxdoor/assets/images/favicons/favicon-32x32.png') }}"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset('themes/frontend/maxdoor/assets/images/favicons/favicon-16x16.png') }}"
    />
    <link rel="manifest" href="{{ asset('themes/frontend/maxdoor/assets/images/favicons/site.webmanifest') }}" />
    <meta name="description" content="Alori HTML5 Template" />

    <!-- fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Domine:wght@400;500;600;700&amp;family=Kumbh+Sans:wght@400;500;600;700;800&amp;display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="{{ asset('themes/frontend/maxdoor/assets/vendors/bootstrap/css/bootstrap.min.css') }}"
    />
    <link rel="stylesheet" href="{{ asset('themes/frontend/maxdoor/assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/frontend/maxdoor/assets/vendors/animate/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/frontend/maxdoor/assets/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/frontend/maxdoor/assets/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/frontend/maxdoor/assets/vendors/icomoon-icons2/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/frontend/maxdoor/assets/vendors/icomoon-icons/style.css') }}" />
    <link
      rel="stylesheet"
      href="{{ asset('themes/frontend/maxdoor/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('themes/frontend/maxdoor/assets/vendors/nouislider/nouislider.min.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('themes/frontend/maxdoor/assets/vendors/nouislider/nouislider.pips.css') }}"
    />
    <link rel="stylesheet" href="{{ asset('themes/frontend/maxdoor/assets/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/frontend/maxdoor/assets/vendors/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/frontend/maxdoor/assets/vendors/icomoon-icons/style.css') }}" />
    <link
      rel="stylesheet"
      href="{{ asset('themes/frontend/maxdoor/assets/vendors/tiny-slider/tiny-slider.min.css') }}"
    />
    <link rel="stylesheet" href="{{ asset('themes/frontend/maxdoor/assets/vendors/reey-font/stylesheet.css') }}" />
    <link
      rel="stylesheet"
      href="{{ asset('themes/frontend/maxdoor/assets/vendors/owl-carousel/owl.carousel.min.css') }}"
    />
    <link
      rel="stylesheet"  
      href="{{ asset('themes/frontend/maxdoor/assets/vendors/owl-carousel/owl.theme.default.min.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('themes/frontend/maxdoor/assets/vendors/twentytwenty/twentytwenty.css') }}"
    />

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('themes/frontend/maxdoor/assets/css/alori.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/frontend/maxdoor/assets/css/alori-responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/frontend/maxdoor/assets/css/custom.css') }}" />

<style>
  .pb-15 {
    padding-bottom: 15px;
  }

  .shop-item .item-content {
    padding: 0 140px 0 0;
  }

  .shop-item .item-content .item-prices {
    text-align: right;
    width: 130px;
    margin-right: -140px;
    float: right;
  }

  .image-wrap {
    padding-bottom: 100%;
  }

  .image-wrap .image {
    height: 100% !important;
  }

  @media only screen and (max-width: 992px) {
    .screen-height {
      height: 100vw;
    }
  }

  .theme-back {
    background: -webkit-linear-gradient(bottom, rgba(53, 53, 74, 0.3) 0%, rgba(53, 53, 74, 0.4) 75%, rgba(53, 53, 74, 0.5) 100%);
    background: -moz-linear-gradient(bottom, rgba(53, 53, 74, 0.3) 0%, rgba(53, 53, 74, 0.4) 75%, rgba(53, 53, 74, 0.5) 100%);
    background: -o-linear-gradient(bottom, rgba(53, 53, 74, 0.3) 0%, rgba(53, 53, 74, 0.4) 75%, rgba(53, 53, 74, 0.5) 100%);
    background: -ms-linear-gradient(bottom, rgba(53, 53, 74, 0.3) 0%, rgba(53, 53, 74, 0.4) 75%, rgba(53, 53, 74, 0.5) 100%);
    background: linear-gradient(to top, rgba(53, 53, 74, 0.3) 0%, rgba(53, 53, 74, 0.4) 75%, rgba(53, 53, 74, 0.5) 100%);
  }
</style>
@isset($web_information->source_code->css)
  <style>
    {!! $web_information->source_code->css !!}
  </style>
@endisset
