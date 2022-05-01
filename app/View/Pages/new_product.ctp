<?php echo $this->Html->css(["/v2/product_page.css?v=" . rand(5646, 65465)], ['block' => 'css']); ?>
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
      <div class="row">
        <div class="col-sm-6"><?php echo $this->element('v2/pro_list', ['id' => 't1', 'pro_data' => $cat_back]); ?></div>
        <div class="col-sm-6"><?php echo $this->element('v2/pro_list_pipe', ['id' => 't2', 'pro_data' => $catalytic]); ?></div>
        <div class="col-sm-6"><?php echo $this->element('v2/pro_list_accessory', ['id' => 't3', 'pro_data' => $accessory]); ?></div>
      </div>

      <div class="row d-flex mt-3">
        <div class="col-sm-12">
          <h3 class="usdPrice  text-left">SELECTED <span id="price">USD $6,560.00</span></h3>

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
          <button class="cartBtn fullWidth">ADD TO CART</button>
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
    <div class="videoWrapper page_container fullMxWd">
      <?php foreach ($data['Video'] as $vlist) {
        echo '<iframe id="home_bg_v" style="width: 100%; height: 100px%"  src="https://www.youtube.com/embed/' . $vlist['video'] . '?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
      } ?></div> <?php } ?>

  <div class="slide_images page_container fullMxWd">
    <div id="slideshow2"></div>
  </div>
  <div></div>

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

