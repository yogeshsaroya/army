<?php echo $this->Html->css(["cs-css"], ['block' => 'cssTop']); ?>

<div class="customer-support-wrapper cs-fitment-step3">

	<div class="customer-support-bg" <?php if (!empty($topbg)) { echo 'style="'.$topbg.'"'; }?>>
	</div>
	<div class="customer-support-main">
		<div class="customer-support-title">
		User
		</div>
		<form action="/customer-support-submit/5" method="post" enctype="multipart/form-data">
		<div class="customer-support-title2">
		- Contact Info.
		</div>
		<input name="field[]" type="hidden" value="Customer Support of Valve Control from User"/>
		
		<input name="field[]" class="cs-field"  type="text" placeholder="Name:"/>
		<input name="field[]" class="cs-field"  type="text" placeholder="Phone number:" onkeypress='validate(event)'/>
		<input name="field[]" class="cs-field"  type="text" placeholder="Address:"/>
		<input name="field[]" class="cs-email"  type="email" placeholder="Email address:"/>
		<div class="customer-support-title2">
		- Installer Info.
		</div>
		<input name="field[]" class="cs-field"  type="text" placeholder="Name of your installer:"/>
		<input name="field[]" class="cs-field"  type="text" placeholder="Phone number:" onkeypress='validate(event)'/>
		<input name="field[]" class="cs-field"  type="text" placeholder="Address:"/>
		<input name="field[]" class="cs-email"  type="email" placeholder="Email address:"/>
		<div class="customer-support-title2">
		- Purchase Info.
		</div>
		<span class="cs-input-desc">Installation date:</span>
		<input class="cs-date cs-inst-date" name="field[]" type="date" placeholder="Installation date:"/>
		<div class="customer-support-title2">
		- ARMYTRIX Customer support
		</div>		
		<input name="field[]" class="cs-field"  type="text" placeholder="Vin number:"/>
		<textarea name="field[]" class="cs-field" placeholder="Problem description"></textarea>
		<div class="customer-support-title2">
		- Proper videos of the problem
		</div>
		<div class="customer-support-title2 customer-support-subtitle2">
		(Please upload to one of this platform first) <img src="<?php echo SITEURL;?>image/customer-support/fit-is-step_social.png" />
		</div>
		<input name="field[]" class="cs-field" type="text" placeholder="Video link(URL):"/>
		<div class="customer-support-title2">
		- Proper pictures of the location of the problem
		</div>
		<input name="file[]" class="cs-field" type="file" id="my_file" style="display: none;" multiple />
		<div class="cs-upload">
			<img src="<?php echo SITEURL;?>image/customer-support/upload.png" />
		</div>
		
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