<link href="<?php echo SITEURL;?>scroll_bx/jquery.phancy.css" type="text/css" rel="stylesheet">
<div id="preloader" style="display: none;"> <div id="status">&nbsp;</div> </div>
<div class="arrow-setng">
 <div class="arw-ups arw-wd"><div class="set-arws"><img src="<?php echo SITEURL;?>cdn/arow_up.png"/></div></div>
<div class="pos-abst" id="select-cars_fix">   
    <div class="container" id="new-ui-add"> 
     <div class="left-sd">
    <h2>Select Brand , Model and Engine / Year and choose the Armytrix Exhaust Systems</h2>
    <div class="col-md-12 main_d no-pad">
      
      <div class="fadein">       
        <div class="tuningconfig">
          <form id="frmTun">
       <div class="container-fmr ma-box">                  
<div class="col-sm-12 no-pad col-sm-12-nw">          
<div class="nowrap col-sm-4 box-frm arw-rt">
<?php echo $this->Form->input('brand',array('options'=>$b,'default'=>$query['brand'], 'id'=>'brand','name'=>'brand','class'=>'lable_txt arw-rt','div'=>false,'label'=>false));?>
</div>

<div class="nowrap col-sm-4 box-frm arw-rt">
<?php echo $this->Form->input('model',array('options'=>$model_list,'default'=>$query['model'],'empty'=>'Select Model', 'id'=>'model','name'=>'model','class'=>'lable_txt','div'=>false,'label'=>false));?>
</div>
<div class="nowrap col-sm-4 box-frm">
<?php echo $this->Form->input('motor',array('options'=>$motor_list,'default'=>$query['motor'],'empty'=>'Select Engine', 'id'=>'motor','name'=>'motor','class'=>'lable_txt','div'=>false,'label'=>false));?>
</div>
<div class="clearfix"></div> 
    <div class="car-img" id="car_pic"><?php if(isset($cList['image']) && !empty($cList['image'])){ echo $cList['image'];}?></div>
</div>
<div class="clearfix"></div>
<div id="app_error"> </div>
</div></form>
<div id="show_info">
<div class="clearfix"></div>
        </div>
      </div> 
    </div>
    <div class="clearfix"></div>
   </div>
<!----end of container------>    
  </div>
 </div> 
 </div>
</div> 

<div id="pro-sel-pg">

 <div class="container-flude">
  <div class="row-clear">
    <div class="col-sm-6">
      <h1 class="ilatc_head">CAT-BACK VALVETRONIC EXHAUST</h1>
<div class="scrol-bx" id="demo">      
<?php if(isset($cList['data1']) && !empty($cList['data1'])){ echo $cList['data1'];}?>
</div>
    </div>
<!--end of first col-->

<div class="col-sm-6">
      <h1 class="ilatc_head">Headers/downpipes</h1>
<div class="scrol-bx" id="demo_2">      

<?php if(isset($cList['data']) && !empty($cList['data'])){ echo $cList['data'];}?>
</div>
    </div>
<!--end of second col-->    
    
  </div> 
 </div> 
</div>
<div class="clearfix"></div>
<style>
#pro-sel-pg .container:after,#pro-sel-pg .container:before{display:block;content:""}
#pro-sel-pg{margin-top:22px;display:block;float:left;width:100%; position:relative}
div#pro-sel-pg:before{display:none !important;}
.ilatc_head {
    font-family: goboldbolditalic!important;
    color: #fff;
    padding: 10px 0 10px;
    font-size: 21px;
    text-align: center;
    text-shadow: 0 0 15px #000;
    margin: 0;
	/*background:url(<?php echo SITEURL;?>image/bg-image-left.jpg) no-repeat center top; background-size:100% 100%;*/}
