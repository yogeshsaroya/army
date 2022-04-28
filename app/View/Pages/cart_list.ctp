	<?php if (isset($getAll) && !empty($getAll)) { ?>
		<div class="cartProducts">
			<h2>Check Order Status</h2>
			<?php
			$total = 0;
			foreach ($getAll as $list) {

				if ($list['Product']['type'] == 1) {
					$ima = json_decode($list['Product']['images'], true);
					$pImg = new_show_image('cdn/cdnimg/' . $ima[0], 50, 50, 100, 'ff', null);
				} elseif ($list['Product']['type'] == 4) {
					$abc = explode(',', $list['Product']['extra_photos']);
					$get_path = null;
					if (isset($abc[0]) && !empty($abc[0])) {
						$get_path = $this->Lab->getImage($abc[0]);
					}
					if (isset($get_path)) {
						$pImg = new_show_image('cdn/' . $get_path, 150, 150, 100, 'ff', null);
					} else {
						$pImg = new_show_image('cdn/no_image_available.jpg', 150, 150, 100, 'ff', null);
					}
				} else {
					$pImg = new_show_image('cdn/' . $list['Product']['Library']['full_path'], 50, 50, 100, 'ff', null);
				}

				$amount = $list['Product']['price'] -  ($list['Product']['price'] * $list['Product']['discount'] / 100);

				$amt = num_2($list['Cart']['quantity'] * $amount);
				$total += $amt;
			?>
				<div class="cartPro d-flex align-items-center wrapUnset">
					<div class="imgWrap"><img src="<?php echo $pImg ?>" loading="lazy" alt=""></div>
					<div class="proDetails d-flex wrapUnset">
						<div class="titletg">
							<h2><?php echo substr($list['Product']['title'], 0, 25); ?></h2>
							<div class="d-flex wrapUnset align-items-center">
								<div class="dropdown"><button class="btn btn-primary" type="button">Qty <i class="proNmber"><?php echo $list['Cart']['quantity']; ?></i></button></div>
							</div>
						</div>
						<span class="priceMny">USD $<?php echo $amt; ?></span>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="subTotals">
			<p class="d-flex"><span><strong>Sub-Total</strong></span><span>USD $<?php echo num_2($total); ?></span></p>
			<p class="d-flex"><span><strong>Total</strong></span><span>USD $<?php echo num_2($total); ?></span></p>
			<div class="btn-wrap">
				<div class="row">
					<div class="col-xs-6"><a href="<?php echo SITEURL; ?>cart" class="linkBtn btnDark">VIEW CART</a></div>
					<div class="col-xs-6"><a href="<?php echo SITEURL; ?>check_out" class="linkBtn btnDark">CHECK OUT</a></div>
				</div>
			</div>
		</div>
	<?php } else {
		echo '<div class="cartProducts"><h2>Your shopping cart is empty!</h2></div>';
	} ?>