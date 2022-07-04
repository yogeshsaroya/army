<?php echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min', '/v/bootstrap.min')); ?>
<style>
    .upload-img-bx_in .img-phote-st {
        background-image: url(../images/file-icon.png);
        background-repeat: no-repeat;
        background-position: center 40%
    }

    .img-phote-st .percent {
        width: 100px;
        height: 100px;
        border-radius: 100%;
        position: absolute;
        top: 30%;
        background: #b1d7d9;
        background-repeat: no-repeat;
        background-position: center;
        text-align: center;
        line-height: 100px;
        font-size: 25px;
        left: 50%;
    }

    #sortable_gal .ui-sortable-handle,
    #sortable_tt .ui-sortable-handle,
    #sortable_ss .ui-sortable-handle,
    #sortable .ui-sortable-handle {
        cursor: move;
    }
    .ui-sortable-handle {
    width: 250px;
  }
</style>
<div id="preloader_photo" class="img-phote-st" style="display: none">
    <div class="percent">0%</div>
</div>
<div class="content-wrapper">

    <section class="content-header">
        <h1><a href="<?php if (!empty($data['Motorcycle']['url'])) {
                            echo SITEURL . "motorcycle/" . $data['Motorcycle']['url'];
                        } else {
                            echo "javascript:void(0);";
                        } ?>" target="_blank">
                <?php
                echo $data['MotorcycleMake']['name'] . "/" . $data['MotorcycleModel']['name'] . "/" . $data['MotorcycleYear']['year_from'] . " - " . (!empty($data['MotorcycleYear']['year_from']) ? $data['MotorcycleYear']['year_from'] : 'persent') . " > " . $data['Motorcycle']['title']; ?></a></h1>
    </section>

    <section class="content">
        <div class="clearfix"></div>
        <?php echo $this->Session->flash('msg'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="<?php if (empty($q)) {
                                        echo "active";
                                    } ?>"><a href="<?php echo SITEURL . "lab/labs/update_motorcycle/" . $data['Motorcycle']['id']; ?>">General</a></li>
                        <li class="<?php if (isset($q['tab']) && $q['tab'] == 'slider') {
                                        echo "active";
                                    } ?>"><a href="<?php echo SITEURL . "lab/labs/update_motorcycle/" . $data['Motorcycle']['id'] . "?tab=slider"; ?>">Slider</a></li>
                        <li class="<?php if (isset($q['tab']) && $q['tab'] == 'gallery') {
                                        echo "active";
                                    } ?>"><a href="<?php echo SITEURL . "lab/labs/update_motorcycle/" . $data['Motorcycle']['id'] . "?tab=gallery"; ?>">Gallery</a></li>
                        <li class="<?php if (isset($q['tab']) && $q['tab'] == 'videos') {
                                        echo "active";
                                    } ?>"><a href="<?php echo SITEURL . "lab/labs/update_motorcycle/" . $data['Motorcycle']['id'] . "?tab=videos"; ?>">Videos</a></li>
                        <li class="<?php if (isset($q['tab']) && $q['tab'] == 'product') {
                                        echo "active";
                                    } ?>"><a href="<?php echo SITEURL . "lab/labs/update_motorcycle/" . $data['Motorcycle']['id'] . "?tab=product"; ?>">Products</a></li>
                        <li class="<?php if (isset($q['tab']) && $q['tab'] == 'multilingual') {
                                        echo "active";
                                    } ?>"><a href="<?php echo SITEURL . "lab/labs/update_motorcycle/" . $data['Motorcycle']['id'] . "?tab=multilingual"; ?>">Multilingual</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane">
                            <?php
                            if (empty($q)) {
                                echo $this->Form->create('Motorcycle', array('class' => 'form-horizontal','id' => 'proFrm'));
                                if (isset($data['Motorcycle']) && !empty($data['Motorcycle'])) {
                                    $this->request->data['Motorcycle'] = $data['Motorcycle'];
                                    echo $this->Form->hidden('id');
                                }
                            ?>

                                <div class="form-group"><label for="inputName" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10"><?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Title', 'label' => false, 'required' => true)); ?></div>
                                </div>
                                <div class="form-group"><label for="inputName" class="col-sm-2 control-label">SEO URL</label>
                                    <div class="col-sm-10"><?php echo $this->Form->input('url', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'url', 'label' => false, 'required' => true)); ?></div>
                                </div>

                                <div class="form-group"><label for="inputName" class="col-sm-2 control-label">Meta Title</label>
                                    <div class="col-sm-10"><?php echo $this->Form->input('meta_title', array('class' => 'form-control', 'placeholder' => 'Meta Title', 'label' => false, 'required' => false)); ?></div>
                                </div>

                                <div class="form-group"><label for="inputName" class="col-sm-2 control-label">Meta Description</label>
                                    <div class="col-sm-10"><?php echo $this->Form->input('meta_description', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Meta Description', 'label' => false)); ?></div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <div id="app_err"></div>
                                    <input type="button" class="btn btn-success" value="Save" id="add_br">
                                    </div>
                                </div>
                                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="alert alert-danger text-bold">Note: On Save, It will take few sec to convert text into other languages for multilingual pages.</div>
                  </div>
                </div>

                <script>
                  window['btnState'] = function() {
                    $("#add_br").prop("disabled", false);
                    $("#add_br").val('Save');
                  };
                  $(document).ready(function() {
                    $('#proFrm')
                      .formValidation({
                        framework: 'bootstrap',
                        icon: {},
                        err: {},
                        fields: {}
                      }).on('success.form.fv', function(e) {
                        e.preventDefault();
                        var $form = $(e.target),
                          fv = $form.data('formValidation');
                        fv.defaultSubmit();
                      });
                    $("#add_br").click(function() {
                      $("#app_err").html('');
                      $("#proFrm").ajaxForm({
                        target: '#app_err',
                        beforeSubmit: function() {
                          $("#add_br").prop("disabled", true);
                          $("#add_br").val('Please wait...');
                        },
                        success: function(response) {
                          btnState();
                        },
                        error: function(response) {
                          btnState();
                        }
                      }).submit();
                    });
                  });
                </script>

                            <?php echo $this->Form->end();
                            } elseif (isset($q['tab']) && $q['tab'] == 'videos') {
                                $vArr = array();
                                if (!empty($data['Motorcycle']['videos'])) {
                                    $vArr = explode(',', $data['Motorcycle']['videos']);
                                }
                            ?>

                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Add new Video</h3>
                                    </div>
                                    <div class="box-body">
                                        <?php echo $this->Form->create('Motorcycle', array('url' => array('controller' => 'labs', 'action' => 'motorcycle_videos')));
                                        if (isset($data['Motorcycle']) && !empty($data['Motorcycle'])) {
                                            $this->request->data['Motorcycle'] = $data['Motorcycle'];
                                            echo $this->Form->hidden('id');
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <?php echo $this->Form->input('vid', array('class' => 'form-control', 'placeholder' => 'Youtube Video ID or URL here', 'label' => false, 'required' => true, 'value' => '')) ?></div>
                                            <div class="col-xs-2"><input type="submit" class="btn btn-success" value="Save"></div>
                                            <?php echo $this->Form->end(); ?>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>

                                <div class="box box-info">
                                    <div class="box-header">
                                        <h3 class="box-title">All Video</h3>
                                    </div>
                                    <div class="row" id="sortable">

                                        <?php if (!empty($data['Video'])) {
                                            foreach ($data['Video'] as $vlist) { ?>
                                                <div class="col-sm-2 col-md-3 ui-state-default" id="recordsArray_<?php echo $vlist['id']; ?>">
                                                    <div class="thumbnail">
                                                        <img src="https://i.ytimg.com/vi/<?php echo $vlist['video']; ?>/mqdefault.jpg" alt="" title="" class="margin">
                                                        <div class="caption">
                                                            <p><a href="javascript:void(0);" onclick="del(<?php echo $vlist['id']; ?>);" class="btn btn-primary" role="button">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php }
                                        } ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            <?php
                            } elseif (isset($q['tab']) && $q['tab'] == 'slider') {
                                $sArr = array();

                            ?>
                                <div class="box box-success">
                                    <div class="box-body">
                                        <div class="row"></div>
                                        <div class="col-md-12">
                                            <input type="button" class="btn btn-success pull-right" value="Add Image" onclick="add_slider(<?php echo $data['Motorcycle']['id']; ?>,1,'motorcycle');">
                                        </div>
                                        <input type="hidden" value="" id="slider">
                                    </div>
                                </div>
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Product Slider</h3>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body" style="display: block;">
                                        <div class="row" id="sortable_ss">
                                            <?php
                                            if (isset($sliders) && !empty($sliders)) {
                                                $n = 1;
                                                foreach ($sliders as $list) {
                                                    $main = show_image('cdn/' . $list['Library']['folder'], $list['Library']['file_name'], 300, 250, 100, 'ff', null); ?>
                                                    <div class="col-sm-2 col-md-3 ui-sortable-handle" id="ss_<?php echo $list['Library']['id']; ?>">
                                                        <div class="thumbnail">
                                                            <img src="<?php echo $main; ?>" alt="" title="" class="margin">
                                                            <div class="caption">
                                                                <p><a href="javascript:void(0);" onclick="del_pic(<?php echo $list['Library']['id'] . ',' . $data['Motorcycle']['id'] . ',' . '\'slider\''; ?>);" class="btn btn-primary" role="button">Delete</a>
                                                                    <?php if ($n != 1) { ?>
                                                                        <a href="javascript:void(0);" onclick="prim(<?php echo $list['Library']['id'] . ',' . $data['Motorcycle']['id'] . ',' . '\'slider\''; ?>);" class="btn btn-primary" role="button">Make Primary</a><?php } ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php $n++;
                                                }
                                            } ?>
                                            <div class="clearfix">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="clearfix"></div>
                                <div id="pic_err"></div>

                            <?php } elseif (isset($q['tab']) && $q['tab'] == 'gallery') { ?>
                                <div class="box box-success">
                                    <div class="box-body">
                                        <div class="row"></div>
                                        <div class="col-md-12">
                                            <input type="button" class="btn btn-success pull-right" value="Add Image" onclick="add_gallery(<?php echo $data['Motorcycle']['id']; ?>,1,'motorcycle');">
                                        </div>
                                        <input type="hidden" value="" id="slider">
                                    </div>
                                </div>
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Gallery</h3>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body" style="display: block;">
                                        <div class="row" id="sortable_ss">
                                            <?php
                                            if (isset($sliders) && !empty($sliders)) {
                                                $n = 1;
                                                foreach ($sliders as $list) {
                                                    $main = show_image('cdn/' . $list['Library']['folder'], $list['Library']['file_name'], 300, 250, 100, 'ff', null); ?>
                                                    <div class="col-sm-2 col-md-3 ui-sortable-handle" id="ss_<?php echo $list['Library']['id']; ?>">
                                                        <div class="thumbnail">
                                                            <img src="<?php echo $main; ?>" alt="" title="" class="margin">
                                                            <div class="caption">
                                                                <p><a href="javascript:void(0);" onclick="del_pic(<?php echo $list['Library']['id'] . ',' . $data['Motorcycle']['id'] . ',' . '\'slider\''; ?>);" class="btn btn-primary" role="button">Delete</a>
                                                                    <?php if ($n != 1) { ?>
                                                                        <a href="javascript:void(0);" onclick="prim(<?php echo $list['Library']['id'] . ',' . $data['Motorcycle']['id'] . ',' . '\'slider\''; ?>);" class="btn btn-primary" role="button">Make Primary</a><?php } ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php $n++;
                                                }
                                            } ?>
                                            <div class="clearfix">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="clearfix"></div>
                                <div id="pic_err"></div>
                            <?php } elseif (isset($q['tab']) && $q['tab'] == 'product') { ?>
                                <div class="active tab-pane">
                                    <div class="box box-success">
                                        <div class="box box-success">
                                            <div class="box-header">
                                                <h3 class="box-title">Motorcycle Exhaust System</h3>
                                                <a class="btn btn-app" href="javascript:void(0);" onclick="add_cat(<?php echo $data['Motorcycle']['id']; ?>,'cat-back')"><i class="fa fa-plus-square"></i> Add New Product </a>
                                            </div>
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-sm-12" id="lab_table">
                                                        <table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
                                                            <thead>
                                                                <tr role="row">
                                                                    <th>Image</th>
                                                                    <th>Type</th>
                                                                    <th>Make/Model/Motor</th>
                                                                    <th>Title</th>
                                                                    <th>Part</th>
                                                                    <th>Price</th>
                                                                    <th>Order/Quantity</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="table_rows">
                                                                <?php
                                                                $arrList = explode(',', $data['Motorcycle']['product_ids']);
                                                                $cList = $this->Lab->getProduct($arrList, 'motorcycle');
                                                                if (!empty($cList)) {
                                                                    foreach ($cList as $aList) {
                                                                        $full_path = 'cdn/' . $aList['Library']['folder'] . "/" . $aList['Library']['file_name'];
                                                                        $imgg  = new_show_image($full_path, 100, 100, 100, 'ff', null); ?>
                                                                        <tr class="odd gradeX">
                                                                            <td class="center gnTxt"><img src="<?php echo $imgg; ?>" class="img-thumbnail" alt=""> </td>
                                                                            <td><?php if ($aList['Product']['type'] == 6) {
                                                                                    echo "Full Set";
                                                                                } elseif ($aList['Product']['type'] == 7) {
                                                                                    echo "Parts";
                                                                                } ?></td>
                                                                            <td><?php echo $aList['MotorcycleMake']['name'] . "/ " . $aList['MotorcycleModel']['name'] . "/ " . $aList['MotorcycleYear']['year_from'] . " - " . (!empty($aList['MotorcycleYear']['year_from']) ? $aList['MotorcycleYear']['year_from'] : 'present'); ?></td>
                                                                            <td><?php echo $aList['Product']['title']; ?></td>
                                                                            <td><?php echo $aList['Product']['part'] . "<br>" . $aList['Product']['full_part']; ?></td>
                                                                            <td><?php echo "$" . $aList['Product']['price']; ?></td>
                                                                            <td><?php echo  $aList['Product']['total_order'] . "/" . $aList['Product']['quantity']; ?></td>
                                                                        </tr>
                                                                    <?php }
                                                                } else { ?> <tr class="odd gradeX">
                                                                        <td colspan="7" class="center gnTxt">Empty</td>
                                                                    </tr> <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } elseif (isset($q['tab']) && $q['tab'] == 'multilingual') {  ?>
                                <div class="box">
                                    <?php /* ?>
                            <div class="box-header with-border">
                                <h3 class="box-title">Create new page in other language</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <?php echo $this->Form->input('lang', array('options' => $langArr, 'class' => 'form-control', 'label' => false, 'empty' => ' -- Select Language -- '));
                                        echo $this->Form->hidden('cid', array('value' => $data['Motorcycle']['id'], 'id' => 'carde_id'));
                                        ?>
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="button" class="btn bg-olive btn-flat " value="Create new page" id="gen_page">
                                    </div>

                                </div>
                            </div>
                            <div id="lang_err"> </div>
                            <?php */ ?>
                                    <div class="box-header">
                                        <h3 class="box-title">Manage multilingual page</h3>
                                    </div>
                                    <div class="box-body no-padding">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Language</th>
                                                    <th>Edit</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                                <?php if (isset($allLangPage) && !empty($allLangPage)) {
                                                    $num = 1;
                                                    foreach ($allLangPage as $pList) { ?>
                                                        <tr>
                                                            <td><?php echo $num; ?></td>
                                                            <td><?php
                                                                if (!empty($pList['Motorcycle']['url'])) {
                                                                    echo $this->html->link($langArr[$pList['Motorcycle']['language']], '/motorcycle/' . $pList['Motorcycle']['url'], array('target' => '_blank'));
                                                                } else {
                                                                    echo $langArr[$pList['Motorcycle']['language']];
                                                                } ?></td>
                                                            <td><?php echo $this->html->link('Edit', '/lab/labs/update_motorcycle_lang/' . $pList['Motorcycle']['id'] . "/" . $pList['Motorcycle']['language']);; ?></td>
                                                            <td> <?php
                                                                    if ($pList['Motorcycle']['status'] == 1) {
                                                                        echo $this->html->link('Active', '/lab/labs/update_motorcycle/' . $data['Motorcycle']['id'] . '?lng_act=' . $pList['Motorcycle']['id'], array('class' => 'text-green', 'confirm' => 'Do you want to inactive this page?'));
                                                                    } elseif ($pList['Motorcycle']['status'] == 0) {
                                                                        echo $this->html->link('Inactive', '/lab/labs/update_motorcycle/' . $data['Motorcycle']['id'] . '?lng_act=' . $pList['Motorcycle']['id'], array('class' => 'text-red', 'confirm' => 'Do you want to active this page?'));
                                                                    }

                                                                    ?> </td>
                                                            <td> <?php echo $this->html->link('Delete', '/lab/labs/update_motorcycle/' . $data['Motorcycle']['id'] . '?lng_del=' . $pList['Motorcycle']['id'], array('class' => 'text-red', 'confirm' => 'Do you want to delete this page?')); ?> </td>
                                                        </tr>
                                                <?php $num++;
                                                    }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $("#gen_page").click(function() {
                                            var lang = $('#lang').val();
                                            var cid = $('#carde_id').val();
                                            if (lang != "" && cid != "") {
                                                $('#preloader').show();
                                                $.ajax({
                                                    type: 'POST',
                                                    url: '<?php echo SITEURL; ?>lab/labs/gen_page',
                                                    data: {
                                                        cid: cid,
                                                        lang: lang,
                                                        type: 'motorcycle'
                                                    },
                                                    success: function(data) {
                                                        $("#lang_err").html(data);
                                                        $('#preloader').hide();
                                                    },
                                                    error: function(comment) {
                                                        $("#lang_err").html(comment);
                                                        $('#preloader').hide();
                                                    }
                                                });
                                            }

                                        });
                                    });
                                </script>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                function add_cat(id, type) {
                    $.magnificPopup.open({
                        items: {
                            src: '<?php echo SITEURL; ?>lab/labs/add_motorcycle_product/' + id + '/' + type,
                            type: 'ajax'
                        },
                        closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)"> </button>',
                        closeOnContentClick: false,
                        closeOnBgClick: false,
                        showCloseBtn: true,
                        enableEscapeKey: false,
                    });
                }

                function prim(lid, id, ty) {

                    if (lid != "" && id != "" && ty != "") {
                        $('#preloader').show();
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo SITEURL; ?>lab/labs/up_motorcycle/',
                            data: {
                                type: 'primary',
                                dtype: ty,
                                lid: lid,
                                id: id
                            },
                            success: function(data) {
                                $("#pic_err").html(data);
                                location.reload();
                            },
                            error: function(comment) {
                                $("#pic_err").html(comment);
                                location.reload();
                            }
                        });
                    }

                }

                function del_pic(lid, id, ty) {

                    if (lid != "" && id != "" && ty != "") {
                        $('#preloader').show();
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo SITEURL; ?>lab/labs/up_motorcycle/',
                            data: {
                                type: 'del',
                                dtype: ty,
                                lid: lid,
                                id: id
                            },
                            success: function(data) {
                                $("#pic_err").html(data);
                                location.reload();
                            },
                            error: function(comment) {
                                $("#pic_err").html(comment);
                                location.reload();
                            }
                        });
                    }

                }

                function add_gallery(id, type, tbl) {
        $.magnificPopup.open({
          items: {
            src: '<?php echo SITEURL . "lab/labs/add_media/"; ?>' + id + '/gallery/' + type + '/' + tbl,
            type: 'ajax'
          },
          closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)"> </button>',
          closeOnContentClick: false,
          closeOnBgClick: false,
          showCloseBtn: true,
          enableEscapeKey: false,
        });
      }

                function add_slider(id, type, tbl) {
                    $.magnificPopup.open({
                        items: {
                            src: '<?php echo SITEURL . "lab/labs/add_media/"; ?>' + id + '/slider/' + type + '/' + tbl,
                            type: 'ajax'
                        },
                        closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)"> </button>',
                        closeOnContentClick: false,
                        closeOnBgClick: false,
                        showCloseBtn: true,
                        enableEscapeKey: false,
                    });
                }


                function del(i, v) {
                    if (i != "" && v != "") {
                        $('#preloader').show();
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo SITEURL; ?>lab/labs/api_car/',
                            data: 'type=del&i=' + i + '&v=' + v + '&tab=videos',
                            success: function(data) {
                                $("#cover").html(data);
                                $('#preloader').hide();
                            },
                            error: function(comment) {
                                $("#cover").html(comment);
                                $('#preloader').hide();
                            }
                        });
                    }
                }
            </script>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php

echo $this->Html->css(array('/lab_root/plugins/iCheck/all'));
echo $this->Html->script(array('/lab_root/plugins/iCheck/icheck.min'));
?>
<script>
    $(function() {
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });
</script>


<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(function() {


            $("#sortable_ss").sortable({
                opacity: 0.6,
                cursor: 'move',
                update: function() {
                    var datastring = $(this).sortable("serialize");
                    $(function() {
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo SITEURL; ?>lab/labs/change_positions_pic/motorcycle/<?php echo $data['Motorcycle']['id']; ?>',
                            data: datastring,
                            success: function(data) {
                                $("#ajax_req").html(data);
                            },
                            error: function(comment) {}
                        });
                    });
                }
            });

            $("#sortable").sortable({
                opacity: 0.6,
                cursor: 'move',
                update: function() {
                    var datastring = $(this).sortable("serialize");
                    $(function() {
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo SITEURL; ?>lab/labs/change_positions/',
                            data: datastring,
                            success: function(data) {
                                $("#ajax_req").html(data);
                            },
                            error: function(comment) {}
                        });
                    });
                }
            });

        });
    });
</script>