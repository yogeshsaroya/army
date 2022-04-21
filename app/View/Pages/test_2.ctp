<style>
/*---select-cars---*/
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

/*--new add--*/
 .pos-abst {
    position: fixed;
    bottom: 0;
    width: 100%;
    padding: 15px 5px 8px;
    height: auto;
    background: rgba(0,0,0,0.8);
    left: 0;
    z-index: 99;
}

 .pos-abst #new-ui-add .tuningconfig {
    background: transparent;
    padding: 10px 0;
}
.pos-abst #new-ui-add{max-width:740px; margin: 0 auto;}

.pos-abst #new-ui-add select{
    padding: 0 15px;
}

.pos-abst #new-ui-add h2{margin-bottom:0; font-size:15px;}



.pos-abst .nowrap.col-sm-4.box-frm , .pos-abst #new-ui-add .col-sm-4-nw, #frmTun .col-sm-4.text-left {
    padding: 0 15px;
}

.pos-abst #new-ui-add #frmTun #get_info {    
    font-size: 12px!important;
    line-height: 40px!important;
    height: 40px;    
    padding: 0 10px;   
    color: #4AFF0C;
    float: none;
}

.pos-abst #new-ui-add #frmTun #get_info img {
    max-width: 15px;
}

.pos-abst #new-ui-add select{
	font-size: 12px!important;
    height: 40px;    
    padding: 0 10px;
	
}

@media (min-width:768px) and (max-width:991px){
	.pos-abst #new-ui-add .col-sm-8-nw {
    width: 75%;
    float: left;
}

.pos-abst #new-ui-add .col-sm-4-nw, #frmTun .col-sm-4.text-left {
    width: 25%;   
    margin: 0 auto 0;
    float: left;
}
}

@media (max-width:767px){
	.pos-abst #new-ui-add #frmTun #get_info {    
    margin-top: 5px;   
    background-color: #212728!important;
}
.pos-abst #new-ui-add select {
        margin-bottom: 5px;
}

}




/*----end select-cars---*/



