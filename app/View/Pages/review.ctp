<?php
echo $this->Html->css(['bootstrap4.3.1.min', "checkout", '//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'], ['block' => 'cssTop']);
echo $this->html->script(['jquery.form.min', '/v/formValidation.min', '/v/bootstrap.min', '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js'], ['block' => 'scriptTop']);
$note = null;
if (isset($checkOutArr['note'])) {
    $note = $checkOutArr['note'];
}
?>
<style>
    body {
        background: #eecda3 !important;
        background: -webkit-linear-gradient(to right, #000, #002600) !important;
        background: linear-gradient(to right, #000, #002600) !important;
    }

    .div_head h1,
    .div_head h3,
    .div_head h5 {
        color: #fff;
    }

    .div_no_item h1,
    .div_no_item h5 {
        color: #000;
    }

    .p-2.text-uppercase {
        font-weight: 900;
    }

    .py-2.text-uppercase {
        font-weight: 900;
        text-align: center;
    }

    tr .align-middle {
        text-align: center;
    }

    .text-left {
        text-align: left !important;
    }

    #new_review .pro_name {
        margin-bottom: 10px !important;
        font-weight: 800;
    }

    #new_review .pro_name a {
        font-weight: 400;
    }

    #new_review .full_part {
        margin-top: 10px;
    }

    .table-responsive tbody img {
        border: 0;
    }

    tbody tr {
        border-bottom: 1px solid #f2f2f2;
    }

    tbody tr td {
        padding-top: 20px !important;
    }

    .text-right {
        text-align: right;
    }

    .fifth-order-review .grid-right-sec {
        display: initial;
    }

    .pro_box_new {
        margin-bottom: 5px;
        margin-top: 5px;
        width: 100%;
        background-color: #fff;
    }

    .pro_box_new .pro_dt {
        margin: 20px 0;

    }

    .card {
        flex-direction: initial;
    }

    .card-img-top {
        border-top-left-radius: calc(0.25rem - 1px);
        border-top-right-radius: calc(0.25rem - 1px);
        height: 300px;
        width: auto;
        margin-left: auto;
        margin-right: auto;
        display: block;
    }

    #new_review .page_container {
        max-width: 1300px;
        width: 100%;
        padding: 0;
        margin-right: auto;
        margin-left: auto;
    }

    .part_no {
        margin-bottom: 10px;
    }
    .font-italic.mb-4{margin: 1.5rem 0 0 0; }
    h3.card-title { text-align: left;}
    .text-red, .text-red .text-muted{color: #a94442 !important}
    @media (min-width: 992px) and (max-width: 1245px) {
        .fifth-order-review .grid-right-sec {
            display: initial;
            margin: 5px 0 0;
            text-align: center;
        }
    }

    @media screen and (max-width:1400px) {
        #new_review .page_container {
            max-width: 80%
        }
    }

    @media (max-width: 1024px) {
        #new_review .page_container {
            max-width: 95%
        }
    }

    @media (max-width: 768px) {
        #new_review .page_container {
            max-width: 97%
        }

        .pro_box_new {
            margin-bottom: 15px;
            margin-top: 15px;
        }
    }

    @media (min-width: 768px) {
        .pro_box_new .col-md-6 {
            float: left;
        }
    }
</style>
<div id="preloader" style="display: none">
    <div id="status">&nbsp;</div>
</div>

