<link rel="stylesheet" href="<?php echo SITEURL;?>css/custom.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo SITEURL;?>css/new_custom-for-audi.css" type="text/css" media="all" />
<link type="text/css" rel="stylesheet" href="<?php echo SITEURL;?>css/lightslider.css" />
<script src="<?php echo SITEURL;?>js/lightslider.js"></script>
<script>$(document).ready(function(){
	$( ".icon-tb" ).click(function() {
		var $container = $("html,body"); var $scrollTo = $('.product_v_list');
		$container.animate({scrollTop: $scrollTo.offset().top - $container.offset().top, scrollLeft: 0},300); });
	var a=$(".product_v_list").offset().top;$(window).scroll(function(){var b=$(window).scrollTop();if(b>=a){$(".product_v_list").css({position:"fixed",top:"0",})}else{$(".product_v_list").css({position:"static"})}});$("#content-slider").lightSlider({loop:true,keyPress:true});$("#image-gallery").lightSlider({gallery:true,item:1,thumbItem:9,slideMargin:0,speed:500,auto:false,loop:true,onSliderLoad:function(){$("#image-gallery").removeClass("cS-hidden")}})});</script>
<script>jQuery(document).ready(function(){jQuery(".commentlist").find("li").each(function(){if(jQuery(this).find("ul").size()>0){jQuery(this).addClass("has_ul")}});jQuery(".form-allowed-tags").width(jQuery("#commentform").width()-jQuery(".form-submit").width()-13);jQuery(".pf_output_container").each(function(){if(jQuery(this).html()==""){jQuery(this).parents(".blog_post_page").addClass("no_pf")}else{jQuery(this).parents(".blog_post_page").addClass("has_pf")}})});jQuery(window).resize(function(){jQuery(".form-allowed-tags").width(jQuery("#commentform").width()-jQuery(".form-submit").width()-13)});jQuery(document).ready(function(){var b=250;var a=300;jQuery(window).scroll(function(){if(jQuery(this).scrollTop()>b){jQuery(".back-to-top").fadeIn(a)}else{jQuery(".back-to-top").fadeOut(a)}});jQuery(".back-to-top").click(function(c){c.preventDefault();jQuery("html, body").animate({scrollTop:0},a);return false})});</script>
<link rel="stylesheet" type="text/css" href="<?php echo SITEURL;?>bootstrap_3_3_6/css/new_pro.css"/>
<style>
#size{width: 90%; height: 42px}
</style>

<div id="preloader" style="display: none;"><div id="status">&nbsp;</div></div>
<div class="product_v_list" style="display:none"></div>
<div id="new-pro-page" itemscope itemtype="http://schema.org/Product">
<div class="top-bg-4">
  
</div>
<div class="main-body-arm-5">
  <div class="container">
    <div class="top-sec-arm-5" id="info">
      <div class="row">
      <div class="product-details">
        <div class="col-md-7">
          <div class="top-drp-down">
            <ul class="drp-box">

            </ul>
          </div>

          <div class="item">
            <div class="clearfix" style="max-width:100%">
              <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
<?php 
	if(isset($pics) && !empty($pics)){
      	foreach ($pics as $sList){
	        $p = 'cdn/'.$sList['Library']['full_path'];
	        $th = new_show_image($p,84,60,100,'fc',null);
	        $main = new_show_image($p,800,530,100,'ff',null);
	        echo '<li data-thumb="'.$th.'"><img src="'.$main.'" itemprop="photo" alt="'.$sList['Library']['alt'].'" title="'.$sList['Library']['title'].'"/></li>';
       }}?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          
          <div id="add-cart-bx">
            <h2><?php echo $data['Product']['title'];?></h2>
