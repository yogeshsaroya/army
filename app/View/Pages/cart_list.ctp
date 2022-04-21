<?php if(isset($getAll) && !empty($getAll)){?>
<li>
	<table class="table table-striped">
		<tbody>
<?php
$total = 0;
foreach ($getAll as $list){
	
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
	
	$amount = $list['Product']['price'] -  ( $list['Product']['price'] * $list['Product']['discount'] / 100) ;
	$amt = num_2($list['Cart']['quantity'] * $amount);
	$total+= $amt; 
	?>		
<tr>
<td class="text-center"><a href="javascript:void(0);"><img src="<?php echo $pImg?>" alt="" title="" class="img-thumbnail"></a></td>
<td class="text-left"><a href="javascript:void(0);"><?php echo substr($list['Product']['title'],0,25);?></a></td>
<td class="text-right">x <?php echo $list['Cart']['quantity'];?></td>
<td class="text-right">USD $<?php echo $amt;?></td>
<td class="text-center"><button type="button" onclick="cart_remove(<?php echo $list['Cart']['id'];?>)" title="Remove" class="btn btn-danger btn-xs"> <i class="fa fa-times"></i> </button></td>
</tr>
<?php }?>
		</tbody>
	</table>
</li>
<li>
	<div>
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td class="text-right"><strong>Sub-Total</strong></td>
					<td class="text-right">USD $<?php echo num_2($total);?></td>
				</tr>
				<tr>
					<td class="text-right"><strong>Total</strong></td>
					<td class="text-right">USD $<?php echo num_2($total);?></td>
				</tr>
			</tbody>
		</table>
		<div class="text-right button-container">
			<a href="<?php echo SITEURL;?>cart" class="addtocart">View Cart</a>&nbsp;&nbsp;&nbsp;
			<a href="<?php echo SITEURL;?>check_out" class="checkout">Checkout</a>
		</div>
	</div>
</li>
<?php }else{?>
<li><p class="text-center">Your shopping cart is empty!</p></li>
<?php }?>
