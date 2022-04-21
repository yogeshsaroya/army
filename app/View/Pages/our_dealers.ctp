<section id="page" class="html not-front not-logged-in no-sidebars page-node page-node- page-node-200 node-type-page i18n-en section-dealers"> <!-- page start -->
<div id="spacer"></div> <!-- banner will print with its container if content exists inside of this region on the appropriate pages -->
<div class="clear"></div>
  <section class="main black"> <!-- main start -->
    <section class="wrapper"> <!-- wrapper start -->
      <section class="inner"> <!-- content start -->
        <div id="map" style="width: 100%; height: 500px"></div>
        <div class="clear"></div> <!-- clear -->
      </section> <!-- content end -->
    </section> <!-- wrapper end -->
  </section> <!-- main end -->

  <div id="yellow-grad"></div> <!-- clear -->

  <section class="main white"> <!-- main start -->
    <section class="wrapper"> <!-- wrapper start -->
      <section class="inner"> <!-- content start -->
     
                
        
        <a id="main-content"></a>
         <div class="hd-txt-arm">
          <div class="col-sm-6">
               <h1 class="title" id="page-title">EXCLUSIVE DEALERS</h1>
          <p id="tagl">If you would like to locate a shop around your area for installation, please contact your exclusive dealer</p>     
          </div>
          <br><br>
               
          
          <div class="col-sm-6">            
            <a class="btn btn-success btn-select btn-select-light">
                <input type="hidden" class="btn-select-input" id="" name="" value="" />
                <span class="btn-select-value">Select Country</span>
                <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
                <ul id="co">
                    <li id="" class="selected">All</li>
                    <?php if(isset($co) && !empty($co)){ foreach ($co as $k=>$v){
                    	echo "<li id='".strtolower(Inflector::slug($v, '-'))."'>$v</li>";}}?>
                </ul>
            </a>
        </div>
 <div class="clearfix"></div>       
</div>
<article class="node-200 node node-page view-mode-full clearfix">
</article>
<div id="block-views-dealer-table-block" class="block block-views last even">
<div class="view view-dealer-table view-id-dealer_table view-display-id-block ">
  <?php if(isset($data) && !empty($data)){
  	$n = 1;
  	
  	foreach ($data as $list){ 
  	$c = 'views-row-odd';
  	if( $n % 2 == 0){ $c = 'views-row-even'; }
  		?>
<div class="view-content co_<?php echo strtolower(Inflector::slug($list['OurDealer']['country'], '-'));?>" id="<?php echo $list['OurDealer']['id'];?>">
<div class="views-row views-row-1 <?php echo $c;?> views-row-first">
<article class="node-202 node node-dealer node-teaser clearfix">
<header><h2 class="node__title node-title"><a href="<?php echo SITEURL."pages/view_dealer/".$list['OurDealer']['id'];?>" class="GnRespopAjax_cls" id="<?php echo $list['OurDealer']['id'];?>"><?php echo $list['OurDealer']['title'];?></a></h2></header>
<div id="node-dealer-teaser-group-dealer" class="group-dealer field-group-div">
<div class="field field-name-field-dealer-address field-type-text field-label-hidden">
<div class="field-items"><div class="field-item even"><?php echo $list['OurDealer']['address'];?></div></div></div>
<div class="field field-name-field-dealer-location field-type-text field-label-hidden">
<div class="field-items"><div class="field-item even"><?php echo $list['OurDealer']['email'];?></div></div></div>
<div class="field field-name-field-dealer-country field-type-text field-label-hidden"><div class="field-items">
<div class="field-item even"><?php echo $list['OurDealer']['phone'];?></div></div></div>
<div class="field field-name-field-dealer-phone-number field-type-text field-label-hidden">
<div class="field-items"><div class="field-item even"><?php echo $list['OurDealer']['country'];?></div></div></div>
<div class="field-type-text field-label-hidden"><div class="field-items">
<div class="field-item even field field-name-field-geolocation"><?php echo $list['OurDealer']['lat'].", ".$list['OurDealer']['lang'];?></div></div></div></div>
</article>
</div>
</div>  		
  	<?php $n++;} }?>
