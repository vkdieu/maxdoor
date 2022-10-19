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
      <div class="row cols-md rows-lg text-center">
        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $image_sub = $item->image != '' ? $item->image : null;
              $icon = $item->icon != '' ? $item->icon : null;
            ?>
            <div class="sm-col-6 md-col-3">
              <div class="feature feature-side text-left" data-inview-showup="showup-translate-up">
                <div class="feature-icon"><?php echo $icon; ?></div>
                <div class="feature-title text-upper"><?php echo e($title_sub); ?></div>
                <div class="feature-text"><?php echo nl2br($brief_sub); ?></div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH D:\project\cuacuon\resources\views/frontend/blocks/custom/styles/why_choose.blade.php ENDPATH**/ ?>