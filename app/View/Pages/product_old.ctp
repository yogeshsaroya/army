
<link rel="stylesheet" href="<?php echo SITEURL;?>css/custom.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo SITEURL;?>css/new_custom-for-audi.css" type="text/css" media="all" />
<link type="text/css" rel="stylesheet" href="<?php echo SITEURL;?>css/lightslider.css" />
<script src="<?php echo SITEURL;?>js/lightslider.js"></script>
<script src="//use.fontawesome.com/294e29c753.js"></script>
<style>
.new-pro-drdwn {
    position: relative;
}

 .new-pro-drdwn button{
	 background-color: #c5c5c5;
border-radius: 0 !important;
color: #fff !important;
font-size: 13px !important;
padding: 11px 20px;
text-align: center;
text-transform: capitalize;
width: 100% !important;
text-overflow: ellipsis;
white-space: nowrap;
overflow: hidden;
border: 0;
} 

 .new-pro-drdwn button:hover {
	 background-color: #dedcdc !important;
color: #fff !important;
}

 .new-pro-drdwn ul{position: absolute;
top: 100%;
left: 0;
z-index: 1000;
display: none;
float: left;
min-width: 160px;
padding: 5px 0;
margin: 2px 0 0;
list-style: none;
font-size: 13px;
background-color: #fff;
border: 1px solid #ccc;
border: 1px solid rgba(0,0,0,.15);
z-index:555;
}

.add-bx-drop-dwn .new-pro-drdwn ul > li > a {
    padding: 8px 11px;
    text-align: left;
    white-space: initial !important;
	background:transparent;
	display:block;
	text-align:left;
}

.new-pro-drdwn ul > li > a:hover {
background: #66c184 !important;
color: #fff;
}

.new-pro-drdwn ul a h4 {
    display: inline-block;
    color: #fff;
    background: #333;
    padding: 3px 6px;
    margin: 0 0 5px;
}
 
</style>
<script>$(document).ready(function(){
	$( ".icon-tb" ).click(function() {
		var $container = $("html,body"); var $scrollTo = $('.product_v_list');
		$container.animate({scrollTop: $scrollTo.offset().top - $container.offset().top, scrollLeft: 0},300); });
	var a=$(".product_v_list").offset().top;$(window).scroll(function(){var b=$(window).scrollTop();if(b>=a){$(".product_v_list").css({position:"fixed",top:"0",})}else{$(".product_v_list").css({position:"static"})}});$("#content-slider").lightSlider({loop:true,keyPress:true});$("#image-gallery").lightSlider({gallery:true,item:1,thumbItem:9,slideMargin:0,speed:500,auto:false,loop:true,onSliderLoad:function(){$("#image-gallery").removeClass("cS-hidden")}})});</script>
<script>jQuery(document).ready(function(){jQuery(".commentlist").find("li").each(function(){if(jQuery(this).find("ul").size()>0){jQuery(this).addClass("has_ul")}});jQuery(".form-allowed-tags").width(jQuery("#commentform").width()-jQuery(".form-submit").width()-13);jQuery(".pf_output_container").each(function(){if(jQuery(this).html()==""){jQuery(this).parents(".blog_post_page").addClass("no_pf")}else{jQuery(this).parents(".blog_post_page").addClass("has_pf")}})});jQuery(window).resize(function(){jQuery(".form-allowed-tags").width(jQuery("#commentform").width()-jQuery(".form-submit").width()-13)});jQuery(document).ready(function(){var b=250;var a=300;jQuery(window).scroll(function(){if(jQuery(this).scrollTop()>b){jQuery(".back-to-top").fadeIn(a)}else{jQuery(".back-to-top").fadeOut(a)}});jQuery(".back-to-top").click(function(c){c.preventDefault();jQuery("html, body").animate({scrollTop:0},a);return false})});</script>
<link rel="stylesheet" type="text/css" href="<?php echo SITEURL;?>bootstrap_3_3_6/css/new_pro.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo SITEURL;?>bootstrap_3_3_6/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo SITEURL;?>bootstrap_3_3_6/slick-theme.css"/>
<script type="text/javascript" src="<?php echo SITEURL;?>bootstrap_3_3_6/slick.min.js"></script>
<script type="text/javascript" src="<?php echo SITEURL;?>bootstrap_3_3_6/jquery.mCustomScrollbar.concat.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo SITEURL;?>bootstrap_3_3_6/csss.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo SITEURL;?>bootstrap_3_3_6/owl.carousel.css"/>
<?php
$features = array('qTgNuldvfb4','0Bzfk6uBIsk','fbfzHlkosZs','ORNvS_xR17I','ISDVEVZTxT0','REpNLHilF8A');
$exhaust = explode(',', $data['ItemDetail']['videos']);?>
<div id="preloader" style="display: none;"><div id="status">&nbsp;</div></div>
<div class="product_v_list" style="display:none"></div>
<div id="new-pro-page" itemscope itemtype="http://schema.org/Product">
<div class="top-bg-4">
  <div class="container">
        <h1 class="head-arm-tx">Total Package. Total Performance<i>ADRENALINE ON DEMAND</i></h1>
  
  </div>
