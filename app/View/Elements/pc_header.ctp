<?php if(isset($is_home) && $is_home ==  'yes'){ ?>
<div class="masthead" id="header-top">
<div class="logo-head hm-abst">
<?php echo $this->element('nav');?>
</div>
<style>
video1 { 
    position: absolute;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
			-moz-transform: translateX(-50%) translateY(-50%);
			-ms-transform: translateX(-50%) translateY(-50%);
			-o-transform: translateX(-50%) translateY(-50%);
 background: url('<?php echo SITEURL."cdn/home.jpeg";?>') no-repeat;
  background-size: cover; 
  -webkit-transition: 1s opacity;
  transition: 1s opacity;
}


video22 { 
    position: absolute;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
			-moz-transform: translateX(-50%) translateY(-50%);
			-ms-transform: translateX(-50%) translateY(-50%);
			-o-transform: translateX(-50%) translateY(-50%);
 background: url('<?php echo SITEURL."cdn/home.jpeg";?>') no-repeat;
  background-size: cover; 
  -webkit-transition: 1s opacity;
  transition: 1s opacity;
}


</style>

<a href="<?php echo SITEURL;?>product-exhaust">
<div class="videoWrapper"> 

<iframe id="home_bg_v"  style=" z-index: -99; width: 100%; height: autp" src="https://www.youtube.com/embed/V9t_oN6KHrs?&playlist=V9t_oN6KHrs&controls=0&showinfo=0&autoplay=1&rel=0&loop=1&controls=0&vq=hd1080&enablejsapi=1" allowfullscreen="" frameborder="0"></iframe>

<?php /*?>
<video poster="<?php echo SITEURL."cdn/home.jpeg";?>" id="bgvid" muted plays-inline autoplay loop >
<source src="<?php echo SITEURL."cdn/h_v.mp4";?>" type="video/mp4"></video>
<?php */?>

<div class="mid-social" >
<h3>join the army #armytrix</h3>
    <ul>
       <li><a href="https://www.youtube.com/user/ARMYTRIX" target="_blank"><img src="https://www.armytrix.com/v/armytrix_youtube_small.png"></a></li>
       <li><a href="https://www.facebook.com/ARMYTRIX" target="_blank"><img src="https://www.armytrix.com/v/armytrix_facebook_small.png"></a></li>
       <li><a href="https://www.instagram.com/armytrix_official/" target="_blank"><img src="https://www.armytrix.com/v/armytrix_insta_small.png"></a></li>
</ul>
</div>  

</div>
</a> 

</header>
 <div id="nav-army"> <?php echo $this->element('menu'); ?> </div> 

<?php }else{?>
<div class="pg-header fix-ed" id="header-top">
<?php echo $this->element('nav');?> 
<div id="nav-army"> <?php echo $this->element('menu');?></div>
</div>
<?php }?>

<style>
.trnslate2ar{position:relative;display:block}
.trnslate2ar #google_translate_element{opacity:0;position:absolute;width:100%;height:100%;left:0;top:0;z-index:999}
.trnslate2ar #google_translate_element .goog-te-combo{position:absolute;width:100%;height:100%;left:0;top:0;z-index:999}
.slider-bx{height:100vh;background-size:cover;background-position:top left;background-repeat:no-repeat;position:relative;padding:20px 0 0;font-size:16px;color:#fff;padding-right:1.5%;text-align:right;text-shadow:10px 8px 33px #000;-moz-text-shadow:10px 8px 33px #000;-webkit-text-shadow:10px 8px 33px #000}
.slider-bx:after{content:"";clear:both;position:relative;display:block}
.txt-bx-army{margin-top:15%;float:right;margin-bottom:20px}
.txt-bx-army .col-sm-4{width:150px;padding:0}
.txt-bx-army .col-sm-8{width:390px}
.txt-bx-army .img-vdo{position:relative}
.txt-bx-army .col-sm-4 img{width:100%}
.txt-bx-army .img-vdo .icon-vd{position:absolute;width:40px;height:40px;background:rgba(0,0,0,0.7);border-radius:100%;z-index:66;top:0;bottom:0;right:0;left:0;transition:all 500ms;margin:auto;cursor:pointer}
.txt-bx-army .img-vdo .icon-vd:hover{background:#000}
.img-vdo .icon-vd:before{width:0;height:0;border-top:10px solid transparent;border-bottom:10px solid transparent;border-left:16px solid #fff;position:absolute;top:0;bottom:0;right:0;left:5px;margin:auto;content:""}
.txt-bx-army h3{font-size:30px;color:#fff;font-weight:600;text-transform:uppercase;margin-bottom:20px}
.txt-bx-army h4{font-size:22px;color:#ff0;padding-left:10%;text-align:right;text-transform:uppercase;font-weight:600;margin:0 0 5px}
.txt-bx-army p{font-size:16px;color:#fff!important}
.link-tx{margin:20% 0 0;color:#fff;display:block;font-size:16px;text-transform:uppercase}
.link-tx:after{position:relative;display:inline-block;width:0;height:0;border-top:8px solid transparent;border-bottom:8px solid transparent;border-left:14px solid #fff;margin:0 0 0 5px;content:"";vertical-align:middle;margin-top:-4px}
#home_slider_new .slick-next{right:30px;z-index:555;width:60px;height:100px}
#home_slider_new .slick-prev{left:30px;z-index:555;width:60px;height:100px}
.slick-next::before,.slick-prev::before{line-height:1;opacity:.75;color:green;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;font-family:FontAwesome;content:"\f105"!important;font-size:100pt;line-height:100px}
.slick-prev::before{content:"\f104"!important}

/*--social icons--*/
.mid-social {
    top: 50%;
    position: absolute;
    transform: translate(-50% , -50%);
    -webkit-transform: translate(-50% , -50%);
    left: 50%;
    z-index: 55;
}
.mid-social ul li{float: left; margin: 0 10px;}
.mid-social ul li a{transition: all 500ms ease-in-out; -webkit-transition: all 500ms ease-in-out;}
.mid-social ul li a:hover{filter:contrast(200%); -webkit-filter:contrast(200%);}
.mid-social h3{
  font-size: 45px;
    text-transform: uppercase;
    background: url(https://www.armytrix.com/v/line_head.png) no-repeat center center;
    padding: 0;
    background-size: 100% 100%;
    text-shadow: 0 0 2px #000;
    font-family: "NimbusSanL-Bol";
    color: #fff;
    margin-bottom: 30px;
    height: 90px;
    line-height: 71px;
     padding: 0 15px;
  }

@media (max-width: 1200px){
  .mid-social ul li a img {
   max-height: 60px;
        width: auto !important;
}

.mid-social h3 {
    font-size: 35px;  
    background-size: 100% auto;  
   
}

}

@media (max-width: 980px){
  .mid-social ul li a img {
    max-height: 55px;
    width: auto !important;
}

  .mid-social ul li{margin: 0 5px;}
  .mid-social h3 {
    font-size: 29px;    
    margin-bottom: 15px;
    height: 70px;
    line-height: 57px;
}
}
</style>

<script type="text/javascript">
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
</script>
