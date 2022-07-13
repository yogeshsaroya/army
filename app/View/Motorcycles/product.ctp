<?php
echo $this->html->script(['https://kit.fontawesome.com/acae9edaf3.js'], ['block' => 'scriptTop']);
?>
<?php $this->append('meta_data'); ?>
<?php $this->end(); ?>
<div id="preloader" style="display: none;">
    <div id="status">&nbsp;</div>
</div>
<?php $this->append('styleTop'); ?>
<style>
   iframe .ytp-chrome-top.ytp-show-cards-title{display:none!important}
.justify-content-center{margin:0 auto;display:table}
.justify-content-center .dropdown{font-family:'Oswald',sans-serif;background:#fff;font-size:14px}
.caret{color:#000}
.justify-content-center .caret{margin-left:10px}
.justify-content-center .dropdown-menu{width:137px;font-size:14px;z-index:9}
.justify-content-center .btn-primary{color:#fff}
.justify-content-center .btn-primary:hover{color:#fff}
.justify-content-center .dropdown-menu li a{font-weight:500}
.flags{text-align:left;background-color:#fff;right:0;left:unset}
.flags img{margin-right:10px;max-width:24px;width:24px}
.img_flag{max-width:24px;width:24px}
.flags li>a:hover{text-decoration:none;color:#000}
div#v2_motor_exh .slick-arrow{position:absolute;top:50%;height:60px;width:40px;left:-45px;transform:translateY(-50%);background:url(../v2/img/arrowControls.png) no-repeat 0 center;background-size:60px auto;z-index:9;opacity:.5}
div#v2_motor_exh .slick-arrow.slick-next{background:url(../v2/img/arrowControls.png) no-repeat right center;background-size:60px auto;left:auto;right:-45px;opacity:.5}
.mx-640{max-width:100%;padding:0;margin:auto}
#v2_motor_exh .mg-tb-50{margin:40px 0}
#v2_motor_exh .pad60{margin-top:60px}
#v2_motor_exh p{font-size:14px;font-weight:700}
.motor_container .sub_head_4,.motor_container .sub_head_5{margin:100px 0 50px}
#v2_motor_exh .head_1{margin-top:40px;margin-bottom:100px;text-transform:uppercase}
#v2_motor_exh h2.head_2{margin-top:40px;margin-bottom:40px}
#v2_motor_exh h2.head_3{margin:100px 0 40px}
.sub_head_1,.sub_head_2,.sub_head_3{margin:50px 0}
.sub_head_3 p{margin-bottom:50px}
.motor_container p{max-width:70%;display:inline-block}
#v2_motor_exh h2.head_5{margin-bottom:50px}
section.motor_container{max-width:80%;display:inline-block}
.fa{font-size:33px}
.fa_new{font-size:50px;margin:0 10px 5px 5px}
.ot_head{margin:70px 0 20px}
#v2_motor_exh .head_1,#v2_motor_exh .head_2{margin:0 30px}
#v2_motor_exh .container{width:100%!important;padding:0}
#v2_motor_exh h1.mt-3.text-center{padding:3rem 20px 0}
#v2_motor_exh .tabBtn.stainless.steel{background:#ff6624;color:#fff}
#v2_motor_exh .tabBtn.titanium{background:#0c59cf;color:#fff}
#v2_motor_exh .tabBtn{display:inline-block;padding:10px 14px 9px;margin:2px 0;font-size:12px;border-radius:4px;text-transform:uppercase;font-weight:900}
#v2_motor_exh input[type="button"]{display:inline-block;margin:0;border-radius:0;border:none;font-size:13px!important;line-height:20px!important;height:40px;color:#fff;padding:0 30px;border-radius:3px;-webkit-appearance:none;text-transform:uppercase;font-weight:900}
.pd{padding-bottom:20px}
.pd_100{padding-bottom:100px}
.pro_box{padding:10px 0}
.hr_red{padding:20px 0}
.video-responsive{overflow:hidden;padding-bottom:56.25%;position:relative;height:0}
.video-responsive iframe{left:0;top:0;height:100%;width:100%;position:absolute}
.pro_img{padding-right:20px}
.mx-640{padding:20px 0;max-width:720px;margin:auto}
.fullWidthImages>img,img{width:auto;max-width:100%;height:auto}
.pro_price{font-weight:900;margin-bottom:5px}
.pro-details div{font-weight:600}
.part_type{margin-bottom:10px}
.btn.btn-secondary{background-color:#c3c3c3;cursor:not-allowed;color:#000}

@media (max-width: 1024px) {
section.motor_container{max-width:80%}
.motor_container p{max-width:80%}
}
@media (max-width: 768px) {
#v2_motor_exh .head_1,#v2_motor_exh .head_2{margin:30px 15px}
#v2_motor_exh h2.head_3{margin:50px 10px;font-size:16px}
#v2_motor_exh .head_1{font-size:22px}
section.motor_container{max-width:90%}
.motor_container p{max-width:90%}
#v2_motor_exh .pad60{margin-top:10px}
#v2_motor_exh h2{font-size:22px}
#v2_motor_exh h3{font-size:18px}
#v2_motor_exh p{font-weight:500}
.app_pic{width:95%}
}
@media (max-width: 425px) {
#v2_motor_exh .head_1{font-size:14px}
#v2_motor_exh .head_1,#v2_motor_exh .head_2{margin:30px 10px}
.motor_container p{text-align:justify}
#v2_motor_exh h2{font-size:20px}
#v2_motor_exh h2.head_3{margin:50px 10px;font-size:12px}
#v2_main section{padding-bottom:0}
#v2_motor_exh .pad60{margin-top:0}
.motor_container .sub_head_5{margin:50px 0 10px}
.pd_100{padding-bottom:40px}
.pro_img { padding:0; margin: 0; }
}
@media (min-width: 768px) {
#v2_motor_exh .container{width:750px}
}
@media (min-width: 992px) {
#v2_motor_exh .container{width:970px}
}
@media (min-width: 1200px) {
#v2_motor_exh .container{width:1170px}
}
</style>
<?php $this->end(); ?>
<div id="v2_motor_exh">
    <h1 class="text-center mt-3 mb-5"><?php echo $data['Motorcycle']['title']; ?> ARMYTRIX VALVETRONIC EXHAUST SYSTEM</h1>
    <?php if (!empty($langArr)) { ?>
        <div class="justify-content-center">
            <div class="dropdown flags_menu">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-label="dropdown">
                    <img src='<?php echo SITEURL; ?>v2/flags/<?php echo $act_lng; ?>.svg' width='24' class='img-thumbnail img_flag' alt="flag">
                    <span class="caret"></span></button>
                <ul class="dropdown-menu flags">
                    <?php foreach ($langArr as $a => $b) {
                        echo "<li><a href='" . SITEURL . "motorcycle/$b' title=''><img src='" . SITEURL . "v2/flags/" . strtolower($a) . ".svg' width='24' clas='img-thumbnail' alt='flag'> $a</a></li>";
                    } ?>
                </ul>
            </div>
        </div>
    <?php } ?>
    <section class="motor_container">
        <div class="page_container">
            <?php if(!empty($slider))  { echo $this->element('v2/product_slider', ['slider' => $slider, 'width' => 720, 'height' => 750]); }?>
            <?php if (!empty($Adata['Video'][0])) { ?>
                <div class="videoWrapperNw page_container fullMxWd" id="pro_1">
                    <?php echo '<div class="video-responsive"><iframe id="home_bg_v" width="100%" height="600" loading="lazy" src="https://www.youtube-nocookie.com/embed/' . $Adata['Video'][0]['video'] . '?controls=1&enablejsapi=1&modestbranding=1&showinfo=0&iv_load_policy=3&html5=1&fs=1&rel=0&hl=en&cc_lang_pref=en&cc_load_policy=1&start=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>'; ?>
                </div>
            <?php } ?>
            <div class="videoWrapperNw page_container fullMxWd">
                <div class="pd_100"></div>
                <?php if (!empty($products)) {
                    foreach ($products as $product) {
                        $p = 'cdn/' . $product['Library']['full_path'];
                        $cImg = new_show_image($p, 800, 800, 100, 'ff', null); ?>
                        <div class="row pro_box">
                            <div class="col-md-7"> <img src="<?php echo $cImg; ?>" class="pro_img" alt="" loading="lazy" width="100%" height="auto"> </div>
                            <div class="col-md-5 text-left">
                                <div class="pro-details vertical-center">
                                    <h2>ARMYTRIX VALVETRONIC EXHAUST SYSTEM</h2>
                                    <h3><?php echo $product['Product']['title']; ?></h3>
                                    <div class="pd"></div>

                                    <div class="part_type"><span class="tabBtn <?php echo strtolower($product['Product']['material']); ?>"><?php echo strtoupper($product['Product']['material']); ?></span> # <?php echo $product['Product']['part']; ?></div>
                                    <div><?php echo nl2br($product['Product']['details']); ?></div>
                                    <div class="pd"></div>

                                    <?php if ($product['Product']['product_type'] == 1) { ?>
                                        <div class="part_type"><span class="tabBtn <?php echo strtolower($product['Product']['full_material']); ?>"><?php echo strtoupper($product['Product']['full_material']); ?></span> # <?php echo $product['Product']['full_part']; ?></div>
                                        <div><?php echo nl2br($product['Product']['full_details']); ?></div>
                                        <div class="pd"></div>
                                    <?php }
                                    if (isset($restricted) && $restricted == 1) { ?>
                                    <!-- Add to cart-->
                                        <div class="pro_price">
                                            <?php 
                                            if ($product['Product']['discount'] > 0) {
                                                $amount = $product['Product']['price'] -  ($product['Product']['price'] * $product['Product']['discount'] / 100);
                                                echo $p_price = "<strike>".$this->Number->currency($product['Product']['price'], 'USD') . "</strike> <spam class='text-danger'>" . $this->Number->currency($amount, 'USD') . "</spam>";
                                              } else { echo $this->Number->currency($product['Product']['price'], 'USD'); }
                                            
                                             ?></div>
                                        <input type="button" value="Add To Cart" class="btn btn-success ful-wd-btn" onclick="add_pro(<?php echo $product['Product']['id']; ?>)" id="shop_<?php echo $product['Product']['id']; ?>" />
                                        <div class="pd"></div>
                                    <?php } else { ?><a href="<?php echo SITEURL . 'contact?vehicle_type=motorcycle&make=' . $data['Motorcycle']['motorcycle_make_id'] . '&model=' . $data['Motorcycle']['motorcycle_model_id'] . '&year=' . $data['Motorcycle']['motorcycle_year_id']; ?>" class="btn btn-success ful-wd-btn"><?php echo gs($txt, 10); ?></a><?php } ?>
                                    
                                    <div>ARMYTRIX Weight : <?php echo $product['Product']['weight']; ?></div>
                                    <div>OEM Weight : <?php echo $product['Product']['oem_weight']; ?></div>
                                    <div class="pd"></div>

                                    <div><?php echo nl2br($product['Product']['description']); ?></div>
                                    <div class="pd"></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                <?php }
                } ?>
            </div>
        </div>
        <p class="hr_red"></p>
        <?php if (!empty($Adata['Video'])) { ?>
            <div class="videoWrapperNw page_container fullMxWd" id="pro_1">
                <?php $a = 1;
                foreach ($Adata['Video'] as $vlist) {
                    if ($a > 1) {
                        echo '<div class="video-responsive"><iframe id="home_bg_v" width="100%" height="600" loading="lazy" src="https://www.youtube-nocookie.com/embed/' . $vlist['video'] . '?controls=1&enablejsapi=1&modestbranding=1&showinfo=0&iv_load_policy=3&html5=1&fs=1&rel=0&hl=en&cc_lang_pref=en&cc_load_policy=1&start=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
                    }
                    $a++;
                } ?>
            </div>
        <?php } ?>

        <?php echo $this->element('pro/img_list', ['gallery' => $gallery]); ?>



        <div class="sub_head_1">
            <h2 class="mg-tb-50"><?php echo gs($txt, 79); ?></h2>
            <br>
            <h3><?php echo gs($txt, 80); ?></h3>
            <p><?php echo gs($txt, 81); ?></p>
        </div>
        <div class="sub_head_2">
            <h3><?php echo gs($txt, 82); ?></h3>
            <p><?php echo gs($txt, 83); ?></p>
        </div>
        <div class="sub_head_3">
            <h3><?php echo gs($txt, 84); ?></h3>
            <p><?php echo gs($txt, 85); ?></p>
            <div class="row mt-3 mobile50 app_pic">
                <div class="col-sm-6 text-center">
                    <img src="https://res.cloudinary.com/armytrix/image/upload/fl_progressive,c_scale,q_auto,w_1920/fl_progressive,c_scale,q_auto,w_300/v1651403044/product/product-app-1_sgfbbv.webp" loading="lazy" alt="App">
                </div>
                <div class="col-sm-6 text-center">
                    <img src="https://res.cloudinary.com/armytrix/image/upload/fl_progressive,c_scale,q_auto,w_1920/fl_progressive,c_scale,q_auto,w_300/v1651403044/product/product-app2_aevq7p.webp" loading="lazy" alt="App">
                </div>

            </div>
        </div>
        <div class="sub_head_4">
            <h3><?php echo gs($txt, 86); ?></h3>
            <p><?php echo gs($txt, 87); ?></p>
        </div>
        <img src="https://res.cloudinary.com/armytrix/image/upload/fl_progressive,c_scale,q_auto,w_1920/fl_progressive,c_scale,q_auto,w_980/v1652417585/motorcycle/image/bike_module_vfhnvr.webp" loading="lazy" alt="">


</div>
<br><br><br><br>
</section>

</div>
<?php //$this->Html->scriptStart(array('block' => 'scriptBottom')); 
?>
<script>
    function check_out(){
        window.location.href ='<?php echo SITEURL;?>cart';

    }
    function add_pro(id) {
        if (id != '') {
            $('#preloader').show();
            $.ajax({
                type: 'POST',
                url: '<?php echo SITEURL; ?>pages/add_to_cart',
                data: 'pid=' + id + '&q=1&get=product',
                success: function(data) {
                    $("#_my_cart").html(data);
                    setTimeout(function() {
                        //removeClass('btn-success ful-wd-btn').addClass('btn-secondary').prop("disabled",true);
                        
                        $("#shop_"+id).val('DONE, CHECKOUT').attr("onclick",'check_out()').off("click");
                        $('#preloader').hide();
                    }, 200);
                },
                error: function(comment) {
                    $("#_my_cart").html(data);
                    setTimeout(function() {
                        $('#preloader').hide();
                    }, 500);
                }
            });

        }
    }
</script>
<?php //$this->Html->scriptEnd(); 
?>