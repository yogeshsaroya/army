<div class="content_bg"></div>
</div>

<?php if(!isset($IsMobile)){?>
<footer class="fullwidth">

<div id="inner-footer" class="row  army-ftr">
		<h2>WE EXCITE YOUR LIFE</h2>
		<div class="small-12 medium-11 medium-offset-1 large-10 large-offset-2 columns">
			<div class="small-6 medium-2 large-2 columns">
				<h3><a href="javascript:void(0);">About Us</a></h3>
				<ul>
				<li><a href="<?php echo SITEURL;?>privacy-policy">Privacy Policy</a></li>
					<li><a href="<?php echo SITEURL;?>exhaust">Our brand</a></li>
					<li><a href="<?php echo SITEURL;?>featured-video">Media </a></li>
					<li><a href="<?php echo SITEURL;?>dealer">Dealers </a></li>
					<li><a href="<?php echo SITEURL;?>contact">Contact us  </a></li>
					<li><a href="<?php echo SITEURL;?>warranty">Warranty </a></li>
				</ul>
			</div>

			<div class="small-6 medium-2 large-2 columns">
				<h3><a href="javascript:void(0);">PRODUCTS</a></h3>
				<ul>
					<li><a href="<?php echo SITEURL;?>product-exhaust">Exhaust System</a></li>
					<?php /*?><li><a href="<?php echo SITEURL;?>product-tuning-box">Tuning Box</a></li> 
					<li><a href="<?php echo SITEURL;?>shop/obdii-wireless-remote-control-kit">OBD2 Remote Control Module</a></li>
					<?php */?>
				</ul>
			</div>
			
			<div class="small-6 medium-2 large-2 columns">
				<h3><a href="javascript:void(0);">TECHNOLOGY</a></h3>
				<ul>
					<li><a href="<?php echo SITEURL;?>technology">Advantages</a></li>
					<li><a href="<?php echo SITEURL;?>testimonial">Testimonial</a></li>
			<?php /*?>			<li><a href="<?php echo SITEURL;?>dyno">Dyno proven</a></li>   <?php */?>
				</ul>
			</div>

	
			<div class="small-6 medium-2 large-2 columns">
				<h3><a href="javascript:void(0);">Social</a></h3>
				<ul>
					<li><a href="http://www.youtube.com/armytrix" id="social-youtube">YouTube</a></li>
					<li><a href="http://www.facebook.com/armytrix" id="social-facebook">Facebook</a></li>
					<li><a href="https://www.instagram.com/armytrix_official/" id="social-instagram">Instagram</a></li>
				</ul>
			</div>
		</div>
<div class="clear"></div>

		<div id="footer-bottom" class="col-md-12">
			<p class="right">FOR U.S. ORDERS CALL  480-346-3875</p>
			<p class="source-org copyright left">&copy <?php echo date('Y');?> Armytrix Corporation</p>
		</div>
	</div>

      
            <div class="clear"></div>
        </div>
    </footer>
<script type="text/javascript" src="<?php echo SITEURL;?>js/modules.js"></script>
<script type="text/javascript" src="<?php echo SITEURL;?>js/theme.js"></script>
<link href="<?php echo SITEURL;?>css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo SITEURL;?>js/jquery.smartmenus.js"></script>
<script type="text/javascript" src="<?php echo SITEURL;?>js/jquery.smartmenus.bootstrap.js"></script>
<script>
$( document ).ready(function() {
    /* Search */
    $('#search input[name=\'search\']').parent().find('button').on('click', function() {
    	url = '<?php echo SITEURL;?>search?';
    	var value = $('#army_search').val();
    	if (value) { url += 's=' + encodeURIComponent(value); }
    	console.log(value);
    	location = url;
    });
    $('#search input[name=\'search\']').on('keydown', function(e) { if (e.keyCode == 13) { $('header input[name=\'search\']').parent().find('button').trigger('click'); } });});

jQuery(document).ready(function() {
			"use strict";
			jQuery('.fw_background').height(jQuery(window).height());
			jQuery('.main_header').removeClass('hided');
			jQuery('.fullscreen_block').addClass('loaded');
			
			jQuery('html').addClass('without_border');
		});
</script> 
<?php }else{?>
<style>
@media(max-width:767px){
#new-pro-page .row.lang_bar .arw-close{display:none!important}
#new-pro-page .row.lang_bar{top:7px;padding:60px 10px 20px!important}
#new-pro-page .row.lang_bar.stickys{position:inherit}
}@media(max-width:480px){
/* #main_sec{margin-top:16px!important} */
#new-pro-page .row.lang_bar{top:0;padding:52px 0 20px}
#new-pro-page .row.lang_bar .input.select select{width:100%;min-width:250px}
#new-pro-page .top-bg-4{margin-top:0}
}
@media (max-width:900px) {
#doInquiry a{color: #fff!important;}
}

@media (min-width:300px) and (max-width:786px) {


.pd_r { padding-right:0px !important;}
#check-out-pg .pad-right { padding-left: 0px; }
select,.form-control { background-color: #e2e3e4 !important; border: 0px solid #cdcdcd !important;}

.review_page .submit-btn { width: 100%; }

}

.m_cart img {width: 64px}
.m_cart { position: fixed; top: 5%; right: 20px; z-index: 999; cursor: pointer;}
</style>



 <nav class="navbar navbar-default navbar-fixed-bottom" id="nav-army-mbl-frnd" style="min-height:40px !important;">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
     <div class="btn-btn-links">
       <a href="https://www.youtube.com/c/armytrix" target="_blank"><img src="<?php echo SITEURL;?>bootstrap_3_3_6/img/YouTube-icon-full_color.png"></a></div> 
       
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
       Menu <i class="arrow-tp"></i>
      </button> 
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li class="active"><a href="<?php echo SITEURL;?>cart">Checkout</a></li>
<li class=""><a href="<?php echo SITEURL;?>shop">Shop</a></li>
<li><a href="<?php echo SITEURL;?>product-exhaust">EXHAUST SYSTEM</a></li>
<li class="dropdown"> <a aria-expanded="false" href="#" class="dropdown-toggle" data-toggle="dropdown">PROGRAM <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="<?php echo SITEURL;?>homes/program">SPONSORSHIP</a></li>
<li><a href="<?php echo SITEURL;?>instagram">SHOW OFF</a></li>
</ul>
</li>
        
        
        
        <?php /*?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">EXHAUST SYSTEM<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo SITEURL;?>product-exhaust">EXHAUST CATALOG</a></li>
			<li><a href="<?php echo SITEURL;?>exhaust">ABOUT OUR EXHAUST</a></li>
			<li><a href="<?php echo SITEURL;?>warranty">EXHAUST WARRANTY</a></li>
			<li><a href="<?php echo SITEURL;?>questions">EXHAUST FAQS</a></li>
          </ul>
        </li>
        
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ECU TUNING<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo SITEURL;?>tuning_search">ECU CATALOG</a></li>
			<li><a href="<?php echo SITEURL;?>ecu">ABOUT OUR ECU</a></li>
			<li><a href="<?php echo SITEURL;?>ecu-warranty">ECU WARRANTY</a></li>
			<li><a href="<?php echo SITEURL;?>ecu-qa">ECU FAQS</a></li>
          </ul>
        </li>
        
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">TUNING BOX KITS <span class="caret"></span></a>
          <ul class="dropdown-menu">
			<li><a href="<?php echo SITEURL;?>product-tuning-box">TUNING BOX CATALOG</a></li>
			<li><a href="<?php echo SITEURL;?>tuning-box">ABOUT OUR TUNING BOX</a></li>
			<li><a href="<?php echo SITEURL;?>tuning-box-warranty">TUNING BOX WARRANTY</a></li>
			<li><a href="<?php echo SITEURL;?>tuning-box-qa">TUNING BOX FAQS</a></li>
          </ul>
        </li>
        <?php */?>
        

 <li><a href="<?php echo SITEURL;?>faqs">FAQs</a></li>
 
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DEALERS<span class="caret"></span></a>
<ul class="dropdown-menu">
            <li ><a href="<?php echo SITEURL;?>homes/material">MATERIALS</a></li>
            	<li><a href="<?php echo SITEURL;?>dealer">LOCATE DEALER</a></li>
				<?php /*?><li><a href="<?php echo SITEURL;?>become-dealer">BECOME DEALER</a></li> <?php */?>
				<?php /*?><li><a href="<?php echo SITEURL;?>pages/dealer_membership">Dealer Register</a></li> <?php */?>
			
</ul></li>

<li class="dropdown"> <a aria-expanded="false" href="#" class="dropdown-toggle" data-toggle="dropdown">Technology <b class="caret"></b></a>
<ul class="dropdown-menu">
<li ><a href="<?php echo SITEURL;?>sound">Sound KIT</a></li>
<li><a href="<?php echo SITEURL;?>performance">Performance</a></li>
</ul></li>
<li class="active"><a href="<?php echo SITEURL;?>testimonial">Testimonial</a></li>
<li class="active"><a href="<?php echo SITEURL;?>featured-video">Videos</a></li> 
<li><a href="https://www.armytrix.com/blog/">Blog</a></li>      
<li><a href="<?php echo SITEURL;?>warranty_registration">Warranty Registration</a></li>
<li class="dropdown"> <a aria-expanded="false" href="#" class="dropdown-toggle" data-toggle="dropdown">CONTACT <b class="caret"></b></a>
<ul class="dropdown-menu set-last">
<li ><a href="<?php echo SITEURL;?>contact">CONTACT US</a></li>
<li><a href="<?php echo SITEURL;?>homes/new_kit_request">New Kit</a></li>
</ul>
</li>
<li><a href="<?php echo SITEURL;?>privacy-policy">Privacy Policy</a></li>

      </ul>
    </div>
   </div>   
</nav>  
<style>
.nav>li.active >a:before, .nav>li:hover >a:before {content:'' !important;}
#nav-army-mbl-frnd .nav.navbar-nav li {
    padding: 0 5px;
    border-bottom: 0px solid #CEC6C6;
}
</style>
<?php }?>
<script type="text/javascript">

