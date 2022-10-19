<footer class="footer alt-bg">
  <div class="container only-xs-text-justify-center">
    <div class="solid-section">
      <div class="row cols-md">
        <div class="sm-col-3">
          <div class="footer-logo"><img src="<?php echo e($web_information->image->logo_footer ?? ''); ?>" alt="Logo"></div>
          <div class="footer-text sm-text-justify">
            <?php echo e($web_information->information->slogan ?? ''); ?>

          </div>
        </div>
        <div class="sm-col-8 sm-push-1">
          <div class="row cols-md">
            <div class="sm-col-4">
              <div class="footer-title text-upper">
                <?php echo app('translator')->get('Contact'); ?>
              </div>
              <?php if(isset($web_information->information->address)): ?>
                <div class="footer-text">
                  <?php echo e($web_information->information->address); ?>

                </div>
              <?php endif; ?>
              <?php if(isset($web_information->information->phone)): ?>
                <div class="footer-text">
                  <?php echo e($web_information->information->phone); ?>

                </div>
              <?php endif; ?>
              <?php if(isset($web_information->information->email)): ?>
                <div class="footer-text">
                  <?php echo e($web_information->information->email); ?>

                </div>
              <?php endif; ?>

            </div>
            <div class="sm-col-4">
              <?php if(isset($menu)): ?>
                <?php
                  $footer_menu = $menu->filter(function ($item, $key) {
                      return $item->menu_type == 'footer' && ($item->parent_id == null || $item->parent_id == 0);
                  });
                  
                  $content = '';
                  foreach ($footer_menu as $main_menu) {
                      $url = $title = '';
                      $title = isset($main_menu->json_params->title->{$locale}) && $main_menu->json_params->title->{$locale} != '' ? $main_menu->json_params->title->{$locale} : $main_menu->name;
                      $content .= '<div class="footer-title text-upper">' . $title . '</div>';
                      $content .= '<ul class="list">';
                      foreach ($menu as $item) {
                          if ($item->parent_id == $main_menu->id) {
                              $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                              $url = $item->url_link;
                  
                              $active = $url == url()->current() ? 'active' : '';
                  
                              $content .= '<li><a class="content-link" href="' . $url . '">' . $title . '</a>';
                              $content .= '</li>';
                          }
                      }
                      $content .= '</ul>';
                  }
                  echo $content;
                ?>
              <?php endif; ?>

            </div>
            <div class="sm-col-4">
              <div class="footer-title text-upper">Mạng xã hội</div>
              <div class="cols-list socials cols-sm inline-block">
                <?php if(isset($web_information->social->facebook)): ?>
                  <a href="<?php echo e($web_information->social->facebook); ?>" target="_blank" class="list-item text-white">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                <?php endif; ?>
                <?php if(isset($web_information->social->twitter)): ?>
                  <a href="<?php echo e($web_information->social->twitter); ?>" target="_blank" class="list-item text-white">
                    <i class="fab fa-twitter"></i>
                  </a>
                <?php endif; ?>
                <?php if(isset($web_information->social->instagram)): ?>
                  <a href="<?php echo e($web_information->social->instagram); ?>" target="_blank" class="list-item text-white">
                    <i class="fab fa-instagram"></i>
                  </a>
                <?php endif; ?>
                <?php if(isset($web_information->social->youtube)): ?>
                  <a href="<?php echo e($web_information->social->youtube); ?>" target="_blank" class="list-item text-white">
                    <i class="fab fa-youtube"></i>
                  </a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-copyrights text-center top-separator ins-md">
      &copy; 2022 <a href="https://www.fhmvietnam.com" target="_blank"><span>FHM AGENCY</span></a> All rights
      reserved
    </div>
  </div>
</footer>
<?php /**PATH D:\project\cuacuon\resources\views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>