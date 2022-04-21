<?php 
$meta = array('title'=>'Remote Control Kits - Armytrix Exhaust | ECU Tuning | Power Box | OBD-II Scanner',
		'des'=>'Following the creed of providing the most sound, more power and true versatility, ARMYTRIX offer high-end performance valvetronic exhaust systems, ecu tuning and power box that are second to none. We foster a culture of innovation. ARMYTRIX not only creates products, ARMYTRIX creates experiences.',
		'keyword'=>'cat-back, sports exhaust, muffler, silencer, armytrix systems manifold, us, ferrari, lamborghini, maserati, porsche, benz, bmw, volkswagen, mclaren, mini cooper, audi, nissan gt-r r35, sport cat, cat, manifold, sports manifold, test pipes'); 
include 'new_header.php';
include 'product_inc.php';?>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>bootstrap_3_3_6/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>bootstrap_3_3_6/slick-theme.css"/> 
<script type="text/javascript" src="<?php echo BASE_URL;?>bootstrap_3_3_6/slick.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css"/>
<link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick.css"/>
 <script>
 $(document).ready(function(){

$('.slider-bx-arm-5').slick({
  dots: false,
  infinite: true,
  speed: 600,
  fade: false, 
    slidesToShow: 4,
  autoplaySpeed: 3000,
  slide: 'div',
  cssEase: 'linear',
  nextArrow: '<div class="target-control_next target-control"> <img class="right-arw" src="arrow-18.png"/></div>',
  prevArrow: '<div class="target-control_prev target-control"> <img class="lft-arw" src="lft-arw.png"/> </span></div>',
});
});
</script>


<script>
   $(document).ready(function(){

$('.slider-bx-arm-6').slick({
  dots: false,
  infinite: true,
  speed: 600,
  fade: false, 
    slidesToShow: 4,
  autoplaySpeed: 3000,
  slide: 'div',
  cssEase: 'linear',
  nextArrow: '<div class="target-control_next target-control"> <img class="right-arw" src="arrow-18.png"/></div>',
  prevArrow: '<div class="target-control_prev target-control"> <img class="lft-arw" src="lft-arw.png"/> </span></div>',
});
});	
</script>

<script>
   $(document).ready(function(){
$('.slder-arm-full').slick({
   dots: true,
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: 'linear'
});
});	
</script>




<?php 
$sliderArr = array('detail/remote'=>array('1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg'));
$youtubeArr = array('qTgNuldvfb4','0Bzfk6uBIsk','fbfzHlkosZs','ORNvS_xR17I','KNrnQR5yDgM','ynxOrciINNM','tosEIj7BUvE');
$ul = get_btn();
?>
<div class="product_v_list" style="display:none"></div>
 <div id="new-pro-page">
 <div class="top-bg-4">
  <div class="container">
    <h1 class="head-arm-tx">
      precision engineering
premium performance
    </h1>
   </div>
<!---end of wrapper----->    
 </div>
<!---end of banner----->    
<div class="main-body-arm-5">

<ul class="side-nav-bar">
  <li><a href="#">Info</a></li>
  <li><a href="#">videos</a></li>
  <li><a href="#">design detail</a></li>
  <li><a href="#">control setting</a></li>
  <li><a href="#">contact us</a></li>
</ul>
<!--end of side nav ---->

  <div class="container">  
    <div class="top-sec-arm-5">
     <div class="row"> 
      <div class="col-md-7">
        <div class="top-drp-down">
          <ul class="drp-box">
             <li class="dropdown">
               <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Dropdown trigger
               <span class="caret"></span>
               </button>
                <ul class="dropdown-menu" aria-labelledby="dLabel">
                     <li>Audi</li>
                     <li>Bmw</li>
                     <li>ford</li>
                </ul>
             </li>
<!----end of col------>             
             
            <li class="dropdown">
               <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Dropdown trigger
               <span class="caret"></span>
               </button>
                <ul class="dropdown-menu" aria-labelledby="dLabel">
                     <li>991 gt3 (991)</li>
                     <li>991 gt3 Rs(991)</li>
                </ul>
             </li>              
<!----end of col------>             
             
           </ul>
        </div>
<!--end of top dropdown-->  

<div class="line-bx-arm-5">
 <h3 class="mid-txt-arm-5">Porshe <i class="text-uppercase">911 GT RS (991)</i> </h3>
  <div class="line-arm">
   <a>
      <span>Power</span>
      <i><span>+</span>10.0<small>kw</small></i>
   </a>
   <a>
      <span>torque</span>
    <i><span>+</span>27.3<small>Nm</small></i>
   </a>
   <a>
      <span>weight</span>
     <i><span>-</span>14.1<small>kg</small></i>
   </a>
  </div> 
</div>

