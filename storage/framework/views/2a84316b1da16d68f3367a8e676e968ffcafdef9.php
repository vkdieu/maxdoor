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
<section class="testimonial-one">
  <div class="container">
    <div class="sec-title text-center">
      <span class="sec-title__tagline"><?php echo e($title); ?></span>
      <h2 class="sec-title__title">
       <?php echo e($brief); ?>

      </h2>
    </div>
    <div class="row">
      <div class="col-xl-12">
        <div class="testimonial-one__carousel owl-carousel owl-theme">
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
          <div class="testimonial-one__single">
            <div class="icon">
              <span class="icon-quotation"></span>
            </div>
            <div class="text">
              <p>
               <?php echo e($content_child); ?>

              </p>
            </div>

            <div class="client-info">
              <div class="img">
                <img
                  src="<?php echo e($image_child); ?>"
                  alt=""
                />
              </div>

              <div class="title">
                <h3><?php echo e($title_child); ?></h3>
                <p><?php echo e($brief_child); ?></p>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
</section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\maxdoor\resources\views/frontend/blocks/custom/styles/testimonial.blade.php ENDPATH**/ ?>