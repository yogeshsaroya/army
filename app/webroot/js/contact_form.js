function validateFname(focus, formobj){
	var $this = $('#fname', formobj);
	if($this.val().length == 0){
		$('span.red',$this.closest('.control-group')).html('Please enter First Name').css('visibility','visible');
		if(focus ==  true){
			//$this.focus();
			return false;
		}
		return false;
	}
	$('span.red',$this.closest('.control-group')).html('').css('visibility','hidden');
	return true;
}

function validateCompanyname(focus, formobj){
	var $this = $('#companyname', formobj);
	if($this.val().length == 0){
		$('span.red',$this.closest('.control-group')).html('Please enter company name').css('visibility','visible');
		if(focus ==  true){
			//$this.focus();
			return false;
		}
		return false;
	}
	$('span.red',$this.closest('.control-group')).html('').css('visibility','hidden');
	return true;
}

function validatename(focus, formobj){
	var $this = $('#name', formobj);
	if($this.val().length == 0){
		$('span.red',$this.closest('.control-group')).html('Please enter Name').css('visibility','visible');
		if(focus ==  true){
			//$this.focus();
			return false;
		}
		return false;
	}
	$('span.red',$this.closest('.control-group')).html('').css('visibility','hidden');
	return true;
}

function Emailvalidate($email) {
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	if( !emailReg.test( $email ) ) {
		return false;
	} else {
		return true;
	}
}

function validateEmail(focus, formobj){
	var $this = $('#email', formobj);
	if($this.val().length == 0){
		$('span.red',$this.closest('.control-group')).html('Please enter email').css('visibility','visible');
		if(focus ==  true){
			//$this.focus();
			return false;
		}
		return false;
	}
	if(Emailvalidate($this.val()) == false){
		$('span.red',$this.closest('.control-group')).html('Please enter correct email').css('visibility','visible');
		if(focus ==  true){
			//$this.focus();
			return false;
		}
		return false;
	}
	$('span.red',$this.closest('.control-group')).html('').css('visibility','hidden');
	return true;
}

function validateConfirmEmail(focus, formobj){
	var $this = $('#cemail', formobj);
	if($this.val().length == 0){
		$('span.red',$this.closest('.control-group')).html('Please enter confirm email').css('visibility','visible');
		if(focus ==  true){
			//$this.focus();
			return false;
		}
		return false;
	}
	if(Emailvalidate($this.val()) == false){
		$('span.red',$this.closest('.control-group')).html('Please enter correct email').css('visibility','visible');
		if(focus ==  true){
			//$this.focus();
			return false;
		}
		return false;
	}
	var email = $('#email', formobj).val();
	if(email != $this.val()){
		$('span.red',$this.closest('.control-group')).html('Email and Confirm email doesn\'t match').css('visibility','visible');
		if(focus ==  true){
			//$this.focus();
			return false;
		}
		return false;
	}
	$('span.red',$this.closest('.control-group')).html('').css('visibility','hidden');
	return true;
}

function validatePhone(focus, formobj){
	var $this = $('#phone', formobj);
	if($this.val().length == 0){
		$('span.red',$this.closest('.control-group')).html('Please enter valid phone').css('visibility','visible');
		if(focus ==  true){
			//$this.focus();
			return false;
		}
		return false;
	}
	$('span.red',$this.closest('.control-group')).html('').css('visibility','hidden');
	return true;
}

function validateCity(focus, formobj){
	var $this = $('#city', formobj);
	if($this.val().length == 0){
		$('span.red',$this.closest('.control-group')).html('Please enter valid city').css('visibility','visible');
		if(focus ==  true){
			//$this.focus();
			return false;
		}
		return false;
	}
	$('span.red',$this.closest('.control-group')).html('').css('visibility','hidden');
	return true;
}

function validateState(focus, formobj){
	var $this = $('#state', formobj);
	if($this.val().length == 0){
		$('span.red',$this.closest('.control-group')).html('Please enter valid state').css('visibility','visible');
		if(focus ==  true){
			//$this.focus();
			return false;
		}
		return false;
	}
	$('span.red',$this.closest('.control-group')).html('').css('visibility','hidden');
	return true;
}

function validateZip(focus, formobj){
	var $this = $('#zip', formobj);
	if($this.val().length == 0){
		$('span.red',$this.closest('.control-group')).html('Please enter valid zip').css('visibility','visible');
		if(focus ==  true){
			//$this.focus();
			return false;
		}
		return false;
	}
	$('span.red',$this.closest('.control-group')).html('').css('visibility','hidden');
	return true;
}

function validateFor(focus, formobj){
	var $this = $('#for', formobj);
	 if($this.val().length == 0){
		$('span.red',$this.closest('.control-group')).html('Please enter correct vehicle information').css('visibility','visible');
		if(focus ==  true){
			//$this.focus();
			
		}
		return false;
	}
	$('span.red',$this.closest('.control-group')).html('').css('visibility','hidden');
	return true;
}

function validateCountry(focus, formobj){
	var $this = $('#country option:selected', formobj);
	if($this.val() == -1){
		$('span.red',$this.closest('.control-group')).html('Please select valid country').css('visibility','visible');
		if(focus ==  true){
			//$this.focus();
			return false;
		}
		return false;
	}
	$('span.red',$this.closest('.control-group')).html('').css('visibility','hidden');
	return true;
}

function validateSubject(focus, formobj){
	var $this = $('#subject option:selected', formobj);
	if($this.val() == -1){
		$('span.red',$this.closest('.control-group')).html('Please select valid subject').css('visibility','visible');
		if(focus ==  true){
			//$this.focus();
			return false;
		}
		return false;
	}
	$('span.red',$this.closest('.control-group')).html('').css('visibility','hidden');
	return true;
}



