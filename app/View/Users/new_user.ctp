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
                
                <div class="page-enters">
                  <h3>Register Account</h3>
<p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
<ul>
  <li><a href="<?php echo $register;?>"><img src="<?php echo SITEURL."image/armytrix-new-customer.png"?>"></a></li>
  <li><a href="<?php echo SITEURL."pages/dealer_membership";?>"><img src="<?php echo SITEURL."image/armytrix-new-dealer.png"?>"></a></li>
</ul>
                
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

<style>
  .page-enters {
    max-width: 500px;
    margin: 50px 0 50px 100px;
	overflow: hidden;
}

.page-enters h3{font-size: 20px;
text-transform: capitalize;
font-weight: 500;
margin: 0 0 10px;}

.page-enters ul{display:block; margin:40px 0 0; list-style:none; padding:0;}
.page-enters ul li{float:left; width:40%;}
.page-enters ul li:last-child{float:right;}
.page-enters ul li img{width:100%;}
.page-enters ul li a{display:block;}

@media (max-width:767px){
	.page-enters {
    margin: 20px 0 50px 50px;
}

}
@media (max-width:480px){
	.page-enters {
    margin: 20px 0 50px 0;
}

.page-enters ul li {
    float: left;
    width: 50%;
}

.page-enters ul{ margin:20px 0 0;}

}
</style>