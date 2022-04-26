<style>
#main_sec { margin-top: 182px}
@font-face{font-family:bebasneue;src:url(../fonts/bebasneue.otf)}
@font-face{font-family:karla;src:url(../fonts/Karla-Bold.ttf)}
@font-face{font-family:corbel;src:url(../fonts/corbel.ttf)}
.customer-support-main {
	/*background-image:url(../image/customer-support/main-top.png); */
	padding: 50px;
	background-size: contain;
	background-position: 0 -2%;
	background-repeat: no-repeat;
	position:relative;
	z-index: 1;
	margin-top:-175px;
}
.customer-support-title {
	line-height:80px;
	font-family:bebasneue;
	font-size:80px;
	text-transform:uppercase;
	color:#009245;
	left: 6%;
	position:relative;
}
.customer-support-title2 {
	font-family: karla;
	margin-top: 150px;
	font-weight: bold;
	font-size: 40px;
	color:#1e1e1e;
	letter-spacing: -2px;
}
.customer-support-subtitle{
	margin-top:20px;
	color:#4d4d4d;
	font-size:20px;
	font-family:sans-serif;
	font-weight:bold;
}
.customer-support-bg {
	background-image:url(../image/customer-support/main-top.png); 
	height: 175px;
	z-index: 3;
	background-position-x: -50px;
	background-size: 115% 100%;
	background-repeat: no-repeat;

}
.customer-support-pages {
	margin: 50px auto;
	text-align: center;
	width: 1300px;
}
.customer-support-page:hover {
	cursor:pointer;
}
.customer-support-page {
	float:left;
	width:250px;
	margin-right:10px;
	margin-bottom:10px;
}
.customer-support-page:last-child {
	margin-right:0px;
}
.cs-clear{
	clear:both;
}
@media screen and (max-width:1599px) {
	#main_sec {
		margin-top:160px;
	}
	.customer-support-title{
		left:10%;
	}
}
@media screen and (max-width:1399px) {
	.customer-support-pages {
		width:100%;
	}
}
@media screen and (max-width:1279px) {
	#main_sec {
		margin-top:140px;
	}
	.customer-support-title{
		left:12%;
	}	
	.customer-support-main{
		padding-top:30px;
	}
}
@media screen and (max-width:1024px) {
	.customer-support-title{
		left:initial;
		font-size:40px;
	}
	.customer-support-bg {
		display:none;
	}
	.customer-support-main{
		padding-top:30px;
		margin-top:150px;
	}	
}
@media screen and (max-width:767px) {
	.customer-support-main{
		margin-top:280px;
	}	
	.customer-support-page {
		float:none;
		margin: 10px auto;
	}
}
.cs-fitment-step2 .customer-support-bg {
	background-image:url(../image/customer-support/damage-top-step2.png); 
	height: 145px;
	z-index: 3;
	background-position-x: initial;
	background-size: 100%;
	background-repeat: no-repeat;
	background-position-y: bottom;
}
.cs-fitment-step2 .customer-support-title2 div{
	font-size: 36px;
	line-height:40px;
	font-weight:bold;
	margin-bottom:10px;
}
.cs-fitment-step2 .customer-support-title2{
	color: #444;
	font-size: 30px;
	font-weight: normal;
	margin-top: 20px;
	font-family: corbel;
	letter-spacing: initial;
}
.cs-fitment-step2 .customer-support-main {
	margin-top:-78px;
	padding-top:0px;
}
.cs-fitment-step2 .customer-support-title {
	left:initial;
}
.cs-fitment-step2 .cs-fitment-subimage {
	width: 450px;
	margin: 75px auto;
}
.cs-fitment-step2 .customer-support-subtitle{
	font-family: corbel;
	font-weight:normal;
	font-size: 25px;
	line-height: 25px;
}
.cs-fitment-step2 .customer-support-page {
	width:280px;
}
.cs-fitment-step2 .customer-support-page{
	margin-right:0;
}
.cs-fitment-step2 .customer-support-page:first-child {
	margin-right:140px;
}
.cs-fitment-step2 .customer-support-pages{
	width:700px;
}
.cs-fitment-step2 .customer-support-bg2 {
	background-image:url(../image/customer-support/damage-bg2-g36.png); 
	height: 390px;
	z-index: 3;
	background-position-x: initial;
	background-size: 100%;
	background-repeat: no-repeat;
	background-position-y: bottom;
	margin-top: -460px;
}
.cs-fitment-step2 {
	margin-bottom: 100px;
}
@media screen and (min-width:1600px){
	.cs-fitment-step1 .customer-support-bg2 {
		height: 425px;
	}
}
@media screen and (min-width:1900px){
	.cs-fitment-step1 .customer-support-bg2 {
		height: 450px;
		margin-top: -500px;
	}
}
@media screen and (max-width:1399px) {
	.cs-fitment-step2 .customer-support-bg2 {
		background-position-x: 100px;
	}
}
@media screen and (max-width:1024px) {
	.cs-fitment-step2 .customer-support-bg2 {
		display:none;
	}
	.cs-fitment-step2 .customer-support-main {
		margin-top: 0;
	}
}
@media screen and (max-width:767px) {
	.cs-fitment-step2 .customer-support-main{
		margin-top:280px;
	}	
	.cs-fitment-step2 .customer-support-page {
		float:none;
		margin: 10px auto;
	}
	.cs-fitment-step2 .customer-support-pages {
		width:100%;
	}
}
</style>
<div class="customer-support-wrapper cs-fitment-step2">

	<div class="customer-support-bg">
	</div>
	<div class="customer-support-main">
		<div class="customer-support-title">
		Fitment issue
		</div>
		<div class="customer-support-title2">
		<div>Wrong order</div>
		The system purchased does not apply to the model, version, and year of your car
		</div>
		
		<div class="cs-fitment-subimage">
			<img src="<?php echo SITEURL;?>image/customer-support/fit-is-step2.png" />
		</div>
		
		<div class="customer-support-subtitle">
		Please fill out the form below. We will contact you<br /> as soon as your case is received and determined.
		</div>
		<div class="customer-support-pages">
			<div class="customer-support-page">
				<a href="<?php echo SITEURL;?>fitment-issue-step3-2"><img src="<?php echo SITEURL;?>image/customer-support/damage-step2-g5742.png" /></a>
			</div>
			<div class="customer-support-page">
				<a href="<?php echo SITEURL;?>fitment-issue-step3-3"><img src="<?php echo SITEURL;?>image/customer-support/damage-step2-g5743.png" /></a>
			</div>
			<div class="cs-clear"></div>
		</div>
	</div>
	<div class="customer-support-bg2">
	</div>	
	<div class="cs-clear"></div>
</div>