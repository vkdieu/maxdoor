<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
        
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>
   <section class="about-one">
   <div class="container">
     <div class="row">
       <!--Start About One Img Box-->
       <div class="col-xl-6">
         <div class="about-one__img">
           <div class="shape1 zoom-fade">
             <img src="assets/images/shapes/about-v1-shape1.png" alt="" />
           </div>
           <div class="about-one__img1">
             <img src="<?php echo e($image); ?>" alt="" />
           </div>

           <div class="about-one__img2">
             <div class="video-icon">
               <a
                 class="video-popup wow zoomIn animated animated animated animated"
                 data-wow-delay="300ms"
                 data-wow-duration="1500ms"
                 title=" Video"
                 href="https://www.youtube.com/watch?v=p25gICT63ek"
                 style="
                   visibility: visible;
                   animation-duration: 1500ms;
                   animation-delay: 300ms;
                   animation-name: zoomIn;
                 "
               >
                 <span class="icon-play-button-3"></span>
               </a>
             </div>
             <img src="<?php echo e($image_background); ?>" alt="" />
           </div>
         </div>
       </div>
       <!--End About One Img Box-->

       <!--Start About One Content-->
       <div class="col-xl-6">
         <div class="about-one__content">
           <div class="sec-title">
             <span class="sec-title__tagline"><?php echo e($title); ?></span>
             <h2 class="sec-title__title">
              <?php echo e($brief); ?>

             </h2>
           </div>

           <div class="about-one__content-text">
             <p>
              <?php echo e($content); ?>

             </p>
           </div>
           <ul class="about-one__content-list">
                    <?php if($block_childs): ?>
                        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                                $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                                $image_sub = $item->image != '' ? $item->image : null;
                                                                $image_sub = $item->image != '' ? $item->image : null;

                            ?>
              
                        <li>
                          <div class="icon">
                            <span class="icon-wood-board"></span>
                          </div>
      
                          <div class="title">
                            <h3><?php echo e($title_sub); ?></h3>
                          </div>
                        </li>
      
                    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    
                  </ul>
                  </div>
                </div>
                <!--End About One Content-->
              </div>
            </div>
          </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\maxdoor\resources\views/frontend/blocks/custom/styles/process_step.blade.php ENDPATH**/ ?>