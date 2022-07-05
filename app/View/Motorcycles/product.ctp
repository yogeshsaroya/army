<?php
echo $this->html->script(['https://kit.fontawesome.com/acae9edaf3.js'], ['block' => 'scriptTop']);

?>

<?php $this->append('meta_data'); ?>

<?php $this->end(); ?>

<?php $this->append('styleTop'); ?>
<style>
    iframe .ytp-chrome-top.ytp-show-cards-title {
        display: none !important;
    }

    .justify-content-center {
        margin: 0 auto;
        display: table;
    }

    .justify-content-center .dropdown {
        font-family: 'Oswald', sans-serif;
        background: #fff;
        font-size: 14px;
    }

    .caret {
        color: #000;
    }

    .justify-content-center .caret {
        margin-left: 10px;
    }

    .justify-content-center .dropdown-menu {
        width: 137px;
        font-size: 14px;
        z-index: 9;
    }

    .justify-content-center .btn-primary {
        color: #fff;
    }

    .justify-content-center .btn-primary:hover {
        color: #fff;
    }

    .justify-content-center .dropdown-menu li a {
        font-weight: 500;
    }

    .flags {
        text-align: left;
        background-color: #fff;
        right: 0;
        left: unset;
    }

    .flags img {
        margin-right: 10px;
        max-width: 24px;
        width: 24px;
    }

    .img_flag {
        max-width: 24px;
        width: 24px;
    }

    .flags li>a:hover {
        text-decoration: none;
        color: #000;
    }

    div#v2_motor_exh .slick-arrow {
        position: absolute;
        top: 50%;
        height: 60px;
        width: 40px;
        left: -45px;
        transform: translateY(-50%);
        background: url(../v2/img/arrowControls.png) no-repeat 0 center;
        background-size: 60px auto;
        z-index: 9;
        opacity: .5
    }

    div#v2_motor_exh .slick-arrow.slick-next {
        background: url(../v2/img/arrowControls.png) no-repeat right center;
        background-size: 60px auto;
        left: auto;
        right: -45px;
        opacity: .5
    }

    .mx-640 {
        max-width: 100%;
        padding: 0px;
        margin: auto;
    }

    #v2_motor_exh .mg-tb-50 {
        margin: 50px 20px
    }

    #v2_motor_exh .pad60 {
        margin-top: 60px
    }

    #v2_motor_exh p {
        font-size: 14px;
        font-weight: 700
    }

    .motor_container .sub_head_4,
    .motor_container .sub_head_5 {
        margin: 100px 0 50px
    }

    #v2_motor_exh .head_1 {
        margin-top: 40px;
        margin-bottom: 100px;
        text-transform: uppercase
    }

    #v2_motor_exh h2.head_2 {
        margin-top: 40px;
        margin-bottom: 40px
    }

    #v2_motor_exh h2.head_3 {
        margin: 100px 0 40px
    }

    .sub_head_1,
    .sub_head_2,
    .sub_head_3 {
        margin: 50px 0
    }

    .sub_head_3 p {
        margin-bottom: 50px
    }

    .motor_container p {
        max-width: 70%;
        display: inline-block
    }

    #v2_motor_exh h2.head_5 {
        margin-bottom: 50px
    }

    section.motor_container {
        max-width: 60%;
        display: inline-block
    }

    .video {
        width: 100vw;
        height: 85vh;
        object-fit: cover
    }

    .other_video video {
        width: 100%;
        max-height: 100%
    }

    .other_video {
        margin: 30px 0 100px;
        position: relative
    }

    section.motor_container {
        max-width: 60%;
        display: inline-block
    }

    .app_pic {
        width: 60%;
        display: inline-block
    }

    #vid_unmute {
        display: flex;
        line-height: 32px;
        cursor: pointer;
        position: absolute;
        background: rgba(0, 0, 0, 0.7);
        color: #fff;
        font-size: 16px;
        z-index: 999;
        padding: 5px 10px;
        bottom: 0;
        right: 0
    }

    .other_video #vid_2,
    #vid_3 {
        display: flex;
        line-height: 32px;
        cursor: pointer;
        position: absolute;
        background: transparent;
        color: #fff;
        font-size: 16px;
        z-index: 999;
        padding: 5px 10px;
        bottom: 0;
        right: 0
    }

    #v2_motor_exh .overlay {
        height: 85vh;
        background: rgba(0, 0, 0, 0)
    }

    .fa {
        font-size: 33px
    }

    .fa_new {
        font-size: 50px;
        margin: 0 10px 5px 5px
    }

    .video {
        font-weight: 800
    }

    div#vid_unmute {
        min-width: 190px
    }

    #v2_motor_exh .overlay_1,
    #v2_motor_exh .overlay_2 {
        position: absolute;
        height: 100%;
        width: 100%;
        z-index: 5;
        background: rgba(0, 0, 0, 0.3)
    }

    .ot_head {
        margin: 70px 0 20px
    }

    #v2_motor_exh .head_1,
    #v2_motor_exh .head_2 {
        margin: 0 30px
    }

    @media (max-width: 1024px) {
        section.motor_container {
            max-width: 80%
        }

        .motor_container p {
            max-width: 80%
        }
    }

    @media (max-width: 768px) {

        #v2_motor_exh .head_1,
        #v2_motor_exh .head_2 {
            margin: 30px 15px
        }

        #v2_motor_exh h2.head_3 {
            margin: 50px 10px;
            font-size: 16px
        }

        #v2_motor_exh .head_1 {
            font-size: 22px
        }

        section.motor_container {
            max-width: 90%
        }

        .motor_container p {
            max-width: 90%
        }

        #v2_motor_exh .pad60 {
            margin-top: 10px
        }

        #v2_motor_exh h2 {
            font-size: 22px
        }

        #v2_motor_exh h3 {
            font-size: 20px
        }

        #v2_motor_exh p {
            font-weight: 500
        }

        .app_pic {
            width: 95%
        }

        .video,
        #v2_motor_exh .overlay {
            height: 70vh
        }

        .other_video {
            margin: 20px 0;
            position: relative
        }
    }

    @media (max-width: 425px) {
        #v2_motor_exh .head_1 {
            font-size: 14px
        }

        #v2_motor_exh .head_1,
        #v2_motor_exh .head_2 {
            margin: 30px 10px
        }

        .motor_container p {
            text-align: justify
        }

        #v2_motor_exh h2 {
            font-size: 14px
        }

        #v2_motor_exh h2.head_3 {
            margin: 50px 10px;
            font-size: 12px
        }

        #v2_main section {
            padding-bottom: 0
        }

        #v2_motor_exh .pad60 {
            margin-top: 0
        }

        .motor_container .sub_head_5 {
            margin: 50px 0 10px
        }
    }

    #play_3,
    #play_2 {
        display: none !important
    }

 

