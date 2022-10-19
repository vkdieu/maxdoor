

<?php
$page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
$image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
?>

<?php $__env->startSection('content'); ?>
  

  <section class="with-bg solid-section">
    <div class="fix-image-wrap" data-image-src="<?php echo e($image_background); ?>" data-parallax="scroll"></div>
    <div class="theme-back"></div>
    <div class="container page-info">
      <div class="section-alt-head container-md">
        <h1 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right"><?php echo e($page_title); ?></h1>
      </div>
    </div>
    <div class="section-footer">
      <div class="container" data-inview-showup="showup-translate-down">
        <ul class="page-path">
          <li><a href="<?php echo e(route('frontend.home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
          <li class="path-separator"><i class="fas fa-chevron-right" aria-hidden="true"></i></li>
          <li><?php echo e($page_title); ?></li>
        </ul>
      </div>
    </div>
  </section>

  <section class="content-section">
    <div class="container">
      <?php if(session('cart')): ?>
        <div class="cart-line-items offs-lg" data-inview-showup="showup-translate-up">
          <div class="items-head text-upper">
            <div class="item-image"><?php echo app('translator')->get('Product'); ?></div>
            <div class="item-name">&nbsp;</div>
            <div class="item-price"><?php echo app('translator')->get('Price'); ?></div>
            <div class="item-quantity"><?php echo app('translator')->get('Quantity'); ?></div>
            <div class="item-total"><?php echo app('translator')->get('Total'); ?></div>
            <div class="item-remove">&nbsp;</div>
          </div>
          <div class="items">

            <?php $total = $quantity = 0 ?>
            <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $total += $details['price'] * $details['quantity'];
                $quantity += $details['quantity'];
                $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $details['title'], $id, 'detail');
              ?>

              <div class="item cart-item-line cart_item" data-inview-showup="showup-translate-up"
                data-id="<?php echo e($id); ?>">
                <div class="item-image">
                  <div class="responsive-1by1">
                    <img src="<?php echo e($details['image_thumb'] ?? $details['image']); ?>" alt="<?php echo e($details['title']); ?>">
                  </div>
                </div>
                <div class="item-name">
                  <a href="<?php echo e($alias); ?>" class="content-link"><?php echo e($details['title']); ?></a>
                </div>
                <div class="item-price">
                  <?php echo e(isset($details['price']) && $details['price'] > 0 ? number_format($details['price'], 0, ',', '.') . ' ₫' : __('Contact')); ?>

                </div>
                <div class="item-quantity" style="padding-top: 20px; ">
                  <input class="montserrat-bold alt-color text-sm text-center update-cart qty" type="number"
                    name="quantity" value="<?php echo e($details['quantity']); ?>" min="1" autocomplete="off"
                    style="width: 100%;padding: 5px 0px;">

                </div>
                <div class="item-total">
                  <?php echo e(number_format($details['price'] * $details['quantity'], 0, ',', '.') . ' ₫'); ?>

                </div>
                <div class="item-remove"><a href="javascript:void(0)" class="remove remove-from-cart"
                    title="<?php echo app('translator')->get('Remove this item'); ?>">
                    <i class="fas fa-times"></i>
                  </a>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>

        <div class="muted-bg block-md" data-inview-showup="showup-translate-up">

          <form method="POST" action="<?php echo e(route('frontend.order.store.product')); ?>">
            <?php echo csrf_field(); ?>
            <div class="row cols-lg rows-lg">
              <div class="sm-col-6" data-inview-showup="showup-translate-right">
                <h4 class="text-upper"><?php echo app('translator')->get('Submit Order Cart'); ?></h4>
                <div class="field-group">
                  <div class="field-wrap">
                    <input class="field-control" name="name" placeholder="<?php echo app('translator')->get('Fullname'); ?> *" type="text"
                      value="<?php echo e(old('name')); ?>" required="required">
                    <span class="field-back"></span>
                  </div>
                </div>
                <div class="field-group">
                  <div class="field-wrap">
                    <input class="field-control" name="email" type="email" placeholder="Email" required="required"
                      value="<?php echo e(old('email')); ?>">
                    <span class="field-back"></span>
                  </div>
                </div>
                <div class="field-group">
                  <div class="field-wrap">
                    <input class="field-control" name="phone" placeholder="<?php echo app('translator')->get('Phone'); ?> *" type="text"
                      value="<?php echo e(old('phone')); ?>" required="required">
                    <span class="field-back"></span>
                  </div>
                </div>

                <div class="field-group shift-md">
                  <div class="field-wrap">
                    <textarea class="field-control" name="address" placeholder="<?php echo app('translator')->get('Address'); ?>" required="required"><?php echo e(old('address')); ?></textarea>
                    <span class="field-back"></span>
                  </div>
                </div>

                <div class="field-group shift-md">
                  <div class="field-wrap">
                    <textarea class="field-control" name="customer_note" placeholder="<?php echo app('translator')->get('Content note'); ?>" required="required"><?php echo e(old('customer_note')); ?></textarea>
                    <span class="field-back"></span>
                  </div>
                </div>
              </div>
              <div class="sm-col-6" data-inview-showup="showup-translate-left">
                <h4 class="text-upper"><?php echo app('translator')->get('Order detail'); ?></h4>
                <div class="muted-bg offs-lg">
                  <div class="checkout-total-line text-sm text-semibold">
                    <div class="title text-upper">
                      <?php echo app('translator')->get('Product total'); ?>
                    </div>
                    <div class="value">
                      <?php echo e($quantity); ?>

                    </div>
                  </div>
                  <div class="checkout-total-separator"></div>
                  <div class="checkout-total-line text-sm">
                    <div class="title text-upper text-semibold">
                      <?php echo app('translator')->get('Total money'); ?>
                    </div>
                    <div class="value text-colorful text-bold">
                      <?php echo e(number_format($total, 0, ',', '.') . ' ₫'); ?>

                    </div>
                  </div>
                </div>
                <button class="btn text-upper shift-md col-12 md-col-6 lg-col-4" type="submit">
                  <?php echo app('translator')->get('Submit Order'); ?>
                </button>
              </div>
            </div>
          </form>

        </div>
      <?php else: ?>
        <div class="row">
          <div class="col-lg-12">
            <div class="style-msg alertmsg">
              <div class="sb-msg">
                
                
                <?php echo app('translator')->get('Cart is empty!'); ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>

    </div>
  </section>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\cuacuon\resources\views/frontend/pages/cart/index.blade.php ENDPATH**/ ?>