function validateHear(focus, formobj){
	var $this = $('#hear option:selected', formobj);
	if($this.val() == -1){
		$('span.red',$this.closest('.control-group')).html('Please select valid option').css('visibility','visible');
		if(focus ==  true){
			//$this.focus();
			
		}
		return false;
	}
	$('span.red',$this.closest('.control-group')).html('').css('visibility','hidden');
	return true;
}



function validateMessage(focus, formobj){
	var $this = $('#message', formobj);
	if($.trim($this.val()).length == 0){
		$('span.red',$this.closest('.control-group')).html('Please enter valid message').css('visibility','visible');
		if(focus ==  true){
			//$this.focus();
			return false;
		}
		return false;
	}
	$('span.red',$this.closest('.control-group')).html('').css('visibility','hidden');
	return true;
}

$(document).ready(function(){
	jQuery("#myTab li a").click(function() {
		jQuery(".tab-pane").css('display', 'none').removeClass('active');
		jQuery("#myTab li").removeClass('active');
		jQuery(this).parent().addClass('active');
		
		var tabID = jQuery(this).attr('href');
		jQuery(tabID).css('display', 'block');
		
		if( tabID == "#fdealer" )
			$('#recaptacha').detach().appendTo($('#fformrecaptcha'));
		else
			$('#recaptacha').detach().appendTo($('#bformrecaptcha'));
		
		return false;
	});
	
	$('#fname', '#fformID').blur(function(){
		validateFname(true, '#fformID');
	});
	$('#email', '#fformID').blur(function(){
		validateEmail(true, '#fformID');
	});
	$('#cemail', '#fformID').blur(function(){
		validateConfirmEmail(true, '#fformID');
	});
	$('#state', '#fformID').blur(function(){
		validateState(true, '#fformID');
	});
	$('#subject', '#fformID').blur(function(){
		validateSubject(true, '#fformID');
	});
	$('#country', '#fformID').blur(function(){
		validateCountry(true, '#fformID');
	});
	$('#hear', '#fformID').blur(function(){
		validateHear(true, '#fformID');
	});
	$('#for', '#fformID').blur(function(){
		validateFor(true, '#fformID');
	});
	$('#phone', '#fformID').blur(function(){
		validatePhone(true, '#fformID');
	});
	$('#message', '#fformID').blur(function(){
		validateMessage(true, '#fformID');
	});
	
	$('#fformID').submit(function(e){
		var bError = false;		
		if( !validateFname(true, '#fformID') ){
			
			bError = true;
		}
		
		if( !validateEmail(true, '#fformID') ){
			
			bError = true;
		}
		
		if( !validateConfirmEmail(true, '#fformID') ){
			
			bError = true;
		}				
		
		if( !validateState(true, '#fformID') ){
			
			bError = true;
		}
		
		if( !validateSubject(true, '#fformID') ){
			
			bError = true;
		}
		
		if( !validateCountry(true, '#fformID') ){
			
			bError = true;
		}
		
		if( !validateHear(true, '#fformID') ){
			
			bError = true;
		}
		if( !validatePhone(true, '#fformID') ){
			
			bError = true;
		}
		if( !validateMessage(true, '#fformID') ){
			
			bError = true;
		}
		if( !validateFor(true, '#fformID') ){
			
			bError = true;
		}                
		
		if(bError){
			e.preventDefault();
			return false;
		}
		return true;					
	});
	
	
	$('#companyname', '#bformID').blur(function(){
		validateCompanyname(true, '#bformID');
	});
	$('#name', '#bformID').blur(function(){
		validatename(true, '#bformID');
	});
	$('#email', '#bformID').blur(function(){
		validateEmail(true, '#bformID');
	});
	$('#cemail', '#bformID').blur(function(){
		validateConfirmEmail(true, '#bformID');
	});
	$('#city', '#bformID').blur(function(){
		validateCity(true, '#bformID');
	});
	$('#zip', '#bformID').blur(function(){
		validateZip(true, '#bformID');
	});
	$('#country', '#bformID').blur(function(){
		validateCountry(true, '#bformID');
	});
	$('#hear', '#bformID').blur(function(){
		validateHear(true, '#bformID');
	});
	
	$('#phone', '#bformID').blur(function(){
		validatePhone(true, '#fformID');
	});
	$('#message', '#bformID').blur(function(){
		validateMessage(true, '#fformID');
	});
	
	$('.clearid').click(function(){
		//$(this).closest('form').trigger("reset");
	   $('span.red', $(this).closest('form')).html('').css('visibility','hidden');
	});
	
	$('#bformID').submit(function(e){
		var bError = false;		
		if( !validateCompanyname(true, '#bformID') ){
			
			bError = true;
		}
		
		if( !validatename(true, '#bformID') ){
			
			bError = true;
		}
		
		if( !validateEmail(true, '#bformID') ){
			
			bError = true;
		}
		
		if( !validateConfirmEmail(true, '#bformID') ){
			
			bError = true;
		}				
		
		if( !validateCity(true, '#bformID') ){
			
			bError = true;
		}
		
		if( !validateZip(true, '#bformID') ){
			
			bError = true;
		}
		
		if( !validateCountry(true, '#bformID') ){
			
			bError = true;
		}
		
		if( !validateHear(true, '#bformID') ){
			
			bError = true;
		}
		
		if( !validatePhone(true, '#bformID') ){
			
			bError = true;
		}
		if( !validateMessage(true, '#bformID') ){
			
			bError = true;
		}
		if(bError){
			e.preventDefault();
			return false;
		}
			
		return true;					
	});	
});