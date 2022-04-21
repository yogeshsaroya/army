<link href="<?php echo SITEURL;?>v/owl.carousel.css" rel="stylesheet" type="text/css"/>
<style>
 *{box-sizing:border-box}
body{font-family:'Open Sans',sans-serif;color:#fff;font-size:13px}
@font-face{font-family:nimbussanl-bold;src:url(../nimbussanl-bold.ttf)}
.fullscreen_block_.video-bg{position:relative;padding-bottom:56.25%;padding-top:0!important;height:0;background:none;margin:170px 0 0!important}
.fullscreen_block_.video-bg iframe{position:absolute;top:0;left:0;width:100%;height:100%}
.bottom-sld-bx{position:absolute;bottom:0;left:0;width:100%;height:100%;z-index:99;background:rgba(0,0,0,0.5) url(<?php echo SITEURL;?>v/bg-army.png) no-repeat left top;background-size:100% auto}
.bottom-sld-bx_nw{position:absolute;bottom:0;left:0;width:100%;height:auto;z-index:99;overflow:hidden}
.bottom-sld-bx_nw::after{position:absolute;z-index:-2;width:calc(100% - 922px);height:81%;border-top:2px solid #0F0;content:"";right:0;bottom:0}
.bottom-sldr{position:relative;padding:20px}
.bottom-sldr:before{position:absolute;z-index:-2;width:950px;height:20%;border-top:2px solid #0F0;content:"";top:0;left:-50px;background:rgba(0,0,0,0.7);border-right:3px solid #0F0;transform:skew(45deg);-webkit-transform:skew(45deg);-ms-transform:skew(45deg);-moz-transform:skew(45deg)}
.bottom-sldr:after{position:absolute;z-index:-2;width:calc(100%);height:80%;background:rgba(0,0,0,0.7);right:0;bottom:0;content:""}
.bottom-sldr p{position:relative}
#headns{position:relative;z-index:555;padding-top:50px;text-align:left;text-transform:uppercase}
#headns h1{font-family:"NimbusSanL-Bol";color:#fff;position:relative;z-index:555}
#owl-demo .item{padding:10px 0 0;margin:5px;color:#FFF;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;text-align:center}
#owl-demo .item img{width:100%;border:1px solid #3dbe40}
.bottom-sldr p{text-align:left;max-width:864px;color:#fff;vertical-align:middle}
.bottom-sldr p img{width:10px;vertical-align:top}
.sler-bx{margin:auto;padding:0 30px}
.vdo-cntnt{padding:0 8px;cursor:pointer}
.vdo-cntnt img{width:100%;border:2px solid green}
.owl-pagination{display:none}
.owl-prev{position:absolute;top:46%;left:-25px;z-index:55;font-size:0;height:30px;width:26px;background:url(<?php echo SITEURL;?>v/left-arrow.png) no-repeat left top;filter:contrast(200%)}
.owl-next{position:absolute;right:-25px;font-size:0;top:46%;z-index:55;height:30px;width:26px;background:url(<?php echo SITEURL;?>v/right-arrow.png) no-repeat right top;filter:contrast(200%)}
#headns{position:relative;z-index:555;padding-top:0;text-align:left;text-transform:uppercase;float:left;width:100%;margin-top:0}
.brd-1 h1{color:#fff;text-transform:uppercase;padding:4.6% 0 0 50px;font-size:27px;margin:0;position:static!important;font-style:italic}

/*----sound button----*/
.cntr-btn{width:160px; text-align:center; height:60px; top:-30%; left:0; bottom:0; right:0; margin:auto; position:absolute; z-index:555;
}
.cntr-btn .sound-btn{margin-top:0 !important;} 
.sound-btn {
    display: inline-block;
    position: relative;
    padding: 5px 35px;
    text-transform: uppercase;
    font-size: 14px;
    font-weight: 500;
	margin-top:40px;
	z-index:666;
	color:#fff;
	cursor:pointer;
}

.sound-btn span{position:absolute; top:0; bottom:0; margin:auto; height:41px; width:20px;}
.sound-btn .left-arw{background:url(https://www.armytrix.com/v/rit-snd.png) no-repeat center center; background-size:100% auto; left:0;}
.sound-btn .right-arw{background:url(https://www.armytrix.com/v/left-snd.png) no-repeat center center; background-size:100% auto; right:0;}

/*----end sound button----*/

@media (min-width:1201px) and (max-width:1320px) {
.logo-in{width:440px!important}
}
@media (max-width:1300px) {
.brd-1 h1{font-size:23px}
}
@media (max-width:1200px) {
.logo-in{max-width:321px}
.fullscreen_block_.video-bg{margin:148px 0 0!important}
.brd-1 h1{padding:45px 0 0 50px;font-size:20px}
}
@media (max-width:1054px) {
.bottom-sldr p{max-width:700px;font-size:11px}
.bottom-sldr p img{width:8px}
.bottom-sldr::before{width:800px;top:1px;left:-50px}
.bottom-sld-bx_nw::after{width:calc(100% - 773px);height:80%;bottom:2px}
}
@media (max-width:991px) {
#main_sec .bottom-sldr p{max-width:70%;margin-bottom:33px;color:#fff!important;font-size:11px}
#mobile-heade_army .logo a img{max-width:300px;margin-top:8px}
.fullscreen_block_.video-bg{margin:0!important}
#main_sec{margin-top:52px;margin-bottom:50px!important}
.bottom-sld-bx{background-image:none}
.sler-bx{margin:auto;padding:0 30px;max-width:30%;position:absolute;right:0;bottom:0}
.bottom-sldr::before{width:76%}
.bottom-sld-bx_nw::after{width:28.54%;height:80%;bottom:2px}
.sler-bx{margin:auto;padding:0 15px;width:26%;position:absolute;right:10px;top:22%}
.owl-prev{top:45%;left:-15px}
.owl-next{right:-15px;top:45%}
.brd-1 h1{padding:55px 0 0 50px;font-size:38px}
}
@media (min-width:870px) and (max-width:991px) {
.bottom-sld-bx_nw::after{width:28%!important}
.bottom-sldr::before{width:69%}
#main_sec .bottom-sldr p{max-width:60%}
.bottom-sld-bx_nw::after{width:35%!important}
}
@media (max-width:767px) {
#main_sec{margin-top:52px;margin-bottom:20px!important}
.sler-bx{padding:0 15px;width:100%;max-width:300px;position:static;float:right;margin-bottom:20px}
.bottom-sld-bx_nw::after,.bottom-sldr::before{display:none}
.bottom-sldr:after{height:100%}
#main_sec .bottom-sldr p{max-width:100%;margin-bottom:10px;font-size:10px}
#tuning_box_page.fullscreen_block_.video-bg{min-height:600px!important;min-height:100vh!important}
.cntr-btn{top:-15%;}
}
@media (max-width: 580px) {
.brd-1 h1{padding:45px 0 0 30px;font-size:20px}
.sler-bx{max-width:150px}
}
@media (max-width:480px) {
#main_sec{margin-top:20px;margin-bottom:20px!important}
.sound-btn{font-size:12px;padding:5px 25px}
.sound-btn span{width:15px}
}
@media (max-height:550px) {
#tuning_box_page.fullscreen_block_.video-bg{min-height:600px!important}
}
@media (min-width::1400px) {
.brd-1 h1{padding:4.6% 0 0 50px;font-size:40px}
}
@media (min-width::1800px) {
.brd-1 h1{padding:4.6% 0 0 50px;font-size:50px}
.bottom-sld-bx_nw::after{width:calc(100% - 926px);height:80%}
}
@media (min-width::2200px) {
.brd-1 h1{padding:4.6% 0 0 50px;font-size:60px}
.bottom-sld-bx_nw::after{width:calc(100% - 930px);height:80%}
}



	
</style>

<div class="fullscreen_block_ video-bg" id="tuning_box_page" style="min-height: 400px;">
<iframe id="home_bg_v" src="https://www.youtube.com/embed/qVuAQklw2gY?controls=0&amp;showinfo=0&amp;autoplay=1&amp;rel=0&amp;vq=hd720&amp;enablejsapi=1" allowfullscreen="" frameborder="0">
</iframe>
<div class="cntr-btn">
<div class="sound-btn">                                                  
  <span class="left-arw"></span>
  <center id="s_o" onclick="vol();">CLICK FOR SOUND ON</center> 
<span class="right-arw"></span>	
</div>
</div>
<div id="headns">
<div class="brd-1">
  <h1>PERFORMANCE ENGINEERING</h1>
</div>
<div class="brd-2"></div>
</div>
<div class="bottom-sld-bx"></div>
<div class="bottom-sld-bx_nw">
<div class="bottom-sldr">
  <p>We appreciate the fact that each high-performance vehicles are sophisticated machines built to satisfy our desire to test the boundaries. Consequently, the aftermarket replacements must be able to take the punishment and push them beyond the imaginable.
   By following the creed of achieving the most power, superior sound and true versatility, we build supreme performance valvetronic exhaust systems that are second to none.
  
  
  </p>
    
  <?php $uTube = array('qVuAQklw2gY','onu7V4aPMVc','2-0Wq6I16eo','4g-jJU_LkDo','VkcImapx3OY','3f6Auuq5-DY','2RRMsfiVKAw','C8tilYLaiGw','8OTr6MmesrQ','CpxDyLMYauc','nNK9UsEEUUI','5KmvkLd3pc4');?>  
  <div class="sler-bx">
    <div id="owl-demo" class="owl-carousel">
    <?php if(!empty($uTube)){
    	foreach ($uTube as $k=>$v){ ?>
    	<div class="item" vid="<?php echo $v;?>"><div class="vdo-cntnt"><img src="https://img.youtube.com/vi/<?php echo $v;?>/0.jpg"/></div></div>	
    	<?php } }?>
    </div>
<!---end of slider---->    
  </div> 
 <div class="clearfix"></div>  
 </div>
</div>

</div>
<script src="<?php echo SITEURL;?>v/owl.carousel.js"></script>
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
  $(document).ready(function() { 

	  $( ".item" ).click(function() {
		  var vid = $(this).attr('vid');
		  if( vid != 'undefined' ){
			  var url = 'https://www.youtube.com/embed/'+vid+'?controls=0&amp;showinfo=0&amp;autoplay=1&amp;rel=0&amp;vq=hd720&amp;enablejsapi=1';
			  $('#home_bg_v').attr('src', url);
			  }
		  
		});
	  
  var owl = $("#owl-demo"); 
  owl.owlCarousel({     
      itemsCustom : [
        [0, 1],
        [580, 2],
        [767, 2],
        [768, 1],
        [992, 6],
        [1200, 7],
        [1400, 7],
        [1600, 7]
      ],
      navigation : true 
  });
   
});
</script>

