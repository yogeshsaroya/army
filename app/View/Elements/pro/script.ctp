<?php echo $this->Html->css(["/v2/css-loader"], ['block' => 'cssTop']); ?>
<div id="cssLoader"></div>
<?php $this->Html->scriptStart(array('block' => 'scriptBottom')); ?>
    function addcart() {
        $('#e_err').html('');
        var cat_id = $('#cat_id').val();
        var cat_id_q = $('#cat_id_q').val();
        var ecu_id = $('#ecu_id').val();
        var ecu_id_q = $('#ecu_id_q').val();
        var accessory_id = $('#accessory_id').val();
        var accessory_b_q = $('#accessory_b_q').val();
        if (cat_id != '' || ecu_id != '' || accessory_id != '') {
            var q = $('#ext_pro_q').val();
            $("#cssLoader").html('<div id="loader" class="loader loader-default is-active"></div>');
            $.ajax({
                type: 'POST',
                url: '<?php echo SITEURL; ?>pages/add_to_cart',
                data: 'cat_id=' + cat_id + '&cat_id_q=' + cat_id_q + '&ecu_id=' + ecu_id + '&ecu_id_q=' + ecu_id_q + '&accessory_id=' + accessory_id + '&accessory_b_q=' + accessory_b_q + '&get=exhaust',
                success: function(data) {
                    $("#_my_cart").html(data);
                    $("#chk_btn").html('<a href="<?php echo SITEURL;?>cart" class="cartBtn fullWidth">DONE, CHECKOUT</a>');
                    setTimeout(function() {
                        $("#cssLoader").html('');
                    }, 500);
                },
                error: function(comment) {
                    $("#_my_cart").html(data);
                    setTimeout(function() {
                        
                        $('#preloader').hide();
                    }, 500);
                }
            });
        } else {
            $('#e_err').html('<p class="text_red">Please Select A Product</p>');
        }
    }
    $(document).click(function(e) {

        if (e.target.id != 'p_1') {
            $("#cat_back_ul").hide();
        }
        if (e.target.id != 'p_2') {
            $("#ecu_ul").hide();
        }
        if (e.target.id != 'p_3') {
            $("#tuning_ul").hide();
        }
    });

    $(document).ready(function() {
        $("#m1").mouseover(function() {
            $("#m2").removeClass('color_green');
            $("#m1").addClass('color_green');
            $("#menuImg").attr('src', '<?php echo SITEURL; ?>v_4/images/mouse-icon1-hover.png');
            $("#menuImg1").attr('src', '<?php echo SITEURL; ?>v_4/images/mouse-icon3.png');
            $("#modes_img").attr('src', 'https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1600/v1651592728/product/mouse-hover-b2_tsorh4_vjh0c3.webp');
            
        });
        $("#m2").mouseover(function() {
            $("#m1").removeClass('color_green');
            $("#m2").addClass('color_green');
            $("#menuImg").attr('src', '<?php echo SITEURL;?>v_4/images/mouse-icon1.png');
            $("#menuImg1").attr('src', '<?php echo SITEURL;?>v_4/images/mouse-icon3-hover.png');
            $("#modes_img").attr('src', 'https://res.cloudinary.com/armytrix/image/upload/c_scale,q_auto:best,w_1600/v1651574852/product/mouse-hover-b1_nt16rs.webp');
        });

        $("#p_1").click(function() {
            if ($('#cat_back_ul').css('display') == 'none') {
                $('#cat_back_ul').show();
            } else {
                $('#cat_back_ul').hide();
            }
        });

        $("#p_2").click(function() {
            if ($('#ecu_ul').css('display') == 'none') {
                $('#ecu_ul').show();
            } else {
                $('#ecu_ul').hide();
            }
        });

        $("#p_3").click(function() {
            if ($('#tuning_ul').css('display') == 'none') {
                $('#tuning_ul').show();
            } else {
                $('#tuning_ul').hide();
            }
        });


        $.strRemove = function(theTarget, theString) {
            return $("<p/>").append(
                $(theTarget, theString).remove().end()
            ).text();
        };

        $("#cat_back_ul li").click(function() {
            var price = parseInt($("#total_amout").val());
            var pid = $(this).attr("pid");
            var p_amt = parseInt($(this).attr("p_amt"));
            var data_img = $(this).attr("data_img");
            var full_img = $(this).attr("full_img");
            var data_part = $(this).attr("data_part");
            var data_material = $(this).attr("data_material");
            var data_abt = $(this).attr("data_abt");
            var qut = $(this).attr("qut");
            var txt = $("#" + this.id + "").html();
            var txt = $.strRemove("div", txt);
            var cat_b_q = 1;

            var out_stock = '';
            if (qut == 0) { out_stock = '<li><span class="out_stock">Out of Stock</span></li>'; }

            if (txt == 'Select') {
                $('.selc_p_1').remove();
                $('#p_1').html('--- Cat-Back Valvetronic Mufflers Selection ---');
                $('#cat_id').val('');
                $('#cat_id_q').val('');
                $('#cat_id_p').val(0);
                $('#cat_pic_id').html('');
                $('#p_1').removeClass('drp-btn-clr');
                $('.selc_p_1').remove();
                getset();

            } else {
                if (qut > 0) {
                    $('.selc_p_1').remove();
                    $('#p_1').html(txt);
                    $('#cat_id').val(pid);
                    $('#cat_id_q').val(cat_b_q);
                    $('#cat_id_p').val(p_amt);
                    $('#cat_pic_id').html('<div class="proImg"><img src="'+full_img+'" alt="images" loading="lazy" /></div><ul class="tabBtn d-flex"><li><span class="part_no">'+data_part+'</span></li><li><span class="'+data_material+'">'+data_material+'</span></li>'+out_stock+'</ul><p class="text-left">'+data_abt+'</p>');
                    $('#p_1').addClass('drp-btn-clr');
                    $('#selc').append('<p class="selc_p_1">' + txt + '</p>');
                    getset();
                }else{
                    $('.selc_p_1').remove();
                    $('#p_1').html(txt);
                    $('#cat_id').val('');
                    $('#cat_id_q').val('');
                    $('#cat_id_p').val(0);
                    $('#cat_pic_id').html('<div class="proImg"><img src="'+full_img+'" alt="images" loading="lazy" /></div><ul class="tabBtn d-flex"><li><span class="part_no">'+data_part+'</span></li><li><span class="'+data_material+'">'+data_material+'</span></li>'+out_stock+'</ul><p class="text-left">'+data_abt+'</p>');
                    $('#p_1').removeClass('drp-btn-clr');
                    $('.selc_p_1').remove();
                    getset(); 
                }
            }
            $('#cat_back_ul').hide();
        });

        $("#ecu_ul li").click(function() {

            var price = parseInt($("#total_amout").val());
            var pid = $(this).attr("pid");
            var p_amt = parseInt($(this).attr("p_amt"));
            var data_img = $(this).attr("data_img");
            var full_img = $(this).attr("full_img");
            var data_part = $(this).attr("data_part");
            var data_material = $(this).attr("data_material");
            var data_abt = $(this).attr("data_abt");
            var qut = $(this).attr("qut");
            var txt = $("#" + this.id + "").html();
            var txt = $.strRemove("div", txt);
            var cat_b_q = 1;
            var out_stock = '';
            if (qut == 0) { out_stock = '<li><span class="out_stock">Out of Stock</span></li>'; }

            if (txt == 'Select') {
                $('.selc_p_2').remove();
                $('#p_2').html('--- Catalytic Converter Replacement Selections ---');
                $('#ecu_id').val('');
                $('#ecu_id_q').val('');
                $('#ecu_id_p').val(0);
                $('#ecu_pic_id').html('');
                $('#p_2').removeClass('drp-btn-clr');
                getset();
            } else {
                if (qut > 0) {
                    $('.selc_p_2').remove();
                    $('#p_2').html(txt);
                    $('#ecu_id').val(pid);
                    $('#ecu_id_q').val(cat_b_q);
                    $('#ecu_id_p').val(p_amt);
                    $('#ecu_pic_id').html('<div class="proImg"><img src="'+full_img+'" alt="images" loading="lazy" /></div><ul class="tabBtn d-flex"><li><span class="part_no">'+data_part+'</span></li><li><span class="'+data_material+'">'+data_material+'</span></li>'+out_stock+'</ul><p class="text-left">'+data_abt+'</p>');
                    $('#p_2').addClass('drp-btn-clr');
                    $('#selc').append('<p class="selc_p_2">' + txt + '</p>');
                    getset();
                }else{
                    $('.selc_p_2').remove();
                    $('#p_2').html(txt);
                    $('#ecu_id').val('');
                    $('#ecu_id_q').val('');
                    $('#ecu_id_p').val(0);
                    $('#ecu_pic_id').html('<div class="proImg"><img src="'+full_img+'" alt="images" loading="lazy" /></div><ul class="tabBtn d-flex"><li><span class="part_no">'+data_part+'</span></li><li><span class="'+data_material+'">'+data_material+'</span></li>'+out_stock+'</ul><p class="text-left">'+data_abt+'</p>');
                    $('#p_2').removeClass('drp-btn-clr');
                    getset();
                }
            }
            $('#ecu_ul').hide();
        });


        $("#tuning_ul li").click(function() {

            var price = parseInt($("#total_amout").val());
            var pid = $(this).attr("pid");
            var p_amt = parseInt($(this).attr("p_amt"));
            var data_img = $(this).attr("data_img");
            var full_img = $(this).attr("full_img");
            var data_part = $(this).attr("data_part");
            var data_material = $(this).attr("data_material");
            var data_abt = $(this).attr("data_abt");
            var qut = $(this).attr("qut");
            var txt = $("#" + this.id + "").html();
            var txt = $.strRemove("div", txt);
            var cat_b_q = 1; 
            var out_stock = '';
            if (qut == 0) { out_stock = '<li><span class="out_stock">Out of Stock</span></li>'; }

            if (txt == 'Select') {
                $('.selc_p_3').remove();
                $('#p_3').html(' --- Armytron Accessory Selctions ---');
                $('#accessory_id').val('');
                $('#accessory_id_q').val('');
                $('#accessory_id_p').val(0);
                $('#tuning_pic_id').html('');
                $('#p_3').removeClass('drp-btn-clr');
                getset();
            } else {
                if (qut > 0) {
                    $('.selc_p_3').remove();
                    $('#p_3').html(txt);
                    $('#accessory_id').val(pid);
                    $('#accessory_id_q').val(cat_b_q);
                    $('#accessory_id_p').val(p_amt);
                    $('#tuning_pic_id').html('<div class="proImg"><img src="'+full_img+'" alt="images" loading="lazy" /></div><ul class="tabBtn d-flex"><li><span class="part_no">'+data_part+'</span></li><li><span class="'+data_material+'">'+data_material+'</span></li>'+out_stock+'</ul><p class="text-left">'+data_abt+'</p>');
                    $('#p_3').addClass('drp-btn-clr');
                    $('#selc').append('<p class="selc_p_3">' + txt + '</p>');
                    getset();
                }else{
                    $('.selc_p_3').remove();
                    $('#p_3').html(txt);
                    $('#accessory_id').val('');
                    $('#accessory_id_q').val('');
                    $('#accessory_id_p').val(0);
                    $('#tuning_pic_id').html('<div class="proImg"><img src="'+full_img+'" alt="images" loading="lazy" /></div><ul class="tabBtn d-flex"><li><span class="part_no">'+data_part+'</span></li><li><span class="'+data_material+'">'+data_material+'</span></li>'+out_stock+'</ul><p class="text-left">'+data_abt+'</p>');
                    $('#p_3').removeClass('drp-btn-clr');
                    getset();
                }
            }

            $('#tuning_ul').hide();
        });

        function getset() {
            var p1 = parseInt($('#cat_id_p').val());
            var p2 = parseInt($('#ecu_id_p').val());
            var p3 = parseInt($('#accessory_id_p').val());
            var n = p1 + p2 + p3;
            $('#price').html("USD $" + n.toFixed(2));
            $('#total_amout').val(n);
            
        }

    });



    $('.btn-number').click(function(e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    var nv = currentVal - 1;
                    input.val(nv).change();
                    if (input.attr('id') == 'cat_b_q') {
                        $('#cat_id_q').val(nv);
                    } else if (input.attr('id') == 'ecu_b_q') {
                        $('#ecu_id_q').val(nv);
                    } else if (input.attr('id') == 'accessory_b_q') {
                        $('#accessory_id_q').val(nv);
                    }
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    var nv = currentVal + 1;
                    input.val(nv).change();
                    if (input.attr('id') == 'cat_b_q') {
                        $('#cat_id_q').val(nv);
                    } else if (input.attr('id') == 'ecu_b_q') {
                        $('#ecu_id_q').val(nv);
                    } else if (input.attr('id') == 'accessory_b_q') {
                        $('#accessory_id_q').val(nv);
                    }
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }
            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function() {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {
        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());
        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus' ][data-field='" + name + "' ]").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }
    });
    $(".input-number").keydown(function(e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 || (e.keyCode == 65 && e.ctrlKey === true) || (e.keyCode >= 35 && e.keyCode <= 39)) {}
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    <?php $this->Html->scriptEnd(); ?>
