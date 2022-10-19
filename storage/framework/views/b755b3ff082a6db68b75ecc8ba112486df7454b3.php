<?php if($block): ?>
  <?php
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>

  <section id="banner-slider">
    <div class="flexslider screen-height">
      <div class="slides">
        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image != '' ? $item->image : null;
              $image_background = $item->image_background != '' ? $item->image_background : null;
              $video = $item->json_params->video ?? null;
              $video_background = $item->json_params->video_background ?? null;
              $url_link = $item->url_link != '' ? $item->url_link : '';
              $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              $icon = $item->icon != '' ? $item->icon : '';
              $style = isset($item->json_params->style) ? $item->json_params->style : '';
              
              $image_for_screen = null;
              if ($agent->isDesktop() && $image_background != null) {
                  $image_for_screen = $image_background;
              } else {
                  $image_for_screen = $image;
              }
              
            ?>
            <div class="slide">
              <img src="<?php echo e($image_for_screen ?? ''); ?>" alt="<?php echo e($title); ?>" data-cover-image="true">
              <div class="theme-back"></div>
              <div class="pos-center text-center col-12 text-white <?php echo e($style); ?>">
                <div class="banner-title res-text-xxl"><?php echo e($title); ?></div>
                <div class="banner-subtitle res-text-md"><?php echo nl2br($brief); ?></div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
      <div class="flex-custom-navigation"><a href="#" class="flex-prev"><i class="fas fa-angle-left"
            aria-hidden="true"></i> </a><a href="#" class="flex-next"><i class="fas fa-angle-right"
            aria-hidden="true"></i></a></div>
    </div>
  </section>

<?php endif; ?>
<?php /**PATH D:\project\cuacuon\resources\views/frontend/blocks/banner/styles/slide.blade.php ENDPATH**/ ?>