<header class="main-header main-header--one clearfix">
  <div class="main-header--one__wrapper">
    <div class="auto-container">
      <div class="main-header--one__inner">
        <div class="main-header--one__left">
          <div class="logo">
            <a href="<?php echo e(route('frontend.home')); ?>"
              ><img
                src="<?php echo e($web_information->image->logo_header_dark ?? ''); ?>"
                alt=""
            /></a>
          </div>
        </div>
        <nav class="main-menu main-menu--1">
          <div class="main-menu__inner">
            <a href="#" class="mobile-nav__toggler"
              ><i class="fa fa-bars"></i
            ></a>
            <div class="stricky-one-logo">
              <div class="logo">
                <a href="<?php echo e(route('frontend.home')); ?>"
                  ><img
                    src="<?php echo e($web_information->image->logo_header_dark ?? ''); ?>"
                    alt=""
                /></a>
              </div>
            </div>

            <div class="main-header--one__middle">
              <ul class="main-menu__list">
                <?php if(isset($menu)): ?>
                <?php
                  $main_menu = $menu->first(function ($item, $key) {
                      return $item->menu_type == 'header' && ($item->parent_id == null || $item->parent_id == 0);
                  });
                  if ($main_menu) {
                      $content = '';
                      foreach ($menu as $item) {
                          $url = $title = '';
                          if ($item->parent_id == $main_menu->id) {
                              $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                              $url = $item->url_link;
                              $active = $url == url()->full() ? 'current' : '';
                  
                              if ($item->sub > 0) {
                                  $content .= '<li class="dropdown ' . $active . '"><a href="' . $url . '" >' . $title . '</a>';
                                  $content .= '<ul>';
                                    
                                  foreach ($menu as $item_sub) {
                                      $url = $title = '';
                                      if ($item_sub->parent_id == $item->id) {
                                          $title = isset($item_sub->json_params->title->{$locale}) && $item_sub->json_params->title->{$locale} != '' ? $item_sub->json_params->title->{$locale} : $item_sub->name;
                                          $url = $item_sub->url_link;
                  
                                          $content .= '<li><a href="' . $url . '">' . $title . '</a>';
                  
                                          $content .= '</li>';
                                      }
                                  }
                                  $content .= '</ul>';
                              } else {
                                  $content .= '<li class="' . $active . '"><a href="' . $url . '">' . $title . '</a>';
                              }
                              $content .= '</li>';
                          }
                      }
                      echo $content;
                  }
                ?>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </nav>
         <div class="main-header--one__right clearfix">
                <div class="number">
                  <a href="tel:+84977914444">            <?php echo e($web_information->information->phone); ?>

                  </a>
                </div>

                <div class="social-icon">
                  <ul>
                    <li>
                      <a href="#"><span class="fab fa-facebook"></span></a>
                    </li>
                    <li>
                      <a href="#"><span class="fab fa-linkedin"></span></a>
                    </li>
                    <li>
                      <a href="#"><span class="fab fa-pinterest-p"></span></a>
                    </li>
                    <li>
                      <a href="#"><span class="fab fa-google"></span></a>
                    </li>
                  </ul>
                </div>

                <div class="hidden-content-button bar-box">
                  <a
                    class="side-nav-toggler nav-toggler hidden-bar-opener"
                    href="#"
                  >
                    <ul>
                      <li></li>
                      <li></li>
                      <li></li>
                    </ul>
                    <ul>
                      <li></li>
                      <li></li>
                      <li></li>
                    </ul>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
  

<?php /**PATH C:\xampp\htdocs\maxdoor\resources\views/frontend/blocks/header/styles/home.blade.php ENDPATH**/ ?>