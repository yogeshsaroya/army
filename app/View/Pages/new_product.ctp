<?php echo $this->Html->css(["/v2/product_page.css?v=" . rand(5646, 65465)], ['block' => 'css']); ?>
<?php
$imgArr = [];
if (isset($slider) && !empty($slider)) {
  foreach ($slider as $sList) { $imgArr[] = '"' . SITEURL . 'cdn/' . $sList['Library']['folder'] . "/" . $sList['Library']['file_name'] . '"'; }
}
if (isset($data) && !empty($data)) {
?>
<?php $this->Html->scriptStart(['block' => 'script','type'=>'application/ld+json']); ?>
{
      "@context": "https://schema.org/",
      "@type": "Product",
      "name": "<?php echo addslashes($data['ItemDetail']['name']); ?>",
      "image": [<?php echo implode(',', $imgArr); ?>],
      "description": "<?php echo addslashes($data['ItemDetail']['meta_description']); ?>",

      "brand": {
        "@type": "Brand",
        "name": "Armytrix"
      },
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "5",
          "bestRating": "5"
        },
        "author": {
          "@type": "Organization",
          "name": "Armytrix - Automotive Weaponized"
        }
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.9",
        "reviewCount": "2875"
      }

    }
<?php $this->Html->scriptEnd(); ?>
<?php } ?>

<div id="v2_product">

<h1 class="text-center mt-3 mb-5">BMW F80 M3 (201-2019) OPF/NON-OPF ARMYTRIX VALVETRONIC EXHAUST SYSTEM</h1>

 <?php  echo $this->element('v2/product_slider',['slider'=>$slider]); ?>
 

 <div class="container">
   <div class="row d-flex">
     <div class="col-sm-6">
     <div class="txtBx">
           <h2>FITMENT</h2>
            <p>BMW G80 M3 ,M3 Competition 2020 + </p>
           <p>BMW G80 M4 ,M4 Competition 2020 +</p>
           <p>OPF / NON OPF version</p>
      </div>

      <div class="txtBx">
           <h2>NOTE</h2>
            <p>Utilize VIN to verify fitment prior to installation
Valvetronic cat-back system utilizes OEM valvetronic system to control </p>
           <p>Fit to both Left-Hand Drive/Right-Hand Drive cars</p>
         </div>
     </div>
     <!-- end of col -->
     <div class="col-sm-6">
     <div class="txtBx">
           <h2>FEATURE</h2>
            <p>Main pipe diameter: 2 x 2.5"</p>
           <p>Tips: 2 x 2.75"</p>
           <p>Exclusive system features a catalytic converter related fault codes clearing mechanism</p>
           <p>No more check engine light</p>
           <p>Plug-n-Play module </p>
           <p>Reduction of Installation Time by 30% compared to traditional cable wires</p>
           <p>App Controlled Valve System via OBDII Port</p>
         </div>
     </div>
     <!-- end of col -->

     <div class="col-sm-6 hide">
     <div class="txtBx">
           <h2>NOTE</h2>
            <p>Utilize VIN to verify fitment prior to installation
