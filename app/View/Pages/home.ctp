<?php
echo $this->Html->css(["/v2/slick/slick", '/v2/slick/slick-theme']);
?>
<div id="home_slider" class="your-class">
    <div>
        <div class="video">
            <video poster="https://smartstayz.com/v/working_on_phone.jpg" id="bgvid" playsinline="" autoplay="" loop="">
             <source src="https://smartstayz.com/v/working_on_phone.webm" type="video/webm">
             <source src=" https://smartstayz.com/v/working_on_phone.mp4" type="video/mp4">
            </video>
<!-- overlay and teext -->
            <div class="overlay">
                <div class="contentWrap text-center">
                    <h3>THE FIRST EVER MOTOCYCLE VALVETRONIC EXHAUST</h3>
                    <a href="#" class="linkBtn">WEAPONIZED NOW</a>
                </div>
            </div>
            <!-- end of overlay and text -->
        </div>
    </div>

    <div> <img src="https://mclaren.scene7.com/is/image/mclaren/McLaren_GT_Adventures_Dubai_01:crop-16x9?wid=1980&hei=1114" alt="banner image">
     <!-- overlay and teext -->
            <div class="overlay">
                <div class="contentWrap text-center">
                    <h3>THE FIRST EVER MOTOCYCLE VALVETRONIC EXHAUST</h3>
                    <a href="#" class="linkBtn">WEAPONIZED NOW</a>
                </div>
            </div>
            <!-- end of overlay and text -->
    </div>
    <div> <img src="https://tesla-cdn.thron.com/delivery/public/image/tesla/35861782-9705-4f73-84f0-86d615adb661/bvlatuR/std/4096x2560/Model-S-Main-Hero-Desktop-LHD" alt="banner images"><!-- overlay and teext -->
            <div class="overlay">
                <div class="contentWrap text-center">
                    <h3>THE FIRST EVER MOTOCYCLE VALVETRONIC EXHAUST</h3>
                    <a href="#" class="linkBtn">WEAPONIZED NOW</a>
                </div>
            </div>
            <!-- end of overlay and text --></div>

</div>

<section class="serVicesLinks">
<div class="container">
    <div class="row">
        <h1 class="col-xs-6 text-center"><a href="#">CAR EXHAUST</a></h1>
        <h1 class="col-xs-6 text-center"><a href="#">MOTORCYCLE EXHAUST </a></h1>
    </div>
</div>
</section>

<section>
    <div class="container">
         <h1>ARMYTRIX OFFICIAL WEBSITE</h1>
         <h3>NEWS & PROJECTS</h3>
         <div class="row d-flex">
             <div class="col-sm-4">
                 <div class="blogBox text-left">
                     <a href="#">
                         <img src="<?php echo SITEURL;?>v2/img/shop.jpg" alt="blog Images">
                     </a>
                    
                         <p>LBWK Corvette C8 PROJECT</p>
                         <p>22.04.2022 FILM KILLER LBWK C8 <a href="#">#ARMYTRIX</a> x AIRLIFT x Liberty Walk Silhouette WORKS x LTMW</p>
                    
                 </div>
             </div>
             <!-- end of colom -->
             <div class="col-sm-4">
                  <div class="blogBox text-left">
                     <a href="#">
                         <img src="<?php echo SITEURL;?>v2/img/shop.jpg" alt="blog Images">
                     </a>
                    
                         <p>LBWK Corvette C8 PROJECT</p>
                         <p>22.04.2022 FILM KILLER LBWK C8 <a href="#">#ARMYTRIX</a> x AIRLIFT x Liberty Walk Silhouette WORKS x LTMW</p>
                    
                 </div>
             </div>
             <!-- end of colom -->
             <div class="col-sm-4">
                 <div class="blogBox text-left">
                     <a href="#">
                         <img src="<?php echo SITEURL;?>v2/img/shop.jpg" alt="blog Images">
                     </a>
                    
                         <p>LBWK Corvette C8 PROJECT</p>
                         <p>22.04.2022 FILM KILLER LBWK C8 <a href="#">#ARMYTRIX</a> x AIRLIFT x Liberty Walk Silhouette WORKS x LTMW</p>
                    
                 </div>
             </div>
             <!-- end of colom -->
         </div>
         <!-- end of row -->

         <div class="buttonWrap mt-5 text-center">
             <a href="#" class="linkBtn btnDark">DISCOVER  MORE</a>
         </div>
    </div>
</section>
<section class="fullWidthImageWrap">
    <div class="fullWidthImages posRltv">
         <img src="<?php echo SITEURL;?>v2/img/shop.jpg" alt="full Images">
         <!-- teext -->
                <div class="contentWrap text-right bottom20">
                    <h2 class="clrWhite">SOUND KIT</h2>
                    <a href="#" class="linkBtn">DISCOVER MORE</a>
                </div>
            <!-- end of text -->
    </div>
    <!-- end of full width image wrap -->

     <div class="fullWidthImages posRltv">
         <img src="<?php echo SITEURL;?>v2/img/sound_kit.jpg" alt="full Images">
         <!-- teext -->
                <div class="contentWrap text-right bottom20">
                    <h2 class="clrWhite">APPAREL & ACCESSORIES</h2>
                    <a href="#" class="linkBtn">BUY NOW</a>
                </div>
            <!-- end of text -->
    </div>
    <!-- end of full width image wrap -->

    <div class="fullWidthImages posRltv">
         <img src="<?php echo SITEURL;?>v2/img/testArmytrix.jpg" alt="full Images">
         <!-- teext -->
                <div class="contentWrap text-center top30">
                    <h2 class="clrWhite">WHAT DO THEY SAY ABOUT ARMYTRIX</h2>
                    <a href="#" class="linkBtn">DISCOVER MORE</a>
                </div>
            <!-- end of text -->
    </div>
    <!-- end of full width image wrap -->
</section>

<!-- auto play video-->
<div class="auto-play-video">
    <div class="abst_head midlle bold_light">
   <h1>Join Team Armytrix</h1>
   <h3>It's Your Turn. Creat Your Own Story.</h3>   
<video width="100%" height="auto" controls="disable"  class="_autoplay_vid" muted id="video_5">
  <source src="<?php echo SITEURL;?>v_4/images/video TI page-21.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
 
 </div> 
</div>
<!-- auto play video--> 



<?php echo $this->Html->script(["/v2/slick/slick.min"]); ?>
<script>
    $(document).ready(function() {

        $('#home_slider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            adaptiveHeight : false
        });

    });
</script>