@media (min-width: 768px) {
    #v2_motor_exh .container {
        width: 750px;
    }
}

@media (min-width: 992px) {
    #v2_motor_exh .container {
        width: 970px;
    }
}

@media (min-width: 1200px) {
    #v2_motor_exh .container {
        width: 1170px;
    }
}
#v2_motor_exh .container {
    width: 100% !important;
    padding: 0;
}
</style>
<?php $this->end(); ?>
<div id="v2_motor_exh">

    <h1 class="text-center mt-3 mb-5"><?php echo $data['Motorcycle']['title']; ?></h1>

    <?php if (!empty($langArr)) { ?>
        <div class="justify-content-center">
            <div class="dropdown flags_menu">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-label="dropdown">
                    <img src='<?php echo SITEURL; ?>v2/flags/<?php echo $act_lng; ?>.svg' width='24' class='img-thumbnail img_flag' alt="flag">
                    <span class="caret"></span></button>
                <ul class="dropdown-menu flags">
                    <?php foreach ($langArr as $a => $b) {
                        echo "<li><a href='" . SITEURL . "motorcycle/$b' title=''><img src='" . SITEURL . "v2/flags/" . strtolower($a) . ".svg' width='24' clas='img-thumbnail' alt='flag'> $a</a></li>";
                    } ?>
                </ul>
            </div>
        </div>
    <?php } ?>
    <section class="motor_container">
        <div class="page_container">
            <?php echo $this->element('v2/product_slider', ['slider' => $slider, 'width' => 1080, 'height' => 750]); ?>

            <?php if (!empty($Adata['Video'][0])) { ?>
                <div class="videoWrapperNw page_container fullMxWd" id="pro_1">
                    <?php
                    echo '<div class="video-responsive"><iframe id="home_bg_v" width="100%" height="600" loading="lazy" src="https://www.youtube-nocookie.com/embed/' . $Adata['Video'][0]['video'] . '?controls=1&enablejsapi=1&modestbranding=1&showinfo=0&iv_load_policy=3&html5=1&fs=1&rel=0&hl=en&cc_lang_pref=en&cc_load_policy=1&start=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
                    ?>
                </div>
            <?php } ?>


            <?php if (!empty($Adata['Video'])) { ?>
                <div class="videoWrapperNw page_container fullMxWd" id="pro_1">
                    <?php $a= 1; 
                    foreach ($Adata['Video'] as $vlist) {
                        if($a > 1){
                        echo '<div class="video-responsive"><iframe id="home_bg_v" width="100%" height="600" loading="lazy" src="https://www.youtube-nocookie.com/embed/' . $vlist['video'] . '?controls=1&enablejsapi=1&modestbranding=1&showinfo=0&iv_load_policy=3&html5=1&fs=1&rel=0&hl=en&cc_lang_pref=en&cc_load_policy=1&start=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
                        }
                    $a++; } ?>
                </div>
            <?php } ?>

            <?php echo $this->element('pro/img_list', ['gallery' => $gallery]); ?>



            <div class="sub_head_1">
                <h2 class="mg-tb-50">The first ever valvetronic motorcycle exhaust in the world</h2>
                <br>
                <h3>FREEDOM TO SWITCH BETWEEN LOUD AND QUIET WITH THE PUSH OF A BUTTON</h3>
                <p>With the push of a button on your ARMYRIX remotes or smartphone application, you get to switch between modes upon your wish.</p>
            </div>
            <div class="sub_head_2">
                <h3>CUSTOMIZABLE AUTOMATIC MODE GIVES YOU A WORRY-FREE DRIVE</h3>
                <p>The automatic mode will open/close the exhaust valves based on the predetermined RPM range, so you don’t have to manually switch all the time – you can also customize your own automatic mode upon your preference!</p>
            </div>
            <div class="sub_head_3">
                <h3>ARMYTRIX APP SMART ASSISTANT</h3>
                <p>The mobile APP of ARMYTRIX can connect to the OBDII device via Bluetooth, and be used to as a remote controller to easily control valve switch and provide you with real-time monitoring of variuos values of your car, such as rotate speed, speed, fuel, etc. The rpm value in Auto mode can be set to open valves.</p>
                <div class="row mt-3 mobile50 app_pic">
                    <div class="col-sm-6 text-center">
                        <img src="https://res.cloudinary.com/armytrix/image/upload/fl_progressive,c_scale,q_auto,w_1920/fl_progressive,c_scale,q_auto,w_300/v1651403044/product/product-app-1_sgfbbv.webp" loading="lazy" alt="App">
                    </div>
                    <div class="col-sm-6 text-center">
                        <img src="https://res.cloudinary.com/armytrix/image/upload/fl_progressive,c_scale,q_auto,w_1920/fl_progressive,c_scale,q_auto,w_300/v1651403044/product/product-app2_aevq7p.webp" loading="lazy" alt="App">
                    </div>

                </div>
            </div>
            <div class="sub_head_4">
                <h3>GAIN MORE POWER, LOSE NO TORQUE</h3>
                <p>Depending on the modifications and tunes you have, opening valves allow the exhaust gas to flow more freely, And with the valves being closed, it can retain the backpressure at low rpm and maintain the torque that is usually lost with straight piped exhaust systems.</p>
            </div>
            <img src="https://res.cloudinary.com/armytrix/image/upload/fl_progressive,c_scale,q_auto,w_1920/fl_progressive,c_scale,q_auto,w_980/v1652417585/motorcycle/image/bike_module_vfhnvr.webp" loading="lazy" alt="">


        </div>
        <br><br><br><br>
    </section>

