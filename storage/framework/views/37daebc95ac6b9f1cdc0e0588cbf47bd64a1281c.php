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
     <section class="your-project-one">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="your-project-one__wrapper">
              <ul class="center">
                <li class="your-project-one__single">
                  <div
                    class="your-project-one__single-content-box text-center"
                  >
                    <h4>
                      <a href="contact.html"><?php echo e($url_link_title); ?></a>
                    </h4>
                  </div>
        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $image_sub = $item->image != '' ? $item->image : null;
              $icon = $item->icon != '' ? $item->icon : null;
            ?>
           <div class="your-project-one__single-text-box">
            <h2><?php echo e($title_sub); ?></h2>
            <p>
              <?php echo e($brief_sub); ?>

            </p>
          </div>
        </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <div class="your-project-one__single-btn">
          <a href="#" class="thm-btn"><?php echo e($url_link_title); ?></a>
        </div>
      </li>
    </ul>
  </div>
</div>
</div>
</div>
</section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\maxdoor\resources\views/frontend/blocks/custom/styles/why_choose.blade.php ENDPATH**/ ?>