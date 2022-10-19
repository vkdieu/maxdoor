<header class="header">
  <input id="header-default" type="radio" class="collapse" checked="checked" name="siteheader">
  <input id="header-shown" type="radio" class="collapse" name="siteheader">
  <input id="header-hidden" type="radio" class="collapse" name="siteheader">

  <div class="infobar xs-hidden">
    <div class="container">
      <div class="cols-list pull-left cols-md">

        <?php if(isset($web_information->information->address)): ?>
          <div class="list-item">
            <span class="info-icon">
              <i class="fas fa-home" aria-hidden="true"></i>
            </span>
            <?php echo e($web_information->information->address ?? ''); ?>

          </div>
        <?php endif; ?>

        <?php if(isset($web_information->information->phone)): ?>
          <div class="list-item">
            <span class="info-icon"><i class="fas fa-phone"></i></span>
            <?php echo e($web_information->information->phone); ?>

          </div>
        <?php endif; ?>

        <?php if(isset($web_information->information->email)): ?>
          <div class="list-item">
            <span class="info-icon"><i class="fas fa-envelope"></i></span>
            <?php echo e($web_information->information->email); ?>

          </div>
        <?php endif; ?>
      </div>
      <div class="cols-list pull-right cols-md socials">
        <?php if(isset($web_information->social->facebook)): ?>
          <div class="list-item"><a target="_blank" href="<?php echo e($web_information->social->facebook); ?>"><i
                class="fab fa-facebook-f" aria-hidden="true"></i></a></div>
        <?php endif; ?>
        <?php if(isset($web_information->social->twitter)): ?>
          <div class="list-item"><a target="_blank" href="<?php echo e($web_information->social->twitter); ?>"><i
                class="fab fa-twitter" aria-hidden="true"></i></a>
          </div>
        <?php endif; ?>
        <?php if(isset($web_information->social->instagram)): ?>
          <div class="list-item"><a target="_blank" href="<?php echo e($web_information->social->instagram); ?>"><i
                class="fab fa-instagram" aria-hidden="true"></i></a></div>
        <?php endif; ?>
        <?php if(isset($web_information->social->youtube)): ?>
          <div class="list-item"><a target="_blank" href="<?php echo e($web_information->social->youtube); ?>"><i
                class="fab fa-youtube" aria-hidden="true"></i></a></div>
        <?php endif; ?>

      </div>
    </div>
  </div>
  <nav class="stick-menu menu-wrap simple line">
    <div class="menu-container menu-row">
      <div class="logo">
        <a href="<?php echo e(route('frontend.home')); ?>"><img src="<?php echo e($web_information->image->logo_header_dark ?? ''); ?>"
            alt="Logo"></a>
      </div>
      <div class="header-toggler pull-right xs-shown">
        <label class="header-shown-sign" for="header-hidden"><i class="fas fa-times" aria-hidden="true"></i></label>
        <label class="header-hidden-sign" for="header-shown"><i class="fas fa-bars" aria-hidden="true"></i></label>
      </div>
      <div class="clearfix xs-shown"></div>

      <div class="menu">
        <ul class="menu-items">

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
                          $active = $url == url()->full() ? 'active' : '';
              
                          if ($item->sub > 0) {
                              $content .= '<li class="' . $active . '"><a href="' . $url . '" >' . $title . '<span class="toggle-icon"><i class="fas fa-chevron-down" aria-hidden="true"></i></span></a>';
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

          
          <?php if(session('cart')): ?>
            <li class="menu-item-stick-left">
              <a href="#" data-show-block="cart">
                <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                <span class="item-label-sale item-label"><?php echo e(count((array) session('cart'))); ?></span>
              </a>
            </li>
          <?php endif; ?>
        </ul>
        <div class="clearfix"></div>
        <div class="line-right xs-hidden"></div>
      </div>
    </div>
  </nav>
</header>

<?php if(session('cart')): ?>
  <div class="block-cart collapse" data-block="cart" data-show-block-class="animation-scale-top-right"
    data-hide-block-class="animation-unscale-top-right">
    <div class="cart-inner">
      <a href="#" class="close-link" data-close-block><i class="fas fa-times" aria-hidden="true"></i>
      </a>
      <h4 class="text-upper text-center">Giỏ hàng của bạn</h4>
      <div class="items">
        <div class="items collapse" data-block="cart" data-show-block-class="animation-scale-top-right"
          data-hide-block-class="animation-unscale-top-right">

          <?php $total = 0 ?>
          <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $total += $details['price'] * $details['quantity'];
              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $details['title'], $id, 'detail');
            ?>
            <div class="shop-side-item cart-item">
              <div class="item-side-image">
                <a href="<?php echo e($alias); ?>" class="item-image responsive-1by1">
                  <img src="<?php echo e($details['image_thumb'] ?? $details['image']); ?>" alt="<?php echo e($details['title']); ?>"></a>
              </div>
              <div class="item-side">
                <div class="item-title">
                  <a href="<?php echo e($alias); ?>" class="content-link text-upper"><?php echo e($details['title']); ?></a>
                </div>
                <div class="item-quantity"><?php echo app('translator')->get('Quantity'); ?>: <?php echo e($details['quantity']); ?></div>
                <div class="item-prices">
                  <div class="item-price">
                    <?php echo e(isset($details['price']) && $details['price'] > 0 ? number_format($details['price']) . ' ₫' : __('Contact')); ?>

                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
      </div>
      <div class="line-sides main-bg shift-lg"></div>
      <div class="row out-md">
        <div class="col-6 cart-price-title"><?php echo app('translator')->get('Total money'); ?>:</div>
        <div class="col-6 text-right cart-price"><?php echo e(number_format($total)); ?> ₫</div>
      </div>
      <div class="line-sides main-bg offs-lg"></div>
      <a href="<?php echo e(route('frontend.order.cart')); ?>" class="btn text-upper btn-md pull-right">
        <?php echo app('translator')->get('View cart'); ?>
      </a>
    </div>
  </div>
  </div>
<?php endif; ?>

<div class="singlepage-block collapse alt-bg" data-block="search" data-show-block-class="animation-scale-top-right"
  data-hide-block-class="animation-unscale-top-right">
  <a href="#" class="close-link" data-close-block>
    <i class="fas fa-times" aria-hidden="true"></i>
  </a>
  <div class="pos-v-center col-12">
    <div class="container">
      <form action="<?php echo e(route('frontend.search.index')); ?>" method="get">
        <div class="row cols-md rows-md">
          <div class="lg-col-9 md-col-8 sm-col-12">
            <div class="field-group">
              <div class="field-wrap"><input class="field-control" name="keyword" placeholder="<?php echo app('translator')->get('Type and hit enter...'); ?>"
                  required="required"> <span class="field-back"></span></div>
            </div>
          </div>
          <div class="lg-col-3 md-col-4 sm-col-6"><button class="btn btns-white-bordered text-upper"
              type="submit"><?php echo app('translator')->get('Search'); ?></button></div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php /**PATH D:\project\cuacuon\resources\views/frontend/blocks/header/styles/default.blade.php ENDPATH**/ ?>