<div class="item"> 
<div class="clearfix" style="max-width:100%">
                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                <?php if(isset($sliderArr) && !empty($sliderArr)){
                foreach ($sliderArr as $k=>$v){
                	foreach ($v as $a=>$b){
                		$th = show_image($k,$b,$h=84,$w=60,$q=100,$dimensions='fc',$img_tag =null);
                		$main = show_image($k,$b,$h=800,$w=530,$q=100,$dimensions='fc',$img_tag =null);
                		echo '<li data-thumb="'.$th.'"><img src="'.$main.'"/></li>';
                	}}}?>
                    
                </ul>
</div>
</div>
       
      </div>
<!----end of col----> 
 <div class="col-md-5">
   <div class="top-bx-s">
     <div class="col-sm-6 no-pad">
      <div class="select-bx">
            <a>Exhaust Part Number..</a>
            <ul>
               <li> <p>Front pipe + Mid Y pipe +Valvetronic mufflers (L+R) + Wireless remote control kits + Quad Chrome silver tips (4*89m) (Fit to S4 rear diffuser)<span><i>Aub84-cqc</i></span></p></li>
               
                <li> <p>Front pipe + Mid Y pipe +Valvetronic mufflers (L+R) + Wireless remote control kits + Quad Chrome silver tips (4*89m) (Fit to S4 rear diffuser)<span><i>Aub84-cqc</i></span></p></li>
               
               
               <li> <p>Front pipe + Mid Y pipe +Valvetronic mufflers (L+R) + Wireless remote control kits + Quad Chrome silver tips (4*89m) (Fit to S4 rear diffuser)<span><i>Aub84-cqc</i></span></p></li>
               
            </ul>
           </div>
  </div>
  
  <div class="col-sm-6 no-pad"> 
     <ul class="img-set">
<!----end of seledt-b---->        
       <li>
        <span>DP</span>
         <img src="product-detail/army-icon-dp.png" alt="">
       </li> 
       
       <li>       
         <span>CatBack</span>
         <img src="product-detail/army-icon-catback.png" alt="">    
       </li> 
       
       <li>
         <span>ECU Tuning</span>
         <img src="product-detail/army-icon-ecu-tunning.png" alt="">    
       </li> 
       
       <li>
         <span>tuning-box</span>
         <img src="product-detail/army-icon--tunning-box.png" alt="">    
       </li> 
      
     </ul>
   </div>
 </div>  
<!---end of top-bx-------> 

<div class="scrl-bx">
   <p> Technology-wise, keep up with the rapidly evolving world or risk being on the list of the extinct. Arm yourself with our revolutionary road tech for a smarter driving experience. The valvetronic system introduces a new dimension of versatility; never compromise between sound and stealth. The Armytrix exclusive OBDII dongle system reduces the installation time by 50%! With clear displays and user-friendly controls, navigate through our smartphone app to attain an insightful look into the vehicle’s real-time operational status and complete control over the valve settings. Stay Connected, Stay Ahead of the Pack.
Performance-wise, deviate from the routine path; 
</p>
 <p> Quality-wise, Armytrix wouldn’t be what we are today, if not for the persistency on offering premier quality exhausts to the users. Started from the initial designing process, attention to detail was essential in laying the foundation for creating exhausts with perfect fitment. </p>
</div> 
   
 </div>
<!----end of col---->
</div>

<!----end of row-->
          
    </div>
    
    <div class="break-line slider-sec">
     <div class="row">
      <div class="col-sm-12">
       <h4 class="slider-tx">Remote control & app features</h4> 
       <div class="slider-bx-arm-5">
       		<div class="set-sld-arm"> 
              <div class="row-sld">
              <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> </div>
            </div>
            
            <div class="set-sld-arm"> 
              <div class="row-sld">
              <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> </div>
            </div>
            
            <div class="set-sld-arm"> 
              <div class="row-sld">
             <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> </div>
            </div>
            
            <div class="set-sld-arm"> 
              <div class="row-sld">
              <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> </div>
            </div>
            
            <div class="set-sld-arm"> 
              <div class="row-sld">
             <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> </div>
            </div>
            
            <div class="set-sld-arm"> 
              <div class="row-sld">
              <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> </div>
            </div>
            
            <div class="set-sld-arm"> 
              <div class="row-sld">
              <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> </div>
            </div>
            
            
            
            
        </div>      
      
       
 
 <!---end of slider---->      
      </div>
