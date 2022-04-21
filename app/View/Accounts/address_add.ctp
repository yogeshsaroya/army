<?php echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min','/v/bootstrap.min'));?>
<div class="main_wrapper">
    	<div class="container">
  <ul class="breadcrumb">
        <li><a href="<?php echo SITEURL;?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo SITEURL;?>account">Account</a></li>
      </ul>
    <div class="row">
<?php echo $this->element('user_nav');?>
<div id="content" class="col-sm-9">       
<h1 class="page-title">Address Book</h1>
<h2><?php if(isset($new) && $new == 'yes'){ echo "New";}else{ echo "Edit";}?> Address</h2>
<?php echo $this->Form->create('Address',array('class'=>'form-horizontal','id'=>'reFrm'));
echo $this->Form->input('Address.user_id',array('type'=>'hidden','value'=>ME));
?>	  
<fieldset id="address">

<div class="form-group"><label class="col-sm-2 control-label" for="input-firstname">Company</label> 
<div class="col-sm-10"><?php echo $this->Form->input('Address.company',array('placeholder'=>'Company','label'=>false,'div'=>false, 'class'=>'form-control'));?></div></div>

<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">Address 1</label> 
<div class="col-sm-10"><?php echo $this->Form->input('Address.address',array('type'=>'text','placeholder'=>'Address 1','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>


<div class="form-group"><label class="col-sm-2 control-label" for="input-firstname">Address 2</label> 
<div class="col-sm-10"><?php echo $this->Form->input('Address.address_2',array('type'=>'text','placeholder'=>'Address 2','label'=>false,'div'=>false, 'class'=>'form-control'));?></div></div>

<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">City</label> 
<div class="col-sm-10"><?php echo $this->Form->input('Address.city',array('placeholder'=>'City','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">Post Code</label> 
<div class="col-sm-10"><?php echo $this->Form->input('Address.zip',array('placeholder'=>'Post Code','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>


<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">Country</label> 
<div class="col-sm-10"><?php echo $this->Form->input('Address.country',array('options'=> $this->Lab->getCountry(),'label'=>false,'div'=>false,'empty'=>' --- Please Select --- ', 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">Region / State</label> 
<div class="col-sm-10"><?php echo $this->Form->input('Address.state',array('options'=>array(),'label'=>false,'div'=>false,'empty'=>' --- Please Select --- ', 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group">
<label class="col-sm-2 control-label">Default Address</label>

<?php 
$options = array('1' => 'Yes', '0' => 'No');
$attributes = array('legend' => false,'default'=>'0','class'=>'tm-radio');
echo $this->Form->radio('Address.default_address', $options, $attributes);?>
</div>
</fieldset>
        
        
        <div id="app_error"></div>
        <div class="buttons clearfix">
          <div class="pull-left"><a href="<?php echo SITEURL;?>address" class="btn btn-default">Back</a></div>
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

	$( "#AddressCountry" ).change(function() {
		
        var id =this.value;
    	var datastring = "id="+id+"";
    	var sel_option= $('#AddressState');
		$(function(){ $.ajax({type: 'POST',async:false,
		url: '<?php echo SITEURL;?>users/get_state/',
		data: datastring,
		success: function(data){ $('#app_error').html(data);},
		error: function(comment){  $('#app_error').html(comment); }  });  });
	});

	$('#reFrm')
    .formValidation({
        framework: 'bootstrap',
        icon: { },
        err: { },
        fields: { }
    })    .on('success.form.fv', function(e) {
        // Prevent form submission
        e.preventDefault();

        var $form = $(e.target),
            fv    = $form.data('formValidation');

        // Use Ajax to submit form data
        fv.defaultSubmit();
    });

	window['validateEmail'] = function(email) { var re = /\S+@\S+\.\S+/; return re.test(email); };
	
	$( "#sign_in_btn" ).click(function() {
		$('#app_error').html('');

		/*var f = $.trim($('#UserFirstName').val());
		var l = $.trim($('#UserLastName').val());
		var e = $.trim($('#UserEmail').val());
		var p = $.trim($('#UserPassword').val());
		
		if(f == ""){ $('#app_error').html('<p class="alert alert-danger">Please enter First Name.</p>'); $('#UserFirstName').focus();}
		else if(l == ""){ $('#app_error').html('<p class="alert alert-danger">Please enter Last Name.</p>'); $('#UserLastName').focus();}
		else if(l == ""){ $('#app_error').html('<p class="alert alert-danger">Please enter Last Name.</p>'); $('#UserLastName').focus();}
		else if(e == "" ){ $('#app_error').html('<p class="alert alert-danger">Please enter email address</p>'); $('#UserEmail').focus()}
		else if(!validateEmail(e)){ $('#app_error').html('<p class="alert alert-danger">Please enter valid email address</p>'); $('#UserEmail').focus()}
		else if(p == "" ){ $('#app_error').html('<p class="alert alert-danger">Please enter password</p>'); $('#UserPassword').focus()}
		else if($("#field_terms").prop('checked') == false){ $('#app_error').html('<p class="alert alert-danger">Please accept the Terms and Conditions</p>'); }
		else{ */
			     $("#reFrm").ajaxForm({ 
		    	   target: '#app_error',
		    	   beforeSubmit:function(){ $("#sign_in_btn").prop("disabled",true); $("#sign_in_btn").val('Please wait..'); }, 
		    	   success: function(response)  { $("#app_error").html(response); },
		    	   error : function(response)  { 
		    		   $('#app_error').html('<div class="alert alert-danger alert-dismissable fade in">Sorry, this is not working at the moment. Please try again later.</div>');
		    		   $("#sign_in_btn").prop("disabled",false); $("#sign_in_btn").val('Continue');  
			    	   },
		    	   }).submit(); 

			/* } */
		});
	
});
</script>	