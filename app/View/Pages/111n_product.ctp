<link rel="stylesheet" href="<?php echo SITEURL;?>css/custom.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo SITEURL;?>css/new_custom-for-audi.css" type="text/css" media="all" />
<link type="text/css" rel="stylesheet" href="<?php echo SITEURL;?>css/lightslider.css" />
<script src="<?php echo SITEURL;?>js/lightslider.js"></script>
<!-- <script src="//use.fontawesome.com/294e29c753.js"></script> -->
<?php echo $this->html->script(array('jquery.form.min', '/v/formValidation.min','/v/bootstrap.min'));?>
<script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('g-recaptcha', {
          'sitekey' : '<?php echo DataSitekey;?>'
        });
      };
    </script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

    <h1 class="test"> </h1>
    <style>
    .slide_images .img-responsive{
      transition: all 500ms ease-in;
      -webkit-transition: all 500ms ease-in;
    }
.color_green .icon-text,.color_green{color:#2ab464!important}
#kit_req input[type="text"],#kit_req input[type="email"],#kit_req input[type="paassword"],#kit_req textarea{border-width:1.5px}
.has-feedback .form-control-feedback{position:absolute;top:25px;right:10px!important;display:block;width:34px;height:34px;line-height:34px;text-align:center;font-size:15px!important}
.white-popup-block{background:#FFF;padding:0;text-align:left;max-width:650px;margin:40px auto;position:relative;max-width:500px;margin:20px auto}
#custom-content img{max-width:100%;margin-bottom:10px}
.nopadding{padding:0!important;margin:0 0 5px}
.white-popup-block label{color:#777;font-size:15px;font-weight:600}
.white-popup-block input,.white-popup-block select,.white-popup-block textarea{background:#999;color:#fff;font-size:14px}
textarea.form-control{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;background:none;text-shadow:none;font-size:13px;line-height:20px;padding:9px 18px 11px;border-radius:0;margin:10px 0 7px;-webkit-appearance:none!important;outline:none;background:#999}
button.btn.btn-green{font-family:"NimbusSanL-Bol";text-transform:capitalize;letter-spacing:2px;font-size:25px!important;padding:5px 55px!important;background:#2ab464;color:#fff!important;border-radius:5px!important;transition:all 500ms ease;-webkit-transition:all 500ms ease;display:inline-block;height:auto!important;margin-right:15px;margin-top:15px}
button.btn.btn-green:last-child{margin-right:0}
button.btn.btn-green:hover{filter:contrast(130%);-webkit-filter:contrast(130%)}
.row_in{margin:0 -10px}
.padding_half{padding:0 10px;margin:0 0 5px}
#design_details .slick-slide{height:auto}
.new-pro-drdwn{position:relative}
.new-pro-drdwn button{background-color:#c5c5c5;border-radius:0!important;color:#fff!important;font-size:13px!important;padding:11px 20px;text-align:center;text-transform:capitalize;width:100%!important;text-overflow:ellipsis;white-space:nowrap;overflow:hidden;border:0}
.new-pro-drdwn button:hover{background-color:#dedcdc!important;color:#fff!important}
.new-pro-drdwn ul{position:absolute;top:100%;left:0;z-index:1000;display:none;float:left;min-width:160px;padding:5px 0;margin:2px 0 0;list-style:none;font-size:13px;background-color:#fff;border:1px solid #ccc;border:1px solid rgba(0,0,0,.15);z-index:555}
.add-bx-drop-dwn .new-pro-drdwn ul > li > a{padding:8px 11px;text-align:left;white-space:initial!important;background:transparent;display:block;text-align:left}
.new-pro-drdwn ul > li > a:hover{background:#66c184!important;color:#fff}
.new-pro-drdwn ul a h4{display:inline-block;color:#fff;background:#333;padding:3px 6px;margin:0 0 5px}
.tab-boxes .nav.nav-tabs{text-align:center;background:#000;border-bottom:1px solid #fff;margin:0}
.tab-boxes .nav-tabs>li{float:none;display:inline-block;padding:8px 10px}
.tab-boxes .nav>li>a{padding:15px 0;font-size:14px;text-transform:uppercase;border-bottom:4px solid transparent;color:#fff!important}
.tab-boxes .nav>li>a:hover,.tab-boxes .nav>li.active>a{color:#00ff01!important;border-color:#00ff01!important;border-width:4px}
.nav>li.active >a:before,.nav>li:hover >a:before{content:""!important;left:0;right:0;margin:0 auto;position:absolute;top:-28px;width:0;height:0;border-left:12px solid transparent;border-right:12px solid transparent;border-top:12px solid #00ff01}
.tab-boxes .tab-content{padding:0;margin-bottom:0}
.tab-boxes .tab-content>.tab-pane{padding:0}
.tab-boxes{margin-top:10px}
.in-side-box .col-sm-6{padding:0}
.in-side-box .col-sm-6:first-child{padding-right:5px}
.in-side-box .col-sm-6:last-child{padding-left:5px}
.flt-box{padding:50px 0;border-bottom:1px solid #ccc}
.flt-box:last-child{border-bottom:0}
.pul-right .col-sm-7,.pul-right .col-sm-5{float:right}
.fters-txt-box{text-align:left}
.fters-txt-box h3{font-weight:600;margin:0 0 15px}
.fters-txt-box p{color:#000;line-height:1.2}
.tab-boxes .slider-tx{text-align:center;margin:30px 0 10px;font-weight:600;display:block;color:#000}
.tab-boxes .break-line{padding-bottom:10px;border-bottom:1px solid #000;border-top:0}
#new-pro-page .tab-boxes .mid-slider-5,#new-pro-page .tab-boxes .image-glr-bx{margin:0}
#slideshow6_thumbs li{float:left;margin-right:15px}
.app-imgs.flt-box{border-bottom:2px solid #000;padding-bottom:0}
.lft-box{float:left;width:47%}
.lft-box.pull-rght{float:right}
.txt-app{position:absolute;right:0;width:130px;text-align:left;top:15px}
.lft-box .col-sm-6{padding-right:140px}
.txt-app h5{font-size:12px;font-weight:600;color:#009345;margin:0 0 8px;padding-bottom:2px;border-bottom:3px solid;display:inline-block;text-transform:uppercase}
.txt-app p{font-size:11px;line-height:1.1;color:#000}
.app-imgs.flt-box{position:relative}
.app-imgs.flt-box:last-child{padding-bottom:50px;border-bottom:0}
#new-pro-page .pdf-dnld{display:block;list-style:none;padding:30px 0;text-align:left;margin:0 -15px}
#new-pro-page .pdf-dnld:after{display:block;content:"";clear:both}
#new-pro-page .pdf-dnld li{float:left;box-sizing:border-box;width:20%;padding:0 15px}
#new-pro-page .pdf-dnld li a{display:block;padding:20px;border:2px solid #ccc}
#new-pro-page .row.lang_bar{display:block;background:#000;position:relative;top:23px;padding:20px;text-align:center;color:#fff}
#new-pro-page .row.lang_bar.stickys{position:fixed;width:100%;z-index:999;top:163px}
#new-pro-page .row.lang_bar label,#new-pro-page .row.lang_bar .input.select{display:inline-block;margin:0 5px}
#new-pro-page .row.lang_bar label{color:#fff!important;font-style:italic}
#new-pro-page .row.lang_bar .input.select select{width:400px;background:transparent;border:1px solid #fff;height:30px;padding:0 0 0 40%;-webkit-appearance:none;-moz-appearance:none;color:#fff!important;background:url(<?php echo SITEURL;?>product-detail/select-arw.png) no-repeat 96% center;background-size:12px;text-align:left;font-size:17px}
#new-pro-page .row.lang_bar .input.select select option{color:#000!important}
#new-pro-page .row.lang_bar .arw-close{width:30px;height:auto;top:50%;right:0;transform:translate(0,-50%);-webkit-transform:translate(0,-50%);-ms-transform:translate(0,-50%);position:absolute;cursor:pointer}
#new-pro-page .top-bg-4{float:left;width:100%;margin-top:23px}
button.lang-div{border:1px solid #fff;background:transparent;border-radius:0;width:400px;font-size:15px;vertical-align:middle;height:30px;padding:0 15px;float:none!important;position:relative}
button.lang-div:hover,button.lang-div:focus,.open .btn-default{background:transparent!important}
.btn-group:hover button.lang-div{color:#093}
button.lang-div .caret{float:none;border-top:8px solid;border-right:5px solid transparent;border-left:5px solid transparent;position:absolute;right:10px;top:0;bottom:0;margin:auto}
.lang_bar .dropdown-menu{width:100%;background:#333;border:1px solid #fff;margin-top:5px;z-index:444}
.lang_bar .dropdown-menu li{display:block}
.lang_bar .dropdown-menu li a{text-align:left;font-size:13px;cursor:pointer;text-transform:uppercase;color:#fff!important;padding:2px 10px;transition:all 500ms ease;-webkit-transition:all 500ms ease}
.lang_bar .dropdown-menu li a:hover{background:#093}
#main_sec .dropdown-menu li a{color:#fff!important}
@media (max-width:1231px) {
#new-pro-page .row.lang_bar{top:17px}
#new-pro-page .top-bg-4{margin-top:17px}
#new-pro-page .row.lang_bar.stickys{top:157px}
}
@media (min-width:991px) {
.logo-in{width:400px}
}
@media (max-width:991px) {
.lft-box{width:100%}
.lft-box .col-sm-6{padding-right:140px;width:50%;margin-bottom:50px;float:left}
.app-imgs.flt-box:last-child:before{display:none}
.lft-box .col-sm-6{padding-right:160px}
.txt-app{right:-10px;width:160px;top:15px}
#new-pro-page .pdf-dnld li{width:33.33%}
#features .col-sm-7,#features .col-sm-5{width:100%;float:none}
.fters-txt-box{margin-top:30px}
#new-pro-page .row.lang_bar .input.select select{width:300px}
#new-pro-page .row.lang_bar{top:7px}
#new-pro-page .top-bg-4{margin-top:7px}
#new-pro-page .row.lang_bar.stickys{top:149px}
}
@media (min-width:768px) {
.nav>li.active >a:before,.nav>li:hover >a:before{border-top:12px solid #000}
}
@media (max-width:767px) {
#main_sec .tab-boxes .nav>li>a{color:#fff!important}
.tab-boxes .nav-tabs>li{padding:8px 5px}
.nav>li.active >a:before,.nav>li:hover >a:before{top:0;border-left:5px solid transparent;border-right:5px solid transparent;border-top:5px solid #00ff01}
#main_sec .tab-boxes .nav>li>a{font-size:11px}
#new-pro-page .pdf-dnld li{width:50%}
#features .col-sm-7 .col-sm-6{width:50%;float:left}
.app-imgs.flt-box:last-child{padding-bottom:0}
#main_sec{margin-top:22px;margin-bottom:120px}
#new-pro-page .row.lang_bar{top:26px;padding:52px 0 20px}
#new-pro-page .top-bg-4{margin-top:16px}
}
@media (max-width:581px) {
.container.mob-hide{display:none}
.container.hide,.container.mob-hide.cnter-line{display:block!important}
.container.hide .col-xs-12,.lft-box .col-sm-6{float:none;margin:0 auto 50px;max-width:400px;width:100%}
.container.hide .col-xs-12:last-child{margin-bottom:0}
.lft-box{float:none!important;width:100%!important;margin:auto;max-width:400px;overflow:hidden}
#new-pro-page ul{list-style:none;padding:0;background:transparent}
#new-pro-page ul li{padding:0;float:left;margin-right:15px}
#main_sec .tab-boxes .nav>li>a{padding:15px 5px;text-transform:uppercase;border-bottom:0;color:#fff!important;margin:5px;background:#000;width:150px}
#new-pro-page .pdf-dnld li{width:50%}
.flt-box{padding:30px 0}
}
@media (max-width:420px) {
#new-pro-page .pdf-dnld li{width:100%}
#features .col-sm-7 .col-sm-6{width:100%;padding:0 0 10px}
#new-pro-page .row.lang_bar .input.select select{width:200px}
}
@media (max-width:767px) {
#main_sec{margin-top:41px!important}
#new-pro-page .row.lang_bar .arw-close{display:none!important}
#new-pro-page .row.lang_bar{top:7px;padding:60px 10px 20px!important}
#new-pro-page .row.lang_bar.stickys{position:relative}
.lang_bar .btn-group,.lang_bar label{display:block}
.lang_bar .btn-group{margin-top:10px}
.lang_bar button.lang-div{display:block;width:100%;max-width:400px;min-width:50px;margin:auto!important;float:none!important}
.lang_bar .dropdown-menu{background:#333!important}
}
@media (max-width:480px) {
#main_sec{margin-top:16px}
#new-pro-page .row.lang_bar{top:0;padding:52px 0 20px}
#new-pro-page .row.lang_bar .input.select select{width:100%;min-width:250px}
}
/*new css*/
.text-section p{color: #000;}
h1.head-arm {
    color: #000;
    font-size: 50px;
}
.select_list{font-size: 18px;    text-transform: uppercase;}
.select_list, #RequestPhone {
    height: 40px;
}
/*end of new css*/
 </style>

 <div class="hidden">
	<script type="text/javascript">
		<!--//--><![CDATA[//><!-- 

			if (document.images) {
				img1 = new Image();
				img2 = new Image();
				img3 = new Image();
				img4 = new Image();
				img5 = new Image();

				img1.src = "<?php echo SITEURL;?>ui/images/Stainless-car-1.jpg";
				img2.src = "<?php echo SITEURL;?>ui/images/Stainless-car-2.jpg";
				img3.src = "<?php echo SITEURL;?>ui/images/Stainless-car-3.jpg";
				img4.src = "<?php echo SITEURL;?>ui/images/Stainless-car-4.jpg";
				img4.src = "<?php echo SITEURL;?>ui/images/Stainless-car-5.jpg";
			}

		//--><!]]>
	</script>
</div> 
<!--24 march 2018 VJ-->

<!--new product css-->
<link rel="stylesheet" href="<?php echo SITEURL;?>v_4/css/jquery.desoslide.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo SITEURL;?>v_4/css/unite-gallery.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo SITEURL;?>v_4/css/new_productpage.css?v=<?php echo rand();?>" type="text/css" media="all" />


<link rel="stylesheet" href="<?php echo SITEURL;?>v_4/css/demo.css" />
<script src="<?php echo SITEURL;?>v_4/js/demo.js"></script>

<script src="<?php echo SITEURL;?>v_4/js/highlight.pack.js"></script>
<script src="<?php echo SITEURL;?>v_4/js/isInViewport.js"></script>

<script src="<?php echo SITEURL;?>v_4/js/jquery.desoslide.min.js"></script>

<script type='text/javascript' src='<?php echo SITEURL;?>v_4/js/unitegallery.min.js'></script>	
<script type='text/javascript' src='<?php echo SITEURL;?>v_4/js/ug-theme-tilesgrid.js'></script>


<style>
</style>
<script>$(document).ready(function(){
  $( ".icon-tb" ).click(function() {
    var $container = $("html,body"); var $scrollTo = $('.product_v_list');
    $container.animate({scrollTop: $scrollTo.offset().top - $container.offset().top, scrollLeft: 0},300); });
  var a=$(".product_v_list").offset().top;$(window).scroll(function(){var b=$(window).scrollTop();if(b>=a){$(".product_v_list").css({position:"fixed",top:"0",})}else{$(".product_v_list").css({position:"static"})}});$("#content-slider").lightSlider({loop:true,keyPress:true});

  $("#image-gallery").lightSlider({
	  gallery:true,
	  item:1,
	  thumbItem:6,
	  slideMargin:0,
	  speed:500,
	  enableTouch:true,
      enableDrag:true,
	  freeMove:true,
	  //auto:false,
	  //loop:true,
	  onSliderLoad:function(){
		  $("#image-gallery").removeClass("cS-hidden")
		  }
  })
  });
	  </script>
<script>jQuery(document).ready(function(){jQuery(".commentlist").find("li").each(function(){if(jQuery(this).find("ul").size()>0){jQuery(this).addClass("has_ul")}});jQuery(".form-allowed-tags").width(jQuery("#commentform").width()-jQuery(".form-submit").width()-13);jQuery(".pf_output_container").each(function(){if(jQuery(this).html()==""){jQuery(this).parents(".blog_post_page").addClass("no_pf")}else{jQuery(this).parents(".blog_post_page").addClass("has_pf")}})});jQuery(window).resize(function(){jQuery(".form-allowed-tags").width(jQuery("#commentform").width()-jQuery(".form-submit").width()-13)});jQuery(document).ready(function(){var b=250;var a=300;jQuery(window).scroll(function(){if(jQuery(this).scrollTop()>b){jQuery(".back-to-top").fadeIn(a)}else{jQuery(".back-to-top").fadeOut(a)}});jQuery(".back-to-top").click(function(c){c.preventDefault();jQuery("html, body").animate({scrollTop:0},a);return false})});</script>
<link rel="stylesheet" type="text/css" href="<?php echo SITEURL;?>bootstrap_3_3_6/css/new_pro.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo SITEURL;?>bootstrap_3_3_6/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo SITEURL;?>bootstrap_3_3_6/slick-theme.css"/>
<script type="text/javascript" src="<?php echo SITEURL;?>bootstrap_3_3_6/slick.min.js"></script>
<script type="text/javascript" src="<?php echo SITEURL;?>bootstrap_3_3_6/jquery.mCustomScrollbar.concat.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo SITEURL;?>bootstrap_3_3_6/csss.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo SITEURL;?>bootstrap_3_3_6/owl.carousel.css"/>
<?php
/*
$features = array('qTgNuldvfb4','0Bzfk6uBIsk','fbfzHlkosZs','ORNvS_xR17I','ISDVEVZTxT0','REpNLHilF8A');
$exhaust = explode(',', $data['ItemDetail']['videos']);
*/ ?>
<div id="preloader" style="display: none;"><div id="status">&nbsp;</div></div>
<div class="product_v_list" style="display:none"></div>
<div id="new-pro-page" itemscope itemtype="http://schema.org/Product">

<?php if(isset($langurl) && !empty($langurl)){?>
<div class="row lang_bar" id="lng_bar" style="display:none">
<div class="container"> 
<div class="col-sm-12">
<label>Choose Your Language</label>
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle lang-div" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Select <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <?php if(!empty($langurl)){
      foreach ($langurl as $k=>$v){
       echo "<li><a href='$k'>$v</a></li>";   
      }
  }?>
    
  </ul>
</div>


<?php /*?>
<div class="arw-close" id="cls_lng_arr"><img src="<?php echo SITEURL;?>product-detail/arow-army_close.png" alt=""/></div>
<?php echo $this->form->input('lng_url',array('options'=>$langurl,'class'=>'','empty'=>'Select','label'=>false));?>
<div class="arw-close" id="cls_lng_arr"><img src="<?php echo SITEURL;?>product-detail/arow-army_close.png" alt=""/></div>
<?php */?>
</div>
</div>
</div>
<?php }?>

<div class="top-bg-4 top-set">

  <div class="container">
        <h1 class="head-arm-tx"> <?php if(isset($data['ItemDetail']['heading']) && !empty($data['ItemDetail']['heading'])){ 
            echo $data['ItemDetail']['heading']; }else{
                echo $this->Lab->getTeetLang(66,$lngtext);
                //echo "Versatility & Functionality<i>Redefined Performance & Sound</i>";
            }?></h1>
  
  </div>
</div>
<div class="clearfix"></div>
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
            <div class="line-arm"> <a> <span><?php echo $this->Lab->getTeetLang(1,$lngtext);?></span> <i><span>+</span><?php echo $data['ItemDetail']['power'];?><small><?php echo $this->Lab->getTeetLang(4,$lngtext);?></small></i> </a> 
            <a> <span><?php echo $this->Lab->getTeetLang(2,$lngtext);?></span> <i><span>+</span><?php echo $data['ItemDetail']['torque'];?><small><?php echo $this->Lab->getTeetLang(5,$lngtext);?></small></i> </a> 
            <a> <span><?php echo $this->Lab->getTeetLang(3,$lngtext);?></span> <i><span>-</span><?php echo $data['ItemDetail']['weight'];?><small><?php echo $this->Lab->getTeetLang(6,$lngtext);?></small></i> </a> </div>
          </div>
          <div class="item">
            <div class="clearfix1" style="max-width:100%">
              <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
<?php 

if( isset($feature) && $feature == 'ss'){ $sArr = $slider;}
elseif(isset($feature) && $feature == 'titanium'){ 
    if(!empty($slidersTT)){ $sArr = $slidersTT;}
    else{ $sArr = $slider; }
}else{
    $sArr = $slider;
}

if(isset($sArr) && !empty($sArr)){
    foreach ($sArr as $sList){
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
<?php if( isset($no_price) ){ ?>
<br>
<div class="mail-bx-up"><?php echo $this->Lab->getTeetLang(7,$lngtext);?> <a href="mailto:sales@armytrix.com">sales@armytrix.com</a></div>
<br>
<div class="input-bx"><a href="javascript:void(0);" onclick="sh();" id="sh_btn" class="btn btn-success ful-wd-btn"><?php echo $this->Lab->getTeetLang(8,$lngtext);?></a> </div>

<div id="custom-content" class="white-popup-block" style="display: none">
<div>
<div class="rows">
<?php  echo $this->Form->create('Request',array('id'=>'kit_req',   'url' => array('controller' => 'pages', 'action' => 'contact_pop') ));?>       
         <div class="row">
            <div class="form-boxd">

<div class="col-md-12">

<div class="row_in"><div class="form-group padding_half col-md-6"><?php echo $this->Form->input('f_name',array('class'=>'form-control','label'=>'First Name<sup>*</sup>', 'required'=>true));?></div>
<div class="form-group padding_half col-md-6"><?php echo $this->Form->input('l_name',array('class'=>'form-control','label'=>'Last Name<sup>*</sup>', 'required'=>true));?> </div>
<div class="clearfix"></div>
</div>

<div class="row_in"><div class="form-group padding_half col-md-6"><?php echo $this->Form->input('country',array('options'=>$this->Lab->country(),'empty'=>'Select Country', 'class'=>'form-control select_list','label'=>'Country<sup>*</sup>', 'required'=>true));?></div>

<div class="form-group padding_half col-md-6"><?php echo $this->Form->input('city',array('class'=>'form-control','label'=>'City<sup>*</sup>', 'required'=>true));?> </div>
<div class="clearfix"></div>
</div>


<div class="form-group nopadding col-md-12"><?php echo $this->Form->input('zip_code',array('class'=>'form-control','label'=>'Zip Code<sup>*</sup>', 'required'=>true));?></div>

<div class="form-group nopadding col-md-12"><?php echo $this->Form->input('phone',array('type'=>'tel', 'class'=>'form-control','label'=>'Phone<sup>*</sup>', 'required'=>true,'minlength'=>10));?></div>
<div class="form-group nopadding col-md-12"><?php echo $this->Form->input('email',array('class'=>'form-control','label'=>'Email<sup>*</sup>', 'required'=>true));?> </div>
<div class="form-group nopadding col-md-12"><?php echo $this->Form->input('confirm_email',array('class'=>'form-control','label'=>'Confirm Email<sup>*</sup>', 'required'=>true));?> </div>


<div class="form-group nopadding col-md-12"><?php echo $this->Form->input('brand',array('options'=>$this->Lab->getbrand(),'empty'=>'Select Brand', 'class'=>'form-control select_list','label'=>'Brand <sup>*</sup>', 'required'=>true));?></div>
<div class="form-group nopadding col-md-12"><?php echo $this->Form->input('model',array('options'=>[],'empty'=>'Select Motor','class'=>'form-control select_list','label'=>'Model <sup>*</sup>', 'required'=>true));?></div>
<div class="form-group nopadding col-md-12"><?php echo $this->Form->input('engine',array('options'=>[],'empty'=>'Select Engine','class'=>'form-control select_list','label'=>'Engine <sup>*</sup>', 'required'=>true));?>
<p>Not listed above? Please click to visit our <a href="<?php echo SITEURL;?>homes/new_kit_request">new kit request page</a></p>
<br>
</div>


<div class="form-group nopadding col-md-12"><?php echo $this->Form->input('message',array('type'=>'textarea','rows'=>5, 'class'=>'form-control','label'=>'Message<sup>*</sup>', 'required'=>true));?></div>
</div>
           
<div class="clearfix"></div>   

<div id="app_errr" class="form-group nopaddingd col-md-12"></div>           
<div class="rows clear-fx"><div class="col-sm-4"><div id="g-recaptcha"></div></div>

<div class="col-sm-12">
<div class="button-bx clr-btn">
  <button class="btn btn-green" type="reset" >Reset</button> 
  <button type="button" class="btn btn-green sbmt-big" id="but_req">submit</button>
</div>
</div>
</div>  
</div>
</div>
<?php echo $this->Form->end();?>         
<!--end of form-col--> 

<script>
function btn_top(){
	$('html, body').animate({
        scrollTop: $("#new-pro-page").offset().top - 100
    }, 1000);
	
}
function btn_qq(){
	$('html, body').animate({
        scrollTop: $("#add-cart-bx").offset().top - 100
    }, 1000);
	sh();
}

function sh(){
$('#sh_btn').fadeOut();
$('#custom-content').fadeIn();
}
$(document).ready(function() {

	$( "#RequestBrand" ).change(function() {
		$("#app_errr").html('');
		$('#RequestModel').html('<option value="">Select Model</option>');
		$('#RequestEngine').html('<option value="">Select Engine</option>');
		var v = $.trim(this.value); 
		if(v != ""){
		$('#preloader').show();	
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL;?>pages/get_for',
			data:'id='+v+'&type=brand&get=motor',
			success: function(data) { $("#app_errr").html(data); $('#preloader').hide(); },
			error: function(comment) { $("#app_errr").html(data); $('#preloader').hide(); }}); 
		}
	});

	$( "#RequestModel" ).change(function() {
		$("#app_errr").html('');
		$('#RequestEngine').html('<option value="">Select Engine</option>');
		var v = $.trim(this.value); 
		if(v != ""){
		$('#preloader').show();	
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL;?>pages/get_for',
			data:'id='+v+'&type=motor&get=engine',
			success: function(data) { $("#app_errr").html(data); $('#preloader').hide(); },
			error: function(comment) { $("#app_errr").html(data); $('#preloader').hide(); }}); 
		}
	});

    $('#kit_req').formValidation({
        framework: 'bootstrap',
        /*
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        err: { container: 'tooltip' },
        */
        fields: {
            'data[Request][confirm_email]': {
                validators: {
                    notEmpty: {
                        message: 'The email is required'
                    },
                    callback: {
                        callback: function(value, validator, $field) {
                            var em2 = $field.val();
                            var em = $('#RequestEmail').val();
                            if (em2 == em) {
                                return true;
                            }else{
                            	return {
                                    valid: false,
                                    message: 'Email address does not match'
                                } }
                        }
                    }
                }
            }
        }
    }).on('success.form.fv', function(e) {
        e.preventDefault();
        var $form = $(e.target),
            fv    = $form.data('formValidation');

        // Use Ajax to submit form data
        fv.defaultSubmit();
    });

    
    $( "#clr" ).click(function() {
    	$('#kit_req')[0].reset();
    	grecaptcha.reset();
    });
	$( "#but_req" ).click(function() {
		$("#app_errr").html('');
     	 $("#kit_req").ajaxForm({ 
    	   target: '#app_errr',
    	   beforeSubmit:function(){ $("#preloader").show(); }, 
    	   success: function(response)  { $("#preloader").hide(); },
    	   error : function(response)  { 
    		   $('#app_errr').html('<div class="alert alert-danger alert-dismissable fade in">Sorry, this is not working at the moment. Please try again later.</div>');
    		   $("#preloader").hide();
    		   },
    
    	   }).submit();
	}); 
}); 		   
</script>
   <div class="clearfix"></div>    
    </div>
</div>
</div>    



<?php  }else{?>
<div class="mail-bx-up"><?php echo $this->Lab->getTeetLang(7,$lngtext);?> <a href="mailto:sales@armytrix.com">sales@armytrix.com</a></div>        
        <div id="e_err"></div>    
            <div class="input-bx"><input value="add to cart" class="btn btn-success ful-wd-btn" onclick="addcart();" type="button"></div>
            <div class="card-btn"> 
              
                <ul>
                  <li><span>Shipping:</span> <a> 3-5 days deliver to US and Europe. Other countries will take 5-7 days.</a></li>
                    <li><span>Shipment:</span> <a><img src="<?php echo SITEURL;?>img/shipment-card.jpg" alt="" /></a></li>
                    <li><span>Delivery: </span><a> Varies</a></li>
                    <li><span>Payments: </span> <a><img src="<?php echo SITEURL;?>img/paypal-ac.png" alt="" /></a></li>
                
                </ul>
            
            
            
            </div>
<?php }?>          
          
          </div>
        </div>
     
        </div>
        <div class="clearfix"> </div>
           <div class="seprater"></div>

           

         
<!--start tab-->           
  
  </div>
<!--end  tab-->        
           

      </div>
    </div>
    
 <!--start image gallery-->  
 <section class="black-bg">
<div id="gallery1">
<?php if(!empty( $data['Video'])){
    foreach ($data['Video'] as $vlist){ ?>
        <img alt=""
        data-type="youtube"  src="https://i.ytimg.com/vi/<?php echo $vlist['video'];?>/0.jpg"
         data-image="https://i.ytimg.com/vi/<?php echo $vlist['video'];?>/0.jpg"
         data-description=""
         data-videoid="<?php echo $vlist['video'];?>" style="display:none">
    <?php }
}?>
</div>
</section>
 <!--end of image gallery--> 
 
 <!--start 3 Modes One-key switch -->
   <section style="position: relative;">

   <div class="models_switch">
   <div class="page-titles">
     <h1 class="head-arm">3 Modes Switch</h1>
</div>

<div class="mid-sec row">
  <ul id="slideshow2_thumbs" class="desoslide-thumbs-horizontal list-inline text-center">
                                    <li>                                    
                                            <img src="<?php echo SITEURL;?>/v_4/images/mouse-icon1-02.png" alt="" /><br>Smart Mode

                                    </li>
                                    <li class="color_green">
                                        <a href="<?php echo SITEURL; ?>v_4/images/mouse-hover-b2.jpg" >
                                            <img src="<?php echo SITEURL;?>v_4/images/mouse-icon1-hover.png" alt="" id="menuImg">
                                        </a><br>Neighbor Mode

                                    </li>
                                    <li>
                                        <a href="<?php echo SITEURL; ?>v_4/images/mouse-hover-b1.jpg" >
                                            <img src="<?php echo SITEURL;?>v_4/images/mouse-icon3.png" alt=""   id="menuImg1">
                                        </a><br> Beast Mode

                                       
                                    </li>
                                    
                                </ul>
</div>
</div>
<!--end of modal key sec-->

<div class="slide_images">  
      <div id="slideshow2"></div>
 </div>
</div>
</section>
 <!--end 3 Modes One-key switch-->
 
 <section class="text-section" id="txt_d">
   <div class="page-wrap">
     <div class="col-sm-12">
       <h1>ARMYTRIX VALVETRONIC:<br/> HOW IT WORKS - BRIEF OVERVIEW</h1>
       <p>As an Armytrix fan, customer, or potential customer, you have likely heard of Valvetronic. It's one of the prominent selling features of Armytrix exhaust systems and
has shifted the entire exhaust industry towards adopting similar technology in all exhaust systems. The whole point of the Valvetronic system is to give you an option
for how loud you want your car to be. If you leave early in the morning for work, you probably don't want your car to be excessively loud, as it will upset your neighbors.
Once you're out on the open road or shredding a canyon road, you want to hear those awesome noises your car makes</p>
       
       <p>The Valvetronic system allows you to switch between being quiet and being loud with the push of a button via the included remote or through the smartphone
application; this works by tapping into a vacuum source on your engine and connecting it to the control module. When you press the button on the remote or
smartphone application, you are communicating with the OBDII module via Bluetooth. This OBDII module tells the exhaust valve module to allow the engine vacuum
to open or close the exhaust valve. You can also set the exhaust valve module to an automatic mode which will open/close the exhaust valve based on predetermined
RPM range or throttle position.</p>
       
       <p>Aside from getting a brutal sound with the Valvetronic system open, you can also gain power, especially if your car is turbocharged. Depending on the car,
modifications, and tune you have, the valve being open will also the exhaust gas to flow more freely, as it does not have to pass through any muffler. If your vehicle is
turbocharged, you may see a slight increase in boost pressure depending if you are running an open or closed boost cycle, resulting in more horsepower.</p>
     </div>
<div class="clearfix"></div>          
   </div>
 </section>
 
<?php 
echo $this->element('pro/s1');
echo $this->element('pro/s2');
echo $this->element('pro/s2a');
echo $this->element('pro/s3');
echo $this->element('pro/s4'); 
echo $this->element('pro/s5'); /*comman */
if($feature == 'ss'){
echo $this->element('pro/s6'); /* ss 1 */
echo $this->element('pro/s7'); /* ss 2 */
echo $this->element('pro/s8'); /* ss 3 */
echo $this->element('pro/s9'); /* ss 4 */
echo $this->element('pro/s10'); /* ss 5 */

?>
<!--photo gallery-->
<div class="photo-gallery-wrap">
<div id="gallery" style="display:none;">
<?php if(isset($gallery) && !empty($gallery)){
    foreach( $gallery as $gList){
        $p = 'cdn/'.$gList['Library']['folder']."/".$gList['Library']['file_name'];
        $sImg = new_show_image($p,200,200,100,'cf',null); ?>
        <a href="#">
		<img alt="<?php echo $gList['Library']['alt'];?>"
		     src="<?php echo $sImg;?>"
		     data-image="<?php echo SITEURL.$p;?>"
		     data-description="<?php echo $gList['Library']['title'];?>"
		     style="display:none">
		</a>
    <?php }
}?>
</div>
<div class="clearfix"></div>
</div>
<!--end of photo gallery-->
<?php 
echo $this->element('pro/s17'); /* ss 6 */
echo $this->element('pro/s12'); /* ss 7 */
echo $this->element('pro/s13'); /* ss 8 */
echo $this->element('pro/s14'); /* ss 9 */
}

if($feature == 'titanium'){
    echo $this->element('pro/s15'); /* tt 1 */
    echo $this->element('pro/s16'); /* tt 2 */
    echo $this->element('pro/s6'); /* tt 3 */
    echo $this->element('pro/s7'); /* tt 4 */
    echo $this->element('pro/s8'); /* tt 5 */
    echo $this->element('pro/s9'); /* tt 6 */
    
?>    

<!--photo gallery-->
<div class="photo-gallery-wrap">
<div id="gallery" style="display:none;">
<?php if(isset($gallery) && !empty($gallery)){
    foreach( $gallery as $gList){
        $p = 'cdn/'.$gList['Library']['folder']."/".$gList['Library']['file_name'];
        $sImg = new_show_image($p,200,200,100,'cf',null); ?>
        <a href="#">
		<img alt="<?php echo $gList['Library']['alt'];?>"
		     src="<?php echo $sImg;?>"
		     data-image="<?php echo SITEURL.$p;?>"
		     data-description="<?php echo $gList['Library']['title'];?>"
		     style="display:none">
		</a>
    <?php }
}?>
</div>
<div class="clearfix"></div>
</div>
<!--end of photo gallery-->    
<?php 
echo $this->element('pro/s21'); /* tt 7 */
    echo $this->element('pro/s11'); /* tt 8 */
    echo $this->element('pro/s18'); /* tt 9 */
    echo $this->element('pro/s19'); /* tt 10 */
    echo $this->element('pro/s20');  /* tt 11 */
    echo $this->element('pro/s14'); /* tt 12 */
} ?>


<div class="buttons">
<a href="javascript:void(0);" onclick="btn_top()" class="back_top"><img src="<?php echo SITEURL;?>v_4/images/backtotop.png" alt="" /></a>
<a href="javascript:void(0);" onclick="btn_qq()" class="btn-greens">Quote <img src="<?php echo SITEURL;?>v_4/images/btn-png.png"></a>
</div>
</div>


<style>
#msg_info { overflow: unset; overflow-y: unset; }
.modal-dialog-center{margin-top:20%}
.modal-dialog.auto-pop{width:95%;margin:30px auto;max-width:650px;top:50%;transform:translateY(-50%)!important;-webkit-transform:translateY(-50%)!important}
.auto-pop .modal-content{padding:50px 40px 20px;text-align:left;background:#e5e4e4}
.modal-dialog.auto-pop .close{font-size:24px;height:30px;width:30px;background:#c7c6c6;border-radius:100%;margin:12px;border:1px solid #fff;top: -5px;right: 0;position:absolute;opacity:.9;color:#8c8888;text-shadow:none;font-weight:300;padding:0}
.modal-dialog.auto-pop .close:hover{background:#ff7105;color:#fff}
.msg-suces-box p{padding-left:38px;margin-bottom:20px;font-weight:600;position:relative}
.check-bx img{position:absolute;width:25px;left:0;top:0}
.red-dot{color:#f83131}
.red-dot:before{position:absolute;top:4px;left:7px;width:15px;height:15px;border-radius:100%;background:#f83131;content:""}
.border-dashed{margin-top:25px;padding-top:25px;border-top:2px dashed #6b6a6a}
.btn-green-small{background:#58c56e;font-size:25px;letter-spacing:1px;text-transform:inherit;padding:2px 20px;border-radius:5px;color:#fff}
@media (max-width: 480px) {
.msg-suces-box p{font-size:15px}
}
</style>
<div id="msg_info" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-center auto-pop">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="">
        <button type="button" class="close" data-dismiss="modal">&times;</button>        
      </div>
      <div class="msg-suces-box">
        <p class="check-bx"><img src="https://www.armytrix.com/flash_sale/images/check-icon.png" alt="">Your message has been successfully sent. We will get back to you by email within 24 - 48 hours.</p> 
        <p class="red-dot">Please note: There is a 49% chance our email will be sent to your spam mail, please check your spam mail folder from time to time</p>
      </div>
      <div class="text-center border-dashed">
        <button type="button" class="btn btn-default btn-green-small" data-dismiss="modal">I understand</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
//$('#msg_info').modal('show');
});
</script>



<script type="text/javascript" src="<?php echo SITEURL;?>bootstrap_3_3_6/owl.carousel.js"></script>
<script src="<?php echo SITEURL;?>bootstrap_3_3_6/js/jquery.form.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){

	$('.ch_bg1').hover(function () {
	    //$(this).addClass('hover-enabled');
	    var p = $(this).attr("bg-img");
	    $('#sl_bg1').attr('style', 'background: url('+p+') no-repeat center center');

	    //var p1 = $("#"+this.id+" > img").attr("bg-img");
	    var p1 = $("#"+this.id+" > img").attr("act-img");
	    $("#"+this.id+" > img").attr("src",SITEURL+'ui/images/st-icon/'+p1);
	    
	}, function () {
		var p1 = $("#"+this.id+" > img").attr("bg-img");
		$("#"+this.id+" > img").attr("src",SITEURL+'ui/images/st-icon/'+p1);
		//$('#sl_bg').css('background', 'url('+p+') no-repeat center center; padding:20px 15px;');
	});

	$('.ch_bg').hover(function () {
	    //$(this).addClass('hover-enabled');
	    var p = $(this).attr("bg-img");
	    $('#sl_bg').attr('style', 'background: url('+p+') no-repeat center center');
	    var p1 = $("#"+this.id+" > img").attr("act-img");
	    $("#"+this.id+" > img").attr("src",SITEURL+'v_4/images/'+p1);
	}, function () {
		//$('#sl_bg').css('background', 'url('+p+') no-repeat center center; padding:20px 15px;');
		var p1 = $("#"+this.id+" > img").attr("bg-img");
		$("#"+this.id+" > img").attr("src",SITEURL+'v_4/images/'+p1);
	});

	
  $('#cls_lng_arr').click(function(e){
    
    $('#lng_bar').hide();
  });
  $('#lng_text').click(function(e){
    if( $('#lng_bar').css('display') == 'none' ){
      $('#lng_bar').show();
      
    }else{
      $('#lng_bar').hide();
      }
    
  });

  $('#lng_url').on('change', function() {
      if( this.value != "" ){
        $('#preloader').show(); 
        window.location.href = this.value; }
    })
  
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
               


<style>
 .owl-item img{width:100%;}

</style>
<script>

function vol(id){

	var myarr = id.split("_");
	var myvar = myarr[1];
	
	var t = $.trim($('#so_'+myvar).text());
	
	if(t == "CLICK FOR SOUND ON"){
		$('#so_'+myvar).text('CLICK FOR SOUND OFF');
		$('#'+myvar).text('CLICK FOR SOUND OFF');
		$("#"+id).prop('muted', false); 
		 //if ($("#"+id).get(0).paused) { $("#"+id).get(0).play(); } else { $("#"+id).get(0).pause(); }
	}else{ 
		$('#so_'+myvar).text('CLICK FOR SOUND ON');
		//if ($("#"+id).get(0).paused) { $("#"+id).get(0).play(); } else { $("#"+id).get(0).pause(); }
		$("#"+id).prop('muted', true);
		
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
  

function inquiry(){
  $('html,body').animate({ scrollTop: $("#doInquiry").offset().top-150}, 'slow');
  $('.nav-tabs a[href="#contact-us"]').tab('show');
  
}
<?php if(isset($doInquiry)){ ?>
window.onload = function() {
  $('html,body').animate({ scrollTop: $("#doInquiry").offset().top-150}, 'slow');
  $('.nav-tabs a[href="#contact-us"]').tab('show');
  }; 
<?php }?>


$(document).ready(function(){
  $(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 1) {
        $(".lang_bar").addClass("stickys");
    } else {
        $(".lang_bar").removeClass("stickys");
    }
});


  $(window).scroll(function() {
  $('._autoplay_vid').each(function(){
	    if ($(this).is(":in-viewport")) {
	        $(this)[0].play();
	    } else {
	        $(this)[0].pause();
	    }
	});
  });
  
});



/* video auto play */
var vids = document.getElementsByClassName('_autoplay_vid');

for (var i = vids.length - 1; i >= 0; i--) {
	//pause all the videos by default
	//vids[i].pause();
}


/*
window.onscroll = autoplay;

function autoplay(){
    for (var i = vids.length - 1; i >= 0; i--) {
        var currentYpos = window.pageYOffset || document.documentElement.scrollTop;
        if ( currentYpos >= (vids[i].offsetTop - 300) && currentYpos <= (vids[i].offsetTop -300) + vids[i].offsetHeight ) {
			//console.log(vids[i]);
			if (vids[i].paused) { vids[i].play(); }
			
		}else{
			vids[i].pause();
		}
	}
}
*/


<!--- video autoplay-->
   <!--- mouse hover Icons section-->
   $(document).ready(function(){
     $("#menuImg").mouseover(function(){
    	 $("#slideshow2_thumbs li").removeClass('color_green');	 
    	 $("#menuImg").closest('li').addClass('color_green');
$("#menuImg").attr('src', '<?php echo SITEURL; ?>v_4/images/mouse-icon1-hover.png');
$("#menuImg1").attr('src', '<?php echo SITEURL; ?>v_4/images/mouse-icon3.png');

     });
	 
});
   
$(document).ready(function(){
$("#menuImg1").mouseover(function(){
	$("#slideshow2_thumbs li").removeClass('color_green');	 
	 $("#menuImg1").closest('li').addClass('color_green');
$("#menuImg1").attr('src', '<?php echo SITEURL; ?>v_4/images/mouse-icon3-hover.png');
$("#menuImg").attr('src', '<?php echo SITEURL; ?>v_4/images/mouse-icon1.png');
     });
	     
});

$(document).ready(function(){
 $("#first-phone").mouseover(function(){
$("#slideshow6_thumbs li").removeClass('color_green');	 
$("#first-phone").closest('li').addClass('color_green');
$("#first-phone").attr('src', '<?php echo SITEURL; ?>v_4/images/valves-control-hover.png');
$("#second-phone").attr('src', '<?php echo SITEURL; ?>ui/images/car-data.png');
$("#third-phone").attr('src', '<?php echo SITEURL; ?>ui//images/settings.png');
$("#fourth-phone").attr('src', '<?php echo SITEURL; ?>ui/images/error-code.png');
$("#fifth-phone").attr('src', '<?php echo SITEURL; ?>ui/images/diary.png');
    });
});


 $(document).ready(function(){
 $("#second-phone").mouseover(function(){
	 $("#slideshow6_thumbs li").removeClass('color_green');	 
	 $("#second-phone").closest('li').addClass('color_green');
	 
$("#second-phone").attr('src', '<?php echo SITEURL; ?>v_4/images/car-data-hover.png');
$("#first-phone").attr('src', '<?php echo SITEURL; ?>ui/images/valves-control.png');
$("#third-phone").attr('src', '<?php echo SITEURL; ?>ui/images/settings.png');
$("#fourth-phone").attr('src', '<?php echo SITEURL; ?>ui/images/error-code.png');
$("#fifth-phone").attr('src', '<?php echo SITEURL; ?>ui/images/diary.png');
    });
});

$(document).ready(function(){
 $("#third-phone").mouseover(function(){
	 $("#slideshow6_thumbs li").removeClass('color_green');	 
	 $("#third-phone").closest('li').addClass('color_green');
$("#third-phone").attr('src', '<?php echo SITEURL; ?>v_4/images/settings-hover.png');
$("#first-phone").attr('src', '<?php echo SITEURL; ?>ui/images/valves-control.png');
$("#second-phone").attr('src', '<?php echo SITEURL; ?>ui/images/car-data.png');
$("#fourth-phone").attr('src', '<?php echo SITEURL; ?>ui/images/error-code.png');
$("#fifth-phone").attr('src', '<?php echo SITEURL; ?>ui/images/diary.png');
    });
});

$(document).ready(function(){
 $("#fourth-phone").mouseover(function(){
	 $("#slideshow6_thumbs li").removeClass('color_green');	 
	 $("#fourth-phone").closest('li').addClass('color_green');
$("#fourth-phone").attr('src', '<?php echo SITEURL; ?>v_4/images/error-code-hover.png');
$("#first-phone").attr('src', '<?php echo SITEURL; ?>ui/images/valves-control.png');
$("#second-phone").attr('src', '<?php echo SITEURL; ?>ui/images/car-data.png');
$("#third-phone").attr('src', '<?php echo SITEURL; ?>ui/images/settings.png');
$("#fifth-phone").attr('src', '<?php echo SITEURL; ?>ui/images/diary.png');
    });
});

$(document).ready(function(){
 $("#fifth-phone").mouseover(function(){
	 $("#slideshow6_thumbs li").removeClass('color_green');	 
	 $("#fifth-phone").closest('li').addClass('color_green');
$("#fifth-phone").attr('src', '<?php echo SITEURL; ?>v_4/images/diary-hover.png');
$("#first-phone").attr('src', '<?php echo SITEURL; ?>ui/images/valves-control.png');
$("#second-phone").attr('src', '<?php echo SITEURL; ?>ui/images/car-data.png');
$("#third-phone").attr('src', '<?php echo SITEURL; ?>ui/images/settings.png');
$("#fourth-phone").attr('src', '<?php echo SITEURL; ?>ui/images/error-code.png');
    });
});
<!--- mouse hover Icons section-->

<!--unite gallery-->
jQuery(document).ready(function(){
			jQuery("#gallery1").unitegallery({
				theme_navigation_type:"arrows",
				grid_num_rows:2,
				lightbox_arrows_offset: 3,
				tile_width: 450,
				tile_height: 250,
				theme_gallery_padding: 10,				//padding from sides of the gallery
				grid_padding:0,						//set padding to the grid
				grid_space_between_cols: 0,			//space between columns
				grid_space_between_rows: 0,			//space between rows

				lightbox_type: "compact",		
				lightbox_hide_arrows_onvideoplay: false,
				<?php if(isset($IsMobile)){}else{?> lightbox_arrows_offset: 130,<?php }?>
			    lightbox_slider_image_border_color: "#000",	//image border color
				lightbox_overlay_opacity:0.8,						//the opacity of the overlay. for compact type - 0.6
				lightbox_slider_image_shadow: false,	
			});

		});
<!--end of unite gallery-->	

		jQuery(document).ready(function(){
			jQuery("#gallery").unitegallery({
				theme_navigation_type:"arrows",
				grid_num_rows:4,
				lightbox_arrows_offset: 6,
				tile_width: 270,
				tile_height: 200,
				theme_gallery_padding: 10,				//padding from sides of the gallery
				grid_padding:0,						//set padding to the grid
				grid_space_between_cols: 0,			//space between columns
				grid_space_between_rows: 0,			//space between rows
				lightbox_type: "compact",		
				lightbox_hide_arrows_onvideoplay: false,	
				lightbox_arrows_offset: 150,						//The horizontal offset of the arrows
			    lightbox_slider_image_border_color: "#000",	//image border color
				lightbox_overlay_opacity:0.8,						//the opacity of the overlay. for compact type - 0.6
				lightbox_slider_image_shadow: false,	
			});
		});
		
	

</script>
