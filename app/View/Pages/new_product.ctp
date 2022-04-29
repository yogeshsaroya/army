<?php echo $this->Html->css(["/v2/slick/slick", '/v2/slick/slick-theme',"/v2/product_page.css?v=" . rand(5646, 65465)], ['block' => 'css']); ?>
<div id="v2_product">

  <h1 class="text-center mb-5">BMW F80 M3 (201-2019) OPF/NON-OPF ARMYTRIX VALVETRONIC EXHAUST SYSTEM</h1>

  <div class="whiteHeader headSpac mx-640" id="product_slider" >
      <div class="prodctBg"><img src="https://www.armytrix.com/cdn/800_530_100_ff_cdn/bmw-g80-m3/6-g82-m4.jpg" loading="lazy" alt=""></div>
      <div class="prodctBg"><img src="https://www.armytrix.com/cdn/800_530_100_ff_cdn/bmw-g80-m3/6-g82-m4.jpg" loading="lazy" alt=""></div>
      <div class="prodctBg"><img src="https://www.armytrix.com/cdn/800_530_100_ff_cdn/bmw-g80-m3/6-g82-m4.jpg" loading="lazy" alt=""></div>
  </div>

  <!-- end of slider wrap -->

  <div class="v2_conatainer hide">
    <div class="v2_row">
      <div class="col-sm-6">
        <div class="selectBox">
          <select class="fullWidth">
            <option>BMW G80 M3 ,M3 Competition 2020 + </option>
            <option>BMW G80 M3 ,M3 Competition 2020 + </option>
            <option>BMW G80 M3 ,M3 Competition 2020 + </option>
            <option>BMW G80 M3 ,M3 Competition 2020 + </option>
          </select>
        </div>
      </div>
      <!-- end of col -->

      <div class="col-sm-6">
        <div class="selectBox">
          <select class="fullWidth">
            <option>BMW G80 M3 ,M3 Competition 2020 + </option>
            <option>BMW G80 M3 ,M3 Competition 2020 + </option>
            <option>BMW G80 M3 ,M3 Competition 2020 + </option>
            <option>BMW G80 M3 ,M3 Competition 2020 + </option>
          </select>
        </div>
      </div>
      <!-- end of col -->

    </div>
  </div>


  <div class="fullWidthImageWrap pad60">
    <div class="fullWidthImages posRltv">
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865426/product/armytrix-product-exhaust.jpg" loading="lazy" alt="">
    </div>

  </div>

  <div class="videoWrapper">
    <iframe id="home_bg_v" style=" z-index: -99; width: 100%; height: autp" src="https://www.youtube.com/embed/V9t_oN6KHrs?&amp;playlist=V9t_oN6KHrs&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;rel=0&amp;loop=1&amp;controls=0&amp;vq=hd1080&amp;enablejsapi=1" allowfullscreen="" frameborder="0"></iframe>
  </div>


  <div class="slide_images">
    <div id="slideshow2"></div>
  </div>


  <?php
  
    echo $this->element('pro/s2a');
    echo $this->element('pro/s3');
    echo $this->element('pro/s4');
    echo $this->element('pro/s8');
    echo $this->element('pro/s18');
  ?>

</div>

<?php echo $this->Html->script(["/v2/slick/slick.min"], ['block' => 'scriptBottom']); ?>
<?php $this->Html->scriptStart(array('block' => 'scriptBottom')); ?>
$(document).ready(function() {

  $('#product_slider').slick({
    dots: true,
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: 'linear'
      }); 



});

<?php $this->Html->scriptEnd(); ?>