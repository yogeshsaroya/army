<link rel="stylesheet" type="text/css" href="/css/cs-css.css"/>

<div class="customer-support-wrapper cs-fitment-step3">

	<div class="customer-support-bg">
	</div>
	<div class="customer-support-main">
		<div class="customer-support-title">
		Dealer
		</div>
		<form action="/customer-support-submit/3" method="post" enctype="multipart/form-data">
		<div class="customer-support-title2">
		- Contact Info.
		</div>
		<input name="field[]" type="hidden" value="Customer Support of Fitment Issue from Dealer"/>
		
		<input name="field[]" class="cs-field"  type="text" placeholder="Name:"/>
		<input name="field[]" class="cs-field"  type="text" placeholder="Name of your shop:"/>
		<input name="field[]" class="cs-field"  type="text" placeholder="Address of your shop:"/>
		<input name="field[]" class="cs-field"  type="text" placeholder="Phone number:" onkeypress='validate(event)'/>
		<input name="field[]" class="cs-email"  type="email" placeholder="Email:"/>
		<input name="field[]" class="cs-field"  type="text" placeholder="Purchase order number:"/>
		<span class="cs-input-desc">Purchase date:</span>
		<input class="cs-date cs-pur-date" name="field[]" type="date" placeholder="Purchase date:"/>
		<span class="cs-input-desc">Installation date:</span>
		<input class="cs-date cs-inst-date" name="field[]" type="date" placeholder="Installation date:"/>
		<div class="customer-support-title2">
		- Proper videos of the problem
		</div>
		<div class="customer-support-title2 customer-support-subtitle2">
		(please upload to one of this platform first) <img src="../image/customer-support/fit-is-step_social.png" />
		</div>
		<input name="field[]" class="cs-field"  type="text" placeholder="Video link(URL):"/>
		<div class="customer-support-title2">
		- Proper pictures of the location of the problem
		</div>
		<input name="file[]" type="file" class="cs-field" id="my_file" style="display: none;" multiple />
		<div class="cs-upload">
			<img src="../image/customer-support/upload.png" />
		</div>
		<textarea name="field[]" class="cs-field" placeholder="Problem description"></textarea>
		
		</form>
		<div class="form-button">
			<img src="../image/customer-support/send-green.png" />
		</div>
	</div>
	<div class="customer-support-bg3">
	</div>	
	<div class="cs-clear"></div>
</div>

<script src='https://www.armytrix.com/js/cs-js.js'></script>