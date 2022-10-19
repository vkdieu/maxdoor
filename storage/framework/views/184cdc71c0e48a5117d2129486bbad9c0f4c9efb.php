

<?php
$page_title = $taxonomy->title ?? ($page->title ?? $page->name);
$image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
$str_alias = '.html?id=';
$page_brief = $taxonomy->description ?? ($page->description ?? ($page->name ?? null));

?>
<?php $__env->startPush('style'); ?>
  <style>

  </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
  

  <section class="page-header">
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
    
    <section class="services-one clearfix">
      <div class="container">
          <div class="sec-title text-center">
              <h2 class="sec-title__title"><?php echo e($page_title); ?></h2>
              <p class="sec-title__text"><?php echo e($page_brief); ?></p>
          </div>
  
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
                  <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="services-one__single text-center">
                        <div class="services-one__single-icon">
                            <span class="icon-carpet"></span>
                        </div>
                        <h2><a href="<?php echo e($alias); ?>"><?php echo e($title); ?></a></h2>
                        <div class="text">
                            <p><?php echo e($brief); ?></p>
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
  
      
    </div>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.service', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\maxdoor\resources\views/frontend/pages/service/default.blade.php ENDPATH**/ ?>