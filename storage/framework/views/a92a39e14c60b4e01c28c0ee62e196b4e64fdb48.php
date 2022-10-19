<aside class="page-sidebar content-section">
  <?php
    $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params['taxonomy'] = App\Consts::TAXONOMY['post'];
    
    $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
  ?>
  <?php if(isset($taxonomys)): ?>
    <section class="side-content-section" data-inview-showup="showup-translate-up">
      <h5 class="shift-sm offs-md"><?php echo app('translator')->get('Post category'); ?></h5>
      <ul class="categories-list text-medium solid-color">
        <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
            <?php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id);
            ?>
            <li>
              <span class="category-line">
                <a class="content-link" href="<?php echo e($alias_category); ?>">
                  <span class="single-line-text">
                    <?php echo e(Str::limit($title, 30)); ?>

                  </span>
                </a>
              </span>
            </li>
            <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($sub->parent_id == $item->id): ?>
                <?php
                  $title_sub = $sub->json_params->title->{$locale} ?? $sub->title;
                  $alias_category_sub = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title_sub, $sub->id);
                ?>
                <li>
                  <span class="category-line" style="padding-left:40px;">
                    <a class="content-link" href="<?php echo e($alias_category_sub); ?>">
                      <span class="single-line-text">
                        <?php echo e(Str::limit($title_sub, 30)); ?>

                      </span>
                    </a>
                  </span>
                </li>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </section>
    <div class="line-sides main-bg out-lg" data-inview-showup="showup-translate-up"></div>
  <?php endif; ?>

  <?php
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_type'] = App\Consts::POST_TYPE['post'];
    $params['order_by'] = 'id';
    
    $recents = App\Http\Services\ContentService::getCmsPost($params)
        ->limit(App\Consts::DEFAULT_SIDEBAR_LIMIT)
        ->get();
  ?>
  <?php if(isset($recents)): ?>
    <section class="side-content-section" data-inview-showup="showup-translate-up">

      <h5 class="shift-sm offs-md"><?php echo app('translator')->get('Latest post'); ?></h5>
      <div class="items">
        <?php $__currentLoopData = $recents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id, 'detail');
          ?>
          <div class="shop-side-item">
            <div class="item-side-image">
              <a href="<?php echo e($alias); ?>" class="item-image responsive-1by1">
                <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
              </a>
            </div>
            <div class="item-side">
              <div class="item-title">
                <a href="<?php echo e($alias); ?>" class="content-link text-upper"><?php echo e(Str::limit($title, 50)); ?></a>
              </div>
              <div class="item-categories"><a href="<?php echo e($alias_category); ?>"
                  class="content-link"><?php echo e(Str::limit($item->taxonomy_title, 20)); ?></a></div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </section>
    <div class="line-sides main-bg out-lg" data-inview-showup="showup-translate-up"></div>
  <?php endif; ?>

  <?php
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_type'] = App\Consts::POST_TYPE['post'];
    $params['order_by'] = 'count_visited';
    
    $mostViews = App\Http\Services\ContentService::getCmsPost($params)
        ->limit(App\Consts::DEFAULT_SIDEBAR_LIMIT)
        ->get();
  ?>
  <?php if(isset($recents)): ?>
    <section class="side-content-section" data-inview-showup="showup-translate-up">

      <h5 class="shift-sm offs-md"><?php echo app('translator')->get('Most viewed post'); ?></h5>
      <div class="items">
        <?php $__currentLoopData = $mostViews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id, 'detail');
          ?>
          <div class="shop-side-item">
            <div class="item-side-image">
              <a href="<?php echo e($alias); ?>" class="item-image responsive-1by1">
                <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
              </a>
            </div>
            <div class="item-side">
              <div class="item-title">
                <a href="<?php echo e($alias); ?>" class="content-link text-upper"><?php echo e(Str::limit($title, 50)); ?></a>
              </div>
              <div class="item-categories"><a href="<?php echo e($alias_category); ?>"
                  class="content-link"><?php echo e(Str::limit($item->taxonomy_title, 20)); ?></a></div>

            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </section>
  <?php endif; ?>
</aside>
<?php /**PATH C:\xampp\htdocs\maxdoor\resources\views/frontend/components/sidebar/post.blade.php ENDPATH**/ ?>