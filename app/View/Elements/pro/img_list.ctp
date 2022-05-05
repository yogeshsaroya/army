<div class="fullWidthImageWrap pad60">
    <?php if (isset($gallery) && !empty($gallery)) { ?>
        <?php foreach ($gallery as $gList) {
            $p = 'cdn/' . $gList['Library']['folder'] . "/" . $gList['Library']['file_name']; ?>
            <div class="fullWidthImages posRltv container fullMxWd">
                <img src="<?php echo SITEURL . $p; ?>" alt="">
            </div>
        <?php }  } ?>
</div>