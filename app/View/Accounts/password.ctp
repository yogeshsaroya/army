<?php echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min','/v/bootstrap.min'));?>
<div class="main_wrapper">
<div class="container">
  <ul class="breadcrumb">
        <li><a href="<?php echo SITEURL;?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo SITEURL;?>account">Account</a></li>
      </ul>
<?php echo $this->Session->flash('msg');?>      
    <div class="row">
<?php echo $this->element('user_nav');?>

<div id="content" class="col-sm-9">      
<h1 class="page-title">Change Password</h1>
<?php echo $this->Form->create('User',array('class'=>'form-horizontal','id'=>'reFrm'));?>
         <legend>Your Password</legend>
		<fieldset>
         
<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">Password</label> 
<div class="col-sm-10"><?php echo $this->Form->input('User.password',array('placeholder'=>'Password','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">Password Confirm</label> 
<div class="col-sm-10"><?php echo $this->Form->input('User.password1',array('type'=>'password','placeholder'=>'Password Confirm','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>
        </fieldset>
        <div id="app_error"></div>
        <div class="buttons clearfix">
          <div class="pull-left"><a href="<?php echo SITEURL;?>account" class="btn btn-default">Back</a></div>
          <div class="pull-right">
            <input type="button" value="Continue" class="btn btn-primary" id="sign_in_btn">
          </div>
        </div>
      </form>
      </div>


</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#reFrm')
    .formValidation({
        framework: 'bootstrap',
        icon: {},
        err: {},
        fields: {
      	  'data[User][password1]': {
              validators: {
                  identical: {
                      field: 'data[User][password]',
                      message: 'The password and its confirm are not the same'
                  }
              }
          }
        }
    })    .on('success.form.fv', function(e) {
        e.preventDefault();
        var $form = $(e.target),
            fv    = $form.data('formValidation');
        fv.defaultSubmit();
    });

	window['validateEmail'] = function(email) { var re = /\S+@\S+\.\S+/; return re.test(email); };
	
	$( "#sign_in_btn" ).click(function() {
		$('#app_error').html('');
			     $("#reFrm").ajaxForm({ 
		    	   target: '#app_error',
		    	   beforeSubmit:function(){ $("#sign_in_btn").prop("disabled",true); $("#sign_in_btn").val('Please wait..'); }, 
		    	   success: function(response)  { $("#app_error").html(response); },
		    	   error : function(response)  { 
		    		   $('#app_error').html('<div class="alert alert-danger alert-dismissable fade in">Sorry, this is not working at the moment. Please try again later.</div>');
		    		   $("#sign_in_btn").prop("disabled",false); $("#sign_in_btn").val('Continue');  
			    	   },
		    	   }).submit(); 
		});
	
});
</script>	