<?php //$this->Html->scriptStart(array('block' => 'scriptBottom')); 
?>
<script>
  function addcart() {
    $('#e_err').html('');
    var cat_id = $('#cat_id').val();
    var cat_id_q = $('#cat_id_q').val();
    var ecu_id = $('#ecu_id').val();
    var ecu_id_q = $('#ecu_id_q').val();
    var accessory_id = $('#accessory_id').val();
    var accessory_b_q = $('#accessory_b_q').val();
    if (cat_id != '' || ecu_id != '' || accessory_id != '') {
      var q = $('#ext_pro_q').val();
      $('#preloader').show();
      $.ajax({
        type: 'POST',
        url: '<?php echo SITEURL; ?>pages/add_to_cart',
        data: 'cat_id=' + cat_id + '&cat_id_q=' + cat_id_q + '&ecu_id=' + ecu_id + '&ecu_id_q=' + ecu_id_q + '&accessory_id=' + accessory_id + '&accessory_b_q=' + accessory_b_q + '&get=exhaust',
        success: function(data) {
          $("#_my_cart").html(data);
          setTimeout(function() {
            $('#preloader').hide();
          }, 500);
        },
        error: function(comment) {
          $("#_my_cart").html(data);
          setTimeout(function() {
            $('#preloader').hide();
          }, 500);
        }
      });
    } else {
      $('#e_err').html('<p class="text_red">Please Select A Product</p>');
    }
  }
  $(document).click(function(e) {

    if (e.target.id != 'p_1') { $("#cat_back_ul").hide(); }
    if (e.target.id != 'p_2') { $("#ecu_ul").hide(); }
    if (e.target.id != 'p_3') { $("#tuning_ul").hide(); }
  });

  $(document).ready(function() {
    $("#p_1").click(function() {
      if ($('#cat_back_ul').css('display') == 'none') {
        $('#cat_back_ul').show();
      } else {
        $('#cat_back_ul').hide();
      }
    });

    $("#p_2").click(function() {
      if ($('#ecu_ul').css('display') == 'none') {
        $('#ecu_ul').show();
      } else {
        $('#ecu_ul').hide();
      }
    });

    $("#p_3").click(function() {
      if ($('#tuning_ul').css('display') == 'none') {
        $('#tuning_ul').show();
      } else {
        $('#tuning_ul').hide();
      }
    });


    $.strRemove = function(theTarget, theString) {
      return $("<p/>").append(
        $(theTarget, theString).remove().end()
      ).text();
    };

    $("#cat_back_ul li").click(function() {
      var price = parseInt($("#total_amout").val());
      var pid = $(this).attr("pid");
      var p_amt = parseInt($(this).attr("p_amt"));
      var data_img = $(this).attr("data_img");
      var full_img = $(this).attr("full_img");
      var qut = $(this).attr("qut");
      var txt = $("#" + this.id + "").html();
      var txt = $.strRemove("div", txt);
      var cat_b_q = $('#cat_b_q').val();
      if (txt == 'Select') {
        $('.selc_p_1').remove();
        $('#p_1').html('<?php if ($data['ItemDetail']['id'] == 77) {
                          echo "--- Full Set Valvetronic Exhaust Selections ---";
                        } else {
                          echo "--- Cat-Back Valvetronic Mufflers Selection ---";
                        } ?>');
        $('#cat_id').val('');
        $('#cat_id_q').val('');
        $('#cat_id_p').val(0);
        $('#cat_pic_id').html('');
        $('#p_1').removeClass('drp-btn-clr');
        $('.selc_p_1').remove();
        getset();

      } else {
        if (qut > 0) {
          $('.selc_p_1').remove();
          $('#p_1').html(txt);
          $('#cat_id').val(pid);
          $('#cat_id_q').val(cat_b_q);
          $('#cat_id_p').val(p_amt);
          $('#cat_pic_id').html('<a href="' + full_img + '" class="image-popup-vertical-fit"><img loading="lazy" alt="" src="' + data_img + '"></a>');
          $('#p_1').addClass('drp-btn-clr');
          $('#selc').append('<p class="selc_p_1">' + txt + '</p>');
          getset();
        }
      }
      $('#cat_back_ul').hide();
    });

    $("#ecu_ul li").click(function() {

      var price = parseInt($("#total_amout").val());
      var pid = $(this).attr("pid");
      var p_amt = parseInt($(this).attr("p_amt"));
      var data_img = $(this).attr("data_img");
      var full_img = $(this).attr("full_img");
      var qut = $(this).attr("qut");
      var txt = $("#" + this.id + "").html();
      var txt = $.strRemove("div", txt);
      var cat_b_q = $('#ecu_b_q').val();
      if (txt == 'Select') {
        $('.selc_p_2').remove();
        $('#p_2').html('--- Catalytic Converter Replacement Selections ---');
        $('#ecu_id').val('');
        $('#ecu_id_q').val('');
        $('#ecu_id_p').val(0);
        $('#ecu_pic_id').html('');
        $('#p_2').removeClass('drp-btn-clr');
        getset();
      } else {
        if (qut > 0) {
          $('.selc_p_2').remove();
          $('#p_2').html(txt);
          $('#ecu_id').val(pid);
          $('#ecu_id_q').val(cat_b_q);
          $('#ecu_id_p').val(p_amt);
          $('#ecu_pic_id').html('<a href="' + full_img + '" class="image-popup-vertical-fit"><img loading="lazy" alt="" src="' + data_img + '"></a>');
          $('#p_2').addClass('drp-btn-clr');
          $('#selc').append('<p class="selc_p_2">' + txt + '</p>');
          getset();
        }
      }
      $('#ecu_ul').hide();
    });


    $("#tuning_ul li").click(function() {

      var price = parseInt($("#total_amout").val());
      var pid = $(this).attr("pid");
      var p_amt = parseInt($(this).attr("p_amt"));
      var data_img = $(this).attr("data_img");
      var full_img = $(this).attr("full_img");
      var qut = $(this).attr("qut");
      var txt = $("#" + this.id + "").html();
      var txt = $.strRemove("div", txt);
      var cat_b_q = $('#accessory_b_q').val();


      if (txt == 'Select') {
        $('.selc_p_3').remove();
        $('#p_3').html(' --- Armytron Accessory Selctions ---');
        $('#accessory_id').val('');
        $('#accessory_id_q').val('');
        $('#accessory_id_p').val(0);
        $('#tuning_pic_id').html('');
        $('#p_3').removeClass('drp-btn-clr');
        getset();
      } else {
        if (qut > 0) {
          $('.selc_p_3').remove();
          $('#p_3').html(txt);
          $('#accessory_id').val(pid);
          $('#accessory_id_q').val(cat_b_q);
          $('#accessory_id_p').val(p_amt);
          $('#tuning_pic_id').html('<a href="' + full_img + '" class="image-popup-vertical-fit"><img loading="lazy" alt="" src="' + data_img + '"></a>');
          $('#p_3').addClass('drp-btn-clr');
          $('#selc').append('<p class="selc_p_3">' + txt + '</p>');
          getset();
        }
      }

      $('#tuning_ul').hide();
    });

    function getset() {
      var p1 = parseInt($('#cat_id_p').val());
      var p2 = parseInt($('#ecu_id_p').val());
      var p3 = parseInt($('#accessory_id_p').val());
      var n = p1 + p2 + p3;
      $('#price').html("USD $" + n.toFixed(2));
      $('#total_amout').val(n);
      pimg();
    }

  });



  $('.btn-number').click(function(e) {
    e.preventDefault();

    fieldName = $(this).attr('data-field');
    type = $(this).attr('data-type');
    var input = $("input[name='" + fieldName + "']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
      if (type == 'minus') {

        if (currentVal > input.attr('min')) {
          var nv = currentVal - 1;
          input.val(nv).change();
          if (input.attr('id') == 'cat_b_q') {
            $('#cat_id_q').val(nv);
          } else if (input.attr('id') == 'ecu_b_q') {
            $('#ecu_id_q').val(nv);
          } else if (input.attr('id') == 'accessory_b_q') {
            $('#accessory_id_q').val(nv);
          }
        }
        if (parseInt(input.val()) == input.attr('min')) {
          $(this).attr('disabled', true);
        }

      } else if (type == 'plus') {

        if (currentVal < input.attr('max')) {
          var nv = currentVal + 1;
          input.val(nv).change();
          if (input.attr('id') == 'cat_b_q') {
            $('#cat_id_q').val(nv);
          } else if (input.attr('id') == 'ecu_b_q') {
            $('#ecu_id_q').val(nv);
          } else if (input.attr('id') == 'accessory_b_q') {
            $('#accessory_id_q').val(nv);
          }
        }
        if (parseInt(input.val()) == input.attr('max')) {
          $(this).attr('disabled', true);
        }
      }
    } else {
      input.val(0);
    }
  });
  $('.input-number').focusin(function() {
    $(this).data('oldValue', $(this).val());
  });
  $('.input-number').change(function() {
    minValue = parseInt($(this).attr('min'));
    maxValue = parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    name = $(this).attr('name');
    if (valueCurrent >= minValue) {
      $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
    } else {
      alert('Sorry, the minimum value was reached');
      $(this).val($(this).data('oldValue'));
    }
    if (valueCurrent <= maxValue) {
      $(".btn-number[data-type='plus' ][data-field='" + name + "' ]").removeAttr('disabled')
    } else {
      alert('Sorry, the maximum value was reached');
      $(this).val($(this).data('oldValue'));
    }
  });
  $(".input-number").keydown(function(e) {
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 || (e.keyCode == 65 && e.ctrlKey === true) || (e.keyCode >= 35 && e.keyCode <= 39)) {}
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
      e.preventDefault();
    }
  });
  <?php //$this->Html->scriptEnd(); 
  ?>
</script>