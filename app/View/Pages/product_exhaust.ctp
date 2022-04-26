

<div id="preloader" style="display: none;">
  <div id="status">&nbsp;</div>
</div>
<div class="fullscreen_block_new" id="tuning_box_page" style="min-height: 400px;">
  <div class="fullScreen"><img src="https://res.cloudinary.com/armytrix/image/upload/v1650865426/product/armytrix-product-exhaust.jpg" alt="full image"></div>
  <div class="tuning-box">
    <div class="clearfix"></div>
    <div class="container" id="new-ui-add">
      <h2 class="mb-0">SELECT BRAND , MODEL AND ENGINE / YEAR </h2>
      <h1>WEAPONIZED BY THE ARMYTRIX EXHAUST SYSTEMS</h1>
      <div class="col-md-12 main_d no-pad">
        <div class="fadein">
          <div class="tuningconfig">
            <form id="frmTun">
              <div class="container-fmr ma-box d-flex">
                <div class="col-sm-8 no-pad col-sm-8-nw">
                  <div class="nowrap col-sm-4 box-frm arw-rt">
                    <select class="lable_txt arw-rt" id="brand" name="brand">
                      <option value="">Select Brand</option>
                      <?php
                      if (isset($b) && !empty($b)) {
                        foreach ($b as $k => $v) {
                          echo '<option value="' . $k . '">' . $v . '</option>';
                        }
                      } ?>
                    </select>
                  </div>
                  <div class="nowrap col-sm-4 box-frm arw-rt">
                    <select class="lable_txt " id="model" name="model">
                      <option value="">Select Model</option>
                    </select>
                  </div>
                  <div class="nowrap col-sm-4 box-frm">
                    <select class="lable_txt" id="motor" name="motor">
                      <option value="">Select Engine</option>
                    </select>
                  </div>
                  <div class="clearfix"></div>
                </div>


                <div class="col-sm-4  text-left tuningoptions no-pad col-sm-4-nw">

                  <div class="nowrap box-frm arw-rt">
                    <button class="btn btn-primary ps-ab" id="get_info" name="sub" type="button" value="WEAPONIZED">
                      <img src="<?php echo SITEURL; ?>bootstrap_3_3_6/img/logo-icon.png" alt=""> WEAPONIZED</button>
                  </div>
                </div>

                <div class="clearfix"></div>

                <!--end of first -box-->



            </form>

            <div id="app_error"> </div>
          </div>
          <div id="show_info" style="min-height: 268px;">

            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <!----end of container------>
  </div>
  <br>
</div>

<script>
  var tag = document.createElement('script');

  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  var player;

  function onYouTubeIframeAPIReady() {
    player = new YT.Player('home_bg_v', {
      events: {
        'onReady': onPlayerReady
      }
    });
  }

  function onPlayerReady() {
    player.playVideo();
    // Mute!
    player.mute();
  }

  jQuery(document).ready(function() {
    "use strict";
    window['btnReset'] = function() {
      $("#get_info").prop("disabled", false);
      $("#get_info").val('TUNE IT');
    };
    $("#get_info").click(function() {
      var brand = $.trim($('#brand').val());
      var model = $.trim($('#model').val());
      var motor = $.trim($('#motor').val());

      if (brand != '' && model != '' && motor != '') {
        $('#preloader').show();
        window.location = SITEURL + "product-exhaust-result?brand=" + brand + "&model=" + model + "&motor=" + motor + " ";;
      }


    });
    $("#brand").change(function() {
      $("#app_error").html('');

      $('#model').removeClass('active-arw');
      $('#motor').removeClass('active-arw');
      $('#model').html('<option value="">Select Model</option>');
      $('#motor').html('<option value="">Select Engine</option>');

      var v = $.trim(this.value);
      if (v != "") {
        $('#preloader').show();
        if (!$('#brand').hasClass('active-arw')) {
          $('#brand').addClass('active-arw');
        }
        $.ajax({
          type: 'POST',
          url: '<?php echo SITEURL; ?>pages/get_exhaust',
          data: 'id=' + v + '&type=brand&get=product',
          success: function(data) {
            $("#app_error").html(data);
            $('#preloader').hide();
          },
          error: function(comment) {
            $("#app_error").html(data);
            $('#preloader').hide();
          }
        });
      } else {
        $('#brand').removeClass('active-arw');
      }
    });




    $("#model").change(function() {
      $("#app_error").html('');


      $('#motor').removeClass('active-arw');
      $('#motor').html('<option value="">Select Engine</option>');


      var v = $.trim(this.value);
      if (v != "") {
        $('#preloader').show();
        if (!$('#model').hasClass('active-arw')) {
          $('#model').addClass('active-arw');
        }
        $.ajax({
          type: 'POST',
          url: '<?php echo SITEURL; ?>pages/get_exhaust',
          data: 'id=' + v + '&brand=' + brand + '&type=model&get=product',
          success: function(data) {
            $("#app_error").html(data);
            $('#preloader').hide();
          },
          error: function(comment) {
            $("#app_error").html(data);
            $('#preloader').hide();
          }
        });
      } else {
        $('#model').removeClass('active-arw');
      }
    });

  });
</script>