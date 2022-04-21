<style>.gallery_item_wrapper a{text-align:center}
</style>
<div class="fullscreen_block mobile-hde2" id="tuning_box_page">
<br/>
<h1 style="font-family:verdana;font-size:42px;margin-left:70px;font-weight:bold"> ARMYTRIX VALVETRONIC EXHAUST SYSTEM </h1>
<p style="font-family:verdana;text-align:left;font-size:12px">Keep up with the rapidly evolving world or risk being on the list of the extinct. Arm yourself with our revolutionary road tech for a smarter driving experience. The valvetronic system introduces a new dimension of versatility; never compromise between sound and stealth. The Armytrix exclusive OBDII dongle system reduces the installation time by 50%! With clear displays and user-friendly controls, navigate through our smartphone app to attain an insightful look into the vehicle’s real-time operational status and complete control over the valve settings. Stay Connected, Stay Ahead of the Pack.</p>
<br/>
<h1 style="font-family:verdana;font-size:42px;margin-left:70px;font-weight:bold"> CHOOSE YOUR BRAND &dArr; &dArr; &dArr;</h1>
<div class="fs_blog_module image-grid">

<?php if(isset($data) && !empty($data)){
	foreach ($data as $list){
	$imgg = show_image('cdn/'.$list['Library']['folder'],$list['Library']['file_name'],150,150,100,'cf',null);
		?>
		
<div class="blogpost_preview_fw element"><div class="fw_preview_wrapper"><div class="gallery_item_wrapper">
<a href="<?php echo SITEURL."product-exhaust-brands/".$list['ExhaustBrand']['url'];?>" title="<?php echo $list['ExhaustBrand']['title'];?>">
<center> <img itemprop="photo" src="<?php echo $imgg;?>" alt="<?php echo @$list['Library']['alt'];?>" title="<?php echo @$list['Library']['title'];?>" class="fw_featured_image" width="540"> </center>
<div class="gallery_fadder"></div><span class="gallery_ico"><i class="stand_icon icon-eye"></i></span></a>
</div><div class="grid-port-cont"><h4>
<a href="<?php echo SITEURL."product-exhaust-brands/".$list['ExhaustBrand']['url'];?>" title="<?php echo $list['ExhaustBrand']['title'];?>"><?php echo $list['ExhaustBrand']['title'];?></a></h4>
</div>
</div>
</div>
<?php } }?>

</div>

</div>

<div class="mobile-view-show55">
<div class="head-mobl mg-btm-nn">
<a href="#" class="link-head454">CHOOSE YOUR BRAND</a>
<a href="#" class="back-hm"></a>
</div>
<ul class="brands-pg">
<?php if(isset($data) && !empty($data)){
	foreach ($data as $list){
	$imgs = show_image('cdn/'.$list['Library']['folder'],$list['Library']['file_name'],150,150,100,'cf',null); ?>
<li><a href="<?php echo SITEURL."product-exhaust-brands/".$list['ExhaustBrand']['url'];?>" title="<?php echo $list['ExhaustBrand']['title'];?>">
<img itemprop="photo" src="<?php echo $imgs;?>" alt="<?php echo @$list['Library']['alt'];?>" title="<?php echo @$list['Library']['title'];?>"><?php echo $list['ExhaustBrand']['brand_name'];?></a></li>
<?php } }?>

</ul>
<div class="bottom-moer5 text-center"><img src="<?php echo SITEURL;?>bootstrap_3_3_6/img/downarrow.png"></div>
</div>
