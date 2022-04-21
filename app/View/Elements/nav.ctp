<?php 
//echo "<style> #main_sec { margin-top: 43px !important } </style>"; 
?>
<div class="logo-head">
<div class="col-sm-4"><div class="logo-in"><a href="<?php echo SITEURL;?>"><img src="<?php echo SITEURL;?>img/logo.png" alt=""></a></div></div>
<div class="col-sm-8">

<div class="top-header-block">                             
<div class="search-cart "> 


<div class="input-group hide" id="search">
<button class="btn btn-default btn-lg" type="button"><i class="fa fa-search"></i></button>
<input class="form-control input-lg" placeholder="Search" value="" name="search" id="army_search" type="text"></div>

  
<div id="cart" class="btn-group btn-block">
<button type="button" id="_cart_btn" data-toggle="dropdown" data-loading-text="Loading..." class="btn btn-inverse btn-block btn-lg dropdown-toggle" aria-expanded="false">
<i class="fa fa-shopping-cart"></i> <span id="cart-total"><?php if(isset($getAll)){ echo count($getAll); }else{ echo "0";}?> item(s) </span></button>
<ul class="dropdown-menu pull-right cart-menu" id="_my_cart" style="display:none">

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
</ul>
</div>


<?php if(isset($ArmyArr['cart'])) { echo $ArmyArr['cart']; } ?> 
<div class="nav pull-right" id="top-links">  
<ul class="list-inline">
<?php /*?>
<li class="dropdown myaccount">
<a data-toggle="dropdown" class="dropdown-toggle" title="My Account" href="<?php echo SITEURL;?>accounts/account"><i class="fa fa-user"></i> 
<span class="hidden-xs hidden-sm hidden-md">
<?php if(isset($_SESSION['Auth']['User']['id']) && !empty($_SESSION['Auth']['User']['id'])){ echo "Hi ".$_SESSION['Auth']['User']['first_name'];}else{ echo "My Account";}?></span> <span class="caret"></span></a>
                  
<ul class="dropdown-menu dropdown-menu-right myaccount-menu">
<?php if(isset($_SESSION['Auth']['User']['id']) && !empty($_SESSION['Auth']['User']['id'])){?> 
<li><a href="<?php echo SITEURL;?>account">My Account</a></li>
<li><a href="<?php echo SITEURL;?>accounts/order">Order History</a></li>
<li><a href="<?php echo SITEURL;?>address">Address Book</a></li>
<li><a href="<?php echo SITEURL;?>users/logout">Logout</a></li>
<?php }else{?>
<li class=""><?php echo $this->Html->link('Register','/users/new_user');?></li>
<li class=""><?php echo $this->Html->link('Sign In','/login');?></li>
<?php }?>
</ul>
</li>
<?php */ /*?>
<li><a href="<?php echo SITEURL;?>wishlist" id="wishlist-total" title=""><i class="fa fa-heart"></i> <span class="hidden-xs hidden-sm hidden-md" id="_wish_list">Wish List (<?php echo @$getWish;?>)</span></a></li>
<?php */?>

<li><a title="Checkout" href="<?php echo SITEURL;?>homes/sema"><img alt="" src="<?php echo SITEURL;?>v_4/sema_logo.png" width="100px"></a></li>

<li><a title="Checkout" href="<?php echo SITEURL;?>warranty_registration"><span class="hidden-xs hidden-sm hidden-md">Warranty Registration</span></a></li>


<li><a title="Checkout" class="popup-modal" href="#od_st_modal"><span class="hidden-xs hidden-sm hidden-md">Check your order</span></a></li>
<li><a title="Checkout" href="<?php echo SITEURL;?>cart"><i class="fa fa-share"></i> <span class="hidden-xs hidden-sm hidden-md">Checkout</span></a></li>


</ul>              
</div>
</div>
</div>  
 </div>
 
 
<div class="clearfix"></div>
</div>    


<div id="od_st_modal" class="white-popup-block mfp-hide">
	<h2>Check Order Status</h2>
	
<div class="row">
  <div class="col-lg-12">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Enter Order Number... " id="ord_num" autofocus="autofocus">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" id="od_s">Go!</button>
      </span>
    </div>
    <br>
	<p class="text-right"><a class="popup-modal-dismiss" href="#">Close</a></p>
  </div>
</div>
	
</div>
<script>
$(function () {

	$("#od_s").click(function(){
		  var n = $.trim ( $("#ord_num").val() );
		  location.href = SITEURL+"pages/order/success/"+n;
		  
		});
	
	$('.popup-modal').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#username',
		modal: true
	});
	$(document).on('click', '.popup-modal-dismiss', function (e) {
		e.preventDefault();
		$.magnificPopup.close();
	});
});
</script>

 