<div class="clearfix">  </div>     
     </div>      
    </div>
  <!----end of slider sec------>   
  
  
  
   <div class="break-line slider-sec no-line">
     <div class="row">
      <div class="col-sm-12">
       <h4 class="slider-tx">exhaust sounds</h4> 
       <div class="slider-bx-arm-6">  
       		<div class="set-sld-arm"> 
              <div class="row-sld">
              <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> </div>
            </div>
           
           <div class="set-sld-arm"> 
              <div class="row-sld">
              <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> </div>
            </div>
            
            
            <div class="set-sld-arm"> 
              <div class="row-sld">
              <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> </div>
            </div>
            
            
            <div class="set-sld-arm"> 
              <div class="row-sld">
              <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> </div>
            </div>
            
            <div class="set-sld-arm"> 
              <div class="row-sld">
              <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> </div>
            </div>
            
              <div class="set-sld-arm"> 
              <div class="row-sld">
              <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> <span><a href="#"><img src="https://i.ytimg.com/vi/0Bzfk6uBIsk/0.jpg"> <i ></i></a></span> </div>
            </div>
           
           
       </div> 
 <!---end of slider---->      
      </div>
      
        
<div class="clearfix">  </div>     
     </div>      
    </div>
  <!----end of slider sec------>  
  
 
  
 </div>   
<!----end of top section------>  

 <div class="mid-slider-5">
  
 <!---start slider----->      
 <div class="slder-arm-full">
  <div class="text-img">
      <div class="col-sm-7">
        <div class="txt-arm">
          <h3>Design details</h3>
          <p>
            The CG Series is characterized by the closed geomety
and elegantly-confined patterns within
each spoke design.
          </p>
        </div>
       </div>
       
       <div class="col-sm-5">
        <div class="bg-sld-img">
         <img src="product-detail/set-img.png" alt="">
        </div> 
       </div>
  </div>
  
  <div class="text-img">
      <div class="col-sm-7">
        <div class="txt-arm">
          <h3>Design details</h3>
          <p>
            The CG Series is characterized by the closed geomety
and elegantly-confined patterns within
each spoke design.
          </p>
        </div>
       </div>
       
       <div class="col-sm-5">
        <div class="bg-sld-img">
         <img src="product-detail/set-img.png" alt="">
        </div> 
       </div>
  </div>
  
  <div class="text-img">
      <div class="col-sm-7">
        <div class="txt-arm">
          <h3>Design details</h3>
          <p>
            The CG Series is characterized by the closed geomety
and elegantly-confined patterns within
each spoke design.
          </p>
        </div>
       </div>
       
       <div class="col-sm-5">
        <div class="bg-sld-img">
         <img src="product-detail/set-img.png" alt="">
        </div> 
       </div>
  </div>
  
  <div class="text-img">
      <div class="col-sm-7">
        <div class="txt-arm">
          <h3>Design details</h3>
          <p>
            The CG Series is characterized by the closed geomety
and elegantly-confined patterns within
each spoke design.
          </p>
        </div>
       </div>
       
       <div class="col-sm-5">
        <div class="bg-sld-img">
         <img src="product-detail/set-img.png" alt="">
        </div> 
       </div>
  </div>
 
</div>

<!---end slider----->
         
   </div>

  
  <div class="container">
   <div class="row">
    <div class="col-sm-12">
<div class="img-bx-arm">
	<h2>CONTROL Settings</h2>
   <img class="hand-img" src="product-detail/09086R1A3017.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
</div>  

<div class="img-bx-arm">
	<h2>CONTROL Settings</h2>
  <img src="product-detail/app1.jpg" alt="app1.jpg, 214kB" title="App1" >
</div>  

<div class="img-bx-arm">
   <h2>CONTROL Settings</h2>
   <img src="product-detail/app2.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
</div>  

<div class="img-bx-arm">
   <h2>CONTROL Settings</h2>
   <img src="product-detail/app3.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
</div>  

<div class="img-bx-arm">
   <h2>CONTROL Settings</h2>
   <img src="product-detail/1-3-01.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
</div>  
 </div>
</div>
<!--end of row-->


<div class="image-glr-bx">
   <div class="row">
     <ul class="glr-up featured_items">
       
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          
          <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          </li>
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          </li>
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          </li>
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          </li>
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          </li>
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          </li>
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          </li>
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          </li>
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          </li>
          
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          </li>
          
           <li class="img_block">
                <div class="box-pop">
                  <a href="#">
              <img src="product-detail/test-123.jpg" alt="09086R1A3017.jpg, 159kB" title="09086R1A3017">
              <div class="featured_item_fadder"></div>
              <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
              </a>
           </div>  
          </li>
    <!-----end of col---->   
         
     </ul>
   </div>
</div>

</div>


<!----end of container----->

<div class="contact-bx-arm">
  <div class="container">
    <div class="row">
     <div class="col-sm-12">  
       <h1 class="head-arm-tx">
      Contact Us
    </h1>
