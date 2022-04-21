<script type="text/javascript">
$( document ).ready(function() {
	$( ".more-infor-up" ).click(function() { $( "#search_exhaust_block" ).toggle(); });
});
</script>   
<?php if( !isset($IsMobile)){
	echo $this->Html->script(array('jquery.isotope.min','sorting'));
?>   
    <script type="text/javascript">
        jQuery(document).ready(function($){
			"use strict";
			setTimeout(function(){
                jQuery('.fullscreen_block').removeClass('hided');
			},500);
			setTimeout("jQuery('.preloader').remove()", 700);			
		});
    </script>
<?php } ?>	