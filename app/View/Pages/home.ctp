<div id="v2_home">

    <?php
    echo $this->Html->css(["/v2/slick/slick", '/v2/slick/slick-theme'], ['block' => 'css']);
    if (!empty($data)) { ?>
        <div id="home_slider" class="your-class homePg">
            <?php foreach ($data as $list) {
                $video = $list['VideoSlider']['video_for_pc'];
                $poster = $list['VideoSlider']['poster_for_pc'];
                if (isset($IsMobile)) {
                    $video = $list['VideoSlider']['video_for_mob'];
                    $poster = $list['VideoSlider']['poster_for_mob'];
                }
            ?>
                <div>
                    <div class="video">
                        <video poster="<?php echo $poster; ?>" id="bgvid" playsinline autoplay loop muted>
                            <source src="<?php echo $video; ?>" type="video/mp4">
                        </video>
                        <div class="overlay">
                            <div class="contentWrap text-center">
                                <h3><?php echo strtoupper($list['VideoSlider']['heading']); ?></h3>
                                <a href="<?php echo $list['VideoSlider']['url']; ?>" class="linkBtn"><?php echo strtoupper($list['VideoSlider']['button_title']); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <div class="serVicesLinks">
        <div class="container">
            <div class="row">
                <h2 class="col-xs-6 text-center"><a href=" <?php echo SITEURL; ?>product-exhaust">CAR EXHAUST</a></h2>
                <h2 class="col-xs-6 text-center"><a href=" <?php echo SITEURL; ?>motocycle-exhaust">MOTORCYCLE EXHAUST </a></h2>
            </div>
        </div>
    </div>

    <section class="blogBox pad60">

        <div class="container-fluid mx-90">
            <h1>ARMYTRIX OFFICIAL WEBSITE</h1>
            <h3>NEWS & PROJECTS</h3>
            <div class="row d-flex loadBox" id="blogPost">
                <div class="col-md-4">
                    <div class="blogBox text-left">
                        <div class="imgWraps"><img src="https://res.cloudinary.com/armytrix/image/upload/v1650885696/home/ARMYTRIX.png" alt=""></div>
                        <h4> &nbsp </h4>
                        <p>&nbsp</p><a href="javascript:void(0);" class="wholeBoxLink"></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blogBox text-left">
                        <div class="imgWraps"><img src="https://res.cloudinary.com/armytrix/image/upload/v1650885696/home/ARMYTRIX.png" alt=""></div>
                        <h4> &nbsp </h4>
                        <p>&nbsp</p><a href="javascript:void(0);" class="wholeBoxLink"></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blogBox text-left">
                        <div class="imgWraps"><img src="https://res.cloudinary.com/armytrix/image/upload/v1650885696/home/ARMYTRIX.png" alt=""></div>
                        <h4> &nbsp </h4>
                        <p>&nbsp</p><a href="javascript:void(0);" class="wholeBoxLink"></a>
                    </div>
                </div>

            </div>
            <!-- end of row -->

            <div class="buttonWrap mt-5 text-center">
                <a href=" <?php echo SITEURL; ?>blog/" class="linkBtn btnDark">DISCOVER MORE</a>
            </div>
        </div>
    </section>
    <section class="fullWidthImageWrap pad60">
        <div class="fullWidthImages posRltv">
            <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865455/home/shop_ntocqa.png" alt="full Images">

            <div class="contentWrap text-right bottom20">
                <h2 class="clrWhite">SOUND KIT</h2>
                <a href=" <?php echo SITEURL; ?>sound" class="linkBtn">DISCOVER MORE</a>
            </div>

        </div>


        <div class="fullWidthImages posRltv">
            <img src="https://res.cloudinary.com/armytrix/image/upload/v1651024830/home/Sound__kit_rl8zos.jpg" alt="full Images">

            <div class="contentWrap text-right bottom20">
                <h2 class="clrWhite">APPAREL & ACCESSORIES</h2>
                <a href=" <?php echo SITEURL; ?>shop" class="linkBtn">BUY NOW</a>
            </div>

        </div>


        <div class="fullWidthImages posRltv">
            <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865452/home/test_evkqle.jpg" alt="full Images">

            <div class="contentWrap text-center top30">
                <h2 class="clrWhite">WHAT DO THEY SAY ABOUT ARMYTRIX</h2>
                <a href=" <?php echo SITEURL; ?>testimonial" class="linkBtn">DISCOVER MORE</a>
            </div>

        </div>

    </section>

    <!-- auto play video-->
    <div class="auto-play-video">
        <div class="abst_head midlle bold_light">
            <h2><a href="https://www.youtube.com/user/armytrix?sub_confirmation=1" class="inheritClr">Join Team Armytrix</a></h2>
            <h3>It's Your Turn. Create Your Own Story.</h3>
        </div>

        <div class="posRltv">
            <video width="100%" height="auto" class="_autoplay_vid" id="video_5" muted loop autoplay>
                <source src="https://res.cloudinary.com/armytrix/video/upload/v1650883576/home/armytrix-trailer.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>

        </div>


    </div>
    <!-- auto play video-->

    <div class="fullWidthImages posRltv">
        <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865453/home/main-end_liba2e.png" alt="">

    </div>

</div>



<?php echo $this->Html->script(["/v2/slick/slick.min"], ['block' => 'script']); ?>
<?php $this->Html->scriptStart(array('block' => 'scriptBottom')); ?>
$(document).ready(function() {


    $(window).scroll(function() {
      $('._autoplay_vid').each(function() {
        if ($(this).is(":in-viewport")) {
          $(this)[0].play();
        } else {
          $(this)[0].pause();
        }
      });
    });

$.getJSON('https://www.armytrix.com/blog/wp-json/featured/news', function(data) {
var str = '';
var n = 1;
$(data['news']).each((index, element) => {
if (n <= 3) { var imgList=element['featured_image']; var img='https://res.cloudinary.com/armytrix/image/upload/v1650885696/home/ARMYTRIX.png' ; if (typeof imgList !="undefined" && imgList !=null) { img=imgList.medium_large; } str +='<div class="col-sm-4"><div class="blogBox text-left"><div class="imgWraps"><img src="' + img + '" alt=""></div>' + '<h4>' + element['title'] + '</h4><p><b>' + element['published_on'] + ' </b>: ' + element['description'] + '</p>' + '<a href="' + element['url'] + '" class="wholeBoxLink"></a></div></div>' ; } n=n + 1; }); $("#blogPost").html(str); $("#blogPost").removeClass('loadBox'); }); $('#home_slider').slick({ dots: true, autoplay: true, autoplaySpeed: 10000, infinite: true, speed: 500, fade: true, cssEase: 'linear' , adaptiveHeight: false }); }); <?php $this->Html->scriptEnd(); ?>