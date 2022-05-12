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

    #v2_motor_exh h2.head_1 {
        margin-top: 40px;
        margin-bottom: 100px;
    }

    #v2_motor_exh h2.head_2 {
        margin-top: 40px;
        margin-bottom: 100px;
    }

    .sub_head_1,
    .sub_head_2,
    .sub_head_3 {
        margin-bottom: 50px;
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

    section.motor_container {
        max-width: 60%;
        display: inline-block;
    }

    .app_pic {
        width: 60%;
        display: inline-block;
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
        .video {
        height: 70vh;
        
    }
    }
    @media (max-width: 425px) {
    .motor_container p {
            text-align: justify;
        }
    }
</style>

<div id="v2_motor_exh">
    <div id="home_slider" class="your-class homePg">
        <?php
        $video = 'https://res.cloudinary.com/armytrix/video/upload/v1652249067/motorcycle/video%20for%20temp%20pages/XSR900-landscape_t4ugbq.mp4';
        $poster = 'https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652249017/motorcycle/video%20for%20temp%20pages/XSR900_landscape_edou9j.webp';
        if (isset($IsMobile)) {
            $video = 'https://res.cloudinary.com/armytrix/video/upload/v1652249083/motorcycle/video%20for%20temp%20pages/XSR900-portrait_iz9bvs.mp4';
            $poster = 'https://res.cloudinary.com/armytrix/image/upload/v1652249017/motorcycle/video%20for%20temp%20pages/XSR900_portrait_pzhq8o.webp';
        }
        ?>
        <div class="video">
            <video poster="<?php echo $poster; ?>" id="bgvid" preload="none" playsinline autoplay loop muted>
                <source src="<?php echo $video; ?>" type="video/mp4">
            </video>
        </div>
    </div>

    <section class="motor_container">
        <div class="sec_1">
            <h2 class="head_1">The first ever valvetronic motorcycle exhaust in the world</h2>
            <h2 class="head_2">MOTORCYCLE VALVETRONIC EXHAUST-HOW IT WORKS</h2>
        </div>
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
                        <img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_300/v1651403044/product/product-app-1_sgfbbv.webp" loading="lazy" alt="App">
                    </div>
                    <div class="col-sm-6 text-center">
                        <img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_300/v1651403044/product/product-app2_aevq7p.webp" loading="lazy" alt="App">
                    </div>

                </div>
            </div>
            <div class="sub_head_4">
                <h3>GAIN MORE POWER, LOSE NO TORQUE</h3>
                <p>Depending on the modifications and tunes you have, opening valves allow the exhaust gas to flow more freely, And with the valves being closed, it can retain the backpressure at low rpm and maintain the torque that is usually lost with straight piped exhaust systems.</p>
            </div>
            <img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_980/v1652323927/motorcycle/imagefor%20temp%20pages/bike_module_vfhnvr.webp" loading="lazy" alt="">
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
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652247709/motorcycle/imagefor%20temp%20pages/armytrix_xsr900-13_isqyup.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652247705/motorcycle/imagefor%20temp%20pages/armytrix_xsr900-15_yj6qwf.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652247713/motorcycle/imagefor%20temp%20pages/armytrix_xsr900-16_cdvtmh.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652247708/motorcycle/imagefor%20temp%20pages/armytrix_xsr900-12_a7ixee.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652247705/motorcycle/imagefor%20temp%20pages/armytrix_xsr900-11_ebbkgh.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652250399/motorcycle/imagefor%20temp%20pages/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-13_p32ft7.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652250399/motorcycle/imagefor%20temp%20pages/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-12_f85ubj.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652250399/motorcycle/imagefor%20temp%20pages/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-14_c2k9qq.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652250398/motorcycle/imagefor%20temp%20pages/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-10_ig8osc.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652247708/motorcycle/imagefor%20temp%20pages/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-3_eg7sdm.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652247711/motorcycle/imagefor%20temp%20pages/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-5_mcjobe.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652247713/motorcycle/imagefor%20temp%20pages/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-6_o3nssr.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652247712/motorcycle/imagefor%20temp%20pages/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-7_njwmiq.webp" loading="lazy" alt=""></div>
        <div class="fullWidthImages posRltv"><img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652247713/motorcycle/imagefor%20temp%20pages/ROUGH_CRAFTS_XSR900_ARMYTRIX_exhaust_-8_xyeor1.webp" loading="lazy" alt=""></div>
        <h2 class="mg-tb-50">Stay Tune for ARMYTRIX motorcycle Valvetronic Exhaust projects</h2>
    </section>
</div>