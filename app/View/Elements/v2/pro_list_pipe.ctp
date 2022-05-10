<?php if (!empty($pro_data)) { ?>
    <div class="add-bx-sel w_f">
        <h2><?php echo gs($txt,5);?></h2>
        <div class="col-md-12 no-pad">
            <div class="add-bx-drop-dwn">
                <div class="new-pro-drdwn">
                    <button class="" type="button" id="p_2">--- <?php echo gs($txt,8);?> ---</button>
                    <ul class="" id="ecu_ul" style="display: none;">
                        <li id="c0" pid="none" p_amt="0" data_img="" full_img=""><a href="javascript:void(0);">Select</a></li>
                        <?php foreach ($pro_data as $cList) {
                            $p = 'cdn/' . $cList['Library']['full_path'];
                            $cImg = new_show_image($p, 100, 100, 100, 'ff', null);
                        ?>
                            <li class="<?php if ($cList['Product']['quantity'] == 0) {
                                            echo 'disable-itm';
                                        } ?>" qut="<?php echo $cList['Product']['quantity']; ?>" id="<?php echo $cList['Product']['id']; ?>" pid="<?php echo $cList['Product']['id']; ?>" p_amt="<?php echo $cList['Product']['price']; ?>" data_img="<?php echo $cImg; ?>" full_img="<?php echo SITEURL . $p; ?>" data_part="<?php echo $cList['Product']['part']; ?>" data_material="<?php echo $cList['Product']['material']; ?>" data_abt="<?php echo addslashes($cList['Product']['description']); ?>"><a href="javascript:void(0);">
                                    <div class="part_m">
                                        <h4><?php echo $cList['Product']['part']; ?></h4>
                                    </div>
                                    <?php $mat_type = null;
                                    if ($cList['Product']['material'] == 'stainless steel') {
                                        $mat_type = '<div class="part_m"><h4 class="grid-right-sec abtpro stainless_steel">Stainless steel</h4></div>';
                                    } elseif ($cList['Product']['material'] == 'titanium') {
                                        $mat_type = '<div class="part_m"><h4 class="grid-right-sec abtpro titanium">Titanium</h4></div>';
                                    }
                                    echo $mat_type; ?><div class="clearfix"></div>
                                    <?php echo $cList['Product']['description']; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="drp-img" id="cat_pic_id"></div>
        </div>
        <div class="clearfix"> </div>
    </div>

    <div class="productBx" id="ecu_pic_id"></div>
<?php } ?>