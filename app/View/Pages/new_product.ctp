<?php echo $this->Html->css(["/v2/product_page.css?v=" . rand(5646, 65465)], ['block' => 'cssTop']); ?>

<?php
$imgArr = [];
if (isset($slider) && !empty($slider)) {
  foreach ($slider as $sList) {
    $imgArr[] = '"' . SITEURL . 'cdn/' . $sList['Library']['folder'] . "/" . $sList['Library']['file_name'] . '"';
  }
}
if (isset($data1) && !empty($data1)) {
?>
  <?php $this->Html->scriptStart(['block' => 'script', 'type' => 'application/ld+json']); ?>
  {
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "<?php echo addslashes($data['ItemDetail']['name']); ?>",
  "image": [<?php echo implode(',', $imgArr); ?>],
  "description": "<?php echo addslashes($data['ItemDetail']['meta_description']); ?>",

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
  <?php $this->Html->scriptEnd(); ?>
<?php } ?>

<div id="v2_product">
  <div class="padMobile">
    <div class="page_container">
      <h1 class="text-center mt-3 mb-5"><?php echo $data['ItemDetail']['name']; ?> valvetronic exhaust system</h1>

      <?php echo $this->element('v2/product_slider', ['slider' => $slider]); ?>



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
        <div class="col-sm-6"><?php echo $this->element('v2/pro_list', ['id' => 't1', 'pro_data' => $cat_back]); ?></div>
        <div class="col-sm-6"><?php echo $this->element('v2/pro_list_pipe', ['id' => 't2', 'pro_data' => $catalytic]); ?></div>
        <div class="col-sm-6"><?php echo $this->element('v2/pro_list_accessory', ['id' => 't3', 'pro_data' => $accessory]); ?></div>
      </div>

      <div class="row d-flex mt-3">
        <div class="col-sm-12">
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


        </div>
        <div class="col-sm-6">
        <div id="chk_btn">
        <div id="e_err"></div>
        <button class="cartBtn fullWidth" onclick="addcart();">ADD TO CART</button>
        </div>
        </div>
        <div class="col-sm-6">
          <div class="card-btn">
            <ul>
              <li><span>Shipping:</span> <a> 3-5 days deliver to US and Europe. Other countries will take 5-7 days.</a></li>
              <li><span>Shipment:</span> <a><img loading="lazy" src="<?php echo SITEURL; ?>img/shipment-card.jpg" alt="" /></a></li>
              <li><span>Delivery: </span><a> Varies</a></li>
              <li><span>Payments: </span> <a><img loading="lazy" src="<?php echo SITEURL; ?>img/paypal-ac.png" alt="" /></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>



  <?php echo $this->element('pro/img_list', ['gallery' => $gallery]); ?>



  <?php if (!empty($data['Video'])) { ?>
    <div class="videoWrapperNw page_container fullMxWd">
      <?php foreach ($data['Video'] as $vlist) {
        echo '<iframe id="home_bg_v" style="width: 100%; height: 100px%"  src="https://www.youtube.com/embed/' . $vlist['video'] . '?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
      } ?></div> <?php } ?>

  <div class="slide_images page_container fullMxWd">
    <div id="slideshow2"></div>
  </div>
  <div></div>


  <div class="performedwrap text-center mt-50 page_container fullMxWd">
    <div class="pad15">
      <h2> ARMYTRIX VALVE CONTROL TECHNOLOGY</h2>
    </div>
    <div class="mt-3 mb-2">
        <img src="<?php echo SITEURL;?>v2/img/mouse-hover-b1.jpg" alt="" loading="lazy" class="img-wd-100"/>
    </div>
    <div class="text-left">
     <p>FREEDOM TO SWITCH BETWEEN LOUD AND QUIET WITH THE PUSH OF A BUTTON

        With the push of a button on your ARMYRIX remotes or smartphone application, you get to switch between modes upon your wish. </p>
     <p>CUSTOMIZEABLE AUTOMATIC MODE GIVES YOU A WORRY-FREE DRIVE 

        The automatic mode will open/close the exhaust valves based on predetermined RPM range or turbo bar, so you don’t have to manually switch all the time – you can also customize your own automatic mode upon your preference! </p>
     <p>GAIN MORE POWER, LOSE NO TORQUE

        Depending on the cars, modifications, and tunes you have, opening valves allow the exhaust gas to flow more freely, as it does not have to pass through any muffler. 
        
        And with the valves being closed, it can retain the back pressure at low rpm, and maintain the torque that is usually lost with straight piped exhaust systems. </p>
    </div>
  </div>

<div class="performedwrap text-center mt-50 page_container fullMxWd">
    <div class="pad15">
      <h2>ARMYTRIX VALVE CONTROL REMOTE</h2>
    </div>
    <div class="mt-3">
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865425/product/product-fix-2_vasdds.jpg" alt="" loading="lazy" class="img-wd-100">
    </div>
  </div>


  <section class="pad60">
    <div class="page_container">
      <h2 class="text-center">ARMYTRIX APP SMART ASSISTANT</h2>
      <p class="text-left">The mobile APP of ARMYTRIX can connect to the OBDII device via Bluetooth, and be used to as a remote controller to easily control valve switch and provide you with real-time monitoring of variuos values of your car, such as rotate speed, speed, fuel, etc. The rpm value in Auto mode can be set to open valves.</p>
      <div class="row mt-3">
        <div class="col-sm-3 text-center">
          <img src="<?php echo SITEURL; ?>v2/img/product-app-4_wihpks_1.png" alt="App" />
        </div>
        <div class="col-sm-3 text-center">
          <img src="<?php echo SITEURL; ?>v2/img/product-app-4_wihpks_2.png" alt="App" />
        </div>
        <div class="col-sm-3 text-center">
          <img src="<?php echo SITEURL; ?>v2/img/product-app-4_wihpks_3.png" alt="App" />
        </div>
        <div class="col-sm-3 text-center">
          <img src="<?php echo SITEURL; ?>v2/img/product-app-4_wihpks_4.png" alt="App" />
        </div>
      </div>

    </div>

    <div class="page_container fullmxWd">
      <img src="<?php echo SITEURL; ?>v2/img/3D.jpg" alt="" loading="lazy" class="img-wd-100">
    </div>

    <div class="page_container fullMxWd posRltv">

      <?php

      echo $this->element('pro/s2a');
      echo $this->element('pro/s3');
      echo $this->element('pro/s4');
      echo $this->element('pro/s8');
      echo $this->element('pro/s18');

      ?>
    </div>


    <div class="performedwrap text-center mt-50 page_container fullMxWd">
      <div class="pad15">
        <h2>DESIGNED TO PERFORM, DESTINED TO AMAZE</h2>
        <p>Highest standard multiple tests and verification evoke beast performance limit.</p>
      </div>
      <div class="mt-3">
        <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865195/product/dyno_hhd7oy.png" alt="" loading="lazy" class="img-wd-100">
      </div>
    </div>


    <div class="performedwrap text-center mt-50 page_container fullMxWd">
      <div class="pad15">
        <h2 class="m-0">DOWNPIPE WITH CUTTING-EDGE FLEXIBLE PIPE TECHNOLOGY</h2>
        <p>Protect exhaust pipes from breakage and facilitate cooling to maximize engine</p>
      </div>
      <div class="mt-3">
        <img src="<?php echo SITEURL; ?>v2/img/Downpipe-png_geacsq.jpg" alt="" loading="lazy" class="img-wd-100">
      </div>
    </div>


    <div class="performedwrap mt-50 page_container fullMxWd">
      <div class="pad15">
        <h2>SPECIAL RAPID-COOLING CERAMIC COATING</h2>
        <p>Reduce under-hood temperature and resistant and corrosion</p>
      </div>
      <div class="mt-3 d-flex">
        <div class="col-50">
          <div class="leftImg">
            <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865195/product/standard-downpipe_ryhk9h.png" alt="" loading="lazy" class="img-wd-100">
          </div>
          <h4 class="pad15 text-left">
            Standard Downpipe<br />
            Deteriorate under high temperature which leads to pipe breakage.
          </h4>
        </div>
        <div class="col-50 flexDirection">
          <div class="rightImg"><img src="https://res.cloudinary.com/armytrix/image/upload/v1650865193/product/ceramic-coated-bg_jdfzkd.png" alt="" loading="lazy" class="img-wd-100"></div>
          <h4 class="pad15 text-left">
            Standard Downpipe<br />
            Deteriorate under high temperature which leads to pipe breakage.
          </h4>
        </div>
      </div>
    </div>

    <div class="page_container fullmxWd text-center mt-50">
      <h2>METICULOUSLY CRAFTED FOR PRECISE FITMENT QUALITY IS OUR PRIDE IN WORKMANSHIP</h2>
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865195/product/Meticulously-bg_joc6gw.jpg" alt="" loading="lazy" class="img-wd-100">
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865194/product/h-min_rggyro.jpg" alt="" loading="lazy" class="img-wd-100">

    </div>

    <div class="page_container fullmxWd text-center mt-50">
      <h2>UTILIZING A RARE HIGH GRADE TITANIUM ENSURES THIS ACTION IS BUILT TO LAST</h2>
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865194/product/horse_pwr_i5ungc.jpg" alt="" loading="lazy" class="img-wd-100">
    </div>

    <div class="page_container fullmxWd text-center mt-50">
      <h2>HIGH QUALITY TITANIUM ALLOY, LIGHTER WEIGHT</h2>
      <p>More than 60% lighter than the exhaust device of original factory, car body weight reduced significantly</p>
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865195/product/r8-titanium_polzql.jpg" alt="" loading="lazy" class="img-wd-100 mt-3">
    </div>

    <div class="page_container fullmxWd text-center mt-50">
      <h2>CRYSTALLIZATION OF TECHNOLOGY AND ART</h2>
      <p>Multiple refined mechanical polishing contributes to craftsmanship level surface brightness.</p>
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865194/product/cristallization_img_m95rzj.jpg" alt="" loading="lazy" class="img-wd-100 mt-3">
    </div>

    <div class="page_container fullmxWd posRltv">
      <h4 class="mdlTx leftTop">TITANIUM SERIES</h4>
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865193/product/cristilizzation_fge103.jpg" alt="" loading="lazy" class="img-wd-100 ">
    </div>

    <div class="page_container fullmxWd posRltv">
      <h4 class="mdlTx bottomCenter">STAINLESS STEEL SERIES</h4>
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865197/product/shared-label-bg_bbhu5n.jpg" alt="" loading="lazy" class="img-wd-100">
    </div>



</div>
</div>
</div>
</div>

<?php echo $this->element('pro/script',['data'=>$data]); ?>
