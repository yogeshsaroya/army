
	$(".cs-upload img").click(function() {
		$("input[id='my_file']").click();
		$('#my_file').show();
	});
	$('.form-button').click(function() {
		$('.customer-support-main input.cs-field,.customer-support-main input.cs-email,.customer-support-main input.cs-date, .customer-support-main textarea').each(function(){
			if (!$(this).hasClass('cs-ok')) {
				console.log($(this),'no data');
				$(this).addClass('cs-selected');
			}
		});
		var error = 0;
		$('.customer-support-main input.cs-field,.customer-support-main input.cs-email,.customer-support-main input.cs-date, .customer-support-main textarea').each(function(){
			if (!$(this).hasClass('cs-ok')) {
				$('html, body').animate({
					scrollTop: $(this).offset().top - 170
				}, 500);	
				error = 1;			
				return false;
			}
		});
		if (error != 1) {
			$('form').submit();
		}
	});
	$('.customer-support-main input.cs-date, .customer-support-main input#my_file').change(function() {
		$(this).removeClass('cs-ok');
		if ($(this).val() != '' ) {
			$(this).addClass('cs-ok');
		}
	});
	$('.customer-support-main .cs-field').keyup(function(){
		$(this).removeClass('cs-ok');
		if ($(this).val() != '' ) {
			$(this).addClass('cs-ok');
		}
	});
	$('.customer-support-main .cs-email').keyup(function(){
		$(this).removeClass('cs-ok');
		if (isValidEmailAddress( $(this).val() )) {
			$(this).addClass('cs-ok');
		}
	});
	$('.customer-support-main .cs-email').focusout(function(){
		$(this).removeClass('cs-ok');
		if (isValidEmailAddress( $(this).val() )) {
			$(this).addClass('cs-ok');
		}
	});
	
	
function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}