</div>
<?php //$this->Html->scriptStart(array('block' => 'scriptBottom')); 
?>
<script>
    $(window).scroll(function() {
        var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
        var top_of_screen = $(window).scrollTop();

        //Video 1
        var top_of_element = $("#home_slider").offset().top;
        var bottom_of_element = $("#home_slider").offset().top + $("#home_slider").outerHeight();
        var video = document.getElementById("sound_vid");


        //Video 2
        var top_of_element_2 = $("#sound_vid_2").offset().top;
        var bottom_of_element_2 = $("#sound_vid_2").offset().top + $("#sound_vid_2").outerHeight();
        var video_2 = document.getElementById("sound_vid_2");

        //Video 3
        var top_of_element_3 = $("#sound_vid_3").offset().top;
        var bottom_of_element_3 = $("#sound_vid_3").offset().top + $("#sound_vid_3").outerHeight();
        var video_3 = document.getElementById("sound_vid_3");


        if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {
            //if (video.muted === true) { video.muted = false; $("#vid_unmute").html('<i class="fa fa-volume-up" aria-hidden="true"></i> &nbsp; &nbsp; TAP TO MUTE'); }
        } else {
            if (video.muted === false) {
                video.muted = true;
                $("#vid_unmute").html('<i class="fa fa-volume-off" aria-hidden="true"></i> &nbsp; &nbsp; TAP TO UNMUTE');
            }
        }

        if ((bottom_of_screen > top_of_element_2) && (top_of_screen < bottom_of_element_2)) {
            if (video_2.paused == true) {
                video_2.play();
            }
        } else {
            if (video_2.paused == false) {
                video_2.pause();
            }
        }

        if ((bottom_of_screen > top_of_element_3) && (top_of_screen < bottom_of_element_3)) {
            if (video_3.paused == true) {
                video_3.play();
            }
        } else {
            if (video_3.paused == false) {
                video_3.pause();
            }
        }

    });


    window['muteAll'] = function(id) {

        var video1 = document.getElementById("sound_vid");
        var video2 = document.getElementById("sound_vid_2");
        var video3 = document.getElementById("sound_vid_3");
        if (id == 'sound_vid') {
            video2.muted = video3.muted = true;
        } else if (id == 'sound_vid_2') {
            video1.muted = video3.muted = true;
        } else if (id == 'sound_vid_3') {
            video1.muted = video2.muted = true;
        }
    }

    window['play'] = function(id, icon) {
        //muteAll(id);
        var v = document.getElementById(id);
        if (v.paused == true) {
            v.play();
            $("#" + icon).removeClass('fa-solid fa-circle-play').addClass('fa-solid fa-circle-pause');
        } else {
            v.pause();
            $("#" + icon).removeClass('fa-solid fa-circle-pause').addClass('fa-solid fa-circle-play');
        }
    };
    window['sound'] = function(id, icon) {
        //muteAll(id);
        var v = document.getElementById(id);
        if (v.muted === true) {
            v.muted = false;
            $("#" + icon).removeClass('fa-solid fa-volume-xmark').addClass('fa-solid fa-volume-high');
        } else {
            v.muted = true;
            $("#" + icon).removeClass('fa-solid fa-volume-high').addClass('fa-solid fa-volume-xmark');
        }
    };

    $(document).ready(function() {

        $("#vid_unmute").click(function() {
            //muteAll('sound_vid');
            var video1 = document.getElementById("sound_vid");
            if (video1.muted === true) {
                video1.muted = false;
                $("#vid_unmute").html('<i class="fa fa-volume-up" aria-hidden="true"></i> &nbsp; &nbsp; TAP TO MUTE');
            } else {
                video1.muted = true;
                $("#vid_unmute").html('<i class="fa fa-volume-off" aria-hidden="true"></i> &nbsp; &nbsp; TAP TO UNMUTE');
            }
        });

        $("#vid_2111").click(function() {
            muteAll('sound_vid_2');
            var video2 = document.getElementById("sound_vid_2");
            if (video2.muted === true) {
                video2.play();
                video2.muted = false;
                $("#vid_2").html('<i class="fa fa-volume-up" aria-hidden="true"></i> &nbsp; &nbsp; TAP TO MUTE');
            } else {
                video2.pause();
                video2.muted = true;
                $("#vid_2").html('<i class="fa fa-volume-off" aria-hidden="true"></i> &nbsp; &nbsp; TAP TO UNMUTE');
            }
        });

        $("#vid_3111").click(function() {
            muteAll('sound_vid_3');
            var video3 = document.getElementById("sound_vid_3");
            if (video3.muted === true) {
                // video3.play();
                video3.muted = false;
                $("#vid_3").html('<i class="fa fa-volume-up" aria-hidden="true"></i> &nbsp; &nbsp; TAP TO MUTE');
            } else {
                //video3.pause();
                video3.muted = true;
                $("#vid_3").html('<i class="fa fa-volume-off" aria-hidden="true"></i> &nbsp; &nbsp; TAP TO UNMUTE');
            }
        });


    });
</script>
<?php //$this->Html->scriptEnd(); 
?>