$(document).ready(function(){
  $(".soc_h").hover(function(){
	  var id = this.id;
	  var i = $('#'+id).attr('h_img');
	  $("#"+id+" img").attr("src", SITEURL+"v_4/head/"+i);
    }, function(){
    	var id = this.id;
  	  var i = $('#'+id).attr('c_img');;
  	  $("#"+id+" img").attr("src", SITEURL+"v_4/head/"+i);
  });
});

 		
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-41602684-1', 'armytrix.com');
		  ga('send', 'pageview');

</script>

<script>

 $(document).ready(function(){


$('#nav-army .navbar-nav.nav-justified  li').click(function() {
        // remove active class
        $('#nav-army .navbar-nav.nav-justified > li').removeClass('open');
        // add active class
        $(this).addClass('open');
   });
 $(document).mouseup(function (e){
		    var container = $(".navbar-nav.nav-justified .dropdown-menu");
		    if (!container.is(e.target)  && container.has(e.target).length === 0){
		        $(".navbar-nav.nav-justified .dropdown-menu").hide(); }
		});
});


$(window).scroll(function() {
if ($(this).scrollTop() > 650){  
    $('.navbar-static-top').addClass("sticky-nav");
  }
  else{
    $('.navbar-static-top').removeClass("sticky-nav");
  }   
 
 
});
</script>