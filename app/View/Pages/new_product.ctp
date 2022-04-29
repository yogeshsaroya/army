<?php echo $this->Html->css(["/v2/product_page", "/v2/slick/slick", '/v2/slick/slick-theme'], ['block' => 'css']); ?>


<section id="v2_main">
  <div id="v2_product">

    <h1 class="text-center mb-5">BMW F80 M3 (201-2019) OPF/NON-OPF ARMYTRIX VALVETRONIC EXHAUST SYSTEM</h1>

    <div class="whiteHeader headSpac mx-640" id="product_slider">
      <div>
        <div class="prodctBg">
          <img src="https://www.armytrix.com/cdn/800_530_100_ff_cdn/bmw-g80-m3/6-g82-m4.jpg" loading="lazy" alt="">
        </div>
      </div>
      <!-- end of slider -->
      <div>
        <div class="prodctBg">
          <img src="https://www.armytrix.com/cdn/800_530_100_ff_cdn/bmw-g80-m3/6-g82-m4.jpg" loading="lazy" alt="">
        </div>
      </div>
      <!-- end of slider -->
      <div>
        <div class="prodctBg">
          <img src="https://www.armytrix.com/cdn/800_530_100_ff_cdn/bmw-g80-m3/6-g82-m4.jpg" loading="lazy" alt="">
        </div>
      </div>
      <!-- end of slider -->
    </div>

    <!-- end of slider wrap -->

    <div class="v2_conatainer">
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
        <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865426/product/armytrix-product-exhaust.jpg" loading="lazy" alt="full Images">
      </div>
      <div class="fullWidthImages posRltv">
        <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865426/product/armytrix-product-exhaust.jpg" loading="lazy" alt="full Images">
      </div>
      <div class="fullWidthImages posRltv">
        <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865426/product/armytrix-product-exhaust.jpg" loading="lazy" alt="full Images">
      </div>
      <div class="fullWidthImages posRltv">
        <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865426/product/armytrix-product-exhaust.jpg" loading="lazy" alt="full Images">
      </div>
      <div class="fullWidthImages posRltv">
        <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865426/product/armytrix-product-exhaust.jpg" loading="lazy" alt="full Images">
      </div>


      <div class="videoWrapper">
        <iframe id="home_bg_v" style=" z-index: -99; width: 100%; height: autp" src="https://www.youtube.com/embed/V9t_oN6KHrs?&amp;playlist=V9t_oN6KHrs&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;rel=0&amp;loop=1&amp;controls=0&amp;vq=hd1080&amp;enablejsapi=1" allowfullscreen="" frameborder="0"></iframe>
      </div>

    </div>

  </div>

</section>








<?php echo $this->Html->script(["/v2/slick/slick.min"], ['block' => 'script']); ?>
<?php $this->Html->scriptStart(array('block' => 'scriptBottom')); ?>
$(document).ready(function() {

$('#product_slider').slick({
dots: true,
arrows : true,
autoplay: true,
autoplaySpeed: 2000,
infinite: true,
speed: 500,
fade: true,
cssEase: 'linear' ,
adaptiveHeight: false ,
enableTouch:true,
enableDrag:true,
freeMove:true,
});


});

<?php $this->Html->scriptEnd(); ?>