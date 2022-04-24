<header>
	<div class="container-fluid d-flex align-items-center">
		<div class="leftMenuBar mr-auto">
			<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-list openMenu" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
			</svg>

			<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-x-lg closeMenu" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
			  <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
			</svg>
		</div>
		<div class="logoWrap text-center">
			<a href="#"><img src="<?php echo SITEURL;?>v2/img/logo_armytrix.png"></a>
		</div>

		<div class="ml-auto cartBox d-flex align-items-center">
			<span>Check your orders</span>
			<i class="cartWrap">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 17 17">
				  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
				</svg>
			</i>
		</div>


	</div>
</header>


<div class="leftSideNav">
	<ul class="navbarSide">
		<li><a href="#">CAR EXHAUST</a></li>
		<li><a href="#">MOTORCYCLE EXHAUST</a></li>
		<li class="mt-5"><a href="#">CHECK CART</a></li>
		<li><a href="#">FIND A DEALER</a></li>
		<li><a href="#">CONTACT US</a></li>
	</ul>	
</div>


<script>
 $(document).ready(function(){	
	$(window).scroll(function(){
    if ($(this).scrollTop() > 10) {
       $('header').addClass('fixedHeader');
    } else {
       $('header').removeClass('fixedHeader');
    }
});
	// menu open js

	$('.openMenu').click(function(){
       $(this).hide('fast');
       $('.closeMenu').fadeIn('slow');
       $('body').addClass('openMenuBar');
	});
	$('.closeMenu').click(function(){
       $(this).hide('fast');
       $('.openMenu').fadeIn('slow');
       $('body').removeClass('openMenuBar');
	});

});

</script>