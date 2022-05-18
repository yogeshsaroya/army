<?php
echo $this->html->script(['https://kit.fontawesome.com/acae9edaf3.js'], ['block' => 'scriptTop']);
$video = 'https://res.cloudinary.com/armytrix/video/upload/v1652864636/motorcycle/sound_kit/spec1_XSR900-landscape_ne1pmj.mp4';
$videoWebm = 'https://res.cloudinary.com/armytrix/video/upload/v1652864636/motorcycle/sound_kit/spec1_XSR900-landscape_ne1pmj.webm';
$poster = 'https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652759607/motorcycle/sound_kit/XSR900_landscape_ibf79u.webp';


$video1 = 'https://res.cloudinary.com/armytrix/video/upload/q_auto:best/v1652853495/motorcycle/sound_kit/RSV4_armytrix_exhaust-landsape_qyydgk.mp4';
$video1Webm = 'https://res.cloudinary.com/armytrix/video/upload/q_auto:best/v1652853495/motorcycle/sound_kit/RSV4_armytrix_exhaust-landsape_qyydgk.webm';
$poster1 = 'https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,h_1080,w_1920/v1652759119/motorcycle/image/RSV4_armytrix_exhaust-landsape_itnjvr.webp';

$video2 = 'https://res.cloudinary.com/armytrix/video/upload/q_auto:best/v1652853493/motorcycle/sound_kit/XTM1920-landscape_frj4zr.mp4';
$video2Webm = 'https://res.cloudinary.com/armytrix/video/upload/q_auto:best/v1652853493/motorcycle/sound_kit/XTM1920-landscape_frj4zr.webb';
$poster2 = 'https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,h_1080,w_1920/v1652759119/motorcycle/image/KTM1920_armytrix_exhaust-landscape_hwrhvf.webp';
if (isset($IsMobile)) {
    $video = 'https://res.cloudinary.com/armytrix/video/upload/q_auto:best/v1652853470/motorcycle/sound_kit/XSR900-portrait_ixw54k.mp4';
    $videoWebm = 'https://res.cloudinary.com/armytrix/video/upload/q_auto:best/v1652853470/motorcycle/sound_kit/XSR900-portrait_ixw54k.webm';
    $poster = 'https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_720/v1652759607/motorcycle/sound_kit/XSR900_portrait_y1jddd.webp';

    
    $video1 = 'https://res.cloudinary.com/armytrix/video/upload/q_auto:best/v1652853492/motorcycle/sound_kit/RSV4_armytrix_exhaust-portrait_d2kb41.mp4';
    $video1Webm = 'https://res.cloudinary.com/armytrix/video/upload/q_auto:best/v1652853492/motorcycle/sound_kit/RSV4_armytrix_exhaust-portrait_d2kb41.webm';
    $poster1 = 'https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_720/v1652759120/motorcycle/image/RSV4_armytrix_exhaust-portrait_hlpxzl.webp';

    $video2 = 'https://res.cloudinary.com/armytrix/video/upload/q_auto:best/v1652853491/motorcycle/sound_kit/XTM192-portrait_mda97w.mp4';
    $video2Webm = 'https://res.cloudinary.com/armytrix/video/upload/q_auto:best/v1652853491/motorcycle/sound_kit/XTM192-portrait_mda97w.webm';
    $poster2 = 'https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_720/v1652759118/motorcycle/image/KTM1920_armytrix_exhaust-portrait_igvdgu.webp';
}
?>
<?php $this->append('meta_data');?>
<link rel="preload" as="image" href="<?php echo $poster; ?>">
<style>
    #v2_motor_exh .mg-tb-50 {
        margin: 50px 20px 50px 20px;
    }

    #v2_motor_exh .pad60 {
        margin-top: 60px;
    }

    #v2_motor_exh p {
        font-size: 14px;
        font-weight: 700;
    }

    .motor_container .sub_head_4,
    .motor_container .sub_head_5 {
        margin: 100px 0 50px 0;
    }

    #v2_motor_exh .head_1 {
        margin-top: 40px;
        margin-bottom: 100px;
        text-transform: uppercase;
    }

    #v2_motor_exh h2.head_2 {
        margin-top: 40px;
        margin-bottom: 40px;
    }

    #v2_motor_exh h2.head_3 {
        margin: 100px 0 40px 0;
    }

    .sub_head_1,
    .sub_head_2,
    .sub_head_3 {
        margin: 50px 0;
    }

    .sub_head_3 p {
        margin-bottom: 50px;
    }

    .motor_container p {
        max-width: 70%;
        display: inline-block;
    }

    #v2_motor_exh h2.head_5 {
        margin-bottom: 50px;
    }

    section.motor_container {
        max-width: 60%;
        display: inline-block;
    }

    .video {
        width: 100vw;
        height: 85vh;
        object-fit: cover;
    }

    .other_video video {
        width: 100%;
        max-height: 100%;

    }

    .other_video {
        margin: 30px 0 100px 0px;
        position: relative;

    }

    section.motor_container {
        max-width: 60%;
        display: inline-block;
    }

    .app_pic {
        width: 60%;
        display: inline-block;
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
        padding: 5px 10px 5px 10px;
        bottom: 0;
        right: 0;
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
        padding: 5px 10px 5px 10px;
        bottom: 0;
        right: 0;
    }

    #v2_motor_exh .overlay {
        height: 85vh;
        background: rgba(0, 0, 0, 0);
    }

    .fa{
        font-size: 33px;
    }
    .fa_new {
    font-size: 50px;
    margin: 0 10px 5px 5px;
}
    .video {
        font-weight: 800;
    }

    div#vid_unmute {
        min-width: 190px;
    }

    #v2_motor_exh .overlay_1,
    #v2_motor_exh .overlay_2 {
        position: absolute;
        height: 100%;
        width: 100%;
        z-index: 5;
        background: rgba(0, 0, 0, 0.3);
    }

    .ot_head {
        margin: 70px 0 20px 0;
    }

    #v2_motor_exh .head_1,
    #v2_motor_exh .head_2 {
        margin: 0 30px;
    }

    @media (max-width: 1024px) {
        section.motor_container {
            max-width: 80%;
        }

        .motor_container p {
            max-width: 80%;
        }
    }

    @media (max-width: 768px) {

        #v2_motor_exh .head_1,
        #v2_motor_exh .head_2 {
            margin: 30px 15px;
        }

        #v2_motor_exh h2.head_3 {
            margin: 50px 10px;
            font-size: 16px
        }

        #v2_motor_exh .head_1 {
            font-size: 22px;
        }

        section.motor_container {
            max-width: 90%;
        }

        .motor_container p {
            max-width: 90%;

        }

        #v2_motor_exh .pad60 {
            margin-top: 10px;
        }

        #v2_motor_exh h2 {
            font-size: 22px;
        }

        #v2_motor_exh h3 {
            font-size: 20px;
        }

        #v2_motor_exh p {
            font-weight: 500;
        }

        .app_pic {
            width: 95%;
        }

        .video,
        #v2_motor_exh .overlay {
            height: 70vh;

        }

        .other_video {
            margin: 20px 0 20px 0px;
            position: relative;

        }
    }

    @media (max-width: 425px) {
        #v2_motor_exh .head_1 {
            font-size: 14px;
        }

        #v2_motor_exh .head_1,
        #v2_motor_exh .head_2 {
            margin: 30px 10px;
        }
        .motor_container p {
            text-align: justify;
        }
        #v2_motor_exh h2 {
            font-size: 14px;
        }
        #v2_motor_exh h2.head_3 {
            margin: 50px 10px;
            font-size: 12px
        }
        #v2_main section {
            padding-bottom: 0;

        }
        #v2_motor_exh .pad60 {
            margin-top: 0px;
        }
        .motor_container .sub_head_5 {
            margin: 50px 0 10px 0;
        }
    }
    
    #play_3, #play_2 {display: none !important}
