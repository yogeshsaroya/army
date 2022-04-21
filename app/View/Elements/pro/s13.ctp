<?php if(isset($IsMobile)){ 
    $k1 = 'v_4/images/mob/k-1.jpg';
    $k2 = 'v_4/images/mob/k-2.jpg';
    $k3 = 'v_4/images/mob/k-3.jpg';
    $k4 = 'v_4/images/mob/k-4.jpg';
    $k5 = 'v_4/images/mob/k-5.jpg';
}else{ 
    $k1 = 'ui/images/Stainless-car-1.jpg'; 
    $k2 = 'ui/images/Stainless-car-2.jpg';
    $k3 = 'ui/img/Stainless-car-3.jpg';
    $k4 = 'ui/images/Stainless-car-4.jpg';
    $k5 = 'ui/images/Stainless-car-5.jpg';
}?>


<div class="hand_welding full-img" id="s13">
    <section class="bg-slide noger-embellish steels">
        <div class="bg_img_shiny full_ht_bg" id="sl_bg1" style="background: url(<?php echo SITEURL.$k1;?>) no-repeat center center"></div>       
       <ul class="controls noger-cont">
         <li bg-img="<?php echo SITEURL.$k1;?>" class="ch_bg1" id="a1">
           <img src="<?php echo SITEURL;?>ui/images/st-icon/a1.png" bg-img="a1.png" act-img="a2.png" alt="" />
           <span>Shiny Silver</span>
         </li>
         <li bg-img="<?php echo SITEURL.$k2;?>" class="ch_bg1" id="b1">
           <img src="<?php echo SITEURL;?>ui/images/st-icon/b1.png" bg-img="b1.png" act-img="b2.png" alt="" />
           <span>Unique Blue</span>
         </li>
         <li bg-img="<?php echo SITEURL.$k4;?>" class="ch_bg1" id="c1">
           <img src="<?php echo SITEURL;?>ui/images/st-icon/c1.png" bg-img="c1.png" act-img="c2.png" alt="" />
           <span>Mysterious<br>Black</span>
         </li>

         <li bg-img="<?php echo SITEURL.$k3;?>" class="ch_bg1" id="d1">
           <img src="<?php echo SITEURL;?>ui/images/st-icon/d1.png" bg-img="d1.png" act-img="d2.png" alt="" />
           <span>Lightweight<br> Carbon</span></li>

         <li bg-img="<?php echo SITEURL.$k5;?>" class="ch_bg1" id="e1">
           <img src="<?php echo SITEURL;?>ui/images/st-icon/e1.png" bg-img="e1.png" act-img="e2.png" alt="" />
          <span>Luxurious Gold</span>
         </li>
       </ul> 
     </section>  


</div>
<!--end personalize nozer--> 