</div>
<div class="main-body-arm-5">
 <?php //include 'side_menu.php';?>
  <div class="container">
    <div class="top-sec-arm-5" id="info">
      <div class="row">
      <div class="product-details">
        <div class="col-md-7">
          <div class="top-drp-down">
            <ul class="drp-box">

            </ul>
          </div>
          <div class="line-bx-arm-5">
            <?php /*?><h3 class="mid-txt-arm-5" itemprop="name"><?php echo $data['ItemDetail']['name'];?></h3> <?php */?>
            <div class="line-arm"> <a> <span>Power</span> <i><span>+</span><?php echo $data['ItemDetail']['power'];?><small>HP</small></i> </a> 
            <a> <span>Torque</span> <i><span>+</span><?php echo $data['ItemDetail']['torque'];?><small>Nm</small></i> </a> 
            <a> <span>Weight</span> <i><span>-</span><?php echo $data['ItemDetail']['weight'];?><small>kg</small></i> </a> </div>
          </div>
          <div class="item">
            <div class="clearfix" style="max-width:100%">
              <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
<?php 
	if(isset($slider) && !empty($slider)){
      	foreach ($slider as $sList){
	        $p = 'cdn/'.$sList['Library']['folder']."/".$sList['Library']['file_name'];
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
            <h2><?php echo $data['ItemDetail']['name'];?></h2>
            
<p>Selected:</p>
<div id="selc"></div>

<div class="costing-num"><h2 id="price">$0.00</h2></div>
<div class="clearfix"> </div>

<input type="hidden" id="cat_id" value="">
<input type="hidden" id="cat_id_q" value="1">
<input type="hidden" id="cat_id_p" value="0">

<input type="hidden" id="ecu_id" value="">
<input type="hidden" id="ecu_id_q" value="1">
<input type="hidden" id="ecu_id_p" value="0">

<input type="hidden" id="tuning_id" value="">
<input type="hidden" id="tuning_id_q" value="1">
<input type="hidden" id="tuning_id_p" value="0">

<input type="hidden" id="total_amout" value="0">

<script type="text/javascript">
function addcart(){

	var cat_id = $('#cat_id').val();
	var cat_id_q = $('#cat_id_q').val();
	var ecu_id = $('#ecu_id').val();
	var ecu_id_q = $('#ecu_id_q').val();
	var tuning_id = $('#tuning_id').val();
	var tuning_id_q = $('#tuning_id_q').val();

	
	if( cat_id != '' || ecu_id != '' || tuning_id != '' ){
		
		var q = $('#ext_pro_q').val();
		$('#preloader').show();
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL;?>pages/add_to_cart',
			data:'cat_id='+cat_id+'&cat_id_q='+cat_id_q+'&ecu_id='+ecu_id+'&ecu_id_q='+ecu_id_q+'&tuning_id='+tuning_id+'&tuning_id_q='+tuning_id_q+'&get=exhaust',
			success: function(data) { $("#_my_cart").html(data); setTimeout(function(){ $('#preloader').hide(); }, 500); },
			error: function(comment) { $("#_my_cart").html(data);  setTimeout(function(){ $('#preloader').hide(); }, 500);  }}); 
	}else{
		$('#e_err').html('<p class="text_red">Please Select A Product</p>');
		}
}

