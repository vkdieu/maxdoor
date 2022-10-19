<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
     <section class="counter-one">
      <div class="shape1">
        <img src="<?php echo e($image_background); ?>" alt="#" />
      </div>
      <div class="container">
        <div class="row">

      <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $icon_sub = $item->json_params->icon->{$locale} ?? $item->icon;
              $image_sub = $item->image != '' ? $item->image : null;
            ?>
          <div
          class="col-xl-4 col-lg-4 wow animated fadeInUp"
          data-wow-delay="0.1s"
        >
          <div class="counter-one__single text-center">
            <div class="icon-box">
              <span class="alori-icon-three-user-flow"></span>
            </div>

            <div class="text-box">
              <h2>
                <span class="odometer" data-count="<?php echo e($brief_sub); ?>">00</span>
              </h2>
              <p><?php echo e($title_sub); ?></p>
            </div>
          </div>
        </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\maxdoor\resources\views/frontend/blocks/custom/styles/statistic.blade.php ENDPATH**/ ?>