.product-exhausts {
	position: relative;
	padding: 200px 0 30px;
}
.head-exast, .product-fliter-img-ex {
	display: inline-block;
}
.product-fliter-img-ex {
	max-width: 120px;
	margin-left: 30px;
}
.product-exhausts hr {
	border: 0;
	border-bottom: 2px solid #000;
	margin: 20px 0 0;
}
.head-exast h1 {
	font-size: 40px;
	text-transform: uppercase;
	margin-top: 10px;
}
.head-exast h1 span {
	font-family: "NimbusSanL-Bol";
	font-size: 40px;
}
.product-fliter-img-ex img {
	vertical-align: middle;
	margin-top: -25px
}
 
 /*--content--*/
   .pro-exaust{border-bottom:1px solid #ccc; position:relative; padding:30px 0;}
   .pro-exaust:before{content:""; position:absolute; left:0; right:0; top:0; margin:auto; height:100%; width:1px; background:#ccc;}
   .pro-exaust:after , ul.metal-type:after{display:block; content:""; clear:both;}
   
   .featrs-txt {
    height: 120px;
    text-align: left;
}
   .featrs-txt h3 {
    padding: 0;
    margin: 0 0 5px;
    font-size: 18px;
    font-weight: 600;
}
   
   .exaust-cntnt {
    min-height: 210px;
    position: relative;
}   
   .buton-bottm {
    text-align: left;
    position: absolute;
    bottom: 0;
    width: 100%;
    height: auto;
}

.rups {
    font-size: 18px;
    color: #00a760;
	display:none;
}

.mx-wd {
    max-width: 480px;
}

.mx-wd:after{clear:both; display:block; content:"";}

.stainless_steel a {
    background: #2ECCFA !important;
    color: #000 !important;
}
.buton-bottm ul.metal-type{display:block; margin:10px 0;}
.buton-bottm ul.metal-type li{width:50%; padding:0 5px; float:left; }
.buton-bottm ul.metal-type li:first-child{padding-left:0;}
.buton-bottm ul.metal-type li:last-child{padding-right:0;}
.buton-bottm ul.metal-type li a{padding:8px; color:#fff; background:rgb(180,180,180); display:block; text-align:center;}
.add-cart-btn a {
    width: 100%;
    font-size: 16px !important;
    border-radius: 0;
    background: #093 none repeat scroll 0 0;
    color: #fff;
    text-transform: uppercase;
    border: none;
    display: block;
    padding: 8px;
    text-align: center;
}

.add-cart-btn a:hover {
    background: #444 none repeat scroll 0 0 !important;
}

@media (max-width:991px){
	.mx-wd {
    max-width: 500px;
}
.pro-exaust .col-sm-4{padding-left:0;}
.pro-exaust .col-sm-8{padding:0;}
.featrs-txt h3 {
    padding: 0;
    margin: 0 0 5px;
    font-size: 14px;
}
.featrs-txt p{font-size:12px; line-height:1.3;}
.featrs-txt {
    height: 100px;
}
.exaust-cntnt {
    min-height: 180px;
}

#main_sec .metal-type , .metal-type a{list-style:none; font-size:12px;}
#main_sec .buton-bottm ul.metal-type li a , .add-cart-btn a {
    padding: 5px;
}

#main_sec .add-cart-btn a {   
    font-size: 14px !important;    
}

.product-exhausts {
    padding: 180px 0 30px;
}


}

@media (max-width:767px){
	.pos-abst {position:static; padding:20px 0; margin-bottom:80px; background:transparent;}	
	.pro-exaust::before {display:none;}
	.pro-exaust{padding:0; border:0;}
	.pro-exaust .col-sm-6{padding:30px 0; border-bottom: 1px solid #ccc; margin:0 -10px;}
	.mx-wd {
    max-width: 400px;
    margin: auto;
	padding:0 10px;
}

.featrs-txt {
    height: auto;
	margin-bottom:30px;
}

.exaust-cntnt {
    min-height:auto;
}

.buton-bottm {
    position: relative;
}

.img-pro {
    max-width: 200px;
    margin:0 auto 30px;
}

.pos-abst #new-ui-add h2 {
    margin-bottom: 0;
    font-size: 15px;
    color: #000;
    text-shadow: none;
}
.product-exhausts {
    padding: 100px 0 150px;
}

.pos-abst #new-ui-add select {   
    padding: 0 10px;
}

.pos-abst #new-ui-add #frmTun #get_info {
    font-size: 14px!important;
     
}

.head-exast h1 , .head-exast h1 span {
    font-size: 30px;
}

.product-fliter-img-ex {
    margin-left: 20px;
}

.head-exast h1, .head-exast h1 span {
    font-size: 25px;
}
.featrs-txt h3 {    
    font-size: 16px;
}
.featrs-txt p{font-size:13px;}
#main_sec .add-cart-btn a {
    font-size: 18px !important;
}

#main_sec .buton-bottm ul.metal-type li a, .add-cart-btn a {
    padding: 8px;
}

}

@media (max-width:580px){
	.product-fliter-img-ex img {
    vertical-align: top;
    margin-top: 0;
    max-height: 80px;
    width: auto;
}

.product-fliter-img-ex {
    margin-top: -100px;
    position: absolute;
    left: 0;
    top: 0;
    height: 80px;
	max-width:100%;width:100%;
	margin-left:0;
	
}

.head-exast, .product-fliter-img-ex {
    display: block;
	text-align:center;
}

.product-exhausts hr {   
    margin: 10px 0 0;
}

}

@media (max-width:480px){
	.product-exhausts {
    padding: 60px 0 100px;
}
}
 
</style>

<div class="product-exhausts">
  <!--start select-box-->
  