</div>
 <div class="clearfix"></div>
 
 <div class="col-sm-10 col-sm-offset-1 no-pad">
   <div class="col-md-4">
     <div class="text-cnt-bx">
        <h5>contact info</h5> 
        <p class="text-uppercase">for united states orders</p>
        <p>Tel: <a href="tel: 6062697579">606-269-7579</a></p>
     </div>
     
     <div class="text-cnt-bx">
        <h5>Departments</h5> 
        <p>General Inquiries <a href="mailto:info@armytrix.com">info@armytrix.com</p>
        <p>Tech Support <a href="mailto:support@armytrix.com">support@armytrix.com</a></p>
         <p>shipping <a href="mailto:shipping@armytrix.com">shipping@armytrix.com</a></p>
     </div>
   </div>
<!---end of box---->  

 <div class="col-md-8 ">
    <div class="input-bx">
       <div class="col-sm-4">
         <div class="col-xs-6 pad-right">
            <div class="box-inpt">
              <input class="style-inpt" placeholder="First name *"/>
            </div>
          </div>  
          
        <div class="col-xs-6 pad-left">
            <div class="box-inpt">
              <input class="style-inpt" placeholder="Last name *"/>
            </div>
          </div>    
     <div class="clearfix"></div>   
    
       </div>
       
  <!----end of form-->
  
  <div class="col-sm-4">         
            <div class="box-inpt">
              <input class="style-inpt" placeholder="Email *"/>          
          </div>  
   </div> 
          
   
    <div class="col-sm-4">         
            <div class="box-inpt">
              <input class="style-inpt"  placeholder="Confirm mail *"/>          
          </div> 
         
   </div>            
    <div class="clearfix"></div>     
       
       
    </div>
    
    
    <div class="input-bx">
       <div class="col-sm-4">         
            <div class="box-inpt">
              <input class="style-inpt" placeholder="Phone *"/>
            </div>
          </div> 
       
  <!----end of form-->
  
  <div class="col-sm-4">         
            <div class="box-inpt">
              <input class="style-inpt" placeholder="City *"/>          
          </div>  
   </div> 
          
   
    <div class="col-sm-4">         
            <div class="box-inpt">
              <input class="style-inpt"  placeholder="State *"/>          
          </div> 
         
   </div>            
    <div class="clearfix"></div>     
     </div>  
       
    
    
    
    <div class="input-bx">
       <div class="col-sm-4">         
            <div class="box-inpt">
             <select  class="style-inpt">
                <option>Select country</option>
                <option>select country</option>
              </select>  
            </div>
          </div> 
   
       <div class="col-sm-4">         
            <div class="box-inpt">
              <input class="style-inpt" placeholder="Zip code"/>          
          </div>  
   </div> 
          
   
    
    <div class="clearfix"></div>    
       
  <!----end of form-->
     </div>
  
  <div class="input-bx">
       <div class="col-sm-4">         
            <div class="box-inpt">
              <select  class="style-inpt">
                <option>Select subject *</option>
                <option>a</option>
              </select>  
            </div>
          </div> 
       
  <!----end of form-->
  
  <div class="col-sm-4">         
            <div class="box-inpt">
              <input class="style-inpt" placeholder="How did you hear about us? *"/>    
          </div>  
   </div> 
          
   
    <div class="col-sm-4">         
            <div class="box-inpt">
              <input class="style-inpt"  placeholder="For (Vehicle Year / Make / Model) *">          
          </div> 
         
   </div>            
    <div class="clearfix"></div>     
     </div>
    
       
  <!----end of form-->
 <div class="col-sm-12"> 
   <div class="input-bx text-right">
     <button>Send message</button>
   </div>
 </div> 
 
    
    
 </div>
 
 
 </div>
    
  </div> 
</div>
  
  
  </div>




</div>
<?php include 'new_footer.php';?>

<style>

#new-pro-page {color:#000;}


#new-pro-page .container{width:100% !important; min-width:100% !important; box-sizing:border-box; padding:0 40px;}

#new-pro-page  .top-bg-4 {
    padding: 60px 0;
    text-align: left;
    position: relative;
    overflow: hidden;
	background:url(../product-detail/bg-green.png) no-repeat left top;
	background-size: 100% 100%;
}

#new-pro-page .row{max-width:100% !important; margin:0 !important;}

#new-pro-page .head-arm-tx{
	font-size: 80px;
text-align: left;
line-height: 80px;
text-transform: uppercase;
font-weight: 600;
}

#new-pro-page .top-drp-down {
        margin-top: -50px;
    margin-bottom: 30px;
}
.drp-box {
    text-align: left;
}
.img-bx-arm h2 {
    text-align: left;
    margin-left: 16px;
    font-size: 34px;
    margin-top: 16px;
    color: #169C5B;
}




#new-pro-page .top-drp-down .drp-box:after{content:""; clear:both;}

