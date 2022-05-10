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
</style>
<div id="preloader_photo" class="img-phote-st" style="display: none">
  <div class="percent">0%</div>
</div>
<div class="content-wrapper">

  <section class="content-header">
    <h1><a href="<?php if (!empty($data['ItemDetail']['url'])) {
                    echo SITEURL . "product/" . $data['ItemDetail']['url'];
                  } else {
                    echo "javascript:void(0);";
                  } ?>" target="_blank">
        <?php
        echo $data['Brand']['name'] . "/" . $data['Model']['name'] . "/" . $data['Motor']['name'] . " > " . $data['ItemDetail']['name']; ?></a></h1>
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
                        } ?>"><a href="<?php echo SITEURL . "lab/labs/update_car_detail/" . $data['ItemDetail']['id']; ?>">General</a></li>
            <li class="<?php if (isset($q['tab']) && $q['tab'] == 'data') {
                          echo "active";
                        } ?>"><a href="<?php echo SITEURL . "lab/labs/update_car_detail/" . $data['ItemDetail']['id'] . "?tab=data"; ?>">Data</a></li>
            <li class="<?php if (isset($q['tab']) && $q['tab'] == 'images') {
                          echo "active";
                        } ?>"><a href="<?php echo SITEURL . "lab/labs/update_car_detail/" . $data['ItemDetail']['id'] . "?tab=images"; ?>">Images</a></li>
            <li class="<?php if (isset($q['tab']) && $q['tab'] == 'videos') {
                          echo "active";
                        } ?>"><a href="<?php echo SITEURL . "lab/labs/update_car_detail/" . $data['ItemDetail']['id'] . "?tab=videos"; ?>">Videos</a></li>
            
            

            <li class="<?php if (isset($q['tab']) && $q['tab'] == 'catback') {
                          echo "active";
                        } ?>"><a href="<?php echo SITEURL . "lab/labs/update_car_detail/" . $data['ItemDetail']['id'] . "?tab=catback"; ?>">Catback</a></li>
            <li class="<?php if (isset($q['tab']) && $q['tab'] == 'catalytic') {
                          echo "active";
                        } ?>"><a href="<?php echo SITEURL . "lab/labs/update_car_detail/" . $data['ItemDetail']['id'] . "?tab=catalytic"; ?>">DownPipe</a></li>
            <li class="<?php if (isset($q['tab']) && $q['tab'] == 'accessory') {
                          echo "active";
                        } ?>"><a href="<?php echo SITEURL . "lab/labs/update_car_detail/" . $data['ItemDetail']['id'] . "?tab=accessory"; ?>">Accessory</a></li>
            <?php /*?>
  <li class="<?php if (isset($q['tab']) && $q['tab'] == 'quality') { echo "active"; } ?>"><a href="<?php echo SITEURL . "lab/labs/update_car_detail/" . $data['ItemDetail']['id'] . "?tab=quality"; ?>">Quality & Detail</a></li>
  <li class="<?php if(isset($q['tab']) && $q['tab'] == 'tuning_box'){ echo "active";}?>"><a href="<?php echo SITEURL."lab/labs/update_car_detail/".$data['ItemDetail']['id']."?tab=tuning_box";?>" >Box</a></li>
  <li class="<?php if(isset($q['tab']) && $q['tab'] == 'shipping'){ echo "active";}?>"><a href="<?php echo SITEURL."lab/labs/update_car_detail/".$data['ItemDetail']['id']."?tab=shipping";?>" >Add Shipping</a></li>
  <li class="<?php if(isset($q['tab']) && $q['tab'] == 'manage_shipping'){ echo "active";}?>"><a href="<?php echo SITEURL."lab/labs/update_car_detail/".$data['ItemDetail']['id']."?tab=manage_shipping";?>" >Manage Shipping</a></li>
  <li class="<?php if(isset($q['tab']) && $q['tab'] == 'import_shipping'){ echo "active";}?>"><a href="<?php echo SITEURL."lab/labs/update_car_detail/".$data['ItemDetail']['id']."?tab=import_shipping";?>" >Import/Export</a></li>
  <li class="<?php if(isset($q['tab']) && $q['tab'] == 'multilingual'){ echo "active";}?>"><a href="<?php echo SITEURL."lab/labs/update_car_detail/".$data['ItemDetail']['id']."?tab=multilingual";?>" >Multilingual</a></li>
  <?php */ ?>
  <li class="<?php if(isset($q['tab']) && $q['tab'] == 'multilingual'){ echo "active";}?>"><a href="<?php echo SITEURL."lab/labs/update_car_detail/".$data['ItemDetail']['id']."?tab=multilingual";?>" >Multilingual</a></li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane">
              <?php
              if (empty($q)) {
                echo $this->Form->create('ItemDetail', array('class' => 'form-horizontal','id'=>'proFrm'));
                if (isset($data['ItemDetail']) && !empty($data['ItemDetail'])) {
                  $this->request->data['ItemDetail'] = $data['ItemDetail'];
                  echo $this->Form->hidden('id');
                } ?>

                <?php /* ?>
<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Heading</label>
<div class="col-sm-10"><?php echo $this->Form->input('heading',array('class'=>'form-control','placeholder'=>'Heading','label'=>false,'required'=>false));?></div></div>

<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Description</label> <div class="col-sm-10"><?php echo $this->Form->input('description',array('class'=>'form-control','placeholder'=>'Description','label'=>false,'required'=>true));?></div></div>

                <div class="form-group"><label for="inputName" class="col-sm-2 control-label">Video</label>
                  <div class="col-sm-10"><?php echo $this->Form->input('vid', array('class' => 'form-control', 'placeholder' => 'Heading', 'label' => false, 'required' => false, 'placeholder' => 'Youtube Video ID')); ?></div>
                </div>
<?php */ ?>

                <div class="form-group"><label for="inputName" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10"><?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Title', 'label' => false, 'required' => true)); ?></div>
                </div>

                <div class="form-group"><label for="inputName" class="col-sm-2 control-label">Fitment</label>
                  <div class="col-sm-10"><?php echo $this->Form->input('fitment', array('class' => 'form-control', 'placeholder' => 'Fitment', 'label' => false, 'required' => false)); ?></div>
                </div>
                <div class="form-group"><label for="inputName" class="col-sm-2 control-label">Feature</label>
                  <div class="col-sm-10"><?php echo $this->Form->input('feature', array('class' => 'form-control', 'placeholder' => 'Feature', 'label' => false, 'required' => false)); ?></div>
                </div>
                <div class="form-group"><label for="inputName" class="col-sm-2 control-label">Note</label>
                  <div class="col-sm-10"><?php echo $this->Form->input('note', array('class' => 'form-control', 'placeholder' => 'Note', 'label' => false, 'required' => false)); ?></div>
                </div>


                <div class="form-group"><label for="inputName" class="col-sm-2 control-label">SEO URL</label>
                  <div class="col-sm-10"><?php echo $this->Form->input('url', array('class' => 'form-control', 'placeholder' => 'url', 'label' => false, 'required' => true)); ?></div>
                </div>

                <div class="form-group"><label for="inputName" class="col-sm-2 control-label">Meta Title</label>
                  <div class="col-sm-10"><?php echo $this->Form->input('meta_title', array('class' => 'form-control', 'placeholder' => 'Meta Title', 'label' => false, 'required' => false)); ?></div>
                </div>

                <div class="form-group"><label for="inputName" class="col-sm-2 control-label">Meta Description</label>
                  <div class="col-sm-10"><?php echo $this->Form->input('meta_description', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Meta Description', 'label' => false)); ?></div>
                </div>
                <div class="form-group"><label for="inputName" class="col-sm-2 control-label">Meta Keywords</label>
                  <div class="col-sm-10"><?php echo $this->Form->input('meta_keywords', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Meta Keywords', 'label' => false)); ?></div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                  <div id="app_err"></div>
									<input type="button" class="btn btn-success" value="Save" id="add_br">
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
	        icon: { },
	        err: { },
	        fields: { }
	    })    .on('success.form.fv', function(e) {
	        e.preventDefault();
	        var $form = $(e.target),
	            fv    = $form.data('formValidation');
	        fv.defaultSubmit();
	    });
		$("#add_br").click(function() {
			$("#app_err").html('');
				$("#proFrm").ajaxForm({
					target: '#app_err',
					beforeSubmit: function() { $("#add_br").prop("disabled", true); $("#add_br").val('Please wait...'); },
					success: function(response) { btnState(); },
					error: function(response) {
						btnState();
					}
				}).submit();
		});
	});
                </script>


              <?php echo $this->Form->end();
              } elseif (isset($q['tab']) && $q['tab'] == 'data') {
                echo $this->Form->create('ItemDetail', array('class' => 'form-horizontal'));
                if (isset($data['ItemDetail']) && !empty($data['ItemDetail'])) {
                  $this->request->data['ItemDetail'] = $data['ItemDetail'];
                  echo $this->Form->hidden('id');
                }
              ?>
                <div class="form-group"><label for="inputName" class="col-sm-2 control-label">Power</label>
                  <div class="col-sm-10"><?php echo $this->Form->input('power', array('class' => 'form-control', 'placeholder' => 'Power', 'label' => false, 'required' => true)); ?></div>
                </div>
                <div class="form-group"><label for="inputName" class="col-sm-2 control-label">Torque</label>
                  <div class="col-sm-10"><?php echo $this->Form->input('torque', array('class' => 'form-control', 'placeholder' => 'Torque', 'label' => false, 'required' => true)); ?></div>
                </div>
                <div class="form-group"><label for="inputName" class="col-sm-2 control-label">Weight</label>
                  <div class="col-sm-10"><?php echo $this->Form->input('weight', array('class' => 'form-control', 'placeholder' => 'Weight', 'label' => false, 'required' => true)); ?></div>
                </div>


                <div class="form-group"><label for="inputName" class="col-sm-2 control-label">Installation Manual</label>
                  <div class="col-sm-10"><?php echo $this->Form->input('installation_manual', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Installation Manual', 'label' => false, 'required' => false)); ?></div>
                </div>
                <?php /*?>
<div class="form-group" id="c_radio_btn"><label for="inputName" class="col-sm-2 control-label">Titanium</label>
<div class="col-sm-10"><?php $options = array('1' => 'Available', '0' => '  Not available'); $attributes = array('legend' => false,'class'=>'flat-red','default'=>1);
echo $this->Form->radio('titanium', $options, $attributes);?></div></div>
<div class="form-group" id="c_radio_btn"><label for="inputName" class="col-sm-2 control-label">Stainless Steel</label>
<div class="col-sm-10"><?php $options = array('1' => 'Available', '0' => '  Not available'); $attributes = array('legend' => false,'class'=>'flat-red','default'=>1);
echo $this->Form->radio('stainless_steel', $options, $attributes);?></div></div>
<div class="form-group" id="c_radio_btn"><label for="inputName" class="col-sm-2 control-label">DP</label>
<div class="col-sm-10"><?php $options = array('1' => 'Available', '0' => '  Not available'); $attributes = array('legend' => false,'class'=>'flat-red','default'=>1);
echo $this->Form->radio('dp', $options, $attributes);?></div></div>
<div class="form-group" id="c_radio_btn"><label for="inputName" class="col-sm-2 control-label">Cat Back</label>
<div class="col-sm-10"><?php $options = array('1' => 'Available', '0' => '  Not available'); $attributes = array('legend' => false,'class'=>'flat-red','default'=>1);
echo $this->Form->radio('cat_back', $options, $attributes);?></div></div>
<div class="form-group" id="c_radio_btn"><label for="inputName" class="col-sm-2 control-label">ECU Tuning</label>
<div class="col-sm-10"><?php $options = array('1' => 'Available', '0' => '  Not available'); $attributes = array('legend' => false,'class'=>'flat-red','default'=>1);
echo $this->Form->radio('ecu_tuning', $options, $attributes);?></div></div>
<div class="form-group" id="c_radio_btn"><label for="inputName" class="col-sm-2 control-label">Tuning Box</label>
<div class="col-sm-10"><?php $options = array('1' => 'Available', '0' => '  Not available'); $attributes = array('legend' => false,'class'=>'flat-red','default'=>1);
echo $this->Form->radio('tuning_box', $options, $attributes);?></div></div>
<?php */ ?>
                <br><br>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-success" value="Save">
                  </div>
                </div>

              <?php echo $this->Form->end();
              } elseif (isset($q['tab']) && $q['tab'] == 'videos') {
                $vArr = array();
                if (!empty($data['ItemDetail']['videos'])) {
                  $vArr = explode(',', $data['ItemDetail']['videos']);
                }
              ?>

                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Add new Video</h3>
                  </div>
                  <div class="box-body">
                    <?php echo $this->Form->create('ItemDetail', array('url' => array('controller' => 'labs', 'action' => 'add_utube')));
                    if (isset($data['ItemDetail']) && !empty($data['ItemDetail'])) {
                      $this->request->data['ItemDetail'] = $data['ItemDetail'];
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
              <?php } elseif (isset($q['tab']) && $q['tab'] == 'quality') { ?>
                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Quality & Detail</h3>
                  </div>
                  <div class="box-body">
                    <div class="row"></div>
                    <div class="col-md-2"><input type="button" class="btn btn-success" value="Add Photos" onclick="add_q_images(<?php echo $data['ItemDetail']['id']; ?>);"></div>
                    <input type="hidden" value="" id="slider">
                  </div>
                </div>
            </div>

            <div class="box box-info">
              <div class="box-header">
                <h3 class="box-title">Images</h3>
              </div>
              <div class="row">
                <?php
                if (isset($data['QualityDetail']) && !empty($data['QualityDetail'])) {
                  foreach ($data['QualityDetail'] as $list) {
                    $main = new_show_image('cdn/' . $list['Library']['full_path'], 150, 150, 100, 'cf', null);
                ?>
                    <div class="col-sm-2 col-md-3">
                      <div class="thumbnail">
                        <img src="<?php echo $main; ?>" alt="" title="" class="margin">
                        <div class="caption">
                          <textarea rows="5" class="col-md-12" placeholder="Title" id="<?php echo $list['id']; ?>"><?php echo $list['title']; ?></textarea>
                          <div class="clearfix"></div>
                          <br><br>
                          <p>
                            <a href="javascript:void(0);" onclick="del_q_pic(<?php echo $list['id']; ?>);" class="btn btn-default" role="button">Delete</a>
                            <a href="javascript:void(0);" onclick="save_text(<?php echo $list['id']; ?>);" class="btn btn-success pull-right" role="button">Save</a>
                          </p>
                        </div>
                      </div>
                    </div>
                <?php }
                } ?>
                <div class="clearfix"></div>
              </div>
            </div>
            <script>
              function save_text(id) {

                if (id != "") {
                  var t = $.trim($('#' + id).val());
                  if (t != "") {
                    $('#preloader').show();
                    $.ajax({
                      type: 'POST',
                      url: '<?php echo SITEURL; ?>lab/labs/up_quality_detail/',
                      data: 'type=edit&id=' + id + '&title=' + t,
                      success: function(data) {
                        $("#pic_err").html(data);
                        $('#preloader').hide();
                      },
                      error: function(comment) {
                        $("#pic_err").html(comment);
                        $('#preloader').hide();
                      }
                    });
                  } else {
                    $('#' + id).focus();
                  }
                }

              }

              function del_q_pic(id) {

                if (id != "") {
                  $('#preloader').show();
                  $.ajax({
                    type: 'POST',
                    url: '<?php echo SITEURL; ?>lab/labs/up_quality_detail/',
                    data: 'type=del&id=' + id + '',
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
            </script>
            <div id="pic_err"></div>
          <?php } elseif (isset($q['tab']) && $q['tab'] == 'images') {
                $sArr = array();

          ?>
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Add New Images</h3>
              </div>
              <div class="box-body">

                <div class="row"></div>

                <div class="col-md-2"><input type="button" class="btn btn-success" value="Product Slider" onclick="add_slider(<?php echo $data['ItemDetail']['id']; ?>,1);"></div>
                <div class="col-md-2"><input type="button" class="btn btn-success" value="Gallery" onclick="add_gallery(<?php echo $data['ItemDetail']['id']; ?>);"></div>
                <input type="hidden" value="" id="slider">
                <input type="hidden" value="" id="gallery">
              </div>
            </div>
            <!-- /.box-body -->
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
                    $main = show_image('cdn/' . $list['Library']['folder'], $list['Library']['file_name'], 150, 150, 100, 'cf', null);
                ?>
                    <div class="col-sm-2 col-md-3 ui-sortable-handle" id="ss_<?php echo $list['Library']['id']; ?>">
                      <div class="thumbnail">
                        <img src="<?php echo $main; ?>" alt="" title="" class="margin">
                        <div class="caption">
                          <p><a href="javascript:void(0);" onclick="del_pic(<?php echo $list['Library']['id'] . ",'" . $data['ItemDetail']['id'] . "','slider'"; ?>);" class="btn btn-primary" role="button">Delete</a>
                            <?php if ($n != 1) { ?>
                              <a href="javascript:void(0);" onclick="prim(<?php echo $list['Library']['id'] . ",'" . $data['ItemDetail']['id'] . "','slider'"; ?>);" class="btn btn-primary" role="button">Make Primary</a><?php } ?>
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

          
          <br><br><br>
          <div class="clearfix"></div>


          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Gallery</h3>
            </div>

            <div class="row" id="sortable_gal">
              <?php
                if (isset($gallery) && !empty($gallery)) {
                  foreach ($gallery as $list) {
                    $main = show_image('cdn/' . $list['Library']['folder'], $list['Library']['file_name'], 150, 150, 100, 'cf', null);
              ?>
                  <div class="col-sm-2 col-md-3 ui-sortable-handle" id="gal_<?php echo $list['Library']['id']; ?>">
                    <div class="thumbnail">
                      <img src="<?php echo $main; ?>" alt="" title="" class="margin">
                      <div class="caption">
                        <p><a href="javascript:void(0);" onclick="del_pic(<?php echo $list['Library']['id'] . ",'" . $data['ItemDetail']['id'] . "','gallery'"; ?>);" class="btn btn-primary" role="button">Delete</a>
                      </div>
                    </div>
                  </div>
              <?php }
                } ?>
              <div class="clearfix"></div>
            </div>
          </div>
          <div id="pic_err"></div>

        <?php } elseif (isset($q['tab']) && $q['tab'] == 'catback') { ?>
          <div class="active tab-pane">
            <div class="box box-success">
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Cat Back exhaust system</h3>
                  <a class="btn btn-app" href="javascript:void(0);" onclick="add_cat(<?php echo $data['ItemDetail']['id']; ?>,'cat-back')"><i class="fa fa-plus-square"></i> Add New Cat-Back </a>
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
                          $arrList = explode(',', $data['ItemDetail']['cat_back_ids']);
                          $cList = $this->Lab->getProduct($arrList);
                          if (!empty($cList)) {
                            foreach ($cList as $aList) {
                              $full_path = 'cdn/' . $aList['Library']['folder'] . "/" . $aList['Library']['file_name'];
                              $imgg  = new_show_image($full_path, 100, 100, 100, 'ff', null); ?>
                              <tr class="odd gradeX">
                                <td class="center gnTxt"><img src="<?php echo $imgg; ?>" class="img-thumbnail" alt=""> </td>
                                <td><?php if ($aList['Product']['type'] == 2) {
                                      echo "Cat-back";
                                    } elseif ($aList['Product']['type'] == 3) {
                                      echo "Catalytic";
                                    } elseif ($aList['Product']['type'] == 1) {
                                      echo "Tuning Box";
                                    } ?></td>
                                <td><?php echo $aList['Brand']['name'] . "/ " . $aList['Model']['name'] . "/ " . $aList['Motor']['name']; ?></td>
                                <td><?php echo $aList['Product']['title']; ?></td>
                                <td><?php echo $aList['Product']['part']; ?></td>
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

        <?php } elseif (isset($q['tab']) && $q['tab'] == 'catalytic') { ?>
          <div class="active tab-pane">
            <div class="box box-success">
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Catalytic system</h3>
                  <a class="btn btn-app" href="javascript:void(0);" onclick="add_cat(<?php echo $data['ItemDetail']['id']; ?>,'catalytic')"><i class="fa fa-plus-square"></i> Add New Catalytic </a>
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
                          $arrList = explode(',', $data['ItemDetail']['catalytic_ids']);
                          $cList = $this->Lab->getProduct($arrList);
                          if (!empty($cList)) {
                            foreach ($cList as $aList) {
                              $full_path = 'cdn/' . $aList['Library']['folder'] . "/" . $aList['Library']['file_name'];
                              $imgg  = new_show_image($full_path, 100, 100, 100, 'ff', null); ?>
                              <tr class="odd gradeX">
                                <td class="center gnTxt"><img src="<?php echo $imgg; ?>" class="img-thumbnail" alt=""> </td>
                                <td><?php if ($aList['Product']['type'] == 2) {
                                      echo "Cat-back";
                                    } elseif ($aList['Product']['type'] == 3) {
                                      echo "Catalytic";
                                    } elseif ($aList['Product']['type'] == 1) {
                                      echo "Tuning Box";
                                    } ?></td>
                                <td><?php echo $aList['Brand']['name'] . "/ " . $aList['Model']['name'] . "/ " . $aList['Motor']['name']; ?></td>
                                <td><?php echo $aList['Product']['title']; ?></td>
                                <td><?php echo $aList['Product']['part']; ?></td>
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

        <?php } elseif (isset($q['tab']) && $q['tab'] == 'accessory') { ?>

          <div class="active tab-pane">
            <div class="box box-success">
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Accessory</h3>
                  <a class="btn btn-app" href="javascript:void(0);" onclick="add_cat(<?php echo $data['ItemDetail']['id']; ?>,'accessory')"><i class="fa fa-plus-square"></i> Add New Accessory </a>
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
                          $arrList = explode(',', $data['ItemDetail']['accessory_ids']);
                          $cList = $this->Lab->getProduct($arrList);
                          if (!empty($cList)) {
                            foreach ($cList as $aList) {

                              $full_path = 'cdn/no_image_available.jpg';

                              if (isset($aList['Library']['file_name']) && !empty($aList['Library']['file_name'])) {
                                $full_path = 'cdn/' . $aList['Library']['folder'] . "/" . $aList['Library']['file_name'];
                              }

                              $imgg = new_show_image($full_path, 100, 100, 100, 'ff', null);

                          ?>
                              <tr class="odd gradeX">
                                <td class="center gnTxt"><img src="<?php echo $imgg; ?>" class="img-thumbnail" alt=""> </td>
                                <td><?php if ($aList['Product']['type'] == 2) {
                                      echo "Cat-back";
                                    } elseif ($aList['Product']['type'] == 3) {
                                      echo "Catalytic";
                                    } elseif ($aList['Product']['type'] == 5) {
                                      echo "Accessory";
                                    } ?></td>
                                <td><?php echo $aList['Brand']['name'] . "/ " . $aList['Model']['name'] . "/ " . $aList['Motor']['name']; ?></td>
                                <td><?php echo $aList['Product']['title']; ?></td>
                                <td><?php echo $aList['Product']['part']; ?></td>
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
        <?php } elseif (isset($q['tab']) && $q['tab'] == 'shipping') {
                echo $this->Html->script(array('jquery.form.min'));
                echo $this->html->script(array('/v/formValidation.min', '/v/bootstrap.min'));

                echo $this->Form->create('Shipping', array('id' => 'shFrm'));
                echo $this->Form->hidden('item_detail_id', array('value' => $data['ItemDetail']['id']));

                echo $this->Form->hidden('brand_id', array('value' => $data['ItemDetail']['brand_id']));
                echo $this->Form->hidden('model_id', array('value' => $data['ItemDetail']['model_id']));
                echo $this->Form->hidden('motor_id', array('value' => $data['ItemDetail']['motor_id']));

                echo $this->Form->hidden('type1', array('value' => 2));
                echo $this->Form->hidden('type2', array('value' => 3));
                echo $this->Form->hidden('type3', array('value' => 1));
        ?>


          <div class="box box-default">
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group"><label>Country </label>
                    <?php echo $this->Form->input('country', array('id' => 'country_id', 'options' => @$cList, 'empty' => ' --Select Country-- ', 'default' => @$q['cid'], 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control', 'required' => true)); ?></div>
                </div>
                <div class="col-md-6">
                  <div class="form-group"><label>State </label>
                    <?php echo $this->Form->input('state', array('id' => 'state', 'options' => @$sList, 'empty' => ' --Select State-- ', 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control', 'required' => true)); ?></div>
                  <!-- /.form-group -->
                </div>


                <!-- /.col -->
                <div class="col-md-6">

                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Shipping cost for Cat Back Exhaust</h3>
                    </div>
                    <div class="box-body">
                      <div class="row">
                        <div class="col-xs-5">
                          <div class="form-group"><label>For Customer</label><?php echo $this->Form->input('Shipping.type1.for_customer', array('type' => 'number', 'class' => 'form-control', 'label' => false, 'required' => true, 'min' => 1, 'max' => 500)); ?></div>
                        </div>
                        <div class="col-xs-5">
                          <div class="form-group"><label>For Dealer</label><?php echo $this->Form->input('Shipping.type1.for_dealer', array('type' => 'number', 'class' => 'form-control', 'label' => false, 'required' => true, 'min' => 1, 'max' => 500)); ?></div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-md-6">

                  <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Shipping cost for Catalytic Converter</h3>
                    </div>
                    <div class="box-body">
                      <div class="row">
                        <div class="col-xs-5">
                          <div class="form-group"><label>For Customer</label><?php echo $this->Form->input('Shipping.type2.for_customer', array('type' => 'number', 'class' => 'form-control', 'label' => false, 'required' => true, 'min' => 1, 'max' => 500)); ?></div>
                        </div>
                        <div class="col-xs-5">
                          <div class="form-group"><label>For Dealer</label><?php echo $this->Form->input('Shipping.type2.for_dealer', array('type' => 'number', 'class' => 'form-control', 'label' => false, 'required' => true, 'min' => 1, 'max' => 500)); ?></div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-md-6">

                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Shipping cost for Tuning Box</h3>
                    </div>
                    <div class="box-body">
                      <div class="row">
                        <div class="col-xs-5">
                          <div class="form-group"><label>For Customer</label><?php echo $this->Form->input('Shipping.type3.for_customer', array('type' => 'number', 'class' => 'form-control', 'label' => false, 'required' => true, 'min' => 1, 'max' => 500)); ?></div>
                        </div>
                        <div class="col-xs-5">
                          <div class="form-group"><label>For Dealer</label><?php echo $this->Form->input('Shipping.type3.for_dealer', array('type' => 'number', 'class' => 'form-control', 'label' => false, 'required' => true, 'min' => 1, 'max' => 500)); ?></div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Save</button>
              </div>
            </div>
          </div>
          <?php echo $this->Form->end(); ?>
          <script type="text/javascript">
            $(document).ready(function() {
              $('#shFrm')
                .formValidation({
                  framework: 'bootstrap',
                  icon: {},
                  err: {},
                  fields: {}
                }).on('success.form.fv', function(e) {
                  // Prevent form submission
                  e.preventDefault();

                  var $form = $(e.target),
                    fv = $form.data('formValidation');

                  // Use Ajax to submit form data
                  fv.defaultSubmit();
                });

              $("#country_id").change(function() {
                window.location.href = '<?php echo SITEURL . "lab/labs/update_car_detail/" . $data['ItemDetail']['id'] . "?tab=shipping"; ?>&cid=' + this.value;
              });
            });
          </script>
        <?php } elseif (isset($q['tab']) && $q['tab'] == 'manage_shipping') { ?>

          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Country and State</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group"><label>Country </label>
                    <?php echo $this->Form->input('country', array('id' => 'country_id', 'options' => @$cList, 'empty' => ' --Select Country-- ', 'default' => @$q['cid'], 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control', 'required' => true)); ?></div>
                </div>
                <div class="col-md-6">
                  <div class="form-group"><label>State </label>
                    <?php echo $this->Form->input('state', array('id' => 'state', 'options' => @$sList, 'empty' => ' --Select State-- ', 'default' => @$q['sid'], 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control', 'required' => true)); ?></div>
                  <!-- /.form-group -->
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <?php if (isset($sData) && !empty($sData)) { ?>
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">All Shipping Cost</h3>
              </div>
              <div class="box-body">
                <div class="row" id="lab_table">
                  <table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
                    <thead>
                      <tr role="row">
                        <th>Type</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>Brand</th>
                        <th>Dealer Cost</th>
                        <th>Customer Cost</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody id="table_rows">
                      <?php if (!empty($sData)) {
                        $menuType = $this->Lab->menuType();
                        foreach ($sData as $sList) { ?>
                          <tr>
                            <td class="center gnTxt"><?php echo @$menuType[$sList['Shipping']['type']]; ?></td>
                            <td class="center gnTxt"><?php echo $sList['Country']['name']; ?></td>
                            <td class="center gnTxt"><?php echo $sList['State']['name']; ?></td>
                            <td class="center gnTxt"><?php echo $sList['Brand']['name']; ?></td>



                            <td class="center gnTxt"><?php echo $sList['Shipping']['for_dealer']; ?></td>
                            <td class="center gnTxt"><?php echo $sList['Shipping']['for_customer']; ?></td>
                            <td class="center gnTxt"><a href="<?php echo SITEURL . "lab/labs/updated_shipping/" . $sList['Shipping']['id']; ?>" class="GnResPopAjax_act" title="">Edit</a></td>
                          </tr>
                        <?php }
                      } else { ?>
                        <td colspan="7">Your Shipping cost tab is empty</td>
                      <?php } ?>
                    </tbody>
                  </table>
                  <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                      <ul class="pagination">
                        <?php
                        echo $this->Paginator->prev('Previous', array('tag' => 'li'), null, array('class' => 'paginate_button previous disabled'));
                        echo $this->Paginator->numbers(array('modulus' => 1, 'first' => 2, 'last' => 2, 'separator' => '', 'tag' => 'li', 'ellipsis' => false, 'class' => 'paginate_button'));
                        echo $this->Paginator->next('Next', array('tag' => 'li'), null, array('class' => 'paginate_button previous disabled')); ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
          <?php } ?>
          <script type="text/javascript">
            $(document).ready(function() {

              $("#country_id").change(function() {
                window.location.href = '<?php echo SITEURL . "lab/labs/update_car_detail/" . $data['ItemDetail']['id'] . "?tab=manage_shipping"; ?>&cid=' + this.value;
              });
              $("#state").change(function() {
                window.location.href = '<?php echo SITEURL . "lab/labs/update_car_detail/" . $data['ItemDetail']['id'] . "?tab=manage_shipping"; ?>&cid=' + $("#country_id").val() + '&sid=' + this.value;
              });

            });
          </script>
        <?php } elseif (isset($q['tab']) && $q['tab'] == 'import_shipping') { ?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Import shipping costs</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="box-body">
                  <div class="col-md-6">
                    <div class=" ">
                      <?php echo $this->Form->create('Shipping', array('type' => 'file', 'url' => array('controller' => 'labs', 'action' => 'up_xls'),)); ?>
                      <div class="box-body">
                        <div class="form-group"><label for="exampleInputFile">File input</label>
                          <?php echo $this->Form->file('file', array('multiple' => 'multiple', 'accept' => 'application/vnd.ms-excel')); ?>
                        </div>
                      </div>
                      <div id="text_err"></div>
                      <div class="box-footer"><button type="button" class="btn btn-primary" id="bt">Submit</button></div>
                      <?php echo $this->Form->end(); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Export shipping cost</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="box-body">
                  <div class="col-md-6">
                    <div class=" ">
                      <div id="text_err"></div>
                      <div class="box-footer"><button type="button" class="btn btn-primary" id="exp">Export</button></div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <script>
            $(document).ready(function() {
              $("#exp").click(function() {
                window.location = '<?php echo SITEURL . "lab/labs/new_xls/" . $data['ItemDetail']['id']; ?>';
              });

              $("#bt").click(function() {

                var status = $('#text_err');
                $("#ShippingUpXlsForm").ajaxForm({
                  target: '#text_err',
                  beforeSend: function() {
                    $('#preloader_photo').show();
                    $('#preloader_photo .percent').html('0%');
                  },
                  uploadProgress: function(event, position, total, percentComplete) {
                    if (percentComplete < 100) {
                      var percentVal = percentComplete + '%';
                      $('#preloader_photo .percent').html(percentVal);
                    } else {
                      $('#preloader_photo .percent').html('Wait');
                    }
                  },
                  complete: function(xhr) {
                    $('#preloader_photo').hide();
                  },
                }).submit();

              });
            });
          </script>
        <?php } elseif (isset($q['tab']) && $q['tab'] == 'multilingual') { ?>
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Create new page in other language</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-xs-3">
                  <?php echo $this->Form->input('lang', array('options' => $langArr, 'class' => 'form-control', 'label' => false, 'empty' => ' -- Select Language -- '));
                  echo $this->Form->hidden('cid', array('value' => $data['ItemDetail']['id'], 'id' => 'carde_id'));
                  ?>
                </div>
                <div class="col-xs-4">
                  <input type="button" class="btn bg-olive btn-flat " value="Create new page" id="gen_page">
                </div>

              </div>
            </div>


            <div id="lang_err"> </div>

            <div class="box-header">
              <h3 class="box-title">Manage multilingual page</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <th>#</th>
                    <th>Language</th>
                    <th>Created</th>
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
                            if (!empty($pList['ItemDetail']['url'])) {
                              echo $this->html->link($langArr[$pList['ItemDetail']['language']], '/product/' . $pList['ItemDetail']['url'], array('target' => '_blank'));
                            } else {
                              echo $langArr[$pList['ItemDetail']['language']];
                            } ?></td>
                        <td><?php echo date('d/m/Y', strtotime($pList['ItemDetail']['created'])); ?></td>
                        <td><?php echo $this->html->link('Edit', '/lab/labs/lang_car_detail/' . $pList['ItemDetail']['id'] . "/" . $pList['ItemDetail']['language']);; ?></td>
                        <td> <?php
                              if ($pList['ItemDetail']['status'] == 1) {
                                echo $this->html->link('Active', '/lab/labs/update_car_detail/' . $data['ItemDetail']['id'] . '?lng_act=' . $pList['ItemDetail']['id'], array('class' => 'text-green', 'confirm' => 'Do you want to inactive this page?'));
                              } elseif ($pList['ItemDetail']['status'] == 0) {
                                echo $this->html->link('Inactive', '/lab/labs/update_car_detail/' . $data['ItemDetail']['id'] . '?lng_act=' . $pList['ItemDetail']['id'], array('class' => 'text-red', 'confirm' => 'Do you want to active this page?'));
                              }

                              ?> </td>
                        <td> <?php echo $this->html->link('Delete', '/lab/labs/update_car_detail/' . $data['ItemDetail']['id'] . '?lng_del=' . $pList['ItemDetail']['id'], array('class' => 'text-red', 'confirm' => 'Do you want to delete this page?')); ?> </td>
                      </tr>
                  <?php $num++;
                    }
                  } ?>


                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
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
                    data: "cid=" + cid + "&lang=" + lang + "",
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
        </div><!-- /.tab-pane -->
      </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
</div><!-- /.col -->


<script>
  function add_cat(id, type) {
    $.magnificPopup.open({
      items: {
        src: '<?php echo SITEURL; ?>lab/labs/add_product/' + id + '/' + type,
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
        url: '<?php echo SITEURL; ?>lab/labs/primary_img/',
        data: 'type=primary&dtype=' + ty + '&lid=' + lid + '&id=' + id + '',
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
        url: '<?php echo SITEURL; ?>lab/labs/up_details/',
        data: 'type=del&dtype=' + ty + '&lid=' + lid + '&id=' + id + '',
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

  function add_gallery(id) {
    $.magnificPopup.open({
      items: {
        src: '<?php echo SITEURL . "lab/labs/add_media/"; ?>' + id + '/galery',
        type: 'ajax'
      },
      closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)"> </button>',
      closeOnContentClick: false,
      closeOnBgClick: false,
      showCloseBtn: true,
      enableEscapeKey: false,
    });
  }

  function add_slider(id, type) {
    $.magnificPopup.open({
      items: {
        src: '<?php echo SITEURL . "lab/labs/add_media/"; ?>' + id + '/slider/' + type,
        type: 'ajax'
      },
      closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)"> </button>',
      closeOnContentClick: false,
      closeOnBgClick: false,
      showCloseBtn: true,
      enableEscapeKey: false,
    });
  }

  function add_q_images(id) {
    $.magnificPopup.open({
      items: {
        src: '<?php echo SITEURL . "lab/labs/add_media/"; ?>' + id + '/q_images',
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

      $("#sortable_gal").sortable({
        opacity: 0.6,
        cursor: 'move',
        update: function() {
          var datastring = $(this).sortable("serialize");
          $(function() {
            $.ajax({
              type: 'POST',
              url: '<?php echo SITEURL; ?>lab/labs/change_positions_pic/gal',
              data: datastring,
              success: function(data) {
                $("#ajax_req").html(data);
              },
              error: function(comment) {}
            });
          });
        }
      });

      $("#sortable_tt").sortable({
        opacity: 0.6,
        cursor: 'move',
        update: function() {
          var datastring = $(this).sortable("serialize");
          $(function() {
            $.ajax({
              type: 'POST',
              url: '<?php echo SITEURL; ?>lab/labs/change_positions_pic/tt',
              data: datastring,
              success: function(data) {
                $("#ajax_req").html(data);
              },
              error: function(comment) {}
            });
          });
        }
      });


      $("#sortable_ss").sortable({
        opacity: 0.6,
        cursor: 'move',
        update: function() {
          var datastring = $(this).sortable("serialize");
          $(function() {
            $.ajax({
              type: 'POST',
              url: '<?php echo SITEURL; ?>lab/labs/change_positions_pic/ss',
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