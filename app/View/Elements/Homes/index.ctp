<style>
  *{box-sizing:border-box}
body{font-family:'Open Sans',sans-serif;color:#fff;font-size:13px}
@font-face{font-family:nimbussanl-bold;src:url(../nimbussanl-bold.ttf)}
@font-face{font-family:big_noodle_titling;src:url(../fonts/big_noodle_titling.ttf)}
.fullscreen_block_.video-bg{position:relative;padding-bottom:56.25%;padding-top:0!important;height:0;background:none;margin:170px 0 0!important}
.fullscreen_block_.video-bg iframe{position:absolute;top:0;left:0;width:100%;height:100%}
#vidtop-content{top:0;color:#fff}
.fullscreen_block_.video-bg h1{font-size:50px;text-transform:uppercase;padding:3% 30px 20px 4%;margin:0;text-align:left;font-family:big_noodle_titling;color:#fff;position:relative}
.fullscreen_block_.video-bg h1 span{color:#0bfc07;font-family:big_noodle_titling;font-size:50px}
.fullscreen_block_.video-bg .cntnet-bx{position:absolute;left:0;right:0;bottom:0;margin:auto;background:rgba(0,0,0,0.6);padding:20px 30px 40px;text-align:center}
.fullscreen_block_.video-bg .cntnet-bx p{max-width:660px;margin:0 auto 20px;text-align:left;color:#fff}
.fullscreen_block_.video-bg h1 span{color:#0bfc07}
.sound-btn{display:inline-block;position:relative;padding:5px 35px;text-transform:uppercase;font-size:14px;font-weight:500;margin-top:40px;z-index:666;color:#fff;cursor:pointer}
.sound-btn span{position:absolute;top:0;bottom:0;margin:auto;height:41px;width:20px}
.sound-btn .left-arw{background:url(<?php echo SITEURL;?>v/rit-snd.png) no-repeat center center;background-size:100% auto;left:0}
.sound-btn .right-arw{background:url(<?php echo SITEURL;?>v/left-snd.png) no-repeat center center;background-size:100% auto;right:0}
.sound-btn .right-arw:before{right:-12px;height:40px;width:40px;border-right:1px solid #fff;top:-3px}
.sound-btn .right-arw:after{right:-24px;height:50px;width:50px;border-right:1px solid #fff;top:-4px}
.butn-box{position:relative;max-width:100%;margin:-60px auto 0;padding:0 145px;box-sizing:border-box}
.butn-box:after{position:relative;clear:both;content:"";display:block}
.butn-box a{position:relative;height:60px;width:320px;text-align:center;color:#02ff02;z-index:99;text-transform:uppercase;display:block;line-height:60px;font-size:15px;font-style:italic;text-decoration:none}
.lft-btn{float:left}
.right-btn{float:right}
.butn-box a::before{height:100%;left:0;top:0;width:100%;z-index:-5;content:"";position:absolute;border:1px solid #fff}
.butn-box a::after{height:39px;left:0;top:0;width:290px;z-index:-5;content:"";position:absolute;border:1px solid #02ff02;left:0;right:0;margin:auto;bottom:0;background:rgba(0,0,0,0.7);text-decoration:none;transition:all 500ms ease-in-out;-webkit-transition:all 500ms ease-in-out}
.butn-box a:hover::after{background:rgba(0,0,0,0.9)}
.butn-box a.lft-btn::before,.butn-box a.lft-btn::after{-ms-transform:skewX(-40deg);-webkit-transform:skewX(-40deg);transform:skewX(-40deg);-moz-transform:skewX(-40deg);-o-transform:skewX(-40deg)}
.butn-box a.right-btn::after,.butn-box a.right-btn::before{-ms-transform:skewX(40deg);-webkit-transform:skewX(40deg);transform:skewX(40deg);-o-transform:skewX(40deg);-moz-transform:skewX(40deg)}
img.lft-img{position:absolute;z-index:555;left:0;bottom:0;width:300px}
img.ri8-img{position:absolute;z-index:555;right:20px;bottom:0;width:300px}
.bg-imgs{height:100%;content:"";background:rgba(0,0,0,0.5) url(<?php echo SITEURL;?>v/bg-arny-2.png) no-repeat left top;top:0;right:0;background-size:100% auto;width:100%;position:absolute;z-index:0}
.video-con{display:block;position:absolute;top:0;left:0;bottom:0;right:0;width:70px;margin:auto;z-index:556;height:70px}
.video-con img{width:100%}
@media (min-width:1500px) {
.fullscreen_block_.video-bg h1,.fullscreen_block_.video-bg h1 span{font-size:58px}
.fullscreen_block_.video-bg .cntnet-bx p{max-width:860px;font-size:16px}
}
@media (min-width:1700px) {
.fullscreen_block_.video-bg h1,.fullscreen_block_.video-bg h1 span{font-size:63px}
}
@media (min-width:1900px) {
.fullscreen_block_.video-bg h1,.fullscreen_block_.video-bg h1 span{font-size:70px}
}
@media (min-width:2100px) {
.fullscreen_block_.video-bg h1,.fullscreen_block_.video-bg h1 span{font-size:78px}
}
@media (min-width:2300px) {
.fullscreen_block_.video-bg h1,.fullscreen_block_.video-bg h1 span{font-size:95px;padding-top:3.5%}
}
@media (min-width:1201px) and (max-width:1320px) {
.logo-in{width:440px!important}
.fullscreen_block_.video-bg h1,.fullscreen_block_.video-bg h1 span{font-size:45px!important}
}
@media (max-width:1200px) {
.butn-box a{width:250px}
.butn-box a::after{height:39px;left:0;top:0;width:224px}
img.lft-img{width:270px}
img.ri8-img{width:250px}
.fullscreen_block_.video-bg .cntnet-bx p{max-width:550px;font-size:12px}
.fullscreen_block_.video-bg h1,.fullscreen_block_.video-bg h1 span{font-size:40px}
.fullscreen_block_.video-bg h1{padding-top:3%;text-shadow:0 0 15px #000}
.fullscreen_block_.video-bg .cntnet-bx{padding-top:10px}
.fullscreen_block_.video-bg{margin:0!important;margin:148px 0 0!important}
}
@media (max-width:1054px) {
img.lft-img{width:240px}
img.ri8-img{width:230px}
.butn-box{margin:-45px auto 0;padding:0 135px}
.butn-box a{height:50px;width:220px;line-height:50px;font-size:13px}
.butn-box a::after{height:35px;left:0;top:0;width:200px}
}
@media (max-width:991px) {
img.lft-img,img.ri8-img{display:none}
.butn-box{margin:-45px auto 0;padding:0}
#main_sec .butn-box a,#main_sec .cntnet-bx p{color:#fff!important}
#main_sec{margin-bottom:50px;margin-top:40px}
.fullscreen_block_.video-bg .cntnet-bx{padding:20px 30px 60px}
.fullscreen_block_.video-bg{min-height:550px!important;min-height:100vh!important}
.fullscreen_block_.video-bg h1{padding-top:60px}
.fullscreen_block_.video-bg .cntnet-bx p{font-size:12px;margin-bottom:0}
.fullscreen_block_.video-bg{margin:0!important}
#main_sec{margin-top:50px;margin-bottom:50px!important}
.bg-imgs{background-image:none}
}
@media (max-width:767px) {
.butn-box{display:none}
.fullscreen_block_.video-bg .cntnet-bx{padding:10px 30px 50px;text-align:right}
.sound-btn{margin-right:2%;margin-top:20px}
.fullscreen_block_.video-bg .cntnet-bx p{max-width:100%}
.fullscreen_block_.video-bg h1{padding-top:7%}
.fullscreen_block_.video-bg h1 span,.fullscreen_block_.video-bg h1{font-size:30px}
.fullscreen_block_.video-bg{background:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(../img/tuningbg.jpg) no-repeat scroll center center / cover;padding:15px 0!important;margin:0!important;width:100%;background-attachment:initial!important;max-height:100%!important;height:auto!important}
#main_sec{margin-bottom:0}
.video-con{width:50px;height:50px}
#tuning_box_page.fullscreen_block_.video-bg{min-height:600px!important;min-height:100vh!important}
#main_sec{margin-top:52px;margin-bottom:20px!important}
}
@media (max-width:480px) {
#main_sec{margin-top:20px;margin-bottom:20px!important}
.fullscreen_block_.video-bg h1 span,.fullscreen_block_.video-bg h1{font-size:20px}
.sound-btn{font-size:12px;padding:5px 25px}
.sound-btn span{width:15px}
.fullscreen_block_.video-bg .cntnet-bx{padding:10px 30px 35px}
}
@media (max-height:550px) {
#tuning_box_page.fullscreen_block_.video-bg{min-height:600px!important}
}

</style>


<div class="fullscreen_block_ video-bg" id="tuning_box_page" style="min-height: 400px;">
<?php /*?><div class="video-con"><img src="<?php echo SITEURL;?>v/ico_play_big.png"/></div> <?php */?>
<iframe id="home_bg_v" src="https://www.youtube.com/embed/HtXm8zuuXIw?controls=0&amp;showinfo=0&amp;autoplay=1&amp;rel=0&amp;vq=hd720&amp;enablejsapi=1" allowfullscreen="" frameborder="0">
</iframe>
  <div class="video-background"> 
  <div class="bg-imgs"></div>     
    <h1><span>sound kit</span> for cars</h1>
  <img src="<?php echo SITEURL;?>v/left-hand_mn.png" class="lft-img"/>
<img src="<?php echo SITEURL;?>v/ri8-hand_mm.png" class="ri8-img"/>  		
<div class="cntnet-bx">
<p>Our innovative Valvetronic technology brings about unprecedented versatility to the car owners. A simple key fob, a press of a button; you decide when and how you want to be heard. We are giving the power back to the driver; one to rule them all. The APP supports both Android and iOS systems, across a multitude of platforms of smartphones, tablets and other mobile devices. From designated device you can precisely gauge the performance of the vehicle at that exact moment. </p>
<div class="sound-btn">
  <span class="left-arw"></span>
  <center id="s_o" onclick="vol();">CLICK FOR SOUND ON</center> 
<span class="right-arw"></span>	
</div>
<div class="butn-box">
  <a href="javascript:void(0);" class="lft-btn">Key fobs</a>  
  <a href="javascript:void(0);" class="right-btn">App</a>
</div>     
  </div> 
</div>
	
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
    player.mute();
}

function vol(){
	var t = $.trim($('#s_o').text());
	
	if(t == "CLICK FOR SOUND ON"){
		$('#s_o').text('CLICK FOR SOUND OFF');
		player.playVideo(); player.unMute(); 
	}else{ 
		$('#s_o').text('CLICK FOR SOUND ON');
		player.playVideo(); player.mute();
		
		}
}
</script>


