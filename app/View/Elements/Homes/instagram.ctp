<?php $bg_img = $this->Lab->getBgImgName('instagram');?>

<style>
h1{font-size:32px}
.sub_head{font-size:20px}
@media (max-width:900px) {
#main_sec{margin-top:16%;color:#fff}
}
@font-face{font-family:big_noodle_titling;src:url(../fonts/big_noodle_titling.ttf)}
@font-face{font-family:builttitlingrg;src:url(../fonts/builttitlingrg.ttf)}
.bg-army-bx .headngs{padding:0 15px 20px}
.bg-army-bx{min-height:600px;min-height:100vh;padding:100px 0 0;background:url(<?php echo SITEURL."cdn/bg_image/".$bg_img;?>) no-repeat center center;background-size:cover}
#bg-welcome h1{color:#fff;font-size:60px;text-transform:uppercase;font-family:big_noodle_titling!important;margin:0;text-align:left}
#bg-welcome.insta .gallery-pg .col-sm-3.col-md-2.col-xs-4{padding:0;position:relative}
#bg-welcome.insta .gl-row:after{clear:both;content:"";display:block}
#bg-welcome.insta .glry-img img{width:100%}
#bg-welcome.insta .glry-img .bg-ovr{position:absolute;z-index:1;width:100%;height:100%;top:0;left:0;background:rgba(6,5,5,0.5);-webkit-transition-property:all;-webkit-transition-duration:2.5s;-webkit-transition-timing-function:ease-in-out;-moz-transition-property:all;-moz-transition-duration:2.5s;-moz-transition-timing-function:ease-in-out;-o-transition-property:all;-o-transition-duration:2.5s;-o-transition-timing-function:ease-in-out;transition-property:all;transition-duration:2.5s;transition-timing-function:ease-in-out}
#bg-welcome.insta .glry-img:hover .bg-ovr{opacity:0;transition:none;-webkit-transition:none;-moz-transition:none;-o-transition:none;-ms-transition:none}
#bg-welcome.insta .glry-img h3{position:absolute;bottom:0;padding:15px 10px;text-align:right;width:100%;font-size:14px;font-weight:400;z-index:6;color:#fff;margin-bottom:0;background:-moz-linear-gradient(top,rgba(90,102,100,0) 0%,rgba(89,101,99,0) 1%,rgba(51,50,49,0.78) 39%,rgba(18,22,20,0.86) 100%);background:-webkit-linear-gradient(top,rgba(90,102,100,0) 0%,rgba(89,101,99,0) 1%,rgba(51,50,49,0.78) 39%,rgba(18,22,20,0.86) 100%);background:linear-gradient(to bottom,rgba(90,102,100,0) 0%,rgba(89,101,99,0) 1%,rgba(51,50,49,0.78) 39%,rgba(18,22,20,0.86) 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#005a6664',endColorstr='#db121614',GradientType=0)}
#bg-welcome.insta .serch-bx{float:right;width:500px;margin-top:-20px}
#bg-welcome.insta .serch-bx .input-group{border:2px solid #000;border-radius:10px;padding:3px}
#bg-welcome.insta .serch-bx .input-group input,#bg-welcome.insta .serch-bx .input-group button{background:transparent!important;border-radius:0;font-size:14px;height:30px;font-weight:700;color:#000;padding-top:0;padding-bottom:0;border:0}
.img-lg{max-width:600px;transform:rotate(-5deg);-webkit-transform:rotate(-5deg);-ms-transform:rotate(-5deg);-o-transform:rotate(-5deg);-moz-transform:rotate(-5deg)}
#bg-welcome.insta .serch-bx .alert{margin-bottom:0;margin-top:15px}
#bg-welcome.insta .serch-bx .input-group button{color:#000;letter-spacing:1px;font-size:20px;font-family:"NimbusSanL-Bol";padding:0 15px;border-left:2px solid #000;height:auto}
#bg-welcome.insta .serch-bx .input-group button:hover{color:green}
#bg-welcome.insta .serch-bx .input-group ::-webkit-input-placeholder{color:#000;opacity:.5!important}
#bg-welcome.insta .serch-bx .input-group ::-moz-placeholder{color:#000;opacity:.5!important}
#bg-welcome.insta .serch-bx .input-group :-ms-input-placeholder{ccolor:#000;opacity:.5!important}
#bg-welcome.insta .serch-bx .input-group :-moz-placeholder{color:#000;opacity:.5!important}
#bg-welcome.insta .tn-more{padding:50px 0;text-align:center}
#bg-welcome.insta .tn-more a{display:inline-block;border-radius:5px;border:2px solid #656565;padding:20px 35px;font-size:30px;text-transform:uppercase;font-weight:700;letter-spacing:1px;color:#656565;background:#fff;transition:all 500ms ease;-webkit-transition:all 500ms ease;-ms-transition:all 500ms ease;-moz-transition:all 500ms ease;-o-transition:all 500ms ease}
#bg-welcome.insta .tn-more a:hover{background:green;color:#fff!important;border-color:green}
.glry-img{min-height:100px}
@media (max-width:1200px) {
#bg-welcome.insta .serch-bx{width:400px}
#bg-welcome.insta .glry-img h3{font-size:15px}
}
@media (max-width:991px) {
.img-lg{max-width:450px}
#bg-welcome.insta .serch-bx{width:400px;margin-top:0}
#main_sec{margin-bottom:0!important}
}
@media (max-width:767px) {
.img-lg{transform:none;-webkit-transform:none;-o-transform:none;-ms-transform:none;-moz-transform:none;margin-bottom:20px}
#main_sec{margin-top:0;color:#fff;padding:0;margin-bottom:0}
.bg-army-bx{padding:100px 0}
#bg-welcome.insta .tn-more a{padding:10px 30px}
#bg-welcome.insta .serch-bx .input-group button{text-transform:uppercase}
}
@media (max-width:480px) {
.bg-army-bx{padding:80px 0}
.bg-army-bx .headngs{padding:0 0 20px}
#bg-welcome.insta .serch-bx{width:100%;margin-top:0}
#bg-welcome.insta .serch-bx .input-group input,#bg-welcome.insta .serch-bx .input-group button{font-size:12px}
#bg-welcome.insta .serch-bx .input-group button{font-size:15px;border-width:1px}
#bg-welcome.insta .serch-bx .input-group{border:1px solid #000}
#bg-welcome.insta .gallery-pg .col-sm-3.col-md-2.col-xs-4{width:50%}
}