</style>
<?php $this->end(); ?>
<div id="v2_motor_exh">
    <div id="home_slider" class="your-class homePg">
        <div class="video">
            <div class="overlay">
                <div id="vid_unmute"> <i class="fa fa-volume-off" aria-hidden="true"></i> &nbsp; &nbsp; TAP TO UNMUTE </div>
            </div>
            <video id="sound_vid" poster="<?php echo $poster; ?>" id="bgvid" preload="none" playsinline autoplay loop muted>
            <source src="<?php echo $videoWebm; ?>" type="video/webm">
                <source src="<?php echo $video; ?>" type="video/mp4">
            </video>
        </div>
    </div>

    <section class="fullWidthImageWrap pad60">
        <h1 class="head_1">The first ever valvetronic motorcycle exhaust in the world</h1>
        <h2 class="head_2">APRILIA RSV4 RF 2017 with ARMYTRIX Full Evolution Line Valvetronic Exhaust System</h2>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/c_scale,q_auto:best,w_1920/v1652759121/motorcycle/image/RSV4_armytrix_exhaust-2_cirlcn.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/c_scale,q_auto:best,w_1920/v1652759119/motorcycle/image/RSV4_armytrix_exhaust-landsape_itnjvr.webp" loading="lazy" alt=""></div>

        <div class="sec_1">
            <h2 class="head_3">MOTORCYCLE VALVETRONIC EXHAUST-HOW IT WORKS</h2>
        </div>

        <div class="other_video">
            <video id="sound_vid_2" poster="<?php echo $poster1; ?>" preload="none" playsinline loop muted autoplay>
            <source src="<?php echo $video1Webm; ?>" type="video/webm">
                <source src="<?php echo $video1; ?>" type="video/mp4">
            </video>
            <div id="vid_2">
            <i class="fa_new fa-solid fa-circle-play" id="play_2" onclick="play('sound_vid_2','play_2');"></i>
            &nbsp; &nbsp;
            <i class="fa_new fa-solid fa-volume-xmark" id="sound_2" onclick="sound('sound_vid_2','sound_2');"></i>  
            </div>
        </div>
    </section>
    <section class="motor_container">
        <div class="page_container">
            <div class="sub_head_1">
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
                        <img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/c_scale,q_auto:best,w_300/v1651403044/product/product-app-1_sgfbbv.webp" loading="lazy" alt="App">
                    </div>
                    <div class="col-sm-6 text-center">
                        <img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/c_scale,q_auto:best,w_300/v1651403044/product/product-app2_aevq7p.webp" loading="lazy" alt="App">
                    </div>

                </div>
            </div>
            <div class="sub_head_4">
                <h3>GAIN MORE POWER, LOSE NO TORQUE</h3>
                <p>Depending on the modifications and tunes you have, opening valves allow the exhaust gas to flow more freely, And with the valves being closed, it can retain the backpressure at low rpm and maintain the torque that is usually lost with straight piped exhaust systems.</p>
            </div>
            <img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/c_scale,q_auto:best,w_980/v1652417585/motorcycle/image/bike_module_vfhnvr.webp" loading="lazy" alt="">
            
            <div class="sub_head_5">
                <h2 class="head_5">A Stunning Custom Motorcycle - Masterpiece by ROUGH CRAFTS <br> YAMAHA XSR900 with ARMYTRIX Valvetronic Exhaust</h2>
                <h3 class="head_6">Tuning List</h3>
                <ul>
                    <li>Rough Crafts Carbon Front Fender</li>
                    <li>Rough Crafts Gas Tank Covers</li>
                    <li>Rough Crafts Seat / Tail sectionn</li>
                    <li>Koso License Plate Bracket</li>
                    <li>Koso Taillight / Turn Signal</li>
                    <li>Koso Headlight</li>
                    <li>Öhlins Andreani Monoshock</li>
                    <li>Beringer brakes</li>
                    <li>Pirelli tires</li>
                    <li>BST carbon fiber wheels</li>
                    <br><br>
                    <li>ARMYTRIX Black Coating Header with de-catted pipe</li>
                    <li>ARMYTRIX Valvetronic Slip on system - Carbon muffler</li>
                    <li>+ Noise Damper (DB Killer)</li>
                    <li>+ Silver Chrome ARMYTRIX End CAP</li>
                    <li>+ Wireless Remote Control Kits</li>
                    <li>+ Moblie APP smart assistant</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="fullWidthImageWrap pad60">
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652760100/motorcycle/image/armytrix_xsr900-13_ymfngg.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652760101/motorcycle/image/armytrix_xsr900-15_phssjo.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652760101/motorcycle/image/armytrix_xsr900-16_jzzrlf.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652760100/motorcycle/image/armytrix_xsr900-12_c0tvuw.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652760100/motorcycle/image/armytrix_xsr900-11_rhbhdd.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652863609/motorcycle/image/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-7_zvnr2i.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652863274/motorcycle/image/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-9_nnc11e.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652760104/motorcycle/image/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-2_wmtv3j.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652760104/motorcycle/image/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-5_pnwlfh.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652760104/motorcycle/image/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-3_wztd7u.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652760104/motorcycle/image/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-5_pnwlfh.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652760103/motorcycle/image/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-6_ul8pdm.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652863609/motorcycle/image/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-7_zvnr2i.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652760104/motorcycle/image/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-8_dvw4hj.webp" loading="lazy" alt=""></div>
        
        
        <div class="ot_head">
            <h2>2021 KTM Duke 1290 Super R ABS</h2>
            <h3>ARMYTRIX Slip-on Line Carbon Muffler</h3>
        </div>
        <div class="other_video">
            <video id="sound_vid_3" poster="<?php echo $poster2; ?>" preload="none" playsinline loop muted>
            <source src="<?php echo $video2Webm; ?>" type="video/webm">
                <source src="<?php echo $video2; ?>" type="video/mp4">
            </video>
            <div id="vid_3">
            <i class="fa_new fa-solid fa-circle-play" id="play_3" onclick="play('sound_vid_3','play_3');"></i>
            &nbsp; &nbsp;
            <i class="fa_new fa-solid fa-volume-xmark" id="sound_3" onclick="sound('sound_vid_3','sound_3');"></i>  
        </div>
        </div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652759119/motorcycle/image/KTM_1920_armytrix_exhaust-1_ijdfm8.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652759119/motorcycle/image/KTM1920_armytrix_exhaust-2_h7s4h7.webp" loading="lazy" alt=""></div>
        <h2 class="mg-tb-50">Stay Tune for ARMYTRIX motorcycle Valvetronic Exhaust projects</h2>
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
            if(video_2.paused ==  true){ video_2.play(); }
        } else {
            if( video_2.paused == false ){ video_2.pause(); }
        }

        if ((bottom_of_screen > top_of_element_3) && (top_of_screen < bottom_of_element_3)) {
            if(video_3.paused ==  true){ video_3.play(); }
        } else {
            if( video_3.paused == false ){ video_3.pause(); }
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

    window['play'] = function(id,icon) {
        //muteAll(id);
        var v = document.getElementById(id);
        if (v.paused == true) { v.play(); $("#"+icon).removeClass('fa-solid fa-circle-play').addClass('fa-solid fa-circle-pause'); } 
        else { v.pause(); $("#"+icon).removeClass('fa-solid fa-circle-pause').addClass('fa-solid fa-circle-play'); }
    };
    window['sound'] = function(id,icon) {
        //muteAll(id);
        var v = document.getElementById(id);
        if (v.muted === true) { v.muted = false; $("#"+icon).removeClass('fa-solid fa-volume-xmark').addClass('fa-solid fa-volume-high'); } 
        else { v.muted = true; $("#"+icon).removeClass('fa-solid fa-volume-high').addClass('fa-solid fa-volume-xmark'); }
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