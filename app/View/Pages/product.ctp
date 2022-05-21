<?php echo $this->Html->css(["/v2/product_page"], ['block' => 'cssTop']); ?>
<?php $this->append('meta_data'); ?>
<link rel="preload" as="image" href="https://res.cloudinary.com/armytrix/image/upload/fl_progressive,c_scale,q_auto:best,w_1600/v1651592728/product/mouse-hover-b2_tsorh4_vjh0c3.webp" />
<link rel="preload" as="image" href="https://res.cloudinary.com/armytrix/image/upload/fl_progressive,c_scale,q_auto:best,w_1600/v1651514055/product/mouse-hover-b1_nt16rs.webp" />
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
.caret{color: #000;}
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

  .justify-content-center .dropdown-menu li a { font-weight: 500;}
    .flags {text-align: left; background-color: #fff; right: 0; left: unset;}
    .flags img {margin-right: 10px; max-width: 24px; width: 24px;}
    .img_flag {max-width: 24px; width: 24px;}

    .flags li>a:hover {
    text-decoration: none;
    color: #000;
}

</style>
<?php $this->end(); ?>
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
      "name": "<?php echo addslashes(preg_replace("/\r|\n/", " ", $data['ItemDetail']['name'])); ?>",
      "image": [<?php echo implode(',', $imgArr); ?>],
      "description": "<?php echo addslashes(preg_replace("/\r|\n/", " ", $data['ItemDetail']['meta_description'])); ?>",
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

  <?php if (!empty($langArr)) { ?>
    <div class="justify-content-center">
      <div class="dropdown flags_menu">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
        <img src='<?php echo SITEURL;?>v2/flags/<?php echo $act_lng;?>.svg' width='24' class='img-thumbnail img_flag'>
        <span class="caret"></span></button>
        <ul class="dropdown-menu flags">
          <?php foreach ($langArr as $a => $b) {
            echo "<li><a href='" . SITEURL . "product/$b' title=''><img src='".SITEURL."v2/flags/".strtolower($a).".svg' width='24' clas='img-thumbnail'> $a</a></li>";
          } ?>
        </ul>
      </div>
    </div>
  <?php } ?>


  <?php echo $this->element('v2/product_slider', ['slider' => $slider]); ?>
  <div class="padMobile">
    <div class="page_container">
      <div class="row d-flex">
        <div class="col-sm-6">
          <?php if (!empty($data['ItemDetail']['feature'])) { ?><div class="txtBx">
              <h2><?php echo gs($txt, 1); ?></h2><?php echo nl2br($data['ItemDetail']['fitment']); ?>
            </div><?php } ?>
          <?php if (!empty($data['ItemDetail']['feature'])) { ?><div class="txtBx">
              <h2><?php echo gs($txt, 3); ?></h2><?php echo nl2br($data['ItemDetail']['note']); ?>
            </div><?php } ?>
        </div>

        <div class="col-sm-6">
          <?php if (!empty($data['ItemDetail']['feature'])) { ?><div class="txtBx">
              <h2><?php echo gs($txt, 2); ?></h2><?php echo nl2br($data['ItemDetail']['feature']); ?>
            </div><?php } ?>
        </div>
      </div>
      <div class="row spaceCol">
        <div class="col-sm-6"><?php echo $this->element('v2/pro_list', ['id' => 't1', 'pro_data' => $cat_back, 'restricted' => $restricted, 'txt' => $txt]); ?></div>
        <div class="col-sm-6"><?php echo $this->element('v2/pro_list_pipe', ['id' => 't2', 'pro_data' => $catalytic, 'restricted' => $restricted, 'txt' => $txt]); ?></div>
        <div class="col-sm-6"><?php echo $this->element('v2/pro_list_accessory', ['id' => 't3', 'pro_data' => $accessory, 'restricted' => $restricted, 'txt' => $txt]); ?></div>
      </div>

      <div class="row d-flex mt-3">
        <div class="col-sm-12">
          <?php if (isset($restricted) && $restricted == 2) { ?>
            <h3 class="usdPrice  text-left"><?php echo gs($txt, 13); ?> <span id="price">USD $00.00</span></h3>
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
              <a href="<?php echo SITEURL.'contact?vehicle_type=car&car_brand='.$data['ItemDetail']['brand_id'].'&car_model='.$data['ItemDetail']['model_id'].'&car_motor='.$data['ItemDetail']['motor_id']; ?>" class="cartBtn fullWidth"><?php echo gs($txt, 10); ?></a>
            <?php } elseif ($restricted == 2) { ?>
              <button class="cartBtn fullWidth" onclick="addcart();"><?php echo gs($txt, 78); ?></button>
            <?php } ?>
          </div>
        </div>
        <div class="col-sm-6">
          <?php if (isset($restricted) && $restricted == 2) { ?>
            <div class="card-btn">
              <ul>
                <li><span><?php echo gs($txt, 14); ?>:</span> <a> <?php echo gs($txt, 15); ?></a></li>
                <li><span><?php echo gs($txt, 17); ?>:</span> <a><img loading="lazy" src="<?php echo SITEURL; ?>img/shipment-card.jpg" alt="" /></a></li>
                <li><span><?php echo gs($txt, 18); ?>: </span><a> <?php echo gs($txt, 19); ?></a></li>
                <li><span><?php echo gs($txt, 20); ?>: </span> <a><img loading="lazy" src="<?php echo SITEURL; ?>img/paypal-ac.png" alt="" /></a></li>
              </ul>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <?php echo $this->element('pro/img_list', ['gallery' => $gallery]); ?>

  <?php if (!empty($Adata['Video'])) { ?>
    <div class="videoWrapperNw page_container fullMxWd" id="pro_1">
      <?php foreach ($Adata['Video'] as $vlist) {
        echo '<div class="video-responsive"><iframe id="home_bg_v" width="100%" height="600" loading="lazy" src="https://www.youtube-nocookie.com/embed/' . $vlist['video'] . '?controls=1&enablejsapi=1&modestbranding=1&showinfo=0&iv_load_policy=3&html5=1&fs=1&rel=0&hl=en&cc_lang_pref=en&cc_load_policy=1&start=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
      } ?>
    </div>
  <?php } ?>

  <div class="performedwrap text-center mt-50 page_container fullMxWd" id="pro_2">
    <div class="pad15">
      <h2> <?php echo gs($txt, 21); ?></h2>
    </div>
    <div class="mt-31 mb-2 posRltv">
      <div class="models_switch posAbsolute">
        <div class="page-titles">
          <h3 class="head-arm"><?php echo gs($txt, 22); ?></h3>
        </div>
        <div class="mid-sec ">
          <ul id="slideshow2_thumbs" class="desoslide-thumbs-horizontal list-inline text-center">
            <li><img src="<?php echo SITEURL; ?>/v_4/images/mouse-icon1-02.png" alt="" /><br><?php echo gs($txt, 23); ?></li>
            <li id="m1" class="sw_modes color_green"><img src="<?php echo SITEURL; ?>v_4/images/mouse-icon1-hover.png" alt="" id="menuImg"><br><?php echo gs($txt, 24); ?></li>
            <li id="m2" class="sw_modes"><img src="<?php echo SITEURL; ?>v_4/images/mouse-icon3.png" alt="" id="menuImg1"><br> <?php echo gs($txt, 25); ?></li>
          </ul>
        </div>
      </div>
      <img src="https://res.cloudinary.com/armytrix/image/upload/fl_progressive,c_scale,q_auto:best,w_1600/v1651574852/product/mouse-hover-b1_nt16rs.webp" alt="" class="img-wd-100" id="modes_img" />

    </div>
    <div class="text-left">
      <p><?php echo gs($txt, 26); ?></p>
      <p><?php echo gs($txt, 27); ?></p>
      <br><br>
      <p><?php echo gs($txt, 28); ?></p>
      <p><?php echo gs($txt, 29); ?></p>
      <br><br>
      <p><?php echo gs($txt, 30); ?></p>
      <p><?php echo gs($txt, 31); ?></p>
    </div>
  </div>

  <div class="performedwrap text-center mt-50 page_container fullMxWd" id="pro_3">
    <div class="pad15">
      <h2><?php echo gs($txt, 32); ?></h2>
    </div>
    <div class="mt-3">
      <img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:good,w_1600/v1650865425/product/product-fix-2_vasdds.webp" alt="" loading="lazy" class="img-wd-100">
    </div>
  </div>


  <section class="pad60">
    <div class="page_container" id="pro_4">
      <h2 class="text-center"><?php echo gs($txt, 33); ?></h2>
      <p class="text-left"><?php echo gs($txt, 34); ?></p>
      <div class="row mt-3 mobile50">
        <div class="col-sm-3 text-center">
          <img src="https://res.cloudinary.com/armytrix/image/upload/q_auto:good/v1651403044/product/product-app-1_sgfbbv.webp" loading="lazy" alt="App" />
        </div>
        <div class="col-sm-3 text-center">
          <img src="https://res.cloudinary.com/armytrix/image/upload/q_auto:good/v1651403044/product/product-app2_aevq7p.webp" loading="lazy" alt="App" />
        </div>
        <div class="col-sm-3 text-center">
          <img src="https://res.cloudinary.com/armytrix/image/upload/q_auto:good/v1651403044/product/product-app-4_k65j7f.webp" loading="lazy" alt="App" />
        </div>
        <div class="col-sm-3 text-center">
          <img src="https://res.cloudinary.com/armytrix/image/upload/q_auto:good/v1651403044/product/product-app-1_sgfbbv.webp" loading="lazy" alt="App" />
        </div>
      </div>
    </div>
    <?php
    echo $this->element('pro/s2a', ['txt' => $txt]);
    echo $this->element('pro/s3', ['txt' => $txt]);
    echo $this->element('pro/s4', ['txt' => $txt]);
    ?>
    <div class="performedwrap text-center mt-50 page_container fullMxWd" id="pro_5">
      <div class="pad15">
        <h2><?php echo gs($txt, 46); ?></h2>
        <p><?php echo gs($txt, 47); ?></p>
      </div>
      <div class="mt-3">
        <img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:good,w_1600/v1650865195/product/dyno_hhd7oy.webp" alt="" loading="lazy" class="img-wd-100">
      </div>
    </div>

    <div class="performedwrap text-center mt-50 page_container fullMxWd" id="pro_6">
      <div class="pad15">
        <h2 class="m-0"><?php echo gs($txt, 48); ?></h2>
        <p><?php echo gs($txt, 48); ?></p>
      </div>
      <div class="mt-3">
        <img src="https://res.cloudinary.com/armytrix/image/upload/q_auto:good/v1651403215/product/Downpipe-png_geacsq_hna3s2.webp" alt="" loading="lazy" class="img-wd-100">
      </div>
    </div>

    <div class="performedwrap mt-50 page_container fullMxWd" id="pro_7">
      <div class="pad15">
        <h2><?php echo gs($txt, 50); ?></h2>
        <p><?php echo gs($txt, 51); ?></p>
      </div>
      <div class="mt-3 d-flex">
        <div class="col-50">
          <div class="leftImg">
            <img src="https://res.cloudinary.com/armytrix/image/upload/q_auto:good/v1650865195/product/standard-downpipe_ryhk9h.webp" alt="" loading="lazy" class="img-wd-100">
          </div>
          <h4 class="pad15 text-left">
            <?php echo gs($txt, 54); ?><br /><?php echo gs($txt, 55); ?>
          </h4>
        </div>
        <div class="col-50 flexDirection">
          <div class="rightImg"><img src="https://res.cloudinary.com/armytrix/image/upload/q_auto:good/v1650865193/product/ceramic-coated-bg_jdfzkd.webp" alt="" loading="lazy" class="img-wd-100"></div>
          <h4 class="pad15 text-left"><?php echo gs($txt, 52); ?><br /><?php echo gs($txt, 53); ?></h4>
        </div>
      </div>
    </div>

    <?php echo $this->element('pro/s8', ['txt' => $txt]); ?>
    <div class="page_container fullmxWd" id="pro_8">
      <img src="https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:good,w_1600/v1650865200/product/3D_oo3xdl.webp" alt="" loading="lazy" class="img-wd-100">
    </div>

    <div class="page_container fullmxWd text-center mt-50" id="pro_9">
      <h2><?php echo gs($txt, 59); ?></h2>
      <img src="https://res.cloudinary.com/armytrix/image/upload/q_auto:good/v1650865195/product/Meticulously-bg_joc6gw.webp" alt="" loading="lazy" class="img-wd-100">
      <img src="https://res.cloudinary.com/armytrix/image/upload/q_auto:good/v1650865194/product/h-min_rggyro.webp" alt="" loading="lazy" class="img-wd-100">
    </div>

    <div class="page_container fullmxWd text-center mt-50" id="pro_10">
      <h2><?php echo gs($txt, 60); ?></h2>
      <img src="https://res.cloudinary.com/armytrix/image/upload/q_auto:good/v1650865194/product/horse_pwr_i5ungc.webp" alt="" loading="lazy" class="img-wd-100">
    </div>

    <div class="page_container fullmxWd text-center mt-50" id="pro_11">
      <h2><?php echo gs($txt, 61); ?></h2>
      <p><?php echo gs($txt, 62); ?></p>
      <img src="https://res.cloudinary.com/armytrix/image/upload/q_auto:good/v1650865195/product/r8-titanium_polzql.webp" alt="" loading="lazy" class="img-wd-100 mt-3">
    </div>
    <div class="page_container fullmxWd text-center mt-50" id="pro_12">
      <h2><?php echo gs($txt, 63); ?></h2>
      <p><?php echo gs($txt, 64); ?></p>
      <div class="posRltv">
        <h4 class="mdlTx topDeepLeft"><?php echo gs($txt, 65); ?></h4>
        <img src="https://res.cloudinary.com/armytrix/image/upload/q_auto:good/v1650865194/product/cristallization_img_m95rzj.webp" alt="" loading="lazy" class="img-wd-100 mt-3">
      </div>
    </div>
    <div class="page_container fullmxWd posRltv" id="pro_13">
      <h4 class="mdlTx leftTop"><?php echo gs($txt, 66); ?></h4>
      <img src="https://res.cloudinary.com/armytrix/image/upload/q_auto:good/v1650865193/product/cristilizzation_fge103.webp" alt="" loading="lazy" class="img-wd-100 ">
    </div>
    <?php echo $this->element('pro/s18', ['txt' => $txt]); ?>


    <div class="page_container fullmxWd posRltv mt-50" id="pro_15">
      <h4 class="mdlTx bottomCenter"><?php echo gs($txt, 66); ?></h4>
      <img src="https://res.cloudinary.com/armytrix/image/upload/q_auto:good/v1650865197/product/shared-label-bg_bbhu5n.webp" alt="" loading="lazy" class="img-wd-100">
    </div>
  </section>
</div>
</div>
</div>
</div>
<?php echo $this->element('pro/script', ['data' => $data, 'txt' => $txt]); ?>