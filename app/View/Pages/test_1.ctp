<?php echo $this->Html->css(array('/bootstrap_3_3_6/css/contact_form'));?>
<style type="text/css">
#preloader{position:fixed;top:0;left:0;right:0;bottom:0;z-index:9999999;background:rgba(255,255,255,0.8)}
#status{width:128px;height:128px;position:absolute;left:50%;top:50%;background-image:url(../img/preload.gif);background-repeat:no-repeat;background-position:center;margin:-7.5px 0 0 -80px}
.white_text p{color:#fff}
.pd_10{padding:20px}
.main_d{background-color:#fff}
#new_tuning table,#new_tuning td,#new_tuning th{border:none!important}
.tuningconfig{font-size:.95em;padding:1px 10px 0;border-bottom-width:0;border-bottom-style:solid;border-bottom-color:#ececec;text-align:left;display:block;background-color:#8d8d8d}
span.main_head{font-size:16px;font-weight:700}
select{width:200px!important}
.lable_txt{float:left;margin:0 10px 10px 0}
span.lable_txt{line-height:40px;font-size:14px;text-transform:capitalize}
.progress.active .progress-bar{-webkit-transition:none!important;transition:none!important}
.tuning-box{margin:auto;max-width:1250px}
.tuning-box-content{background-color:#efefef;overflow:hidden;padding:10px 10px 15px}
table,th,td{border:none!important}
.tuningconfig{margin:0}
.col-md-12.main_d.no-pad{margin:0;padding:0}
th.right{width:250px}
table{margin:10px 60px}
#details_tab{width:95%;margin:5% auto;padding:30px 0}
.center{text-align:center}
.left_text{text-align:left}
th{font-size:15px;font-weight:600}
td{font-size:16px}
.progress{height:30px!important}
.progress-bar{font-size:18px!important;line-height:29px!important}
.tuning-box{margin:auto;max-width:100%}
.heading_main{border-bottom:4px #fff solid;padding:0 0 10px;width:80%;margin:auto}
#show_info{min-height:268px;max-width:1250px;margin:auto}
#show_info th,#show_info td{border-left:1px #fff solid!important;border-right:thin solid!important;border-top:1px #fff solid!important;border-bottom:thin solid!important}
#show_info th:last-child,#show_info td:last-child{border-right:1px #fff solid!important}
.info_box{background-color:#fff;padding-top:30px}
.progress-bar-danger{background-color:#696969!important}
.progress-bar-success{background-color:red!important}
.fullscreen_block_{background:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(img/tuningbg.jpg) no-repeat scroll center center / cover;padding:10px 0 0;background-attachment:fixed!important}
#show_info th,#show_info tr,#show_info td{color:#fff;font-weight:600}
#show_info .heading_main{color:#fff}
.main_d{background-color:transparent}
.info_box{background-color:transparent!important}
#new-ui-add{margin:14% auto}
#new-ui-add .no-pad{padding:0}
#new-ui-add h2{font-size:20px;font-weight:400;color:#fff;text-align:center;padding:0 10px;position:relative;z-index:99;text-shadow:0 0 40px #000;text-transform:uppercase}
#new-ui-add h2:before,#new-ui-add h2:after{}
#new-ui-add .tuningconfig{background:#212728;padding:40px 30px 0;}
#new-ui-add #frmTun{padding:0}
#new-ui-add select{-webkit-appearance:none;-moz-appearance:none;appearance:none;color:#fff;border:2px solid #fff!important;background-color:#212728!important;height:50px;margin:0;width:100%!important;background-image:url(/bootstrap_3_3_6/img/arrow-whte.png);background-position:right center;background-position:96% center;background-repeat:no-repeat;background-size:16px}
#new-ui-add select.active-arw{background-color:green!important;background-image:url(../bootstrap_3_3_6/img/active-bg.png)}
#new-ui-add .lable_txt:hover{background-color:green!important;}
#new-ui-add select option{background:#212728;padding:12px}
#new-ui-add #show_info{min-height:auto!important}
#new-ui-add select,#new-ui-add label{font-weight:700;font-size:14px}
#app_error{padding:0 15px}
#app_error .alert{margin:15px 0}
#new-ui-add #frmTun .td-bx{margin-top:0}
#new-ui-add .progress-bar-danger{background-color:transparent!important}
#new-ui-add .progress{background-color:transparent;border-radius:0;-webkit-box-shadow:none;box-shadow:none;border:0;font-weight:600}
#new-ui-add .progress-bar{color:#20272A!important;font-weight:600;background-color:transparent;-webkit-box-shadow:none;box-shadow:none;-webkit-transition:width .6s ease;transition:width .6s ease}
#new-ui-add .progress-bar-success{background-color:transparent!important;color:red!important;font-weight:600}
#new-ui-add #frmTun .container-fmr.ma-box{margin-bottom:0}
#new-ui-add #frmTun #get_info{background-color:transparent;display:block;margin:0;border-radius:0;border:none;font-size:16px!important;line-height:50px!important;height:50px;color:#fff;padding:0 20px;border-radius:0;-webkit-appearance:none;text-transform:uppercase;font-weight:900;border:2px solid #4AFF0C;width:100%;text-align:center;color:#4AFF0C;float:right}
#new-ui-add #frmTun #get_info img{max-width:20px;margin-top:-5px;width:100%}
#new-ui-add #frmTun span.main_head,#new-ui-add #frmTun label,#frmTun .lable_txt{color:#fff}
#new-ui-add .col-sm-4-nw,#frmTun .col-sm-4.text-left{width:22%; padding:0 20px 0;}
#new-ui-add .col-sm-8-nw {
    width: 78%;
    padding: 0;
}

.nowrap.col-sm-7.box-frm {
    width: 100%;
    padding-left: 0;
    padding-right: 0;
}
#new-ui-add #show_info .info_box{background:#fff!important;padding-bottom:20px}
#new-ui-add #show_info .center.heading_main{color:#20272A;border-color:#20272A;font-weight:600}
#new-ui-add #show_info th,#new-ui-add #show_info td{border-left:2px #20272A solid!important;border-right:thin solid!important;border-top:2px #20272A solid!important;border-bottom:thin solid!important}
#new-ui-add #show_info th,#new-ui-add #show_info tr,#new-ui-add #show_info td{color:#20272A;border-color:#20272A!important;border-width:2px!important}
#new-ui-add #show_info th:first-child{background:#728684;color:#fff}
#new-ui-add #show_info tr:first-child th:last-child{color:green}
#new-ui-add #details_tab{width:95%;margin:30px auto}
.arw-rt::before{width:0;height:0;border-top:5px solid transparent;border-bottom:5px solid transparent;border-left:9px solid #fff;position:absolute;content:"";display:block;top:0;bottom:0;right:-6px;margin:auto}
.col-sm-4-nw .arw-rt::before{right:auto;border-left:9px solid #4AFF0C; left:-5px;}
.fullscreen_block_.video-bg{position:relative;padding-bottom:56.25%;padding-top:0!important;height:0;background:none;margin:120px 0 0!important}
.fullscreen_block_.video-bg iframe{position:absolute;top:0;left:0;width:100%;height:100%}
#main_sec{margin:0}
@media (max-width:1150px) {
#new-ui-add.container{max-width:940px}
#new-ui-add h2{font-size:20px}
#new-ui-add select{padding:0 22px 0 8px}
}
@media (max-width:991px) {
#new-ui-add .col-sm-4-nw,#frmTun .col-sm-4.text-left{width:100%;max-width:330px;margin:30px auto 0;float:none}
#new-ui-add select{width:100%!important}
#new-ui-add .col-sm-8-nw{width:100%;float:none}
#new-ui-add h2{font-size:20px}
#new-ui-add h2::before,#new-ui-add h2::after{background-size:20px auto;width:20px;height:30px;vertical-align:middle}
#main_sec{margin:0}
.col-sm-4-nw .arw-rt::before {    
    display: none;
}
}
@media (max-width:767px) {
#new-ui-add .col-sm-4-nw,#frmTun .col-sm-4.text-left{max-width:100%}
div#app_error{padding-bottom:5px}
#new-ui-add .col-sm-4-nw,#frmTun .col-sm-4.text-left{margin:0 auto}
#new-ui-add h2{font-size:18px;color:#fff;text-transform:uppercase;padding:0 15px;text-align:center;}
#new-ui-add #frmTun #get_info img{max-width:20px;margin-top:-5px;width:100%}
#new-ui-add select{margin:0 0 15px}
#new-ui-add #frmTun #get_info{width:100%;float:none;margin:25px 0 0}
.arw-rt::before{display:none}
.fullscreen_block_.video-bg{background:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(img/tuningbg.jpg) no-repeat scroll center center / cover;padding:15px 0!important;margin:0!important;float:left;width:100%;background-attachment:initial!important;max-height:100%!important;height:auto!important}
.fullscreen_block_.video-bg iframe{display:none}
#new-ui-add h2::before,#new-ui-add h2::after{display:none}
}
@media (max-width:580px) {
#new-ui-add h2{font-size:18px}
}
</style>

<div id="preloader" style="display: none;"> <div id="status">&nbsp;</div> </div>
<div class="fullscreen_block_ video-bg" id="tuning_box_page" style="min-height: 400px;">
<iframe id="home_bg_v" src="https://www.youtube.com/embed/Efjp-UVWhLo?controls=0&showinfo=0&autoplay=1&rel=0&vq=hd720&enablejsapi=1" allowfullscreen="" frameborder="0">
</iframe>
  <div class="tuning-box">
    <div class="clearfix"></div>
   <div class="container" id="new-ui-add"> 
    <h2>Select Brand , Model and Engine / Year and choose the Armytrix Exhaust Systems</h2>
    <div class="col-md-12 main_d no-pad">
      
      <div class="fadein">       
        <div class="tuningconfig">
          <form id="frmTun">
       <div class="container-fmr ma-box">                  
        <div class="col-sm-8 no-pad col-sm-8-nw">          
                  <div  class="nowrap col-sm-4 box-frm arw-rt">
                    <select class="lable_txt arw-rt" id="brand" name="brand">
                    <option value="">Select Brand</option>
                    <?php 
                    if(isset($b) && !empty($b)){ foreach ($b as $k=>$v){ echo '<option value="'.$k.'">'.$v.'</option>'; }} ?></select></div>
                   <div  class="nowrap col-sm-4 box-frm arw-rt">
                    <select class="lable_txt " id="model" name="model">
                      <option value="">Select Model</option>
                    </select></div>
                   <div  class="nowrap col-sm-4 box-frm">
                    <select class="lable_txt" id="motor" name="motor">
                      <option value="">Select Engine</option>
                    </select></div>
  <div class="clearfix"></div>                  
                </div>
                
                
                <div class="col-sm-4  text-left tuningoptions no-pad col-sm-4-nw">    
                
                  <div  class="nowrap box-frm arw-rt"><!--<input name="sub" type="button" value="TUNE IT" class="btn btn-primary ps-ab" id="get_info">--> <button class="btn btn-primary ps-ab" id="get_info" name="sub" type="button" value="TUNE IT"><img src="<?php echo SITEURL;?>bootstrap_3_3_6/img/logo-icon.png" alt=""> TUNE IT</button></div>
</div>

<div class="clearfix"></div>

<!--end of first -box-->

           
                
          </form>
          
<div id="app_error"> </div>
        </div>
        <div id="show_info" style="min-height: 268px;">
          
		  <div class="clearfix pd_10"></div>
        </div>
      </div> 
    </div>
    <div class="clearfix"></div>
   </div>
<!----end of container------>    
  </div>
  <br>
</div>
 
<script>
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('home_bg_v', {
        events: {
            'onReady': onPlayerReady
        }
    });
}

function onPlayerReady() {
    player.playVideo();
    // Mute!
    player.mute();
}

		jQuery(document).ready(function(){
			"use strict";		
window['btnReset'] = function() { $("#get_info").prop("disabled",false); $("#get_info").val('TUNE IT');};

			
			$( "#get_info" ).click(function() {
				$("#app_error").html('');
				$('#show_info').html('');

				
				$("#get_info").prop("disabled",true); $("#get_info").val('Please wait...');			    
				
				var frm =  $("#frmTun").serialize();

				var brand = $.trim($('#brand').val());
				var model = $.trim($('#model').val());
				var motor = $.trim($('#motor').val());

				var chiptuning = "";
				var catlesskit = "";

				if($('#chiptuning').is(':checked')){  chiptuning = $.trim($('#chiptuning').val()); }
				if($('#catlesskit').is(':checked')){  catlesskit = $.trim($('#catlesskit').val()); }
				

				if(brand == ""){ $("#app_error").html('<div class="alert alert-danger">Please select Brand.</div>'); $("#brand").focus(); btnReset();}
				else if(model == ""){ $("#app_error").html('<div class="alert alert-danger">Please select Model.</div>'); $("#model").focus(); btnReset();}
				else if(motor == ""){ $("#app_error").html('<div class="alert alert-danger">Please select Engine.</div>'); $("#motor").focus(); btnReset();}
				else if(chiptuning == "" && catlesskit == ""){ $("#app_error").html('<div class="alert alert-danger">It must be selected at least one tuning option!</div>'); btnReset(); }
				else{
					$('#preloader').show();
					$.ajax({type: 'POST',
						url: '<?php echo SITEURL;?>pages/get_tuning_search',
						data: frm+'&get=info',
						success: function(data) { $("#app_error").html(data); btnReset(); $('#preloader').hide();},
						error: function(comment) { $("#app_error").html(data); btnReset(); $('#preloader').hide(); }}); }
				});

			
			$( "#brand" ).change(function() {
				$("#app_error").html('');

				$('#model').removeClass('active-arw');
				$('#motor').removeClass('active-arw');
				$('#model').html('<option value="">Select Model</option>');
				$('#motor').html('<option value="">Select Engine</option>');
				
				var v = $.trim(this.value); 
				if(v != ""){
				$('#preloader').show();	
				if( !$('#brand').hasClass('active-arw') ){ $('#brand').addClass('active-arw'); }	
				$.ajax({type: 'POST',
					url: '<?php echo SITEURL;?>pages/get_tuning_search',
					data:'id='+v+'&type=brand&get=model',
					success: function(data) { $("#app_error").html(data); $('#preloader').hide(); },
					error: function(comment) { $("#app_error").html(data); $('#preloader').hide(); }}); }
				else{ $('#brand').removeClass('active-arw'); }
				});

			$( "#model" ).change(function() {
				$("#app_error").html('');

				
				$('#motor').removeClass('active-arw');
				$('#motor').html('<option value="">Select Engine</option>');

				
				var v = $.trim(this.value); 
				if(v != ""){
					$('#preloader').show();
				if( !$('#model').hasClass('active-arw') ){ $('#model').addClass('active-arw'); }
				$.ajax({type: 'POST',
					url: '<?php echo SITEURL;?>pages/get_tuning_search',
					data:'id='+v+'&type=model&get=motor',
					success: function(data) { $("#app_error").html(data); $('#preloader').hide();},
					error: function(comment) { $("#app_error").html(data); $('#preloader').hide(); }}); }
				else{ $('#model').removeClass('active-arw'); }
				});


			$( "#motor" ).change(function() {
				$("#app_error").html('');
				var v = $.trim(this.value); 
				if(v != ""){
					if( !$('#motor').hasClass('active-arw') ){ $('#motor').addClass('active-arw'); }
				}
				else{ $('#motor').removeClass('active-arw'); }
				});

	
						
		});
</script> 