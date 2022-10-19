<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;

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
  <section class="projects-two">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="projects-two__top">
            <div class="sec-title">
              <span class="sec-title__tagline"><?php echo e($title); ?></span>
              <h2 class="sec-title__title">
             <?php echo e($content); ?><br />
                <span class="odometer" data-count="<?php echo e($brief); ?>">00</span
                ><span class="plus">+</span> khách hàng
              </h2>
            </div>

            <div class="projects-two__top-btn">
              <a href="<?php echo e($url_link); ?>" class="thm-btn"><?php echo e($url_link_title); ?></a>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-12">
          <div class="projects-two__carousel owl-carousel owl-theme">
        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['service'], $title, $item->id, 'detail');
          ?>
           <div class="projects-two__single">
            <div
              class="projects-two__single-img"
              style="
                background-image: url(<?php echo e($image); ?>);
              "
            >
              <div class="overlay-content">
                <div class="overlay-content-inner">
                  <div class="text">
                    <span><?php echo e($title); ?></span>
                    <h2>
                      <a href="<?php echo e($alias); ?>"
                        ><?php echo e($brief); ?></a
                      >
                    </h2>
                  </div>
                  <div class="button">
                    <a href="<?php echo e($alias); ?>"
                      ><span class="icon-next"></span
                    ></a>
                  </div>
                </div>
              </div>
              
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="projects-two__single__btn">
          <a href="<?php echo e($alias); ?>"><?php echo e($url_link_title); ?></a>
        </div>
      </div>
    </div>
      </div>
    </div>
  </div>
</div>
</section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\maxdoor\resources\views/frontend/blocks/cms_service/styles/default.blade.php ENDPATH**/ ?>