$(document).ready(function(){
	$("#p_1").click(function() {
		if( $('#cat_back_ul').css('display') == 'none' ){ $('#cat_back_ul').show(); } else{  $('#cat_back_ul').hide(); } });

	$("#p_2").click(function() {
		if( $('#ecu_ul').css('display') == 'none' ){ $('#ecu_ul').show(); } else{  $('#ecu_ul').hide(); } });

	$("#p_3").click(function() {
		if( $('#tuning_ul').css('display') == 'none' ){ $('#tuning_ul').show(); } else{  $('#tuning_ul').hide(); } });
	

function pimg(){
	$('.image-popup-vertical-fit').magnificPopup({type: 'image',closeOnContentClick: true,mainClass: 'mfp-img-mobile',image: {verticalFit: true}});
}	


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
		  var txt = $("#"+this.id+"").html();
		  var txt = $.strRemove("div", txt);
		  var cat_b_q = $('#cat_b_q').val();
		  

		  if(txt == 'No'){
			  $('.selc_p_1').remove(); 
			  $('#p_1').html('<?php if( $data['ItemDetail']['id'] == 77 ){ echo "--- Full Set Valvetronic Exhaust Selections ---";}else{ echo "--- Cat-Back Valvetronic Mufflers Selection ---";}?>'); 
			  $('#cat_id').val(''); $('#cat_id_q').val(''); $('#cat_id_p').val(0);
			  $('#cat_pic_id').html(''); 
			  $('#p_1').removeClass('drp-btn-clr');
			  $('.selc_p_1').remove();
			  getset();

			  }
		  else{ 
			  if(qut > 0){ 
				  $('.selc_p_1').remove();
				  $('#p_1').html(txt); $('#cat_id').val(pid); $('#cat_id_q').val(cat_b_q); $('#cat_id_p').val(p_amt);
				  $('#cat_pic_id').html('<a href="'+full_img+'" class="image-popup-vertical-fit"><img alt="" src="'+data_img+'"></a>');
				  $('#p_1').addClass('drp-btn-clr');
				  $('#selc').append('<p class="selc_p_1">'+txt+'</p>');
				  getset();
			  } else{
				 // $('#cat_pic_id').html('<p class="text_red">Sorry, this product is currently out of stock</p>');
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
	  var txt = $("#"+this.id+"").html();
	  var txt = $.strRemove("div", txt);
	  var cat_b_q = $('#ecu_b_q').val();


	  if(txt == 'No'){ 
		  $('.selc_p_2').remove();
		  $('#p_2').html('--- Catalytic Converter Replacement Selections ---'); 
		  $('#ecu_id').val(''); $('#ecu_id_q').val(''); $('#ecu_id_p').val(0);
		  $('#ecu_pic_id').html('');
		  $('#p_2').removeClass('drp-btn-clr');
		  getset(); 
		  }
	  else{
		  if(qut > 0){ 
			  $('.selc_p_2').remove();  
			  $('#p_2').html(txt); $('#ecu_id').val(pid); $('#ecu_id_q').val(cat_b_q); $('#ecu_id_p').val(p_amt);
			  $('#ecu_pic_id').html('<a href="'+full_img+'" class="image-popup-vertical-fit"><img alt="" src="'+data_img+'"></a>'); 
			  $('#p_2').addClass('drp-btn-clr');
			  $('#selc').append('<p class="selc_p_2">'+txt+'</p>');
			  getset();
		  }else{
			 // $('#ecu_pic_id').html('<p class="text_red">Sorry, this product is currently out of stock</p>');
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
	  var txt = $("#"+this.id+"").html();
	  var txt = $.strRemove("div", txt);
	  var cat_b_q = $('#tuning_b_q').val();


	  if(txt == 'No'){
		  $('.selc_p_3').remove(); 
		  $('#p_3').html('--- Catalytic Converter Replacement Selections ---'); 
		  $('#tuning_id').val(''); $('#tuning_id_q').val(''); $('#tuning_id_p').val(0);
		  $('#tuning_pic_id').html(''); 
		  $('#p_3').removeClass('drp-btn-clr');
		  getset();
		  }
	  else{
		  if(qut > 0){  
			  $('.selc_p_3').remove();
			  $('#p_3').html(txt); $('#tuning_id').val(pid); $('#tuning_id_q').val(cat_b_q); $('#tuning_id_p').val(p_amt);
			  $('#tuning_pic_id').html('<a href="'+full_img+'" class="image-popup-vertical-fit"><img alt="" src="'+data_img+'"></a>');
			  $('#p_3').addClass('drp-btn-clr');
			  $('#selc').append('<p class="selc_p_3">'+txt+'</p>');
			  getset();
		  }else{
			//  $('#ecu_pic_id').html('<p class="text_red">Sorry, this product is currently out of stock</p>');
		  } 
	  }
	 
	  $('#tuning_ul').hide(); 
});

function getset(){
	var p1 = parseInt($('#cat_id_p').val());
	  var p2 = parseInt($('#ecu_id_p').val());
	  var p3 = parseInt($('#tuning_id_p').val());
	  var n = p1+p2+p3;
	  $('#price').html("$"+n.toFixed(2));
	  $('#total_amout').val(n);
	  pimg();
}

});	
</script>

<?php if(isset($cat_back) && !empty($cat_back)){?>            
<div class="add-bx-sel">
<div class="col-md-9 no-pad"> 
<div class="add-bx-drop-dwn">
                
<div class="new-pro-drdwn">
<button class="" type="button" id="p_1">
<?php if( $data['ItemDetail']['id'] == 77 ){ echo "--- Full Set Valvetronic Exhaust Selections ---";}else{ echo "--- Cat-Back Valvetronic Mufflers Selection ---";}?></button>
<ul class="" id="cat_back_ul" style="display: none">
<li id="c0" pid="none" p_amt="0" data_img="" full_img=""><a href="javascript:void(0);">No</a></li>
<?php foreach ($cat_back as $cList){
	$p = 'cdn/'.$cList['Library']['full_path'];
	$cImg = new_show_image($p,100,100,100,'ff',null);
	?>
<li class="<?php if($cList['Product']['quantity'] == 0){ echo 'disable-itm'; }?>" qut="<?php echo $cList['Product']['quantity'];?>" 
id="<?php echo $cList['Product']['id'];?>" pid="<?php echo $cList['Product']['id'];?>" p_amt="<?php echo $cList['Product']['price'];?>" data_img="<?php echo $cImg;?>" full_img="<?php echo SITEURL.$p;?>"><a href="javascript:void(0);" >
<div class="part_m"><h4><?php echo $cList['Product']['part'];?></h4></div>

<?php $mat_type = null;
if( $cList['Product']['material'] == 'stainless steel'){ $mat_type = '<div class="part_m"><h4 class="grid-right-sec abtpro stainless_steel">Stainless steel</h4></div>'; }
elseif( $cList['Product']['material'] == 'titanium'){ $mat_type = '<div class="part_m"><h4 class="grid-right-sec abtpro titanium">Titanium</h4></div>'; }
echo $mat_type;?><div class="clearfix"></div>
<?php echo $cList['Product']['description'];?>
</a></li>
<?php }?>
</ul>
</div>
</div>
<div class="drp-img" id="cat_pic_id"></div>
</div>

<div class="col-md-3">
<div class="add-bx-snap"><div class="center"><div class="input-group"> <span class="input-group-btn">
<button type="button" class="btn btn-default btn-number snp-btn" disabled="disabled" data-type="minus" data-field="cat_back[1]"> <span class="glyphicon glyphicon-minus"></span> </button></span>
<input type="text" name="cat_back[1]" class="form-control input-number" value="1" min="1" max="10" id="cat_b_q" readonly="readonly">
<span class="input-group-btn"><button type="button" class="btn btn-default btn-number snp-btn" data-type="plus" data-field="cat_back[1]"> <span class="glyphicon glyphicon-plus"></span> </button></span> </div>
</div></div></div>
              
<div class="clearfix"> </div>
</div>
<?php }?>      

<?php if(isset($catalytic) && !empty($catalytic)){?>      
<div class="add-bx-sel"><div class="col-md-9 no-pad"><div class="add-bx-drop-dwn"><div class="new-pro-drdwn">
<button class="" type="button" id="p_2">--- Catalytic Converter Replacement Selections ---</button>
<ul class="" id="ecu_ul" style="display: none">
<li id="e0" pid="0" p_amt="0" data_img="" full_img=""><a href="javascript:void(0);">No</a></li>
<?php foreach ($catalytic as $cList){
	$p = 'cdn/'.$cList['Library']['full_path'];
	$cImg = new_show_image($p,100,100,100,'ff',null);?>
<li class="<?php if($cList['Product']['quantity'] == 0){ echo 'disable-itm'; }?>" qut="<?php echo $cList['Product']['quantity'];?>"  
id="<?php echo $cList['Product']['id'];?>" pid="<?php echo $cList['Product']['id'];?>" p_amt="<?php echo $cList['Product']['price'];?>" data_img="<?php echo $cImg;?>" full_img="<?php echo SITEURL.$p;?>"><a href="javascript:void(0);" >

<div class="part_m"><h4><?php echo $cList['Product']['part'];?></h4></div>
<?php $mat_type = null;
if( $cList['Product']['material'] == 'stainless steel'){ $mat_type = '<div class="part_m"><h4 class="grid-right-sec abtpro stainless_steel">Stainless steel</h4></div>'; }
elseif( $cList['Product']['material'] == 'titanium'){ $mat_type = '<div class="part_m"><h4 class="grid-right-sec abtpro titanium">Titanium</h4></div>'; }
echo $mat_type;?>
<div class="clearfix"></div>
<?php echo $cList['Product']['description'];?>

</a></li>
<?php }?>
                    </ul>
                  </div>
                </div>
<div class="drp-img" id="ecu_pic_id"> </div>
              </div>
<div class="col-md-3">
<div class="add-bx-snap"><div class="center"><div class="input-group"> <span class="input-group-btn">
<button type="button" class="btn btn-default btn-number snp-btn" disabled="disabled" data-type="minus" data-field="ecu[1]"> <span class="glyphicon glyphicon-minus"></span> </button></span>
<input type="text" name="ecu[1]" class="form-control input-number" value="1" min="1" max="10" id="ecu_b_q" readonly="readonly">
<span class="input-group-btn"><button type="button" class="btn btn-default btn-number snp-btn" data-type="plus" data-field="ecu[1]"> <span class="glyphicon glyphicon-plus"></span> </button></span> </div>
</div></div></div>

<div class="clearfix"> </div>
</div>
<?php }?>  

<?php if(isset($tuning_box) && !empty($tuning_box)){?>          
<div class="add-bx-sel"><div class="col-md-9 no-pad"><div class="add-bx-drop-dwn"><div class="new-pro-drdwn">
<button class="" type="button" id="p_3"> --- Armytron Tuning Box Selctions ---</button>
<ul class="" id="tuning_ul" style="display: none">

<li id="t0" pid="0" p_amt="0" data_img="" full_img=""><a href="javascript:void(0);" >No</a></li>

<?php foreach ($tuning_box as $cList){
	$j = json_decode($cList['Product']['images'],true);
	$p = 'cdn/cdnimg/'.$j[0];
	$cImg = new_show_image($p,100,100,100,'ff',null);?>
<li class="<?php if($cList['Product']['quantity'] == 0){ echo 'disable-itm'; }?>" qut="<?php echo $cList['Product']['quantity'];?>"  
id="<?php echo $cList['Product']['id'];?>" pid="<?php echo $cList['Product']['id'];?>" p_amt="<?php echo $cList['Product']['price'];?>" data_img="<?php echo $cImg;?>" full_img="<?php echo SITEURL.$p;?>"><a href="javascript:void(0);" ><?php
if(!empty($cList['Product']['part'])){ echo "<div><h4>".$cList['Product']['part']."</h4></div>"; }
echo $cList['Product']['title'];?></a></li>
<?php }?>
                    </ul>
                  </div>
                </div>
<div class="drp-img" id="tuning_pic_id"> </div>
              </div>
<div class="col-md-3">
<div class="add-bx-snap"><div class="center"><div class="input-group"> <span class="input-group-btn">
<button type="button" class="btn btn-default btn-number snp-btn" disabled="disabled" data-type="minus" data-field="tuning[1]"> <span class="glyphicon glyphicon-minus"></span> </button></span>
<input type="text" name="tuning[1]" class="form-control input-number" value="1" min="1" max="10" id="tuning_b_q" readonly="readonly">
<span class="input-group-btn"><button type="button" class="btn btn-default btn-number snp-btn" data-type="plus" data-field="tuning[1]"> <span class="glyphicon glyphicon-plus"></span> </button></span> </div>
</div></div></div>

<div class="clearfix"> </div>
</div>
<?php }?>            
            <div class="clearfix"> </div>
            
        <div class="mail-bx-up">Question? Email <a href="mailto:sales@armytrix.com">sales@armytrix.com</a></div>
        <div id="e_err"></div>    
            <div class="input-bx"><input value="add to cart" class="btn btn-success ful-wd-btn" onclick="addcart();" type="button"></div>
            <div class="card-btn"> 
            	
                <ul>
                	<li><span>Shipping:</span> <a> 3-5 days deliver to US and Europe. Other countries will take 5-7 days.</a></li>
                    <li><span>Shipment:</span> <a><img src="<?php echo SITEURL;?>img/shipment-card.jpg" /></a></li>
                    <li><span>Delivery: </span><a> Varies</a></li>
                    <li><span>Payments: </span> <a><img src="<?php echo SITEURL;?>img/paypal-ac.png" /></a></li>
                
                </ul>
            
            
            
            </div>
          </div>
        </div>
     
        </div>
        <div class="clearfix"> </div>
           <div class="seprater"></div>
<?php if(!empty($data['ItemDetail']['description'])){?>           
        <div class="col-md-12">
          <div class="describe-bx"><h2>Description</h2></div>

          <div class="scrl-bx content_1" itemprop="description">
            <p> <?php echo nl2br($data['ItemDetail']['description']);?></p>
          </div>
        </div>
<?php }?>

        
      </div>
    </div>
  </div>
  <div class="mid-slider-5" id="videos">
    <div class="break-line slider-sec">
      <div class="row">
        <div class="col-sm-12">
          <h4 class="slider-tx">Remote control & app features</h4>
          <div class="slider-bx-arm-5 owl-carousel">
            <?php if(!empty($features)){
		   foreach($features as $a=>$b){?>
            <div class="set-sld-arm item">
              <div class="row-sld"> <span><a href="http://www.youtube.com/watch?v=<?php echo $b;?>" class="popup-youtube"><img src="https://i.ytimg.com/vi/<?php echo $b;?>/mqdefault.jpg"> <i></i></a></span> </div>
            </div>
            <?php }}?>
          </div>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
    
<?php if(!empty($exhaust)){?>    
<div class="break-line slider-sec no-line">
<div class="row"><div class="col-sm-12"><h4 class="slider-tx">Exhaust Sounds</h4><div class="slider-bx-arm-6 owl-carousel">
<?php if(!empty($exhaust)){
$index = 0;
$inGroup = false;
foreach($exhaust as $item) {
    if (!$inGroup) { echo '<div class="set-sld-arm  item"> <div class="row-sld">'; $inGroup = true; }
	echo '<span><a href="http://www.youtube.com/watch?v='.$item.'" class="popup-youtube"><img src="https://i.ytimg.com/vi/'.$item.'/mqdefault.jpg"> <i ></i></a></span> ';
    
    if (++$index % 2 == 0) { echo '</div></div>'; $inGroup = false; }
}
if ($inGroup) echo '</div></div>'; }?>
</div></div><div class="clearfix"> </div></div></div>
<?php }?>    
  </div>

<?php if(isset($data['QualityDetail']) && !empty($data['QualityDetail'])){?>
<div class="mid-slider-5" id="design_details">
<div class="slder-arm-full">
<?php foreach ( $data['QualityDetail'] as $qlist){
	
if(!empty($qlist['Library']['full_path'])){
	$p = 'cdn/'.$qlist['Library']['full_path'];
	$sImg = new_show_image($p,560,380,100,'ff',null);
}else{
	$sImg = SITEURL."product-detail/box.jpg";
}
	?>
<div class="text-img"> <div class="col-sm-7"> <div class="txt-arm"> <h3><?php echo $qlist['title'];?></h3></div></div>
<div class="col-sm-5"><div class="bg-sld-img"><img src="<?php echo $sImg;?>" alt=""></div></div></div>

<?php }?>
</div></div>
  
<?php }?>

  <div class="container" id="control_setting">
    <div class="row">
      <div class="col-sm-12">

<div class="img-bx-arm">
	<h2>CONTROLLED BY KEY FOBS</h2>
   <img class="hand-img" src="<?php echo SITEURL;?>product-detail/09086R1A3017.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
</div>  

<div class="img-bx-arm">
	<h2>APP SETTINGS</h2>
  <img src="<?php echo SITEURL;?>product-detail/app1.jpg" alt="app1.jpg, 214kB" title="App1" >
</div>  

<div class="img-bx-arm">
   <h2>APP SETTINGS</h2>
   <img src="<?php echo SITEURL;?>product-detail/app2.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
</div>  

<div class="img-bx-arm">
   <h2>APP SETTINGS</h2>
   <img src="<?php echo SITEURL;?>product-detail/app3.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
</div>  

<div class="img-bx-arm">
   <h2>VACCUM TUBES DIAGRAM</h2>
   <img src="<?php echo SITEURL;?>product-detail/1-3-01.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
</div>          


      </div>
    </div>
<?php 

if(!empty($gallery)){?>    
    <div class="image-glr-bx" id="gallery">
      <div class="row">
        <ul class="glr-up featured_items popup-gallery">
          <?php 
			foreach( $gallery as $gList){
				$p = 'cdn/'.$gList['Library']['folder']."/".$gList['Library']['file_name'];
				$sImg = new_show_image($p,200,200,100,'ff',null);
			?>
          <li class="img_block">
            <div class="box-pop"> <a href="<?php echo SITEURL.$p;?>" title="<?php echo $gList['Library']['title'];?>"> 
            <img src="<?php echo $sImg;?>" itemprop="photo" alt="<?php echo $gList['Library']['alt'];?>" title="<?php echo $gList['Library']['title'];?>">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span> </a></div>
          </li>
          <?php }?>
        </ul>
      </div>
    </div>
<?php }?>    
    
  </div>
  <div class="contact-bx-arm" id="contact_us">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="head-arm-tx"> Contact Us </h1>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-10 col-sm-offset-1 no-pad">


   <div class="col-md-4">
     <div class="text-cnt-bx">
        <h5>contact info</h5> 
        <p class="text-uppercase">for united states orders</p>
        <p>Tel: <a href="tel: 6062697579">606-269-7579</a></p>
     </div>
     
     <div class="text-cnt-bx">
       
        <p class="text-uppercase">for E.U orders</p>
        <p>Tel: <a href="tel: +31(0)46202117">+31(0)46202117</a></p>
     </div>
     
    
   </div>
<!---end of box---->  

<form action="<?php echo SITEURL;?>pages/product" id="price_inq" name="mainform" enctype="multipart/form-data" method="post" accept-charset="utf-8">
 <div class="col-md-8 ">
    <div class="input-bx">
       <div class="col-sm-4">
        
            <div class="box-inpt">
              <input class="style-inpt" id="f_name" name="first_name" placeholder="First Name*"/>
            </div>
        
          
          
     <div class="clearfix"></div>   
    
       </div>
       
  <!----end of form-->
  
  <div class="col-sm-4">         
            <div class="box-inpt">
			<input class="style-inpt" id="l_name" name="last_name" placeholder="Last Name*"/>
              
          </div>  
   </div> 
          
   
    <div class="col-sm-4">         
            <div class="box-inpt">
              <input class="style-inpt" id="eamil" name="email_address" placeholder="Email*"/>          
          </div> 
         
   </div>            
    <div class="clearfix"></div>     
       
       
    </div>
    
    
    <div class="input-bx">
       <div class="col-sm-4">         
            <div class="box-inpt">
              <input class="style-inpt" id="phone" name="Phone_number" placeholder="Phone*"/>
            </div>
          </div> 
       
  <!----end of form-->
  
  <div class="col-sm-4">         
            <div class="box-inpt">
              <input class="style-inpt" placeholder="City *" id="city" name="city"/>          
          </div>  
   </div> 
          
   
    <div class="col-sm-4">         
            <div class="box-inpt">
              <input class="style-inpt"  placeholder="State *" id="state" name="state"/>          
          </div> 
         
   </div>            
    <div class="clearfix"></div>     
     </div>  
       
    
    
    
    <div class="input-bx">
       <div class="col-sm-4">         
            <div class="box-inpt">
			<input class="style-inpt"  id="country" name="country" placeholder="Country*"/>
             
            </div>
          </div> 
   
       <div class="col-sm-4">         
            <div class="box-inpt">
              <input class="style-inpt" id="Zip_code" name="Zip_code" placeholder="Zip code"/>          
          </div>  
   </div> 
          
   
    
    <div class="clearfix"></div>    
       
  <!----end of form-->
     </div>
  
  <div class="input-bx">
       <div class="col-sm-4">         
            <div class="box-inpt">
              <select class="style-inpt" id="subject" name="subject">
                <option value="">Select subject *</option>
                <option value="Request a quote">Request a quote</option>
		<option value="Become dealer">Become dealer</option>
		<option value="Partnership">Partnership</option>
		<option value="Complaints">Complaints</option>
		<option value="Technical">Technical</option>
		<option value="Shipping">Shipping</option>
              </select>  
            </div>
          </div> 
       
  <!----end of form-->
  
  <div class="col-sm-4">         
            <div class="box-inpt">
              <input class="style-inpt" placeholder="Brand / Car Model / Year *" id="Brand_Car_Model_Year" name="Brand_Car_Model_Year"/>    
          </div>  
   </div> 
         
                
    <div class="clearfix"></div>     
     </div>


<div class="input-bx">
       <div class="col-sm-12">         
            <div class="box-inpt">
              <textarea class="style-inpt" id="message" name="message" placeholder="Message *"></textarea>             
            </div>
          </div> 
    <div class="clearfix"></div>    
       
  <!----end of form-->
 </div>
    
       
  <!----end of form-->
<div class="input-bx button-snd-5">  
 <div class="col-sm-12"> 
   <div id="res"></div>
 </div>
<div class="clearfix"></div>
 <div class="col-sm-4">      
   <div class="input-bx">
     <input type="button" value="Send message" class="btn btn-success ful-wd" id="sub_btn" onclick="pro();" />
   </div>
 </div>
 
 <div class="col-sm-4">      
   <div class="input-bx">
     <input type="button" value="Clear" class="btn btn-success ful-wd" onclick="$('#price_inq')[0].reset();" />
   </div>
 </div> 
<div class="clearfix"></div>
</div> 
    
    
 </div>
 
</form>

<script type="text/javascript" src="<?php echo SITEURL;?>bootstrap_3_3_6/owl.carousel.js"></script>
<script src="<?php echo SITEURL;?>bootstrap_3_3_6/js/jquery.form.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$('.slder-arm-full').slick({
	   dots: true,
	  infinite: true,
	  speed: 500,
	  fade: true,
	  cssEase: 'linear'
	});
	});	







