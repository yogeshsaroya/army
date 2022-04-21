<?php 
if(isset($IsMobile) && $IsMobile == 'yes'){?>
<style>
#main_sec { margin-top: 6%;}
</style>
<div id="mobile-army-tx">
<div class="bnr-arm-tx"><img src="<?php echo SITEURL;?>bootstrap_3_3_6/img/image-banner.jpg"></div>
<div class="links-tx">
<a href="<?php echo SITEURL;?>product-exhaust">Exhaust system <i class="arw-grn"></i></a>
<a href="<?php echo SITEURL;?>tuning_search">ECU tuning <i class="arw-grn"></i></a>

<a href="<?php echo SITEURL;?>shop/armynator-cel-delete-dongle">CEL DELETE DONGLE <i class="arw-grn"></i></a>
</div>
<div class="col-sm-12" style="display: none">
<ul class="links-ul">
<li><a href="<?php echo SITEURL;?>blog">Tunning news </a></li>
<li><a href="<?php echo SITEURL;?>shop">Store </a></li>
<li><a href="<?php echo SITEURL;?>dealer">Dealers</a></li>
<li><a href="<?php echo SITEURL;?>contact">Contact us</a></li>
</ul>
</div>
</div>
<?php }else{?>
<div class="container">
<div class="padi-box border-btm">
<div class="col-sm-4 col-md-4"><h3 class="ind-head">TRENDING <small>NOW</small></h3></div>
<div class="col-sm-8 col-md-6 col-md-offset-1"> <p class="text-ind pad-lft">By following the creed of achieving the most power, superior sound and true versatility, we build supreme performance valvetronic exhaust systems that are second to none. All fostered by a culture of perseverance and innovation. ARMYTRIX not only creates exhausts, we create experiences.</p></div>
<div class="clearfix"></div>
</div>
</div>
<div class="container items3 featured_posts">
<?php $getNewRelease = $this->Lab->getNewRelease();
if(!empty($getNewRelease)){
	foreach ($getNewRelease as $list){ 
	if(isset($list['Library']['full_path'])){
		$img = new_show_image("cdn/".$list['Library']['full_path'],342,228,100,'ff',null);
	}else{
		$img = new_show_image("cdn/no_image_available.jpg",342,228,100,'ff',null);
	}
		?>

<div class="col-sm-4 padi-box">
<div class="gallery_item_wrapper">
<a href="<?php echo $list['NewRelease']['link'];?>">
<img src="<?php echo $img;?>" alt="<?php echo $list['NewRelease']['title'];?>">
<span class="gallery_fadder"></span>
<span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
</a> </div>
<div class="links-pg"><a href="<?php echo $list['NewRelease']['link'];?>"><?php echo $list['NewRelease']['title'];?></a></div>
</div>
	
	<?php } } ?>

<div class="clearfix"></div>
</div>

<?php }?>
<div class="clearfix"></div>
