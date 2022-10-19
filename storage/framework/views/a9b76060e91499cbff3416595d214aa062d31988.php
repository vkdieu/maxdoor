

<?php $__env->startSection('content'); ?>
  <div class="login-box">
    <div class="login-logo">
      <b>Administrator</b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <form action="<?php echo e(route('admin.login')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php if(session('errorMessage')): ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>Alert!</h4>
            <?php echo e(session('errorMessage')); ?>

          </div>
        <?php endif; ?>

        <?php if(session('successMessage')): ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo e(session('successMessage')); ?>

          </div>
        <?php endif; ?>

        <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
          <input type="email" name="email" required class="form-control" placeholder="Email">

          <?php if($errors->has('email')): ?>
            <span class="help-block">
              <?php echo e($errors->first('email')); ?>

            </span>
          <?php endif; ?>
        </div>
        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
          <input type="password" required name="password" class="form-control" placeholder="Password">

          <?php if($errors->has('password')): ?>
            <span class="help-block">
              <?php echo e($errors->first('password')); ?>

            </span>
          <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-flat">
          Sign In
        </button>

        <?php
          $referer = request()->headers->get('referer');
        ?>
        <input type="hidden" name="url" value="<?php echo e($referer); ?>">
      </form>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\cuacuon\resources\views/admin/pages/login.blade.php ENDPATH**/ ?>