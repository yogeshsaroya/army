<style type="text/css">
@font-face{font-family:'UnicaOne-Regular';src:url(<?php echo SITEURL;?>fonts/UnicaOne-Regular.ttf)}
@font-face{font-family:'Karla-Regular';src:url(<?php echo SITEURL;?>fonts/Karla-Regular.ttf)}


#myCarousel ol li:before { content: '';}

.white_text p{color:#fff}
.pd_10{padding:20px}
.main_d{background-color:#fff}
#new_tuning table,#new_tuning td,#new_tuning th{border:none!important}
.tuningconfig{font-size:.95em;padding:1px 10px 0;border-bottom-width:0;border-bottom-style:solid;border-bottom-color:#ececec;text-align:left;display:block;background-color:#8d8d8d}
.row.product-detail-2{padding:5% 0 0}
.product-detail-2 .vendor-feedback{color:#A31C49;font-weight:700}
.product-detail-2 .vendor-logo img{width:100px;height:100px}
.product-detail-2 .vendor-logo{margin:13px 0}
.product-detail-2 .product-price{font-size:18px}
.product-detail-2 .product-price span{font-weight:400}
.product-detail-2 .btn-success{background:#009f00;border:1px solid #009f00;padding:15px;font-size:16px;width:100%}
.product-detail-2 .carousel-inner{width:100%;max-height:300px!important}
.product-detail-2 .product-descriptions{word-wrap:break-word}
.col-lg-6.col-md-6.col-sm-6.col-xs-12{text-align:left}
h1.product_title{font-size:21px;margin:10px 0}
.col-lg-6.text-left.product-price_div{padding:0}
#tuning_box_page .load_more_works{padding:50px}
#pro_data{font-family:sans-serif;text-align:center;margin:30px -15px;padding:0}
#pro_data h3{font-size:20px;text-transform:uppercase;font-weight:700;letter-spacing:0;margin:0;padding:0 0 5px;color:#000}
#pro_data h4{font-size:30px;font-weight:700;letter-spacing:0;margin:0;padding:0 0 10px;text-transform:initial}
#pro_data .red h3,#pro_data .red h4{color:red}
#pro_data .col-sm-6{margin-bottom:15px}
@media (max-width:992px) {
#pro_data h3{font-size:16px}
#pro_data h4{font-size:22px}
}
@media (max-width:480px) {
#pro_data h3{font-size:12px}
#pro_data h4{font-size:28px}
}
.product-detail-2 h3{color:inherit!important;font-weight:500!important}
#tuning_box_page .row{width:auto!important}
#prd-details h1{font-family:'UnicaOne-Regular';font-size:28px;color:#000;font-weight:500;letter-spacing:7px;text-transform:uppercase;font-size:1.875em;line-height:40px;margin-bottom:12px}
#prd-details h3{font-family:'Karla-Regular';font-size:1.125em;letter-spacing:1.2px;text-transform:uppercase;color:#2e2e2e}
@media (max-width:900px){
#main_sec{ color: #000!important; }

}
</style>
<div id="preloader" style="display: none"> <div id="status">&nbsp;</div> </div>
<div class="fullscreen_block_" id="tuning_box_page" style="min-height: 400px;">
  <div class="tuning-box">
    <div class="clearfix"></div>
    <div class="col-md-12 main_d no-pad">
      <div class="fadein">
        <div id="show_info" style="min-height: 268px;">
<div class="container">
<?php if(!empty($data['Product'])){
	$img = json_decode( $data['Product']['images'],true );
	$pic = 'no_image.png';
	
	?>
	<div class="row product-detail-2" id="prd-details">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="wrapper">
                <div class="row">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
        			<ol class="carousel-indicators">
        			<?php if(!empty($img)){
        				$n=0; foreach ($img as $k=>$v){ echo '<li data-target="#myCarousel" data-slide-to="'.$n.'" class="active"></li>'; $n++; } }?>    				    
    				    
    				</ol>
    				<div class="carousel-inner">
    				<?php if(!empty($img)){
        				$n=0; foreach ($img as $k=>$v){ 
        					$main = show_image('cdn/cdnimg',$v,530,300,80,'cf',null);
        					$active = '';
        					if($n == 0){ $active = 'active';}
        					echo '<div class="item '.$active.'"><img src="'.$main.'" alt="First slide"></div>'; $n++; } }?>
    				
    					
    				</div>
    				<?php if( count($img) > 1){?>
    				<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> 
    				<a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    				<?php }?>
    		    </div>
                </div>
                <div class="row">
                    <h1 class="product_title"><?php echo $data['Product']['title'];?></h1>
                </div>
                <div class="row">
                    
                    <div class="col-lg-12 text-right">
                        <button type="button" class="btn btn-lg btn-success btn-lg" id="army_cont">Inquiry</button>
                    </div>
                </div>
                <div class="clearfix pd_10"></div>
                <?php if(!empty($data['Product']['youtube'])){ $vList = explode(',',$data['Product']['youtube']);
                if(!empty($vList)){
                	foreach ($vList as $k=>$v){ ?>
                	<iframe width="100%" height="350" src="https://www.youtube-nocookie.com/embed/<?php echo $v;?>?rel=0&amp;controls=1&amp;showinfo=0&iv_load_policy=3&autoplay=0" frameborder="0" allowfullscreen></iframe>
                	<div class="clearfix pd_10"></div>	
                	<?php } } }?>
    		   <?php 
    		   if(!empty($data['Product']['more_photo'])){
    		   	$parr = json_decode($data['Product']['more_photo'],true);
    		   	foreach ($parr as $pk=>$pv){
    		   		$main = show_image('cdn/cdnimg',$pv,530,300,80,'ff',null);
    		   		
    		   		echo '<div class="item"><img src="'.$main.'" alt=""></div><div class="clearfix pd_10"></div>';
    		   	}}?> 
    		    
                
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="wrapper">
            <?php echo $data['Product']['description'];?>
                
            </div>
        </div>
	</div>
<?php }else{?>
<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list"><a href="javascript:void(0)" class="load_more_works"><i class="icon-arrow-down1"></i>Product not found.</a></div></div>
<?php }?>
</div>
   	
          
		  <div class="clearfix pd_10"></div>
        </div>
      </div> 
    </div>
    <div class="clearfix"></div>
  </div>
  <br>
</div>

<script> 
		jQuery(document).ready(function(){
			"use strict";
			$( "#brand" ).change(function() {
				$("#app_error").html('');
				var v = $.trim(this.value); 
				if(v != ""){
					$('#preloader').show();
				$.ajax({type: 'POST',
					url: 'get_product.php',
					data:'id='+v+'&type=brand&get=product',
					success: function(data) { $("#app_error").html(data); setTimeout(function(){ $('#preloader').hide(); }, 500); },
					error: function(comment) { $("#app_error").html(data);  setTimeout(function(){ $('#preloader').hide(); }, 500);  }}); }
				});

			$( "#model" ).change(function() {
				$("#app_error").html('');
				var v = $.trim(this.value); 
				if(v != ""){ $('#preloader').show();
				$.ajax({type: 'POST',
					url: 'get_product.php',
					data:'id='+v+'&type=model&get=product',
					success: function(data) { $("#app_error").html(data); setTimeout(function(){ $('#preloader').hide(); }, 500); },
					error: function(comment) { $("#app_error").html(data);  setTimeout(function(){ $('#preloader').hide(); }, 500);  }}); }
				});

			$( "#motor" ).change(function() {
				$("#app_error").html('');
				var v = $.trim(this.value); 
				if(v != ""){ $('#preloader').show();
				$.ajax({type: 'POST',
					url: 'get_product.php',
					data:'id='+v+'&type=motor&get=product',
					success: function(data) { $("#app_error").html(data); setTimeout(function(){ $('#preloader').hide(); }, 500); },
					error: function(comment) { $("#app_error").html(data);  setTimeout(function(){ $('#preloader').hide(); }, 500);  }}); }
				});
			

					
window['btnReset'] = function() { $("#get_info").prop("disabled",false); $("#get_info").val('TUNE IT');};
			
			jQuery('.commentlist').find('li').each(function(){
				if (jQuery(this).find('ul').size() > 0) {
					jQuery(this).addClass('has_ul');
				}
			});
			jQuery('.form-allowed-tags').width(jQuery('#commentform').width() - jQuery('.form-submit').width() - 13);
			
			jQuery('.pf_output_container').each(function(){
				if (jQuery(this).html() == '') {
					jQuery(this).parents('.blog_post_page').addClass('no_pf');
				} else {
					jQuery(this).parents('.blog_post_page').addClass('has_pf');
				}
			});			
						
		});
		jQuery(window).resize(function(){
			"use strict";
			jQuery('.form-allowed-tags').width(jQuery('#commentform').width() - jQuery('.form-submit').width() - 13);
		});

 
jQuery(document).ready(function() {
 
var offset = 250;
 
var duration = 300;
 
jQuery(window).scroll(function() {
 
if (jQuery(this).scrollTop() > offset) {
 
jQuery('.back-to-top').fadeIn(duration);
 
} else {
 
jQuery('.back-to-top').fadeOut(duration);
 
}
 
});
 

 
jQuery('.back-to-top').click(function(event) {
 
event.preventDefault();
 
jQuery('html, body').animate({scrollTop: 0}, duration);
 
return false;
 
})
 
});
</script> 
