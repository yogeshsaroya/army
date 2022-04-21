<?php 
if(!isset($IsMobile)){ echo $this->element('pc_header'); }
else{ ?>
<div id="_my_cart" style="display: none"></div>
<div class="fixed-head">
    <div id="mobile-heade_army">
      <div class="logo"><a href="<?php echo SITEURL;?>"><img src="<?php echo SITEURL."img/logo.png"?>"> </a></div>
    </div>

<div class="m_cart"><a href="<?php echo SITEURL;?>cart" id="mob_cart_img">
<?php if ( count($getAll) > 0 ){?><img alt="" src="<?php echo SITEURL;?>ui/cart_1.png" > 
<?php }else{?> <img alt="" style="max-width: 64px" src="<?php echo SITEURL;?>ui/cart.png" ><?php }?></a></div>
    
</div>   

<?php }?>    
