<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php
//header('Content-Type: text/html; charset=UTF-8');
//header("Content-type: text/css");
//header("Content-type: application/javascript"); 
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta name="language" content="en-us" />
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1,user-scalable=0">
  <title><?php echo ucwords(strtolower($title_for_layout)); ?></title>
  <meta name="description" content="<?php if (isset($page_meta)) {
                                      echo htmlentities($page_meta['des']);
                                    } else {
                                      if (isset($web_SEO['Seo']['description'])) {
                                        echo htmlentities($web_SEO['Seo']['description']);
                                      }
                                    } ?>" />
  <meta name="keywords" content="<?php if (isset($page_meta)) {
                                    echo htmlentities($page_meta['key']);
                                  } else {
                                    if (isset($web_SEO['Seo']['keyword'])) {
                                      echo htmlentities($web_SEO['Seo']['keyword']);
                                    }
                                  } ?>" />
  <meta property="og:site_name" content="Armytrix - Automotive Weaponized">
  <meta name="distribution" content="Global" />
  <meta name="language" content="en-us" />
  <meta property="og:url" content="<?php echo Router::url($this->here, true); ?>">
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?php echo ucwords(strtolower($title_for_layout)); ?>">
  <meta property="og:description" content='<?php if (isset($page_meta)) {
                                              echo $page_meta['des'];
                                            } else {
                                              if (isset($web_SEO['Seo']['description'])) {
                                                echo htmlentities($web_SEO['Seo']['description']);
                                              }
                                            } ?>'>
  <?php if (isset($room_primary_image) && !empty($room_primary_image)) { ?>
    <meta property="og:image" content="<?php echo $room_primary_image; ?>" />
  <?php } else { ?>
    <meta property="og:image" content="" />
  <?php } ?>
  <meta property="og:locale" content="en_US">
  <link rel="canonical" href="<?php echo Router::url($this->here, true); ?>" />
  <link rel="shortcut icon" href="<?php echo SITEURL; ?>favicon.ico" type="image/x-icon" />
  <meta charset="utf-8" />
  <link rel="sitemap" type="application/xml" title="Sitemap" href="<?php echo SITEURL; ?>sitemap.xml" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta http-equiv="imagetoolbar" content="false" />
  <meta name="distribution" content="Global" />
  <meta name="language" content="en-us" />
  <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
  <META HTTP-EQUIV="Expires" CONTENT="-1">


  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Roboto&display=swap" rel="stylesheet">

<link rel="preload" href="<?php echo SITEURL; ?>css/bootstrap.min.css" as="style">  

  <?php echo $this->Html->css(array('bootstrap.min','theme', '/v2/style'));

  echo $this->Html->script(array('jquery.min.js', '/bootstrap_3_3_6/js/bootstrap.min.js', 'magnific/jquery.magnific-popup.min', 

));
  
  echo $this->fetch('cssTop');
  echo $this->fetch('script');

  echo $this->Js->writeBuffer(array('catch' => TRUE));
  echo $scripts_for_layout;
  ?>

  <script>
    var SITEURL = '<?php echo SITEURL; ?>';
    $(document).ready(function() {

      $('.image-popup-vertical-fit').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
          verticalFit: true
        }

      });
      $('.GnRespopAjax_cls').magnificPopup({
        type: 'ajax',
        closeOnContentClick: false,
        closeOnBgClick: false,
        closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)">X</button>'
      });
      $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        //disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: true,
        fixedContentPos: true
      });

      $('.popup-with-zoom-anim').magnificPopup({
        type: 'inline',
        fixedContentPos: false,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in',
        closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)">X</button>'
      });

    });
  </script>

</head>
<?php
if ($this->params['controller'] == 'homes') {
  if (in_array($this->params['action'], ['home'])) {
  }
} elseif ($this->params['controller'] == 'pages') {
  if (in_array($this->params['action'], ['home', 'product_exhaust'])) {
    $tran_header = 'yes';
  }
}

?>

<body <?php echo (isset($tran_header) ?  null : 'id="b_head"'); ?>>
  <?php echo $this->element('v2/header'); ?>
  <div id="v2_main">
    
<style>
h1{font-size:32px}
.sub_head{font-size:20px}
</style>

<div class="col-md-12">
<div class="fw_content_wrapper" id="pad-set-bd">

<div class="contentarea">

<div class="container">
    <div class="row">
        <div class="col-md-12 no_pad">
<section class="main-not-found text-center">
	<div class="bodurl">
	<span class="not-found-txt">Sorry, this page isn't available</span>
<span class="not-found-txt-1">The link you followed may be broken, or the page may have been removed.</span>
<div class="not-found-img">
<img src="<?php echo SITEURL;?>cdn/page-not-found.png" alt=""></div>
<div class="not-found-back">
<a href="<?php echo SITEURL;?>"> back to the previous page</a>  <a href="<?php echo SITEURL;?>">Go to the Armytrix homepage </a>

</div>
	</div>
	</section>
        </div>
    </div>
</div>

</div>
</div>
</div>
  </div>
  <?php
  if ($this->params['controller'] == 'pages' && $this->params['action'] == 'home') {
    echo $this->element('v2/footer');
  }
  ?>
  <script>
    $(document).ready(function() {
      var screenHeight = $(window).height();
      var linkHt = $('.serVicesLinks').outerHeight();
      var subTotalsht = $('.subTotals').outerHeight();
      $('.cartSideBar').css('padding-top', linkHt + <?php echo (isset($tran_header) ?  20 : 81); ?>).css('padding-bottom', subTotalsht + 20);

    });
  </script>
  <?php echo $this->fetch('scriptBottom'); ?>
</body>

</html>






<style>
.not-found-txt{font-size:35px;display:block;line-height:28px;margin:40px 0 20px}
.not-found-txt-1{font-size:16px;line-height:20px;margin:20px 0;color:#333}
.not-found-back{margin:50px}
.not-found-back a{color:#3B5998!important;cursor:pointer;text-decoration:none;margin:20px}
.not-found-img img{height:232px;margin:16px}
.no-result{color:#3B5998;font-size:20px;display:block;line-height:28px;margin:40px 0 20px;text-align:center}
.no-result span{display:block;font-size:17px;font-style:italic;color:#333}

</style>
