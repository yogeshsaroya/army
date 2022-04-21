<?php 
$pURL =  SITEURL."users/login";
$register =  SITEURL."register";
if(isset($r_url) && !empty($r_url)) { $pURL =  SITEURL."users/login?return_url=".urlencode($r_url);
$register =  SITEURL."register?return_url=".urlencode($r_url);
}
?>
<div class="main_wrapper">
    	<div class="container">
  <ul class="breadcrumb">
        <li><a href="<?php echo SITEURL;?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo SITEURL;?>account">Account</a></li>
        <li><a href="<?php echo SITEURL;?>login">Login</a></li>
      </ul>
      <div class="row">
<?php echo $this->element('user_nav');?>
                <div id="content" class="col-sm-9">	<h1 class="page-title">Account Login</h1>
      <div class="row">
        <div class="col-sm-12">
        <div class="col-sm-6">
		<h2>New Customer</h2>
          <div class="well">
            <p><strong>Register Account</strong></p>
            <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
            <a href="<?php echo $register;?>" class="btn btn-primary">Continue</a></div>
            </div>
            
            
        <div class="col-sm-6">
		<h2>New Dealer</h2>
          <div class="well">
            <p><strong>Register Account</strong></p>
            <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
            <a href="<?php echo SITEURL."pages/dealer_membership";?>" class="btn btn-primary">Continue</a></div>
        </div>
            
            
        </div>
        
        
      </div>
      </div>
    </div>
</div>
</div>
	<script type="text/javascript">
$(document).ready(function(){

	window['validateEmail'] = function(email) { var re = /\S+@\S+\.\S+/; return re.test(email); };
	
	$( "#sign_in_btn" ).click(function() {
		$('#app_error').html('');
		var id = $.trim($('#username_id').val());
		var pwd = $.trim($('#password_id').val());
		if(id == ""){ $('#app_error').html('<p class="text-red fadeIn animated">Please enter user id.</p>'); $('#username_id').focus();}
		else if(pwd == ""){ $('#app_error').html('<p class="text-red fadeIn animated">Please enter login password..</p>'); $('#password_id').focus()}
		else{
			$("#sign_in_btn").prop("disabled",true); $("#sign_in_btn").val('Please wait..');
			$.ajax({type: 'POST',
				url: '<?php echo $pURL;?>',
				data: {email:id,password:pwd},
				success: function(data) { $("#app_error").html(data); },
				error: function(comment) { $("#app_error").html(comment);}
				});
			}
		});
	
});
</script>	