<?php
echo $this->Html->css(array('checkout'));
echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min','/v/bootstrap.min'));
$getCountry = $this->Lab->getCountryNew();
?>
<div id="preloader" style="display: none"> <div id="status">&nbsp;</div> </div>

<div class="main_wrapper" id="check-out-pg">
<div class="row"> <div class="col-sm-12 main-heads"><h1>Armytrix - Checkout</h1><h3>Please enter your details below to complete your purchase.</h3></div>
<div class="clearfix"></div></div>
<?php if(isset($getAll) && !empty($getAll)){?>
<div id="app_error" style="min-height: 30px"></div>
<?php echo $this->Form->create(null,array('id'=>'reFrm')); 

if(isset($shipping['Order']) && !empty($shipping['Order'])){
    $this->request->data['Order'] = $shipping['Order'];
}

?>
<div class="row">
<div class="ful-frm-chk-out border-head-form"> 
<div class="col-md-12"> 
<div class="first-billing-box">        

<?php 
echo $this->Form->hidden('Order.id');
$cids = $pro_id = array();
foreach ($getAll as $list){
    if($list['Product']['quantity'] > 0){
        $cids[] = $list['Cart']['id'];
        $pro_id [] = $list['Product']['id'];
    }
}
$plist = implode(',',$cids);
$pro_ids = implode(',',$pro_id);
?>

<input type="hidden" name="cid" id="cid" value="<?php echo $plist;?>">
<input type="hidden" name="pid" id="pid" value="<?php echo $pro_ids;?>">

<fieldset id="account" class="pad-right">          
<div class="form-group required col-sm-3"><label class="control-label" for="input-firstname">First Name</label> 
<div class=""><?php echo $this->Form->input('Order.first_name',array('placeholder'=>'First name','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>
<div class="form-group required col-sm-3"><label class="control-label" for="input-firstname">Last Name</label> 
<div class=""><?php echo $this->Form->input('Order.last_name',array('placeholder'=>'Last name','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>
<div class="form-group required col-sm-3"><label class="control-label" for="input-firstname">Email</label> 
<div class=""><?php echo $this->Form->input('Order.email',array('type'=>'email','placeholder'=>'Email address','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>
<div class="form-group required col-sm-3"><label class="control-label" for="input-firstname">Telephone</label> 
<div class=""><?php echo $this->Form->input('Order.phone',array('placeholder'=>'Telephone','label'=>false,'div'=>false, 'class'=>'form-control','required'=>true));?></div></div>
<div class="form-group required col-sm-3"><label class=" control-label" for="input-firstname">Country</label> 
<div class=""><?php echo $this->Form->input('Order.country_list_id',array('options'=> $getCountry,'label'=>false,'div'=>false,'empty'=>' --- Please Select --- ', 'class'=>'form-control','required'=>"required"));?></div></div>
<div class="form-group required col-sm-3"><label class=" control-label" for="input-firstname">Region / State</label> 
<div class=""><?php echo $this->Form->input('Order.shipping_state',array('placeholder'=>'Region / State','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>


</fieldset>


<div class="clearfix"></div>

<div id="_ch_err"></div>
   
<div class="submit-btn pull-right" id="rbtn_p">
     <button id="_do_chk">
      <span class="grnd-total"></span>
      <span class="plc-order">Review Order</span>
     </button>
</div>
 
</div></div>
   
<!---end of firstbox---->   
   
<div class="clearfix"></div>    
</div>
</div>
<?php echo $this->Form->end();?>
<?php }else{?>
          <div class="row">
<div class="span12 module_number_16 module_cont pb50 module_promo_text">                                        	
<div class="shortcode_promoblock  no_button_text  no_button_link ">
<div class="promoblock_wrapper"><div class="promo_text_block">
<div class="promo_text_block_wrapper"><center><h1>Your shopping cart is empty!</h1></center></div>
</div></div></div>
<div class="clear"></div>   
</div></div>
<?php }?>
</div>



<script>
$(document).ready(function(){
	$('#same_shipping').click(function(){
		   if(this.checked == true) { 
			   var name  = $("#OrderFirstName").val()+" "+$("#OrderLastName").val();
			   $("#OrderBillingCompany").val(name);
			   $("#OrderBillingAddress").val( $("#OrderShippingAddress").val()  );
			   $("#OrderBillingAddress2").val( $("#OrderShippingAddress2").val()  );
			   $("#OrderBillingCity").val( $("#OrderShippingCity").val()  );
			   $("#OrderBillingZip").val( $("#OrderShippingZip").val()  );
			   $("#OrderBillingCountryId").val( $("#OrderCountryListId").val()  );
			   $("#OrderBillingState").val( $("#OrderShippingState").val()  );  
			} 
		   	$('#reFrm').formValidation('revalidateField', 'data[Order][billing_company]');
		   	$('#reFrm').formValidation('revalidateField', 'data[Order][billing_address]');
		   	$('#reFrm').formValidation('revalidateField', 'data[Order][billing_address_2]');
		   	$('#reFrm').formValidation('revalidateField', 'data[Order][billing_city]');
		   	$('#reFrm').formValidation('revalidateField', 'data[Order][billing_zip]');
		   	$('#reFrm').formValidation('revalidateField', 'data[Order][billing_country_id]');
		   	$('#reFrm').formValidation('revalidateField', 'data[Order][billing_state]');
		   
		});


    $('#reFrm')
    .formValidation({
        framework: 'bootstrap',
        icon: { },
        err: { },
        fields: {
        	'first_name': {  message: 'Please enter first name' },
        	'last_name': {  message: 'Please enter last name' },
        	'email': {  message: 'Please enter email address' },
             }
    })    .on('success.form.fv', function(e) {
        e.preventDefault();
        var $form = $(e.target),
        fv = $form.data('formValidation');
        fv.defaultSubmit();
    })
    .on('err.form.fv', function(e) {
	        var fv = $(e.target).data('formValidation');
            var $firstInvalidField = fv.getInvalidFields()[0];
            $('html,body').animate({ scrollTop: $("#"+$firstInvalidField['id']).offset().top - 200}, 'slow');
        
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