#new-pro-page .top-drp-down .drp-box .dropdown{display:inline-block; letter-spacing:0.5px;}
#new-pro-page .top-drp-down .drp-box .dropdown button{padding: 2px 30px;
background: #000;
border-radius: 8px;
border: 0;
color: #fff;
text-transform: uppercase;}
.break-line {padding-bottom:30px; margin-bottom:20px; border-bottom:1px solid #000;} 

#new-pro-page .top-drp-down .drp-box .dropdown:first-child button{
	padding: 2px 12px 2px 30px;
border-top-right-radius: 0;
border-bottom-right-radius: 0;
}

#new-pro-page .top-drp-down .drp-box .dropdown:last-child button{
	padding: 2px 30px  2px 12px ;
border-top-left-radius: 0;
border-bottom-left-radius: 0;
position:relative;
} 

#new-pro-page .top-drp-down .drp-box .dropdown button .caret{
position: absolute;
right: 10px;
top: 0;
bottom: 0;
margin: auto;
}

#new-pro-page .top-drp-down .drp-box .dropdown  ul{
	width: 130%;
box-shadow: none !important;
padding: 5px 10px;
background: #343434;
min-height: 250px;
color: #fff;
text-transform: uppercase;
}

/*--line box---*/
#new-pro-page .line-bx-arm-5 div.line-arm {
    border: 2px solid #000;
    padding: 20px 10px;
	text-align:center;
}



#new-pro-page .line-bx-arm-5 div.line-arm:after{content:""; clear:both;}

#new-pro-page .line-bx-arm-5 .line-arm a{
    letter-spacing: 0;	
	text-align:center;
	padding:0 5%;
	box-sizing:border-box;
	color:#000;
	display:inline-block;
	font-weight:600;
	
}
	
#new-pro-page .line-bx-arm-5 .line-arm a span{text-transform: uppercase;
display: block;
font-size: 15px; }

#new-pro-page .line-bx-arm-5 .line-arm a i{
	font-style: normal;
font-size: 45px;
display: block;
line-height: 45px;
}	

#new-pro-page .line-bx-arm-5 .line-arm a i small {
	font-size: 25px;
display: inline;
}

#new-pro-page .line-bx-arm-5 .line-arm a i span{
display: inline;
font-size: 18px;
font-weight: normal;
vertical-align: middle;
}
#new-pro-page .mid-txt-arm-5 {
    font-size: 45px;
    text-transform: inherit;
    text-align: left;
	font-weight:600;
	margin: 0 0 30px;
	color:#000;
}
#new-pro-page .mid-txt-arm-5 i{ text-transform:uppercase; font-style:normal;}

/*--line box---*/


/*--left-box---*/
  
 #new-pro-page  .top-bx-s {
    margin: 0 0 30px;
}

 #new-pro-page  .top-bx-s:after{display:block; content:""; clear:both;}
 .no-pad{padding:0;}
 
  #new-pro-page  .top-bx-s .col-sm-6.no-pad:first-child {
    width: 45%;
	padding-right: 10px;
}

#new-pro-page  .top-bx-s .col-sm-6.no-pad:last-child {width:55%;}

.select-bx {
padding: 3px 5px;
color: #000;
transition: all 500ms;
border: 1px solid #000;
position: relative;
}


.select-bx:after {
 position:absolute;
   width: 0; 
  height: 0; 
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;  
  border-top: 5px solid #000;
right: 0;
bottom: 2px;
z-index: 33;
content: "";
transform: rotate(-45deg);
-webit-transform: rotate(-45deg);
-ms-transform: rotate(-45deg);
-moz-transform: rotate(-45deg);
-o-transform: rotate(-45deg);
}

#new-pro-page a{color:#000;}

 #new-pro-page .select-bx ul{
	position: absolute;
top: 120%;
width: 100%;
padding: 10px 0;
margin: 0 -5px;
opacity:0;z-index:-55;
transition:all 500ms ease-in;
-webkit-transition:all 500ms ease-in;
display:none;
}

 #new-pro-page .select-bx:hover ul{
	 top:101%;
	 opacity:1;
	 z-index:99;
	 display:block;
	 
}


 #new-pro-page .select-bx ul li{background:#989898; padding: 5px 10px;line-height: 17px; text-align:left;} 
 #new-pro-page .select-bx ul li p{padding: 0 0 3px;
border-bottom: 1px dashed #000; margin: 0; color:#000;}
 
  #new-pro-page .select-bx ul li p span{display:block; text-align:right;}
    #new-pro-page .select-bx ul li p span i{font-style: normal;
display: inline-block;
font-size: 12px;
text-transform: uppercase;
color: #fff;
padding: 1px 5px;
background: #4E4E4E;
margin: 0 0;}


 #new-pro-page .img-set{padding:0;}
 
 #new-pro-page .img-set li{padding: 0 5px 5px 0;
