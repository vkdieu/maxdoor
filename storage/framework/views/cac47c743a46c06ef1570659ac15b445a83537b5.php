

<?php
$page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? null));
$page_brief = $taxonomy->description ?? ($page->description ?? ($page->name ?? null));
$image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
?>

<?php $__env->startSection('content'); ?>
  <!--Start Page Header-->
  <section class="page-header style2">
    <div class="page-header__bg" style="background-image: url(<?php echo e($image_background); ?>);">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-header__wrapper">
                    <div class="page-header__content">
                        <h2><?php echo e($page_title); ?></h2>
                        <div class="page-header__menu">
                            <ul>
                                <li><a href="index.html"><?php echo app('translator')->get('Home'); ?></a></li>
                                <li><?php echo e($page_title); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Page Header-->
  
  <section class="services-one clearfix">
    <div class="container">
        <div class="sec-title text-center">
            <h2 class="sec-title__title"><?php echo e($page_title); ?></h2>
            <p class="sec-title__text"><?php echo e($page_brief); ?></p>
        </div>

        <div class="row">
          <section class="product-one product-one--shop">
            <div class="container">
                <div class="row">
          <?php if($posts): ?>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                $image = $item->image_thumb ?? ($item->image ?? null);
                $date = date('H:i d/m/Y', strtotime($item->created_at));
                // Viet ham xu ly lay alias bai viet
                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
                $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail');
              ?>
              <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInLeft" data-wow-delay="0ms"
              data-wow-duration="1500ms">
              <div class="product-one__single">
                  <div class="product-one__single-img">
                      <img src="<?php echo e($image); ?>" alt="" />
                  </div>

                  <div class="product-one__single-content text-center">
                      <h2><a href="<?php echo e($alias); ?>"><?php echo e($title); ?></a></h2>
                      <p><span><del>                        <?php echo e(isset($item->json_params->price_old) && $item->json_params->price_old > 0 ? number_format($item->json_params->price_old, 0, ',', '.') . ' ₫' : __('Contact')); ?>

                      </del></span>                         <?php echo e(isset($item->json_params->price) && $item->json_params->price > 0 ? number_format($item->json_params->price, 0, ',', '.') . ' ₫' : __('Contact')); ?>

                      </p>
                  </div>
              </div>
          </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
            <p><?php echo app('translator')->get('not_found'); ?></p>
          <?php endif; ?>
      

        <div class="text-center shift-lg" data-inview-showup="showup-translate-up">
          <div class="paginator">
            <?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>

          </div>
        </div>
      </section>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\maxdoor\resources\views/frontend/pages/product/default.blade.php ENDPATH**/ ?>