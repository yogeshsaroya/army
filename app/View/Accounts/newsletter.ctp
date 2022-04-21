<?php echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min','/v/bootstrap.min'));?>
<div class="main_wrapper account-newsletter">
<div class="container">
  <ul class="breadcrumb">
        <li><a href="<?php echo SITEURL;?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo SITEURL;?>account">Account</a></li>
      </ul>
<?php echo $this->Session->flash('msg');?>      
    <div class="row">
<?php echo $this->element('user_nav');?>

<div id="content" class="col-sm-9">      
<h1 class="page-title">Newsletter Subscription</h1>
        <fieldset>
          <div class="form-group">
            <label class="col-sm-2 control-label">Subscribe</label>
            <div class="col-sm-10">
<?php

$options = array('1' => 'Yes', '0' => 'No');
$attributes = array('legend' => false,'default'=>$data['User']['subscription'],'class'=>'tm-radio','label'=>false);
echo $this->Form->radio('User.subscription', $options, $attributes);?>            

</div>
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
	$( "#sign_in_btn" ).click(function() {
		$('#app_error').html('');

		var n  = $("input[name='data[User][subscription]']:checked").val()
		
		$("#sign_in_btn").prop("disabled",true); $("#sign_in_btn").val('Please wait..');
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL."newsletter";?>',
			data: 'subscription='+n+'',
			success: function(data) { $("#app_error").html(data); $("#sign_in_btn").prop("disabled",false); $("#sign_in_btn").val('Continue');},
			error: function(comment) { $("#app_error").html(comment); $("#sign_in_btn").prop("disabled",false); $("#sign_in_btn").val('Continue'); }});
		
		});
	
});
</script>	