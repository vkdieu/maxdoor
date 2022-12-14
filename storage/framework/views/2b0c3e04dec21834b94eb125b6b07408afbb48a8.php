<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['product'];
    
    $rows = App\Http\Services\ContentService::getCmsPost($params)->get();
    
    $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params['taxonomy'] = App\Consts::TAXONOMY['product'];
    
    $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
    
  ?>

  <?php if(isset($taxonomys)): ?>
    <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
        $title_taxonomy = $item_taxonomy->json_params->title->{$locale} ?? $item_taxonomy->title;
        $brief_taxonomy = $item_taxonomy->json_params->brief->{$locale} ?? null;
        $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item_taxonomy->id);
      ?>
      <section class="solid-section <?php echo e($loop->index % 2 == 1 ? 'muted-bg' : ''); ?>">
        <div class="container">
          <div class="section-head container-md">
            <h2 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right"><?php echo e($title_taxonomy); ?>

            </h2>
            <?php if($brief_taxonomy): ?>
              <p data-inview-showup="showup-translate-left"><?php echo e($brief_taxonomy); ?></p>
            <?php endif; ?>
          </div>
          <div class="row cols-md rows-md">
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($item->taxonomy_id == $item_taxonomy->id): ?>
                <?php
                  $title = $item->json_params->title->{$locale} ?? $item->title;
                  $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                  $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                  $date = date('H:i d/m/Y', strtotime($item->created_at));
                  // Viet ham xu ly lay slug
                  // $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
                  $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail');
                ?>

                <div class="md-col-4 sm-col-6" title="<?php echo e($title); ?>">
                  <div class="item shop-item shop-item-simple" data-inview-showup="showup-scale">
                    <div class="item-back"></div>
                    <a href="<?php echo e($alias); ?>" class="item-image responsive-1by1">
                      <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                    </a>
                    <div class="item-content shift-md">
                      <div class="item-textes">
                        <div class="item-title text-upper">
                          <a href="<?php echo e($alias); ?>" class="content-link"><?php echo e(Str::limit($title, 20)); ?></a>
                        </div>
                        
                        <div class="tt-rating">
                          <i class="tt-star fa fa-star" aria-hidden="true"></i>
                          <i class="tt-star fa fa-star" aria-hidden="true"></i>
                          <i class="tt-star fa fa-star" aria-hidden="true"></i>
                          <i class="tt-star fa fa-star" aria-hidden="true"></i>
                          <i class="tt-star fa fa-star" aria-hidden="true"></i>
                        </div>
                      </div>
                      <div class="item-prices">
                        <div class="item-price">
                          <?php echo e(isset($item->json_params->price) && $item->json_params->price > 0 ? number_format($item->json_params->price, 0, ',', '.') . ' ???' : __('Contact')); ?>

                        </div>
                        <div class="item-old-price">
                          <?php echo isset($item->json_params->price_old) && $item->json_params->price_old > 0
                              ? number_format($item->json_params->price_old, 0, ',', '.') . ' ???'
                              : '&nbsp;'; ?>

                        </div>
                      </div>
                    </div>
                    <div class="item-links">
                      <a href="<?php echo e($alias); ?>" class="btn text-upper btn-md btns-bordered"><?php echo app('translator')->get('Detail'); ?></a>
                      <a href="javascript:void(0)" class="btn text-upper btn-md add-to-cart"
                        data-id="<?php echo e($item->id); ?>" data-quantity="1">
                        <?php echo app('translator')->get('Add to cart'); ?>
                      </a>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>

        </div>
      </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
<?php endif; ?>
<?php /**PATH D:\project\cuacuon\resources\views/frontend/blocks/cms_product/styles/default.blade.php ENDPATH**/ ?>