<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php
header('Content-Type: text/html; charset=UTF-8');
header("Content-type: text/css");
header("Content-type: application/javascript"); 
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="language" content="en-us"/>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1,user-scalable=0">
<title><?php echo ucwords(strtolower($title_for_layout)); ?></title>
<meta name="description" content='<?php if (isset($page_meta)) { echo $page_meta['des']; } else { if (isset($web_SEO['Seo']['description'])) { echo $web_SEO['Seo']['description']; } } ?>'/>
<meta name="keywords" content="<?php if (isset($page_meta)) { echo $page_meta['key']; } else { if (isset($web_SEO['Seo']['keyword'])) { echo $web_SEO['Seo']['keyword']; } } ?>"/>
<meta property="og:site_name" content="Armytrix">
<meta property="og:url" content="<?php echo Router::url($this->here, true); ?>">
<meta property="og:type" content="website"/>
<meta property="og:title" content="<?php echo ucwords(strtolower($title_for_layout)); ?>">
<meta property="og:description" content='<?php if (isset($page_meta)) { echo $page_meta['des']; } else { if (isset($web_SEO['Seo']['description'])) { echo $web_SEO['Seo']['description']; }}?>'>
<?php if (isset($room_primary_image) && !empty($room_primary_image)) { ?>
<meta property="og:image" content="<?php echo $room_primary_image; ?>" />
<?php }else{ ?>
<meta property="og:image" content=""/>
<?php }?>
<meta property="og:locale" content="en_US">
<link rel="canonical" href="<?php echo Router::url($this->here, true); ?>"/>
<link rel="shortcut icon" href="<?php echo SITEURL; ?>favicon.ico" type="image/x-icon"/>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta http-equiv="imagetoolbar" content="false"/>
<meta name="distribution" content="Global"/>
<meta name="language" content="en-us"/>
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<?php
echo $this->Html->css(array( 'bootstrap.min.css', '/bootstrap_3_3_6/css/ui','/font-awesome/css/font-awesome.min'));
echo $this->Html->script(array('jquery.min.js','/bootstrap_3_3_6/js/bootstrap.min.js','magnific/jquery.magnific-popup.min'));

if(isset($IsMobile) && $IsMobile == 'yes'){ echo $this->Html->css(array('//fonts.googleapis.com/css?family=Titillium+Web:400,700,700italic,600,400italic','/bootstrap_3_3_6/css/ui')); }
else{ echo $this->Html->css(array('//fonts.googleapis.com/css?family=Roboto:400,300,500,900','theme','responsive','custom','stylesheet')); }
echo $this->Html->script(array());
echo $this->Js->writeBuffer(array('catch' => TRUE));
echo $scripts_for_layout;
?>
<script>
var SITEURL = '<?php echo SITEURL;?>';
</script>

</head>
<body itemscope itemtype="http://schema.org/WebPage">
<?php echo $this->element('header'); ?>
<div id="main_sec">
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
<a href="<?php echo SITEURL;?>"> back to the previous page</a>  <a href="<?php echo SITEURL;?>">Go to the Armytrix homepage </a><a href="<?php echo SITEURL;?>help">Visit the Help Center</a>
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
<?php echo $this->element('footer'); ?>

<?php //echo $this->element('sql_dump');   ?>
<style>
.not-found-txt{font-size:35px;display:block;line-height:28px;margin:40px 0 20px}
.not-found-txt-1{font-size:16px;line-height:20px;margin:20px 0;color:#333}
.not-found-back{margin:50px}
.not-found-back a{color:#3B5998!important;cursor:pointer;text-decoration:none;margin:20px}
.not-found-img img{height:232px;margin:16px}
.no-result{color:#3B5998;font-size:20px;display:block;line-height:28px;margin:40px 0 20px;text-align:center}
.no-result span{display:block;font-size:17px;font-style:italic;color:#333}

</style>
</body>
</html>