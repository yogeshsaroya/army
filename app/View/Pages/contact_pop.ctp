<div id="custom-content" class="white-popup-block">
<?php echo $this->html->script(array('jquery.form.min', '/v/formValidation.min','/v/bootstrap.min'));?>
<script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('g-recaptcha', {
          'sitekey' : '<?php echo DataSitekey;?>'
        });
      };
    </script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

    <h1 class="test"> </h1>
    <style>
.white-popup-block{
    max-width:500px; margin: 20px auto;
}

    #custom-content img {max-width: 100%;margin-bottom: 10px;}
    .nopadding {
   padding: 0 0 0 0 !important;
   margin: 0 0 5px;
}

.white-popup-block label {
    color: #777;
    font-size: 15px;
    font-weight: 600;
}

.white-popup-block input , .white-popup-block select , .white-popup-block textarea{
    background: #999999;
    color:#fff;
    font-size: 14px;
} 

textarea.form-control{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	display: block;
    background: none;
	text-shadow: none;
	font-size: 13px;
	line-height: 20px;		
	padding: 9px 18px 11px 18px;
		border-radius: 0;
	margin: 10px 0 7px 0;
	-webkit-appearance: none !important;
	outline: none;
    background: #999999;
}

button.btn.btn-green {
    font-family: "NimbusSanL-Bol";
    text-transform: capitalize;
    letter-spacing: 2px;
    font-size: 25px !important;
   padding: 5px 55px 5px !important;
    background: #2ab464;
    color: #fff !important;
    border-radius: 5px !important;
    transition: all 500ms ease;
    -webkit-transition: all 500ms ease;
    display: inline-block;
    height: auto !important;
    margin-right: 15px;
    margin-top: 15px;
}

button.btn.btn-green:last-child {margin-right: 0;}

button.btn.btn-green:hover{
    filter: contrast(130%);
    -webkit-filter: contrast(130%);
}

.row_in {
    margin: 0 -10px;
}

.padding_half {
    padding: 0 10px;
    margin: 0 0 5px;
}
 </style>


<div>

<div class="rows">
<?php  echo $this->Form->create('Request',array('id'=>'kit_req'));?>       
         <div class="row">
            <div class="form-boxd">
             <h4> &nbsp; </h4>
<div class="col-md-12">

<div class="row_in"><div class="form-group padding_half col-md-6"><?php echo $this->Form->input('f_name',array('class'=>'form-control','label'=>'First Name<sup>*</sup>', 'required'=>true));?></div>
<div class="form-group padding_half col-md-6"><?php echo $this->Form->input('l_name',array('class'=>'form-control','label'=>'Last Name<sup>*</sup>', 'required'=>true));?> </div>
<div class="clearfix"></div>
</div>

<div class="form-group nopadding col-md-12"><?php echo $this->Form->input('location',array('class'=>'form-control','label'=>'Country/State/City<sup>*</sup>', 'required'=>true));?> </div>
<div class="form-group nopadding col-md-12"><?php echo $this->Form->input('zip_code',array('class'=>'form-control','label'=>'Zip Code<sup>*</sup>', 'required'=>true));?></div>

<div class="form-group nopadding col-md-12"><?php echo $this->Form->input('phone',array('type'=>'text', 'class'=>'form-control','label'=>'Phone<sup>*</sup>', 'required'=>true));?></div>
<div class="form-group nopadding col-md-12"><?php echo $this->Form->input('email',array('class'=>'form-control','label'=>'Email<sup>*</sup>', 'required'=>true));?> </div>
<div class="form-group nopadding col-md-12"><?php echo $this->Form->input('confirm_email',array('class'=>'form-control','label'=>'Confirm Email<sup>*</sup>', 'required'=>true));?> </div>
<div class="form-group nopadding col-md-12"><?php echo $this->Form->input('for',array('class'=>'form-control','label'=>'For (vehicle Year / Make / Model)<sup>*</sup>', 'required'=>true));?></div>
<div class="form-group nopadding col-md-12"><?php echo $this->Form->input('message',array('type'=>'textarea','rows'=>5, 'class'=>'form-control','label'=>'Message<sup>*</sup>', 'required'=>true));?></div>
</div>
           
<div class="clearfix"></div>   

<div id="app_errr"></div>           
<div class="rows clear-fx"><div class="col-sm-4"><div id="g-recaptcha"></div></div>

<div class="col-sm-12">
<div class="button-bx clr-btn">
  <button class="btn btn-green" onclick="$.magnificPopup.close();">Close</button> 
  <button type="button" class="btn btn-green sbmt-big" id="but_req">submit</button>
</div>
</div>
</div>  
</div>
</div>
<?php echo $this->Form->end();?>         
<!--end of form-col--> 

<script>
$(document).ready(function() {

    $('#kit_req').formValidation({
        framework: 'bootstrap',
        icon: {},
        err: {},
        fields: {
            'data[Request][confirm_email]': {
                validators: {
                    notEmpty: {
                        message: 'The email is required'
                    },
                    callback: {
                        callback: function(value, validator, $field) {
                            var em2 = $field.val();
                            var em = $('#RequestEmail').val();
                            if (em2 == em) {
                                return true;
                            }else{
                            	return {
                                    valid: false,
                                    message: 'Email address does not match'
                                } }
                        }
                    }
                }
            }
        }
    }).on('success.form.fv', function(e) {
        e.preventDefault();
        var $form = $(e.target),
            fv    = $form.data('formValidation');

        // Use Ajax to submit form data
        fv.defaultSubmit();
    });

    
    $( "#clr" ).click(function() {
    	$('#kit_req')[0].reset();
    	grecaptcha.reset();
    });
	$( "#but_req" ).click(function() {
		$("#app_errr").html('');
     	 $("#kit_req").ajaxForm({ 
    	   target: '#app_errr',
    	   beforeSubmit:function(){ $("#preloader").show(); }, 
    	   success: function(response)  { $("#preloader").hide(); },
    	   error : function(response)  { 
    		   $('#app_errr').html('<div class="alert alert-danger alert-dismissable fade in">Sorry, this is not working at the moment. Please try again later.</div>');
    		   $("#preloader").hide();
    		   },
    
    	   }).submit();
	}); 
}); 		   
</script>
   <div class="clearfix"></div>    
    </div>

</div>    
<button title="Close (Esc)" type="button" class="mfp-close">×</button></div>