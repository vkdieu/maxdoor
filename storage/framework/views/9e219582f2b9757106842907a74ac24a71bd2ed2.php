<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params['is_featured'] = true;
    $params['taxonomy'] = App\Consts::TAXONOMY['product'];
    
    $rows = App\Http\Services\ContentService::getCmsTaxonomy($params)
        ->limit(4)
        ->get();
  ?>
  <section class="md-stuck-top content-section">
    <div class="container hyped-block">
      <div class="row cols-md rows-md">
        <?php if(isset($rows)): ?>
          <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->json_params->image != '' ? $item->json_params->image : ($item->json_params->image_thumb != '' ? $item->json_params->image_thumb : null);
              
              // Viet ham xu ly lay slug
              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id);
              
            ?>
            <div class="sm-col-6 md-col-3">
              <div class="price-block simple" data-inview-showup="showup-translate-up">
                <div class="price-back"></div>
                <div class="price-image">
                  <a href="<?php echo e($alias_category); ?>">
                    <img class="image" src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                  </a>
                </div>
                <div class="price-title">
                  <a href="<?php echo e($alias_category); ?>">
                    <?php echo e($title); ?>

                  </a>
                </div>
                <div class="price-subtext pb-15"><?php echo e(Str::limit($brief, 30)); ?></div>
                <a class="btn-md btns-bordered btn text-upper" href="<?php echo e($alias_category); ?>"><?php echo app('translator')->get('View detail'); ?></a>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\maxdoor\resources\views/frontend/blocks/custom/styles/product_category.blade.php ENDPATH**/ ?>