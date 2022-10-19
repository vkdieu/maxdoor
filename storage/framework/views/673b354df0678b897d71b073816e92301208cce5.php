

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
<?php $__env->startPush('style'); ?>
  <style>

  </style>
<?php $__env->stopPush(); ?>
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
          <li><a href="<?php echo e(route('frontend.cms.service')); ?>"><?php echo e($page->name ?? ''); ?></a></li>
          <li class="path-separator"><i class="fas fa-chevron-right" aria-hidden="true"></i></li>
          <li><?php echo e($page_title); ?></li>
        </ul>
      </div>
    </div>
  </section>

  <section class="muted-bg solid-section">
    <div class="container">

      <div class="row cols-md rows-md">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $title, $item->id, 'detail');
          ?>
          <div class="md-col-4 sm-col-6">
            <div class="item" data-inview-showup="showup-translate-up">
              <a href="<?php echo e($alias); ?>" class="block-link text-center">
                <span class="image-wrap">
                  <img class="image" src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                </span>
                <span class="hover">
                  <span class="hover-show">
                    <span class="back"></span>
                    <span class="content">
                      <i class="fas fa-search" aria-hidden="true"></i>
                    </span>
                  </span>
                </span>
              </a>
              <div class="item-content">
                <div class="item-title text-upper">
                  <a href="<?php echo e($alias); ?>"><?php echo e($title); ?></a>
                </div>
                <div class="item-text"><?php echo e(Str::limit($brief, 100)); ?></div>
                <a href="<?php echo e($alias); ?>"
                  class="btn btn-md btns-bordered pull-right text-upper"><?php echo app('translator')->get('View detail'); ?></a>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>

      <div class="text-center shift-lg" data-inview-showup="showup-translate-up">
        <div class="paginator">
          <?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>

        </div>
      </div>
    </div>
  </section>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\maxdoor\resources\views/frontend/pages/service/category.blade.php ENDPATH**/ ?>