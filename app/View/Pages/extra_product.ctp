
<div id="main_sec">
	<style>
body{background:#fff}
.product-add-cart-sec{padding-top:30px}
.product-exhuat-sec{padding:60px 30px;overflow:hidden}
.product-exhuat h2{font-size:15px;text-transform:inherit;text-align:left;}
.product-filter .lable_txt{width:100%!important;padding:10px 12px;color:#000;border:2px solid #b4b4b4;font-size:16px;background:transparent!important}
.product-filter{margin:15px 0}
.product-fliter-img img{max-width:360px}
.product-fliter-img h2{text-transform:uppercase!important;font-size:24px!important;text-align:center}
.product-add-cart-grid{border:2px solid gray;padding:15px 10px;margin-bottom:25px}
.product-add-cart-grid h3{text-align:left;font-weight:500;text-transform:uppercase;padding:12px 0 0;margin:0 auto}
.product-add-cart-grid p{text-align:left;text-transform:uppercase;font-size:12px;font-weight:700;}
.no-pad{margin:0 auto;padding:0}
.grid-left-sec span{color:#1A9B58}
.grid-right-sec span,.grid-left-sec span{text-transform:uppercase;font-size:16px;font-weight:500;}
.grid-right-sec{text-align:center;background:#B4B4B4;color:#fff!important}
.grid-left-sec{text-align:left}
.add-cart-price{padding:0 0 15px;overflow:hidden}
.add-cart-btn .ful-wd-btn{width:100%;font-size:16px!important;border-radius:0;background:#093 none repeat scroll 0 0;color:#fff;text-transform:uppercase;border:none;}
.add-cart-btn .ful-wd-btn:hover{background:#444 none repeat scroll 0 0!important}
.product-fliter-img{text-align:center}
@media ( min-width : 768px) and (max-width: 991px) {
.product-add-cart-sec .col-md-3{float:left;max-width:33%!important}
.product-exhuat .col-md-6{width:50%!important;float:left!important}
}
@media ( max-width : 900px) {
#main_sec .product-exhuat-sec{display:block!important}
}
@media ( max-width : 991px) {
.add-cart-price .col-md-6{float:left!important;width:50%!important}
.product-add-cart-grid h3{margin:0 auto}
}
h3{font-size: 22px;    text-align: center; margin:0px; font-weight: 600;}

@media ( min-width : 300px) and (max-width: 480px) {
.grid-left-sec { margin-top: 0; }
.col-md-3 {   width: 100%;}
}

@media ( min-width : 481px) and (max-width: 768px) {
.grid-left-sec { margin-top: 0; }

}


</style>
	<div id="preloader" style="display: none;"><div id="status">&nbsp;</div></div>
	<div class="fullscreen_block  product-exhuat-sec loaded"
		id="tuning_box_page ">
		<div class="product-exhuat">
		<div id="tabs" class="htabs">
  <h1>ARMYTRIX MERCHANDISE</h1>
 </div>
			

		</div>
		<div class="clearfix"></div>
		<div id="app_error"></div>
		<div class="product-add-cart-sec" id="get_data" >
<?php if(isset($data) && !empty($data)){
	foreach ($data as $list){ 

		$abc = explode(',',$list['Product']['extra_photos']);
		$get_path = null;
		if(isset($abc[0]) && !empty($abc[0])){ $get_path = $this->Lab->getImage($abc[0]); }
		if(isset($get_path)){ $imgg = new_show_image('cdn/'.$get_path,270,180,100,'ff',null); }
		else{ $imgg = new_show_image('cdn/no_image_available.jpg',270,180,100,'ff',null); }
?>
	<div class="col-md-3">
<div class="product-add-cart-grid" id="pic_<?php echo $list['Product']['id']?>">
<a href="<?php echo SITEURL.'shop/'.$list['Product']['slug'];?>">
<img src="<?php echo $imgg;?>" title="" alt="">
<p><?php echo $list['Product']['title'];?></p>
</a>
<div class="add-cart-price"><div class="col-md-6 no-pad"><div class="grid-left-sec"> <span>USD $<?php echo num_2($list['Product']['price']);?></span> </div></div></div>
<div class="clearfix"></div>
<div class="add-cart-btn">
<?php if($list['Product']['quantity'] > 0){
    if(empty($list['Product']['sizes'])){ ?>
<input value="add to cart" class="btn btn-success ful-wd-btn" onclick="add_pro(<?php echo $list['Product']['id'];?>)" id="shop_<?php echo $list['Product']['id'];?>" type="button">
<?php }else{ ?>
<a href="<?php echo SITEURL.'shop/'.$list['Product']['slug'];?>" class="btn btn-success ful-wd-btn">View</a>    
<?php } }else{?><input value="Out of Stock" class="hasIcon shortcode_button btn btn_type4 w100" type="button"><?php }?>
</div>
</div>
</div>

	<?php } }else{?>
	
	<div class="row">
<div class="span12 module_number_16 module_cont pb50 module_promo_text">                                        	
<div class="shortcode_promoblock  no_button_text  no_button_link ">
<div class="promoblock_wrapper">
<div class="promo_text_block"><div class="promo_text_block_wrapper"><h1>Product tab is empty</h1><span>Please visit after sometime</span></div></div>                                                       
</div></div>
<div class="clear"></div>   
</div></div>
<?php }?>			
		
		</div>
	</div>
</div>
<script>
function add_pro(id){
	if( id != ''){
		$('#preloader').show();
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL;?>pages/add_to_cart',
			data:'pid='+id+'&q=1&get=product',
			success: function(data) { $("#_my_cart").html(data); setTimeout(function(){ $('#preloader').hide(); }, 200); },
			error: function(comment) { $("#_my_cart").html(data);  setTimeout(function(){ $('#preloader').hide(); }, 500);  }}); 
		
	}
}
</script>