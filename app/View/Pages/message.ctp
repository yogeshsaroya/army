<div class="main_wrapper">
<div class="container">
  <ul class="breadcrumb">
        <li><a href="<?php echo SITEURL;?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo SITEURL;?>account">Account</a></li>
        
      </ul>
  <div class="row">
<?php echo $this->element('user_nav');?>
<div id="content" class="col-sm-9">      
<h1 class="page-title">Your Account Has Been Created!</h1>
<?php if( isset($id) && $id =='dealer_register'){?>
<p>Congratulations! Your new account has been successfully created!</p> 
<p>You can now take advantage of member privileges to enhance your online shopping experience with us.</p> 
<p>If you have ANY questions about the operation of this online shop, please e-mail us.</p> 
<p>A confirmation has been sent to the provided email address when your account get review by our team. 
If you have not received it within 1-2 working days, please <a href="<?php echo SITEURL;?>contact">contact us</a>.</p>
<?php }else{?>

      <p>Congratulations! Your new account has been successfully created!</p> <p>You can now take advantage of member privileges to enhance your online shopping experience with us.</p> 
      <p>If you have ANY questions about the operation of this online shop, please e-mail us.</p> 
      <p>A confirmation has been sent to the provided e-mail address. If you have not received it within the hour, please <a href="<?php echo SITEURL;?>contact">contact us</a>.</p>      
      <div class="buttons"><div class="pull-right"><a href="<?php echo SITEURL;?>account" class="btn btn-primary">Continue</a></div></div>
<?php }?>        
      
      </div>
    </div>
</div>
</div>