float: left;}
 
 #new-pro-page .img-set li img{height:40px; border:1px solid #000; padding:8px; max-width:100%; border-radius: 8px; width:auto !important;}
 
 /*----scroll box----*/
 
 #new-pro-page .scrl-bx {
    height: 400px;
    overflow-y: scroll;
    text-align: left;
}



/*-----video slider----*/

 .slider-sec {
    padding: 0 40px;
	text-align:left
}

.row-sld span {
    padding: 10px;
	    display: block;
}

.lft-arw {
    position: absolute;
    left: 0;
    top: 0;
    width: 50px;
    z-index: 99;
    bottom: 0;
    left: -50px;
    margin: auto;
	cursor:pointer;
}

.right-arw {
    position: absolute;
    right: 0;
    top: 0;
    width: 50px;
    z-index: 99;
    bottom: 0;
    right: -50px;
    margin: auto;
	cursor:pointer;
}

.slider-tx {
    text-align: left;
    margin: 15px 25px;
    font-size: 25px;
    font-weight: 400;
	position:relative;
	display:inline-block;
	padding:2px 0 ;
}

.slider-tx:before , .slider-tx:after {position:absolute; content:""; top:0; bottom:0; margin:auto; width:8px; height:100%; background:#000; display:block;}
.slider-tx:after{right:-15px;}
.slider-tx:before{left:-15px;}
.row-sld span{position:relative;}
.row-sld i{
     background: rgba(0,0,0,0.5);
    border-radius: 10px / 12px;
    width: 65px;
    height: 45px;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
	transition:all 300ms linear;
	-webkit-transition:all 300ms linear;
}

.set-sld-arm .row-sld span:hover i{background: #de473c;}


.row-sld i:before {
  content: "";
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-left: 18px solid #f3f1e7;
    width: 0;
    height: 0;
    position: absolute;
    top: 0;
    left: 5px;
    margin: 0;
    bottom: 0;
    right: 0;
    margin: auto;
}


#new-pro-page .no-line{margin-bottom:0; border:0;}

/*----mid slider----*/

#new-pro-page  .mid-slider-5{padding: 40px 60px; background:#000;}

#new-pro-page  .mid-slider-5 .col-sm-7 {
    width: 52%;
}

#new-pro-page  .mid-slider-5  .col-sm-5 {
	width: 48%;
}
.txt-arm {
    max-width: 350px;
    color: #fff;
	 margin: 15% 5% 0;
}

.txt-arm h3{
	font-size: 45px;
    margin: 0 0 50px;
    color: #fff;
    text-align: left;
    padding: 0;
}
.txt-arm p{font-size: 15px;
    color: #fff;
    text-align: left;}

.bg-sld-img{position:relative; overflow:hidden;}

.bg-sld-img:before{    width: 100px;
   height: 250%;
    content: "";
    display: block;
    background: #000;
    z-index: 5;
    transform: rotate(10deg);
    -webkit-transform: rotate(10deg);
    -ms-transform: rotate(10deg);
    -moz-transform:rotate(10deg);
    -o-transform: rotate(10deg);
    left: -15%;
    top: -15%;
    position: absolute;}
	
	.text-img:after{content:""; display:block; clear:both;}
	
#new-pro-page  .mid-slider-5 .slick-dotted.slick-slider {
    margin-bottom: 0;
}	
	

#new-pro-page  .mid-slider-5	.slick-dots li {
  position: relative;
display: inline-block;
width: 12px;
height: 12px;
margin: 0 5px;
padding: 0;
cursor: pointer;
background: #B2B2B2;
border: 2px solid #B2B2B2;
transform: rotate(45deg);
margin: 0 12px;
border-radius: 0;
}

#new-pro-page  .mid-slider-5	.slick-dots li button{display:none;}


#new-pro-page  .mid-slider-5	.slick-dots li.slick-active{background:transparent;}

#new-pro-page  .mid-slider-5 .slick-dots{
	display: block;
max-width: 300px;
color: #fff;
margin: 10% 5% 0;
left: 0;
bottom: 25px;
top: auto;
z-index:9;
} 

#new-pro-page  .mid-slider-5  .slick-prev, #new-pro-page  .mid-slider-5 .slick-next{
	display: block;
bottom: 15px;
position: absolute;
top: auto;
-webkit-transform: translate(0, -0%);
-ms-transform: translate(0, -0%);
-webkit-transform: translate(0, -0%);
-moz-transform: translate(0, -0%);
-o-transform: translate(0, -0%);
z-index: 99;
font-size: 25px;
height: 35px;
width: 20px;
line-height: 35px;
}

#new-pro-page  .mid-slider-5  .slick-prev{left:8%;}

