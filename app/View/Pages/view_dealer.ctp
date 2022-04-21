<div id="price_inq_page" class="white-popup-block" style="max-width: 800px; height: 100%; margin: 20px auto">
<div class="modal-body">
<?php if(isset($data) && !empty($data)){?>
<div id="node-dealer-full-group-tabright1" class="col-md-6">
<div class="field-group-format-wrapper" style="display: block;">
<div class="field field-name-field-dealer-website field-type-link-field field-label-hidden">
<div class="field-items"> <div class="field-item even"><h2><?php echo $data['OurDealer']['title'];?></h2></div></div></div>
<br><br>				
<div class="field-items"> <b>Address :</b><div class="field-item even"><?php echo $data['OurDealer']['address'];?></div> </div>
<div class="field-items"><div class="field-item even"><?php echo $data['OurDealer']['country'];?></div></div><br>
<div class="field-items"><b>Phone:</b><div class="field-item even"><?php echo $data['OurDealer']['phone'];?></div></div><br>
<div class="field-items"> <b>Product Manager:</b><div class="field-item even"><?php echo $data['OurDealer']['sales_representative'];?></div> </div><br>
<div class="field-items"> <b>Shop Name:</b><div class="field-item even"><?php echo $data['OurDealer']['installation'];?></div> </div><br>
<?php if (!empty($data['OurDealer']['website'])){?><div class="field-items"><b>Website: </b><div class="field-item even"><a href="<?php echo $data['OurDealer']['website'];?>" target="_blank"><?php echo $data['OurDealer']['website'];?></a></div></div><br><?php }?>
<?php if (!empty($data['OurDealer']['line'])){?><div class="field-items"><b>Line官方: </b><div class="field-item even"><a href="<?php echo $data['OurDealer']['line'];?>" target="_blank"><?php echo $data['OurDealer']['line'];?></a></div></div><br><?php }?>
<?php if (!empty($data['OurDealer']['email'])){?> <div class="field-items"><b>Email:</b> <div class="field-item even"> <a href="mailto:<?php echo $data['OurDealer']['email'];?>"><?php echo $data['OurDealer']['email'];?></a></div></div><?php }?>
</div></div>
<?php 
if(isset($data['Library']['full_path']) && !empty($data['Library']['full_path'])){
	$pImg = new_show_image('cdn/'.$data['Library']['full_path'],640,480,100,'ff',null);
?>
<div class="col-md-6"><img src="<?php echo $pImg;?>" alt="" class="img-thumbnail"></div>
<?php }}else{?>
<div class="clearfix"></div>
<div class="alert alert-danger">
  <strong>Alert!</strong> Record not found.</div>
<?php }?>
		
		<div class="clearfix"></div>

	</div>
	<div class="modal-footer"></div>
</div>