<?php echo $this->Html->css(["cs-css"], ['block' => 'css']); ?>

<div class="customer-support-wrapper cs-fitment-step3 cs-fitment-step3-3">

	<div class="customer-support-bg" <?php if (!empty($topbg)) { echo 'style="'.$topbg.'"'; }?>>
	</div>
	<div class="customer-support-main">
		<div class="customer-support-title">
		User
		</div>
		<form action="/customer-support-submit/2" method="post" enctype="multipart/form-data">
		<div class="customer-support-title2">
		- Contact Info.
		</div>
		<input name="field[]" type="hidden" value="Customer Support of Check engine from User"/>
		
		<input name="field[]" class="cs-field"  type="text" placeholder="Name:"/>
		<input name="field[]" class="cs-field"  type="text" placeholder="Phone number:" onkeypress='validate(event)'/>
		<input name="field[]" class="cs-field"  type="text" placeholder="Country:"/>
		<input name="field[]" class="cs-email"  type="email" placeholder="Email:"/>
		<span class="cs-input-desc">Purchase date:</span>
		<input class="cs-date cs-pur-date" name="field[]" type="date" placeholder="Purchase date:"/>
		<span class="cs-input-desc">Installation date:</span>
		<input class="cs-date cs-inst-date" name="field[]" type="date" placeholder="Installation date:"/>
		<input name="field[]" class="cs-field"  type="text" placeholder="Car model:"/>
		<input name="field[]" class="cs-field"  type="text" placeholder="Vin number:"/>
		<input name="field[]" class="cs-field"  type="text" placeholder="Name of your installer:"/>
		<input name="field[]" class="cs-field"  type="text" placeholder="Name of the shop you bought your system from:"/>
		<div class="customer-support-title2">
		- Proper videos of the problem
		</div>
		<div class="customer-support-title2 customer-support-subtitle2">
		(Please upload to one of this platform first) <img src="<?php echo SITEURL;?>image/customer-support/fit-is-step_social.png" />
		</div>
		<input class="cs-field" name="field[]" type="text" placeholder="Video link(URL):"/>
		<div class="customer-support-title2">
		- Proper pictures of the location of the problem
		</div>
		<input class="cs-field" name="file[]" type="file" id="my_file" style="display: none;" multiple />
		<div class="cs-upload">
			<img src="<?php echo SITEURL;?>image/customer-support/upload.png" />
		</div>
		<textarea name="field[]" class="cs-field" placeholder="Problem description"></textarea>
		
		</form>
		<div class="form-button">
			<img src="<?php echo SITEURL;?>image/customer-support/send-green.png" />
		</div>
	</div>
	<div class="customer-support-bg3">
	</div>	
	<div class="cs-clear"></div>
</div>
<script src='https://www.armytrix.com/js/cs-js.js'></script>