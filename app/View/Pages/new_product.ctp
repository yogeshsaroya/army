<link rel="preload" as="image" href="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1600/v1651592728/product/mouse-hover-b2_tsorh4_vjh0c3.webp" />
<link rel="preload" as="image" href="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1600/v1651514055/product/mouse-hover-b1_nt16rs.webp" />

<?php echo $this->Html->css(["/v2/product_page.css?v=" . rand(5646, 65465)], ['block' => 'cssTop']); ?>
<style>
iframe .ytp-chrome-top.ytp-show-cards-title{
    display: none !important;
}

</style>

<?php
$imgArr = [];
if (isset($slider) && !empty($slider)) {
  foreach ($slider as $sList) {
    $imgArr[] = '"' . SITEURL . 'cdn/' . $sList['Library']['folder'] . "/" . $sList['Library']['file_name'] . '"';
  }
}
if (isset($data) && !empty($data)) {
?>
  <?php $this->append('scriptTop'); ?>
  <script type="application/ld+json">
  {
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "<?php echo addslashes(preg_replace( "/\r|\n/", " ",$data['ItemDetail']['name'])); ?>",
  "image": [<?php echo implode(',', $imgArr); ?>],
  "description": "<?php echo addslashes(preg_replace( "/\r|\n/", " ", $data['ItemDetail']['meta_description'] )); ?>",
  "brand": {
  "@type": "Brand",
  "name": "Armytrix"
  },
  "review": {
  "@type": "Review",
  "reviewRating": {
  "@type": "Rating",
  "ratingValue": "5",
  "bestRating": "5"
  },
  "author": {
  "@type": "Organization",
  "name": "Armytrix - Automotive Weaponized"
  }
  },
  "aggregateRating": {
  "@type": "AggregateRating",
  "ratingValue": "4.9",
  "reviewCount": "2875"
  }
  }
  </script>
  <?php $this->end(); ?>
<?php } ?>

