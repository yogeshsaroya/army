<?php 
$meta = array('title'=>'Audi RS6 - Armytrix Exhaust | ECU Tuning | Power Box | OBD-II Scanner',
		'des'=>'Following the creed of providing the most sound, more power and true versatility, ARMYTRIX offer high-end performance valvetronic exhaust systems, ecu tuning and power box that are second to none. We foster a culture of innovation. ARMYTRIX not only creates products, ARMYTRIX creates experiences.',
		'keyword'=>'cat-back, sports exhaust, muffler, silencer, armytrix systems manifold, us, ferrari, lamborghini, maserati, porsche, benz, bmw, volkswagen, mclaren, mini cooper, audi, nissan gt-r r35, sport cat, cat, manifold, sports manifold, test pipes'); 
		
include 'new_header.php';
include 'product_inc.php';?>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>bootstrap_3_3_6/css/new_pro.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>bootstrap_3_3_6/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>bootstrap_3_3_6/slick-theme.css"/>
<script type="text/javascript" src="<?php echo BASE_URL;?>bootstrap_3_3_6/slick.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>bootstrap_3_3_6/jquery.mCustomScrollbar.concat.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>bootstrap_3_3_6/csss.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>bootstrap_3_3_6/owl.carousel.css"/>
<?php
$features = array('qTgNuldvfb4','0Bzfk6uBIsk','fbfzHlkosZs','ORNvS_xR17I','ISDVEVZTxT0','REpNLHilF8A');

 
$sliderArr = array('detail/audi/rs6'=>array(
'audi_rs6_c7-exhaust-1.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-2.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-3.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-4.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-5.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-6.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-7.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-8.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-9.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-10.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-11.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-12.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-13.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-14.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-15.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-16.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-17.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-18.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',
'audi_rs6_c7-exhaust-19.jpg'=>'Audi RS6 C7 Avant - Armytrix Best Cat Back Valvetronic Exhaust',


));


$exhaust = array('yGw70hlU1PE','pP2sGphkg5I');

$image_arr= array(' ');
?>


<div class="product_v_list" style="display:none"></div>
<div id="new-pro-page" itemscope itemtype="http://schema.org/Product">
<div class="top-bg-4">
<div class="container">
<?php include 'x_product_title.php';?>
</div>
</div>
<div class="main-body-arm-5">
<?php include 'side_menu.php';?>
<div class="container">
<div class="top-sec-arm-5" id="info">
<div class="row">
<div class="col-md-7">

<div class="top-drp-down">
<ul class="drp-box">

<?php include 'x_select-other-brand.php';?>

<?php include 'x_select-other-model-audi.php';?>


</ul>
</div>
<div class="line-bx-arm-5">
<h3 class="mid-txt-arm-5" itemprop="name">AUDI RS6 AVANT (C7)</h3>

<div class="line-arm">
<a>
<span>Power</span>
<i><span>+</span>14.3<small>HP</small></i>
</a>
<a>
<span>Torque</span>
<i><span>+</span>16.1<small>Nm</small></i>
</a>
<a>
<span>Weight</span>
<i><span>-</span>2.2<small>kg</small></i>
</a>
</div>
</div>
<div class="item">
<div class="clearfix" style="max-width:100%">
<ul id="image-gallery" class="gallery list-unstyled cS-hidden">
<?php if(isset($sliderArr) && !empty($sliderArr)){
                foreach ($sliderArr as $k=>$v){
                	foreach ($v as $a=>$b){
                		$th = show_image($k,$a,$h=84,$w=60,$q=100,$dimensions='fc',$img_tag =null);
                		$main = show_image($k,$a,$h=800,$w=530,$q=100,$dimensions='fc',$img_tag =null);
                		echo '<li data-thumb="'.$th.'"><img src="'.$main.'" itemprop="photo" alt="'.$b.'" title="'.$b.'"/></li>';
                	}}}?>
</ul>
</div>
</div>
</div>
<div class="col-md-5">
<div class="top-bx-s dropdown" id="ex_drop">
<div class="col-sm-6 no-pad">
<ul class="img-set">
<?php include 'x_icons-ss-nodp.php';?>
</ul>
</div>
<div class="col-sm-6 no-pad" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dLabel">
<div class="select-bx">
<a>Exhaust Part Number..</a>
</div>
</div>
<ul class="drop-selct-dn dropdown-menu" aria-labelledby="dLabel">

<li> <p>Front Y pipe + Mid pipe with resonator + Valvetronic mufflers (L+R) + Wireless remote control kits<span><i>AUC7R-C</i></span></p></li>



