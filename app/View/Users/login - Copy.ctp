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
                  <div class="col-xs-6">
                      <div class="well">
                          
                              <div class="form-group">
                                  <label for="username" class="control-label">Username</label>
                                  <input type="text" class="form-control" id="username_id" name="email" value="" required="" title="Please enter you username" placeholder="example@gmail.com" autocomplete="off">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password_id" name="password" value="" required="" title="Please enter your password" autocomplete="off">
                                  <span class="help-block"></span>
                              </div>
                              <div id="app_error"></div>
                              
                              <input type="button" class="btn btn-success btn-block" id="sign_in_btn" value="Login">
                              <a href="<?php echo SITEURL."help";?>" class="btn btn-default btn-block">Help to login</a>
                          
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <p class="lead">Register now for <span class="text-success">FREE</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> See all our orders</li>
                          <li><span class="fa fa-check text-success"></span> Fast order</li>
                          <li><span class="fa fa-check text-success"></span> Save your favorites</li>
                          <li><span class="fa fa-check text-success"></span> Fast checkout</li>
                          <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
                          <li><a href="<?php echo SITEURL."exhaust"?>"><u>Read more</u></a></li>
                      </ul>
                      <p><a href="<?php echo SITEURL."sign-up";?>" class="btn btn-info btn-block">Yes please, register now!</a></p>
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
		var id = $.trim($('#username_id').val());
		var pwd = $.trim($('#password_id').val());
		if(id == ""){ $('#app_error').html('<p class="text-red fadeIn animated">Please enter user id.</p>'); $('#username_id').focus();}
		else if(pwd == ""){ $('#app_error').html('<p class="text-red fadeIn animated">Please enter login password..</p>'); $('#password_id').focus()}
		else{
			$("#sign_in_btn").prop("disabled",true); $("#sign_in_btn").val('Please wait..');
			$.ajax({type: 'POST',
				url: ''+SITEURL+'users/login/',
				data: {email:id,password:pwd},
				success: function(data) { $("#app_error").html(data); },
				error: function(comment) { $("#app_error").html(comment);}
				});
			}
		});
	
});
</script>	