<?php echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min','/v/bootstrap.min'));

$pURL =  SITEURL."login";
$register =  SITEURL."register";
if(isset($r_url) && !empty($r_url)) { $pURL =  SITEURL."login?return_url=".urlencode($r_url);
$register =  SITEURL."register?return_url=".urlencode($r_url);
}
?>
<style>
.t_n_c_signup{margin:0 0 0 1% !important}
</style>
<div class="main_wrapper account-register">
<div class="container">
  <ul class="breadcrumb">
        <li><a href="<?php echo SITEURL;?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo SITEURL;?>account">Account</a></li>
        <li><a href="<?php echo SITEURL;?>register">Register</a></li>
      </ul>
    <div class="row">
<?php echo $this->element('user_nav');?>
<div id="content" class="col-sm-9">      
<h1 class="page-title">Register Account</h1>
<p>If you already have an account with us, please login at the <a href="<?php echo $pURL;?>">login page</a>.</p>

<?php echo $this->Form->create('User',array('class'=>'form-horizontal','id'=>'reFrm','type' => 'file'));?>

<legend>Your Personal Details</legend>
<fieldset id="account">          
          
<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">First Name</label> 
<div class="col-sm-10"><?php echo $this->Form->input('User.first_name',array('placeholder'=>'First name','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">Last Name</label> 
<div class="col-sm-10"><?php echo $this->Form->input('User.last_name',array('placeholder'=>'Last name','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>


<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">Email</label> 
<div class="col-sm-10"><?php echo $this->Form->input('User.email',array('type'=>'email','placeholder'=>'Email address','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">Telephone</label> 
<div class="col-sm-10"><?php echo $this->Form->input('User.mobile',array('placeholder'=>'Telephone','label'=>false,'div'=>false, 'class'=>'form-control','required'=>false));?></div></div>

<div class="form-group"><label class="col-sm-2 control-label" for="input-firstname">Fax</label> 
<div class="col-sm-10"><?php echo $this->Form->input('User.fax',array('placeholder'=>'Fax','label'=>false,'div'=>false, 'class'=>'form-control'));?></div></div>

</fieldset>

<legend>Your Address</legend>
		<fieldset id="address">

<div class="form-group"><label class="col-sm-2 control-label" for="input-firstname">Company</label> 
<div class="col-sm-10"><?php echo $this->Form->input('Address.company',array('placeholder'=>'Company','label'=>false,'div'=>false, 'class'=>'form-control'));?></div></div>

<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">Address 1</label> 
<div class="col-sm-10"><?php echo $this->Form->input('Address.address',array('type'=>'text','placeholder'=>'Address 1','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>


<div class="form-group"><label class="col-sm-2 control-label" for="input-firstname">Address 2</label> 
<div class="col-sm-10"><?php echo $this->Form->input('Address.address_2',array('type'=>'text','placeholder'=>'Address 2','label'=>false,'div'=>false, 'class'=>'form-control'));?></div></div>

<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">City</label> 
<div class="col-sm-10"><?php echo $this->Form->input('Address.city',array('placeholder'=>'City','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">Post Code</label> 
<div class="col-sm-10"><?php echo $this->Form->input('Address.zip',array('placeholder'=>'Post Code','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>


<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">Country</label> 
<div class="col-sm-10"><?php echo $this->Form->input('Address.country',array('options'=> $this->Lab->getCountryDealer(),'label'=>false,'div'=>false,'empty'=>' --- Please Select --- ', 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">Region / State</label> 
<div class="col-sm-10"><?php echo $this->Form->input('Address.state',array('options'=>array(),'label'=>false,'div'=>false,'empty'=>' --- Please Select --- ', 'class'=>'form-control','required'=>"required"));?></div></div>


<div class="form-group"><label class="col-sm-2 control-label" for="input-firstname">Company Website</label> 
<div class="col-sm-10"><?php echo $this->Form->input('User.website',array('type'=>'url','placeholder'=>'Company Website','label'=>false,'div'=>false, 'class'=>'form-control','required'=>false));?></div></div>

<div class="form-group"><label class="col-sm-2 control-label" for="input-firstname">Facebook</label> 
<div class="col-sm-10"><?php echo $this->Form->input('User.facebook',array('type'=>'url','placeholder'=>'facebook','label'=>false,'div'=>false, 'class'=>'form-control','required'=>false));?></div></div>

<div class="form-group"><label class="col-sm-2 control-label" for="input-firstname">Instagram</label> 
<div class="col-sm-10"><?php echo $this->Form->input('User.instagram',array('type'=>'url', 'placeholder'=>'Instagram','label'=>false,'div'=>false, 'class'=>'form-control','required'=>false));?></div></div>


</fieldset>
        
<legend>Your Password</legend>
<fieldset>

<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">Password</label> 
<div class="col-sm-10"><?php echo $this->Form->input('User.password',array('placeholder'=>'Password','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>

<div class="form-group required"><label class="col-sm-2 control-label" for="input-firstname">Password Confirm</label> 
<div class="col-sm-10"><?php echo $this->Form->input('User.password1',array('type'=>'password','placeholder'=>'Password Confirm','label'=>false,'div'=>false, 'class'=>'form-control','required'=>"required"));?></div></div>

</fieldset>

<legend>Business Documents</legend>
<fieldset>
<div class="form-group"><label class="col-sm-2 control-label">Documents</label>
<?php echo $this->Form->file('documents.',array('multiple'=>'multiple','accept'=>'image/x-png,image/jpeg,application/pdf','required'=>true));?>
<p>Please upload only in pdf, jpeg and png format</p>
</div>
</fieldset>

        
<legend>Newsletter</legend>
<fieldset>
          <div class="form-group">
            <label class="col-sm-2 control-label">Subscribe</label>
<?php 
$options = array('1' => 'Yes', '0' => 'No');
$attributes = array('legend' => false,'default'=>'1','class'=>'tm-radio');
echo $this->Form->radio('User.subscription', $options, $attributes);?>            
</div>
</fieldset>

<legend>Terms and Conditions</legend>
<fieldset>
<div class="form-group t_n_c_signup">
<br>
<textarea class="col-sm-12 t_h_3" readonly="readonly">
ARMYTRIX PRODUCTS TERMS AND CONDITIONS

LIMITED WARRANTY & CONDITIONS
Armytrix products are backed by a limited one (1) year warranty from the date of purchase against defects in materials and workmanship which is extended to the original purchaser of the product(s) and is not transferable. All warranty claims require the product(s) in question to be sent back to Armytrix, along with a valid proof of purchase, for a technical inspection before any replacements or repairs will be authorized. All labor and shipping costs associated with warranty claims are the responsibility of the customer. Armytrix is not liable for any additional costs or damages beyond the original purchase price of the product(s) in question. 

DISCLAIMER: A. There is no warranty of sound quality or volume, as these are completely subjective characteristics. B. Not responsible for check engine light appearance. C. Wear-and-tear from under normal driving conditions, such as but limited to, discoloration, rusting, corrosion, internal deterioration, sound change D. Improper installation, inappropriate usage, resulting in damage. E. Any modification made to the product without the consent of Armytrix F. Damage caused by external impact Armytrix reserves the right to deny warrant service if it can be proved that the product in question failed or is failing due to accidental damage, external impact, abuse or misuse, track/race use, shipment, handling, storage, worn or faulty engine mounts and/or exhaust mounts, faulty location or installation, excessive vibration, internal explosion or backfire, maintenance in a manner not conforming to our instructions, modifications by persons other than ourselves, failure of a third party component, or the installation of the part(s) to a vehicle for which it was not intended. Exhaust mounts and engine mounts must be checked at least every 12 months by a qualified technician and replaced as necessary. Valid evidence of this regular service may be required in the case of a claim. Armytrix reserves the right to deny warranty replacement or repair if it is proved that a faulty engine or exhaust mount was responsible for the issue in-question. Attempted repair of a faulty Armytrix product by anyone other than Armytrix or a Armytrix agent will void this Warranty. Armytrix designs performance products for street applications which are not entirely street legal and emissions-compliant, as well as race applications which are recommended for off-road or track-use only. While most Armytrix exhaust products will pass emissions and are entirely road-legal in some countries in the EU, certain sport catalytic converters and cat-bypass pipes may not be approved in your particular region or country. Please check local laws pertaining to emissions and catalytic converters before purchasing.

PRODUCT SPECIFICATIONS & AVAILABILITY
Armytrix manufacturing specifications may vary from the diagrams and photos displayed on the website. We reserve the right to alter Armytrix product specifications without any notification. In the rare event that the price of an ordered product has changed, due to specification changes, we shall contact you to agree to a new price before accepting payment. If you do not agree to the new price, then we reserve the right to withdraw from the transaction. Armytrix products are mostly on stock if not we will always provide customers with an expected production and delivery turnaround at the time of ordering. Please note that estimated production and delivery times and capabilities are approximations only and we shall not be liable for any losses, costs, damages, charges or expenses caused by any delay for delivery of ordered products. We shall inform you immediately of any delays and agree to a new delivery date. We recommend that you do not make any specific arrangements to have parts fitted until they have arrived. Any custom parts or items that receive special modification(s) due to the nature of the application, or a revision or improvement to an existing design, will usually ship upon completion. Armytrix is constantly striving to keep up with the demand for our high quality parts by trying to predict market trends and maintaining in-stock quantities, however, should a part become currently out of stock, it will be added to the fabrication queue and shipped out as soon as it becomes available. 

LOST OR DAMAGED GOODS
In the event that your Armytrix Product(s) is lost or damaged in transit, please contact us immediately before returning any items for Return Authorization approval. Any damaged parcels or goods must be signed for as 'damaged' and reported to us on the day of receipt so that we can file a claim against the courier. Any damaged items must be re packaged (along with the original shipping container, where possible) and returned to Armytrix for inspection. The cost of returning items in such circumstances is the customer's responsibility. If the goods are found to be faulty under the terms of the Armytrix limited warranty, a repair or replacement may be provided. CUSTOMS When ordering goods from Armytrix delivery overseas, you may be subject to import duties and taxes which are levied once the package reaches the specified destination. Any additional charges for customs clearance must be borne by you; we have no control over these charges and cannot predict what they may be. Customs policies vary widely from country to country, so you should contact your local customs office for further information. Additionally, please note that when ordering from Armytrix, you are considered the importer of record and must comply with all laws and regulations of the country in which you are receiving the goods. It is also important to note that cross-border deliveries may be subject to opening and inspection by customs authorities. You should be aware that we have no control of such activities or the consequences thereof. 

CANCELLATIONS
It is the right of the customer to cancel any order up until the time that the order ships. Once the order has shipped, any cancellation requests will be treated as a product return, and may be subject to re-stocking fees. No cancellations will be accepted on orders that include custom or made-to-order parts once work has begun on the specified parts. Any refunded payments - in part or in full - are payable solely at the discretion of Armytrix. All goods remain the property of Armytrix until full and final payments have been received. Armytrix reserves the right to cancel or refuse orders for any reason and at any time, at our sole discretion. RETURNS Armytrix products which have not yet been installed on a vehicle may be returned for a refund within 30 days of the original purchase date and will be subject to a 10% restocking fee. Any products that been fully or partially installed on a vehicle will be subject to the terms of our limited warranty. Please contact your account representative to obtain a Return Authorization (RA) number. No returns will be accepted without a proper RA number. Return shipping is the responsibility of the purchasing party. No returns are accepted on custom or made-to-order parts or components. 

CONTRACTUAL AGREEMENT
When you place an order, it represents an agreement to us to purchase the agreed upon Armytrix product(s). This agreement is accepted by us when we send an e-mail or telephone, confirmation to you confirming the receipt of payment and details of your order, and that we have commissioned the dispatch of your Armytrix product(s). We maintain that, by confirming your order, you have unreservedly accepted our Terms and Conditions and contract of sale. All statements, guarantees or warranties in our terms of trading are in addition to your statutory rights.
 
GENERAL DISCLAIMER
Armytrix shall not, under any circumstances, be liable to any person or company for any special, incidental, indirect or consequential damages, including without limitation, damages resulting from use or malfunction of the products, loss of profits or revenues or cost of replacement goods, even if Armytrix or the customer is informed in advance of the possibility of such damages. Armytrix shall not under any circumstances be liable to the purchaser, their vehicle or any third party, person or company for any damage, failure or injury that occurs during the fitting, use or removal of the products. We practice a policy of continual review, and reserve the right to make changes to our website, policies, prices, system specifications and these Terms and Conditions, at any time, and without any notification. You will be subject to the policies and Terms and Conditions in force at the time that you use the website or order goods from us, unless any change to those policies or these conditions are required to be made by law or government authority (in which case it will apply to orders previously placed by you). If any of these conditions is deemed invalid, void, or for any reason unenforceable, that condition will be deemed dissolvable, and will not affect the validity and enforceability of any remaining condition. These Terms and Conditions supersede any terms and conditions that you provide on any purchase order or document that you submit to Armytrix, and take precedence over any previous Terms and Conditions.

PLEASE NOTE:
Order cut-off times are provided as guidelines only, and do not take into account possible delays caused by payment authorization.
Estimated delivery times are to be used as a guide only and commence from the date of dispatch. We are not responsible for any delays caused by destination customs clearance processes. We are unable to redirect orders once items have been dispatched.
If you provide an email address you will be provided with delivery notification and a tracking number.
When ordering from the Armytrix site your item will arrive wrapped in one of our luxurious signature boxes. These boxes are amply sized and your items are well protected. If you have any questions please don't hesitate to email shipping@armytrix.com.

INTERNATIONAL DELIVERIES:
Please note that all shipments may be subject to Import Duty / Tax / VAT which are levied once a shipment reaches your country.
As we have no control over these charges and cannot predict what they may be, additional charges for customs clearance must be paid by the recipient of the parcel. Such charges are not included in the purchase price of Armytrix products. We will not be responsible for the payment of any Import Duty / Tax / VAT under any circumstances. We are not able to offer a refund for returned goods which are returned because the customer wishes to avoid paying any customs duties imposed.
When ordering from Armytrix you agree to pay any Import Duty / Tax / VAT which may be imposed by your country's government. If you refuse to pay any Import Duty / Tax / VAT imposed and thereby prevent delivery of your order you will remain liable for the purchase price of the product/s and any Import Duty / Tax / VAT or penalty imposed by your government. Customs policies vary widely from country to country and customs duties are not always applied. Each country has its own rules for determining whether Import Duty / Tax / VAT will apply. Some countries only charge customs duties if the parcel has a value over a certain amount. Based on your country's customs rules, it is possible that your parcel will fall below that threshold level. Therefore we ask that you contact your local customs/import/mail departments for rates before you place an order to avoid any surprises.
We cannot guarantee that items will not be subject to random checks and cause associated delays and charges. Armytrix is not responsible for any delays caused by destination customs clearance processes.

</textarea>
<input type="checkbox" required name="terms" id="field_terms" >  
<label for="terms">I agree with the  terms and conditions for Registration.</label><span class="req">* </span>

</fieldset>
        
<div id="app_error"></div>
        
<div class="buttons">
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

	$('#reFrm')
    .formValidation({
        framework: 'bootstrap',
        icon: {
           // valid: 'glyphicon glyphicon-ok',
           // invalid: 'glyphicon glyphicon-remove',
          //  validating: 'glyphicon glyphicon-refresh'
        },
        err: {
            // You can set it to popover
            // The message then will be shown in Bootstrap popover
            //container: 'tooltip'
        },
        fields: {
        	'data[User][email]': {
                 validators: {
                     notEmpty: {
                         message: 'The email address is required'
                     },
                     
                     regexp: { message: 'The input is not a valid email address', regexp: /\S+@\S+\.\S+/ }
                 }
             },
        	
            'data[User][mobile]': {
                validators: {
                    notEmpty: {
                        message: 'The phone number is required'
                    },
                    regexp: {
                        message: 'The phone number can only contain the digits, spaces, -, (, ), + and .',
                        regexp: /^[0-9\s\-()+\.]+$/
                    }
                }
            },

        	  'data[User][password1]': {
                  validators: {
                      identical: {
                          field: 'data[User][password]',
                          message: 'The password and its confirm are not the same'
                      }
                  }
              }
               
                         
             
        }
    })    .on('success.form.fv', function(e) {
        // Prevent form submission
        e.preventDefault();

        var $form = $(e.target),
            fv    = $form.data('formValidation');

        // Use Ajax to submit form data
        fv.defaultSubmit();
    });

	window['validateEmail'] = function(email) { var re = /\S+@\S+\.\S+/; return re.test(email); };
	
	$( "#sign_in_btn" ).click(function() {
		$('#app_error').html('');

		/*var f = $.trim($('#UserFirstName').val());
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
		else{ */
			     $("#reFrm").ajaxForm({ 
		    	   target: '#app_error',
		    	   beforeSubmit:function(){ $("#sign_in_btn").prop("disabled",true); $("#sign_in_btn").val('Please wait..'); }, 
		    	   success: function(response)  { $("#app_error").html(response); },
		    	   error : function(response)  { 
		    		   $('#app_error').html('<div class="alert alert-danger alert-dismissable fade in">Sorry, this is not working at the moment. Please try again later.</div>');
		    		   $("#sign_in_btn").prop("disabled",false); $("#sign_in_btn").val('Continue');  
			    	   },
		    	   }).submit(); 

			/* } */
		});
	
});
</script>	