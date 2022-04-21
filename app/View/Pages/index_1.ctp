<div id="preloader" style="display: none"> <div id="status">&nbsp;</div> </div>
<?php 
if(isset($IsMobile) && $IsMobile == 'yes'){?>
<style>
#main_sec { margin-top: 6%;}

@media (max-width:767px){
	.bnr-arm-tx img{vertical-align:bottom;}
	body{background:#000 !important;}
#mobile-army-tx .links-tx > a {
    background: #2d2d2d;
    color: #fff !important;
    display: block;
    font-size: 17px !important;
    margin-bottom: 0;    
    border-bottom: 6px solid #000000;
    font-weight: bold;
}
#mobile-army-tx .links-tx > a{padding: 25px 20px;}

#mobile-army-tx .links-tx > a img{   
width: 50px;
vertical-align: middle;
margin-top: -5px;
margin-right: 15px;
}

#nav-army-mbl-frnd .btn-btn-links a{padding-left:10px; padding-right:10px;}

#nav-army-mbl-frnd .btn-btn-links a img {
    max-width: 145px;
}
}

</style>
<div id="mobile-army-tx">
<div class="bnr-arm-tx">
<?php 
$directory = "mob";
$images = glob($directory . "/*.jpg");
$imgArr = [];
foreach($images as $image) { $imgArr[] = $image; }
$random_keys=array_rand($imgArr,1);
if ( isset($imgArr[$random_keys]) ){
    echo "<img src='".SITEURL.$imgArr[$random_keys]."'>";    
}else{
    echo '<img src="'.SITEURL.'bootstrap_3_3_6/img/image-banner.jpg">';    
}
?>
<?php /*?>
<img src="<?php echo SITEURL;?>files/black_friday_sale.jpg">
<?php */?>
</div>
<div class="links-tx">
<a href="<?php echo SITEURL;?>product-exhaust"><img src="<?php echo SITEURL;?>v/army-trix_icon_1.png" alt=""> Exhaust system</a>
<a href="<?php echo SITEURL;?>shop"><img src="<?php echo SITEURL;?>v/army-trix_icon_2.png" alt=""> Shop</a>
<a href="<?php echo SITEURL;?>homes/sema"><img src="<?php echo SITEURL;?>v_4/sema_logo.png" alt=""> SEMA Sponsorship</a>
<a href="<?php echo SITEURL;?>contact"><img src="<?php echo SITEURL;?>v/army-trix_icon_3.png" alt=""/> Contact us</a>
</div>
<div class="col-sm-12" style="display: none">
<ul class="links-ul">
<li><a href="<?php echo SITEURL;?>blog">Tunning news </a></li>
<li><a href="<?php echo SITEURL;?>shop">Store </a></li>
<li><a href="<?php echo SITEURL;?>dealer">Dealers</a></li>
<li><a href="<?php echo SITEURL;?>contact">Contact us</a></li>
</ul>
</div>
</div>
<?php }else{?>
<div class="container">
<div class="padi-box border-btm">
<h1>ARMYTRIX OFFICIAL WEBSITE</h1>
<h3 class="ind-head">TRENDING NOW</h3>

<?php if(isset($v) && !empty($v)){?>
<div class="col-sm-8 col-md-8"> <?php /*?><p class="text-ind pad-lft">By following the creed of achieving the most power, superior sound and true versatility, we build supreme performance valvetronic exhaust systems that are second to none. All fostered by a culture of perseverance and innovation. ARMYTRIX not only creates exhausts, we create experiences.</p><?php */?>
<div class="upp-vote-bx">
  <div class="col-sm-7">
    <h3><?php echo $v['Vote']['title'];?></h3>
    <p><?php echo $v['Vote']['description'];?></p>
    <input type="hidden" value="<?php echo $v['Vote']['id']?>" id="vid">
  </div>
  <div class="col-sm-5" id="v_1">  
   <ul class="vote-bx">
<?php
if(isset($v_data)){
	$li = null;
	if(!empty($v['VoteOption'])){
		foreach ($v['VoteOption'] as $list1){ $op[$list1['id']] = $list1['vote_count']; }
		$t = array_sum ($op);
		foreach ($op as $k=>$v1){
			if($t > 0){ $pList[$k] = num_2( ($v1 * 100.0 / ($t)) ); }
			else{ $pList[$k] = 0;}
		}
		$m =  max($pList);
		foreach ($v['VoteOption'] as $list){
			$c = null;
			$p = $pList[$list['id']];
			if($m == $p) { $c = 'green-btn';}
			$im = null;
			if( !empty($list['image']) ){
				$im = '<img src="'.SITEURL."cdn/vote/".$list['image'].'"/>';
			}
			$li.='<li> <div class="percnt-box '.$c.'"> <div class="inpt-box"><span>'.$p.'%</span></div><div class="level-bx"><label for="">'.$list['title'].'</label> <div class="img-hvr"> '.$im.' </div></div> </div> </li>';
		}
		echo $li;
	}
	 } 
else{
if(!empty($v['VoteOption'])){
foreach ($v['VoteOption'] as $list){?>   
     <li>
      <div class="radio-boxs">
       <div class="inpt-box"><input type="radio" id="<?php echo $list['id'];?>" name="vote-value"></div>
        <div class="level-bx"><label for="<?php echo $list['id'];?>"><?php echo $list['title'];?></label>
        <?php if( !empty($list['image']) ){?>
         <div class="img-hvr" onclick="s(<?php echo $list['id'];?>)"><img src="<?php echo SITEURL."cdn/vote/".$list['image'];?>"/></div>
         <?php }?>
       </div>
    </div> 
<!---end of radio box--->
   
     </li>
     <div class="hover-img" id="imgs_<?php echo $list['id'];?>"><div class="img-cls-box"><div class="img-cls">+</div><img src="<?php echo SITEURL."cdn/vote/".$list['image'];?>"/> </div></div>
<?php }}}?>     
   </ul>
   <?php if(!isset($v_data)){?>
   <br>
   <input type="button" value="Vote" id="svote">   
<script type="text/javascript">



$(document).ready(function() { 
	$("#svote").click(function() {
		var vid = $('#vid').val();
		var id = $('input[type=radio][name=vote-value]:checked').attr('id');
		if( id != ''){
		$('#preloader').show();

		$.ajax({type: 'POST',
			url: ''+SITEURL+'pages/update_vote/',
			data: "vid="+vid+"&id="+id+"",
			success: function(data) { $('#preloader').hide(); $('#army_data').html(data); },
			error: function(comment) { $('#preloader').hide(); $('#army_data').html(comment); }});
		}
		
	});

		
	$('.vote-bx li').click(function() {

	    //console.log("Clicked");
	    $('.vote-bx li.active').removeClass('active');
	    $(this).addClass('active');
	});

	$('.img-cls , ul.vote-bx label , .inpt-box input').click(function() {
	    //console.log("Clicked");
	    $('.hover-img').addClass('hides');
	});

	$('.img-hvr img').click(function() {
	    //console.log("Clicked");
	    $('.hover-img').removeClass('hides');
	});
	
	
	
	
		
});

</script>   
<?php }?>   
  </div>
  
  
  
  <div class="col-sm-5" id="v_2">  
      
  </div>
  
<div class="clearfix"></div>
</div>
</div>
<?php }?>

<div class="clearfix"></div>
</div>
<div class="container items3 featured_posts">
<?php $getNewRelease = $this->Lab->getNewRelease();
if(!empty($getNewRelease)){
	foreach ($getNewRelease as $list){ 
	if(isset($list['Library']['full_path'])){
		$img = new_show_image("cdn/".$list['Library']['full_path'],342,228,100,'ff',null);
	}else{
		$img = new_show_image("cdn/no_image_available.jpg",342,228,100,'ff',null);
	}
		?>

<div class="col-sm-4 padi-box">
<div class="gallery_item_wrapper">
<a href="<?php echo $list['NewRelease']['link'];?>">
<img src="<?php echo $img;?>" alt="<?php echo $list['NewRelease']['title'];?>">
<span class="gallery_fadder"></span>
<span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
</a> </div>
<div class="links-pg"><a href="<?php echo $list['NewRelease']['link'];?>"><?php echo $list['NewRelease']['title'];?></a></div>
</div>
	
	<?php } } ?>

<div class="clearfix"></div>
</div>

<?php }?>
<div class="clearfix"></div>
<div id="army_data"></div>
<style>
 .upp-vote-bx{ text-align:center;}
 .upp-vote-bx > .col-sm-7 , .upp-vote-bx > .col-sm-5{box-sizing:border-box; padding:0 15px;}
 .upp-vote-bx > .col-sm-5{text-align:left; padding-left:25px;}
 
 .upp-vote-bx h3 {
    background: #00a760;
    color: #fff;
    text-align: left;
    padding: 3px 5px;
    font-size: 22px;
    
    line-height: 1.2;
    margin-bottom: 15px;
}
 
 .upp-vote-bx p {
    font-size: 14px;
    text-transform: uppercase;
    color: #00a760;
    
    text-align: left;
}

