<?php echo $this->Html->script(array('jquery.form.min'));?>
<style>
fieldset {
    border: thin solid #ccc; 
    border-radius: 4px;
    padding: 20px;
    padding-left: 40px;
    background: #fbfbfb;
}
legend {
   color: #678;
}
.form-control {
    width: 95%;
}
label small {
    color: #678 !important;
}
span.req {
    color:maroon;
    font-size: 112%;
}
</style>
<div class="main_wrapper">
    	<div class="bg_sidebar is_left-sidebar"></div>
        <div class="content_wrapper">
            <div class="container">
                <div class="content_block row left-sidebar">
                    <div class="fl-container">
                        <div class="row">
                            <div class="posts-block hasLS">
                                <div class="contentarea">
                                    <div class="row">
                                    	<div class="span12 module_number_2 module_cont pb0 module_blog">                                        	
    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel">Welcome to Armytrix </h4>
          </div>
          <div class="modal-body">
              <div class="row">
             <div class="col-xs-12">
             <div class="well1">
    
            <div class="col-md-12">
            <?php echo $this->Form->create('User');?>
            <div class="form-group"><label for="firstname"><span class="req">* </span> First name: </label>
            <?php echo $this->Form->input('first_name', array('label' => false, 'placeholder' => 'First Name','class'=>'form-control','autocomplete'=>'off','required'=>'required','label'=>false));?></div>
            
            <div class="form-group"><label for="firstname"><span class="req">* </span> Last name: </label>
            <?php echo $this->Form->input('last_name', array('label' => false, 'placeholder' => 'Last Name','class'=>'form-control','autocomplete'=>'off','required'=>'required','label'=>false));?></div>
            
            <div class="form-group"><label for="firstname"><span class="req">* </span> Email: </label>
            <?php echo $this->Form->input('email', array('label' => false, 'placeholder' => 'Email address','class'=>'form-control','autocomplete'=>'off','required'=>'required','label'=>false));?></div>
            
            <div class="form-group"><label for="firstname"><span class="req">* </span> Password: </label>
            <?php echo $this->Form->input('password', array('label' => false, 'placeholder' => 'Password','class'=>'form-control','autocomplete'=>'off','required'=>'required','label'=>false));?></div>
            <div class="form-group">
                <hr>
                <input type="checkbox" required name="terms" id="field_terms" >  
                <label for="terms">I agree with the <a href="<?php echo SITEURL."terms-and-conditions";?>" title="You may read our terms and conditions by clicking on this link">terms and conditions</a> for Registration.</label><span class="req">* </span>
            </div>

			<div class="form-group"><div id="app_error"></div></div>
            <div class="form-group">
                <input class="btn btn-block btn-success" type="button" name="submit_reg" id="sign_in_btn" value="Register">
                <br><br>
                <p><a href="<?php echo SITEURL."login";?>" class="btn btn-info btn-block">Already have an account? Sign in</a></p>
            </div>
            </fieldset>
            </form><!-- ends register form -->

<script type="text/javascript">
  document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");
</script>
        </div><!-- ends col-6 -->
      
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </div>
                                        </div><!-- .module_cont -->                                    
                                    </div>
                                </div>                                
                            </div>                                                      
                            <div class="left-sidebar-block">
                                <div class="sidepanel widget_categories">
                                    <h6 class="sidebar_header">Categories</h6>
                                    <ul>
                                        <li><a href="javascript:void(0)">Advertisement</a></li>
                                        <li><a href="javascript:void(0)">Cities</a></li>
                                        <li><a href="javascript:void(0)">Fashion</a></li>
                                        <li><a href="javascript:void(0)">Nature</a></li>
                                        <li><a href="javascript:void(0)">People</a></li>
                                        <li><a href="javascript:void(0)">Stuff</a></li>
                                    </ul>
                                </div>
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
		var f = $.trim($('#UserFirstName').val());
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
		else{
			     $("#UserSignUpForm").ajaxForm({ 
		    	   target: '#app_error',
		    	   beforeSubmit:function(){ $("#sign_in_btn").prop("disabled",true); $("#sign_in_btn").val('Please wait..'); }, 
		    	   success: function(response)  { $("#app_error").html(response); },
		    	   error : function(response)  { 
		    		   $('#app_error').html('<div class="alert alert-danger alert-dismissable fade in">Sorry, this is not working at the moment. Please try again later.</div>');
		    		   $("#sign_in_btn").prop("disabled",false); $("#sign_in_btn").val('Register');  
			    	   },
		    	   }).submit(); 

			}
		});
	
});
</script>	