window['validateEmail'] = function(email) { var re = /\S+@\S+\.\S+/; return re.test(email); };
 window['validatePhone'] = function(ph) { var re = /^\+{0,2}([\-\. ])?(\(?\d{0,3}\))?([\-\. ])?\(?\d{0,3}\)?([\-\. ])?\d{3}([\-\. ])?\d{4}/; return re.test(ph); };

 function pro(){

	 $('#res').html('');

	 var f_name =  $.trim($('#f_name').val());
	 var l_name =  $.trim($('#l_name').val());
	 var email_address =  $.trim($('#eamil').val());
	 var Phone_number =  $.trim($('#phone').val());

	 var country = $.trim($('#country').val());
	 var city = $.trim($('#city').val());
	 var state = $.trim($('#state').val());
	 
	 var Zip_code = $.trim($('#Zip_code').val());
	 var Car_model = $.trim($('#Car_model').val());
	 var subject = $.trim($('#subject').val());
	 var message = $.trim($('#message').val());
	 var Brand_Car_Model_Year = $.trim($('#Brand_Car_Model_Year').val());
	 
	 

	 
	 
 
	 if( f_name == ""){ $('#res').html('<div class="alert alert-danger" role="alert">Please enter first name</div>'); $('#f_name').focus();}
	 else if( l_name == ""){ $('#res').html('<div class="alert alert-danger" role="alert">Please enter last name</div>'); $('#l_name').focus();}
	 else if(!validateEmail(email_address)){  $('#res').html('<div class="alert alert-danger" role="alert">Please enter a valid email address.</div>'); $('#eamil').focus();}
	 else if( !validatePhone(Phone_number)){ $('#res').html('<div class="alert alert-danger" role="alert">Please enter a valid phone nuber.</div>'); $('#phone').focus();}

	 else if( city == ""){ $('#res').html('<div class="alert alert-danger" role="alert">Please enter city name.</div>'); $('#city').focus();}
	 else if( state == ""){ $('#res').html('<div class="alert alert-danger" role="alert">Please enter state name.</div>'); $('#state').focus();}
	 else if( country == ""){ $('#res').html('<div class="alert alert-danger" role="alert">Please enter country name.</div>'); $('#country').focus();}
	 else if( Zip_code == ""){ $('#res').html('<div class="alert alert-danger" role="alert">Please enter zip code</div>'); $('#Zip_code').focus();}
	 else if( subject == ""){ $('#res').html('<div class="alert alert-danger" role="alert">Please select subject</div>'); $('#subject').focus();}
	 
	 
	 else if( message == ""){ $('#res').html('<div class="alert alert-danger" role="alert">Please enter message</div>'); $('#message').focus();}
	 
	 

	 
	 else{
	      $("#price_inq").ajaxForm({ 
	    		 target: '#res',
	    		 beforeSubmit:function(){  $("#sub_btn").prop("disabled",true); $("#sub_btn").val('Please wait.....'); }, 
	    		 success: function(response)  { $("#sub_btn").prop("disabled",false); $("#sub_btn").val('Submit'); },
	    		 error : function(response)  { 
	    		   $('#res').html('<div class="alert alert-danger alert-dismissable fade in">Sorry, this is not working at the moment. Please try again later.</div>');
	    		   $("#sub_btn").prop("disabled",false); $("#sub_btn").val('Submit'); }, }).submit(); 
	}
		


	 }
