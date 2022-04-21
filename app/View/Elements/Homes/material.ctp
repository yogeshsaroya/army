<?php echo $this->html->script(array('jquery.form.min'));?>
<script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('g-recaptcha', {
          'sitekey' : '<?php echo DataSitekey;?>'
        });
      };
    </script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>    

<style>
h1{font-size:32px}
.sub_head{font-size:20px}
@media (max-width:900px) {
#main_sec{margin-top:16%;color:#fff}
}
div#dropbx{max-width:700px;margin:50px auto;line-height:1.4}
.hd-img{text-align:center}
.hd-img img{max-width:250px}
div#dropbx .drp-images{margin:40px auto 60px;text-align:center}
div#dropbx .drp-images img{width:75px}
div#dropbx .drp-images span{display:block;font-weight:600}
div#dropbx .form-am-bx{margin-top:25px}
div#dropbx .form-am-bx .form-group{margin-bottom:25px}
div#dropbx p{font-size:18px;text-align:left}
div#dropbx .form-am-bx input{width:100%;height:60px;padding:5px 15px;color:#000!important}
div#dropbx .form-am-bx .btn-sends{background:transparent;border:0;width:200px;margin-top:28px}
div#dropbx .form-am-bx ::-webkit-input-placeholder{font-size:18px}
div#dropbx .form-am-bx ::-moz-placeholder{font-size:18px}
div#dropbx .form-am-bx :-ms-input-placeholder{font-size:18px}
div#dropbx .form-am-bx :-moz-placeholder{font-size:18px}
div#dropbx .col-sm-8{padding-left:0;text-align:left}
div#dropbx .col-sm-4{padding-right:0;text-align:right}
@media (max-width:767px) {
div#dropbx .drp-images .col-sm-3{float:left;width:25%}
div#dropbx p{font-size:14px;color:#000!important}
div#dropbx .form-am-bx ::-webkit-input-placeholder{font-size:14px;opacity:1}
div#dropbx .form-am-bx ::-moz-placeholder{font-size:14px;opacity:1}
div#dropbx .form-am-bx :-ms-input-placeholder{font-size:14px;opacity:1}
div#dropbx .form-am-bx :-moz-placeholder{font-size:14px;opacity:1}
div#dropbx .drp-images span{color:#000!important}
div#dropbx{margin:80px auto}
}
@media (max-width:580px) {
div#dropbx .drp-images .col-sm-3{width:50%;height:150px;margin-bottom:20px}
div#dropbx .drp-images .col-sm-3:nth-child(3),div#dropbx .drp-images .col-sm-3:nth-child(4){margin-bottom:0}
div#dropbx .form-am-bx ::-webkit-input-placeholder{font-size:12px;opacity:1}
div#dropbx .form-am-bx ::-moz-placeholder{font-size:12px;opacity:1}
div#dropbx .form-am-bx :-ms-input-placeholder{font-size:12px;opacity:1}
div#dropbx .form-am-bx :-moz-placeholder{font-size:12px;opacity:1}
div#dropbx p{font-size:12px;color:#000!important}
div#dropbx .drp-images{margin:40px auto 10px}
}

</style>
<div id="preloader" style="display: none;"> <div id="status">&nbsp;</div> </div>
<div class="col-md-12">
  <div class="mid-box-drp-box" id="dropbx">
     <div class="hd-img"><img src="<?php echo SITEURL;?>v/dropbox-armytrix.png"/></div>
	 <div class="drp-images"> 
	 <div class="col-sm-3"><img src="<?php echo SITEURL;?>v/army-folder_1.png"/><span>Armytrix Installation
photos</span></div>
	 <div class="col-sm-3"><img src="<?php echo SITEURL;?>v/army-folder_2.png"/><span>Armytrix intro animation</span></div>
	 <div class="col-sm-3"><img src="<?php echo SITEURL;?>v/army-folder_3.png"/><span>Armytrix Logo Files</span></div>
	 <div class="col-sm-3"><img src="<?php echo SITEURL;?>v/army-folder_4.png"/><span>Armytrix 
Product Photo</span></div>
	 <div class="clearfix"></div>
	 </div>
	 
	 <p>If you are a shop and would like to promote our brand using our logos, product 
photos and installation photos, feel free to send us your company email in 
below form, we will share all our marketing materials with you, thanks!</p>

<div class="form-am-bx">
<?php echo $this->Form->create(null,array('id'=>'drop_frm'));?> 
<div class="form-group"><?php echo $this->Form->input('url',array('placeholder'=>'Please enter your company website*','id'=>'web','label'=>false));?></div>
<div class="form-group"><?php echo $this->Form->input('email',array('placeholder'=>'Please enter your company email*','id'=>'em','label'=>false));?></div>
<div class="clearfix"></div>
<div class="col-xs-12" style="padding:20px 0;" id="err_app"></div>
<div class="clearfix"></div>   
<div class="col-sm-8"><div id="g-recaptcha"></div><span class="red"></span></div>
<div class="col-sm-4 text-right">
<button type="button" class="btn-sends"><img src="<?php echo SITEURL;?>v/send-btn.png"/ onclick="s()"></button>
</div>	
<div class="clearfix"></div>
<?php echo $this->Form->end();?>

</div>
</div>
</div>
<div class="clearfix"></div>
<script>

function s(){
	$('#err_app').html('');
	var re = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
	var re1 = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	
	
	//preloader
	var w = $('#web').val();
	var e = $('#em').val();
	var r = $('#recaptcha-token').val();

	if( w == '' ){ $('#err_app').html('<div class="alert alert-danger">Please enter company website URL.</div>'); $('#web').focus(); }
	else if( !re.test(w) ) { $('#err_app').html('<div class="alert alert-danger">Please enter correct URL.</div>'); $('#web').focus(); }
	else if( e == '' )  { $('#err_app').html('<div class="alert alert-danger">Please enter company email.</div>'); $('#em').focus(); }
	else if( !re1.test(e) ) { $('#err_app').html('<div class="alert alert-danger">Please enter correct eamil address.</div>'); $('#em').focus(); }
	else{

	       $("#drop_frm").ajaxForm({ 
	    	   target: '#err_app',
	    	   beforeSubmit:function(){ $('#preloader').show(); }, 
	    	   success: function(response)  {  $('#preloader').hide(); },
	    	   error : function(response)  { $('#preloader').hide(); },

	    	   }).submit(); 

	}
	
}

</script>