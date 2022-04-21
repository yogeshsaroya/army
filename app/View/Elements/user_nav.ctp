<?php if(isset($_SESSION['Auth']['User']['id']) && !empty($_SESSION['Auth']['User']['id'])){ 
$m = $this->Lab->totalMsg($_SESSION['Auth']['User']['id']);
	?>
<style>
#msg_c {
    background: green;
    border-radius: 50%;
    height: 20px;
    width: 20px;
    color: #fff;
    text-align: center;
    display: block;
    float: right;
}
</style>
<aside id="column-left" class="col-sm-3 hidden-xs">
	<div class="box">
		<div class="box-heading">Account</div>
		<div class="list-group">
			<a href="<?php echo SITEURL;?>account" class="list-group-item">My Account</a> 
			<a href="<?php echo SITEURL;?>edit" class="list-group-item">Edit Account</a>
			<a href="<?php echo SITEURL;?>order" class="list-group-item">Order History <?php if($m > 0){ echo "<span id='msg_c'>$m</span>";}?></a>
			<a href="<?php echo SITEURL;?>download_manual" class="list-group-item">Download Manual </a> 
			<a href="<?php echo SITEURL;?>password" class="list-group-item">Password</a> 
			<a href="<?php echo SITEURL;?>address" class="list-group-item">Address Book</a> 
			<a href="<?php echo SITEURL;?>wishlist" class="list-group-item">Wish List</a> 
			 
			
			<a href="<?php echo SITEURL;?>newsletter" class="list-group-item">Newsletter</a> 
			<a href="<?php echo SITEURL;?>users/logout" class="list-group-item">Logout</a>
		</div>
	</div>
</aside>

<?php }else{?>
<aside id="column-left" class="col-sm-3 hidden-xs">
	<div class="box">
		<div class="box-heading">Account</div>
		<div class="list-group">
			<a href="<?php echo SITEURL;?>login" class="list-group-item">Login</a>
			<a href="<?php echo SITEURL;?>users/new_user" class="list-group-item">Register</a>
			<a href="<?php echo SITEURL;?>forgotten" class="list-group-item">Forgotten Password</a> 
			<a href="<?php echo SITEURL."login?return_url=".urlencode(SITEURL."account");?>" class="list-group-item">My Account</a> 
			<a href="<?php echo SITEURL."login?return_url=".urlencode(SITEURL."address");?>" class="list-group-item">Address Book</a> 
			<a href="<?php echo SITEURL."login?return_url=".urlencode(SITEURL."wishlist");?>" class="list-group-item">Wish List</a> 
			<a href="<?php echo SITEURL."login?return_url=".urlencode(SITEURL."order");?>" class="list-group-item">Order History</a>
			
			<a href="<?php echo SITEURL."login?return_url=".urlencode(SITEURL."newsletter");?>" class="list-group-item">Newsletter</a>
		</div>
	</div>
</aside>
<?php }?>
<script>
$( ".box-heading" ).click(function() {
  $( ".list-group" ).toggle( "slow" );
});
</script>
 