<div class="pos-abst">  
    <div class="container" id="new-ui-add"> 
    <h2>Select Brand , Model and Engine / Year and choose the Armytrix Exhaust Systems</h2>
    <div class="col-md-12 main_d no-pad">
      
      <div class="fadein">       
        <div class="tuningconfig">
          <form id="frmTun">
       <div class="container-fmr ma-box">                  
        <div class="col-sm-8 no-pad col-sm-8-nw">          
                  <div class="nowrap col-sm-4 box-frm arw-rt">
                    <select class="lable_txt arw-rt" id="brand" name="brand">
                    <option value="">Select Brand</option>
                    <option value="1">Alpina</option><option value="2">AMG</option><option value="3">Audi</option><option value="4">Bentley</option><option value="5">BMW</option><option value="6">Bugatti</option><option value="23">Chevrolet</option><option value="7">Ferrari</option><option value="21">Ford</option><option value="19">Honda</option><option value="22">Infiniti</option><option value="8">Jaguar</option><option value="9">Lamborghini</option><option value="10">Land Rover</option><option value="24">Lexus</option><option value="11">Maserati</option><option value="25">McLaren</option><option value="12">Mercedes Benz</option><option value="13">MINI</option><option value="20">Nissan</option><option value="14">Porsche</option><option value="15">Rolls Royce</option><option value="16">Seat</option><option value="17">Skoda</option><option value="18">Volkswagen</option></select></div>
                   <div class="nowrap col-sm-4 box-frm arw-rt">
                    <select class="lable_txt " id="model" name="model">
                      <option value="">Select Model</option>
                    </select></div>
                   <div class="nowrap col-sm-4 box-frm">
                    <select class="lable_txt" id="motor" name="motor">
                      <option value="">Select Engine</option>
                    </select></div>
  <div class="clearfix"></div>                  
                </div>
                
                
                <div class="col-sm-4  text-left tuningoptions no-pad col-sm-4-nw">    
                
                  <div class="nowrap box-frm arw-rt"><!--<input name="sub" type="button" value="TUNE IT" class="btn btn-primary ps-ab" id="get_info">--> <button class="btn btn-primary ps-ab" id="get_info" name="sub" type="button" value="TUNE IT"><img src="https://www.armytrix.com/bootstrap_3_3_6/img/logo-icon.png" alt=""> TUNE IT</button></div>
</div>

<div class="clearfix"></div>

<!--end of first -box-->
          
<div id="app_error"> </div>
        </div></form>
        <div id="show_info" style="min-height: 268px;">
          
		  <div class="clearfix"></div>
        </div>
      </div> 
    </div>
    <div class="clearfix"></div>
   </div>
<!----end of container------>    
  </div>
 </div> 
  
  <!--end of select-box-->

<div class="container">
  <div class="col-sm-12 text-left">
    <div class="head-exast">
      <h1><span class="fnt-bold">BMW</span> f34 335gt</h1>
    </div>
    <div class="product-fliter-img-ex" id="car_pic"><img src="https://www.armytrix.com/cdn/360_240_100_ff_cdn/rear-bmw/bmw-235i.jpg" alt="" title=""></div>
  </div>
  <div class="clearfix"></div>
