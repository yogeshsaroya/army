<link rel="stylesheet" type="text/css" href="/css/cs-css.css"/>
<?php if (!empty($style)) { echo $style; } ?>

<div class="customer-support-wrapper cs-damage-step1">

	<div class="customer-support-bg" <?php if (!empty($topbg)) { echo 'style="'.$topbg.'"'; }?> >
	</div>
	<div class="customer-support-main">
		<div class="customer-support-title">
			<?php echo $title ?>
		</div>
		<?php if (!empty($title2)) {?>
			<div class="customer-support-title2">
			<?php echo $title2; ?>
			</div>
		<?php } ?>
		
		<?php if (!empty($text)) {?>
			<div class="customer-support-subtitle">
				<?php echo $text; ?>
			</div>
		<?php } ?>
		
		<?php if (!empty($image)) {?>
			<div class="cs-damage-subimage">
				<img src="../image/customer-support/<?php echo $image; ?>" />
			</div>
		<?php } ?>		
		
		<?php if (!empty($url) and !empty($url2)) {?>
			<div class="customer-support-pages">
				<div class="customer-support-page">
					<a href="<?php echo $url; ?>"><img src="../image/customer-support/<?php echo $nextstepimage1; ?>" /></a>
				</div>
				<div class="customer-support-page">
					<a href="<?php echo $url2; ?>"><img src="../image/customer-support/<?php echo $nextstepimage2; ?>" /></a>
				</div>
				<div class="cs-clear"></div>
			</div>
		<?php } ?>
	</div>
	<div class="customer-support-bg2">
	</div>	
	<div class="cs-clear"></div>
</div>