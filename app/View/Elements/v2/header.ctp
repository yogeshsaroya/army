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
			<a href="<?php echo SITEURL; ?>"><img src="<?php echo SITEURL; ?>v2/img/logo_armytrix.png"></a>
		</div>

		<div class="ml-auto cartBox d-flex align-items-center">
		<a class="popup-modal" href="#od_st_modal">Check your orders</a>
			<div class="cartHead">
				
				<i class="cartWrap">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 17 17">
						<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
					</svg>
				</i>
			</div>

			<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-x-lg closeCartMenu" viewBox="0 0 16 16" style="display: none;">
				<path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
				<path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
			</svg>
		</div>


	</div>
</header>


<div class="sideNav leftSide">
	<ul class="navbarSide">
		<li><?php echo $this->Html->link('CAR EXHAUST', '/product-exhaust'); ?></li>
		<li><?php echo $this->Html->link('MOTORCYCLE EXHAUST', '/motocycle-exhaust '); ?></li>
		<li class="mt-5"><?php echo $this->Html->link('CHECK CART', '/cart'); ?></li>
		<li><?php echo $this->Html->link('FIND A DEALER', '/dealer'); ?></li>
		<li><?php echo $this->Html->link('CONTACT US', '/contact'); ?></li>
	</ul>
</div>
<div id="od_st_modal" class="white-popup-block mfp-hide">
	<h2>Check Order Status</h2>
	
<div class="row">
  <div class="col-lg-12">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Enter Order Number... " id="ord_num" autofocus="autofocus">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" id="od_s">Go!</button>
      </span>
    </div>
    <br>
	<p class="text-right"><a class="popup-modal-dismiss" href="#">Close</a></p>
  </div>
</div>
	
</div>

<div class="sideNav rightSide">
	<h2>Your Cart Is Empty</h2>
</div>


<?php $this->Html->scriptStart(array('block' => 'scriptBottom')); ?>
$(function () {

$("#od_s").click(function(){
	  var n = $.trim ( $("#ord_num").val() );
	  location.href = SITEURL+"pages/order/success/"+n;
	  
	});

$('.popup-modal').magnificPopup({
	type: 'inline',
	preloader: false,
	focus: '#username',
	modal: true
});
$(document).on('click', '.popup-modal-dismiss', function (e) {
	e.preventDefault();
	$.magnificPopup.close();
});
});

 $(document).ready(function(){	
	$(window).scroll(function(){
    if ($(this).scrollTop() > 10) {
       $('body').addClass('fixedHeader');
    } else {
       $('body').removeClass('fixedHeader');
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
	

	$('.cartWrap').click(function(){
       $(this).hide('fast');
       $('.closeCartMenu').fadeIn('slow');
       $('body').addClass('openCartBar');
	});
	$('.closeCartMenu').click(function(){
       $(this).hide('fast');
       $('.cartWrap').fadeIn('slow');
       $('body').removeClass('openCartBar');
	});

	var screenHeight = $(window).height();
	var linkHt = $('.serVicesLinks').outerHeight();
	$('#home_slider .slick-track .slick-slide').css('height' , screenHeight - linkHt);

	$('.fullScreen').css('height' , screenHeight)
});
<?php $this->Html->scriptEnd(); ?>