<div class="costing-num"><h2 id="price">$<?php echo num_2($data['Product']['price']);?></h2></div>
<div class="clearfix"> </div>
<div class="add-bx-sel">
<?php 
$sizes = [];
if( isset($data['Product']['sizes']) && !empty($data['Product']['sizes']) ){
    $size_list = json_decode($data['Product']['sizes'],true);
    if(!empty($size_list)){ foreach ($size_list as $k=>$v){ $sizes[$v] = $v; } }
}
if(!empty($sizes)){
?>
<div class="col-sm-4 no-pad"><?php echo $this->Form->input('size',['options'=>$sizes,'empty'=>'Select Size','class'=>'lable_txt','label'=>false]);?></div>
<div class="col-md-4 no-pad"> 
<div class="add-bx-snap"><div class="center"><div class="input-group"> <span class="input-group-btn">
<button type="button" class="btn btn-default btn-number snp-btn" disabled="disabled" data-type="minus" data-field="cat_back[1]"> <span class="glyphicon glyphicon-minus"></span> </button></span>
<input type="text" name="cat_back[1]" class="form-control input-number" value="1" min="1" max="<?php echo $data['Product']['quantity'];?>" id="ext_pro_q" readonly="readonly">
<span class="input-group-btn"><button type="button" class="btn btn-default btn-number snp-btn" data-type="plus" data-field="cat_back[1]"> <span class="glyphicon glyphicon-plus"></span> </button></span> </div></div></div>
</div>

<div class="col-md-4" id="adtcbtn">
<div class="input-bx">
<?php if($data['Product']['quantity'] > 0){?> <input value="add to cart" class="btn btn-success ful-wd-btn" onclick="add_pro_size(<?php echo $data['Product']['id'];?>);" type="button">
<?php }else{?><input value="out of stock" class="hasIcon shortcode_button btn btn_type4 w100" type="button"><?php }?> </div>
</div>
<?php }else{?>
<div class="col-md-6 no-pad"> 
<div class="add-bx-snap"><div class="center"><div class="input-group"> <span class="input-group-btn">
<button type="button" class="btn btn-default btn-number snp-btn" disabled="disabled" data-type="minus" data-field="cat_back[1]"> <span class="glyphicon glyphicon-minus"></span> </button></span>
<input type="text" name="cat_back[1]" class="form-control input-number" value="1" min="1" max="<?php echo $data['Product']['quantity'];?>" id="ext_pro_q" readonly="readonly">
<span class="input-group-btn"><button type="button" class="btn btn-default btn-number snp-btn" data-type="plus" data-field="cat_back[1]"> <span class="glyphicon glyphicon-plus"></span> </button></span> </div></div></div>
</div>

<div class="col-md-6" id="adtcbtn">
<div class="input-bx">
<?php if($data['Product']['quantity'] > 0){?> <input value="add to cart" class="btn btn-success ful-wd-btn" onclick="add_pro(<?php echo $data['Product']['id'];?>);" type="button">
<?php }else{?><input value="out of stock" class="hasIcon shortcode_button btn btn_type4 w100" type="button"><?php }?> </div>
</div>
<?php }?>


<div class="clearfix"> </div>
<div id="cart_err" class="text-left"></div>

</div>
<div class="clearfix"> </div>
<div class="card-btn" id="extra_pmt"> 
<ul>
	<li><span>Shipping:</span> 3-5 days deliver to US and Europe. Other countries will take 5-7 days.</li>
    <li><span>Shipment:</span><img src="<?php echo SITEURL;?>img/shipment-card.jpg"  alt=""/></li>
    <li><span>Delivery: </span><a> Varies</a></li>
    <li><span>Payments: </span><img class="pmt_opt" alt="" src="<?php echo SITEURL;?>img/paypal-ac.jpg" /></li>

</ul>
</div>
</div>
</div>
</div>
<div class="clearfix"> </div>
<div class="seprater"></div>
<?php if(!empty($data['Product']['description'])){?>           
        <div class="col-md-12">
          <div class="describe-bx"><h2>Description</h2></div>

          <div class="content_1" itemprop="description">
            <p> <?php echo nl2br($data['Product']['description']);?></p>
          </div>
        </div>
<?php }?>

        
      </div>
    </div>
  </div>

</div>
</div>
<script>

function add_pro(id){
	if( id != ''){
		var q = $('#ext_pro_q').val();
		$('#preloader').show();
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL;?>pages/add_to_cart',
			data:'pid='+id+'&q='+q+'&get=product',
			success: function(data) { $("#_my_cart").html(data); setTimeout(function(){ $('#preloader').hide(); }, 200); },
			error: function(comment) { $("#_my_cart").html(data);  setTimeout(function(){ $('#preloader').hide(); }, 500);  }}); 
	}
}


function add_pro_size(id){
	if( id != ''){
		$("#cart_err").html('');
		var q = $('#ext_pro_q').val();
		var size = $('#size').val();

		if( size == '' ){ $("#cart_err").html('<div class="alert alert-danger">Please select size.</div>'); }
		else{
			$('#preloader').show();
			$.ajax({type: 'POST',
				url: '<?php echo SITEURL;?>pages/add_to_cart',
				data:'pid='+id+'&q='+q+'&size='+size+'&get=product',
				success: function(data) { $("#_my_cart").html(data); setTimeout(function(){ $('#preloader').hide(); }, 200); },
				error: function(comment) { $("#_my_cart").html(data);  setTimeout(function(){ $('#preloader').hide(); }, 500);  }});
			}
	}
}


$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                var nv = currentVal - 1;
                input.val(nv).change();
                
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
            	var nv = currentVal + 1;
                input.val(nv).change();
                
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
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
	</script>