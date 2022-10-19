

<?php
$page_title = $taxonomy->title ?? ($page->title ?? $page->name);
$image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
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
          <li><?php echo e($page_title); ?></li>
        </ul>
      </div>
    </div>
  </section>

  <div class="clearfix page-sidebar-right container">
    <div class="page-content">
      <section class="content-section">
        <div class="articles">
          <?php if($posts): ?>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                $image = $item->image != '' ? $item->image : ($item->image_thumb != '' ? $item->image_thumb : null);
                $date = date('d', strtotime($item->created_at));
                $month = date('M', strtotime($item->created_at));
                $year = date('Y', strtotime($item->created_at));
                // Viet ham xu ly lay alias bai viet
                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_title, $item->taxonomy_id);
                $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id, 'detail');
              ?>
              <article class="article" data-inview-showup="showup-translate-up">
                <a href="<?php echo e($alias); ?>" class="block-link text-center offs-lg">
                  <span class="image-wrap">
                    <img class="image" src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                  </span>
                  <span class="hover">
                    <span class="hover-show">
                      <span class="back">
                      </span>
                      <span class="content">
                        <i class="fas fa-search" aria-hidden="true"></i>
                      </span>
                    </span>
                  </span>
                  <span class="date-square main-bg text-center pos-bottom pos-right">
                    <span class="middle-block">
                      <span class="month"><?php echo e($month); ?></span>
                      <span class="day"><?php echo e($date); ?></span>
                      <span class="year"><?php echo e($year); ?></span>
                    </span>
                  </span>
                </a>
                <h3 class="offs-sm"><a class="content-link" href="<?php echo e($alias); ?>"><?php echo e($title); ?></a></h3>
                <p><?php echo e($brief); ?></p>
                <div class="table">
                  <div class="col col-middle">
                    <div class="author">
                      <a class="text-upper" href="<?php echo e($alias_category); ?>"><?php echo e($item->taxonomy_title); ?></a>
                    </div>
                  </div>
                  <div class="col text-right">
                    <a href="<?php echo e($alias); ?>" class="btn btn-md btns-bordered text-upper">
                      <?php echo app('translator')->get('Read more'); ?>
                      <i class="fa fa-angle-double-right"></i>
                    </a>
                  </div>
                </div>
              </article>
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

    <?php echo $__env->make('frontend.components.sidebar.post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\cuacuon\resources\views/frontend/pages/post/default.blade.php ENDPATH**/ ?>