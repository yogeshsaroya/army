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

  <link rel="preload" href="<?php echo SITEURL; ?>css/bootstrap.min.css" as="style">
  <link rel="preload" href="<?php echo SITEURL; ?>bootstrap_3_3_6/css/ui.css" as="style">

  <?php echo $this->Html->css(array('bootstrap.min.css', '/bootstrap_3_3_6/css/ui.css','/v2/style.css?v='.rand(123,98745)));

  echo $this->Html->script(array('jquery.min.js', '/bootstrap_3_3_6/js/bootstrap.min.js', 'magnific/jquery.magnific-popup.min'));

  echo $this->html->css(array('animate'));
  echo $this->html->script(array('bootstrap-notify.min'));

  echo $this->Html->css(array('theme'));

  echo $this->Html->script(array());
  echo $this->Js->writeBuffer(array('catch' => TRUE));
  echo $scripts_for_layout;
  if (isset($IsMobile) && $IsMobile == 'yes') { ?>
    <style>
      
    </style>
  <?php }?>

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
      $("#army_cont, .army_cont").click(function() {
        $.magnificPopup.open({
          items: {
            src: '<?php echo SITEURL; ?>contact_for_product.php',
            type: 'ajax'
          },
          closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)"> X</button>',
          closeOnContentClick: false,
          closeOnBgClick: false,
          showCloseBtn: true,
          enableEscapeKey: false,
        });
      });
      $("#other_prodcut").click(function() {
        var url = $("#other_prodcut").attr("data_url");
        $.magnificPopup.open({
          items: {
            src: url,
            type: 'ajax'
          },
          closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)"> X </button>',
          closeOnContentClick: false,
          closeOnBgClick: false,
          showCloseBtn: true,
          enableEscapeKey: false,
        });
      });
    });
  </script>

  <?php

  if ($this->params['controller'] == 'pages' && $this->params['action'] == 'index_1') {

  ?>
    <!-- Global site tag (gtag.js) - Google Ads: 982355893 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-982355893"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'AW-982355893');
    </script>
    <?php }
  if ($this->params['controller'] == 'pages' && $this->params['action'] == 'product') {
    if (in_array($this->params['pass'][0], ['ford-mustang-gt-facelift', 'chevrolet-corvette-c8-stingray'])) { ?>
      <!-- Global site tag (gtag.js) - Google Ads: 982355893 -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=AW-982355893"></script>
      <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
          dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'AW-982355893');
      </script>
  <?php }
  } ?>
  <!-- Facebook Pixel Code -->
  <script>
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '402589941109602');
    fbq('track', 'PageView');
  </script>
  <noscript>
    <img height="1" width="1" src="https://www.facebook.com/tr?id=402589941109602&ev=PageView
&noscript=1" />
  </noscript>
  <!-- End Facebook Pixel Code -->
</head>
<body>
  <?php echo $this->element('v2/header'); ?>
  <div id="v2_main">
    <?php echo $this->fetch('content'); ?>
  </div>
  <?php 
  if ($this->params['controller'] == 'pages' && $this->params['action'] == 'home') {
    echo $this->element('v2/footer'); 
  }
  ?>

<script>
 $(document).ready(function(){	
	$(window).scroll(function(){
    if ($(this).scrollTop() > 10) {
       $('header').addClass('fixedHeader');
    } else {
       $('header').removeClass('fixedHeader');
    }
});
	// menu open js

	$('.openMenu').click(function(){
       $(this).hide('fast');
       $('.closeMenu').fadeIn('slow');
       $('body').addClass('openMenuBar');
	});
	$('.closeMenu').click(function(){
       $(this).hide('fast');
       $('.openMenu').fadeIn('slow');
       $('body').removeClass('openMenuBar');
	});
	

	$('.cartHead').click(function(){
       $(this).hide('fast');
       $('.closeCartMenu').fadeIn('slow');
       $('body').addClass('openCartBar');
	});
	$('.closeCartMenu').click(function(){
       $(this).hide('fast');
       $('.cartHead').fadeIn('slow');
       $('body').removeClass('openCartBar');
	});
});
</script>
</body>

</html>