</div>
<hr/>
  <div class="pro-exaust">
   <div class="container">
    <div class="col-sm-6">
     <div class="mx-wd">
      <div class="col-sm-4">
        <div class="img-pro"> <img src="https://www.armytrix.com/cdn/all/bmw-135i-235i-blue_crp.jpg" /> </div>
      </div>
      <!--end of img-box-->
      
      <div class="col-sm-8">
        <div class="exaust-cntnt">
          <div class="featrs-txt"> <a href="#">
            <h3>2er/F22 M235i (2014-2015)</h3>
            <p>Front Y Pipe + Mid Pipe + Valvetronic Mufflers + Wireless Remote Control Kits + Dual Matte black Tips (2X89 mm)</p>
            </a> </div>
          <div class="buton-bottm">
            <div class="rups">$2880.00</div>
            <ul class="metal-type">
              <li><a>BMF23-DS11B</a></li>
              <li class="stainless_steel"><a>Stainless steel</a></li>
            </ul>
            <div class="add-cart-btn"><a href="#">Add to cart</a></div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <!--end of half col--> 
    </div>
   </div> 
    <!--end of box--->   
    <div class="col-sm-6">
     <div class="mx-wd">
      <div class="col-sm-4">
        <div class="img-pro"> <img src="https://www.armytrix.com/cdn/all/bmw-135i-235i-blue_crp.jpg" /> </div>
      </div>
      <!--end of img-box-->
      
      <div class="col-sm-8">
        <div class="exaust-cntnt">
          <div class="featrs-txt"> <a href="#">
            <h3>2er/F22 M235i (2014-2015)</h3>
            <p>Front Y Pipe + Mid Pipe + Valvetronic Mufflers + Wireless Remote Control Kits + Dual Matte black Tips (2X89 mm)</p>
            </a> </div>
          <div class="buton-bottm">
            <div class="rups">$2880.00</div>
            <ul class="metal-type">
              <li><a>BMF23-DS11B</a></li>
              <li class="stainless_steel"><a>Stainless steel</a></li>
            </ul>
            <div class="add-cart-btn"><a href="#">Add to cart</a></div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <!--end of half col--> 
    </div>
   </div> 
    <!--end of box--->    
</div>
</div>

<!--end of box--> 

 <div class="pro-exaust">
   <div class="container">
    <div class="col-sm-6">
     <div class="mx-wd">
      <div class="col-sm-4">
        <div class="img-pro"> <img src="https://www.armytrix.com/cdn/all/bmw-135i-235i-blue_crp.jpg" /> </div>
      </div>
      <!--end of img-box-->
      
      <div class="col-sm-8">
        <div class="exaust-cntnt">
          <div class="featrs-txt"> <a href="#">
            <h3>2er/F22 M235i (2014-2015)</h3>
            <p>Front Y Pipe + Mid Pipe + Valvetronic Mufflers + Wireless Remote Control Kits + Dual Matte black Tips (2X89 mm)</p>
            </a> </div>
          <div class="buton-bottm">
            <div class="rups">$2880.00</div>
            <ul class="metal-type">
              <li><a>BMF23-DS11B</a></li>
              <li class="stainless_steel"><a>Stainless steel</a></li>
            </ul>
            <div class="add-cart-btn"><a href="#">Add to cart</a></div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <!--end of half col--> 
    </div>
   </div> 
    <!--end of box--->   
    <div class="col-sm-6">
     <div class="mx-wd">
      <div class="col-sm-4">
        <div class="img-pro"> <img src="https://www.armytrix.com/cdn/all/bmw-135i-235i-blue_crp.jpg" /> </div>
      </div>
      <!--end of img-box-->
      
      <div class="col-sm-8">
        <div class="exaust-cntnt">
          <div class="featrs-txt"> <a href="#">
            <h3>2er/F22 M235i (2014-2015)</h3>
            <p>Front Y Pipe + Mid Pipe + Valvetronic Mufflers + Wireless Remote Control Kits + Dual Matte black Tips (2X89 mm)</p>
            </a> </div>
          <div class="buton-bottm">
            <div class="rups">$2880.00</div>
            <ul class="metal-type">
              <li><a>BMF23-DS11B</a></li>
              <li class="stainless_steel"><a>Stainless steel</a></li>
            </ul>
            <div class="add-cart-btn"><a href="#">Add to cart</a></div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <!--end of half col--> 
    </div>
   </div> 
    <!--end of box--->    
</div>
</div>
<!--end of box--> 


