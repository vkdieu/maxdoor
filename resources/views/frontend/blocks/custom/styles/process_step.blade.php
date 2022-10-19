@if ($block)
    @php
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
    @endphp
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
             <img src="{{$image}}" alt="" />
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
             <img src="{{$image_background}}" alt="" />
           </div>
         </div>
       </div>
       <!--End About One Img Box-->

       <!--Start About One Content-->
       <div class="col-xl-6">
         <div class="about-one__content">
           <div class="sec-title">
             <span class="sec-title__tagline">{{$title}}</span>
             <h2 class="sec-title__title">
              {{$brief}}
             </h2>
           </div>

           <div class="about-one__content-text">
             <p>
              {{$content}}
             </p>
           </div>
           <ul class="about-one__content-list">
                    @if ($block_childs)
                        @foreach ($block_childs as $item)
                            @php
                                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                                $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                                $image_sub = $item->image != '' ? $item->image : null;
                                                                $image_sub = $item->image != '' ? $item->image : null;

                            @endphp
              
                        <li>
                          <div class="icon">
                            <span class="icon-wood-board"></span>
                          </div>
      
                          <div class="title">
                            <h3>{{$title_sub}}</h3>
                          </div>
                        </li>
      
                    
                        @endforeach
                    @endif
                    
                  </ul>
                  </div>
                </div>
                <!--End About One Content-->
              </div>
            </div>
          </section>
@endif
