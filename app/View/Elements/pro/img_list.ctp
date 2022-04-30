<?php if (isset($gallery) && !empty($gallery)) { ?>
    <div class="fullWidthImageWrap pad60">
        <?php foreach ($gallery as $gList) {
            $p = 'cdn/' . $gList['Library']['folder'] . "/" . $gList['Library']['file_name'];
            //$sImg = new_show_image($p, 200, 200, 100, 'cf', null); 
            ?>
            <div class="fullWidthImages posRltv container fullMxWd">
                <img src="<?php echo SITEURL.$p;?>" loading="lazy" alt="">
            </div>
        <?php } ?>
    </div>
<?php } ?>