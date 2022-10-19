

<?php
$page_title = $taxonomy->title ?? ($page->title ?? $page->name);
$image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');

$title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
$image = $taxonomy->json_params->image ?? null;
$seo_title = $taxonomy->json_params->seo_title ?? $title;
$seo_keyword = $taxonomy->json_params->seo_keyword ?? null;
$seo_description = $taxonomy->json_params->seo_description ?? null;
$seo_image = $image ?? null;

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
          <li><a href="<?php echo e(route('frontend.cms.product')); ?>"><?php echo e($page->name ?? ''); ?></a></li>
          <li class="path-separator"><i class="fas fa-chevron-right" aria-hidden="true"></i></li>
          <li><?php echo e($page_title); ?></li>
        </ul>
      </div>
    </div>
  </section>
  
  <div class="clearfix page-sidebar-right container">
    <div class="page-content">
      <section class="content-section">
        <div class="row cols-md rows-md">
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
              <div class="md-col-6" title="<?php echo e($title); ?>">
                <div class="item shop-item shop-item-simple" data-inview-showup="showup-scale">
                  <div class="item-back"></div>
                  <a href="<?php echo e($alias); ?>" class="item-image responsive-1by1">
                    <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                  </a>
                  <div class="item-content shift-md">
                    <div class="item-textes">
                      <div class="item-title text-upper">
                        <a href="<?php echo e($alias); ?>" class="content-link"><?php echo e(Str::limit($title, 20)); ?></a>
                      </div>
                      
                      <div class="tt-rating">
                        <i class="tt-star fa fa-star" aria-hidden="true"></i>
                        <i class="tt-star fa fa-star" aria-hidden="true"></i>
                        <i class="tt-star fa fa-star" aria-hidden="true"></i>
                        <i class="tt-star fa fa-star" aria-hidden="true"></i>
                        <i class="tt-star fa fa-star" aria-hidden="true"></i>
                      </div>
                    </div>
                    <div class="item-prices">
                      <div class="item-price">
                        <?php echo e(isset($item->json_params->price) && $item->json_params->price > 0 ? number_format($item->json_params->price, 0, ',', '.') . ' ₫' : __('Contact')); ?>

                      </div>
                      <div class="item-old-price">
                        <?php echo isset($item->json_params->price_old) && $item->json_params->price_old > 0
                            ? number_format($item->json_params->price_old, 0, ',', '.') . ' ₫'
                            : '&nbsp;'; ?>

                      </div>
                    </div>
                  </div>
                  <div class="item-links">
                    <a href="<?php echo e($alias); ?>" class="btn text-upper btn-md btns-bordered"><?php echo app('translator')->get('Detail'); ?></a>
                    <a href="javascript:void(0)" class="btn text-upper btn-md add-to-cart" data-id="<?php echo e($item->id); ?>"
                      data-quantity="1">
                      <?php echo app('translator')->get('Add to cart'); ?>
                    </a>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
            <p><?php echo app('translator')->get('not_found'); ?></p>
          <?php endif; ?>
        </div>

        <div class="text-center shift-lg" data-inview-showup="showup-translate-up">
          <div class="paginator">
            <?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>

          </div>
        </div>
      </section>
    </div>

    <?php echo $__env->make('frontend.components.sidebar.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\maxdoor\resources\views/frontend/pages/product/category.blade.php ENDPATH**/ ?>