Valvetronic cat-back system utilizes OEM valvetronic system to control </p>
           <p>Fit to both Left-Hand Drive/Right-Hand Drive cars</p>
         </div>
     </div>
     <!-- end of col -->

     

     
  </div>  


    <div class="row">
      <div class="col-sm-6">
         

         <div class="selectBox mt-5">
            <h2>CAT-BACK VALVETRONIC EXHAUST</h2>
            <div class="selectBox">
          <select class="fullWidth">
            <option>BMW G80 M3 ,M3 Competition 2020 + </option>
            <option>BMW G80 M3 ,M3 Competition 2020 + </option>
            <option>BMW G80 M3 ,M3 Competition 2020 + </option>
            <option>BMW G80 M3 ,M3 Competition 2020 + </option>
          </select>
        </div>
         </div>
        <!-- end of select box -->

        <div class="productBx">
           <div class='proImg'>
             <img src="https://www.armytrix.com/cdn/800_530_100_ff_cdn/product-nissan-gtr-titanium/2017-nissan-gtr-r35-armytrix-titanium-exhaust-tuning-price-for-sale-08.jpg" alt="images" loading="lazy" />
           </div>

           <ul class="tabBtn d-flex">
              <li><a href="#">NI35T-QT11B</a></li>
              <li><a href="#" class="titanim">TITANIU</a></li>
           </ul>
           <p class="text-left">De-drone Front pipe + Mid pipe 1 + Mid pipe 2 + Valvetronic mufflers + Wireless remote control kits + Quad Chrome Silver tips</p>
 </div>

      </div>
      <!-- end of colom -->

      <div class="col-sm-6">
         <div class="selectBox mt-5">
            <h2>CAT-BACK VALVETRONIC EXHAUST</h2>
            <div class="selectBox">
          <select class="fullWidth">
            <option>BMW G80 M3 ,M3 Competition 2020 + </option>
            <option>BMW G80 M3 ,M3 Competition 2020 + </option>
            <option>BMW G80 M3 ,M3 Competition 2020 + </option>
            <option>BMW G80 M3 ,M3 Competition 2020 + </option>
          </select>
        </div>
         </div>
        <!-- end of select box -->

        <div class="productBx">
           <div class='proImg'>
             <img src="https://www.armytrix.com/cdn/800_530_100_ff_cdn/product-nissan-gtr-titanium/2017-nissan-gtr-r35-armytrix-titanium-exhaust-tuning-price-for-sale-08.jpg" alt="images" loading="lazy" />
           </div>

           <ul class="tabBtn d-flex">
              <li><a href="#">NI35S-DDC</a></li>
              <li><a href="#" class="stanSteel">STAINLESS STEEL</a></li>
           </ul>
           <p class="text-left">High-flow Performance De-catted Down-Pipe with Cat Simulator</p>

        </div>
      </div>
      <!-- end of colom -->
    </div>

    <div class="cartWrap row d-flex mt-3">
       <div class="col-sm-12"><h3 class="usdPrice  text-left">SELECTED <span>USD $6,560.00</span></h3></div>
       <div class="col-sm-6">
          <button class="cartBtn fullWidth">ADD TO CART</button>
       </div>
       <div class="col-sm-6">
       <div class="card-btn">
                    <ul>
                      <li><span>Shipping:</span> <a> 3-5 days deliver to US and Europe. Other countries will take 5-7 days.</a></li>
                      <li><span>Shipment:</span> <a><img loading="lazy" src="<?php echo SITEURL; ?>img/shipment-card.jpg" alt="" /></a></li>
                      <li><span>Delivery: </span><a> Varies</a></li>
                      <li><span>Payments: </span> <a><img loading="lazy" src="<?php echo SITEURL; ?>img/paypal-ac.png" alt="" /></a></li>
                    </ul>
                  </div>
       </div>
    </div>
 </div>


  


  <div class="fullWidthImageWrap pad60">
    <div class="fullWidthImages posRltv container fullMxWd">
      <img src="https://res.cloudinary.com/armytrix/image/upload/v1650865426/product/armytrix-product-exhaust.jpg" loading="lazy" alt="">
    </div>

  </div>

  <div class="videoWrapper container fullMxWd">
    <iframe id="home_bg_v" style=" z-index: -99; width: 100%; height: autp" src="https://www.youtube.com/embed/V9t_oN6KHrs?&amp;playlist=V9t_oN6KHrs&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;rel=0&amp;loop=1&amp;controls=0&amp;vq=hd1080&amp;enablejsapi=1" allowfullscreen="" frameborder="0"></iframe>
  </div>


  <div class="slide_images container fullMxWd">
    <div id="slideshow2"></div>
  </div>
<div></div>

<div class="container fullMxWd posRltv">
  <?php
  
    echo $this->element('pro/s2a');
    echo $this->element('pro/s3');
    echo $this->element('pro/s4');
    echo $this->element('pro/s8');
    echo $this->element('pro/s18');
  
  ?>
  </div>

</div>
