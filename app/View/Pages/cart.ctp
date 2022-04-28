<div id="preloader" style="display: none"> <div id="status">&nbsp;</div> </div>
<div class="col-md-12">
  <div class="fw_content_wrapper" id="cartitem-cart">
    <div class="fw_content_padding pad-none">
      <div class="contentarea">
        <div class="cart-section">
          <div class="item-cart-section">
            <div class="shoping-cart-head">
              <div class="col-md-10">
              <div id="app_error"></div>
              <div class="clearfix"></div><h2>Shopping Cart</h2></div>
              <div class="col-md-2">
                <div class="contiune-shop"> <a href="<?php echo SITEURL."product-exhaust";?>"> <i class="fa fa-angle-left" aria-hidden="true"></i> Continue shopping </a> </div>
              </div>
              <div class="clearfix"></div>
            </div>
            <?php if(!empty($getAll)){?>
            <div class="item-details" >
              
              <div class="clearfix"></div>
              <div class="item-main-heading">
                <div class="col-md-6"> 
                <div class="col-md-4">
                    <div class="main-head">
                      <h3>Product Photo</h3>
                    </div>
                  </div>
                  
                  <div class="col-md-4">
                    <div class="main-head">
                      <h3>item</h3>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-4">
                    <div class="main-head">
                      <h3>unit price</h3>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="main-head">
                      <h3> qty </h3>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="main-head">
                      <h3>total price</h3>
                    </div>
                  </div>
                </div>
              </div>
<?php //ec($getAll);?>              
              <ul class="card-item">
<?php
$total = $shipping = $is_cateback = $is_pipe = 0;

foreach ($getAll as $list){
    
    $amount = $list['Product']['price'] -  ( $list['Product']['price'] * $list['Product']['discount'] / 100) ;
    
	$pImg = new_show_image('cdn/no_image_available.jpg',300,150,100,'ff',null);
	if($list['Product']['type'] == 2){ $is_cateback++; }
	elseif($list['Product']['type'] == 3){ $is_pipe++; }
	
	if($list['Product']['type'] == 1){
		$ima = json_decode($list['Product']['images'],true);
		if(isset($ima[0]) && !empty($ima[0])){
		$pImg = new_show_image('cdn/cdnimg/'.$ima[0],300,150,100,'ff',null);}
		
	}
	elseif($list['Product']['type'] == 4){
		$abc = explode(',',$list['Product']['extra_photos']);
		$get_path = null;
		if(isset($abc[0]) && !empty($abc[0])){ $get_path = $this->Lab->getImage($abc[0]); }
		if(isset($get_path)){ $pImg = new_show_image('cdn/'.$get_path,300,150,100,'ff',null); }
		else{ $pImg = new_show_image('cdn/no_image_available.jpg',300,150,100,'ff',null); }
	}
	else{ 
		if(isset($list['Product']['Library']['full_path']) && !empty($list['Product']['Library']['full_path'])){
		$pImg = new_show_image('cdn/'.$list['Product']['Library']['full_path'],300,150,100,'ff',null); }}
	
		
	if($list['Product']['quantity'] > 0){
		$amt = num_2($list['Cart']['quantity'] * $amount);
		$total+= $amt;
	}
$url = 'javascript:void(0);';

if($list['Product']['type'] == 1){ $url = SITEURL."collections/products/".$list['Product']['slug'];; }
elseif($list['Product']['type'] == 4){ $url = SITEURL."shop/".$list['Product']['slug']; }
elseif( in_array($list['Product']['type'], array(2,3,5)) ){ 
	$getCarURL = $this->Lab->getCarURL($list['Product']['brand_id'],$list['Product']['model_id'],$list['Product']['motor_id']);
	$url = SITEURL."product/".$getCarURL; 
	}
?>
                <li>
                  <div class="col-md-6">
                    <div class="item-list">
                      <div class="col-md-5"> 
                      <a href="<?php echo $url;?>" title="" target="_blank">
                      <img src="<?php echo $pImg;?>" title="" alt=""></a> 
                      
                      </div>
                      <div class="col-md-61">
                        <div class="item-head-details">
                        
                         <?php if($list['Product']['type'] != 4 ){?> 
                         <a href="<?php echo $url;?>" title="" target="_blank"><h2><?php echo @$list['Product']['Brand']['name']."/".@$list['Product']['Model']['name']."/".@$list['Product']['Motor']['name'];?></h2></a>
                         <h3>
                         
                         <?php echo $list['Product']['title'];?>
                         <?php }else{ ?>
                         <a href="<?php echo $url;?>" title="" target="_blank"><h2><?php echo $list['Product']['title'];
                         echo (!empty($list['Cart']['size']) ? " ".$list['Cart']['size']: null); ?></h2></a>
                         <?php }?>
                          </h3>
                          <?php if(!empty($list['Product']['part'])){  ?>
                          <div class="grid-right-sec abtpro"><span><?php echo $list['Product']['part'];?></span></div>
                          
                          <?php $mat_type = null;
                          if( $list['Product']['material'] == 'stainless steel'){ $mat_type = '<div class="grid-right-sec abtpro stainless_steel"><span>Stainless steel</span></div>'; }
                          elseif( $list['Product']['material'] == 'titanium'){ $mat_type = '<div class="grid-right-sec abtpro titanium"><span>Titanium</span></div>'; }
                          echo $mat_type;
                          ?>
                          
                          <?php }?>
                          
                          <ul class="item-rmve">
                            <li><a href="javascript:void(0);" onclick="rm(<?php echo $list['Cart']['id'];?>,1);">remove item</a></li>
                            <?php /*?><li><a href="javascript:void(0);" onclick="rm(<?php echo $list['Cart']['id'];?>,2);">add to wishlist</a></li><?php */?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="col-md-4">
                      <div class="item-price">
                        <h3><?php 
                        if ( $list['Product']['discount'] > 0){ echo $p_price = "USD <strike>$".num_2($list['Product']['price'])."</strike> <spam class='text-danger'>$".num_2($amount)."</spam>"; }
                        else{ echo $p_price = "USD $".num_2($list['Product']['price']); }
                         ?></h3>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="item-quantity">
                        <div class="center">
                        <?php if($list['Product']['quantity'] > 0){?>
                          <div class="input-group"> <span class="input-group-btn">
                            <button type="button" class="btn btn-default btn-number btn-snp" <?php if($list['Cart']['quantity'] == 1){ echo 'disabled="disabled"';}?> data-type="minus" data-field="quant[<?php echo $list['Cart']['id'];?>]" cid="<?php echo $list['Cart']['id'];?>"> <span class="glyphicon glyphicon-minus"></span> </button>
                            </span>
                            <input type="text" name="quant[<?php echo $list['Cart']['id'];?>]" class="form-control input-number " value="<?php echo $list['Cart']['quantity'];?>" min="1" max="10" readonly="readonly">
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-default btn-number btn-snp" data-type="plus" data-field="quant[<?php echo $list['Cart']['id'];?>]" cid="<?php echo $list['Cart']['id'];?>"> <span class="glyphicon glyphicon-plus"></span> </button>
                            </span> 
                            </div>
                            <?php }?>
                        </div>
                        <?php if($list['Product']['quantity'] > 0){ echo '<div class="in-stock-pro"><h3>in stock</h3></div>';}
                        else{ echo '<div class="out-stock-pro"><h3>out of stock</h3></div>';}?>
                        
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="item-total-price">
                        <h3><?php if($list['Product']['quantity'] > 0){ echo "USD $".num_2($amount * $list['Cart']['quantity']);}?></h3>
                      </div>
                    </div>
                  </div>
                </li>
                <div class="clearfix"></div>
<?php }?>                
                
              </ul>
            </div>
          <?php }else{?>
          <div class="row">
                                        <div class="span12 module_number_16 module_cont pb50 module_promo_text">                                        	
                                            <div class="shortcode_promoblock  no_button_text  no_button_link ">
                                                <div class="promoblock_wrapper">
                                                    <div class="promo_text_block">
                                                        <div class="promo_text_block_wrapper">
                                                            <center><h1>Your shopping cart is empty!</h1>
                                                            <span></span></center>
                                                        </div>
                                                    </div>                                                        
                                                </div>
                                            </div>
                                            <div class="clear"></div>   
                                        </div><!-- .module_cont -->
                                    </div>
          <?php }?>
          </div>