function g(id){
    $('html,body').animate({ scrollTop: $("#"+id).offset().top - 100},'slow');
}
 jQuery( ".mobile-icon" ).click(function() {
  jQuery( this ).toggleClass( "opens" );
  jQuery(".lil-boxs").toggleClass( "show-nav"); 
});
		(function($){
			 jQuery(window).load(function(){
				 jQuery(".content_1").mCustomScrollbar({
					scrollButtons:{
						enable:true
					}
				});
			});
		})(jQuery);

    $(document).ready(function() {
      var owl = $(".slider-bx-arm-5");
      owl.owlCarousel({
        
        itemsCustom : [
          [0, 1],
          [450, 1],          
          [700, 2],
		  [1000, 4],         
          [1400, 4],
          [1600, 4]
        ],
        navigation : true

      });



    });
    
    $(document).ready(function() {
      var owl = $(".slider-bx-arm-6");
      owl.owlCarousel({
        
        itemsCustom : [
          [0, 1],
          [450, 1],          
          [700, 2],
		  [1000, 4],         
          [1400, 4],
          [1600, 4]
        ],
        navigation : true

      });


    });
	
	
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

 $(document).ready(function() {
        $('.popup-gallery').magnificPopup({
          delegate: 'a',
          type: 'image',
          tLoading: 'Loading image #%curr%...',
          mainClass: 'mfp-img-mobile',
          gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
          },
          image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
              return item.el.attr('title') + '<small> </small>';
            }
          }
        });
      });
    </script>
               


        </div>
      </div>
    </div>
  </div>
</div>

<style>
 .owl-item img{width:100%;}

</style>
<script>

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
                if( input.attr('id') == 'cat_b_q' ){ $('#cat_id_q').val(nv); }
                else if( input.attr('id') == 'ecu_b_q' ){ $('#ecu_id_q').val(nv); }
                else if( input.attr('id') == 'tuning_b_q' ){ $('#tuning_id_q').val(nv); }
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
            	var nv = currentVal + 1;
                input.val(nv).change();
                if( input.attr('id') == 'cat_b_q' ){ $('#cat_id_q').val(nv); }
                else if( input.attr('id') == 'ecu_b_q' ){ $('#ecu_id_q').val(nv); }
                else if( input.attr('id') == 'tuning_b_q' ){ $('#tuning_id_q').val(nv); }
                
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