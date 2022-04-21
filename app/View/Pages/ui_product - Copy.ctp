
<?php if($feature == 'titanium'){ ?>

<?php }?>
  

  



<section class="bg-slide">
             <div class="bg_img_shiny full_ht_bg" id="sl_bg" style="background: url(<?php echo SITEURL;?>v_4/images/silver_tips_bg.jpg) no-repeat center center !important"></div>
             
           <ul class="controls">
             <li bg-img="<?php echo SITEURL;?>v_4/images/silver_tips_bg.jpg" class="ch_bg">
               <img src="<?php echo SITEURL;?>v_4/images/bg_icon_1.png" alt="" />
                <span>Shiny Silver</span>
              </li>
             <li bg-img="<?php echo SITEURL;?>v_4/images/blue_bg.jpg" class="ch_bg">
               <img src="<?php echo SITEURL;?>v_4/images/bg_icon_2.png" alt="" />
               <span>Unique Blue</span>
             </li>
             <li bg-img="<?php echo SITEURL;?>v_4/images/black_tips_bg.jpg" class="ch_bg">
               <img src="<?php echo SITEURL;?>v_4/images/bg_icon_3.png" alt="" />
               <span>Mysterious<br>Black</span>
             </li>
             <li bg-img="<?php echo SITEURL;?>v_4/images/corbon_bg.jpg" class="ch_bg">
               <img src="<?php echo SITEURL;?>v_4/images/bg_icon_4.png" alt="" />
                <span>Lightweight<br/>Carbon</span>
             </li>
             <li bg-img="<?php echo SITEURL;?>v_4/images/gold_tips_bg.jpg" class="ch_bg">
               <img src="<?php echo SITEURL;?>v_4/images/bg_icon_5.png" alt="" />
               <span>Luxurious<br>Gold</span>
             </li>
           </ul> 
         </section> 
  
<!--- iphone-screen bg--->
 <section class="iphone-screen-bg full_ht_bg">

 <div class="abst_head bold_light">
        <h1>Simply Clever</h1>
        <h2 class="light_fnt">Exclusive OBDII dongle module with<br>
     30% reduction in installation time</h2>
</div>

 
 </div>
  </section>  
<!--- iphone-screen bg---> 

<!--- blue-chart-bg--->
<div class="blue-chart-bg">
 <h1 class="abst_head">Ultra-high decibel output meets your desire for sound</h1>
 <img src="<?php echo SITEURL;?>v_4/images/blue_chart_img.jpg" alt=""/>
</div> 
<!--- end-chart-bg--->



<?php if($feature == 'titanium'){ ?>

<?php }
if($feature == 'ss'){ ?>

<!--hose-->
<div class="hose_bx full_ht_bg">
<div class="abst_head">
<h1>Downpipe with flexible hose structure-tech</h1>
<p>Facilitates cooling and extend the life of exhaust pipes and maximize engine performance
</p>
 </div>
</div>
<!--end of hose-->

<!--start coating-->
<div class="coating  full_ht_bg">
<div class="top-lft abst_head clr-wht light_medium vido_1">
<h1>Special ceramic coating<br>
Block high heat and resistant to rust (build-to-order)</h1>
 </div>
</div>
<!--end of coating-->

<?php }?>



<!--coating-->
<!--<div class="coating-bg">
Special Ceremic Coating
Block High Heat And Resistant To Rust
</div>-->
<!--coating-->

 <!--start 3d-scanning-->
<div class="scan-bg full_ht_bg">
    <h1 class="abst_head vert_midl">Reverse engineering 3D scan to<br>
collect all hardware data to accuracy <br>small as 0.029mm</h1>   
</div>
<!--End 3d-scanning-->



<?php if($feature == 'titanium'){ ?>
<!--start car engine sec-->
  <section class="car_engine full_ht_bg text-medium">
     <h1 class="abst_head">Precise craftmanship makes the exhaust<br>
     system a natural match with the underbody</h1> 
 </section>
<!--end car engine sec-->
<?php }if($feature == 'ss'){?>
<!--start car engine sec-->
  <section class="car_engine full_ht_bg text-medium" style="background:url(<?php echo SITEURL;?>v_4/images/craftsmanship.jpg) no-repeat center center; padding:20px 15px;">
     <h1 class="abst_head">Precise craftmanship makes the exhaust<br>
     system a natural match with the underbody</h1> 
 </section>
<!--end car engine sec-->
<?php }?> 



