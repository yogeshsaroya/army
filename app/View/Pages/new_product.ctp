<?php echo $this->Html->css(["/v2/product_page", "/v2/slick/slick", '/v2/slick/slick-theme'], ['block' => 'css']); ?>


<section id="v2_main">
 <div id="v2_product">

    <h1 class="text-center mb-5">BMW F80 M3 (201-2019) OPF/NON-OPF ARMYTRIX VALVETRONIC EXHAUST SYSTEM</h1>

<div class="whiteHeader headSpac mx-640" id="product_slider">
  <div>
    <div class="prodctBg">
        <img src="https://www.armytrix.com/cdn/800_530_100_ff_cdn/bmw-g80-m3/6-g82-m4.jpg" alt="">
     </div>
   </div>
   <!-- end of slider -->
<div>
    <div class="prodctBg">
        <img src="https://www.armytrix.com/cdn/800_530_100_ff_cdn/bmw-g80-m3/6-g82-m4.jpg" alt="">
     </div>
   </div>
   <!-- end of slider --><div>
    <div class="prodctBg">
        <img src="https://www.armytrix.com/cdn/800_530_100_ff_cdn/bmw-g80-m3/6-g82-m4.jpg" alt="">
     </div>
   </div>
   <!-- end of slider -->
</div>

<!-- end of slider wrap -->

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