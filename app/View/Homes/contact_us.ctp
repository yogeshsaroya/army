<?php
echo $this->html->css(['/font-awesome/css/font-awesome.min.css'], ['block' => 'cssTop']);
echo $this->html->script(['jquery.form.min', '/v/formValidation.min', '/v/bootstrap.min'], ['block' => 'scriptTop']);
?>
<script type="text/javascript">
    var onloadCallback = function() {
        grecaptcha.render('g-recaptcha', {
            'sitekey': '<?php echo DataSitekey; ?>'
        });
    };
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

<style>
    h1 {
        font-size: 32px
    }

    .sub_head {
        font-size: 20px
    }

    @media (max-width:900px) {
        #main_sec {
            margin-top: 90px;
            color: #fff
        }

        #main_sec {
            margin-top: 46px;
        }
    }

    @media (max-width:480px) {
        #main_sec {
            margin-top: 20px;
            color: #fff
        }

        #main_sec {
            margin-bottom: 58px;
        }
    }

    #new-kit-forms .form-boxd h4 {
        margin: 0 15px 15px;
    }
</style>
<div id="preloader" style="display: none">
    <div id="status">&nbsp;</div>
</div>
<div id="new-kit-forms" class="cont-us">
    <div class="bg-form">
        <div class="container">
            <h1 class="italic-head grn-line">Contact us</h1>
            <div class="sub-line-head"></div>
            <div class="rows">
                <?php echo $this->Form->create('Request', array('id' => 'kit_req')); ?>
                <div class="col-sm-8 col-md-9">
                    <div class="form-boxd">
                        <h4>Please fill out the form below and we'll get back in touch with you</h4>
                        <div class="col-md-6">

                            <div class="form-group"><?php echo $this->Form->input('type', array('type' => 'select', 'options' => ['Customer' => 'Customer', 'Dealer' => 'Dealer'], 'class' => 'form-control', 'label' => 'I am a<sup>*</sup>', 'empty' => 'Select', 'required' => true)); ?></div>

                            <div class="form-group">
                                <div class="clear-fx cntct">
                                    <div class="col-sm-6"><?php echo $this->Form->input('f_name', array('class' => 'form-control', 'label' => 'First Name<sup>*</sup>', 'required' => true)); ?> </div>
                                    <div class="col-sm-6" style="padding: 0;"><?php echo $this->Form->input('l_name', array('class' => 'form-control', 'label' => 'Last Name<sup>*</sup>', 'required' => true)); ?> </div>
                                </div>
                            </div>


                            <div class="form-group"> <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => 'Email<sup>*</sup>', 'required' => true)); ?> </div>
                            <div class="form-group"> <?php echo $this->Form->input('cemail', array('class' => 'form-control', 'label' => 'Confirm Email<sup>*</sup>', 'required' => true)); ?> </div>
                            <div class="form-group"><?php echo $this->Form->input('phone', array('type' => 'tel', 'class' => 'form-control', 'label' => 'Phone<sup>*</sup>', 'required' => true, 'minlength' => 10)); ?></div>
                            <div class="form-group"><?php echo $this->Form->input('city', array('class' => 'form-control', 'label' => 'City<sup>*</sup>', 'required' => true)); ?></div>
                            <div class="form-group"><?php echo $this->Form->input('state', array('class' => 'form-control', 'label' => 'State<sup>*</sup>', 'required' => true)); ?></div>
                            <div class="form-group"><?php echo $this->Form->input('zip_code', array('class' => 'form-control', 'label' => 'Zip Code<sup>*</sup>', 'required' => true)); ?></div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group"><?php echo $this->Form->input('country', array('options' => $this->Lab->country(), 'empty' => 'Select Country', 'class' => 'form-control', 'label' => 'Country<sup>*</sup>', 'required' => true)); ?></div>
                            <div class="form-group"><?php echo $this->Form->input('subject', array('type' => 'select', 'options' => $this->Lab->getSubject(), 'class' => 'form-control', 'label' => 'Subject<sup>*</sup>', 'empty' => 'Select subject', 'required' => true)); ?></div>
                            <div class="form-group"><?php echo $this->Form->input('hear', array('type' => 'select', 'options' => $this->Lab->getHear(), 'class' => 'form-control', 'label' => 'How did you hear about us<sup>*</sup>', 'empty' => 'Select', 'required' => true)); ?></div>

                            <div class="form-group"><?php echo $this->Form->input('vehicle_type', array('type' => 'select', 'options' => ['car' => 'Car', 'motorcycle' => 'Motorcycle'], 'default' => (isset($q['vehicle_type']) && !empty($q['vehicle_type']) ? $q['vehicle_type'] : null), 'class' => 'form-control', 'label' => 'Vehicle Type <sup>*</sup>', 'empty' => 'Select', 'required' => true)); ?></div>

                            <div id="_car" style="<?php echo (isset($q['vehicle_type']) && $q['vehicle_type'] == 'car' ? 'display: block' : 'display: none'); ?>">
                                <div class="form-group"><?php echo $this->Form->input('brand', array('options' => $this->Lab->getbrand(), 'default' => (isset($q['car_brand']) && !empty($q['car_brand']) ? $q['car_brand'] : null), 'empty' => 'Select Brand', 'class' => 'form-control', 'label' => 'Brand', 'required' => true)); ?></div>
                                <div class="form-group"><?php echo $this->Form->input('model', array('options' => $getModel, 'default' => (isset($q['car_model']) && !empty($q['car_model']) ? $q['car_model'] : null), 'empty' => 'Select Model', 'class' => 'form-control', 'label' => 'Model', 'required' => true)); ?></div>
                                <div class="form-group"><?php echo $this->Form->input('engine', array('options' => $getMotor, 'default' => (isset($q['car_motor']) && !empty($q['car_motor']) ? $q['car_motor'] : null), 'empty' => 'Select Engine', 'class' => 'form-control', 'label' => 'Engine', 'required' => true)); ?>
                                    <p>Not listed above? Please click to visit our <a href="<?php echo SITEURL; ?>homes/new_kit_request">new kit request page</a></p>
                                </div>
                            </div>
                            <div id="_motor" style="<?php echo (isset($q['vehicle_type']) && $q['vehicle_type'] == 'motorcycle' ? 'display: block' : 'display: none'); ?>">
                                <div class="form-group"><?php echo $this->Form->input('motor_make', array('options' => $this->Lab->getMotorcycleMake(), 'default' => (isset($q['make']) && !empty($q['make']) ? $q['make'] : null), 'empty' => 'Select Make', 'class' => 'form-control', 'label' => 'Make', 'required' => true)); ?></div>
                                <div class="form-group"><?php echo $this->Form->input('motor_model', array('options' => $getMotorcycleModel, 'default' => (isset($q['model']) && !empty($q['model']) ? $q['model'] : null), 'empty' => 'Select Model', 'class' => 'form-control', 'label' => 'Model', 'required' => true)); ?></div>
                                <div class="form-group"><?php echo $this->Form->input('motor_years', array('options' => $getMotorcycleYear, 'default' => (isset($q['year']) && !empty($q['year']) ? $q['year'] : null), 'empty' => 'Select Year', 'class' => 'form-control', 'label' => 'Years', 'required' => true)); ?>
                                    <p>Not listed above? Please click to visit our <a href="<?php echo SITEURL; ?>homes/new_kit_request">new kit request page</a></p>
                                </div>
                            </div>

                        </div>
                        <!--end of second form-box-->
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                            <div class="form-group"><?php echo $this->Form->input('message', array('type' => 'textarea', 'class' => 'form-control', 'label' => 'Message<sup>*</sup>', 'required' => true)); ?></div>
                        </div>
                        <div class="clearfix"></div>
                        <div id="app_errr"></div>
                        <div class="rows clear-fx">
                            <div class="col-sm-4">
                                <div id="g-recaptcha"></div>
                            </div>
                            <div class="col-sm-8">
                                <div class="button-bx clr-btn"><button class="btn btn-green" id="clr">Clear</button>

                                    <button type="button" class="btn btn-green sbmt-big" id="but_req">submit</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
                <?php echo $this->element('c_right'); ?>
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
        fields: {
            'data[Request][cemail]': {
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
           data: { 
            car_make: $('#RequestBrand option:selected').html(), 
            car_model: $('#RequestModel option:selected').html(), 
            car_motor: $('#RequestEngine option:selected').html(), 
            make: $('#RequestMotorMake option:selected').html(), 
            model: $('#RequestMotorModel option:selected').html(), 
            year: $('#RequestMotorYears option:selected').html() 
        },
    	   beforeSubmit:function(){ $("#preloader").show(); }, 
    	   success: function(response)  { $("#preloader").hide(); },
    	   error : function(response)  { 
    		   $('#app_errr').html('<div class="alert alert-danger alert-dismissable fade in">Sorry, this is not working at the moment. Please try again later.</div>');
    		   $("#preloader").hide();
    		   },
    
    	   }).submit();
	}); 

    
    $("#RequestVehicleType").change(function() {
        if(this.value == 'car'){ $("#_car").show(); $("#_motor").hide(); }
        else if(this.value == 'motorcycle'){ $("#_motor").show(); $("#_car").hide();  }
        else{ $("#_car").hide(); $("#_motor").hide(); }
    });

    /* for car */
	$( "#RequestBrand" ).change(function() {
		$("#app_errr").html('');
		$('#RequestModel').html('<option value="">Select Model</option>');
		$('#RequestEngine').html('<option value="">Select Engine</option>');
		var id = $.trim(this.value); 
		if(id != ""){
		$('#preloader').show();	
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL;?>pages/get_for',
			data:{type:'car','make_id':id,target_id:'RequestModel'},
			success: function(data) { $("#app_errr").html(data); $('#preloader').hide(); },
			error: function(comment) { $("#app_errr").html(data); $('#preloader').hide(); }}); 
		}
	});
	$( "#RequestModel" ).change(function() {
		$("#app_errr").html('');
		$('#RequestEngine').html('<option value="">Select Engine</option>');
		var id = $.trim(this.value); 
		if(id != ""){
		$('#preloader').show();	
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL;?>pages/get_for',
			data:{type:'car','model_id':id,target_id:'RequestEngine'},
			success: function(data) { $("#app_errr").html(data); $('#preloader').hide(); },
			error: function(comment) { $("#app_errr").html(data); $('#preloader').hide(); }}); 
		}
	});

    /*For motorcycle */
    $( "#RequestMotorMake" ).change(function() {
		$("#app_errr").html('');
		$('#RequestMotorModel').html('<option value="">Select Model</option>');
		$('#RequestMotorYears').html('<option value="">Select Year</option>');
		var id = $.trim(this.value); 
		if(id != ""){
		$('#preloader').show();	
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL;?>pages/get_for',
			data:{type:'motorcycle','make_id':id,target_id:'RequestMotorModel'},
			success: function(data) { $("#app_errr").html(data); $('#preloader').hide(); },
			error: function(comment) { $("#app_errr").html(data); $('#preloader').hide(); }}); 
		}
	});
	$( "#RequestMotorModel" ).change(function() {
		$("#app_errr").html('');
		$('#RequestMotorYears').html('<option value="">Select Year</option>');
		var id = $.trim(this.value); 
		if(id != ""){
		$('#preloader').show();	
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL;?>pages/get_for',
			data:{type:'motorcycle','model_id':id,target_id:'RequestMotorYears'},
			success: function(data) { $("#app_errr").html(data); $('#preloader').hide(); },
			error: function(comment) { $("#app_errr").html(data); $('#preloader').hide(); }}); 
		}
	});


}); 		   
</script>