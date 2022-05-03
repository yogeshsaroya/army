<?php 
echo $this->Html->css(["checkout"], ['block' => 'cssTop']);
echo $this->html->script(array('jquery.form.min','/v/formValidation.min','/v/bootstrap.min'));
$note = null;
if(isset($checkOutArr['note'])){ $note = $checkOutArr['note']; }
?>

<div id="preloader" style="display: none"> <div id="status">&nbsp;</div> </div>
<style>
.a-right { text-align: right;}
.a-left{ text-align: left;}
.w30 {width: 60%}
.wid_2{width: 20%}
.wid_3{width: 12%}
.wid_4{width: 13%}
td.a-right { width: 75%;}
@media (min-width:300px) and (max-width:768px) {

td.a-right { width:auto;}

#check-out-pg tfoot { display: inline-flex; }
.w30, .wid_2, .wid_3, .wid_4{width: 100%}
.a-right { text-align: center; }

.pd_list {  margin: 20px 0 0 0; }
.table-bordered { border: 0px solid #eee;}

}
#check-out-pg .title-heads{font-size: 24px;}

</style>

<div class="main_wrapper review_page" id="check-out-pg">
<div class="row"> <div class="col-sm-12 main-heads"><h1>Armytrix - Checkout</h1><h3>Please enter your details below to complete your purchase.</h3></div>
<div class="clearfix"></div></div>
<?php if(isset($all_pro) && !empty($all_pro)){?>
<div id="app_error" style="min-height: 30px"></div>
<?php echo $this->Form->create(null,array('id'=>'reFrm','url' => array('controller' => 'pages', 'action' => 'pro_checkout')));
$region = $country_list['CountryList']['region'];
$region_id = $country_list['CountryList']['id'];
$iso = $country_list['CountryList']['iso2'];
$euro_price = $WebSetting['WebSetting']['euro_price'];
$import_duty = $vat = $shipping_discount = 0;
if ( $region == 1 ){
    $shipping_discount = $WebSetting['WebSetting']['shipping_discount'];
}?>
<div class="row">
<div class="ful-frm-chk-out border-head-form"> 
<div class="col-md-4">
<div class="fourth-payment-method">
<h4  class="title-heads">PAYMENT METHOD</h4>        
<div class="col-sm-12 no_pad">
<div class="form-group">
<?php if( IS_PP == 1){?>
 <div class="form-box-up pamt_opt">
       <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input pmt_radio" name="payment_by" id="paypal_name" value="paypal" type="radio" required="required" checked="checked">
            <span class="set-img-icon"><img src="<?php echo SITEURL;?>bootstrap_3_3_6/img/paypal.png"> PayPal 
            <?php if(PP_FEE > 0){?> <span class="sfee"> ( <?php echo PP_FEE;?>% Handling Fee )</span><?php }?>
            </span></label>
          <p class="bnk-trns-add _r_info" id="paypal_info" style="display: none">You will be redirected to the PayPal website.</p>
        </div>
 </div>
 <?php } ?>
</div>
</div>
 <div class="clearfix"></div>     
</div>
</div>
<!--end of second box--->
   <div class="col-md-8">
     <div class="fifth-order-review">        
      <h4  class="title-heads">ORDER REVIEW</h4>
       <div class="prodct-rvew">
       <table class="aw-onestepcheckout-cart-table table table-bordered">
<colgroup><col>
<col width="1">
<col width="1">
</colgroup><thead>
<tr>
<th class="name">Product Name</th>
<th class="qty a-center">Qty</th>

<th class="qty a-center">Price</th>
<?php /*?>
<th class="qty a-center">Discount %</th>
<?php */?>
<th class="total a-right">Subtotal</th>
</tr>
</thead>
<tbody>
<?php
$shipping_cost = $discount = $warranty_amt = 0;
$total = $is_cateback = 0;
$scost = $cids = $pro_id = array();
$accessory = $a_downpipe = $a_catback = $final_warr = 0;

foreach ($all_pro as $alist){
    if($alist['Product']['type'] == 4 && $alist['Product']['id'] != 97 ){ $scost[5][] = $alist['Cart']['quantity']; }
    elseif($alist['Product']['type'] == 4 && $alist['Product']['id'] == 97 ){ $scost[4][] = $alist['Cart']['quantity']; }
    
    elseif($alist['Product']['type'] == 5 ){ $scost[5][] = $alist['Cart']['quantity']; $accessory = $accessory + $alist['Cart']['quantity']; }
    elseif($alist['Product']['type'] == 3 ){ $scost[3][] = $alist['Cart']['quantity']; $a_downpipe = $a_downpipe + $alist['Cart']['quantity']; }
    elseif($alist['Product']['type'] == 2 ){ $scost[2][] = $alist['Cart']['quantity']; $a_catback = $a_catback + $alist['Cart']['quantity']; }
}

/* Only Downpipe */
if( $a_downpipe > 0 && $a_catback == 0 ){
    foreach ($all_pro as $alist){ if($alist['Product']['type'] == 3 ){ $final_warr = $final_warr + num_2( ($alist['Product']['price'] * 10 /100) * $alist['Cart']['quantity'] ); } }
}
/* Only cat-back */
elseif( $a_downpipe == 0 && $a_catback > 0 ){
    foreach ($all_pro as $alist){ 
        if($alist['Product']['type'] == 2 ){ 
            if( num_2($alist['Product']['price']) <= 3800 ){ $final_warr = $final_warr + ($alist['Cart']['quantity'] * 199); }
            else{ $final_warr = $final_warr + ($alist['Cart']['quantity'] * 299); }
    } 
  }
}
elseif( $a_downpipe > 0 && $a_catback > 0 ){
    $d_total = 0;
    foreach ($all_pro as $alist){
        if($alist['Product']['type'] == 2 ){ $d_total = $d_total + num_2($alist['Cart']['quantity'] * $alist['Product']['price']); }
        elseif($alist['Product']['type'] == 3 ){ $d_total = $d_total + num_2($alist['Cart']['quantity'] * $alist['Product']['price']); }
    }
    if( num_2($d_total) <= 3800 ){ $final_warr = $final_warr + 199; }
    else{ $final_warr = $final_warr + 299; }
}

/*
 * 2 - Cat-back
 * 3 - Down-pipe
 * 
 * */

if ( isset($scost[2]) && !empty($scost[2]) ){  $pro_qty = array_sum($scost[2]); $shipping_cost = $pro_qty * $country_list['CountryList']['catback'];  unset($scost); }
elseif ( isset($scost[3]) && !empty($scost[3]) ){  $pro_qty = ceil( array_sum($scost[3]) / 3 ); $shipping_cost = $pro_qty * $country_list['CountryList']['down_pipe']; unset($scost); }

elseif ( isset($scost[4]) && !empty($scost[4]) ){  
    $pro_qty = array_sum($scost[4]); 
    $shipping_cost = 1 * $country_list['CountryList']['owrc']; unset($scost); 
}
elseif ( isset($scost[5]) && !empty($scost[5]) ){ 
    $pro_qty =  array_sum($scost[5]); 
    $shipping_cost = 1 * $country_list['CountryList']['fedex_pack']; unset($scost); 
}

foreach ($all_pro as $list){
    if ( $shipping_discount > 0  ){ $discount = num_2($shipping_cost * $shipping_discount / 100); }
	if($list['Product']['type'] == 2){ $is_cateback++; }
	if($list['Product']['quantity'] > 0){
    $p1 = $list['Product']['price'];
    if ( $list['Product']['discount'] > 0  ){
        $p1 = $list['Product']['price'] -  ( $list['Product']['price'] * $list['Product']['discount'] / 100) ;
    }
    $amt = num_2($list['Cart']['quantity'] * $p1);
	$total+= $amt;
	$cids[] = $list['Cart']['id'];
	$pro_id [] = $list['Product']['id'];
}
	$url = 'javascript:void(0);';
	if($list['Product']['type'] == 1){ $url = SITEURL."collections/products/".$list['Product']['slug'];; }
	elseif($list['Product']['type'] == 4){ $url = SITEURL."shop/".$list['Product']['slug']; }
	elseif( in_array($list['Product']['type'], array(2,3,5)) ){
		$getCarURL = $this->Lab->getCarURL($list['Product']['brand_id'],$list['Product']['model_id'],$list['Product']['motor_id']);
		$url = SITEURL."product/".$getCarURL;
	}	
?>            
<tr class="pd_list">
<td class="w30"><h3 class="product-name"><a href="<?php echo $url;?>" title="" target="_blank"><?php echo $list['Product']['title']; echo (!empty($list['Cart']['size']) ? " ".$list['Cart']['size']: null); ?></a> </h3>
<?php if(!empty($list['Product']['part'])){  ?>
<div class="grid-right-sec abtpro"><span><?php echo $list['Product']['part'];?></span></div>
<?php $mat_type = null;
if( $list['Product']['material'] == 'stainless steel'){ $mat_type = '<div class="grid-right-sec abtpro stainless_steel"><span>Stainless steel</span></div>'; }
elseif( $list['Product']['material'] == 'titanium'){ $mat_type = '<div class="grid-right-sec abtpro titanium"><span>Titanium</span></div>'; }
echo $mat_type; }?>
</td>
<td class="a-center"><?php echo $list['Cart']['quantity'];?></td>

<td class="a-center wid_2"><?php 
if ($list['Product']['discount'] > 0) { 
    echo new_currency($list['Product']['price'],$p1,$euro_price,$region);
}
else{ echo currency($list['Product']['price'],$euro_price,$region); } ?></td>
<td class="a-right wid_4"><span class="cart-price"><span class="price"><?php echo currency($p1 * $list['Cart']['quantity'],$euro_price,$region); ?></span></span></td>
</tr>
<?php }?>
</tbody></table>
<table class="aw-onestepcheckout-cart-table table table-bordered">
<tbody>
<tr>
<?php 

if ( $region == 3 && $is_cateback > 0 ){
    if( in_array($region_id, [14,40]) ){ 
        $discount = num_2($shipping_cost * 20 / 100);
    }
    else{ $shipping_cost =  $discount = 0; }
}

$warranty_amt = 0;
$net_total = ($total + $shipping_cost ) - $discount;  
$duty_amt = num_2($net_total * $import_duty / 100);
$vat_amt = num_2($net_total * $vat / 100);
$gt_total = num_2($net_total + $duty_amt + $vat_amt + $warranty_amt);
?>
<td  class="a-right" colspan="2">Subtotal</td><td class="a-right"><span class="price" id="_total_amount"><?php echo currency($total,$euro_price,$region);?></span>    </td></tr>

<?php if ($shipping_cost == 0){?>
<tr><td  class="a-right" colspan="2">Free Shipping </td><td  class="a-right"><span class="price" id="_shipping_discount"><?php echo currency(0,$euro_price,$region);?></span>    </td></tr>
<?php } else{?>
<tr><td  class="a-right" colspan="2">Shipping (+)</td><td  class="a-right"><span class="price" id="_shipping_cost"><?php echo currency($shipping_cost,$euro_price,$region);;?></span>    </td></tr>
<?php if ($shipping_discount > 0){?>
<tr><td  class="a-right" colspan="2">Shipping Fee Discount <?php /* echo num_2($shipping_discount); */ ?> (-)</td><td  class="a-right"><span class="price" id="_shipping_discount"><?php echo currency($discount,$euro_price,$region);?></span>    </td></tr>
<?php } }?>

<?php if($region == 3){?>
<tr><td  class="a-right" colspan="2" id="p_imp_duty">Import duty <?php echo $import_duty;?>% (+)</td><td  class="a-right"><span class="price" id="_duty"><?php echo currency($duty_amt,$euro_price,$region);?></span>    </td></tr>
<tr><td  class="a-right" colspan="2" id="p_vat">VAT <?php echo $vat;?>% (+)</td><td  class="a-right"><span class="price" id="_vat"><?php echo currency($vat_amt,$euro_price,$region);?></span>    </td></tr>
<?php }?>


<tr><td  class="a-right" colspan="2">
<div class="form-group "><label>
<input type="checkbox" name="warranty_extension_check" id='warranty_extension_check'>Warranty Extension
<i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="An additional warranty of one year can be purchased upon selecting this option"></i>
</label></div> </td>
<td  class="a-right"><span class="price" id="_warranty"><?php echo currency($warranty_amt,$euro_price,$region);?></span>    
</td></tr>


<tr><td  class="a-right" colspan="2"><strong>Grand Total</strong></td><td  class="a-right"><strong><span class="price" id="_ngt"><?php echo currency($gt_total,$euro_price,$region);?></span></strong></td></tr>
</tbody></table> 
 <div class="text-right"><a href="<?php echo SITEURL."cart";?>">Edit Your Cart</a></div>
 
<?php 
if( $a_downpipe > 1 || $a_catback > 1){ echo "<br><div class='alert alert-danger'>Please note you can order only 1 cat-back and/or 1 downpipe per order. If you want to order more than one, please submit two separate orders.</div><br>"; }
else{ ?> 
<div class="coupen-bx">
         
<div class="form-group"><label for="cmnts">Comments</label>       <textarea class="form-control" id="note" rows="6" name='note' placeholder="If you have any question regarding to the custom value declaration of the goods you've purchased, please contact sales@armytrix.com or leave message in your order message board. Otherwise we will ship the goods value as it is."><?php echo $note;?></textarea></div>
<div class="form-group <?php if($a_downpipe > 0 || $a_catback > 0){ echo 'required';}?>"><label for="vin" class="control-label">VIN Number</label> <input type="text" name="vin_number" class="form-control" <?php if($a_downpipe > 0 || $a_catback > 0){ echo 'required="required"';}?> maxlength="17"></div> 
<div class="form-group "><label><input type="checkbox" required="required" name="tnc" id='tnc' value="1"> I have read and agree to <a href="<?php echo SITEURL."terms_and_conditions";?>" target="_blank"><b>the Armytrix Online Store Terms & Conditions. </b></a></label></div>
<div class="form-group "><label><input type="checkbox" required="required" name="tnc2" id='tnc2' value="1"> I have read and understand the return policy from the Armytrix Online Store Terms & Conditions, I will be refunded in full to my original form of payment, excluding the cost of delivery, cost of returning product(s), and cost of 5% PayPal refund processing fee.</label></div>
<div class="form-group "><label><input type="checkbox" required="required" name="tnc3" id='tnc3' value="1"> I have verified that the product(s) selected is comaptible with my car model. I understand and agree that in the event that I wish to cancel my order because the product(s) turned out to be incompatible, there will be a 5% refund charge by PayPal

</label></div>
<div class="clearfix"></div>
<?php $plist = implode(',',$cids); 
$pro_ids = implode(',',$pro_id);?>
<input type="hidden" name="total_amount" id="total_amount" value="<?php echo num_2($total);?>">
<input type="hidden" name="shipping_cost" id="shipping_cost" value="<?php echo num_2($shipping_cost);?>">
<input type="hidden" name="discount" id="discount" value="<?php echo $discount;?>">
<input type="hidden" name="shipping_discount" id="shipping_discount" value="<?php echo $shipping_discount;?>">
<input type="hidden" name="import_duty" id="import_duty" value="<?php echo $duty_amt;?>">
<input type="hidden" name="vat" id="vat" value="<?php echo $vat_amt;?>">

<input type="hidden" name="warranty_extension" id="warranty_extension" value="<?php echo num_2($warranty_amt);?>">
<input type="hidden" name="est_warranty_extension" id="est_extension" value="<?php echo num_2($final_warr);?>">


<input type="hidden" name="eur" id="eur" value="<?php echo $euro_price;?>">
<input type="hidden" name="grand_total" id="grand_total" value="<?php echo num_2($gt_total);?>">

<input type="hidden" name="cid" id="cid" value="<?php echo $plist;?>">
<input type="hidden" name="pid" id="pid" value="<?php echo $pro_ids;?>">

<input type="hidden" name="region" id="region" value="<?php echo $region;?>">
<input type="hidden" name="iso" id="iso" value="<?php echo $iso;?>">
<input type="hidden" name="first_name" value="<?php echo $shipping['Order']['first_name'];?>">
<input type="hidden" name="last_name" value="<?php echo $shipping['Order']['last_name'];?>">
<input type="hidden" name="email" value="<?php echo $shipping['Order']['email'];?>">
<input type="hidden" name="phone" value="<?php echo $shipping['Order']['phone'];?>">

<input type="hidden" name="shipping_company" value="">
<input type="hidden" name="shipping_address" value="">
<input type="hidden" name="shipping_address_2" value="">
<input type="hidden" name="shipping_city" value="">
<input type="hidden" name="shipping_zip" value="">
<input type="hidden" name="shipping_country" value="<?php echo $shipping['Order']['shipping_country'];?>">
<input type="hidden" name="country_list_id" value="<?php echo $shipping['Order']['country_list_id'];?>">
<input type="hidden" name="shipping_state" value="<?php echo $shipping['Order']['shipping_state'];?>">

<input type="hidden" name="billing_company" value="">
<input type="hidden" name="billing_address" value="">
<input type="hidden" name="billing_address_2" value="">
<input type="hidden" name="billing_city" value="">
<input type="hidden" name="billing_zip" value="">
<input type="hidden" name="billing_country" value="">
<input type="hidden" name="billing_country_id" value="">
<input type="hidden" name="billing_state" value="">

<div id="_ch_err"></div>
   
<div class="submit-btn pull-right">
 <button id="_do_chk">
  <span class="grnd-total"><span class="set-txxt">Grand Total</span> <span class="totl-value" id="_gt"><?php echo currency($gt_total,$euro_price,$region);?></span></span>
  <span class="plc-order">Place Order</span>
 </button>
</div>
</div>
<?php }?>
</div>
</div>
</div>   
<div class="clearfix"></div>    
</div></div>
<script>
$(document).ready(function(){
	
		  $('[data-toggle="tooltip"]').tooltip();
		

	$("#warranty_extension_check").change(function() {
		if(this.checked) {
	    	var gt = parseFloat( $("#grand_total").val() );
			var est_extension = parseFloat( $("#est_extension").val() );
			var fgt = gt + est_extension;
			$("#warranty_extension").val(est_extension);
	    	$("#grand_total").val(fgt);
			$("#_warranty").html('USD $'+est_extension);
			$("#_ngt").html('USD $'+fgt);
			$("#_gt").html('USD $'+fgt);
	    	    
	    }else{
	    	var gt = parseFloat( $("#grand_total").val() );
			var est_extension = parseFloat( $("#est_extension").val() );
			var fgt = gt - est_extension;
			$("#warranty_extension").val(0);
	    	$("#grand_total").val(fgt);
			$("#_warranty").html('USD $0.00');
			$("#_ngt").html('USD $'+fgt);
			$("#_gt").html('USD $'+fgt);
		}
	});
	
		$('.pmt_radio').on('change', function() { 
		if(this.value == 'paypal'){ $('._r_info').hide(); $('#paypal_info').show(); }
		else if(this.value == 'cc'){ $('._r_info').hide(); $('#cc_info').show(); } 
	});

$('#reFrm') .formValidation({
    framework: 'bootstrap', icon: { }, err: { },
    fields: {
 'payment_by': { validators: { notEmpty: { message: 'Please select your payment method.' } } },
'tnc': { validators: { notEmpty: { message: 'Please read and agree to the Armytrix Online Store Terms & Conditions.' } } },
'tnc2': { validators: { notEmpty: { message: 'please accept terms and conditions.' } } },
'tnc3': { validators: { notEmpty: { message: 'please accept terms and conditions.' } } },
 }
})    .on('success.form.fv', function(e) {
    e.preventDefault();
    var $form = $(e.target),
        fv    = $form.data('formValidation');
    fv.defaultSubmit();
}).on('err.form.fv', function(e) {
    var fv = $(e.target).data('formValidation');
    var $firstInvalidField = fv.getInvalidFields()[0];
    $('html,body').animate({ scrollTop: $("#"+$firstInvalidField['id']).offset().top - 200}, 'slow');
});

$('#_do_chk').click(function(){
     $("#reFrm").ajaxForm({ 
  	   target: '#_ch_err',
  	   beforeSubmit:function(){ $('#_do_chk').prop("disabled",true); $('#preloader').show(); }, 
  	   success: function(response)  { $('#preloader').hide(); },
  	   error : function(response)  { $('#_do_chk').prop("disabled",false); $('#preloader').hide();},
  	   }).submit(); 
});
});	
</script>  

<?php  echo $this->Form->end(); }else{?>
<div class="row">
<div class="span12 module_number_16 module_cont pb50 module_promo_text">                                        	
<div class="shortcode_promoblock  no_button_text  no_button_link ">
<div class="promoblock_wrapper">
<div class="promo_text_block">
<div class="promo_text_block_wrapper">
<center><h1>Your shopping cart is empty!</h1></center>
</div>
</div>                                                        
</div>
</div>
<div class="clear"></div>   
</div></div>
<?php }?>
</div>