<style>
#note {background: #e2e3e4;}
.pamt_opt{margin-top:30px}
div#check-out-pg{padding:50px 30px;font-size:13px}
div#check-out-pg a{letter-spacing:0!important}
div#check-out-pg button{height:40px;padding:5px 20px;border:0;font-size:15px}
div#check-out-pg select{height:40px}
.pul-lft{display:inline-block;vertical-align:bottom;min-width:200px;margin-right:10px}
#check-out-pg label::after{position:relative;font-size:15px;margin-left:5px;}
#check-out-pg .checkbox::after{display:none}
#check-out-pg label{display:block}
.a-center{text-align:center}
#check-out-pg .checkbox label::after,#check-out-pg .form-check label:after{display:none}
.main-heads h1{font-weight:600;margin:0 0 10px}
.main-heads h3{font-size:18px;text-transform:inherit;margin:0 0 30px}
.border-head-form{border:1px solid #e6e3e3;border-left:0;border-right:0;padding:30px 0;overflow:hidden}
.ful-frm-chk-out .col-md-4:before{content:"";position:absolute;width:2px;height:100%;left:0;background:url(<?php echo SITEURL;?>image/column-separator.png) no-repeat center top}
.ful-frm-chk-out .col-md-4:first-child:before{display:none}
.ful-frm-chk-out h4{margin:25px 0 15px;padding:0;font-weight:900;font-size:20px}
.ful-frm-chk-out h4 span{color:green;width:30px;height:30px;display:inline-block;text-align:center;border-radius:100%;border:1px solid rgba(82,82,82,0.3);line-height:30px;margin-right:5px}
#check-out-pg .ful-frm-chk-out a{color:inherit;text-decoration:underline;display:inline}
#check-out-pg .ful-frm-chk-out a:hover{color:#FF7105}
.set-img-icon img{margin-right:5px;width:50px}
.third-shipping-method p{margin-left:36px}
.credit-optn .col-xs-8{padding:0}
.bnk-trns-add{padding:10px;background:#FBFAF6;border:1px solid rgba(0,0,0,0.18);box-shadow:0 0 2px #d2d2d2;margin:10px 0}
#check-out-pg h3.product-name{font-size:14px;line-height:25px;margin:0 0 10px}
.prodct-rvew th{font-size:15px}
.input-group{margin-bottom:15px}
#check-out-pg .pad-left{padding-right:7.5px}
#check-out-pg .pad-right{padding-left:7.5px}
.coupen-bx{margin-top:20px}
.coupen-bx .radio,.coupen-bx .checkbox{display:block;min-height:20px;margin-top:5px;margin-bottom:5px;cursor:pointer}
.credit-optn input,.credit-optn select{background:#fff}
.credit-optn input, .credit-optn select {
    background: #fff;
    border: 1px solid #cdcdcd !important;
}
.submit-btn{margin-top:50px}
.submit-btn button:disabled { background: #c5c5c5; }
.submit-btn button:disabled:HOVER { background: #c5c5c5; cursor: wait;}
.submit-btn button{background:green;display:inline-block;text-decoration:none;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;box-shadow:0 1px 3px rgba(0,0,0,0.5);-moz-box-shadow:0 1px 3px rgba(0,0,0,0.5);-webkit-box-shadow:0 1px 3px rgba(0,0,0,0.5);text-shadow:0 -1px 1px rgba(0,0,0,0.25);border:none;border-bottom:1px solid rgba(0,0,0,0.25);position:relative;cursor:pointer;width:266px;color:#fff;z-index:6;height:auto!important;padding:20px 10px!important}
.submit-btn button:hover{background:#FF7105}
span.plc-order{display:block;font-size:40px;margin-top:18px}
span.grnd-total{text-align:center;font-size:20px}
.credit-optn .col-xs-6.pad-left{padding-left:0}
.credit-optn .col-xs-6.pad-right{padding-right:0}
.border-head-form a{letter-spacing:0;color:inherit}
.form-control{height:40px;font-size:14px;color:#555;background-color:#fff;background-image:none;border:1px solid #cdcdcd}
#check-out-pg label{font-size:13px}
.fourth-payment-method{overflow:hidden}
@media (min-width:992px) and (max-width:1150px) {
h3.product-name{font-size:15px;line-height:20px}
}
@media (max-width:991px) {
.ful-frm-chk-out .col-md-4::before{display:none}
span.plc-order{display:block;font-size:40px;margin-top:0}
#check-out-pg .col-sm-6.pad-right,#check-out-pg .col-sm-6.pad-left{padding:0 15px}
.crdit-nm .col-sm-6.pad-right{padding-right:0;padding-left:7.5px}
.crdit-nm .col-sm-6.pad-left{padding-left:0;padding-right:7.5px}
div#check-out-pg{padding:0 20px;font-size:13px}
}
@media (max-width:767px) {
.pul-lft{display:inline-block;vertical-align:bottom;min-width:auto;margin-right:0;float:left;width:33.33%;padding-right:10px}
.pul-lft button{margin-top:28px}
.border-head-form a{display:block}
}
@media (max-width:580px) {
div#check-out-pg{padding:10px 10px 50px;font-size:13px}
.main-heads h1{font-weight:600;margin:0 0 10px;font-size:25px;line-height:28px}
.main-heads h3{font-size:16px;margin:0 0 20px}
.pul-lft{display:inline-block;vertical-align:bottom;min-width:auto;margin-right:0;float:left;width:100%;padding:0 15px;float:none}
.pul-lft:last-child{padding-top:0}
.border-head-form{padding:20px 0}
.border-head-form a{display:inline-block}
#check-out-pg h3.product-name{font-size:15px;line-height:18px}
.submit-btn button{width:100%}
.pul-lft button{margin-top:0}
}
small.help-block {
    color: #a94442;
}
</style>

<?php echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min','/v/bootstrap.min'));

$free_gift = $promo_code = $note = null;
if(isset($checkOutArr['free_gift'])){ $free_gift = $checkOutArr['free_gift']; }
if(isset($checkOutArr['promo_code'])){ $promo_code = $checkOutArr['promo_code']; }
if(isset($checkOutArr['note'])){ $note = $checkOutArr['note']; }
$getCountry = $this->Lab->getCountry();
?>
<div id="preloader" style="display: none"> <div id="status">&nbsp;</div> </div>


<div class="main_wrapper" id="check-out-pg">
<div class="row"> <div class="col-sm-12 main-heads"><h1>Armytrix - Checkout</h1><h3>Please enter your details below to complete your purchase.</h3></div>
<div class="clearfix"></div></div>
<?php if(isset($getAll) && !empty($getAll)){?>

<div id="app_error" style="min-height: 30px"></div>
<?php echo $this->Form->create(null,array('id'=>'reFrm'));
if(isset($user_data) && !empty($user_data)){
	$this->request->data['User'] = $user_data['User'];
	$this->request->data['Address'] = $user_data['Address'];
}
?>
<div class="row">
<?php  if( !isset($_SESSION['Auth']['User']['id']) && empty($_SESSION['Auth']['User']['id'])){?>
 <div class="border-head-form">
   <div class="col-sm-12">
    <div class="pul-lft">     
     <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" class="form-control" id="username_id" required="required" />
    </div>
   </div> 
   <div class="pul-lft">    
     <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password_id" required="required"/>
    </div>
   </div> 
   
   <div class="pul-lft">    
     <div class="form-group">
     <input type="button" value="Login" class="btn btn-primary" id="sign_in_btn">
    </div>
   </div> 
 <div class="clearfix"></div>   
 </div>
<div class="clearfix"></div>
</div>
<script>
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
				url: '<?php echo SITEURL."login";?>',
				data: {email:id,password:pwd,type:'_checkout'},
				success: function(data) { $("#app_error").html(data); },
				error: function(comment) { $("#app_error").html(comment);}
				});
			}
		});
	
});
</script>
 <?php }?>
 <div class="ful-frm-chk-out border-head-form"> 
   <div class="col-md-4"> 
    <div class="first-billing-box">        
      <h4 class="title-heads"><span>1</span> Shipping ADDRESS </h4>     
<!--end of first name---->
<div class="clearfix"></div>

<?php  if( !isset($_SESSION['Auth']['User']['id']) && empty($_SESSION['Auth']['User']['id'])){?>
<fieldset id="account" class="pad-right">          
          
<div class="form-group required col-sm-6 "><label class="control-label" for="input-firstname">First Name</label> 
<div class=""><?php echo $this->Form->input('User.first_name',array('placeholder'=>'First name','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group required col-sm-6"><label class="control-label" for="input-firstname">Last Name</label> 
<div class=""><?php echo $this->Form->input('User.last_name',array('placeholder'=>'Last name','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>


<div class="form-group required col-sm-12"><label class="control-label" for="input-firstname">Email</label> 
<div class=""><?php echo $this->Form->input('User.email',array('type'=>'email','placeholder'=>'Email address','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group col-sm-12"><label class="control-label" for="input-firstname">Telephone</label> 
<div class=""><?php echo $this->Form->input('User.mobile',array('placeholder'=>'Telephone','label'=>false,'div'=>false, 'class'=>'form-control','required'=>false));?></div></div>

</fieldset>
<?php }?>

<div class="col-sm-12">
 <legend>Your Address</legend>
<fieldset id="address">

<div class="form-group col-sm-12"><label class="control-label" for="input-firstname">Company</label> 
<div class=""><?php echo $this->Form->input('Address.company',array('placeholder'=>'Company','label'=>false,'div'=>false, 'class'=>'form-control'));?></div></div>

<div class="form-group required col-sm-12"><label class=" control-label" for="input-firstname">Address 1</label> 
<div class=""><?php echo $this->Form->input('Address.address',array('type'=>'text','placeholder'=>'Address 1','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>


<div class="form-group col-sm-12"><label class=" control-label" for="input-firstname">Address 2</label> 
<div class=""><?php echo $this->Form->input('Address.address_2',array('type'=>'text','placeholder'=>'Address 2','label'=>false,'div'=>false, 'class'=>'form-control'));?></div></div>

<div class="form-group required col-sm-6"><label class=" control-label" for="input-firstname">City</label> 
<div class=""><?php echo $this->Form->input('Address.city',array('placeholder'=>'City','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group required col-sm-6"><label class=" control-label" for="input-firstname">Post Code</label> 
<div class=""><?php echo $this->Form->input('Address.zip',array('placeholder'=>'Post Code','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>


<div class="form-group required col-sm-6"><label class=" control-label" for="input-firstname">Country</label> 
<div class=""><?php echo $this->Form->input('Address.country',array('options'=> $getCountry,'label'=>false,'div'=>false,'empty'=>' --- Please Select --- ', 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group required col-sm-6"><label class=" control-label" for="input-firstname">Region / State</label> 
<div class=""><?php 
$a = array();
if(isset($get_state) && !empty($get_state)){ $a = $get_state; }
echo $this->Form->input('Address.state',array('options'=>$a,'label'=>false,'div'=>false,'empty'=>' --- Please Select --- ', 'class'=>'form-control','required'=>"required"));?></div></div>
</fieldset>
</div>
<div class="clearfix"></div> 

<div class="col-sm-12">
<div class="form-box-up">  
<div class="checkbox"><label>
<input type="checkbox" checked="checked" id="same_shipping" name="same_shipping" value="1"> Bill to same address </label></div></div></div> 
<div class="clearfix"></div>   
   

<div class="second-billing-box" id="shipping_address" style="display:none">        
<h4  class="title-heads"><span id="add_num">2</span>BILLING ADDRESS </h4>     
<fieldset class="address">
<div class="form-group col-sm-12"><label class="control-label" for="input-firstname">Name</label> 
<div class=""><?php echo $this->Form->input('Order.billing_company',array('placeholder'=>'Name','label'=>false,'div'=>false, 'class'=>'form-control'));?></div></div>

<div class="form-group required col-sm-12"><label class=" control-label" for="input-firstname">Address 1</label> 
<div class=""><?php echo $this->Form->input('Order.billing_address',array('type'=>'text','placeholder'=>'Address 1','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group col-sm-12"><label class=" control-label" for="input-firstname">Address 2</label> 
<div class=""><?php echo $this->Form->input('Order.billing_address_2',array('type'=>'text','placeholder'=>'Address 2','label'=>false,'div'=>false, 'class'=>'form-control'));?></div></div>

<div class="form-group required col-sm-6"><label class=" control-label" for="input-firstname">City</label> 
<div class=""><?php echo $this->Form->input('Order.billing_city',array('placeholder'=>'City','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group required col-sm-6"><label class=" control-label" for="input-firstname">Post Code</label> 
<div class=""><?php echo $this->Form->input('Order.billing_zip',array('placeholder'=>'Post Code','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>


<div class="form-group required col-sm-6"><label class=" control-label" for="input-firstname">Country</label> 
<div class=""><?php echo $this->Form->input('Order.billing_country',array('options'=> $getCountry,'label'=>false,'div'=>false,'empty'=>' --- Please Select --- ', 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group required col-sm-6"><label class=" control-label" for="input-firstname">Region / State</label> 
<div class=""><?php echo $this->Form->input('Order.billing_state',array('id'=>'billing_state', 'options'=>array(),'label'=>false,'div'=>false,'empty'=>' --- Please Select --- ', 'class'=>'form-control','required'=>"required"));?></div></div>
</fieldset>
<div class="clearfix"></div>
</div></div></div>


<script>

window['get_cost'] = function(isBtn){
	var coid = $('#AddressCountry').val();
	var sid = $('#AddressState').val();
	var cid = $('#cid').val();
	var role = $('#role').val();
	
	if( coid != '' && sid != '' && cid != ''){
		$('#preloader').show();
		 $.ajax({type: 'POST',async:false,
				url: '<?php echo SITEURL;?>pages/get_shipping_cost/',
				data: "coid="+coid+"&sid="+sid+"&cid="+cid+"&role="+role+"",
				success: function(data){ $('#app_error').html(data); setTimeout(function(){ $('#preloader').hide(); }, 1000); },
				error: function(comment){  $('#app_error').html(comment); setTimeout(function(){ $('#preloader').hide(); }, 1000); }  });

		
		}
	};
window['get_gt'] = function(isBtn){
		var sub_total = parseFloat($('#total_amount').val());
		var discount = parseFloat($('#discount').val());
		var shipping_cost = parseFloat($('#shipping_cost').val());
		var service_fee = parseFloat($('#service_fee').val());
		var ss_discount = parseFloat($('#ss_discount').val());
		var titanium_discount = parseFloat($('#titanium_discount').val());
		

		var dealer_discount = ss_discount + titanium_discount;
		
		var new_sub_total = (sub_total - (discount + dealer_discount) ) + shipping_cost;
		console.log(new_sub_total);
		var s_fee = ( new_sub_total * service_fee / 100 );
		s_fee = s_fee.toFixed(2);
		var gt = parseFloat(new_sub_total) + parseFloat(s_fee);
		gt = gt.toFixed(2);
		$('#total_service_fee').val(s_fee);
		$('#grand_total').val(gt);
		

		$('#_shipping_cost').html('$'+shipping_cost);
		$('#_discount').html('$'+discount);
		$('#_fee').html('$'+s_fee);
		$('#_gt').html('$'+gt);
		$('#_ngt').html('$'+gt);
	};

	
$(document).ready(function(){


	
	$('.pmt_radio').on('change', function() { 
		$('#preloader').show();
		if(this.value == 'paypal'){
			$('._r_info').hide(); $('#paypal_info').show();
			$('#service_fee').val('<?php echo PP_FEE;?>');
			<?php if(PP_FEE > 0){?> var ptext = 'Paypal Handling Fee (+ <?php echo PP_FEE;?>%)';<?php }else{?>
			var ptext = 'Paypal Handling Fee';<?php }?>
			$('#ser_fee').html(ptext);
			
			get_gt();
		}
		else if(this.value == 'wire'){
			$('._r_info').hide(); $('#wire_info').show();
			$('#service_fee').val(0);
			$('#ser_fee').html('Bank Handling Fee (+)');
			get_gt();
		} 
		else if(this.value == 'cc'){
			$('._r_info').hide(); $('#cc_info').show();
			$('#service_fee').val(0);
			$('#ser_fee').html('Card Handling Fee (+)');
			get_gt();
		} 

		setTimeout(function(){ $('#preloader').hide(); }, 1000);
		
				
		
		});
	
	$('#same_shipping').click(function(){
		   if(this.checked == true) { 
			   $("#shipping_address").hide(); $('#ship_num').html('2'); $('#pmt_num').html('3');  } 
		   else { $("#shipping_address").show(); $('#ship_num').html('3'); $('#pmt_num').html('4');
		   	$('#reFrm').formValidation('revalidateField', 'data[Order][billing_address]');
		   	$('#reFrm').formValidation('revalidateField', 'data[Order][billing_city]');
		   	$('#reFrm').formValidation('revalidateField', 'data[Order][billing_zip]');
		   	$('#reFrm').formValidation('revalidateField', 'data[Order][billing_country]');
		   	$('#reFrm').formValidation('revalidateField', 'data[Order][billing_state]');
		   }
		});

	
	$('#reFrm')
    .formValidation({
        framework: 'bootstrap',
        icon: { },
        err: { },
        fields: {
        	
     'payment_by': { validators: { notEmpty: { message: 'Please select your payment method.' } } },
	'tnc': { validators: { notEmpty: { message: 'Please read and agree to the Armytrix Online Store Terms & Conditions.' } } },
             }
    })    .on('success.form.fv', function(e) {
        // Prevent form submission
        e.preventDefault();

        var $form = $(e.target),
            fv    = $form.data('formValidation');

        // Use Ajax to submit form data
        fv.defaultSubmit();
    });

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


	$( "#AddressState" ).change(function() {
		get_cost();
	});

	$( "#OrderBillingCountry" ).change(function() {
        var id =this.value;
    	var datastring = "id="+id+"";
    	var sel_option= $('#billing_state');
		$(function(){ $.ajax({type: 'POST',async:false,
		url: '<?php echo SITEURL;?>users/get_state_Billing/',
		data: datastring,
		success: function(data){ $('#app_error').html(data);},
		error: function(comment){  $('#app_error').html(comment); }  });  });
	});

	
	$('#_do_chk').click(function(){
	     $("#reFrm").ajaxForm({ 
	  	   target: '#_ch_err',
	  	   beforeSubmit:function(){ $('#_do_chk').prop("disabled",true); $('#preloader').show(); }, 
	  	   success: function(response)  { },
	  	   error : function(response)  { $('#_do_chk').prop("disabled",false); $('#preloader').hide();},
	  	   }).submit(); 
	});
});	
</script>   
<!---end of firstbox---->   
   <div class="col-md-4">
     <div class="third-shipping-method">        
      <h4  class="title-heads"><span id="ship_num">2</span>SHIPPING METHOD</h4>
      <p><img src="<?php echo SITEURL;?>img/shipment-card.jpg"></p>
      <p>Our prices do not include Import Duty and GST/VAT applicable in your country. We deliver by a courier such as DHL, FedEx and UPS. You will pay Import Duty and VAT to the courier and the courier will make a VAT invoice. The courier's VAT invoice is accepted for VAT Return - the courier is a VAT registered company your country.</p>
      <br>
      <p>3-5 days deliver to US and Europe. Other countries will take 5-7 days.</p>
      <br>
      
     </div>
<!---end of box---> 

<div class="fourth-payment-method">        
      <h4><span id="pmt_num">3</span>PAYMENT METHOD</h4>
      <div class="col-sm-12">
      
<!---end of first-radio--->

<?php if( IS_CC == 0){?>
<div class="form-box-up" id="is_cc">
<div class="form-check">
<label class="form-check-label">
<input class="form-check-input pmt_radio" name="payment_by" id="cc_name" value="cc" type="radio" required="required">

<span class="set-img-icon"><img src="<?php echo SITEURL;?>bootstrap_3_3_6/img/card.png">
Credit Card <span class="sfee"></span></span>
</label></div>
 </div>
<!---end of second-radio--->

<div class="credit-optn bnk-trns-add bnk-trns-add _r_info" id="cc_info" style="display: none;">
<div class="col-sm-12">
 
<div class="form-box-up"><div class="form-group"> <span class="set-img-icon"><img alt="" src="<?php echo SITEURL."image/ssl.png"?>"> This page is secured with SSL Encryption</span></div></div>
   
<div class="form-box-up"><div class="form-group"><label for="crdit-nm">Name on Card</label>
<input class="form-control" name="data[cc][name]"  required="required" type="text" autocomplete="off"></div></div> 

<div class="form-box-up"><div class="form-group"><label for="crdit-nm">Email Address</label>
<input class="form-control" name="data[cc][email]"  required="required" type="text" autocomplete="off"></div></div>

<div class="form-box-up"><div class="form-group"><label for="crdit-nm">Mobile Number</label>
<input class="form-control" name="data[cc][phone]"  required="required" type="text" autocomplete="off"></div></div>


<div class="form-box-up"><div class="form-group"><label for="crdit-nm">Card Number</label>
<input class="form-control" name="data[cc][number]"  required="required" type="text" maxlength="16"  autocomplete="off"></div></div>
   
<div class="form-box-up"><div class="form-group"><label for="crdit-nm">Expiration Date</label>
<div class="col-xs-6 pad-left">
<?php echo $this->Form->month('cc.month', array('class'=>'form-control','required'=>true,'label'=>false,'empty' => 'Month'));?>

</div>

<div class="col-xs-6 pad-right">
<?php echo $this->Form->input('cc.year', array('class'=>'form-control','required'=>true,'label'=>false,
                           'type' => 'date',
                           'maxYear' => date('y', strtotime('+ 10 years')),
                           'minYear' => date('y'),
                           'dateFormat' => 'Y','orderYear' => 'asc',
                           'empty' => 'Year'));?>
      </div>
 <div class="clearfix"></div>     
</div>
    
    
<div class="form-box-up">
<div class="form-group"><label for="crdit-nm">Card Verification Number</label>
<div class="pin-cd"><input class="form-control" name="data[cc][ccv]"  required="required" type="password" maxlength="3"  autocomplete="off"></div>
</div>
</div>    
    
   </div>   
   
</div>
<div class="clearfix"></div>
</div>
<?php }?>
<div class="form-group">
<?php if( IS_PP == 1){?>
 <div class="form-box-up pamt_opt">
       <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input pmt_radio" name="payment_by" id="paypal_name" value="paypal" type="radio" required="required">
            <span class="set-img-icon"><img src="<?php echo SITEURL;?>bootstrap_3_3_6/img/paypal.png"> PayPal 
            <?php if(PP_FEE > 0){?>
            <span class="sfee"> ( <?php echo PP_FEE;?>% Handling Fee )</span><?php }?>
            </span>
       <p class="bnk-trns-add _r_info" id="paypal_info" style="display: none">You will be redirected to the PayPal website.</p>
          </label>
        </div>
 </div>
 <?php } ?>
 
<?php if( isset($WebSetting['WebSetting']['bank_details']) && !empty($WebSetting['WebSetting']['bank_details'])){?>
<div class="form-box-up pamt_opt">
       <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input pmt_radio" name="payment_by" id="wire" value="wire" type="radio" required="required"> 
            <span class="set-img-icon"><img src="<?php echo SITEURL;?>bootstrap_3_3_6/img/bank.png">
            Bank Transfer Payment <span class="sfee"></span>  </span>
          </label>
        </div>
 </div>
 </div>
<div class="bnk-trns-add _r_info" id="wire_info" style="display: none">
 <p>Bank Wire Transfer Information</p>
<?php echo nl2br($WebSetting['WebSetting']['bank_details']);?> 
 </p>
 
</div> 
<?php }?>        
       
      </div>
 <div class="clearfix"></div>     
      
      
  </div>
</div>
<!--end of second box--->
   <div class="col-md-4">
     <div class="fifth-order-review">        
      <h4  class="title-heads"><span class="fa fa-check reviews"></span>ORDER REVIEW</h4>
       <div class="prodct-rvew">
       <table class="aw-onestepcheckout-cart-table table table-bordered">
            <colgroup><col>
            <col width="1">
            <col width="1">
            </colgroup><thead>
                <tr>
                    <th class="name">Product Name</th>
                    <th class="qty">Qty</th>
                    <th class="total">Subtotal</th>
                </tr>
            </thead>

            <tbody>

<?php
$total = $shipping = $is_cateback = 0;
$cids = $pro_id = array();
foreach ($getAll as $list){
	
	if($list['Product']['type'] == 2){ $is_cateback++; }
	if($list['Product']['quantity'] > 0){
		$amt = num_2($list['Cart']['quantity'] * $list['Product']['price']);
		$total+= $amt;
		$cids[] = $list['Cart']['id'];
		$pro_id [] = $list['Product']['id'];
	}
	$url = 'javascript:void(0);';
	
	if($list['Product']['type'] == 1){ $url = SITEURL."collections/products/".$list['Product']['slug'];; }
	elseif($list['Product']['type'] == 4){ $url = SITEURL."shop/".$list['Product']['slug']; }
	elseif( in_array($list['Product']['type'], array(2,3)) ){
		$getCarURL = $this->Lab->getCarURL($list['Product']['brand_id'],$list['Product']['model_id'],$list['Product']['motor_id']);
		$url = SITEURL."product/".$getCarURL;
	}	
?>            
<tr>
<td><h3 class="product-name"><a href="<?php echo $url;?>" title="" target="_blank"><?php echo $list['Product']['title'];?></a> </h3>

<?php if(!empty($list['Product']['part'])){  ?>
<div class="grid-right-sec abtpro"><span><?php echo $list['Product']['part'];?></span></div>

<?php $mat_type = null;
if( $list['Product']['material'] == 'stainless steel'){ $mat_type = '<div class="grid-right-sec abtpro stainless_steel"><span>Stainless steel</span></div>'; }
elseif( $list['Product']['material'] == 'titanium'){ $mat_type = '<div class="grid-right-sec abtpro titanium"><span>Titanium</span></div>'; }
echo $mat_type;
?>
<?php }?>

</td>
<td class="a-center"><?php echo $list['Cart']['quantity'];?></td>
<td class="a-right"><span class="cart-price"><span class="price"><?php echo "$".num_2($list['Product']['price'] * $list['Cart']['quantity']);?></span></td>
</tr>
<?php }
if(isset($getGift) && !empty($getGift)){
?>
<tr>
<td><h3 class="product-name"><?php echo $getGift['Product']['title'];?> (Gift)</h3></td>
<td class="a-center">1</td>
<td class="a-right"><span class="cart-price"><span class="price">$00.00</span></td>
</tr>
<?php }?>
</tbody>
<tfoot>
<tr>
<?php 

$discount = 0;
$promocode = null;
if(isset($chk_promo) && !empty($chk_promo)){
	if( $total >= $chk_promo['PromoCode']['min_amount']){
		$discount = $chk_promo['PromoCode']['discount'];
		$promocode = $chk_promo['PromoCode']['code'];
	}
}
$gt_total = $total - $discount; 
?>
<td  class="a-right" colspan="2">Subtotal</td><td  class="a-right"><span class="price" id="_total_amount">$<?php echo num_2($total);?></span>    </td></tr>
<td  class="a-right" colspan="2">Coupon Discount (-)</td><td  class="a-right"><span class="price" id="_discount">$<?php echo num_2($discount);?></span>    </td></tr>
<?php if(isset($user_data['User']['role']) && $user_data['User']['role'] == 3){ ?>

<td  class="a-right" colspan="2">SS Discount - <span id="ss_dis">25% OFF</span> (-)</td><td  class="a-right"><span class="price" id="_ss_discount">$0.00</span>    </td></tr>
<td  class="a-right" colspan="2">Titanium Discount <span id="tit_dis">20% OFF</span> (-)</td><td  class="a-right"><span class="price" id="_tt_discount">$0.00</span>    </td></tr>

<?php }?>

<td  class="a-right" colspan="2">Shipping (+)</td><td  class="a-right"><span class="price" id="_shipping_cost">$0</span>    </td></tr>
<td  class="a-right" colspan="2" id="ser_fee">Fee</td><td  class="a-right"><span class="price" id="_fee">$0</span>    </td></tr>
<tr><td  class="a-right" colspan="2"><strong>Grand Total</strong></td><td  class="a-right"><strong><span class="price" id="_ngt">$<?php echo num_2($gt_total);?></span></strong></td></tr>
</tfoot>

</table> 
 <div class="text-right"><a href="<?php echo SITEURL."cart";?>">Edit Your Cart</a></div>
 
 <div class="coupen-bx">
    
      
      <div class="form-group">         
       <div class="form-group">
      <label for="cmnts">Comments</label>       
        <textarea class="form-control" id="note" rows="6" type="text" name='note' placeholder="If you have any question regarding to the custom value declaration of the goods you've purchased, please contact sales@armytrix.com or leave message in your order message board. Otherwise we will ship the goods value as it is."><?php echo $note;?></textarea>
      </div>
     </div> 
      
<div class="form-group "><label><input type="checkbox" required="required" name="tnc" id='tnc' value="1"> I have read and agree to <a href="<?php echo SITEURL."terms_and_conditions";?>" target="_blank"><b>the Armytrix Online Store Terms & Conditions. </b></a></label></div>

   <div class="clearfix"></div>
<?php $plist = implode(',',$cids); 
$pro_ids = implode(',',$pro_id);

?>
<input type="hidden" name="promo_code" id="promo_code" value="<?php echo $promocode; ?>">
<input type="hidden" name="total_amount" id="total_amount" value="<?php echo num_2($total);?>">
<input type="hidden" name="shipping_cost" id="shipping_cost" value="0">
<input type="hidden" name="discount" id="discount" value="<?php echo $discount;?>">
<input type="hidden" name="total_service_fee" id="total_service_fee" value="0">
<input type="hidden" name="service_fee" id="service_fee" value="0">
<input type="hidden" name="grand_total" id="grand_total" value="<?php echo num_2($gt_total);?>">
<input type="hidden" name="free_gift" id="free_gift" value="<?php echo $free_gift;?>">
<input type="hidden" name="cid" id="cid" value="<?php echo $plist;?>">
<input type="hidden" name="pid" id="pid" value="<?php echo $pro_ids;?>">

<input type="hidden" name="role" id="role" value="<?php if(isset($user_data['User']['role'])){ echo $user_data['User']['role'];}else{ echo 1;}?>">
<input type="hidden" name="dealer_discount" id="dealer_discount" value="0">

<input type="hidden" name="ss_discount" id="ss_discount" value="0">
<input type="hidden" name="titanium_discount" id="titanium_discount" value="0">

<input type="hidden" name="twd" id="twd" value="<?php echo $twd;?>">


<div id="_ch_err"></div>
   
   <div class="submit-btn">
     <button id="_do_chk">
      <span class="grnd-total"><span class="set-txxt">Grand Total</span> <span class="totl-value" id="_gt">$<?php echo num_2($gt_total);?></span></span>
      <span class="plc-order">Place Order</span>
     </button>
   </div>
    
    </div>
 </div>
        
       </div>
      
   </div>   
   
  <div class="clearfix"></div>    
   		
   </div>
</div>
<?php echo $this->Form->end();?>


<?php }else{?>
          <div class="row">
                                        <div class="span12 module_number_16 module_cont pb50 module_promo_text">                                        	
                                            <div class="shortcode_promoblock  no_button_text  no_button_link ">
                                                <div class="promoblock_wrapper">
                                                    <div class="promo_text_block">
                                                        <div class="promo_text_block_wrapper">
                                                            <center><h1>Your shopping cart is empty!</h1>
                                                            <span></span></center>
                                                        </div>
                                                    </div>                                                        
                                                </div>
                                            </div>
                                            <div class="clear"></div>   
                                        </div><!-- .module_cont -->
                                    </div>
<?php }?>
</div>
</div>
<script type="text/javascript">
window.onload=function(){
	get_cost();
};
</script>
