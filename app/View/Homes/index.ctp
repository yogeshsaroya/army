<link rel="stylesheet" type="text/css" href="<?php echo SITEURL;?>css/sound_style.css"/>

<section class="img-sec">
<img src="<?php echo SITEURL;?>v/sound_kit1.png" class="img-100"/>
<h1 class="h1head">ARMYTRIX OBDII VALVETRONIC REMOTE CONTROL MODULE</h1>

<h2 class="head-sound-txt"><span class="clr-grn">SOUND KIT</span><br> FOR CARS</h2>
<div class="line-txt"> <h2><small class="up">Interactive</small><br/> <small class="dwn">valve control*</small></h2> 
<small style="color: #fff">* Selected Merecdes Models Only</small>
</div>
<?php /*?>
<img src="<?php echo SITEURL;?>v/sound_kit2.png" class="img-100"/>
<?php */?>



</section>
<!-- end of first sec -->
<div class="fullscreen_block_ video-bg" id="tuning_box_page" style="min-height: 400px;">
<?php /*?><div class="video-con"><img src="<?php echo SITEURL;?>v/ico_play_big.png"/></div> <?php */?>
<div id="player"></div>
  <div class="video-background">
<?php if ( isset($IsMobile) ){}else{?> <div class="bg-imgs"></div><?php }?>
<div class="cntnet-bx">
<div class="sound-btn">
  <center id="s_o">SOUND OFF</center> 
</div>    
</div>
</div>
</div>
<div class="bg-blk"><h3 class="text-head">Our innovative Valvetronic technology brings about unprecedented versatility to car owners.
Armed with our one-and-only INTERACTIVE VALVE CONTROL technology, simply switch
between OEM driving modes, valves automatically Open/Close to match up performance spirit.
Drivers now have more control over their drives than ever before.</h3></div>

  <section class="key-job">
    <img src="<?php echo SITEURL;?>v/sound_1-armytrix-img2.jpg" alt="Key Job" class="img-100"/>
    <div class="keys">
      <h2>Key Fob</h2>
    </div>

    <div class="keys jobs">
      <h2>APP</h2>
    </div>
  </section>

  <div class="fullscreen_block_ video-bg" id="tuning_box_page" style="min-height: 400px;">
<?php /*?><div class="video-con"><img src="<?php echo SITEURL;?>v/ico_play_big.png"/></div> <?php */?>

<?php /*?>
<iframe id="home_bg_v1" src="https://www.youtube.com/embed/HtXm8zuuXIw?controls=0&showinfo=0&autoplay=1&rel=0&vq=hd720&enablejsapi=1&loop=1" allowfullscreen="" frameborder="0">
</iframe>
<?php */?>
<div id="player1"></div>
  <div class="video-background"> 
<?php if ( isset($IsMobile) ){}else{?><div class="bg-imgs"></div><?php }?>     
<div class="cntnet-bx">
<div class="sound-btn">  
  <center id="s_o1">SOUND OFF</center> 
</div>    
</div>
</div>
</div>

<div class="bg-blk"><h3 class="text-head">A simple key fob, a press of a button; you decide when and how you want to be heard. We are giving
the power back to the driver; one to rule them all. The APP supports both Android and iOS systems,
across a multitude of platforms of smartphones, tablets and other mobile devices. From designated
device you can precisely gauge the performance of the vehicle at that exact moment.</h3>
</div>




<script>      
      var tag = document.createElement('script');
      tag.src = "https://www.youtube.com/player_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    
      var player;
      var player1;
      function onYouTubePlayerAPIReady() {
        player = new YT.Player('player', {
            playerVars: { autoplay: 1, loop: 1, controls: 0, rel: 0, modestbranding: 1, 'autoplay': 1, 'autohide':0,'wmode':'opaque',},
            videoId: 'H7DdubppSWo',height: '100%',width: '100%',
            events: {'onReady': onPlayerReady,  'onStateChange': onStateChange}
            });

        player1 = new YT.Player('player1', {playerVars: { 'autoplay': 1, 'controls': 0,'autohide':0,'wmode':'opaque','loop':1 },
            videoId:'HtXm8zuuXIw',height: '100%',width: '100%',events: {'onReady': onPlayerReady1, 'onStateChange': onStateChange1}});
      }
      
      function onStateChange(state) { if (state.data === YT.PlayerState.ENDED) { player.playVideo(); } }
      function onStateChange1(state) { if (state.data === YT.PlayerState.ENDED) { player1.playVideo(); } }
  	
      function onPlayerReady(event) { event.target.mute(); }
      function onPlayerReady1(event) { event.target.mute(); }  
  
      function toggleSound() { if (player.isMuted()) { player.unMute(); $('#s_o').text('SOUND ON'); } else { player.mute(); $('#s_o').text('SOUND OFF'); } }
      function toggleSound1() { if (player1.isMuted()) { player1.unMute(); $('#s_o1').text('SOUND ON'); } else { player1.mute(); $('#s_o1').text('SOUND OFF'); } }
  
    $('#s_o').on('click', function(){ toggleSound(); });
    $('#s_o1').on('click', function(){ toggleSound1(); }); 
  
</script>
