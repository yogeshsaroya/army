<div class="fullscreen_block cars-id" id="tuning_box_page">
<div class="row">

<?php echo $this->element('list',array($arrList)); ?>



<div class="fs_blog_module image-grid">
<?php if(isset($data) && !empty($data)){
	foreach ($data['ExhaustModel'] as $list){
		$b = explode('/',$list['image']);
		$imgg = show_image('cdn/'.$b[0],$b[1],300,300,100,'ff',null); ?>
            <div class="blogpost_preview_fw element porsche"><div class="fw_preview_wrapper">
                    <div class="gallery_item_wrapper">
                        <a href="<?php echo SITEURL."product-exhaust-brands/".$data['ExhaustBrand']['url']."/".$list['url'];?>" title="<?php echo $list['title'];?>">
                           <center> <img itemprop="photo" src="<?php echo $imgg;?>" alt="<?php echo $list['title'];?>" title="<?php echo $list['title'];?>" class="fw_featured_image" width="540"> </center>
                            <div class="gallery_fadder"></div><span class="gallery_ico"><i class="stand_icon icon-eye"></i></span></a>
                    </div>
                    <div class="grid-port-cont">
                        <h4>
                        <a href="<?php echo SITEURL."product-exhaust-brands/".$data['ExhaustBrand']['url']."/".$list['url'];?>" title="<?php echo $list['title'];?>">
                        <?php echo $list['title'];?></a></h4>
                                           
                    </div>                                            
                </div>
            </div> 
<?php } }?>            
             
    	</div>                       
	</div>
