<div class="main_wrapper">
    	<div class="container level-bx-grd">
           
<?php 
if(isset($_SESSION['Auth']['User']['role']) && $_SESSION['Auth']['User']['role'] == 3 ){
	$d = $this->Lab->getDealerStatus($_SESSION['Auth']['User']['id']);
	if(!empty($d)){
?>
<div id="level-bx">
  <div class="level-bx-grid <?php 
  if($d['level'] == 1){ echo "grid-3";}
  elseif($d['level'] == 2){ echo "grid-2";}
  elseif($d['level'] == 3){ echo "grid-1";}
  ?>">
    <div class="level-grid-content">
      <div class="txt-"><p> Your current discount level is <span><?php echo $d['ss_off'];?>%</span> off on SS products and <span><?php echo $d['titanium_off'];?>%</span> off on titanium products. </p>
       <p>You've purchassed USD <span>$<?php echo num_2($d['qut_buy']);?></span> so far this quarter</p>
       <p><?php echo $d['text'];?></p>
      </div>
      
    </div>
  </div>
</div> 
<?php }}?>
        
  <ul class="breadcrumb">
        <li><a href="<?php echo SITEURL;?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo SITEURL;?>account">Account</a></li>
      </ul>
    <div class="row">
<?php echo $this->element('user_nav');?>
<div id="content" class="col-sm-9">	  
<h1 class="page-title">My Account</h1>
      <h2>My Account</h2>
      <ul class="list-unstyled munav">
        <li><a href="<?php echo SITEURL;?>edit">Edit your account information</a></li>
        <li><a href="<?php echo SITEURL;?>password">Change your password</a></li>
        <li><a href="<?php echo SITEURL;?>address">Modify your address book entries</a></li>
        <li><a href="<?php echo SITEURL;?>wishlist">Modify your wish list</a></li>
      </ul>
      <h2>My Orders</h2>
      <ul class="list-unstyled munav">
        <li><a href="<?php echo SITEURL;?>order">View your order history</a></li>
        
        
      </ul>
      <h2>Newsletter</h2>
      <ul class="list-unstyled munav">
        <li><a href="<?php echo SITEURL;?>newsletter">Subscribe / unsubscribe to newsletter</a></li>
      </ul>
      </div>
    </div>
    
    
    
</div>
</div>