<div class="clearfix"></div>
          
<?php if(!empty($getAll)){?>
<div class="Note-section">
<div class="col-md-12"><h2>Note</h2><div class="note-content">
<textarea rows="4" cols="5" id="note" name="note" placeholder="If you have any question regarding to the custom value declaration of the goods you've purchased, please contact sales@armytrix.com or leave message in your order message board. Otherwise we will ship the goods value as it is."></textarea></div></div>
<div class="col-md-6"></div>
          </div>
          <div class="clearfix"></div>
          <div class="checkout-section">
            <div class="col-md-6"> &nbsp; </div>
            <div class="col-md-2"></div>
            <div class="col-md-4">
              <div class="payment-total">
              <?php /*?>
                <h3>apply coupon code</h3>
                <div class="coupon-code-bx">
                  <input name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Enter promo code" type="text">
                  <input class="button" name="apply_coupon" value="Apply" type="button" id="ap_promo">
                  <div class="clearfix"></div>
                </div><?php */?>
                
                <div class="clearfix"></div>
                <div class="total-amt">
                  <div class="col-md-6 no-pad left-price">
                    <div class="price-txt">
                      <h3>total</h3>
                    </div>
                  </div>
                  <div class="col-md-6 no-pad right-price">
                    <div class="price-num">
                      <h3 id="_gt">USD $<?php echo num_2($total + $shipping);?></h3>
                    </div>
                  </div>
                </div>
                
<input type="hidden" value="<?php echo num_2($total);?>" id="sub_total">
<input type="hidden" value="<?php echo num_2($total);?>" id="gt_total">
<div class="clearfix"></div>
<div id="_c_err"></div>                
<div class="clearfix"></div>

<?php 
if( $is_cateback > 1 ||  $is_pipe > 1){ ?> 
<div class='alert alert-danger'>Please note you can order only 1 cat-back and/or 1 downpipe per order. If you want to order more than one, please submit two separate orders.</div>

<?php }else{ ?><div class="checkout-btn"> <a href="javascript:void(0);" id="do_checkout">Checkout</a> </div><?php }?> 

              </div>
            </div>
          </div>
<?php }?>        
        </div>
      </div>
    </div>
  </div>
