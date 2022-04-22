<?php
echo $this->Html->css(["/v2/slick/slick", '/v2/slick/slick-theme']);
?>
<div id="home_slider" class="your-class">
    <div>
        <div class="video">
        <video autoplay muted loop>
  <source src="<?php echo SITEURL; ?>v_4/images/video TI page-21.mp4" type="video/mp4">
  
Your browser does not support the video tag.
</video>    
        
        
        </div>
    </div>

    <div> <img src="https://mclaren.scene7.com/is/image/mclaren/McLaren_GT_Adventures_Dubai_01:crop-16x9?wid=1980&hei=1114"></div>
    <div> <img src="https://tesla-cdn.thron.com/delivery/public/image/tesla/35861782-9705-4f73-84f0-86d615adb661/bvlatuR/std/4096x2560/Model-S-Main-Hero-Desktop-LHD"></div>

</div>



<h1>Hoem page content</h1>




<?php echo $this->Html->script(["/v2/slick/slick.min"]); ?>
<script>
    $(document).ready(function() {

        $('#home_slider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear'
        });

    });
</script>