</ul>
</div>
<div class="scrl-bx content_1" itemprop="description">
<p>
Awaken the Audi RS6 4.0 twin-turbo TFSI V8 engine from its hibernation; a high performance rebirth is just around the corner. Prepare to update your driving habits, our exhaust bring something different to the table. Carving out an unrestrictive pathway to liberate exhaust flow, in your possession are now blazing power and fortifying audio. The versatility of valvetronic brings a whole new dimension into play; easy-to-operate to match your desire. The upgrade is crucial for the evolving streets, we are the difference maker, if you want to keep up then step up!</p>
<p> Technology-wise, keep up with the rapidly evolving world or risk being on the list of the extinct. Arm yourself with our revolutionary road tech for a smarter driving experience. The valvetronic system introduces a new dimension of versatility; never compromise between sound and stealth. The Armytrix exclusive OBDII dongle system reduces the installation time by 50%! With clear displays and user-friendly controls, navigate through our smartphone app to attain an insightful look into the vehicle’s real-time operational status and complete control over the valve settings. Stay Connected, Stay Ahead of the Pack.
</p>
<p> Performance-wise, deviate from the routine path; go on an adventure down the road less traveled. Let the Armytrix kickstart the real automotive experience. We have tailored each exhaust for carrying the maximum payload to be delivered to thunderous effect. Our streamlined system is lighter, ridded of the OE deadweight and offers an unrestrictive flow; the improved efficiency plays a vital role in the dramatic improvements in both horsepower and torque. Celebrate the liberation of performance, write your own legacy.
</p>
<p> Quality-wise, Armytrix wouldn’t be what we are today, if not for the persistency on offering premier quality exhausts to the users. Started from the initial designing process, attention to detail was essential in laying the foundation for creating exhausts with perfect fitment. Veteran craftsmen bring the blueprints to life with unparalleled skills; each weld administered by steady hands, creating the unbreakable bond, the backbone to greater outputs. Feed your appetite for extra performance through our TI and SS series exhausts, rebel against mediocrity and take back the initiative.
</p>
</div>
</div>
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
<div class="set-sld-arm item"> <div class="row-sld">
<span><a href="http://www.youtube.com/watch?v=<?php echo $b;?>" class="popup-youtube"><img src="https://i.ytimg.com/vi/<?php echo $b;?>/mqdefault.jpg"> <i></i></a></span> </div>
</div>
<?php }}?>
</div>
</div>
<div class="clearfix"> </div>
</div>
</div>
<div class="break-line slider-sec no-line">
<div class="row">
<div class="col-sm-12">
<h4 class="slider-tx">Exhaust Sounds</h4>
<div class="slider-bx-arm-6 owl-carousel">
<?php if(!empty($exhaust)){
$index = 0;
$inGroup = false;
foreach($exhaust as $item) {
    if (!$inGroup) {
       echo '<div class="set-sld-arm  item"> <div class="row-sld">';
        $inGroup = true;
    }
	echo '<span><a href="http://www.youtube.com/watch?v='.$item.'" class="popup-youtube"><img src="https://i.ytimg.com/vi/'.$item.'/mqdefault.jpg"> <i ></i></a></span> ';
    
    if (++$index % 2 == 0) {
        echo '</div></div>';
        $inGroup = false;
    }
}
if ($inGroup) echo '</div></div>';
}?>
</div>
</div>
<div class="clearfix"> </div>
</div>
</div>
</div>
          <?php include 'x_ss_nodp_features.php';?>
<div class="container" id="control_setting">
<div class="row">
<div class="col-sm-12">
<?php include 'x_control_setting.php';?>
</div>
</div>
<div class="image-glr-bx" id="gallery">
<div class="row">
<ul class="glr-up featured_items popup-gallery">
<?php if(!empty($image_arr)){
			foreach( $image_arr as $k=>$v){ ?>
<li class="img_block">
<div class="box-pop">
<a href="<?php echo BASE_URL.$k;?>" title="<?php echo $v;?>">
<img src="<?php echo BASE_URL.$k;?>" itemprop="photo" alt="<?php echo $v;?>" title="<?php echo $v;?>">
<div class="featured_item_fadder"></div><span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
</a></div> </li>
<?php }}?>
</ul>
</div>
</div>
</div>
<div class="contact-bx-arm" id="contact_us">
<div class="container">
<div class="row">
<div class="col-sm-12">
<h1 class="head-arm-tx">
Contact Us
</h1>
</div>
<div class="clearfix"></div>
<div class="col-sm-10 col-sm-offset-1 no-pad">
<?php include 'x_form.php';?>
</div>
</div>
</div>
</div>
</div>
<?php include 'new_footer.php';?>