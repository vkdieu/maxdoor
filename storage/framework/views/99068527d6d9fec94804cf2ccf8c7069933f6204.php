<footer class="footer-one">
  <div
    class="footer-one__bg"
    style="
      background-image: url(assets/images/backgrounds/footer-v1-bg.jpg);
    "
  ></div>
  <div class="footer-one__top">
    <div class="container">
      <div class="footer-one__subscribe-box">
        <div class="row">
          <div class="col-xl-6 col-lg-6">
            <div class="footer-one__subscribe-box-text">
              <h2>Đăng kí<br />để nhận thông tin mới nhất.</h2>
            </div>
          </div>

          <div class="col-xl-6 col-lg-6">
            <div class="footer-one__subscribe-box-right">
              <form class="subscribe-form" action="#">
                <div class="input-box">
                  <input
                    type="email"
                    name="email"
                    placeholder="Email của bạn"
                  />
                </div>
                <button type="submit">
                  <img src="assets/images/icon/right-arrow.png" alt="" />
                </button>
              </form>

              <div class="checked-box">
                <input
                  type="checkbox"
                  name="skipper1"
                  id="skipper"
                  checked=""
                />
                <label for="skipper"
                  ><span></span>Tôi đồng ý với các điều khoản dịch
                  vụ.</label
                >
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
              <div
                class="col-xl-4 col-lg-4 col-md-6 wow animated fadeInUp"
                data-wow-delay="0.1s"
              >
                <div class="footer-widget__column footer-widget__about">
                  <div class="footer-widget__about-logo">
                    <a href="<?php echo e(route('frontend.home')); ?>"
                      ><img
                        src="<?php echo e($web_information->image->logo_footer ?? ''); ?>"
                        alt=""
                    /></a>
                  </div>
                  <p class="footer-widget__about-text">
                    <?php if(isset($web_information->information->address)): ?>
               
                    <?php echo e($web_information->information->address); ?>

                
                <?php endif; ?>
                  </p>
                  <p class="footer-widget__about-email">
                    <a href="mailto:needhelp@company.com"
                      ><?php if(isset($web_information->information->email)): ?>
               
                      <?php echo e($web_information->information->email); ?>

                  
                  <?php endif; ?></a
                    >
                  </p>
                </div>
              </div>
              <!--End Footer Widget Column-->

              <!--Start Footer Widget Column-->
              <div
                class="col-xl-3 col-lg-3 col-md-6 wow animated fadeInUp"
                data-wow-delay="0.3s"
              >
                <div
                  class="footer-widget__column footer-widget__services"
                >
              
<?php if(isset($menu)): ?>
<?php
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
?>
<?php endif; ?>
                </div>
              </div>
              <!--End Footer Widget Column-->

          

              <!--Start Footer Widget Column-->
              <div
                class="col-xl-3 col-lg-3 col-md-6 wow animated fadeInUp"
                data-wow-delay="0.7s"
              >
                <div
                  class="footer-widget__column footer-widget__contact-info"
                >
                  <h2 class="footer-widget__title">Mạng xã hội</h2>

                  <div class="footer-widget__contact-info-social-links">
                    <ul>
                      <li>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                      </li>
                    </ul>
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
              <p>Bản quyền &copy; 2022 thuộc về FHM Agency</p>
            </div>

            <div class="footer-one__bottom-list">
              <ul>
                <li><a href="http://127.0.0.1:8000/danh-muc-san-pham">Sản Phẩm</a></li>
                <li><a href="http://127.0.0.1:8000/danh-muc-dich-vu">Dịch Vụ </a></li>
                <li><a href="http://127.0.0.1:8000/lien-he">Liên Hệ</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End Footer One Bottom-->
</footer>
           

<?php /**PATH C:\xampp\htdocs\maxdoor\resources\views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>