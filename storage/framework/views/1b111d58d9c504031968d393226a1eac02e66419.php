<style>
  /* zalo, phone */
  #button-contact-vr {
    position: fixed;
    bottom: 0;
    z-index: 99999;
  }

  /*phone*/
  #button-contact-vr .button-contact {
    position: relative;
  }

  #button-contact-vr .button-contact .phone-vr {
    position: relative;
    visibility: visible;
    background-color: transparent;
    width: 90px;
    height: 90px;
    cursor: pointer;
    z-index: 11;
    -webkit-backface-visibility: hidden;
    -webkit-transform: translateZ(0);
    transition: visibility .5s;
    left: 0;
    bottom: 0;
    display: block;
  }

  .phone-vr-circle-fill {
    width: 65px;
    height: 65px;
    top: 12px;
    left: 12px;
    position: absolute;
    box-shadow: 0 0 0 0 #c31d1d;
    background-color: rgba(230, 8, 8, 0.7);
    border-radius: 50%;
    border: 2px solid transparent;
    -webkit-animation: phone-vr-circle-fill 2.3s infinite ease-in-out;
    animation: phone-vr-circle-fill 2.3s infinite ease-in-out;
    transition: all .5s;
    -webkit-transform-origin: 50% 50%;
    -ms-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    -webkit-animuiion: zoom 1.3s infinite;
    animation: zoom 1.3s infinite;
  }

  .phone-vr-img-circle {
    background-color: #e60808;
    width: 40px;
    height: 40px;
    line-height: 40px;
    top: 25px;
    left: 25px;
    position: absolute;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    -webkit-animation: phonering-alo-circle-img-anim 1s infinite ease-in-out;
    animation: phone-vr-circle-fill 1s infinite ease-in-out;
  }

  .phone-vr-img-circle a {
    display: block;
    line-height: 37px;
  }

  .phone-vr-img-circle img {
    max-width: 25px;
  }

  @-webkit-keyframes phone-vr-circle-fill {
    0% {
      -webkit-transform: rotate(0) scale(1) skew(1deg);
    }

    10% {
      -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
    }

    20% {
      -webkit-transform: rotate(25deg) scale(1) skew(1deg);
    }

    30% {
      -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
    }

    40% {
      -webkit-transform: rotate(25deg) scale(1) skew(1deg);
    }

    50% {
      -webkit-transform: rotate(0) scale(1) skew(1deg);
    }

    100% {
      -webkit-transform: rotate(0) scale(1) skew(1deg);
    }
  }

  @-webkit-keyframes zoom {
    0% {
      transform: scale(.9)
    }

    70% {
      transform: scale(1);
      box-shadow: 0 0 0 15px transparent
    }

    100% {
      transform: scale(.9);
      box-shadow: 0 0 0 0 transparent
    }
  }

  @keyframes  zoom {
    0% {
      transform: scale(.9)
    }

    70% {
      transform: scale(1);
      box-shadow: 0 0 0 15px transparent
    }

    100% {
      transform: scale(.9);
      box-shadow: 0 0 0 0 transparent
    }
  }

  .phone-bar a {
    position: fixed;
    bottom: 25px;
    left: 30px;
    z-index: -1;
    background: rgb(232, 58, 58);
    color: #fff;
    font-size: 16px;
    padding: 8px 15px 7px 50px;
    border-radius: 100px;
    white-space: nowrap;
  }

  .phone-bar a:hover {
    opacity: 0.8;
    color: #fff;
  }

  @media(max-width: 736px) {
    .phone-bar {
      display: none;
    }
  }

  #zalo-vr .phone-vr-circle-fill {
    box-shadow: 0 0 0 0 #2196F3;
    background-color: rgba(33, 150, 243, 0.7);
  }

  #zalo-vr .phone-vr-img-circle {
    background-color: #2196F3;
  }

  #viber-vr .phone-vr-circle-fill {
    box-shadow: 0 0 0 0 #714497;
    background-color: rgba(113, 68, 151, 0.8);
  }

  #viber-vr .phone-vr-img-circle {
    background-color: #714497;
  }

  #contact-vr .phone-vr-circle-fill {
    box-shadow: 0 0 0 0 #2196F3;
    background-color: rgba(33, 150, 243, 0.7);
  }

  #contact-vr .phone-vr-img-circle {
    background-color: #2196F3;
  }
</style>
<div id="button-contact-vr">
  <!-- contact -->
  <!-- end contact -->

  <!-- viber -->
  <!-- end viber -->
  <?php if(isset($web_information->social->zalo) && $web_information->social->zalo != ''): ?>
  <!-- zalo -->
  <div id="zalo-vr" class="button-contact">
    <div class="phone-vr">
      <div class="phone-vr-circle-fill"></div>
      <div class="phone-vr-img-circle">
        <a target="_blank" href="<?php echo e($web_information->social->zalo); ?>">
          <img src="<?php echo e(asset('images/zalo.png')); ?>" />
        </a>
      </div>
    </div>
  </div>
  <!-- end zalo -->
  <?php endif; ?>
  <?php if(isset($web_information->social->call_now) && $web_information->social->call_now != ''): ?>
    <!-- Phone -->
    <div id="phone-vr" class="button-contact">
      <div class="phone-vr">
        <div class="phone-vr-circle-fill"></div>
        <div class="phone-vr-img-circle">
          <a href="tel:<?php echo e($web_information->social->call_now); ?>">
            <img src="<?php echo e(asset('images/phone.png')); ?>" />
          </a>
        </div>
      </div>
    </div>
    <div class="phone-bar">
      <a href="tel:<?php echo e($web_information->social->call_now); ?>">
        <span class="text-phone"><?php echo e($web_information->social->call_now); ?></span>
      </a>
    </div>

    <!-- end phone -->
  <?php endif; ?>
</div>
<?php /**PATH D:\project\qlady\resources\views/frontend/components/sticky/contact.blade.php ENDPATH**/ ?>