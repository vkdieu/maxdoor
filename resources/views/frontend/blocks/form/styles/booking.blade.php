@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $background = $block->image_background != '' ? $block->image_background : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
  @endphp
<section class="contact-one">
  <div class="shape1">
    <img src="assets/images/shapes/contact-v1-shape1.png" alt="" />
  </div>
  <div
    class="contact-one__img"
    style="
      background-image: url({{$background}});
    "
  >
    <div class="overlay-content text-center">
     
      <h3>{{$title}}</h3>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <!--Start Contact One Img-->
      <div class="col-xl-6 col-lg-0"></div>
      <!--End Contact One Img-->

      <!--Start Contact One Content-->
      <div class="col-xl-6 col-lg-12">
        <div class="contact-one__content">
          <div class="sec-title">
            <span class="sec-title__tagline">{{$brief}}</span>
            <h2 class="sec-title__title">{{$content}}</h2>
          </div>

          <div class="contact-one__content-comment-form">
            <form
              action="https://alori-html.vercel.app/assets/inc/sendemail.php"
              class="comment-one__form contact-form-validated"
              novalidate="novalidate"
            >
              <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                  <div class="comment-form__input-box">
                    <input
                      type="text"
                      placeholder="Họ và tên"
                      name="name"
                    />
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                  <div class="comment-form__input-box">
                    <input
                      type="email"
                      placeholder="Email"
                      name="email"
                    />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xl-12 col-lg-12">
                  <div class="comment-form__input-box">
                    <textarea
                      name="message"
                      placeholder="Tin nhắn"
                    ></textarea>
                  </div>
                  <button type="submit" class="thm-btn comment-form__btn">
                   {{$url_link_title}}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--End Contact One Content-->
    </div>
  </div>
</section>
@endif
