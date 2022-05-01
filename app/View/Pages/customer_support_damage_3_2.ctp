<?php echo $this->Html->css(["cs-css"], ['block' => 'cssTop']); ?>

<div class="customer-support-wrapper cs-damage-step3-2">

	<div class="customer-support-bg">
	</div>
	<div class="customer-support-main">
		<div class="customer-support-title">
		User
		</div>
		<form action="/customer-support-submit/2" method="post" enctype="multipart/form-data">
		<div class="customer-support-title2">
		- Contact Info.
		</div>
		<input name="field[]" type="hidden" value="Customer Support of Damage from User"/>
		
		<input name="field[]" type="text" class="cs-field" placeholder="Name:"/>
		<input name="field[]" type="text" class="cs-field" placeholder="Phone number:" onkeypress='validate(event)'/>
		<input name="field[]" type="text" class="cs-field" placeholder="Country:"/>
		<input name="field[]" type="text" class="cs-email" placeholder="Email:"/>
		<span class="cs-input-desc">Purchase date:</span>
		<input class="cs-date cs-pur-date" name="field[]" type="date" placeholder="Purchase date:"/>
		<span class="cs-input-desc">Installation date:</span>
		<input class="cs-date cs-inst-date" name="field[]" type="date" placeholder="Installation date:"/>
		<input name="field[]" type="text" class="cs-field" placeholder="Car model:"/>
		<input name="field[]" type="text" class="cs-field" placeholder="Vin number:"/>
		<input name="field[]" type="text" class="cs-field" placeholder="Name of your installer:"/>
		<input name="field[]" type="text" class="cs-field" placeholder="Name of the shop you bought your system from:"/>
		<div class="customer-support-title2">
		- Proper pictures of the location of the problem
		</div>
		<input name="file[]" type="file" class="cs-field" id="my_file" style="display: none;" multiple />
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