#new-pro-page  .mid-slider-5 .slick-next{right:auto; left: 300px;}

#new-pro-page  .mid-slider-5 .slick-next:before ,  #new-pro-page  .mid-slider-5  .slick-prev:before{
	font-family: FontAwesome;  
   font-size: 35px;
   
}

#new-pro-page  .mid-slider-5 .slick-next:before{
   
    content: "\f105" !important;
   
}

#new-pro-page .mid-slider-5 .slick-prev:before {
	content: "\f104" !important;
}

 
 /*---imgages---*/
 
#new-pro-page  .img-bx-arm {
    margin: 20px 0;
    border: 1px dotted #000;
	width:100%;
	padding:20px;
}

#new-pro-page  .img-bx-arm img{width:100%;} 



/*---YOUTUBE IMAGE---*/
#new-pro-page  .image-glr-bx {
    margin: 30PX 0;
}

.glr-up {
	 display: -webkit-box;      /* OLD - iOS 6-, Safari 3.1-6 */
  display: -moz-box;         /* OLD - Firefox 19- (buggy but mostly works) */
  display: -ms-flexbox;      /* TWEENER - IE 10 */
  display: -webkit-flex; 
    display: flex;
    flex-wrap: wrap;
    padding: 0 8px;
}

.img-bx-arm img {
    max-width: 60%;
    margin:0;
	display: block;
}

#new-pro-page .glr-up li{
	display:inline-block;
	margin:0;
	box-sizing:border-box;
	padding:8px;
	cursor:pointer;
	width: 16.6666%;
	
}

#new-pro-page .img_block{margin:0;}

#new-pro-page .box-pop {
	padding:8px;
	border:1px solid #000;
	width: 100%;
}

/*--contact---*/
#new-pro-page .contact-bx-arm {
    background: #000;
    padding: 40px 0;
}
 
#new-pro-page .contact-bx-arm h1{
	color: #fff;
font-size: 65px;
margin-bottom: 50px;
}

#new-pro-page .text-cnt-bx{text-align:left; margin:0 0 30px;}

#new-pro-page .text-cnt-bx h5{font-size: 25px;
color: #fff;
margin: 0 0 20px;
padding: 0;}

#new-pro-page .text-cnt-bx p , #new-pro-page .text-cnt-bx  a{
	
	color:#fff;	
	
}

#new-pro-page .style-inpt {
    width: 100%;
    background: transparent;
    border: 1px solid #fff;
    margin: 0 0 15px;
    color: #fff;
    padding: 8px 5px;
	height:35px;
}

#new-pro-page .pad-left {
    padding-left: 8px;
    padding-right: 0;
}

#new-pro-page .contact-bx-arm .col-md-8{padding:0;}

.pad-right {
    padding-left: 0;
    padding-right: 8px;
}

#new-pro-page .contact-bx-arm  select  {-webkit-appearance: none;
   -moz-appearance:    none;
   appearance:         none;
   color:rgba(255,255,255,0.6);
   font-weight:normal;
}

#new-pro-page .input-bx button{
	margin-top: 10px;
background: transparent;
border: 2px solid #26ED1E;
color: #26ED1E;
text-transform: uppercase;
padding: 15px 95px;
box-shadow: 0 0 3px #26ED1E;
font-size: 20px;
font-weight: normal;
}


p.text-uppercase {
    text-transform: uppercase;
}

#new-pro-page .contact-bx-arm p { margin: 0 0 5px;}


/*-----side nav-----*/

#new-pro-page  .side-nav-bar{position:fixed; right:0; top:50%; z-index:666; list-style:none;}
#new-pro-page   .side-nav-bar li{position:relative; margin:0 0 8px; padding:0;}
#new-pro-page   .side-nav-bar li a{display:block; width:130px; text-align:center;  background:#1a9b58; color:#fff !important; padding:7px 8px; text-transform:uppercase; font-size:12px; letter-spacing:0;}
#new-pro-page   .side-nav-bar li:before{content: "";
    display: block;
    position: absolute;
    left: -28.333px;
    bottom: 0;
    z-index: -5;
    /* width: 20px; */
    /* height: 100%; */
    /* background: #1a9b58; */
    /* transform: rotate(15deg); */
    width: 0;
    height: 0;
    border-top: 34px solid transparent;
    border-bottom: 0 solid transparent;
    border-right: 28px solid #1a9b58;}
	
#new-pro-page   .side-nav-bar li:hover{filter: saturate(2); -webkit-filter: saturate(2);}

@media (min-width:992px) and (max-width:1130px){
	#new-pro-page .head-arm-tx {
    font-size: 60px;
    line-height: 60px;
	}
	
	#new-pro-page .line-bx-arm-5 .line-arm a {
   
    padding: 0 2%;
	}
	
	
	.txt-arm {   
    margin: 10% 5% 0;
}

