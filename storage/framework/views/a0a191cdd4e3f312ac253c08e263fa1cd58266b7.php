<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
  <section class="content-section">
    <div class="container">
      <div class="section-head text-center container-md">
        <h2 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right"><?php echo e($title); ?></h2>
        <p data-inview-showup="showup-translate-left"><?php echo e($brief); ?></p>
      </div>
      <div class="owl-carousel" data-inview-showup="showup-translate-up" data-owl-dots="true">

        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_child = $item->json_params->title->{$locale} ?? $item->title;
              $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
              $content_child = $item->json_params->content->{$locale} ?? $item->content;
              $image_child = $item->image != '' ? $item->image : null;
              $url_link = $item->url_link != '' ? $item->url_link : '';
              $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              $icon = $item->icon != '' ? $item->icon : '';
              $style = $item->json_params->style ?? '';
            ?>
            <div class="item">
              <div class="simple-testimonial text-center">
                <div class="tt-title"><?php echo e($title_child); ?></div>
                <div class="tt-rating"><i class="tt-star fa fa-star" aria-hidden="true"></i><i
                    class="tt-star fa fa-star" aria-hidden="true"></i><i class="tt-star fa fa-star"
                    aria-hidden="true"></i><i class="tt-star fa fa-star" aria-hidden="true"></i><i
                    class="tt-star fa fa-star" aria-hidden="true"></i>
                </div>
                <div class="tt-content">
                  <div class="tt-quote">&#8220;</div>
                  <?php echo e($content_child); ?>

                </div>
                <div class="pexx-tt-user-subtitle"><?php echo e($brief_child); ?></div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

      </div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH D:\project\cuacuon\resources\views/frontend/blocks/custom/styles/testimonial.blade.php ENDPATH**/ ?>