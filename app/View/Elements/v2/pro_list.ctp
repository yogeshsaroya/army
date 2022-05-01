<?php if(!empty($pro_data)){?>
<div class="add-bx-sel">
    <h2>CAT-BACK VALVETRONIC EXHAUST </h2>
    <div class="col-md-9 no-pad">
        <div class="add-bx-drop-dwn">

            <div class="new-pro-drdwn">
                <button  type="button" id="p_1">--- Catalytic Converter Replacement Selections ---</button>
                <ul  id="cat_back_ul" style="display: none;">
                    <li id="c0" pid="none" p_amt="0" data_img="" full_img=""><a href="javascript:void(0);">Select</a></li>
                    <?php foreach ($pro_data as $cList) {
                        $p = 'cdn/' . $cList['Library']['full_path'];
                        $cImg = new_show_image($p, 100, 100, 100, 'ff', null);
                    ?>
                        <li class="<?php if ($cList['Product']['quantity'] == 0) {
                                        echo 'disable-itm';
                                    } ?>" qut="<?php echo $cList['Product']['quantity']; ?>" id="<?php echo $cList['Product']['id']; ?>" pid="<?php echo $cList['Product']['id']; ?>" p_amt="<?php echo $cList['Product']['price']; ?>" data_img="<?php echo $cImg; ?>" full_img="<?php echo SITEURL . $p; ?>"><a href="javascript:void(0);">
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

    <div class="col-md-3">
        <div class="add-bx-snap">
            <div class="center">
                <div class="input-group"> <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number snp-btn" disabled="disabled" data-type="minus" data-field="cat_back[1]"> <span class="glyphicon glyphicon-minus"></span> </button></span>
                    <input type="text" name="cat_back[1]" class="form-control input-number" value="1" min="1" max="5" id="cat_b_q" readonly="readonly">
                    <span class="input-group-btn"><button type="button" class="btn btn-default btn-number snp-btn" data-type="plus" data-field="cat_back[1]"> <span class="glyphicon glyphicon-plus"></span> </button></span>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"> </div>
</div>

<div class="productBx" id="cat_pic_id">

<!--
<div class='proImg'><img src="https://www.armytrix.com/cdn/800_530_100_ff_cdn/product-nissan-gtr-titanium/2017-nissan-gtr-r35-armytrix-titanium-exhaust-tuning-price-for-sale-08.jpg" alt="images" loading="lazy" /></div>
<ul class="tabBtn d-flex"><li><a href="#">NI35S-DDC</a></li><li><a href="#" class="stanSteel">STAINLESS STEEL</a></li></ul>
<p class="text-left">High-flow Performance De-catted Down-Pipe with Cat Simulator</p>
-->

</div>

<?php }?>