.txt-arm h3 {
    margin: 0 0 30px;
}

	#new-pro-page .col-sm-10.col-sm-offset-1.no-pad {
    margin: 0 auto;
    width: 94%;
    float: none;
}
	
}

@media (max-width:991px){
	#new-pro-page .container {   
    padding: 0 20px;
}
#new-pro-page .head-arm-tx {
    font-size: 45px !important;
    line-height: 45px;
}

#new-pro-page .top-bx-s {
    margin: 50px 0 30px;
}

#new-pro-page .slider-sec .slick-slider {
    margin-bottom: 0;
}
#new-pro-page .glr-up li {
  
    width: 20%;
}

#new-pro-page .text-cnt-bx p, #new-pro-page .text-cnt-bx a {
    color: #fff !important;
}

.text-cnt-bx {
    float: left;
    width: 50%;
}

#new-pro-page .contact-bx-arm .col-md-8 {
    padding: 0;
    float: none;
}

#new-pro-page .txt-arm h3 {
    font-size: 35px;
	margin-bottom:20px;
}

#new-pro-page .txt-arm p {
    font-size: 13px;
    color: #fff !important;
    text-align: left;
}

#new-pro-page .txt-arm {   
    margin: 5% 5% 0;
}


}

@media (max-width:767px){
	#new-pro-page .top-bg-4 {
    padding: 20px 0 60px;
	}
	
	#new-pro-page .head-arm-tx {
    font-size: 30px !important;
    line-height: 30px;
}

#new-pro-page .top-drp-down {
    margin-top: -10px;
}

#new-pro-page .line-bx-arm-5 .line-arm a i {  
    font-size: 35px; 
    line-height: 35px;
}

#new-pro-page .top-bx-s .col-sm-6.no-pad {
    float: left;
}

#new-pro-page .scrl-bx {
    height: 200px;
	    margin-bottom: 30px;
}

#new-pro-page .mid-slider-5 .col-sm-5 {
    width: 100%;
    float: none;
}

#new-pro-page .mid-slider-5 .col-sm-7 {
    width: 100%;
    float: none;
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 99;
}

.input-bx.text-right {
    text-align: left !important;
}


.txt-arm {
    max-width: 100%;
    color: #fff;
       margin: 5%;
    text-align: center;
	margin: 0;
    min-height: 200px;
}

.txt-arm h3 {
    
    text-align: center;
}

#new-pro-page .mid-slider-5 .slick-dots {
    display: block;
     max-width: 100%;
	 margin: 10% 0 0;
}

#new-pro-page .mid-slider-5 .slick-next {
    right: 0;
    left: auto;
}

#new-pro-page .mid-slider-5 .slick-prev {
    left: 0;
}

#new-pro-page .glr-up li {
    width: 25%;
}

}

@media (max-width: 581px){
  #new-pro-page .head-arm-tx {
    font-size: 25px !important;
    line-height: 25px;
}
#new-pro-page .container {
    padding: 0 10px;
}

#new-pro-page .top-drp-down .drp-box .dropdown {
    display: inline-block;
    letter-spacing: 0.5px;
    width: 100%;
    margin: 5px 0;
}

 #new-pro-page .top-drp-down .drp-box .dropdown button {
	width: 100%;
    border-radius: 10px !important;
    padding: 8px !important;
}

#new-pro-page .top-drp-down .drp-box .dropdown:last-child button {
    padding: 8px;
}

#new-pro-page .mid-txt-arm-5 {
    font-size: 20px;   
    margin: 0 0 20px;
    
}

#new-pro-page .line-bx-arm-5 .line-arm a {
    letter-spacing: 0;  
    padding: 5%;  
    display: block;    
}

#new-pro-page .top-bx-s .col-sm-6.no-pad {
    float: none;
	width:100%;
}

#new-pro-page .top-bx-s .col-sm-6.no-pad:first-child {
    width: 100%;
    padding-right: 0;
}

.slider-sec {
    padding: 0 20px;
}


.break-line {
    padding-bottom: 30px 
}

.img-bx-arm h2 {
    text-align: left;
    margin-left: 0;
    font-size: 18px;
    margin-top: 0;
    color: #169C5B;
}

.img-bx-arm img {
    max-width: 100%;
    margin: 0;
    display: block;
}

#new-pro-page .glr-up li {
    width: 50%;
}

#new-pro-page .contact-bx-arm h1 {
    color: #fff;
    font-size: 65px;
    margin-bottom: 30px;
}

.text-cnt-bx {
    float: none;
    width: 100%;
}

#new-pro-page .input-bx button {padding:10px 0; width:100%;}


}

 

</style>