<div class="px-lg-0" id="new_review">

    <div class="page_container text-white py-5 text-center div_head">
        <h1 class="display-4">Armytrix - Checkout</h1>
        <h3 class="lead mb-0">Please enter your details below to complete your purchase.</h3>
        <br>
        <h5><a href="<?php echo SITEURL; ?>" class="font-italic text-white"><u>Continue shopping</u></a></h5>
    </div>
    <div class="page_container">
        <div class="pb-5">

            <?php if (isset($all_pro) && !empty($all_pro)) { ?>
                <?php
                echo $this->Form->create(null, array('id' => 'reFrm', 'url' => array('controller' => 'pages', 'action' => 'pro_checkout')));
                $region = $country_list['CountryList']['region'];
                $bike_region = $country_list['CountryList']['bike_region'];
                $region_id = $country_list['CountryList']['id'];
                $iso = $country_list['CountryList']['iso2'];
                $shipping_discount = (float)$WebSetting['WebSetting']['shipping_discount'];

                $bike_shipping_cost = $shipping_cost = $discount = $warranty_amt = $total = $is_cateback = 0;
                $accessory = $a_downpipe = $a_catback = $final_warr = $a_bike = 0;
                $scost = $cids = $pro_id = [];
                foreach ($all_pro as $alist) {
                    if ($alist['Product']['type'] == 4 && $alist['Product']['id'] != 97) {
                        $scost[5][] = $alist['Cart']['quantity'];
                    } elseif ($alist['Product']['type'] == 4 && $alist['Product']['id'] == 97) {
                        $scost[4][] = $alist['Cart']['quantity'];
                    } elseif ($alist['Product']['type'] == 5) {
                        $scost[5][] = $alist['Cart']['quantity'];
                        $accessory = $accessory + $alist['Cart']['quantity'];
                    } elseif ($alist['Product']['type'] == 3) {
                        $scost[3][] = $alist['Cart']['quantity'];
                        $a_downpipe = $a_downpipe + $alist['Cart']['quantity'];
                    } elseif ($alist['Product']['type'] == 2) {
                        $scost[2][] = $alist['Cart']['quantity'];
                        $a_catback = $a_catback + $alist['Cart']['quantity'];
                    } elseif ($alist['Product']['type'] == 6) {
                        $scost[6][] = $alist['Cart']['quantity'];
                        $a_bike = $a_bike + $alist['Cart']['quantity'];
                        if (isset($country_list['CountryList']['zone']) && !empty($country_list['CountryList']['zone']) && isset($alist['Product']['box_size']) && !empty($alist['Product']['box_size'])) {
                            $b_c = $this->Lab->getBikeShipping($country_list['CountryList']['zone'], $alist['Product']['box_size']);
                            $bike_shipping_cost = $bike_shipping_cost + ($b_c * $alist['Cart']['quantity']);
                        }
                    }
                }
                /* Only Downpipe */
                if ($a_downpipe > 0 && $a_catback == 0) {
                    foreach ($all_pro as $alist) {
                        if ($alist['Product']['type'] == 3) {
                            $final_warr = $final_warr + num_2(($alist['Product']['price'] * 10 / 100) * $alist['Cart']['quantity']);
                        }
                    }
                }
                /* Only cat-back */ elseif ($a_downpipe == 0 && $a_catback > 0) {
                    foreach ($all_pro as $alist) {
                        if ($alist['Product']['type'] == 2) {
                            if (num_2($alist['Product']['price']) <= 3800) {
                                $final_warr = $final_warr + ($alist['Cart']['quantity'] * 199);
                            } else {
                                $final_warr = $final_warr + ($alist['Cart']['quantity'] * 299);
                            }
                        }
                    }
                } elseif ($a_downpipe > 0 && $a_catback > 0) {
                    $d_total = 0;
                    foreach ($all_pro as $alist) {
                        if ($alist['Product']['type'] == 2) {
                            $d_total = $d_total + num_2($alist['Cart']['quantity'] * $alist['Product']['price']);
                        } elseif ($alist['Product']['type'] == 3) {
                            $d_total = $d_total + num_2($alist['Cart']['quantity'] * $alist['Product']['price']);
                        }
                    }
                    if (num_2($d_total) <= 3800) {
                        $final_warr = $final_warr + 199;
                    } else {
                        $final_warr = $final_warr + 299;
                    }
                }

                /* * 2 - Cat-back * 3 - Down-pipe *  * */
                if (isset($scost[2]) && !empty($scost[2])) {
                    $pro_qty = array_sum($scost[2]);
                    $shipping_cost = $pro_qty * $country_list['CountryList']['catback'];
                    unset($scost);
                } elseif (isset($scost[3]) && !empty($scost[3])) {
                    $pro_qty = ceil(array_sum($scost[3]) / 3);
                    $shipping_cost = $pro_qty * $country_list['CountryList']['down_pipe'];
                    unset($scost);
                } elseif (isset($scost[4]) && !empty($scost[4])) {
                    $pro_qty = array_sum($scost[4]);
                    $shipping_cost = 1 * $country_list['CountryList']['owrc'];
                    unset($scost);
                } elseif (isset($scost[5]) && !empty($scost[5])) {
                    $pro_qty =  array_sum($scost[5]);
                    $shipping_cost = 1 * $country_list['CountryList']['fedex_pack'];
                    unset($scost);
                }
                $shipping_cost = $shipping_cost + $bike_shipping_cost;
                if ($shipping_discount > 0) {
                    $discount = num_2($shipping_cost * $shipping_discount / 100);
                }

                ?>
                <section style="background-color: #eee;">

                    <div class="row justify-content-center fifth-order-review">
                        <?php
                        $n = 1;
                        foreach ($all_pro as $list) {

                            if ($list['Product']['type'] == 2) {
                                $is_cateback++;
                            }
                            if ($list['Product']['quantity'] > 0) {
                                $p1 = $list['Product']['price'];
                                if ($list['Product']['discount'] > 0) {
                                    $p1 = $list['Product']['price'] -  ($list['Product']['price'] * $list['Product']['discount'] / 100);
                                }
                                $amt = num_2($list['Cart']['quantity'] * $p1);
                                $total += $amt;
                                $cids[] = $list['Cart']['id'];
                                $pro_id[] = $list['Product']['id'];
                            }
                            $url = 'javascript:void(0);';
                            if ($list['Product']['type'] == 4) {
                                $url = SITEURL . "shop/" . $list['Product']['slug'];
                            } elseif ($list['Product']['type'] == 6) {
                                $getBikeURL = $this->Lab->getMotorcycleURL($list['Product']['motorcycle_make_id'], $list['Product']['motorcycle_model_id'], $list['Product']['motorcycle_year_id']);
                                $url = SITEURL . "motorcycle/" . $getBikeURL;
                            } elseif (in_array($list['Product']['type'], array(2, 3, 5))) {
                                $getCarURL = $this->Lab->getCarURL($list['Product']['brand_id'], $list['Product']['model_id'], $list['Product']['motor_id']);
                                $url = SITEURL . "product/" . $getCarURL;
                            }

                            $pImg = new_show_image('cdn/no_image_available.jpg', 500, 500, 100, 'ff', null);
                            if ($list['Product']['type'] == 1) {
                                $ima = json_decode($list['Product']['images'], true);
                                if (isset($ima[0]) && !empty($ima[0])) {
                                    $pImg = new_show_image('cdn/cdnimg/' . $ima[0], 500, 500, 100, 'ff', null);
                                }
                            } elseif ($list['Product']['type'] == 4) {
                                $abc = explode(',', $list['Product']['extra_photos']);
                                $get_path = null;
                                if (isset($abc[0]) && !empty($abc[0])) {
                                    $get_path = $this->Lab->getImage($abc[0]);
                                }
                                if (isset($get_path)) {
                                    $pImg = new_show_image('cdn/' . $get_path, 500, 500, 100, 'ff', null);
                                } else {
                                    $pImg = new_show_image('cdn/no_image_available.jpg', 500, 500, 100, 'ff', null);
                                }
                            } else {
                                if (isset($list['Product']['Library']['full_path']) && !empty($list['Product']['Library']['full_path'])) {
                                    $pImg = new_show_image('cdn/' . $list['Product']['Library']['full_path'], 500, 500, 100, 'ff', null);
                                }
                            }

                        ?>
                            <div class="col-xl-4col-lg-6col-sm-6 pro_box_new">
                                <div class="card11 text-black">
                                    <div class="col-md-6 pro_img">
                                        <i class="fa fa-hashtag fa-lg pt-3 pb-1 px-3"><?php echo $n; ?></i>
                                        <a href="<?php echo $url; ?>" title="" target="_blank"><img src="<?php echo $pImg; ?>" class="card-img-top" alt="" height="200px" /></a>
                                    </div>
                                    <div class="col-md-6 pro_dt">
                                        <div class="text-center">
                                            <h3 class="card-title"><?php echo $list['Product']['title'] . (!empty($list['Cart']['size']) ? " " . $list['Cart']['size'] : null); ?></h3>
                                            <p class="text-muted mb-4"></p>
                                        </div>
                                        <div>
                                            <?php if (!empty($list['Product']['part'])) {
                                                if ($list['Product']['type'] == 6) { ?>

                                                    <div class="d-flex justify-content-between part_no"><span>Part Number </span><span>
                                                            <div class="grid-right-sec abtpro"><span><?php echo $list['Product']['part']; ?></span></div>
                                                        </span></div>
                                                    <div class="d-flex justify-content-between"><span>Material Type </span><?php if ($list['Product']['material'] == 'stainless steel + carbon') {
                                                                                                                                echo '<div class="grid-right-sec abtpro stainless_steel"><span>stainless steel + carbon</span></div>';
                                                                                                                            } elseif ($list['Product']['material'] == 'titanium') {
                                                                                                                                echo '<div class="grid-right-sec abtpro titanium"><span>Titanium</span></div>';
                                                                                                                            } ?></div>

                                                    <?php if ($list['Product']['product_type'] == 1) { ?>
                                                        <hr>
                                                        <div class="d-flex justify-content-between part_no"><span>Part Number #2 </span><span>
                                                                <div class="grid-right-sec abtpro"><span><?php echo $list['Product']['full_part']; ?></span></div>
                                                            </span></div>
                                                        <div class="d-flex justify-content-between"><span>Material Type #2 </span><?php if ($list['Product']['full_material'] == 'stainless steel + carbon') {
                                                                                                                                        echo '<div class="grid-right-sec abtpro stainless_steel"><span>stainless steel + carbon</span></div>';
                                                                                                                                    } elseif ($list['Product']['full_material'] == 'titanium') {
                                                                                                                                        echo '<div class="grid-right-sec abtpro titanium"><span>Titanium</span></div>';
                                                                                                                                    } ?></div>
                                                    <?php } ?>

                                                <?php } else { ?>
                                                    <div class="d-flex justify-content-between part_no"><span>Part Number </span><span>
                                                            <div class="grid-right-sec abtpro"><span><?php echo $list['Product']['part']; ?></span></div>
                                                        </span></div>
                                                    <div class="d-flex justify-content-between"><span>Material Type </span><?php if ($list['Product']['material'] == 'stainless steel') {
                                                                                                                                echo '<div class="grid-right-sec abtpro stainless_steel"><span>Stainless steel</span></div>';
                                                                                                                            } elseif ($list['Product']['material'] == 'titanium') {
                                                                                                                                echo '<div class="grid-right-sec abtpro titanium"><span>Titanium</span></div>';
                                                                                                                            } ?></div>
                                                <?php } ?>

                                            <?php } ?>
                                        </div>
                                        <hr>
                                        <div>
                                            <div class="d-flex justify-content-between"><span>Quantity</span><span>#<?php echo $list['Cart']['quantity']; ?></span></div>
                                            <div class="d-flex justify-content-between"><span>Price </span><span><?php if ($list['Product']['discount'] > 0) {
                                                                                                                        echo new_currency($list['Product']['price'], $p1);
                                                                                                                    } else {
                                                                                                                        echo currency($list['Product']['price']);
                                                                                                                    } ?></span></div>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between total font-weight-bold mt-4"><span>Sub Total</span><span><?php echo currency($p1 * $list['Cart']['quantity']); ?></span></div>
                                    </div>
                                </div>
                            </div>
                        <?php $n++;
                        } ?>
                    </div>

                </section>

                <?php /* ?>
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5 fifth-order-review">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Product</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Details</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Quantity</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Price</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Subtotal</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($all_pro as $list) {

                                        if ($list['Product']['type'] == 2) {
                                            $is_cateback++;
                                        }
                                        if ($list['Product']['quantity'] > 0) {
                                            $p1 = $list['Product']['price'];
                                            if ($list['Product']['discount'] > 0) {
                                                $p1 = $list['Product']['price'] -  ($list['Product']['price'] * $list['Product']['discount'] / 100);
                                            }
                                            $amt = num_2($list['Cart']['quantity'] * $p1);
                                            $total += $amt;
                                            $cids[] = $list['Cart']['id'];
                                            $pro_id[] = $list['Product']['id'];
                                        }
                                        $url = 'javascript:void(0);';
                                        if ($list['Product']['type'] == 4) {
                                            $url = SITEURL . "shop/" . $list['Product']['slug'];
                                        } elseif ($list['Product']['type'] == 6) {
                                            $getBikeURL = $this->Lab->getMotorcycleURL($list['Product']['motorcycle_make_id'], $list['Product']['motorcycle_model_id'], $list['Product']['motorcycle_year_id']);
                                            $url = SITEURL . "motorcycle/" . $getBikeURL;
                                        } elseif (in_array($list['Product']['type'], array(2, 3, 5))) {
                                            $getCarURL = $this->Lab->getCarURL($list['Product']['brand_id'], $list['Product']['model_id'], $list['Product']['motor_id']);
                                            $url = SITEURL . "product/" . $getCarURL;
                                        }

                                        $pImg = new_show_image('cdn/no_image_available.jpg', 200, 200, 100, 'ff', null);
                                        if ($list['Product']['type'] == 1) {
                                            $ima = json_decode($list['Product']['images'], true);
                                            if (isset($ima[0]) && !empty($ima[0])) {
                                                $pImg = new_show_image('cdn/cdnimg/' . $ima[0], 200, 200, 100, 'ff', null);
                                            }
                                        } elseif ($list['Product']['type'] == 4) {
                                            $abc = explode(',', $list['Product']['extra_photos']);
                                            $get_path = null;
                                            if (isset($abc[0]) && !empty($abc[0])) {
                                                $get_path = $this->Lab->getImage($abc[0]);
                                            }
                                            if (isset($get_path)) {
                                                $pImg = new_show_image('cdn/' . $get_path, 200, 200, 100, 'ff', null);
                                            } else {
                                                $pImg = new_show_image('cdn/no_image_available.jpg', 200, 200, 100, 'ff', null);
                                            }
                                        } else {
                                            if (isset($list['Product']['Library']['full_path']) && !empty($list['Product']['Library']['full_path'])) {
                                                $pImg = new_show_image('cdn/' . $list['Product']['Library']['full_path'], 200, 200, 100, 'ff', null);
                                            }
                                        }
                                    ?>
                                        <tr>
                                            <td scope="row" class="border-0">
                                                <div class="p-2"><a href="<?php echo $url; ?>" title="" target="_blank">
                                                        <img src="<?php echo $pImg; ?>" alt="" width="150" height="150" class="img-fluid rounded shadow-sm"></a>
                                                </div>
                                            </td>
                                            <td class="border-0 text-left">
                                                <div class="ml-3 d-inline-block text-left">
                                                    <h5 class="mb-0 pro_name"><a href="<?php echo $url; ?>" title="" target="_blank"><?php echo $list['Product']['title'] . (!empty($list['Cart']['size']) ? " " . $list['Cart']['size'] : null); ?></a></h5>
                                                    <span class="text-muted font-weight-normal font-italic d-block">
                                                        <?php if (!empty($list['Product']['part'])) {
                                                            if ($list['Product']['type'] == 6) { ?>
                                                                <div>
                                                                    <?php if ($list['Product']['material'] == 'stainless steel + carbon') {
                                                                        echo '<div class="grid-right-sec abtpro stainless_steel"><span>stainless steel + carbon</span></div>';
                                                                    } elseif ($list['Product']['material'] == 'titanium') {
                                                                        echo '<div class="grid-right-sec abtpro titanium"><span>Titanium</span></div>';
                                                                    } ?>
                                                                    <div class="grid-right-sec abtpro"><span><?php echo $list['Product']['part']; ?></span></div>
                                                                </div>
                                                                <?php if ($list['Product']['product_type'] == 1) { ?>
                                                                    <div class="pt_20 full_part">
                                                                        <?php if ($list['Product']['full_material'] == 'stainless steel + carbon') {
                                                                            echo '<div class="grid-right-sec abtpro stainless_steel"><span>stainless steel + carbon</span></div>';
                                                                        } elseif ($list['Product']['full_material'] == 'titanium') {
                                                                            echo '<div class="grid-right-sec abtpro titanium"><span>Titanium</span></div>';
                                                                        } ?>
                                                                        <div class="grid-right-sec abtpro"><span><?php echo $list['Product']['full_part']; ?></span></div>
                                                                    </div>
                                                                <?php } ?>
                                                            <?php } else {
                                                                if ($list['Product']['material'] == 'stainless steel') {
                                                                    echo '<div class="grid-right-sec abtpro stainless_steel"><span>Stainless steel</span></div>';
                                                                } elseif ($list['Product']['material'] == 'titanium') {
                                                                    echo '<div class="grid-right-sec abtpro titanium"><span>Titanium</span></div>';
                                                                } ?>
                                                                <div class="grid-right-sec abtpro"><span><?php echo $list['Product']['part']; ?></span></div>
                                                        <?php }
                                                        } ?>

                                                    </span>
                                                </div>
                                            </td>
                                            <td class="border-0 align-middle"><?php echo $list['Cart']['quantity']; ?></td>
                                            <td class="border-0 align-middle"><?php
                                                                                if ($list['Product']['discount'] > 0) {
                                                                                    echo new_currency($list['Product']['price'], $p1);
                                                                                } else {
                                                                                    echo currency($list['Product']['price']);
                                                                                } ?></td>
                                            <td class="border-0 align-middle"><?php echo currency($p1 * $list['Cart']['quantity']); ?></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php */ ?>

                <?php

                $warranty_amt = 0;
                $net_total = ($total + $shipping_cost) - $discount;
                $gt_total = num_2($net_total + $warranty_amt);
                ?>
                <div class="row py-5 p-4 bg-white rounded shadow-sm">
                    <div class="col-lg-6">
                        <div class="form-group"><label for="cmnts" class="font-weight-bold">Comments</label> <textarea class="form-control" id="note" rows="6" name='note' placeholder="If you have any question regarding to the custom value declaration of the goods you've purchased, please contact sales@armytrix.com or leave message in your order message board. Otherwise we will ship the goods value as it is."><?php echo $note; ?></textarea></div>
                        
                        <?php if ($a_downpipe > 0 || $a_catback > 0) { ?>
                        <div class="form-group <?php if ($a_downpipe > 0 || $a_catback > 0) { echo 'required'; } ?>"><label for="vin" class="control-label">VIN Number</label> <input type="text" name="vin_number" class="form-control" <?php if ($a_downpipe > 0 || $a_catback > 0) { echo 'required="required"'; } ?> maxlength="17"></div>
                        <?php }else{ ?> <input type="hidden" name="vin_number" id="vin_number" value=""/> <?php }?>

                        <div class="form-group"><label><input type="checkbox" required="required" name="tnc" id='tnc' value="1"> I have read and agree to <a href="<?php echo SITEURL . "terms_and_conditions"; ?>" target="_blank"><b>the Armytrix Online Store Terms & Conditions. </b></a></label></div>
                        <div class="form-group"><label><input type="checkbox" required="required" name="tnc2" id='tnc2' value="1"> I have read and understand the return policy from the Armytrix Online Store Terms & Conditions, I will be refunded in full to my original form of payment, excluding the cost of delivery, cost of returning product(s), and cost of 5% PayPal refund processing fee.</label></div>
                        <div class="form-group"><label><input type="checkbox" required="required" name="tnc3" id='tnc3' value="1"> I have verified that the product(s) selected is comaptible with my car model. I understand and agree that in the event that I wish to cancel my order because the product(s) turned out to be incompatible, there will be a 5% refund charge by PayPal</label></div>


                    </div>
                    <div class="col-lg-6">
                        <div class="bg-light px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                        <div>
                            <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><span class="price" id="_total_amount"><?php echo currency($total); ?></span></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling (+)</strong><span class="price" id="_shipping_cost"><?php echo currency($shipping_cost);; ?></span></li>
                                <li class="d-flex justify-content-between py-3 border-bottom text-red"><strong class="text-muted">Shipping Fee Discount (-)</strong><span class="price" id="_shipping_discount">-<?php echo currency($discount); ?></span></li>
                                <?php if ($a_downpipe > 0 || $a_catback > 0) { ?>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted"><div class="form-group "><label>Warranty Extension <input type="checkbox" name="warranty_extension_check" id='warranty_extension_check'><i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="An additional warranty of one year can be purchased upon selecting this option"></i></label></div></strong><span class="price" id="_warranty"><?php echo currency($warranty_amt); ?></span></li>
                                <?php }?>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Grand Total</strong><strong><h5 class="font-weight-bold"><span class="price" id="_ngt"><?php echo currency($gt_total); ?></span></h5></strong></li>
                            </ul>

                            <?php
                            if ($a_downpipe > 1 || $a_catback > 1) {
                                echo "<br><div class='alert alert-danger'>Please note you can order only 1 cat-back and/or 1 downpipe per order. If you want to order more than one, please submit two separate orders.</div><br>";
                            } else { ?>
                                <?php $plist = implode(',', $cids);
                                $pro_ids = implode(',', $pro_id); ?>
                                <input type="hidden" name="total_amount" id="total_amount" value="<?php echo num_2($total); ?>">
                                <input type="hidden" name="shipping_cost" id="shipping_cost" value="<?php echo num_2($shipping_cost); ?>">
                                <input type="hidden" name="discount" id="discount" value="<?php echo $discount; ?>">
                                <input type="hidden" name="shipping_discount" id="shipping_discount" value="<?php echo $shipping_discount; ?>">
                                <input type="hidden" name="import_duty" id="import_duty" value="0">
                                <input type="hidden" name="vat" id="vat" value="0">
                                <input type="hidden" name="eur" id="eur" value="0">

                                <input type="hidden" name="warranty_extension" id="warranty_extension" value="<?php echo num_2($warranty_amt); ?>">
                                <input type="hidden" name="est_warranty_extension" id="est_extension" value="<?php echo num_2($final_warr); ?>">

                                <input type="hidden" name="grand_total" id="grand_total" value="<?php echo num_2($gt_total); ?>">

                                <input type="hidden" name="cid" id="cid" value="<?php echo $plist; ?>">
                                <input type="hidden" name="pid" id="pid" value="<?php echo $pro_ids; ?>">

                                <input type="hidden" name="region" id="region" value="<?php echo $region; ?>">
                                <input type="hidden" name="bike_region" id="bike_region" value="<?php echo $bike_region; ?>">
                                <input type="hidden" name="iso" id="iso" value="<?php echo $iso; ?>">
                                <input type="hidden" name="first_name" value="<?php echo $shipping['Order']['first_name']; ?>">
                                <input type="hidden" name="last_name" value="<?php echo $shipping['Order']['last_name']; ?>">
                                <input type="hidden" name="email" value="<?php echo $shipping['Order']['email']; ?>">
                                <input type="hidden" name="phone" value="<?php echo $shipping['Order']['phone']; ?>">

                                <input type="hidden" name="shipping_company" value="">
                                <input type="hidden" name="shipping_address" value="">
                                <input type="hidden" name="shipping_address_2" value="">
                                <input type="hidden" name="shipping_city" value="">
                                <input type="hidden" name="shipping_zip" value="">
                                <input type="hidden" name="shipping_country" value="<?php echo $shipping['Order']['shipping_country']; ?>">
                                <input type="hidden" name="country_list_id" value="<?php echo $shipping['Order']['country_list_id']; ?>">
                                <input type="hidden" name="shipping_state" value="<?php echo $shipping['Order']['shipping_state']; ?>">

                                <input type="hidden" name="billing_company" value="">
                                <input type="hidden" name="billing_address" value="">
                                <input type="hidden" name="billing_address_2" value="">
                                <input type="hidden" name="billing_city" value="">
                                <input type="hidden" name="billing_zip" value="">
                                <input type="hidden" name="billing_country" value="">
                                <input type="hidden" name="billing_country_id" value="">
                                <input type="hidden" name="billing_state" value="">

                                <input type="hidden" name="payment_by" value="paypal">
                                <div class="form-group">
                                    <p class="bnk-trns-add _r_info">Note : On checkout, page will be redirected to the PayPal website to process payment.</p>
                                </div>
                                <div id="_ch_err"></div>
                                <div class="submit-btn pull-right">
                                    <button id="_do_chk">
                                        <span class="grnd-total"><span class="set-txxt">Grand Total</span> <span class="totl-value" id="_gt"><?php echo currency($gt_total); ?></span></span>
                                        <span class="plc-order">Place Order</span>
                                    </button>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {

                        $('[data-toggle="tooltip"]').tooltip();


                        $("#warranty_extension_check").change(function() {
                            if (this.checked) {
                                var gt = parseFloat($("#grand_total").val());
                                var est_extension = parseFloat($("#est_extension").val());
                                var fgt = gt + est_extension;
                                $("#warranty_extension").val(est_extension);
                                $("#grand_total").val(fgt);
                                $("#_warranty").html('USD $' + est_extension);
                                $("#_ngt").html('USD $' + fgt);
                                $("#_gt").html('USD $' + fgt);

                            } else {
                                var gt = parseFloat($("#grand_total").val());
                                var est_extension = parseFloat($("#est_extension").val());
                                var fgt = gt - est_extension;
                                $("#warranty_extension").val(0);
                                $("#grand_total").val(fgt);
                                $("#_warranty").html('USD $0.00');
                                $("#_ngt").html('USD $' + fgt);
                                $("#_gt").html('USD $' + fgt);
                            }
                        });

                        $('.pmt_radio').on('change', function() {
                            if (this.value == 'paypal') {
                                $('._r_info').hide();
                                $('#paypal_info').show();
                            } else if (this.value == 'cc') {
                                $('._r_info').hide();
                                $('#cc_info').show();
                            }
                        });

                        $('#reFrm').formValidation({
                            framework: 'bootstrap',
                            icon: {},
                            err: {},
                            fields: {
                                'payment_by': {
                                    validators: {
                                        notEmpty: {
                                            message: 'Please select your payment method.'
                                        }
                                    }
                                },
                                'tnc': {
                                    validators: {
                                        notEmpty: {
                                            message: 'Please read and agree to the Armytrix Online Store Terms & Conditions.'
                                        }
                                    }
                                },
                                'tnc2': {
                                    validators: {
                                        notEmpty: {
                                            message: 'please accept terms and conditions.'
                                        }
                                    }
                                },
                                'tnc3': {
                                    validators: {
                                        notEmpty: {
                                            message: 'please accept terms and conditions.'
                                        }
                                    }
                                },
                            }
                        }).on('success.form.fv', function(e) {
                            e.preventDefault();
                            var $form = $(e.target),
                                fv = $form.data('formValidation');
                            fv.defaultSubmit();
                        }).on('err.form.fv', function(e) {
                            var fv = $(e.target).data('formValidation');
                            var $firstInvalidField = fv.getInvalidFields()[0];
                            $('html,body').animate({
                                scrollTop: $("#" + $firstInvalidField['id']).offset().top - 200
                            }, 'slow');
                        });

                        $('#_do_chk').click(function() {
                            $("#reFrm").ajaxForm({
                                target: '#_ch_err',
                                beforeSubmit: function() {
                                    $('#_do_chk').prop("disabled", true);
                                    $('#preloader').show();
                                },
                                success: function(response) {
                                    $('#preloader').hide();
                                },
                                error: function(response) {
                                    $('#_do_chk').prop("disabled", false);
                                    $('#preloader').hide();
                                },
                            }).submit();
                        });
                    });
                </script>
            <?php echo $this->Form->end();
            } else { ?>
                <div class="row py-5 p-4 bg-white rounded shadow-sm div_no_item">
                    <div class="col-lg-12">
                        <br><br>
                        <center>
                            <h1>Your shopping cart is empty!</h1>
                            <h5><a href="<?php echo SITEURL; ?>" class="font-italic"><u>Continue shopping</u></a></h5>
                        </center>
                        <br><br>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>