</style>
<script>
function sig(){
	var link = $.trim( $('#ig').val() );
	var re = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
	
	if( link == "" ){ $('#err_app').html('<div class="alert alert-danger fade in">Please enter instagram url.</div>'); }
	else if (!re.test(link)) {  $('#err_app').html('<div class="alert alert-danger fade in">Please enter valid url.</div>'); }
	else{

			$("#igb").prop("disabled",true); $("#igb").text('Wait..');
	        $.ajax({type: 'POST',
	            url: '<?php echo SITEURL;?>instagram',
	            data: "url="+link+"",
	            success: function(data) { $("#err_app").html(data);	$('#ig').val(''); $("#igb").prop("disabled",false); $("#igb").text('send'); },
	            error: function(comment) { $("#err_app").html(data); $("#igb").prop("disabled",false); $("#igb").text('send'); }});
	    	
		
} 
	
}

</script>
<div id="bg-welcome" class="bg-army-bx insta">
  <div class="container-fluid">
     <div class="headngs">
       <img src="<?php echo SITEURL;?>v/show-army-img.png" alt="" class="img-lg"/>
       <div class="gl-row">
       <div class="serch-bx">
        <div class="input-group">
          <input type="text" class="form-control" id="ig" placeholder="Submit your IG photo link in here">
          <span class="input-group-btn">
          <button class="btn btn-secondary" type="button" id="igb" onclick="sig();" >send</button>
          </span>
         </div>
         
<div id="err_app"></div>


 
</div>
       </div>    
     </div>
  </div>
  
 <div class="gallery-pg">
    <div class="gl-row">

<?php if(isset($data) && !empty($data)){
    $n = 1;
    foreach ($data as $list){ 
        $img = new_show_image('cdn/instagram/'.$list['Instagram']['image'],320,320,100,'ff',$img_tag =null);
        ?>
      <div class="col-sm-3 col-md-2 col-xs-4 ig_img" style="display: <?php if( $n <= 48){ echo "block";}else{ echo "none";}?>">
        <a href="<?php echo $list['Instagram']['url'];?>" target="_blank"><div class="glry-img">
          <img src="<?php echo $img;?>" alt=""/> 
          <h3>@<?php echo $list['Instagram']['user_name'];?></h3>
          <div class="bg-ovr"></div>
        </div>
       </a> 
      </div>
    <?php $n++; } }?>    
    
      
    </div>
 </div> 
 
 <?php if( count($data) > 48 ){?>
 <div class="tn-more" id="v_m"> <a href="javascript:void(0)" onclick="sh();">more</a> </div>
<?php }?>  
</div>
<script>
function sh(){
	$('.ig_img').show();
	$('#v_m').hide();
}
</script>