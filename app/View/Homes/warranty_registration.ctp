<script type="text/javascript">
var onloadCallback = function() {
grecaptcha.render('g-recaptcha', {
'sitekey' : '<?php echo DataSitekey;?>'
});
};
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

<?php 
if(isset($IsMobile)){ echo $this->html->css(array('theme','/font-awesome/css/font-awesome.min.css')); }
echo $this->html->css(array('//fonts.googleapis.com/css?family=Titillium+Web'));
echo $this->html->script(array('jquery.form.min', '/v/formValidation.min','/v/bootstrap.min'));
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
<style>
#warranty_registration{font-size:15px;font-family:'Open Sans',sans-serif}
#warranty_registration .row{width:auto;margin:0 -15px}
.mx-700{max-width:800px;padding:80px 15px;margin:auto}
#warranty_registration h2{font-family:"NimbusSanL-Bol";font-size:35px;color:#000;margin:0 0 15px}
#warranty_registration p{font-family:'Open Sans',sans-serif;font-size:24px;color:#333}
#warranty_registration .form-control{width:100%;height:45px;background:#fff;border:2px solid #ccc!important;padding:10px 15px;border-radius:3px}
#warranty_registration select.form-control{background-color:#fff;background-image:url(https://www.armytrix.com/v/arrow-down.png);background-repeat:no-repeat;background-size:15px auto;background-position:96% center}
#warranty_registration label{font-weight:600;font-size:16px;color:#000;text-align:left!important}
#warranty_registration label span{color:rgba(0,0,0,0.7);font-size:80%}
#warranty_registration label sup{color:red}
#warranty_registration .form-group{margin-bottom:20px}
.form-box-wrap{text-align:left;max-width:620px;margin:50px auto 0}
.green-sbmit-button{font-size:20px;font-weight:700;text-transform:inherit;border:2px solid #017237;background:#009245;padding:8px 40px;border-radius:5px;color:#fff;text-transform:capitalize;transition:all 500ms ease-in-out;-webkit-transition:all 500ms ease-in-out;-ms-transition:all 500ms ease-in-out}
.green-sbmit-button:hover{background:green}
@media (max-width: 767px) {
#warranty_registration h2{font-size:25px}
#warranty_registration p{font-size:18px}
.form-box-wrap{font-size:30px}
}
#ui-datepicker-div { z-index: 99!important;}

.form-control[readonly], fieldset[disabled] .form-control {
    cursor: pointer !important; 
    background-color: #eee;
    opacity: 1;
}

</style>

<div id="preloader" style="display: none"> <div id="status">&nbsp;</div> </div>
<div id="warranty_registration" class="cont-us">
  <div class="form-wrap">
    <div class="container">      
       <div class="row">
          <div class="mx-700">
            <div class="row">
            <div class="text-center col-sm-12">
            <h1>WARRANTY REGISTRATION</h1>
            <p>Enter information below to register for your 1 year warranty</p>
          </div>
        </div>
          <div class="form-box-wrap" id="wfrm_div">
          
<?php  echo $this->Form->create('Warranty',array('id'=>'kit_req'));?>
          
<div class="row">
<div class="col-sm-6"><div class="form-group"> <?php echo $this->Form->input('first_name',array('class'=>'form-control','label'=>'First Name<sup>*</sup>', 'required'=>true));?> </div></div>
<div class="col-sm-6"><div class="form-group"> <?php echo $this->Form->input('last_name',array('class'=>'form-control','label'=>'Last Name<sup>*</sup>', 'required'=>true));?> </div></div>
<div class="clearfix"></div>
<div class="col-sm-12"><div class="form-group"> <?php echo $this->Form->input('email',array('class'=>'form-control','label'=>'Email<sup>*</sup>', 'required'=>true));?> </div></div>
<div class="clearfix"></div>
<div class="col-sm-12"><div class="form-group"> <?php echo $this->Form->input('country',array('options'=>$this->Lab->country(),'empty'=>'','class'=>'form-control','label'=>'Country<sup>*</sup>', 'required'=>true));?> </div></div>
<div class="clearfix"></div>
<div class="col-sm-6"><div class="form-group"> <?php echo $this->Form->input('seller',array('class'=>'form-control','label'=>'Seller Name <span>(Shop Name)</span><sup>*</sup>', 'required'=>true));?> </div></div>
<div class="col-sm-6"><div class="form-group"> <?php echo $this->Form->input('serial_number',array('class'=>'form-control','label'=>'Exhaust Serial Number <span>(if applicable)</span>', 'required'=>false));?> </div></div>
<div class="clearfix"></div>
<div class="col-sm-6"><div class="form-group"> <?php echo $this->Form->input('shop',array('class'=>'form-control','label'=>'Installer <span>(Shop Name)</span><sup>*</sup>', 'required'=>true));?> </div></div>

<div class="col-sm-6"><div class="form-group"> <label for="ins_date">Installation Date<sup>*</sup></label><input type="date" class="form-control" id="ins_date" name="data[Warranty][installation_date]" required="required"> </div> </div>

<div class="rows clear-fx"><div class="col-sm-12"><div id="g-recaptcha"></div></div>
<div class="clearfix"></div>
<br>
<div class="clearfix"></div>
<div class="col-sm-12">
<div id="app_errr"> </div>

<div class="form-group"> <input type="button" id="but_req" value="Submit" class="btn btn-default green-sbmit-button"> </div>
</div>

</div>
    </div>
  </div>
 </div>   
</div></div>
</div></div>
<script>
$(document).ready(function() {
	$( "#WarrantyInstallationDate1" ).datepicker({
		maxDate: 0
		});
	
    $('#kit_req').formValidation({
        framework: 'bootstrap',
        icon: {},
        err: {},
        fields: { }
    }).on('success.form.fv', function(e) {
        e.preventDefault();
        var $form = $(e.target),
        fv    = $form.data('formValidation');
        fv.defaultSubmit();
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