ul.vote-bx {
    width: 300px;
    position: relative;
}

.disply-none {
    display: none;
}

ul.vote-bx li > div:after{display:block; content:""; clear:both;}

.inpt-box {
    float: left;
}

.inpt-box span {
    display: block;
    /* height: 30px; */
    width: 55px;
    /* line-height: 30px; */
    background: black;
    color: #fff;
    
    font-size: 14px;
    padding: 10px 0;
	text-align:center;
}

.level-bx {
    width: 230px;
    float: left;
    text-align: left;
    margin-left: 5px;
}

.hover-img {  
    top: 115%;
    right: -108px;
    position: absolute;
    z-index: 55;       
	display: none;
}

.img-cls-box{position:relative;  width: 250px;  padding: 20px;  background: #fff;
    border: 2px solid #000; cursor:pointer;}
	
.img-cls{position: absolute;
    right: 5px;
    top: 5px;
    width: 25px;
    height: 25px;
    background: #b3b3b3;
    line-height: 25px;
    text-align: center;
    color: #fff;
    border-radius: 100%;
    font-size: 25px;
    transform: rotate(45deg);
    transform: rotate(45deg);}


ul.vote-bx {
    width: 300px;
    position: relative;
}

ul.vote-bx:after , ul.vote-bx li:after{clear:both; content:""; display:block;}
 ul.vote-bx li{padding:0;}

ul.vote-bx label {
    display: block;
    width: 80px;
    float: left;
    font-size: 13px;
    font-weight: 500;
    margin-top: 7px;
}

.img-hvr {
    float: left;
    margin-left: 15px;
    width: 40px;
    text-align: center;
    margin-top: 0;
	padding:1px;
	cursor:pointer;
}

.inpt-box input{margin-top: 13px;}

.green-btn .inpt-box span {background:#49b257;}
.green-btn label{color:#49b257;}
.vote-btn{background: #49b257;
    color: #fff;
    display: inline-block;
    margin: 20px 0 0 38px;
    
    text-transform: uppercase;
    font-size: 16px;
    letter-spacing: 0.5px;
    transition: all 600ms ease;
    -webkit-transition: all 600ms ease;
    padding: 5px 10px;
    border: 0;}
.vote-btn:hover{background:#4ccf5d;}
ul.vote-bx li.active + .hover-img {
    display: block;
}

.hides{display:none !important;}

@media (max-width:1400px){
	.hover-img {
    right: -10px;
	}
	
.img-cls-box {
    width: 400px;
}
}

@media (max-width:1200px){
	.hover-img {
    right: auto;
    left: 110px;
}
}

@media (max-width:990px){
	.upp-vote-bx > .col-sm-7, .upp-vote-bx > .col-sm-5{width:100%;}
	.upp-vote-bx > .col-sm-5{margin-top:30px;}
	.img-cls-box {
    width: 250px;
}
}

@media (max-width:767px){
	#main_sec .border-btm .col-sm-4 {
    border-right: 0;	
}

.upp-vote-bx > .col-sm-7, .upp-vote-bx > .col-sm-5{padding:0;}

#main_sec .border-btm .col-sm-4:after {position:relative; margin:40px 0 50px; width:150px; height:1px; background:rgba(0,0,0,0.15); content:""; display:block;}

#main_sec .upp-vote-bx p {
    font-size: 16px;
    color: #00a760 !important;
}

}

@media (max-width:580px){
	.hover-img {
    right: auto;
    left: 110px;
    position: static;
    margin: 15px 0;
}

ul.vote-bx , .img-cls-box {
    width: 100%;
    position: relative;
	max-width:100%;
}

.level-bx {
    width: 200px;
}
#main_sec .border-btm .col-sm-4::after {
    margin: 20px 0 30px;
}

}


</style>

