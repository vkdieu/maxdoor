<footer class="footer-one footer-one--two">
    <div class="footer-one__bg" style="background-image: url(assets/images/backgrounds/footer-v2-bg.jpg);">
    </div>
    <div class="footer-one__top">
        <div class="container">

            <div class="footer-one--two__contact-box">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-one--two__contact-box-inner text-center">
                            <h2>Schedule a free case evaluation.<br> or call us at <a href="tel:123456789">
                                    @isset($web_information->information->phone)
                                        {{ $web_information->information->phone }}
                                    @endisset
                                </a></h2>

                            <div class="footer-one--two__contact-box-btn">
                                <a href="#" class="thm-btn">@lang('contac')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="footer-one__top-wrapper">
                        <div class="row">
                            <!--Start Footer Widget Column-->
                            <div class="col-xl-4 col-lg-4 col-md-6 wow animated fadeInUp" data-wow-delay="0.1s">
                                <div class="footer-widget__column footer-widget__about">
                                    <div class="footer-widget__about-logo">
                                        <a href="{{ route('frontend.home') }}"><img src="{{ $web_information->image->logo_footer ?? '' }}"
                                                alt=""></a>
                                    </div>
                                    <p class="footer-widget__about-text"> @isset($web_information->information->address)
                                            {{ $web_information->information->address }}
                                        @endisset
                                    </p>

                                    <div class="footer-widget__contact-info-social-links">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--End Footer Widget Column-->


                            <!--Start Footer Widget Column-->
                            <div class="col-xl-3 col-lg-3 col-md-6 wow animated fadeInUp" data-wow-delay="0.3s">
                                <div class="footer-widget__column footer-widget__services">


                                    @isset($menu)
                                        @php
                                            $footer_menu = $menu->filter(function ($item, $key) {
                                                return $item->menu_type == 'footer' && ($item->parent_id == null || $item->parent_id == 0);
                                            });
                                            
                                            $content = '';
                                            foreach ($footer_menu as $main_menu) {
                                                $url = $title = '';
                                                $title = isset($main_menu->json_params->title->{$locale}) && $main_menu->json_params->title->{$locale} != '' ? $main_menu->json_params->title->{$locale} : $main_menu->name;
                                                $content .= '<h2 class="footer-widget__title">' . $title . '</h2>';
                                                $content .= ' <ul class="footer-widget__services-list">';
                                                foreach ($menu as $item) {
                                                    if ($item->parent_id == $main_menu->id) {
                                                        $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                                                        $url = $item->url_link;
                                            
                                                        $active = $url == url()->current() ? 'active' : '';
                                            
                                                        $content .= ' <li class="footer-widget__services-list-item"><a " href="' . $url . '">' . $title . '</a>';
                                                        $content .= '</li>';
                                                    }
                                                }
                                                $content .= '</ul>';
                                            }
                                            echo $content;
                                        @endphp
                                    @endisset

                                </div>
                            </div>
                            <!--Start Footer Widget Column-->
                            <div class="col-xl-3 col-lg-3 col-md-6 wow animated fadeInUp" data-wow-delay="0.7s">
                                <div class="footer-widget__column footer-widget__contact-info">
                                    <h2 class="footer-widget__title">Get In Touch</h2>

                                    <div class="footer-widget__contact-info-subscribe-box">
                                        <form class="footer-widget__contact-subscribe-form" action="#">
                                            <div class="input-box">
                                                <input type="email" name="email" placeholder="Email address">
                                            </div>
                                            <button type="submit"><img src="assets/images/icon/right-arrow.png"
                                                    alt="" /></button>
                                        </form>

                                        <div class="checked-box">
                                            <input type="checkbox" name="skipper1" id="skipper" checked="">
                                            <label for="skipper"><span></span>I agree to the Privacy
                                                Policy.</label>
                                        </div>

                                        <p class="footer-widget__about-email"><a href="mailto:needhelp@company.com">
                                                @isset($web_information->information->email)
                                                    {{ $web_information->information->email }}
                                                @endisset
                                            </a></p>

                                    </div>

                                </div>
                            </div>
                            <!--End Footer Widget Column-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Start Footer One Bottom-->
    <div class="footer-one__bottom clearfix">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="footer-one__bottom-inner">
                        <div class="footer-one__bottom-text">
                            <p>Copyright &copy; 2022 All Rights Reserved by</p>
                        </div>

                        <div class="footer-one__bottom-list">
                            <ul>
                                <li><a href="about.html">About Site</a></li>
                                <li><a href="about.html"> Careers</a></li>
                                <li><a href="about.html">Privacy Policy</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Footer One Bottom-->
</footer>