<!--photo gallery-->
  <div class="photo-gallery-wrap">
<div id="gallery" style="display:none;">
<?php if(isset($gallery) && !empty($gallery)){
    foreach( $gallery as $gList){
        $p = 'cdn/'.$gList['Library']['folder']."/".$gList['Library']['file_name'];
        $sImg = new_show_image($p,200,200,100,'cf',null); ?>
        <a href="#">
		<img alt="<?php echo $gList['Library']['alt'];?>"
		     src="<?php echo $sImg;?>"
		     data-image="<?php echo SITEURL.$p;?>"
		     data-description="<?php echo $gList['Library']['title'];?>"
		     style="display:none">
		</a>
    <?php }
}?>
			 
	</div>
    
    <div class="clearfix"></div>
</div>
<!--end of photo gallery-->

<?php if($feature == 'titanium'){?>
<!--hand welding--> 
  <div class="hand_welding weld-text full-img full_ht_bg">
    <!-- <img src="<?php echo SITEURL;?>v_4/images/Titanium-design-english.jpg" alt=""/> -->
    <div class="top-lft abst_head clr-blc light_medium vido_1">
    <h1>Shred Labels,Set New Standard</h1>
    <h2>Behind the glittering product is T.I.G. hand welding without welding slag<h2>
     </div>
  </div>
<!--end of hand welding-->




<!--craftsmanship-->
<div class="cristallization_img full_ht_bg">
<div class="top-lft abst_head clr-blc light_medium vido_1">
<h1>Crystallization of technology and art</h1>
<h2>Glaring mechanical mirror polishing brings top level surface brightness</p>
 </div>
</div>
<!--craftsmanship-->
<!--hose-->
<div class="hose_bx full_ht_bg">
<div class="abst_head">
<h1>Hose structure facilitates cooling</h1>
<p>Extend the life of exhaust system and maximize engine performance
</p>
 </div>
</div>

<!--start coating-->
<div class="coating  full_ht_bg">
 <div class="top-lft abst_head clr-wht light_medium vido_1">
  <h1>Special ceramic coating<br>
  Block high heat and resistant to rust</h1> 
 </div>
</div>
<!--end of coating-->




<!--end personalize nozer--> 
<?php }elseif($feature == 'ss'){?>



<?php /*?>
<section class="car_engine full_ht_bg" style="background:url(<?php echo SITEURL;?>v_4/images/resistent.jpg) no-repeat center center; padding:20px 15px;">
<div class="lft_vert_mdl abst_head clr_blc">
   <h1>Integrally Formed Resilient Bd</h1>
   <p>Reduced weld bead for strengthened pipe wall structre and not easy to crack.</p>
 </div>  
</section>
<?php */?>



 


<?php }?>























<!--personalize nozer-->
<div class="hand_welding full-img">
    <section class="bg-slide noger-embellish steels">
        <div class="bg_img_shiny full_ht_bg" id="sl_bg" style="background: url(<?php echo SITEURL;?>ui/images/Stainless-car-1.png) no-repeat center center"></div>       
       <ul class="controls noger-cont">
         <li bg-img="<?php echo SITEURL;?>ui/images/Stainless-car-1" class="ch_bg">
           <img src="<?php echo SITEURL;?>ui/images/car-color-0.png" alt="" />
           <span>Shiny Silver</span>
         </li>
         <li bg-img="<?php echo SITEURL;?>ui/images/Stainless-car-2" class="ch_bg">
           <img src="<?php echo SITEURL;?>ui/images/car-color-2.png" alt="" />
           <span>Unique Blue</span>
         </li>
       

         <li bg-img="<?php echo SITEURL;?>ui/images/Stainless-car-3" class="ch_bg">
           <img src="<?php echo SITEURL;?>ui/images/car-color-3.png" alt="" />
           <span>Mysterious<br>
Black</span>
         </li>

         <li bg-img="<?php echo SITEURL;?>ui/images/Stainless-car-4" class="ch_bg">
           <img src="<?php echo SITEURL;?>ui/images/car-color-4.png" alt="" />
           <span>Lightweight<br>
Carbon</span>
         </li>

         <li bg-img="<?php echo SITEURL;?>ui/images/Stainless-car-5" class="ch_bg">
           <img src="<?php echo SITEURL;?>ui/images/car-color-5.png" alt="" />
          <span>Luxurious
Gold</span>
         </li>
       </ul> 
     </section>  


</div>
<!--end personalize nozer--> 

