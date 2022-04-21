<?php if(isset($pro) && !empty($pro)){?>
<div class="fullscreen_block hided cars-id">
<div class="row">
<?php echo $this->element('list',array($arrList)); ?>

<h1 class="product_exhaust_class">  UPGRADE YOUR  &dArr; &dArr; &dArr;</h1>                           
<ul class="optionset" data-option-key="filter">
<li class="selected"><a href="#filter" data-option-value="*">All Products For <?php echo uc($data['ExhaustModel']['title']);?></a></li>
<?php /* foreach ($data['ExhaustProduct'] as $list){ ?>
	<li><a data-option-value=".<?php echo $list['id'];?>" href="#filter" title="<?php echo uc($list['Product']['title']);?>"><?php echo uc($list['Product']['title']);?></a></li>
<?php } */?>    

       </ul>
        <div class="fs_blog_module image-grid">
		<div class="head-mobl">
		<?php /*?>
   <a href="<?php echo SITEURL."product-exhaust-brands/lamborghini/".$data['ExhaustBrand']['url'];?>product-exhaust.php" title="<?php echo uc($data['ExhaustBrand']['title']);?>" class="link-head454">Car / <?php echo uc($data['ExhaustBrand']['brand_name'])." / ".uc($data['ExhaustModel']['model_name']);?></a>
   <a href="<?php echo SITEURL."product-exhaust-brands/lamborghini/".$data['ExhaustBrand']['url'];?>product-exhaust.php" title="<?php echo uc($data['ExhaustBrand']['title']);?>" class="back-hm"></a>
   <?php */?>
</div>  
<h3 class="more-infor-up">Select other model</h3>
<?php 

	foreach ($pro as $list){
		if(!empty($list['Library']['id'])){
			echo $imgg = new_show_image('cdn/'.$list['Library']['folder']."/".$list['Library']['file_name'],300,300,100,'ff',null); 
		}else{
			$ab = json_decode($list['Product']['images']);
			$imgg = new_show_image('cdn/cdnimg/'.$ab[0],300,300,100,'ff',null);
		}
		?>
            <div class="blogpost_preview_fw element <?php echo $list['Product']['id'];?>"><div class="fw_preview_wrapper">
                    <div class="gallery_item_wrapper">
                        <a href="<?php echo SITEURL."product/".$data['ItemDetail']['url'];?>" title="<?php echo $list['Product']['title'];?>">
                           <center> <img itemprop="photo" src="<?php echo $imgg;?>" alt="<?php echo $list['Product']['title'];?>" title="<?php echo $list['Product']['title'];?>" class="fw_featured_image" width="540"> </center>
                            <div class="gallery_fadder"></div><span class="gallery_ico"><i class="stand_icon icon-eye"></i></span></a>
                    </div>
                    <div class="grid-port-cont">
                        <h4>
                        <a href="<?php echo SITEURL."product/".$data['ItemDetail']['url'];?>" title="<?php echo $list['Product']['title'];?>">
                        <?php echo $list['Product']['title'];?></a></h4>
                                           
                    </div>                                            
                </div>
            </div> 
<?php } ?> 
                
                
    	</div>                       
	</div>
<?php echo $this->element('iso');?>	
<?php }?>