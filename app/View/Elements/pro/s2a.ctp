 <!--start Diamond-like crisp line design sec-->
 <section id="s2a" class="min-ht ">
   <div class="container fullMxWd posRltv">
     <div class="new_bg_img  img-tag-sec s2a-sec">
       <img src="https://res.cloudinary.com/armytrix/image/upload/v1651225699/product/Product_20page-bg_kg3tdj.webp" alt="" loading="lazy" class="img-wd-100" />
       <div class="abst_head head-title-size color-wht pad-50 left-20 max-700">
         <h2 class="clr-white"><?php echo gs($txt, 35); ?></h2>
         <h4 class="clr-white"><?php echo gs($txt, 36); ?><br>
           <?php echo gs($txt, 37); ?><br>
           <?php echo gs($txt, 38); ?></h4>
         <p class="smll-txt"><?php echo gs($txt, 39); ?></p>
       </div>
     </div>
   </div>
 </section>

 <?php $this->append('styleTop'); ?>
 <style>
   #s2a.min-ht .new_bg_img {
     min-height: auto
   }

   #s2a.min-ht .new_bg_img br {
     display: block
   }

   .abst_head.max-700 {
     max-width: 1000px;
     padding: 0;
     left: 5%
   }

   .abst_head.max-700 h5 {
     font-size: 3.5vw
   }

   h2 {
     margin: 1.7em auto 2.5em;
     line-height: 1.4;
     font-size: 2vw
   }

   p.smll-txt {
     color: #fff;
     font-size: 1.2vw;
   }

   #sound_page p.smll-txt {
     text-align: center;
   }

   @media (max-width: 480px) {
     .abst_head.max-700 {
       left: 4%;
       left: 3%;
       text-align: left
     }

     h2 {
       line-height: 1.4 !important;
       font-size: 2.7vw
     }

     p.smll-txt {
       font-size: 2vw;
       max-width: 200px
     }
   }
 </style>
 <?php $this->end(); ?>