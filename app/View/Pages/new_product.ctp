<?php echo $this->Html->css(["/v2/slick/slick", '/v2/slick/slick-theme'], ['block' => 'css']); ?>



<div class="your-class" id="product_slider">
  <div><img src="https://www.armytrix.com/cdn/800_530_100_ff_cdn/bmw-g80-m3/6-g82-m4.jpg" alt=""></div>
  <div><img src="https://www.armytrix.com/cdn/800_530_100_ff_cdn/bmw-g80-m3/1-g82-m4.jpg" alt=""></div>
  <div><img src="https://www.armytrix.com/cdn/800_530_100_ff_cdn/bmw-g80-m3/3-g82-m4.jpg" alt=""></div>
</div>



<!--start 3 Modes One-key switch -->
<section style="position: relative;">

<div class="models_switch">
  <div class="page-titles">
    <h3 class="head-arm">3 Modes Switch</h3>
  </div>

  <div class="mid-sec row">
    <ul id="slideshow2_thumbs" class="desoslide-thumbs-horizontal list-inline text-center">
      <li>
        <img loading="lazy" src="<?php echo SITEURL; ?>/v_4/images/mouse-icon1-02.png" alt="" /><br>Smart Mode

      </li>
      <li class="color_green">
        <a href="<?php echo SITEURL; ?>v_4/images/mouse-hover-b2.jpg">
          <img loading="lazy" src="<?php echo SITEURL; ?>v_4/images/mouse-icon1-hover.png" alt="" id="menuImg">
        </a><br>Neighbor Mode

      </li>
      <li>
        <a href="<?php echo SITEURL; ?>v_4/images/mouse-hover-b1.jpg">
          <img loading="lazy" src="<?php echo SITEURL; ?>v_4/images/mouse-icon3.png" alt="" id="menuImg1">
        </a><br> Beast Mode


      </li>

    </ul>
  </div>
</div>
<!--end of modal key sec-->


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
    }); }); 
    
    <?php $this->Html->scriptEnd(); ?>