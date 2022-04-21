<script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('g-recaptcha', {
          'sitekey' : '<?php echo DataSitekey;?>'
        });
      };
    </script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<?php 
if(isset($IsMobile)){
    echo $this->html->css(array('theme','/font-awesome/css/font-awesome.min.css'));
}
echo $this->html->css(array('//fonts.googleapis.com/css?family=Titillium+Web'));
echo $this->html->script(array('jquery.form.min', '/v/formValidation.min','/v/bootstrap.min'));
?>
<style>
h1{font-size:32px}
.sub_head{font-size:20px}
@media (max-width:900px){
#main_sec {  margin-top: 90px;color: #fff}
	
	#main_sec {
    margin-top: 46px;
	}
}
	
	
@media (max-width:480px){
#main_sec {  margin-top: 20px;color: #fff}
	#main_sec {
    margin-bottom: 58px;
}
}

</style>
<div id="new-kit-forms" class="new-kit">
  <div class="bg-form">
    <div class="container">
      <h1 class="italic-head">new kit request</h1>
       <div class="sub-line-head">
         <h4>Can't find a kit? Let us know what you drive and we may build it next.</h4>
       </div>
       <div class="rows">
<?php 
echo $this->Form->create('Request',array('id'=>'kit_req'));{?>       
         <div class="col-sm-8 col-md-9">
            <div class="form-boxd">
<div class="col-md-6">

<div class="form-group"><?php  echo $this->Form->input('year', array('type'=>'select','options'=>$this->Lab->getYears(), 'class'=>'form-control','label' => 'Year<sup>*</sup>','empty'=>' -- Select Year -- ','required'=>true));?></div>               
<div class="form-group"><?php  echo $this->Form->input('make', array('type'=>'select','options'=>$bList, 'class'=>'form-control','label' => 'Make<sup>*</sup>','empty'=>' -- Choose Below -- ','required'=>true));?> </div>
<div class="form-group"> <?php echo $this->Form->input('model',array('class'=>'form-control','label' => 'Model<sup>*</sup>','required'=>true));?> </div>  
<div class="form-group"> <?php echo $this->Form->input('email',array('type'=>'email', 'label'=>'Your Email<sup>*</sup>', 'class'=>'form-control','required'=>true ));?> </div>

</div>
<div class="col-md-6">
<div class="form-group"> <?php echo $this->Form->input('note',array('type'=>'textarea','class'=>'form-control','required'=>true,'label'=>'Other notes , Comments or Information<sup>*</sup>','placeholder'=>'Any other information that would be useful to our engineering team about your specific vehicle / kit request.'));?> </div>  
</div> 
<div class="clearfix"></div>

<div id="app_errr"></div>
<div class="rows clear-fx"><div class="col-sm-4"><div id="g-recaptcha"></div></div></div>

<div class="button-bx"> <input type="button" class="btn btn-green" value="Submit" id="but_req"> </div>
 <!--end of box-->          
            </div>
         </div>
<?php }?>         
<!--end of form-col--> 

<?php echo $this->element('c_right');?>
<div class="clearfix"></div>  
     
    </div>
  </div>
 </div> 
  
  
</div>

<script>
$(document).ready(function() {

    $('#kit_req').formValidation({
        framework: 'bootstrap',
        icon: {},
        err: {},
        fields: { }
    }).on('success.form.fv', function(e) {
        e.preventDefault();
        var $form = $(e.target),
            fv    = $form.data('formValidation');

        // Use Ajax to submit form data
        fv.defaultSubmit();
    });

	$( "#but_req" ).click(function() {
		$("#app_errr").html('');
     	 $("#kit_req").ajaxForm({ 
    	   target: '#app_errr',
    	   beforeSubmit:function(){ $("#but_req").prop("disabled",true); $("#but_req").val('Please wait.....'); }, 
    	   success: function(response)  { $("#but_req").prop("disabled",false); $("#but_req").val('Submit'); },
    	   error : function(response)  { 
    		   $('#app_errr').html('<div class="alert alert-danger alert-dismissable fade in">Sorry, this is not working at the moment. Please try again later.</div>');
    		   $("#but_req").prop("disabled",false); $("#but_req").val('Submit');
    		   },
    
    	   }).submit();
	}); 
}); 		   
</script>