

<?php $__env->startSection('title'); ?>
<?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo e($module_name); ?>

  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="/">
        <i class="fa fa-dashboard"></i> Home
      </a>
    </li>
    <li class="active"><?php echo e($module_name); ?></li>
  </ol>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="content">
  <?php if(session('errorMessage')): ?>
  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo e(session('errorMessage')); ?>

  </div>
  <?php endif; ?>
  <?php if(session('successMessage')): ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo e(session('successMessage')); ?>

  </div>
  <?php endif; ?>

  <?php if($errors->any()): ?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p><?php echo e($error); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </div>
  <?php endif; ?>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\qlady\resources\views/admin/pages/home/index.blade.php ENDPATH**/ ?>