div#pro-sel-pg .col-sm-6:last-child .ilatc_head{/*background:url(<?php echo SITEURL;?>image/bg-image-right.jpg) no-repeat center top; background-size:100% 100%;*/}
.phancy-scroller {
    margin-top: 0 !important;
}
.row-clear{margin:0 -15px}
.mx-wd:after,.row-clear:after{display:block;clear:both;content:""}
.item-bx-arm{padding:30px 0!important;float:none;border-bottom:1px solid #b3b3b3;position:relative}
.item-bx-arm:before{content:"";width:500%;left:-500%;bottom:0;height:1px;background:#b3b3b3;position:absolute}
.scrol-bx{height:700px;overflow:auto;float:left;width:100%;margin-top:5px}
#pro-sel-pg .mx-wd{max-width:480px;margin:auto}
#pro-sel-pg .exaust-cntnt{min-height:auto;position:relative}
#pro-sel-pg .featrs-txt{height:auto;text-align:left}
#pro-sel-pg .featrs-txt h3{padding:0;margin:0 0 5px;font-size:18px;font-weight:600}
#pro-sel-pg .buton-bottm{text-align:left;position:static;bottom:0;width:100%;height:auto}
#pro-sel-pg .buton-bottm ul.metal-type{display:block;margin:10px 0;list-style:none}
#pro-sel-pg .buton-bottm ul.metal-type li{width:50%;padding:0 5px;float:left}
#pro-sel-pg .buton-bottm ul.metal-type li:first-child{padding-left:0}
#pro-sel-pg .buton-bottm ul.metal-type li:last-child{padding-right:0}
#pro-sel-pg .buton-bottm ul.metal-type li a{padding:8px;color:#fff;background:#b4b4b4;display:block;text-align:center}
#pro-sel-pg .stainless_steel a{background:#2ECCFA!important;color:#000!important}
#pro-sel-pg .pro-exaust:after,#pro-sel-pg ul.metal-type:after{display:block;content:"";clear:both}
#pro-sel-pg .add-cart-btn a{width:100%;font-size:16px!important;border-radius:0;background:#093 none repeat scroll 0 0;color:#fff;text-transform:uppercase;border:none;display:block;padding:8px;text-align:center;transition:all 500ms ease}
#pro-sel-pg .add-cart-btn a:hover{background:#444 none repeat scroll 0 0!important}
.pos-abst {
    position: relative;
    bottom: 0;
    width: 100%;
    padding: 15px 5px 15px;
    height: auto;
    background: #000;
    left: 0;
    z-index: 99;
    display: block;
}
.pos-abst #new-ui-add{max-width:900px;margin:0 auto}
.pos-abst #new-ui-add h2{margin-bottom:0;font-size:15px;ont-weight:400;color:#fff;text-align:center;padding:0 10px;position:relative;z-index:99;text-shadow:0 0 40px #000;text-transform:uppercase}
#new-ui-add .no-pad{padding:0}
.col-md-12.main_d.no-pad{margin:0;padding:0}
.pos-abst #new-ui-add .tuningconfig{background:transparent;padding:10px 0}
#new-ui-add #frmTun{padding:0}
#new-ui-add #frmTun .container-fmr.ma-box{margin-bottom:0}
#new-ui-add .no-pad{padding:0}
.pos-abst .nowrap.col-sm-4.box-frm,.pos-abst #new-ui-add .col-sm-4-nw,#frmTun .col-sm-4.text-left{padding:0 15px}
.arw-rt::before{width:0;height:0;border-top:5px solid transparent;border-bottom:5px solid transparent;border-left:9px solid #fff;position:absolute;content:"";display:block;top:0;bottom:0;right:-6px;margin:auto}
.pos-abst #new-ui-add select{font-size:12px!important;height:40px;padding:0 10px;-webkit-appearance:none;-moz-appearance:none;appearance:none;color:#fff;border:2px solid #fff!important;background-color:#212728!important;height:40px;margin:0;width:100%!important;background-image:url(<?php echo SITEURL;?>bootstrap_3_3_6/img/arrow-whte.png);background-position:right center;background-position:96% center;background-repeat:no-repeat;background-size:16px}
#new-ui-add select option{background:#212728;padding:12px}
.arw-wd{margin:0 auto 20px;cursor:pointer}
.arrow-setng {
    position: fixed;
    bottom: 0;
    width: 100%;
    leftL: 0;
    left: 0;
    z-index: 999;
}
.arw-ups.arw-wd {
    position: relative;
    bottom: 0;
    z-index: 555;
    left: 0;
    right: 0;
    margin: 0 auto;
    padding: 10px 0;
    background: #000;
    margin:0;
}

.set-arws {
    max-width: 70px;
    margin: auto;
    position: absolute;
    top: -25px;
    left: -2px;
    right: 0;
    z-index: 55;
}

.set-arws img {
    margin-top: 6px;
}

.set-arws:before {
    width: 0;
    height: 0;
    border-bottom: 45px solid #000;
    border-left: 60px solid transparent;
    border-right: 60px solid transparent;
    content: "";
    position: absolute;
    left: -25px;
    right: 0;
    margin: auto;
    bottom: -7px;
    z-index: -5;
}
.car-img{position:absolute;right:0;max-height:100px;width:auto;max-width:auto;top:0;transform:translate(0,-50%);-webkit-transform:translate(0,-50%);max-width:180px}
.car-img img{width:auto;max-width:auto;max-height:100px}
.logo-in{width:422px}
.mx-wd .col-sm-4{padding:0}
footer{margin-bottom:20px;}

@media (min-width:992px){
	.pos-abst #new-ui-add .col-sm-12.no-pad.col-sm-12-nw , .pos-abst #new-ui-add h2{padding-right:180px;}
}
@media (min-width:768px){
	div#select-cars_fix {
    display: none;
}
.featrs-txt p {
    min-height: 60px;
}

#pro-sel-pg .row-clear .col-sm-6:first-child{z-index:55;}

}
@media (max-width:1350px) {
#pro-sel-pg{background:none;margin-top:21px}
div#pro-sel-pg::before{top:72px}
}

@media (max-width:1230px){
	#pro-sel-pg {
    margin-top: 16px;
}
}
@media (max-width:991px) {
.mx-wd .col-sm-4,.mx-wd .col-sm-8{padding:0;float:none;width:100%;text-align:center;max-width:250px;margin:auto}
.mx-wd .col-sm-8{max-width:100%;margin-top:10px}
.ilatc_head{font-size:22px}
.logo-in{width:300px}
#pro-sel-pg { margin-top: 3px;}
#pro-sel-pg .mx-wd{max-width:300px;margin:auto!important}
.car-img{position:static;transform:translate(none);-webkit-transform:none;margin:20px auto 10px}
}
@media (max-width:767px) {
.pos-abst #new-ui-add select{padding:0 10px;margin-bottom:8px}
#new-ui-add .lable_txt:hover{background-color:green!important}
.pos-abst{position:static;width:100%;padding:15px 5px;height:auto;background:transparent;display:block!important;box-sizing:border-box}
.arw-wd,.arw-ups.arw-wd{display:none!important}
.pos-abst #new-ui-add h2{margin-bottom:0;font-size:15px;color:#000;text-shadow:none}
#main_sec{margin-top:95px!important}
#pro-sel-pg .ilatc_head{background-size:cover;font-family:"Titillium Web",Helvetica,Arial,sans-serif!important;font-weight:700}
#pro-sel-pg:before{display:none}
#pro-sel-pg .buton-bottm ul.metal-type{list-style:none}
#pro-sel-pg .mx-wd{max-width:400px}
#pro-sel-pg .container-flude{padding:0}
#pro-sel-pg .container-flude .row-clear{margin:0}
#pro-sel-pg .row-clear .col-sm-6{padding:0;width:100%!important;overflow-x:hidden}
.car-img img{max-height:200px}
.car-img{position:static;transform:translate(none);-webkit-transform:none;margin:20px auto 10px;max-height:400px;max-width:250px}
div#select-cars_fix{padding-top:70px}
.item-bx-arm{padding:20px 0!important}
#pro-sel-pg .mx-wd{padding:0 15px}

.arrow-setng {
    position: relative;   
    z-index: 555;
}
}
@media (max-width:480px) {
.pos-abst #new-ui-add{padding:0}
}
@media (max-width:1250px) {
#pro-sel-pg .row-clear .col-sm-6 h1{background-size:cover}
}
@media (min-width:1450px) {
#pro-sel-pg .row-clear .col-sm-6:last-child .mx-wd{margin:0 auto 0 10%}
#pro-sel-pg .row-clear .col-sm-6:first-child .mx-wd{margin:0 10% 0 auto}
#pro-sel-pg .row-clear .col-sm-6:first-child .ilatc_head{text-align:right;padding-right:20%}
#pro-sel-pg .row-clear .col-sm-6:last-child .ilatc_head{text-align:left;padding-left:20%}
}

#new-pro-page .row.lang_bar .input.select select{text-align:center;text-align-last:center}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo SITEURL;?>scroll_bx/jquery.phancy.js"></script>
<script>
		$(function() {
			$( "#demo" ).customScroll({ scrollbarWidth: 16 });
			$( "#demo_2" ).customScroll({ scrollbarWidth: 16 });
		});

		jQuery(document).ready(function(){
			"use strict";
			function cls(){
				//$('#car_pic').html('');
				//$('#get_data').html('');
				}

			$( "#brand" ).change(function() {
				$("#app_error").html('');
				var v = $.trim(this.value); 
				$('#preloader').show();
				cls();
				$.ajax({type: 'POST',
					url: '<?php echo SITEURL;?>pages/get_exhaust',
					data:'id='+v+'&type=brand&get=product',
					success: function(data) { $("#app_error").html(data); $('#preloader').hide(); },
					error: function(comment) { $("#app_error").html(data);  $('#preloader').hide();  }}); 
				});

			$( "#model" ).change(function() {
				$("#app_error").html(''); cls();
				var v = $.trim(this.value); 
				var brand = $("#brand").val(); 
				$('#preloader').show();
				$.ajax({type: 'POST',
					url: '<?php echo SITEURL;?>pages/get_exhaust',
					data:'id='+v+'&brand='+brand+'&type=model&get=product',
					success: function(data) { $("#app_error").html(data); $('#preloader').hide(); },
					error: function(comment) { $("#app_error").html(data);  $('#preloader').hide();  }});
				});

			$( "#motor" ).change(function() {
				$("#app_error").html(''); cls();
				var v = $.trim(this.value);
				var brand = $("#brand").val();
				var model = $("#model").val();  
				if(v != ""){ $('#preloader').show();
				$.ajax({type: 'POST',
					url: '<?php echo SITEURL;?>pages/get_exhaust',
					data:'id='+v+'&brand='+brand+'&model='+model+'&type=motor&get=product',
					success: function(data) { $("#app_error").html(data); $('#preloader').hide(); },
					error: function(comment) { $("#app_error").html(data);  $('#preloader').hide();  }}); }
				});
		});			



$(document).ready(function(){
    $(".set-arws").click(function(){
        $("#select-cars_fix").slideToggle('slow');
    });
});
</script>