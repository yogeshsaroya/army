<?php echo $this->Html->css(array('/bootstrap_3_3_6/css/contact_form'));?>
<style type="text/css">
.white_text p{color:#fff}
.pd_10{padding:20px}
.main_d{background-color:#fff}
#new_tuning table,#new_tuning td,#new_tuning th{border:none!important}
.tuningconfig{font-size:.95em;padding:1px 10px 0;border-bottom-width:0;border-bottom-style:solid;border-bottom-color:#ececec;text-align:left;display:block;margin:auto;max-width:1250px}
span.main_head{font-size:16px;font-weight:700}
select{width:200px!important}
.lable_txt{float:left;margin:0 10px 10px 0}
span.lable_txt{line-height:40px;font-size:14px;text-transform:capitalize}
.progress.active .progress-bar{-webkit-transition:none!important;transition:none!important}
.tuning-box{margin:auto;max-width:1250px}
.tuning-box-content{background-color:#efefef;overflow:hidden;padding:10px 10px 15px}
table,th,td{border:none!important}
.col-md-12.main_d.no-pad{margin:0;padding:0}
th.right{width:250px}
table{margin:10px 0}
#details_tab{width:80%;margin:6% auto 5%;padding:30px 0}
.center{text-align:center}
.left_text{text-align:left}
th{font-size:15px;font-weight:600}
td{font-size:16px}
.progress{height:30px!important}
.progress-bar{font-size:18px!important;line-height:29px!important}
.tuning-box{margin:auto;max-width:100%}
.heading_main{border-bottom:4px #fff solid;padding:0 0 10px;width:80%;margin:auto}
#show_info{min-height:268px;max-width:1250px;margin:auto}
#show_info th,#show_info td{border-left:1px #fff solid!important;border-right:thin solid!important;border-top:1px #fff solid!important;border-bottom:thin solid!important}
#show_info th:last-child,#show_info td:last-child{border-right:1px #fff solid!important}
.info_box{background-color:#fff;padding-top:30px}
.progress-bar-danger{background-color:#696969!important}
.progress-bar-success{background-color:red!important}
#show_info th,#show_info tr,#show_info td{color:#fff}
#show_info .heading_main{color:#fff}
.main_d{background-color:transparent}
.info_box{background-color:transparent!important}
#preloader{position:fixed;top:0;left:0;right:0;bottom:0;z-index:9999999;background:rgba(255,255,255,0.8)}
#status{width:128px;height:128px;position:absolute;left:50%;top:50%;background-image:url(img/preload.gif);background-repeat:no-repeat;background-position:center;margin:-7.5px 0 0 -80px}
#tuning_box_page .fw_featured_image{height:auto;width:100%}
#tuning_box_page .grid-port-cont{padding-right:10px;padding-left:10px}
#tuning_box_page .grid-port-cont h6{text-align:justify}
#tuning_box_page .grid-port-cont h6 a{font-weight:500;line-height:20px}
#tuning_box_page .grid-port-cont .price_pro a{font-weight:400}
#tuning_box_page .grid-port-cont .price_pro{text-align:center;font-size:12px}
i.hasIcon.shortcode_button.btn_small.btn_type1{font-weight:400}
#tuning_box_page .load_more_works{padding:50px}
#bg-clr-in{background:#F7F7F7}
#tuning_box_page .text-wrap{padding:20px 0}
#tuning_box_page .main_head{display:block!important;margin-bottom:15px}
#tuning_box_page .lable_txt{display:block!important;line-height:auto!important;width:100%}
#tuning_box_page select{width:100%!important;-webkit-appearance:none;-moz-appearance:none;appearance:none;background-image:url(img/down-arow_st.png);background-color:#fff;background-repeat:no-repeat;background-position:97% center;box-shadow:0 0 5px #e6dede;padding:0 15px!important;box-sizing:border-box}
.left-flt{width:50%;float:left;box-sizing:border-box;padding:0 10px}
.col-sm-12.no-pad{padding:0 10px!important}
#tuning_box_page .lable_txt{margin:0 10px 10px 0;background-color:transparent;color:#000!important;font-size:16px;padding:0}
#tuning_box_page .grid-port-cont h6 a{font-weight:500;line-height:20px;display:block;text-align:center}
#tuning_box_page .fullscreen_block .fw_preview_wrapper{padding:30px 9px;margin:0;text-align:left}
#tuning_box_page .fullscreen_block .fw_preview_wrapper:hover .gallery_fadder,.grid-gallery-item .gallery_fadder,.fw_preview_wrapper{box-shadow:none}
#tuning_box_page .fullscreen_block .fw_preview_wrapper{background:#fff}
#tuning_box_page .fullscreen_block .blogpost_preview_fw{width:20%;display:inline-block;transition:all 300ms ease;-webkit-transition:all 300ms ease;-ms-transition:all 300ms ease;-o-transition:all 300ms ease;border:none}
#tuning_box_page .fullscreen_block .fw_preview_wrapper{position:relative;min-height:300px}
#tuning_box_page .gallery_item_wrapper{position:static;margin-top:40px}
#tuning_box_page .shortcode_button.btn_type1{background:#2E9D5B;color:#fff;border-radius:0;padding:8px 25px;font-style:normal;letter-spacing:.5px;margin-top:20px;transition:all 500ms ease;-webkit-transition:all 500ms ease;-ms-transition:all 500ms ease;-o-transition:all 500ms ease}
#tuning_box_page .fullscreen_block .fw_preview_wrapper:hover .shortcode_button.btn_type1{margin-top:0}
#tuning_box_page .gallery_item_wrapper span.gallery_ico,#tuning_box_page .grid-gallery-item span.gallery_ico{transform:scale(1,1);-webkit-transform:scale(1,1);-moz-transform:scale(1,1);-ms-transform:scale(1,1);-o-transform:scale(1,1)}
#tuning_box_page .shortcode_button.btn_type1:hover{background:#00D200}
#tuning_box_page .grid-port-cont{padding-right:10px;padding-left:10px;position:absolute!important;width:100%;box-sizing:border-box;left:0;bottom:10px}
@media (max-width:992px) {
#tuning_box_page .fullscreen_block .blogpost_preview_fw{width:25%}
}
@media (max-width:767px) {
.col-sm-5.col-md-5{margin-top:30px}
#tuning_box_page .fullscreen_block .blogpost_preview_fw{width:50%}
}
@media (max-width:480px) {
.col-sm-5.col-md-5{margin-top:30px}
#tuning_box_page .fullscreen_block .blogpost_preview_fw{width:100%}
}
.gallery_item_wrapper:hover .gallery_fadder,.grid-gallery-item:hover .gallery_fadder{background:rgba(0,0,0,0.06) none repeat scroll 0 0}

@media (max-width:900px){

#tuning_box_page .grid-port-cont h6 a { color: #000;}
#tuning_box_page .fullscreen_block .fw_preview_wrapper{border: 2px solid green}
}

</style>

<body id="bg-clr-in">
<div id="preloader" style="display: none"> <div id="status">&nbsp;</div> </div>
<div class="fullscreen_block_" id="tuning_box_page" style="min-height: 400px;">
  <div class="tuning-box">
    <div class="clearfix"></div>
    <div class="col-md-12 main_d no-pad">
      
      <div class="fadein">
        <div class="tuningconfig">
          <form id="frmTun">
           <div class="text-wrap">  
            <div class="col-sm-7 col-md-7">
               <h1 class="heads">ARMYTRIX</h1>
               <p>Armytrix is never one to stand still. Their motorsport arsenal is ever evolving, a catalogue of Titanium and Stainless Steel Valvetronic Exhausts, ECU Recalibration, Power Tuning Box, CEL Delete Module and Armytrix Mobile APP. Armytrix is committed to touch every spectrum of excellence, dedicated to bring the best enhancements to fulfill your driving needs and desires.</p>
            </div>
            
            <div class="col-sm-5 col-md-5">                         
                <span class="main_head">FILTER BY</span> 
                 <div class="left-flt">                                
                    <select class="lable_txt" id="brand" name="brand">
                    <option value="">Brand</option>
                    <?php if(isset($b) && !empty($b)){ foreach($b as $k=>$v){ echo '<option value="'.$k.'">'.$v.'</option>'; } }?> 
                    </select>
                </div>
                
                <div class="left-flt">                  
                
                    <select class="lable_txt" id="model" name="model">
                      <option value="">Model</option>
                    </select>
                  </div>
            <div class="clearfix"></div> 
            
            <div class="col-sm-12 no-pad">       
                 
                    <select class="lable_txt" id="motor" name="motor">
                      <option value="">Engine</option>
                    </select>
               </div>
 <div class="clearfix"></div>               
              </div>
 <div class="clearfix"></div>             
            </div>
          </form>
          
<div id="app_error"> </div>
        </div>

<div id="show_info">
<?php 
$info = null;
if(isset($product) && !empty($product)){
	foreach ($product as $list){
/*while($tun=$result->fetch_array()){ */
	$title  = substr($list['Product']['title'],0,100);
	$url  = SITEURL."collections/products/".$list['Product']['slug'].".html";
	$img = json_decode($list['Product']['images'],true);
	$pic = 'no_image.png';
	if(isset($img[0])){ $pic = $img[0]; }
	//$main = show_image('app/webroot/cdnimg',$pic,400,300,80,'ff',null);
	$main = show_image('cdn/cdnimg',$pic,400,400,100,'ff','user',null);
	$info.= '<div class="blogpost_preview_fw element stuff"><div class="fw_preview_wrapper"><div class="gallery_item_wrapper"><a href="'.$url.'" ><img src="'.$main.'" alt="" class="fw_featured_image" width="540"><div class="gallery_fadder"></div><span class="gallery_ico"><i class="hasIcon shortcode_button btn_small btn_type1">View</i></span></a></div><div class="grid-port-cont"><h6><a href="'.$url.'">'.$title.'</a></h6></div></div></div>';
	$main = null;
}
}
if(!empty($info)){ $str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list">'.$info.'</div></div>'; }
else{ $str = '<div class="fullscreen_block"><div class="fs_blog_module image-grid" id="list"><a href="javascript:void(0)" class="load_more_works"><i class="icon-arrow-down1"></i>Product not found.</a></div></div>'; }
echo $str;
?>
<div class="clearfix pd_10"></div>
<ul class="pagerblock">
<?php 

if(isset($paging['Product']['pageCount']) && !empty($paging['Product']['pageCount'])){
$p = $paging['Product']['count'] / 15;
$p = ceil($p);
for($i=1;$i<=$p;$i++){?>
<li><a href="javascript:void(0)" onClick="next(<?php echo $i;?>,0,0);" id="<?php echo $i;?>" class=""><?php echo $i;?></a></li>
<?php }}?>
</ul>		  
        </div>
      </div> 
    </div>
    <div class="clearfix"></div>
  </div>
  <br>
</div>

<script>
function next(page,type,brand_id){
if(page != ""){
	$('#preloader').show();
	$.ajax({type: 'POST',
		url: '<?php echo SITEURL;?>pages/get_product',
		data:'page='+page+'&type='+type+'&brand_id='+brand_id+'&pagination=yes',
		success: function(data) { $("#app_error").html(data); setTimeout(function(){ $('#preloader').hide(); }, 500); },
		error: function(comment) { $("#app_error").html(data);  setTimeout(function(){ $('#preloader').hide(); }, 500);  }});
}
	
}
		jQuery(document).ready(function(){
			"use strict";


			$( "#brand" ).change(function() {
				$("#app_error").html('');
				var v = $.trim(this.value); 
				$('#preloader').show();
				$.ajax({type: 'POST',
					url: '<?php echo SITEURL;?>pages/get_product',
					data:'id='+v+'&type=brand&get=product',
					success: function(data) { $("#app_error").html(data); setTimeout(function(){ $('#preloader').hide(); }, 500); },
					error: function(comment) { $("#app_error").html(data);  setTimeout(function(){ $('#preloader').hide(); }, 500);  }}); 
				});

			$( "#model" ).change(function() {
				$("#app_error").html('');
				var v = $.trim(this.value); 
				var brand = $("#brand").val(); 
				$('#preloader').show();
				$.ajax({type: 'POST',
					url: '<?php echo SITEURL;?>pages/get_product',
					data:'id='+v+'&brand='+brand+'&type=model&get=product',
					success: function(data) { $("#app_error").html(data); setTimeout(function(){ $('#preloader').hide(); }, 500); },
					error: function(comment) { $("#app_error").html(data);  setTimeout(function(){ $('#preloader').hide(); }, 500);  }});
				});

			$( "#motor" ).change(function() {
				$("#app_error").html('');
				var v = $.trim(this.value); 
				if(v != ""){ $('#preloader').show();
				$.ajax({type: 'POST',
					url: '<?php echo SITEURL;?>pages/get_product',
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

	</script> 
