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

#new-kit-forms .col-sm-6.form-group:first-child {
    padding-right: 5px;
}

#new-kit-forms .col-sm-6.form-group:last-child {
    padding-left: 5px;
}

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
<div id="new-kit-forms" class="cont-us">
  <div class="bg-form">
    <div class="container">
      <h1 class="italic-head grn-line">usd $150 immediate paypal rebate!</h1>
       <div class="sub-line-head"></div>
       <div class="rows">
         <div class="col-md-9">
            <div class="form-boxd">
             <div class="col-sm-12">
				<h2 class=italc-bold>IF you are armytrix equipped oweners, go dyno your car,
filmit and send it to us, we ar giving you rebate
simple as that!</h2>
				<ul>
					<li>video quality must be more than 1080p</li>
					<li>smust film it behind (rear) the vehicle</li>
					<li>send us the video via youtube link or dropbox link</li>						
				</ul>
           </div>
				<div class="clearfix"></div>        
<?php  echo $this->Form->create('Request',array('id'=>'kit_req'));?>               
<div class="col-md-5 col-sm-10">
                <div class="form-group">
                 <label for="pwd">Name<sup>*</sup></label>
<div class="clear-fx cntct">

<div class="col-sm-6 form-group lp"> <?php echo $this->Form->input('f_name',array('class'=>'form-control','placeholder'=>'First', 'required'=>true,'label'=>false));?> </div>				   
<div class="col-sm-6 form-group no-padding"><?php echo $this->Form->input('l_name',array('class'=>'form-control','placeholder'=>'Last', 'required'=>true,'label'=>false));?> </div>
</div>
</div>                
               
<div class="form-group"> <?php echo $this->Form->input('email',array('type'=>'email', 'label'=>'Email<sup>*</sup>', 'class'=>'form-control','required'=>true ));?></div>
<div class="form-group"><?php echo $this->Form->input('link',array('type'=>'text','class'=>'form-control','label'=>'Video Link<sup>*</sup>','required'=>true));?></div>
<div class="form-group"> <?php echo $this->Form->input('paypal',array('type'=>'email', 'label'=>'Paypal Account<sup>*</sup>', 'class'=>'form-control','required'=>true ));?></div>
                         
<div class="rows clear-fx"><div id="g-recaptcha"></div></div>                              
<div id="app_errr"></div>                                                
<div class="button-bx clr-btn form-group"><input type="button" class="btn btn-green" value="Submit" id="but_req"></div>                                 
 </div> 
 <?php echo $this->Form->end();?>     
          <!--end of second form-box--> 
        <div class="clearfix"></div>   
                 
 <!--end of box-->
           
				<div class="col-sm-6">
					<div class="hvr-img">
					 <a class="popup-youtube" href="https://www.youtube.com/watch?v=Y_KRAr9CLbk"> <img src="https://img.youtube.com/vi/Y_KRAr9CLbk/0.jpg">
					  <div class="icon-hvr"></div>
						 </a>	
                    </div>					
				</div> 
           
               <div class="col-sm-6">
					<div class="hvr-img">
					 <a class="popup-youtube" href="https://www.youtube.com/watch?v=5KmvkLd3pc4"> <img src="https://img.youtube.com/vi/5KmvkLd3pc4/0.jpg">
					  <div class="icon-hvr"></div>
						 </a>	
                    </div>					
				</div> 
				   <div class="clearfix"></div>                                                                                           
                                                                                                                     
                <div class="col-sm-6">
					<div class="hvr-img">
					 <a class="popup-youtube" href="https://www.youtube.com/watch?v=49hMbGTWy9Y"> <img src="https://img.youtube.com/vi/49hMbGTWy9Y/0.jpg">
					  <div class="icon-hvr"></div>
						 </a>	
                    </div>					
				</div> 
           
               <div class="col-sm-6">
					<div class="hvr-img">
					 <a class="popup-youtube" href="https://www.youtube.com/watch?v=FcNzC7hxDX0"> <img src="https://img.youtube.com/vi/FcNzC7hxDX0/0.jpg">
					  <div class="icon-hvr"></div>
						 </a>	
                    </div>					
				</div> 
				   <div class="clearfix"></div>                                                                                   
            </div>
         </div>
<!--end of form-col--> 
<?php echo $this->element('c_right');?>
   <div class="clearfix"></div>    
    </div>
  </div>
 </div> 
  
  <div class="bg-car car-new-kit">
    <img src="<?php echo SITEURL;?>v/bg3_bottom.jpg"/>
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