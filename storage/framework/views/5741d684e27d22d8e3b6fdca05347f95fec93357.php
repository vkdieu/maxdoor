<?php if($paginator->hasPages()): ?>
  <ul class="pagination mt-5">
    
    <?php if($paginator->onFirstPage()): ?>
      <a class="previous">
        <i class="fas fa-angle-left"></i>
      </a>
    <?php else: ?>
      <a class="previous" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
        <i class="fas fa-angle-left"></i>
      </a>
    <?php endif; ?>


    
    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
      <?php if(is_string($element)): ?>
        <span class="active"><?php echo e($element); ?></span>
      <?php endif; ?>

      
      <?php if(is_array($element)): ?>
        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($page == $paginator->currentPage()): ?>
            <span class="active"><?php echo e($page); ?></span>
          <?php else: ?>
            <a href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php if($paginator->hasMorePages()): ?>
      <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="next">
        <i class="fas fa-angle-right" aria-hidden="true"></i>
      </a>
    <?php else: ?>
      <a class="next">
        <i class="fa fa-angle-right"></i>
      </a>
    <?php endif; ?>
  </ul>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\maxdoor\resources\views/frontend/pagination/default.blade.php ENDPATH**/ ?>