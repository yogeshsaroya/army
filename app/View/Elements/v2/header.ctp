<header id="v2_header">
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
		
		<li><?php echo $this->Html->link('Check your orders', '#od_st_modal',['class'=>'popup-modal']); ?></li>
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
        <button class="btn btn-default black_bg" type="button" id="od_s">Go!</button>
      </span>
    </div>
    <br>
	<p class="text-right"><a class="popup-modal-dismiss" href="#">Close</a></p>
  </div>
</div>
	
</div>

<div class="sideNav rightSide cartSideBar">
	<div class="cartProducts">
	<h2>Products</h2>
	<div class="cartPro d-flex align-items-center wrapUnset">
		<div class="imgWrap">
			<img src="https://res.cloudinary.com/armytrix/image/upload/v1650865455/home/shop_ntocqa.png" alt="product img">
		</div>
		<div class="proDetails d-flex wrapUnset">
			<div  class="titletg">
			   <h2>Product Name</h2>
			   <div class="d-flex wrapUnset align-items-center">
			   	 <span class="removeProd">Delete</span>
			   	<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Qty <i class="proNmber">1</i> 
	  	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down arrowDown" viewBox="0 0 16 16">
	  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
	</svg>
</button>
  <ul class="dropdown-menu">
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
  </ul>
</div>
			   </div>
			   <!-- end of qwality div -->
		    </div>
		    <!-- end of title div -->
		    <span class="priceMny">$25.87</span>
		</div>
	</div>
	<!-- end of cartProduct -->

	<div class="cartPro d-flex align-items-center wrapUnset">
		<div class="imgWrap">
			<img src="https://res.cloudinary.com/armytrix/image/upload/v1650865455/home/shop_ntocqa.png" alt="product img">
		</div>
		<div class="proDetails d-flex wrapUnset">
			<div  class="titletg">
			   <h2>Product Name</h2>
			   <div class="d-flex wrapUnset align-items-center">
			   	 <span class="removeProd">Delete</span>
			   	<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Qty <i class="proNmber">1</i> 
	  	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down arrowDown" viewBox="0 0 16 16">
	  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
	</svg>
</button>
  <ul class="dropdown-menu">
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
  </ul>
</div>
			   </div>
			   <!-- end of qwality div -->
		    </div>
		    <!-- end of title div -->
		    <span class="priceMny">$25.87</span>
		</div>
	</div>
	<!-- end of cartProduct -->

	<div class="cartPro d-flex align-items-center wrapUnset">
		<div class="imgWrap">
			<img src="https://res.cloudinary.com/armytrix/image/upload/v1650865455/home/shop_ntocqa.png" alt="product img">
		</div>
		<div class="proDetails d-flex wrapUnset">
			<div  class="titletg">
			   <h2>Product Name</h2>
			   <div class="d-flex wrapUnset align-items-center">
			   	 <span class="removeProd">Delete</span>
			   	<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Qty <i class="proNmber">1</i> 
	  	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down arrowDown" viewBox="0 0 16 16">
	  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
	</svg>
</button>
  <ul class="dropdown-menu">
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
  </ul>
</div>
			   </div>
			   <!-- end of qwality div -->
		    </div>
		    <!-- end of title div -->
		    <span class="priceMny">$25.87</span>
		</div>
	</div>
	<!-- end of cartProduct -->

</div>
<!--cart product wrap -->

	<div class="subTotals">
		<p class="d-flex">
			<span><strong>Sub-Total</strong></span>
			<span>USD $64.38</span>
		</p>

		<p class="d-flex">
			<span><strong>Total</strong></span>
			<span>USD $64.38</span>
		</p>

<div class="btn-wrap">
		<div class="row">
			<div class="col-xs-6">
				<a href="#" class="linkBtn btnDark">VIEW CART</a>
			</div>
			<!-- end of col -->
			<div class="col-xs-6">
				<a href="#" class="linkBtn btnDark">CHECK OUT</a>
			</div>
			<!-- end of col -->
		</div>
	</div>
</div>
<!-- end of subtotal wrap -->
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


	$('.openMenu').click(function(){
       $(this).hide();
       $('.closeMenu').show();
       $('body').addClass('openMenuBar');
       
	});
	$('.closeMenu').click(function(){
       $(this).hide();
       $('.openMenu').fadeIn('slow');
       $('body').removeClass('openMenuBar');
	});
	

	$('.cartWrap').click(function(){
       $(this).hide();
       $('.closeCartMenu').show();
       $('body').addClass('openCartBar');
	});
	$('.closeCartMenu').click(function(){
       $(this).hide();
       $('.cartWrap').show();
       $('body').removeClass('openCartBar');
	});

	var screenHeight = $(window).height();
	var linkHt = $('.serVicesLinks').outerHeight();
	var subTotalsht = $('.subTotals').outerHeight();


	$('#home_slider .slick-track .slick-slide').css('height' , screenHeight - linkHt);

	$('.fullScreen').css('height' , screenHeight);
	$('.cartSideBar').css('padding-top' , linkHt + 20).css('padding-bottom' , subTotalsht + 20);
	 
});
<?php $this->Html->scriptEnd(); ?>