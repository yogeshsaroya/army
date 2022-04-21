<div class="main_wrapper">
<div class="container">
  <ul class="breadcrumb">
        <li><a href="<?php echo SITEURL;?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo SITEURL;?>account">Account</a></li>
        <li><a href="<?php echo SITEURL;?>forgotten">Forgotten Password</a></li>
      </ul>
    <div class="row">
<?php echo $this->element('user_nav');?>
                <div id="content" class="col-sm-9">      <h1 class="page-title">Forgot Your Password?</h1>
      <p>Enter the e-mail address associated with your account. Click submit to have your password e-mailed to you.</p>
      
       
          <legend>Your E-Mail Address</legend>
 <fieldset>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-email">E-Mail Address</label>
            <div class="col-sm-10">
              <input type="text" name="email" value="" placeholder="E-Mail Address" id="input-email" class="form-control">
            </div>
          </div>
        </fieldset>
        <div class="buttons clearfix">
        <div id="app_error"></div>
        </div>
        <div class="buttons clearfix">
          <div class="pull-left"><a href="<?php echo SITEURL;?>login" class="btn btn-default">Back</a></div>
          <div class="pull-right">
            <input type="button" value="Continue" class="btn btn-primary" id="sign_in_btn">
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
		var id = $.trim($('#input-email').val());
		if(id == ""){ $('#app_error').html('<div class="alert alert-danger">Please enter email address</div>'); $('#username_id').focus();}
		else if(!validateEmail(id)){ $('#app_error').html('<div class="alert alert-danger">Please enter valid email address</div>'); $('#username_id').focus();}
		else{
			$("#sign_in_btn").prop("disabled",true); $("#sign_in_btn").val('Please wait..');
			$.ajax({type: 'POST',
				url: '<?php echo SITEURL."forgotten";;?>',
				data: {email:id},
				success: function(data) { $("#app_error").html(data); },
				error: function(comment) { $("#app_error").html(comment);}
				});
			}
		});
	
});
</script>	