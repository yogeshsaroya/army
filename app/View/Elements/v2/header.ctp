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
			<a href="<?php echo SITEURL; ?>" title="logo" aria-label="logo" ><img src="<?php echo SITEURL; ?>v2/img/logo_armytrix.png" alt="" width="250" height="38"></a>
		</div>

		<div class="ml-auto cartBox d-flex align-items-center">

			<div class="cartHead">
				<i class="cartWrap" id="_cart_icon">
				<?php if(isset($getAll) && !empty($getAll)){?>
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16"><path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z"/></svg>
				<?php }else{?>
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 17 17"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path></svg>
				<?php }?>
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
		<li><?php echo $this->Html->link('MOTORCYCLE EXHAUST', '/motorcycle-exhaust '); ?></li>
		<li class="mt-5"><?php echo $this->Html->link('CHECK CART', '/cart'); ?></li>

		<li><?php echo $this->Html->link('Check your orders', '#od_st_modal', ['class' => 'popup-modal']); ?></li>
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

<div class="sideNav rightSide cartSideBar" id="_my_cart">
	<?php echo $this->element('v2/cart_list',['getAll'=>$getAll])?>
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
$('.openMenu').show();
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


});
<?php $this->Html->scriptEnd(); ?>