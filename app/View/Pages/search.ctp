<?php echo $this->element('pro_script');?>
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
@media (min-width: 768px) and (max-width: 991px) {
.product-add-cart-sec .col-md-3{float:left;max-width:33%!important}
.product-exhuat .col-md-6{width:50%!important;float:left!important}
}
@media (max-width: 900px) {
#main_sec .product-exhuat-sec{display:block!important}
}
@media (max-width: 991px) {
.add-cart-price .col-md-6{float:left!important;width:50%!important}
.product-add-cart-grid h3{margin:0 auto}
}

.grid-right-sec.abtpro {
    margin-top: 6px;
}
.grid-right-sec.abtpro span {
    font-size: 13px;
}
#engine-quality { text-align:left;}
#engine-quality li {
    display: inline-block;
    position: relative;
    padding: 0px;
}
#engine-quality li a{
    color: #222;
    font-family: Roboto;
    font-size: 15px;
    margin-right: 17px;
    text-transform: uppercase;
	    padding-left: 25px;
		vertical-align:middle;
}
#engine-quality .engine-steel::before {
    background-color: #00a2e8;
   
}
#engine-quality li:before {content: "";
    height:20px !important;
    left: 0px;
    position: absolute;
    width: 20px !important;
	top:0;}
#engine-quality .engine-titanium::before {
    background-color: #ff3333;
    
}

@media (max-width:345px) {#engine-quality li a {
    color: #222 !important;
    font-size: 14px;
    margin-right: 12px;
    padding-left: 25px;    }
	#engine-quality li { margin-bottom: 5px;}
	
}
</style>
	<div id="preloader" style="display: none;"><div id="status">&nbsp;</div></div>
	<div class="fullscreen_block  product-exhuat-sec loaded"
		id="tuning_box_page ">
		<div class="product-exhuat">
		<div id="tabs" class="htabs">
  <ul class="etabs"> <li class="tab"> <a href="javascript:void(0);"  class="selected">Search result</a> </li> </ul>
 </div>
			

		</div>
		<div class="clearfix"></div>
		<div id="app_error"></div>
		<div class="product-add-cart-sec" id="get_data" >
<?php 
/*
 * $cat_back_ids = explode(',', $data['ItemDetail']['cat_back_ids']);
				$catalytic_ids = explode(',', $data['ItemDetail']['catalytic_ids']);
				$tuning_box_ids = explode(',', $data['ItemDetail']['tuning_box_ids']);
					
					
				$cat_back = $this->Product->find('all',array('conditions'=>array('Product.id'=>$cat_back_ids,'Product.status'=>1)));
				$catalytic = $this->Product->find('all',array('conditions'=>array('Product.id'=>$catalytic_ids,'Product.status'=>1)));
				$tuning_box = $this->Product->find('all',array('conditions'=>array('Product.id'=>$tuning_box_ids,'Product.status'=>1)));*/