</div>

<style> 
.no-pad{margin:0 auto;padding:0}
.cart-section{float:none}
.fw_content_padding.pad-none{padding:0!important}
.shoping-cart-head h2{font-size:32px;text-transform:uppercase;font-weight:500}
.shoping-cart-head .contiune-shop{font-size:16px;font-weight:300;margin-top:10px;position:relative;text-align:right;text-transform:lowercase}
.contiune-shop > a{color:#000!important;font-weight:300!important}
.shoping-cart-head{border-bottom:medium dotted;margin-bottom:20px;overflow:hidden;padding:10px 0}
.item-main-heading{overflow:hidden;padding:16px 0}
.item-rmve > li{display:inline-block;vertical-align:middle}
.item-quantity .btn-snp{background:#1a9b58 none repeat scroll 0 0;height:40px;color:#fff!important}
.item-price,.item-quantity,.item-total-price{text-align:center;padding:30px 0}
.main-head{text-align:center}
.item-quantity .btn-default.disabled,.item-quantity .btn-default[disabled],fieldset[disabled] .btn-default,.item-quantity .btn-default.disabled:hover,.btn-default[disabled]:hover,fieldset[disabled] .btn-default:hover,.item-quantity .btn-default.disabled:focus,.btn-default[disabled]:focus,fieldset[disabled] .btn-default:focus,.item-quantity .btn-default.disabled:active,.btn-default[disabled]:active,fieldset[disabled] .btn-default:active,.item-quantity .btn-default.disabled.active,.btn-default.active[disabled],fieldset[disabled] .btn-default.active{background:#1a9b58 none repeat scroll 0 0;color:#fff!important}
.item-quantity .form-control{text-align:center;height:40px;border:none!important;background:#e2e3e4 none repeat scroll 0 0;cursor:inherit}
.item-quantity{margin:auto;max-width:140px!important}
.main-head > h3,.item-head > h3{color:#adaeb1;font-size:16px;font-weight:400;text-transform:uppercase}
.item-head-details > a, .item-head-details > a >h2{font-size:20px;text-transform:uppercase}
.item-head-details > h3{font-size:12px;font-weight:300;line-height:22px;text-transform:uppercase}
.item-rmve a{color:#000;font-size:15px;text-decoration:underline;text-transform:capitalize}
.item-rmve i{padding:0 8px;vertical-align:middle}
.item-rmve{margin-top:40px}
.item-head-details > h2{font-size:20px;margin-bottom:5px}
.item-quantity .in-stock-pro{margin-top:15px}
.out-stock-pro > h3{font-size:18px;font-weight:300;margin:auto;position:relative;text-align:center;text-transform:capitalize;color: red}
.in-stock-pro > h3{font-size:18px;font-weight:300;margin:auto;position:relative;text-align:center;text-transform:capitalize}
.in-stock-pro > h3::before{background-image:url(<?php echo SITEURL;?>img/right-icon.png);background-size:100% auto;content:"";height:20px;left:10px;position:absolute;width:20px}
.item-price > h3,.item-total-price > h3{font-size:15px;font-weight:400}
.item-details li{overflow:hidden;padding:20px 0}
.free-gift-section .item-quantity .btn-snp{background:#999 none repeat scroll 0 0}
.free-gift-section .item-head-details > h2{font-size:20px!important;font-weight:500}
.free-gift-section .item-list{overflow:hidden;padding:30px 0}
free-gift-section ..input-group-btn{display:none!important}
.item-quantity{padding:20px 0!important}
.Note-section h2{font-size:32px;font-weight:500;padding:20px 0;text-transform:uppercase; margin:15px 0 0;}
.coupon-code-bx .input-text{background:#ccc;}
.Note-section{border-top:medium dotted}
.Note-section textarea{border:0; background:#ccc; padding:15px;}
.free-gift-section .input-group-btn{display:none!important}
.checkout-section{overflow:hidden;padding:15px 0}
.checkout-section h2{font-size:26px;font-weight:300;margin-bottom:20px;text-align:center;text-transform:uppercase}
.checkout-section h2 span{font-size:26px;font-weight:500}
.recommended-product .carousel-control.right,.recommended-product .carousel-control.left{background-image:none!important}
.slide-cursor span{background-image:url(img/slide_controls.png);cursor:pointer;display:block;height:60px;margin-top:-16px;opacity:1;position:absolute;top:50%;transition:opacity .35s linear 0;width:32px;z-index:99}
.slide-cursor .prev-img{background-position:left center;left:10px}
.slide-cursor .nxt-img{background-position:right center;right:10px}
.slide-cursor span:hover{opacity:1}
.input-text{float:left;overflow:hidden;width:70%!important;background:#e2e3e4 none repeat scroll 0 0;border:none;background:#e2e3e4 none repeat scroll 0 0;border:medium none!important;border-radius:0;box-sizing:border-box;color:#222;display:block;font-size:13px;height:40px;line-height:20px;margin:0 0 7px;outline:medium none;padding:9px 20px 11px 18px !important;text-shadow:none}
.payment-total > h3{font-size:20px;font-weight:400;margin-bottom:22px;text-transform:capitalize}
.price-txt h3,.price-num h3{font-size:16px;font-weight:400;text-transform:uppercase}
.total-amt .price-txt h3,.total-amt .price-num h3{font-size:18px;font-weight:500}
.button{border-radius:0!important;float:right;width:25%;border:medium none;border-radius:3px;color:#fff;display:inline-block;font-size:13px!important;font-weight:900;height:40px;line-height:20px!important;margin:0;text-transform:uppercase;background:#093}
.price-num > h3{text-align:right}
.price-txt h3{text-align:left}
.sub-total-price{overflow:hidden;padding-bottom:10px!important}
.total-amt{border-top:2px solid gray;padding-top:20px!important}
.checkout-btn > a{background:#093 none repeat scroll 0 0;color:#fff;float:right;font-size:16px;font-weight:400;padding:15px 45px;text-transform:uppercase}
.checkout-btn{overflow:hidden;padding:25px 0!important}
.checkout-btn > a:hover{background:#444 none repeat scroll 0 0!important;color:#fff;transition:all 500ms ease-in-out 0}
textarea{width:100%;height:auto!important}
.item-list label{cursor:pointer;display:block;font-size:1.35em;font-weight:300;height:40px;margin:0 auto;padding:0;position:absolute;width:100%;z-index:111}
.item-list .check{background:#999 none repeat scroll 0 0;border:1px solid #999;border-radius:50%;bottom:0;display:block;height:30px;left:0;margin:auto;position:absolute;top:-40px;transition:border .25s linear 0;width:30px;z-index:5}
.card-item input[type="radio"]:checked ~ .check::before{background:url(image/checked-pg.png) no-repeat center center!important;background-size:22px auto!important}
.item-list .check::before{border-radius:100%;content:"";display:block;height:100%;left:0;margin:auto;position:absolute;top:0;width:100%}
.mneyyy{display:none!important}
#mneyy{display:none!important}
#mney{display:none!important}
.free-gift-section .item-list img{margin:-40px auto auto;text-align:center}
.card-item > li{padding:0!important}
#main_sec .checkout-btn > a{color:#fff!important}
@media (max-width:580px) {
.free-gift-section .item-list img{margin:0 auto!important;text-align:center}
.shoping-cart-head h2{font-size:22px!important;text-align:center;text-transform:uppercase}
.shoping-cart-head .contiune-shop{text-align:center}
.item-head-details{margin-top:24px;text-align:center!important}
.item-quantity .form-control{height:40px;background:#E2E3E4;border:none!important}
.item-rmve{margin-top:12px;text-align:center!important}
.item-details li{padding:0}
.item-rmve > li{padding:0!important}
.item-rmve i{padding:0 5px!important;vertical-align:middle}
.item-rmve a{font-size:12px!important;font-weight:400!important}
.item-price,.item-quantity,.item-total-price{padding:15px 0;text-align:center}
.item-quantity{padding:0!important}
.shoping-cart-head h2{font-size:22px!important}
.free-gift-section .item-list{overflow:hidden;padding:0}
.checkout-section h2{font-size:20px}
.checkout-section h2 span{font-size:20px}
.payment-total{margin-top:20px}
.button{padding:8px 10px!important}
.checkout-btn{text-align:center}
.checkout-btn > a{color:#fff!important;float:none;letter-spacing:0!important}
.free-gift-section .item-head-details > h2{font-size:16px!important}
.payment-total .left-price{float:left!important}
.payment-total .right-price{float:right!important}
.payment-total > h3{text-align:center}
}
@media (min-width:581px) and (max-width:991px) {
.shoping-cart-head .col-md-10{float:left!important}
.shoping-cart-head h2{text-transform:uppercase;padding:0;margin:0 auto}
.card-item .col-md-4{float:left;width:33%}
.item-rmve{margin-top:0}
.item-head-details{text-align:center}
.payment-total .left-price{float:left!important}
.payment-total .right-price{float:right!important}
.item-quantity .form-control{background:#e2e3e4 none repeat scroll 0 0;border:medium none!important;height:40px}
.item-price,.item-quantity,.item-total-price{padding:0!important}
}
@media (min-width:992px) and (max-width:1199px) {
.item-quantity .btn-snp{padding:6px 8px!important}
.in-stock-pro > h3::before{left:0!important}
.item-rmve a{font-size:12px}
.item-details li{padding:15px 0}
.item-rmve i{padding:0 5px;vertical-align:middle}
}
@media (max-width:900px) {
.checkout-btn > a{color:#fff!important}
}

@media (min-width:300px) and (max-width:786px) {

.item-main-heading{display:none}

.item-price > h3, .item-total-price > h3, .item-head-details > h3 { margin: 0; }

}
</style>
<script>
//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/

function rm(id,ty){
	$('#preloader').show();
	$.ajax({type: 'POST',
		url: '<?php echo SITEURL;?>pages/update_cart',
		data:'cid='+id+'&ty='+ty+'&type=rm',
		success: function(data) { $("#app_error").html(data); setTimeout(function(){ $('#preloader').hide(); location.reload();}, 500); },
		error: function(comment) { $("#app_error").html(data);  setTimeout(function(){ $('#preloader').hide(); location.reload();}, 500);  }});
}

function update_cart_qt(cid,qt){
	
	$('#preloader').show();
	$.ajax({type: 'POST',
		url: '<?php echo SITEURL;?>pages/update_cart',
		data:'cid='+cid+'&qt='+qt+'&type=update',
		success: function(data) { $("#app_error").html(data); setTimeout(function(){ $('#preloader').hide(); location.reload();}, 500); },
		error: function(comment) { $("#app_error").html(data);  setTimeout(function(){ $('#preloader').hide(); location.reload();}, 500);  }});
	 
	}

$('#do_checkout').click(function(e){
	$('#_c_err').html('');
	var note = $.trim($('#note').val());
	var free_gift = $('#free_gift').val();
	var promo_code = $('#promo_code').val();

	$('#preloader').show();
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL;?>pages/do_checkout',
			data:'free_gift='+free_gift+'&promo_code='+promo_code+'&note='+note,
			success: function(data) {  $('#preloader').hide(); $("#_c_err").html(data);},
			error: function(comment) { $("#_c_err").html(comment); $('#preloader').hide(); }});
	


	
});

$('.mneyyy').on('change', function() { $('#free_gift').val(this.value); });
$('#ap_promo').click(function(e){
	$('#_c_err').html('');
	var st = $('#sub_total').val();
	var code = $.trim($('#coupon_code').val());

	if( st != "" && code != ""){
		$('#ap_promo').prop('disabled',true); $('#ap_promo').val('wait..');
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL;?>pages/check_promo',
			data:'amt='+st+'&promo='+code+'&type=promo_check',
			success: function(data) { $("#_c_err").html(data); $('#ap_promo').prop('disabled',false); $('#ap_promo').val('Apply');},
			error: function(comment) { $("#_c_err").html(comment); $('#ap_promo').prop('disabled',false); $('#ap_promo').val('Apply');}});
	}else{ $('#coupon_code').focus(); }


	
});
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    cid = $(this).attr('cid');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
                update_cart_qt(cid,currentVal - 1);
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
                update_cart_qt(cid,currentVal + 1);
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});

</script> 
