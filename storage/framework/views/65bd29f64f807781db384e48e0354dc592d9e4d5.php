<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
  ?>
  <style>
    .slider-caption h2 {
      font-size: 3rem;
    }

    .slider-caption p {
      font-size: 1.2rem;
    }
  </style>
  <section id="adv" class="slider-element swiper_wrapper min-vh-md-75 min-vh-50">
    <div class="slider-inner">
      <div class="swiper-container swiper-parent">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="container-fluid">
              <div class="slider-caption mx-5 pt-5 <?php echo e($style); ?>" style="max-width: 700px;">
                <div>
                  <h2><?php echo $title; ?></h2>
                  <p><?php echo nl2br($brief); ?></p>
                  <p class="d-none d-sm-block mb-5"><?php echo nl2br($content); ?></p>
                  <?php if($url_link): ?>
                    <a href="<?php echo e($url_link); ?>" class="button button-rounded button-large m-0">
                      <?php echo e($url_link_title); ?>

                    </a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="swiper-slide-bg" style="background-image: url('<?php echo e($image_background); ?>');"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\maxdoor\resources\views/frontend/blocks/banner/styles/static.blade.php ENDPATH**/ ?>