<div class="view-content1"></div>
</div>
</div>
</section></section></section>
</section>                        
<style>
.wrapper{width:100%;margin:auto;max-width:1300px;padding:0 50px}
a{font-size:1em;text-decoration:none;line-height:1;margin:0;-webkit-transition:all .2s ease;-moz-transition:all .2s ease;-ms-transition:all .2s ease;-o-transition:all .2s ease;transition:all .2s ease}
a:hover{-webkit-transition:all 0 ease;-moz-transition:all 0 ease;-ms-transition:all 0 ease;-o-transition:all 0 ease;transition:all 0 ease}
#page p{font-size:1em;line-height:1.5;margin:0;float:left;width:100%;text-align:justify}
h1,h1 a{text-transform:uppercase;letter-spacing:-2px;font-size:2em;margin:0;padding:0;line-height:1;width:100%;float:left;text-decoration:none;-webkit-transition:all .2s ease;-moz-transition:all .2s ease;-ms-transition:all .2s ease;-o-transition:all .2s ease;transition:all .2s ease;-webkit-font-smoothing:subpixel-antialiased}
h2,h2 a{text-transform:uppercase;letter-spacing:0;font-size:1.4em;margin:0;padding:0;line-height:1;width:100%;float:left;text-decoration:none;-webkit-transition:all .2s ease;-moz-transition:all .2s ease;-ms-transition:all .2s ease;-o-transition:all .2s ease;transition:all .2s ease;-webkit-font-smoothing:subpixel-antialiased}
h3,h3 a{text-transform:uppercase;letter-spacing:0;font-size:1.2em;margin:0;padding:0;line-height:1;width:100%;float:left;text-decoration:none;-webkit-transition:all .2s ease;-moz-transition:all .2s ease;-ms-transition:all .2s ease;-o-transition:all .2s ease;transition:all .2s ease;-webkit-font-smoothing:subpixel-antialiased}
h1 a:hover,h2 a:hover,h3 a:hover{text-decoration:underline;-webkit-transition:all 0 ease;-moz-transition:all 0 ease;-ms-transition:all 0 ease;-o-transition:all 0 ease;transition:all 0 ease}
h4{margin:0;padding:0}
#page-title{margin:.25em 0}
.main.black{background:#000}
.main.black .wrapper{max-width:100%;padding:0}
.black h1,.black h1 a,.black h1 a:hover,.black h2,.black h2 a,.black h2 a:hover,.black h3,.black h3 a,.black h3 a:hover,.black p,.black p a:hover,.black a,.black a:hover{color:#fff}
.main.white{background:#fff}
.flex-nav-container{margin:0}
.views-slideshow-slide-counter{display:none}
.yellow-text{color:#ffc61e}
.page-node-38 #page-title,.page-node-39 #page-title{display:none}
.page-node-2 .flexslider{margin:0}
.page-node-2 .flex-control-nav{display:none}
.page-node-2 article.node{float:left}
.page-node-2 .inner .field-name-body p{float:none;margin:0 0 1em}
.ie :focus{outline:0;border:0}
.ie .commerce-add-to-cart .attribute-widgets .chzn-container-single .chzn-single span{padding:.15em 0 0}
.ie .button-container{display:none}
.ie #cart-sidecart-container{display:block}
.ie .commerce-add-to-cart .attribute-widgets .form-type-select a.chzn-single{background:transparent!important}
.win option{color:#000}
.page-node-200 #map{float:left;width:100%;height:600px}
.page-node-200 #spacer{display:none}
.page-node-200 .inner{position:relative}
.page-node-200 .gm-style-iw h2{color:#000}
.page-node-200 .gm-style-iw p{color:#000}
.page-node-200 .view-dealer-table{float:left;width:100%;color:#000}
.page-node-200 .view-dealer-table .node-dealer{float:left;width:100%;padding:.75em;text-align:left}
.field-item{font-size:14px;font-weight:500}

.page-node-200 .view-dealer-table .group-dealer{float:left;width:80%}
.page-node-200 .view-dealer-table .node-title{float:left;width:20%;font-weight:600;font-size:12px}
.page-node-200 .view-dealer-table .node-title a{text-transform:none;font-weight:600;letter-spacing:0}
.page-node-200 .view-dealer-table .field-name-field-dealer-address{width:40%}
.page-node-200 .view-dealer-table .field-name-field-dealer-location{width:25%}
.page-node-200 .view-dealer-table .field-name-field-dealer-phone-number{text-align:right;width:15%}
.page-node-200 .view-dealer-table .field-name-field-dealer-country{text-align:center;width:20%}
.page-node-200 .view-dealer-table .field{float:left}
.page-node-200 .view-dealer-table ul.links{display:none}
.page-node-200 h3,.page-node-200 #spacer,.page-node-200 .field-name-field-geolocation,.page-node-200 .field-name-field-dealer-website{display:none}
.node-type-dealer #dealer-location{float:left;width:100%;height:310px}
.node-type-dealer article{float:left;width:100%}
.node-type-dealer #page-title{width:50%;float:right;padding:.75em 0 0 1em}
.node-type-dealer .group-tableft1{margin:-2.25em 0 0;float:left;width:50%}
.node-type-dealer .group-tabright1{float:left;width:50%;padding-left:2em}
.node-type-dealer .group-tabright1 .field{line-height:1.5}
.node-type-dealer .group-tabright1 .field a{text-decoration:underline;line-height:1.5}
.node-type-dealer h3,.node-type-dealer #spacer,.node-type-dealer .field-name-field-geolocation,.node-type-dealer .field-name-field-dealer-website{display:none}
.hd-txt-arm #page-title{margin:.25em 0;font-size:35px;text-align:left;margin:20px 0}
.hd-txt-arm .col-sm-6{padding:0!important;float:left;width:50%}
.hd-txt-arm .btn-select{position:relative;padding:0;min-width:236px;width:100%;border-radius:0;max-width:300px;margin:20px 0;float:right;border-color:green;border-width:1px;border-style:solid}
.btn-select .btn-select-value{padding:6px 12px;display:block;position:absolute;left:0;right:30px;text-align:left;text-overflow:ellipsis;overflow:hidden;border-top:none!important;border-bottom:none!important;border-left:none!important;vertical-align:middle;line-height:22px}
.btn-select .btn-select-arrow{float:right;line-height:22px;padding:6px 10px;top:0;background:green;transition:all 300ms ease;-webkit-transition:all 300ms ease}
.btn-select .btn-select-arrow:hover{background:#046e04}
.btn-select ul{display:none;background-color:#fff;color:#000;clear:both;list-style:none;padding:0;margin:0;border-top:none!important;position:absolute;left:-1px;right:-1px;top:33px;z-index:999}
.btn-select ul li{padding:3px 6px;text-align:left}
.btn-select ul li:hover{background-color:#f4f4f4}
.btn-select ul li.selected{color:#fff}
.btn-select.btn-default:hover,.btn-select.btn-default:active,.btn-select.btn-default.active{border-color:#ccc}
.btn-select.btn-default ul li.selected{background-color:#ccc}
.btn-select.btn-default ul,.btn-select.btn-default .btn-select-value{background-color:#fff;border:#ccc 1px solid}
.btn-select.btn-default:hover,.btn-select.btn-default.active{background-color:#e6e6e6}
.btn-select.btn-primary:hover,.btn-select.btn-primary:active,.btn-select.btn-primary.active{border-color:#286090}
.btn-select.btn-primary ul li.selected{background-color:#2e6da4;color:#fff}
.btn-select.btn-primary ul{border:#2e6da4 1px solid}
.btn-select.btn-primary .btn-select-value{background-color:#428bca;border:#2e6da4 1px solid}
.btn-select.btn-primary:hover,.btn-select.btn-primary.active{background-color:#286090}
.btn-select.btn-success:hover,.btn-select.btn-success:active,.btn-select.btn-success.active{border-color:green}
.btn-select.btn-success ul li.selected{background-color:green;color:#fff}
.btn-select.btn-success ul{border:green 1px solid;margin-top:2px}
.btn-select.btn-success .btn-select-value{background-color:green;border:green 1px solid}
.btn-select.btn-success:hover,.btn-select.btn-success.active{background-color:#449d44}
.btn-select.btn-info:hover,.btn-select.btn-info:active,.btn-select.btn-info.active{border-color:#46b8da}
.btn-select.btn-info ul li.selected{background-color:#46b8da;color:#fff}
.btn-select.btn-info ul{border:#46b8da 1px solid}
.btn-select.btn-info .btn-select-value{background-color:#5bc0de;border:#46b8da 1px solid}
.btn-select.btn-info:hover,.btn-select.btn-info.active{background-color:#269abc}
.btn-select.btn-warning:hover,.btn-select.btn-warning:active,.btn-select.btn-warning.active{border-color:#eea236}
.btn-select.btn-warning ul li.selected{background-color:#eea236;color:#fff}
.btn-select.btn-warning ul{border:#eea236 1px solid}
.btn-select.btn-warning .btn-select-value{background-color:#f0ad4e;border:#eea236 1px solid}
.btn-select.btn-warning:hover,.btn-select.btn-warning.active{background-color:#d58512}
.btn-select.btn-danger:hover,.btn-select.btn-danger:active,.btn-select.btn-danger.active{border-color:#d43f3a}
.btn-select.btn-danger ul li.selected{background-color:#d43f3a;color:#fff}
.btn-select.btn-danger ul{border:#d43f3a 1px solid}
.btn-select.btn-danger .btn-select-value{background-color:#d9534f;border:#d43f3a 1px solid}
.btn-select.btn-danger:hover,.btn-select.btn-danger.active{background-color:#c9302c}
.btn-select.btn-select-light .btn-select-value{background-color:#fff;color:#000}
.views-row:after{position:relative;display:block;clear:both;content:""}
.view-content1{margin-bottom:80px}
#yellow-grad{height:4px;width:100%;float:left;background:green;background:-moz-linear-gradient(left,green 41%,#000 100%);background:-webkit-gradient(linear,left top,right top,color-stop(41%,green),color-stop(100%,#000));background:-webkit-linear-gradient(left,green 41%,#000 100%);background:-o-linear-gradient(left,green 41%,#000 100%);background:-ms-linear-gradient(left,green 41%,#000 100%);background:linear-gradient(to right,green 41%,#000 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffc61e',endColorstr='#000000',GradientType=1)}
@media only screen and (min-width:750px) and (max-width:999px) {
.wrapper{width:100%;padding:0 1em}
}
@media (max-width:979px) {
#main_sec a{font-weight:600}
.main.black{background:#000;margin-top:-100px;padding-top:50px}
}
@media (max-width:767px) {
.main.black{background:#000;margin-top:-50px;padding-top:40px}
}
@media (max-width:480px) {
.main.black{background:#000;margin-top:-50px;padding-top:40px}
}
@media only screen and (max-width:480px) {
.wrapper{width:100%;padding:0 1em}
.page-node-135 #tile-container{margin:0}
.page-node-200 #map{height:200px}
.page-node-200 #buttons{float:left;width:100%;position:relative;margin-bottom:1em}
.page-node-200 .field-name-field-dealer-address,.page-node-200 .field-name-field-dealer-location,.page-node-200 .field-name-field-dealer-phone-number{display:none}
.page-node-200 .view-dealer-table .group-dealer{width:65%}
.page-node-200 .view-dealer-table .node-title{width:35%}
.page-node-200 .view-dealer-table .field{width:100%;text-align:right}
.node-type-dealer #dealer-location{height:150px}
.node-type-dealer #page-title{width:100%;float:left;padding:0}
.node-type-dealer .group-tabright1{width:100%;padding:1em 0 0}
.node-type-dealer .group-tableft1{width:100%;padding:0;margin:0}
}
@media only screen and (min-width:481px) and (max-width:749px) {
.wrapper{width:100%;padding:0 1em}
.page-node-135 #tile-container{margin:0}
.page-node-200 #map{height:300px}
.page-node-200 .field-name-field-dealer-address,.page-node-200 .field-name-field-dealer-location{display:none}
.page-node-200 .view-dealer-table .group-dealer{width:65%}
.page-node-200 .view-dealer-table .node-title{width:35%}
.page-node-200 .view-dealer-table .field{width:50%;text-align:right}
.node-type-dealer #dealer-location{height:200px}
.node-type-dealer #page-title{width:100%;float:left;padding:0}
.node-type-dealer .group-tabright1{width:100%;padding:1em 0 0}
.node-type-dealer .group-tableft1{width:100%;padding:0;margin:0}
}
@media (max-width:480px) {
.hd-txt-arm .btn-select{min-width:236px;width:100%;border-radius:0;max-width:100%;margin:0 0 20px;float:right}
.hd-txt-arm .col-sm-6{padding:0!important;float:none;width:100%}
}
.view-content:nth-child(even) {
    background: #cbcbcb;
}
</style>
 
  <script type="text/javascript" src="//maps.google.com/maps/api/js?key=AIzaSyBLkYy4R-x5LPjsp4eIkKedbyavJoRzs4A"></script>
  
  
    <script>
    /**
    * Interactive map with markers for each dealer's location.
    *
    * Uses information in DOM for dealers and
    * Google Maps API to display map
    */
    var map,
    geocoder,
    infowindow = new google.maps.InfoWindow(),
    center = new google.maps.LatLng(20, -10),
    initialZoom = 2;

    function initialize()
    {
       /**
        * attachInfoWindow() binds InfoWindow to a Marker 
        * Creates InfoWindow instance if it does not exist already 
        * @extends Marker
        * @param InfoWindow options
        * @author Esa 2009
        */
       google.maps.Marker.prototype.attachInfoWindow = function(options) {
         var map_ = this.getMap();
         map_.bubble_ = map_.bubble_ || new google.maps.InfoWindow();
         google.maps.event.addListener(this, 'click', function () {
           map_.bubble_.setOptions(options);
           map_.bubble_.open(map_, this);
         });
         map_.infoWindowClickShutter = map_.infoWindowClickShutter || 
         google.maps.event.addListener(map_, 'click', function() {
           map_.bubble_.close();
         });
       }

       /**
        * accessInfoWindow()
        * @extends Map
        * @returns {InfoWindow} reference to the InfoWindow object instance
        * Creates InfoWindow instance if it does not exist already 
        * @author Esa 2009
        */
       google.maps.Map.prototype.accessInfoWindow = function() {
         this.bubble_ = this.bubble_ || new google.maps.InfoWindow();
         return this.bubble_;
       }
       
       var mapOptions = {
          zoom: initialZoom,
          center: center,
          panControl: false,
          zoomControl: false,
          mapTypeControl: false,
          scrollwheel: false,
          scaleControl: false,
          maxZoom: 8,
          minZoom: 2,
          streetViewControl: false,
          overviewMapControl: false,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          backgroundColor: "#000"
       };
     
        // Define styles for map
       var style = [
          { 
             stylers: [
                { visibility: 'simplified' }, { gamma: 1 }, { weight: 0.5 }
             ]
          }, {
             featureType: 'landscape',
             elementType: 'geometry.fill',
             stylers: [
                { saturation: -100 }
             ]
          }, {
             featureType: 'administrative',
             elementType: 'geometry.stroke',
             stylers: [
                { visibility: 'off' }
             ]
          }, {
             featureType: 'administrative.province',
             elementType: 'geometry.stroke',
             stylers: [
                { visibility: 'on' }, { weight: 1 }
             ]
          }, {
             featureType: 'administrative.locality',
             elementType: 'labels.text',
             stylers: [
                { visibility: 'on' }
             ]
          }, {
             featureType: 'administrative.country',
             elementType: 'geometry.stroke',
             stylers: [
                { visibility: 'on' }
             ]
          }, {
            featureType: 'water',
            elementType: 'fill',
            stylers: [
              { color: '#000000' }, { hue: "#000" }, {lightness: 0 }, { fillOpacity: 0 }
            ]
          }
       ];

       // Create map
       geocoder = new google.maps.Geocoder();
       map = new google.maps.Map(document.getElementById('map'), mapOptions);
       var mapType = new google.maps.StyledMapType(style, { name:"Grayscale" });
       map.mapTypes.set('grayscale', mapType);
       map.setMapTypeId('grayscale');
       
       /**
       * Loop through dealer table to get information
       * about markers and content for info boxes
       */
       var i = 0;
       var marker = [];
       jQuery(".views-row").each(function() {
          var title = jQuery(this).find(".node-title").text();
          var link = jQuery(this).find("a").attr('href');
          var address1 = jQuery(this).find(".field-name-field-dealer-address").text();
          var address2 = jQuery(this).find(".field-name-field-dealer-location").text();
          var country = jQuery(this).find(".field-name-field-dealer-country").text();
          var phone = jQuery(this).find(".field-name-field-dealer-phone-number").text();
          var latLang = jQuery(this).find(".field-name-field-geolocation").text();
          
          var infoWindowContent = "<a href='javascript:void(0);'><h2>"+title+"</h2><p>"+address1+"<br>"+address2+"<br>"+country+"<br>"+phone+"<p></a>";
          
          marker[i] = new google.maps.Marker({
             position: new google.maps.LatLng(latLang.split(",")[0], latLang.split(",")[1]),
             map: map,
             animation: google.maps.Animation.DROP,
             title: title,
          });
          marker[i].attachInfoWindow({content: infoWindowContent});
          
          // zoom in on marker when clicked
          google.maps.event.addListener(marker[i], 'click', function() {
             map.panTo(this.getPosition());
             map.setZoom(8);
          });
          
          i++;
       });
       
       if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
          positionMap();
          mobileScroll();
       }
    }
    jQuery("#map").click(function() {
       map.set('scrollwheel', true);
    });
       
    /**
    * Disables draggable property of
    * google map until tapping on map
    */
    function mobileScroll() {
       map.set('draggable', false);

       Hammer(document.getElementById("map")).on('tap', function() {
          map.set('draggable', true);
       });
    }
    /**
    * Recenters the map on mobile devices
    * with North America as center
    */
    function positionMap() {
       var center = new google.maps.LatLng(43, -97.03125);
       map.set('center', center);
    }

    // Initalize map
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    
    
    
<script>
  
  $(document).ready(function () {

	  
	  $( "#co li" ).click(function() {
		  if( this.id == ''){ $('.view-content').show(); }
		  else{ $('.view-content').hide();
		  $('.co_'+this.id).show(); 
		  }
		  
		});
	  
    $(".btn-select").each(function (e) {
        var value = $(this).find("ul li.selected").html();
        if (value != undefined) {
            $(this).find(".btn-select-input").val(value);
            $(this).find(".btn-select-value").html(value);
        }
    });
});

$(document).on('click', '.btn-select', function (e) {
    e.preventDefault();
    var ul = $(this).find("ul");
    if ($(this).hasClass("active")) {
        if (ul.find("li").is(e.target)) {
            var target = $(e.target);
            target.addClass("selected").siblings().removeClass("selected");
            var value = target.html();
            $(this).find(".btn-select-input").val(value);
            $(this).find(".btn-select-value").html(value);
        }
        ul.hide();
        $(this).removeClass("active");
    }
    else {
        $('.btn-select').not(this).each(function () {
            $(this).removeClass("active").find("ul").hide();
        });
        ul.slideDown(300);
        $(this).addClass("active");
    }
});

$(document).on('click', function (e) {
    var target = $(e.target).closest(".btn-select");
    if (!target.length) {
        $(".btn-select").removeClass("active").find("ul").hide();
    }
});
 
</script>   