<div id="v2_product">
<h1 class="text-center mt-3 mb-5"><?php echo $data['ItemDetail']['name']; ?> valvetronic exhaust system</h1>
<?php echo $this->element('v2/product_slider', ['slider' => $slider]); ?>

  <div class="padMobile">
    <div class="page_container">
      

      <div class="row d-flex">
        <div class="col-sm-6">
          <?php if (!empty($data['ItemDetail']['feature'])) { ?><div class="txtBx">
              <h2>FITMENT</h2><?php echo nl2br($data['ItemDetail']['fitment']); ?>
            </div><?php } ?>
          <?php if (!empty($data['ItemDetail']['feature'])) { ?><div class="txtBx">
              <h2>NOTE</h2><?php echo nl2br($data['ItemDetail']['note']); ?>
            </div><?php } ?>
        </div>

        <div class="col-sm-6">
          <?php if (!empty($data['ItemDetail']['feature'])) { ?><div class="txtBx">
              <h2>FEATURE</h2><?php echo nl2br($data['ItemDetail']['feature']); ?>
            </div><?php } ?>
        </div>


        <div class="col-sm-6 hide">
          <div class="txtBx">
            <h2>NOTE</h2>
            <p>Utilize VIN to verify fitment prior to installation
              Valvetronic cat-back system utilizes OEM valvetronic system to control </p>
            <p>Fit to both Left-Hand Drive/Right-Hand Drive cars</p>
          </div>
        </div>
      </div>
      <div class="row spaceCol">
        <div class="col-sm-6"><?php echo $this->element('v2/pro_list', ['id' => 't1', 'pro_data' => $cat_back, 'restricted' => $restricted]); ?></div>
        <div class="col-sm-6"><?php echo $this->element('v2/pro_list_pipe', ['id' => 't2', 'pro_data' => $catalytic, 'restricted' => $restricted]); ?></div>
        <div class="col-sm-6"><?php echo $this->element('v2/pro_list_accessory', ['id' => 't3', 'pro_data' => $accessory, 'restricted' => $restricted]); ?></div>
      </div>

      <div class="row d-flex mt-3">
        <div class="col-sm-12">
          <?php if (isset($restricted) && $restricted == 2) { ?>
            <h3 class="usdPrice  text-left">SELECTED <span id="price">USD $00.00</span></h3>
            <input type="hidden" id="cat_id" value="">
            <input type="hidden" id="cat_id_q" value="1">
            <input type="hidden" id="cat_id_p" value="0">

            <input type="hidden" id="ecu_id" value="">
            <input type="hidden" id="ecu_id_q" value="1">
            <input type="hidden" id="ecu_id_p" value="0">

            <input type="hidden" id="accessory_id" value="">
            <input type="hidden" id="accessory_id_q" value="1">
            <input type="hidden" id="accessory_id_p" value="0">
            <input type="hidden" id="total_amout" value="0">
          <?php } ?>


        </div>
        <div class="col-sm-6">
          <div id="chk_btn">
            <div id="e_err"></div>
            <?php if (isset($restricted) && $restricted == 1) { ?>
              <a href="<?php echo SITEURL; ?>contact?brand=1&model=1&motor=1" class="cartBtn fullWidth">QUOTE & PRICING INQUIRY</a>
            <?php } elseif ($restricted == 2) { ?>
              <button class="cartBtn fullWidth" onclick="addcart();">ADD TO CART</button>
            <?php } ?>
          </div>
        </div>
        <div class="col-sm-6">
          <?php if (isset($restricted) && $restricted == 2) { ?>
            <div class="card-btn">
              <ul>
                <li><span>Shipping:</span> <a> 3-5 days deliver to US and Europe. Other countries will take 5-7 days.</a></li>
                <li><span>Shipment:</span> <a><img loading="lazy" src="<?php echo SITEURL; ?>img/shipment-card.jpg" alt="" /></a></li>
                <li><span>Delivery: </span><a> Varies</a></li>
                <li><span>Payments: </span> <a><img loading="lazy" src="<?php echo SITEURL; ?>img/paypal-ac.png" alt="" /></a></li>
              </ul>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <?php echo $this->element('pro/img_list', ['gallery' => $gallery]); ?>

  <?php if (!empty($data['Video'])) { ?>
    <div class="videoWrapperNw page_container fullMxWd" id="pro_1">
      <?php foreach ($data['Video'] as $vlist) {
        echo '<div class="video-responsive"><iframe id="home_bg_v" width="100%" height="600" loading="lazy" src="https://www.youtube-nocookie.com/embed/' . $vlist['video'] . '?controls=1&enablejsapi=1&modestbranding=1&showinfo=0&iv_load_policy=3&html5=1&fs=1&rel=0&hl=en&cc_lang_pref=en&cc_load_policy=1&start=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
      } ?>
    </div>
  <?php } ?>

  <div class="performedwrap text-center mt-50 page_container fullMxWd" id="pro_2">
    <div class="pad15">
      <h2> ARMYTRIX VALVE CONTROL TECHNOLOGY</h2>
    </div>
    <div class="mt-31 mb-2 posRltv">
    <div class="models_switch posAbsolute">
        <div class="page-titles"><h3 class="head-arm">3 Modes Switch</h3></div>
        <div class="mid-sec ">
          <ul id="slideshow2_thumbs" class="desoslide-thumbs-horizontal list-inline text-center">
            <li><img src="<?php echo SITEURL; ?>/v_4/images/mouse-icon1-02.png" alt="" /><br>Smart Mode</li>
            <li id="m1" class="sw_modes color_green"><img src="<?php echo SITEURL; ?>v_4/images/mouse-icon1-hover.png" alt="" id="menuImg"><br>Neighbor Mode</li>
            <li id="m2" class="sw_modes"><img  src="<?php echo SITEURL; ?>v_4/images/mouse-icon3.png" alt="" id="menuImg1"><br> Beast Mode</li>
          </ul>
        </div>
      </div>
      <img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1600/v1651574852/product/mouse-hover-b1_nt16rs.webp" alt="" class="img-wd-100" id="modes_img" />
      
    </div>
    <div class="text-left">
      <p>FREEDOM TO SWITCH BETWEEN LOUD AND QUIET WITH THE PUSH OF A BUTTON</p>
      <p>With the push of a button on your ARMYRIX remotes or smartphone application, you get to switch between modes upon your wish. </p>
      <br><br>
      <p>CUSTOMIZEABLE AUTOMATIC MODE GIVES YOU A WORRY-FREE DRIVE</p>
      <p>The automatic mode will open/close the exhaust valves based on predetermined RPM range or turbo bar, so you don’t have to manually switch all the time – you can also customize your own automatic mode upon your preference! </p>
      <br><br>
      <p>GAIN MORE POWER, LOSE NO TORQUE</p>
      <p>Depending on the cars, modifications, and tunes you have, opening valves allow the exhaust gas to flow more freely, as it does not have to pass through any muffler.
        And with the valves being closed, it can retain the back pressure at low rpm, and maintain the torque that is usually lost with straight piped exhaust systems. </p>
    </div>
  </div>

  <div class="performedwrap text-center mt-50 page_container fullMxWd" id="pro_3">
    <div class="pad15">
      <h2>ARMYTRIX VALVE CONTROL REMOTE</h2>
    </div>
    <div class="mt-3">
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865425/product/product-fix-2_vasdds.webp" alt="" loading="lazy" class="img-wd-100">
    </div>
  </div>


  <section class="pad60">
    <div class="page_container" id="pro_4">
      <h2 class="text-center">ARMYTRIX APP SMART ASSISTANT</h2>
      <p class="text-left">The mobile APP of ARMYTRIX can connect to the OBDII device via Bluetooth, and be used to as a remote controller to easily control valve switch and provide you with real-time monitoring of variuos values of your car, such as rotate speed, speed, fuel, etc. The rpm value in Auto mode can be set to open valves.</p>
      <div class="row mt-3 mobile50">
        <div class="col-sm-3 text-center">
          <img src="https://res.cloudinary.com/armytrix/image/upload/v1651403044/product/product-app-1_sgfbbv.webp" loading="lazy" alt="App" />
        </div>
        <div class="col-sm-3 text-center">
          <img src="https://res.cloudinary.com/armytrix/image/upload/v1651403044/product/product-app2_aevq7p.webp" loading="lazy" alt="App" />
        </div>
        <div class="col-sm-3 text-center">
          <img src="https://res.cloudinary.com/armytrix/image/upload/v1651403044/product/product-app-4_k65j7f.webp" loading="lazy" alt="App" />
        </div>
        <div class="col-sm-3 text-center">
          <img src="https://res.cloudinary.com/armytrix/image/upload/v1651403044/product/product-app-1_sgfbbv.webp" loading="lazy" alt="App" />
        </div>
      </div>
    </div>
    <?php
    echo $this->element('pro/s2a');
    echo $this->element('pro/s3');
    echo $this->element('pro/s4');
    ?>
    <div class="performedwrap text-center mt-50 page_container fullMxWd" id="pro_5">
      <div class="pad15">
        <h2>DESIGNED TO PERFORM, DESTINED TO AMAZE</h2>
        <p>Highest standard multiple tests and verification evoke beast performance limit.</p>
      </div>
      <div class="mt-3">
        <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865195/product/dyno_hhd7oy.webp" alt="" loading="lazy" class="img-wd-100">
      </div>
    </div>

    <div class="performedwrap text-center mt-50 page_container fullMxWd" id="pro_6">
      <div class="pad15">
        <h2 class="m-0">DOWNPIPE WITH CUTTING-EDGE FLEXIBLE PIPE TECHNOLOGY</h2>
        <p>Protect exhaust pipes from breakage and facilitate cooling to maximize engine</p>
      </div>
      <div class="mt-3">
        <img src="https://res.cloudinary.com/armytrix/image/upload/v1651403215/product/Downpipe-png_geacsq_hna3s2.webp" alt="" loading="lazy" class="img-wd-100">
      </div>
    </div>

    <div class="performedwrap mt-50 page_container fullMxWd" id="pro_7">
      <div class="pad15">
        <h2>SPECIAL RAPID-COOLING CERAMIC COATING</h2>
        <p>Reduce under-hood temperature and resistant and corrosion</p>
      </div>
      <div class="mt-3 d-flex">
        <div class="col-50">
          <div class="leftImg">
            <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865195/product/standard-downpipe_ryhk9h.webp" alt="" loading="lazy" class="img-wd-100">
          </div>
          <h4 class="pad15 text-left">
            Standard Downpipe<br />
            Deteriorate under high temperature which leads to pipe breakage.
          </h4>
        </div>
        <div class="col-50 flexDirection">
          <div class="rightImg"><img src="https://res.cloudinary.com/armytrix/image/upload/v1650865193/product/ceramic-coated-bg_jdfzkd.webp" alt="" loading="lazy" class="img-wd-100"></div>
          <h4 class="pad15 text-left">Ceramic Coated Downpipe<br />Prevents metal fatigue from high temperature.</h4>
        </div>
      </div>
    </div>
    
    <?php echo $this->element('pro/s8'); ?>
    <div class="page_container fullmxWd" id="pro_8">
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865200/product/3D_oo3xdl.webp" alt="" loading="lazy" class="img-wd-100">
    </div>

    <div class="page_container fullmxWd text-center mt-50" id="pro_9">
      <h2>METICULOUSLY CRAFTED FOR PRECISE FITMENT QUALITY IS OUR PRIDE IN WORKMANSHIP</h2>
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865195/product/Meticulously-bg_joc6gw.webp" alt="" loading="lazy" class="img-wd-100">
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865194/product/h-min_rggyro.webp" alt="" loading="lazy" class="img-wd-100">
    </div>

    <div class="page_container fullmxWd text-center mt-50" id="pro_10">
      <h2>UTILIZING A RARE HIGH GRADE TITANIUM ENSURES THIS ACTION IS BUILT TO LAST</h2>
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865194/product/horse_pwr_i5ungc.webp" alt="" loading="lazy" class="img-wd-100">
    </div>

    <div class="page_container fullmxWd text-center mt-50" id="pro_11">
      <h2>HIGH QUALITY TITANIUM ALLOY, LIGHTER WEIGHT</h2>
      <p>More than 60% lighter than the exhaust device of original factory, car body weight reduced significantly</p>
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865195/product/r8-titanium_polzql.webp" alt="" loading="lazy" class="img-wd-100 mt-3">
    </div>
    <div class="page_container fullmxWd text-center mt-50" id="pro_12">
      <h2>CRYSTALLIZATION OF TECHNOLOGY AND ART</h2>
      <p>Multiple refined mechanical polishing contributes to craftsmanship level surface brightness.</p>
     <div class="posRltv">
     <h4 class="mdlTx topDeepLeft">TITANIUM SERIES</h4>
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865194/product/cristallization_img_m95rzj.webp" alt="" loading="lazy" class="img-wd-100 mt-3">
    </div>
    </div>
    <div class="page_container fullmxWd posRltv" id="pro_13">
      <h4 class="mdlTx leftTop">STAINLESS STEEL SERIES</h4>
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865193/product/cristilizzation_fge103.webp" alt="" loading="lazy" class="img-wd-100 ">
    </div>
    <?php echo $this->element('pro/s18'); ?>


    <div class="page_container fullmxWd posRltv mt-50" id="pro_15">
      <h4 class="mdlTx bottomCenter">STAINLESS STEEL SERIES</h4>
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865197/product/shared-label-bg_bbhu5n.webp" alt="" loading="lazy" class="img-wd-100">
    </div>
  </section>
</div>
</div>
</div>
</div>
<?php echo $this->element('pro/script', ['data' => $data]); ?>