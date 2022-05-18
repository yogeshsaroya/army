<?php
$img = 'https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1920/v1652852783/product/armytrix-product-exhaust_c9uhwj.webp';

if (isset($IsMobile)) {
  $img = 'https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_720/v1652852841/product/phone-product-exhaust-portrait_vwpvge_yaauem.webp';
  
}
$b = $this->Lab->getbrand();
?>

<?php $this->append('meta_data'); ?>
<link rel="preload" as="image" href="<?php echo $img; ?>" />
<?php $this->end(); ?>

<div id="preloader" style="display: none;">
  <div id="status">&nbsp;</div>
</div>
<div class="fullscreen_block_new fulScreen" id="tuning_box_page" style="min-height: 400px;">
  <div class="fullScreen">
    <img src="<?php echo $img; ?>" loading="lazy" alt="">
  </div>
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
                <div class="col-sm-8 no-pad col-sm-8-nw d-flex">
                  <div class="nowrap col-sm-4 box-frm arw-rt">
                    <select class="lable_txt arw-rt" id="RequestBrand" name="brand">
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
                    <select class="lable_txt " id="RequestModel" name="model">
                      <option value="">Select Model</option>
                    </select>
                  </div>
                  <div class="nowrap col-sm-4 box-frm">
                    <select class="lable_txt" id="RequestEngine" name="motor">
                      <option value="">Select Engine</option>
                    </select>
                  </div>
                </div>


                <div class="col-sm-4  text-left tuningoptions no-pad col-sm-4-nw">

                  <div class="nowrap box-frm arw-rt">
                    <button class="btn btn-primary ps-ab" id="get_info" name="sub" type="button" value="WEAPONIZED">
                      <img src="<?php echo SITEURL; ?>bootstrap_3_3_6/img/logo-icon.png" loading="lazy" alt=""> WEAPONIZED</button>
                  </div>
                </div>
                <div class="clearfix"></div>
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
  jQuery(document).ready(function() {
    "use strict";
    window['btnReset'] = function() {
      $("#get_info").prop("disabled", false);
      $("#get_info").val('WEAPONIZED');
    };
    $("#get_info").click(function() {
      var brand = $.trim($('#RequestBrand').val());
      var model = $.trim($('#RequestModel').val());
      var motor = $.trim($('#RequestEngine').val());

      if (brand != '' && model != '' && motor != '') {
        $('#preloader').show();
        $.ajax({
          type: 'POST',
          url: '<?php echo SITEURL; ?>pages/check_product',
          data: {
            brand: brand,
            model: model,
            motor: motor
          },
          success: function(data) {
            $("#app_error").html(data);
            $('#preloader').hide();
          },
          error: function(comment) {
            $("#app_error").html(data);
            $('#preloader').hide();
          }
        });

      }
    });



    $("#RequestBrand").change(function() {
      $("#app_error").html('');
      $('#RequestModel').html('<option value="">Select Model</option>');
      $('#RequestEngine').html('<option value="">Select Engine</option>');
      var id = $.trim(this.value);
      if ( id != "") {
        $('#preloader').show();
        $.ajax({
          type: 'POST',
          url: '<?php echo SITEURL; ?>pages/get_for',
          data:{type:'car','make_id':id,target_id:'RequestModel'},
          success: function(data) {
            $("#app_error").html(data);
            $('#preloader').hide();
          },
          error: function(comment) {
            $("#app_error").html(data);
            $('#preloader').hide();
          }
        });
      }
    });

    $("#RequestModel").change(function() {
      $("#app_error").html('');
      $('#RequestEngine').html('<option value="">Select Engine</option>');
      var id = $.trim(this.value);
      if ( id != "") {
        $('#preloader').show();
        $.ajax({
          type: 'POST',
          url: '<?php echo SITEURL; ?>pages/get_for',
          data:{type:'car','model_id':id,target_id:'RequestEngine'},
          success: function(data) {
            $("#app_error").html(data);
            $('#preloader').hide();
          },
          error: function(comment) {
            $("#app_error").html(data);
            $('#preloader').hide();
          }
        });
      }
    });

  });
</script>