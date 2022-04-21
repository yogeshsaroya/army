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
<div id="content" class="col-sm-9">      <h1 class="page-title">My Account Information</h1>

<?php echo $this->Form->create('User',array('class'=>'form-horizontal','id'=>'reFrm'));
$this->request->data['User'] = $data['User'];
echo $this->Form->hidden('User.id');
?>
        
<legend>Your Personal Details</legend>
<fieldset>

<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">First Name</label> 
<div class="col-sm-10"><?php echo $this->Form->input('User.first_name',array('placeholder'=>'First name','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">Last Name</label> 
<div class="col-sm-10"><?php echo $this->Form->input('User.last_name',array('placeholder'=>'Last name','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>


<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">Email</label> 
<div class="col-sm-10"><?php echo $this->Form->input('User.email',array('type'=>'email','placeholder'=>'Email address','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group"><label class="col-sm-2 control-label" for="input-firstname">Telephone</label> 
<div class="col-sm-10"><?php echo $this->Form->input('User.mobile',array('placeholder'=>'Telephone','label'=>false,'div'=>false, 'class'=>'form-control'));?></div></div>

<div class="form-group"><label class="col-sm-2 control-label" for="input-firstname">Fax</label> 
<div class="col-sm-10"><?php echo $this->Form->input('User.fax',array('placeholder'=>'Fax','label'=>false,'div'=>false, 'class'=>'form-control'));?></div></div>
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
        	'data[User][email]': {
                 validators: {
                     notEmpty: { message: 'The email address is required' },
                     regexp: { message: 'The input is not a valid email address', regexp: /\S+@\S+\.\S+/ } }
             },
        	
            'data[User][mobile]': {
                validators: {
                    notEmpty: { message: 'The phone number is required' },
                    regexp: { message: 'The phone number can only contain the digits, spaces, -, (, ), + and .', regexp: /^[0-9\s\-()+\.]+$/ }
                }
            },
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