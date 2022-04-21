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
        <div class="col-sm-6">
		<h2>Returning Customer</h2>
		<p>NEW CUSTOMER? please visite at the <a href="<?php echo $register;?>">Register page</a>.</p>
          <div class="well">
            
            <p><strong>I am a returning customer</strong></p>
            
              <div class="form-group">
                <label class="control-label" for="input-email">E-Mail Address</label>
                <input type="text"  id="username_id" name="email" value="" placeholder="E-Mail Address" class="form-control" autocomplete="off">
              </div>
              <div class="form-group">
                <label class="control-label" for="input-password">Password</label>
                <input type="password" id="password_id" name="password" value="" placeholder="Password" class="form-control">
                
                <div id="app_error"></div>
                
                <div class="forget-password"><a href="<?php echo SITEURL;?>forgotten">Forgotten Password</a></div></div>
              <input type="button" value="Login" class="btn btn-primary" id="sign_in_btn">
            
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