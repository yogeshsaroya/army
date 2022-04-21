<div id="preloader" style="display: none;"><div id="status">&nbsp;</div></div>
<div class="main_wrapper">
    	<div class="container">
  <ul class="breadcrumb">
        <li><a href="<?php echo SITEURL;?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo SITEURL;?>account">Account</a></li>
      </ul>
    <div class="row">
<?php echo $this->element('user_nav');?>
<div id="content" class="col-sm-9">	<h1 class="page-title">My Wish List</h1>
<?php if(empty($data)){?> 
<p>Your wish list is empty.</p>
<?php }else{?>      
            <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-center">Image</td>
            <td class="text-left">Product Name</td>
            <td class="text-right">Stock</td>
            <td class="text-right">Unit Price</td>
            <td class="text-right">Action</td>
          </tr>
        </thead>
        <tbody>
        
<?php foreach ($data as $list){
	if($list['Product']['type'] == 1){
		$ima = json_decode($list['Product']['images'],true);
		$pImg = new_show_image('cdn/cdnimg/'.$ima[0],50,50,100,'ff',null);
	}
	elseif($list['Product']['type'] == 4){
		$abc = explode(',',$list['Product']['extra_photos']);
		$get_path = null;
		if(isset($abc[0]) && !empty($abc[0])){ $get_path = $this->Lab->getImage($abc[0]); }
		if(isset($get_path)){ $pImg = new_show_image('cdn/'.$get_path,50,50,100,'ff',null); }
		else{ $pImg = new_show_image('cdn/no_image_available.jpg',50,50,100,'ff',null); }
	}
	else{ $pImg = new_show_image('cdn/'.$list['Product']['Library']['full_path'],50,50,100,'ff',null); }
	
	
	$u = 'javascript:void(0);';
	
	if($list['Product']['type'] == 1){ $u = SITEURL."collections/products/".$list['Product']['slug'];; }
	elseif($list['Product']['type'] == 4){ $u = SITEURL."shop/".$list['Product']['slug']; }
	elseif( in_array($list['Product']['type'], array(2,3)) ){
		$getCarURL = $this->Lab->getCarURL($list['Product']['brand_id'],$list['Product']['model_id'],$list['Product']['motor_id']);
		if(!empty($getCarURL)){ $u = SITEURL."product/".$getCarURL; }
	}
	
	
?>        
	<tr>
            <td class="text-center"><a href="<?php echo $u;?>" title=""><img src="<?php echo $pImg;?>" title="" alt=""></a></td>
            <td class="text-left ptitl"><a href="<?php echo $u;?>"><?php echo $list['Product']['title'];?></a></td>
            <td class="text-right"><?php if($list['Product']['quantity'] > 0){ echo 'In Stock';}
                        else{ echo '<p class="text_red">Out of stock</p>';}?></td>
            <td class="text-right"><div class="price"><?php echo "$".num_2($list['Product']['price']);?></div></td>
            <td class="text-right">
            <?php if($list['Product']['quantity'] > 0){?>
            <button type="button" onclick="wish_list_update(<?php echo $list['Cart']['id'];?>,1);" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i></button><?php }?>
              <a href="javascript:void(0);" onclick="wish_list_update(<?php echo $list['Cart']['id'];?>,2);" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i class="fa fa-times"></i></a>
              
              </td>
          </tr>
<?php }?>          

	</tbody>
      </table>
<?php }?>      
<div id="_my_wish_list"></div>
      </div>
    </div>
</div>
</div>
<script>
function wish_list_update(id,type){

	if( id != '' && type != ""){
		$('#preloader').show();
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL;?>wishlist',
			data:'id='+id+'&type='+type+'&get=product',
			success: function(data) { $("#_my_wish_list").html(data); setTimeout(function(){ $('#preloader').hide(); }, 500); },
			error: function(comment) { $("#_my_wish_list").html(data);  setTimeout(function(){ $('#preloader').hide(); }, 500);  }}); 
		
	}
}

</script>