<div class="pro-exaust">
   <div class="container">
    <div class="col-sm-6">
     <div class="mx-wd">
      <div class="col-sm-4">
        <div class="img-pro"> <img src="https://www.armytrix.com/cdn/all/bmw-135i-235i-blue_crp.jpg" /> </div>
      </div>
      <!--end of img-box-->
      
      <div class="col-sm-8">
        <div class="exaust-cntnt">
          <div class="featrs-txt"> <a href="#">
            <h3>2er/F22 M235i (2014-2015)</h3>
            <p>Front Y Pipe + Mid Pipe + Valvetronic Mufflers + Wireless Remote Control Kits + Dual Matte black Tips (2X89 mm)</p>
            </a> </div>
          <div class="buton-bottm">
            <div class="rups">$2880.00</div>
            <ul class="metal-type">
              <li><a>BMF23-DS11B</a></li>
              <li class="stainless_steel"><a>Stainless steel</a></li>
            </ul>
            <div class="add-cart-btn"><a href="#">Add to cart</a></div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <!--end of half col--> 
    </div>
   </div> 
    <!--end of box--->   
    <div class="col-sm-6">
     <div class="mx-wd">
      <div class="col-sm-4">
        <div class="img-pro"> <img src="https://www.armytrix.com/cdn/all/bmw-135i-235i-blue_crp.jpg" /> </div>
      </div>
      <!--end of img-box-->
      
      <div class="col-sm-8">
        <div class="exaust-cntnt">
          <div class="featrs-txt"> <a href="#">
            <h3>2er/F22 M235i (2014-2015)</h3>
            <p>Front Y Pipe + Mid Pipe + Valvetronic Mufflers + Wireless Remote Control Kits + Dual Matte black Tips (2X89 mm)</p>
            </a> </div>
          <div class="buton-bottm">
            <div class="rups">$2880.00</div>
            <ul class="metal-type">
              <li><a>BMF23-DS11B</a></li>
              <li class="stainless_steel"><a>Stainless steel</a></li>
            </ul>
            <div class="add-cart-btn"><a href="#">Add to cart</a></div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <!--end of half col--> 
    </div>
   </div> 
    <!--end of box--->    
</div>
</div>
<!--end of box--> 

<div class="pro-exaust">
   <div class="container">
    <div class="col-sm-6">
     <div class="mx-wd">
      <div class="col-sm-4">
        <div class="img-pro"> <img src="https://www.armytrix.com/cdn/all/bmw-135i-235i-blue_crp.jpg" /> </div>
      </div>
      <!--end of img-box-->
      
      <div class="col-sm-8">
        <div class="exaust-cntnt">
          <div class="featrs-txt"> <a href="#">
            <h3>2er/F22 M235i (2014-2015)</h3>
            <p>Front Y Pipe + Mid Pipe + Valvetronic Mufflers + Wireless Remote Control Kits + Dual Matte black Tips (2X89 mm)</p>
            </a> </div>
          <div class="buton-bottm">
            <div class="rups">$2880.00</div>
            <ul class="metal-type">
              <li><a>BMF23-DS11B</a></li>
              <li class="stainless_steel"><a>Stainless steel</a></li>
            </ul>
            <div class="add-cart-btn"><a href="#">Add to cart</a></div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <!--end of half col--> 
    </div>
   </div> 
    <!--end of box--->   
    <div class="col-sm-6">
     <div class="mx-wd">
      <div class="col-sm-4">
        <div class="img-pro"> <img src="https://www.armytrix.com/cdn/all/bmw-135i-235i-blue_crp.jpg" /> </div>
      </div>
      <!--end of img-box-->
      
      <div class="col-sm-8">
        <div class="exaust-cntnt">
          <div class="featrs-txt"> <a href="#">
            <h3>2er/F22 M235i (2014-2015)</h3>
            <p>Front Y Pipe + Mid Pipe + Valvetronic Mufflers + Wireless Remote Control Kits + Dual Matte black Tips (2X89 mm)</p>
            </a> </div>
          <div class="buton-bottm">
            <div class="rups">$2880.00</div>
            <ul class="metal-type">
              <li><a>BMF23-DS11B</a></li>
              <li class="stainless_steel"><a>Stainless steel</a></li>
            </ul>
            <div class="add-cart-btn"><a href="#">Add to cart</a></div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <!--end of half col--> 
    </div>
   </div> 
    <!--end of box--->    
</div>
</div>
<!--end of box--> 


</div>
