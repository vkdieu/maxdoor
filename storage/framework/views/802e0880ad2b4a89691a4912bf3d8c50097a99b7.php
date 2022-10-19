<link href="<?php echo e(asset('themes/frontend/cuacuon/assets/animate.css/animate.min.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('themes/frontend/cuacuon/assets/fontawesome/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,800,900" rel="stylesheet">
<link href="<?php echo e(asset('themes/frontend/cuacuon/assets/chosen/chosen.min.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('themes/frontend/cuacuon/assets/jquery-ui-custom/jquery-ui.min.css')); ?>" rel="stylesheet"
  type="text/css">
<link href="<?php echo e(asset('themes/frontend/cuacuon/assets/pentix/css/pentix.min.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('themes/frontend/cuacuon/assets/css/pex-theme.min.css')); ?>" rel="stylesheet" type="text/css">

<style>
  .pb-15 {
    padding-bottom: 15px;
  }

  .shop-item .item-content {
    padding: 0 140px 0 0;
  }

  .shop-item .item-content .item-prices {
    text-align: right;
    width: 130px;
    margin-right: -140px;
    float: right;
  }

  .image-wrap {
    padding-bottom: 100%;
  }

  .image-wrap .image {
    height: 100% !important;
  }

  @media  only screen and (max-width: 992px) {
    .screen-height {
      height: 100vw;
    }
  }

  .theme-back {
    background: -webkit-linear-gradient(bottom, rgba(53, 53, 74, 0.3) 0%, rgba(53, 53, 74, 0.4) 75%, rgba(53, 53, 74, 0.5) 100%);
    background: -moz-linear-gradient(bottom, rgba(53, 53, 74, 0.3) 0%, rgba(53, 53, 74, 0.4) 75%, rgba(53, 53, 74, 0.5) 100%);
    background: -o-linear-gradient(bottom, rgba(53, 53, 74, 0.3) 0%, rgba(53, 53, 74, 0.4) 75%, rgba(53, 53, 74, 0.5) 100%);
    background: -ms-linear-gradient(bottom, rgba(53, 53, 74, 0.3) 0%, rgba(53, 53, 74, 0.4) 75%, rgba(53, 53, 74, 0.5) 100%);
    background: linear-gradient(to top, rgba(53, 53, 74, 0.3) 0%, rgba(53, 53, 74, 0.4) 75%, rgba(53, 53, 74, 0.5) 100%);
  }
</style>
<?php if(isset($web_information->source_code->css)): ?>
  <style>
    <?php echo $web_information->source_code->css; ?>

  </style>
<?php endif; ?>
<?php /**PATH D:\project\cuacuon\resources\views/frontend/panels/styles.blade.php ENDPATH**/ ?>