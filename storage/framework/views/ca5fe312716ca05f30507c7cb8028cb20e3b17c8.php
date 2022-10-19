<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['service'];
    
    $rows = App\Http\Services\ContentService::getCmsPost($params)
        ->limit(6)
        ->get();
    
  ?>
  <section class="muted-bg solid-section">
    <div class="container">
      <div class="section-head text-center container-md">
        <h2 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right"><?php echo e($title); ?></h2>
        <p data-inview-showup="showup-translate-left"><?php echo e($brief); ?></p>
      </div>
      <div class="row cols-md rows-md">
        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

      <div class="text-center shift-xl"><a class="btn text-upper" href="<?php echo e(route('frontend.cms.service')); ?>"
          data-inview-showup="showup-translate-up"><i class="fas fa-th-large"
            aria-hidden="true"></i>&nbsp;&nbsp;<?php echo app('translator')->get('View all'); ?></a></div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH D:\project\cuacuon\resources\views/frontend/blocks/cms_service/styles/default.blade.php ENDPATH**/ ?>