if(isset($data) && !empty($data)){
	foreach ($data as $list){

		$cat_back_ids = explode(',', $list['ItemDetail']['cat_back_ids']);
		$catalytic_ids = explode(',', $list['ItemDetail']['catalytic_ids']);
		$r = array_merge($cat_back_ids,$catalytic_ids);
		
		$href = 'javascript:void(0);';
		if(isset($list['ItemDetail']['url']) && !empty($list['ItemDetail']['url'])){ $href = SITEURL."product/".$list['ItemDetail']['url']; }
		$get_pro = $this->Lab->getProd($r);
		
		
		if(!empty($get_pro)){
		foreach ($get_pro as $aList){
			
			$imgg = new_show_image('cdn/no_image_available.jpg',270,180,100,'ff',null);
			if(!empty($aList['Library']['full_path'])){ $imgg = new_show_image('cdn/'.$aList['Library']['full_path'],270,180,100,'ff',null); }
			
			$mat_type = null;
			
			
			if(isset($aList['Product']['material'])){
				if( $aList['Product']['material'] == 'stainless steel'){ $mat_type = '<div class="grid-right-sec abtpro stainless_steel"><span>Stainless steel</span></div>'; }
				elseif( $aList['Product']['material'] == 'titanium'){ $mat_type = '<div class="grid-right-sec abtpro titanium"><span>Titanium</span></div>'; }
			}
			
						
			if($aList['Product']['quantity'] > 0){ $btn = '<input value="add to cart" class="btn btn-success ful-wd-btn" onclick="add_pro('.$aList['Product']['id'].')" type="button">';}
			else{ $btn = '<input value="Out of Stock" class="hasIcon shortcode_button btn btn_type4 w100" type="button">'; }
			$abc_name = $aList['Model']['name']."/".$aList['Motor']['name'];
			$ttt1 = str_replace("'","\'",$abc_name);
			echo $list= '<div class="col-md-3"><div class="product-add-cart-grid" id="pic_'.$aList['Product']['id'].'"> <a href="'.$href.'" target="_blank" title=""> <img src="'.$imgg.'" title="'.$aList['Library']['title'].'" alt="'.$aList['Library']['alt'].'"><h3>'.$ttt1.'</h3><p>'.$aList['Product']['title'].'</p></a><div class="add-cart-price"><div class="col-md-6 no-pad"><div class="grid-left-sec"><span>$'.num_2($aList['Product']['price']).'</span></div></div><div class="col-md-6 no-pad"><div class="grid-right-sec abtpro"><span>'.$aList['Product']['part'].'</span></div>'.$mat_type.'</div></div><div class="clearfix"></div><div class="add-cart-btn">'.$btn.'</div></div></div>';
			
			
			
}
		}} }else{?>
	
	<div class="row">
                                        <div class="span12 module_number_16 module_cont pb50 module_promo_text">                                        	
                                            <div class="shortcode_promoblock  no_button_text  no_button_link ">
                                                <div class="promoblock_wrapper">
                                                    <div class="promo_text_block">
                                                        <div class="promo_text_block_wrapper">
                                                            <h1>Your search did not match any product.</h1>
                                                            <span></span>
                                                        </div>
                                                    </div>                                                        
                                                </div>
                                            </div>
                                            <div class="clear"></div>   
                                        </div><!-- .module_cont -->
                                    </div>
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
			success: function(data) { $("#_my_cart").html(data); setTimeout(function(){ $('#preloader').hide(); }, 200); 

			<?php if(!isset($IsMobile)){ ?>
			var currentImg = $('#pic_'+id).find('a img');
            var cart = $('#cart'); 
            var imgclone = currentImg.clone().offset({ top:currentImg.offset().top, left:currentImg.offset().left })
            .addClass('imgfly').css({'opacity':'0.9', 'position':'absolute', 'height':'200px', 'width':'200px', 'z-index':'1000'}).appendTo($('body'))
            .animate({'top':cart.offset().top - 110,'left':cart.offset().left + 10,'width':55,'height':55}, 1000, 'easeInOutExpo'); 
        	imgclone.animate({'width':0, 'height':0});
        	<?php }?>

			},
			error: function(comment) { $("#_my_cart").html(data);  setTimeout(function(){ $('#preloader').hide(); }, 500);  }}); 
		
	}
}
jQuery(document).ready(function(){
	"use strict";

	function cls(){
		
		$('#car_pic').html('');
		$('#get_data').html('');
		}

	$( "#brand" ).change(function() {
		$("#app_error").html('');
		var v = $.trim(this.value); 
		$('#preloader').show();
		cls();
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL;?>pages/get_exhaust',
			data:'id='+v+'&type=brand&get=product',
			success: function(data) { $("#app_error").html(data); setTimeout(function(){ $('#preloader').hide(); }, 500); },
			error: function(comment) { $("#app_error").html(data);  setTimeout(function(){ $('#preloader').hide(); }, 500);  }}); 
		});

	$( "#model" ).change(function() {
		$("#app_error").html(''); cls();
		var v = $.trim(this.value); 
		var brand = $("#brand").val(); 
		$('#preloader').show();
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL;?>pages/get_exhaust',
			data:'id='+v+'&brand='+brand+'&type=model&get=product',
			success: function(data) { $("#app_error").html(data); setTimeout(function(){ $('#preloader').hide(); }, 500); },
			error: function(comment) { $("#app_error").html(data);  setTimeout(function(){ $('#preloader').hide(); }, 500);  }});
		});

	$( "#motor" ).change(function() {
		$("#app_error").html(''); cls();
		var v = $.trim(this.value);
		var brand = $("#brand").val();
		var model = $("#model").val();  
		if(v != ""){ $('#preloader').show();
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL;?>pages/get_exhaust',
			data:'id='+v+'&brand='+brand+'&model='+model+'&type=motor&get=product',
			success: function(data) { $("#app_error").html(data); setTimeout(function(){ $('#preloader').hide(); }, 500); },
			error: function(comment) { $("#app_error").html(data);  setTimeout(function(){ $('#preloader').hide(); }, 500);  }}); }
		});
});	
	

</script>
