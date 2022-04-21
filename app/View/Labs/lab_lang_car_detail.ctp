<style>
.upload-img-bx_in .img-phote-st{background-image:url(../images/file-icon.png);background-repeat:no-repeat;background-position:center 40%}

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
	
</style>
<div id="preloader_photo" class="img-phote-st" style="display: none"> <div class="percent">0%</div> </div>
<div class="content-wrapper">

<section class="content-header"><h1>
<?php echo $langArr[$data['ItemDetail']['language']];?>
<a href="<?php echo SITEURL."lab/labs/update_car_detail/".$data['ItemDetail']['item_detail_id']."?tab=multilingual";?>">
<?php 
echo $data['Brand']['name']."/".$data['Model']['name']."/".$data['Motor']['name']." > ".$data['ItemDetail']['name'];?></a></h1></section>
    
        <section class="content">
        <div class="clearfix"></div>
        <?php echo $this->Session->flash('msg');?>
          <div class="row">
			<div class="col-md-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="<?php if(empty($q)){ echo "active";}?>"><a href="<?php echo SITEURL."lab/labs/lang_car_detail/".$data['ItemDetail']['id']."/".$lang;?>" >General</a></li>
                  <li class="<?php if(isset($q['tab']) && $q['tab'] == 'data'){ echo "active";}?>"><a href="<?php echo SITEURL."lab/labs/lang_car_detail/".$data['ItemDetail']['id']."/".$lang."?tab=data";?>" >Data</a></li>
                  <li class="<?php if(isset($q['tab']) && $q['tab'] == 'images'){ echo "active";}?>"><a href="<?php echo SITEURL."lab/labs/lang_car_detail/".$data['ItemDetail']['id']."/".$lang."?tab=images";?>" >Images</a></li>
                  <li class="<?php if(isset($q['tab']) && $q['tab'] == 'videos'){ echo "active";}?>"><a href="<?php echo SITEURL."lab/labs/lang_car_detail/".$data['ItemDetail']['id']."/".$lang."?tab=videos";?>" >Videos</a></li>
                  <li class="<?php if(isset($q['tab']) && $q['tab'] == 'quality'){ echo "active";}?>"><a href="<?php echo SITEURL."lab/labs/lang_car_detail/".$data['ItemDetail']['id']."/".$lang."?tab=quality";?>" >Quality & Detail</a></li>
                  
                  
                </ul>
                <div class="tab-content">
<div class="active tab-pane">
<?php 
if(empty($q)){
echo $this->Form->create('ItemDetail',array('class'=>'form-horizontal'));
if(isset($data['ItemDetail']) && !empty($data['ItemDetail'])){
	$this->request->data['ItemDetail'] = $data['ItemDetail'];
	echo $this->Form->hidden('id'); }?>                  

<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Heading</label>
<div class="col-sm-10"><?php echo $this->Form->input('heading',array('class'=>'form-control','placeholder'=>'Heading','label'=>false,'required'=>false));?></div></div>

<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Video</label>
<div class="col-sm-10"><?php echo $this->Form->input('vid',array('class'=>'form-control','placeholder'=>'Heading','label'=>false,'required'=>false,'placeholder'=>'Youtube Video ID'));?></div></div>


<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Title</label>
<div class="col-sm-10"><?php echo $this->Form->input('name',array('class'=>'form-control','placeholder'=>'Title','label'=>false,'required'=>true));?></div></div>
<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Description</label>
<div class="col-sm-10"><?php echo $this->Form->input('description',array('class'=>'form-control','placeholder'=>'Description','label'=>false,'required'=>true));?></div></div>
<div class="form-group"><label for="inputName" class="col-sm-2 control-label">SEO URL</label>
<div class="col-sm-10"><?php echo $this->Form->input('url',array('class'=>'form-control','placeholder'=>'url','label'=>false,'required'=>true));?></div></div>
<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Meta Title</label>
<div class="col-sm-10"><?php echo $this->Form->input('meta_title',array('class'=>'form-control','placeholder'=>'Meta Title','label'=>false,'required'=>true));?></div></div>
<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Meta Description</label>
<div class="col-sm-10"><?php echo $this->Form->input('meta_description',array('type'=>'text','class'=>'form-control','placeholder'=>'Meta Description','label'=>false));?></div></div>
<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Meta Keywords</label>
<div class="col-sm-10"><?php echo $this->Form->input('meta_keywords',array('type'=>'text','class'=>'form-control','placeholder'=>'Meta Keywords','label'=>false));?></div></div>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-success" value="Save">
</div></div>

<script>
window['ToSeoUrl'] = function(url) {
	  // make the url lowercase         
	  var encodedUrl = url.toString().toLowerCase(); 
	  // replace & with and           
	  encodedUrl = encodedUrl.split(/\&+/).join("-and-")
	  // remove invalid characters 
	  encodedUrl = encodedUrl.split(/[^a-z0-9]/).join("-");       
	  // remove duplicates 
	  encodedUrl = encodedUrl.split(/-+/).join("-");
	  // trim leading & trailing characters 
	  encodedUrl = encodedUrl.trim('-');
	  encodedUrl = encodedUrl.replace(/^-|-$/g, ''); 
	  return encodedUrl; 
	};
$(document).ready(function(){
$('#ItemDetailName').focusout(function() {
	var v = $.trim( this.value );
	if(v != ""){
		//$('#ItemDetailMetaTitle').val(v.toLowerCase());
		//if( $.trim($('#ItemDetailUrl').val()) == "" ){ $('#ItemDetailUrl').val(ToSeoUrl(v)); }
		
	}
});

});
</script>


<?php echo $this->Form->end(); }
elseif(isset($q['tab']) && $q['tab'] == 'data'){ 
	echo $this->Form->create('ItemDetail',array('class'=>'form-horizontal'));
	if(isset($data['ItemDetail']) && !empty($data['ItemDetail'])){
		$this->request->data['ItemDetail'] = $data['ItemDetail'];
		echo $this->Form->hidden('id'); }
	?>
<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Power</label>
<div class="col-sm-10"><?php echo $this->Form->input('power',array('class'=>'form-control','placeholder'=>'Power','label'=>false,'required'=>true));?></div></div>
<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Torque</label>
<div class="col-sm-10"><?php echo $this->Form->input('torque',array('class'=>'form-control','placeholder'=>'Torque','label'=>false,'required'=>true));?></div></div>
<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Weight</label>
<div class="col-sm-10"><?php echo $this->Form->input('weight',array('class'=>'form-control','placeholder'=>'Weight','label'=>false,'required'=>true));?></div></div>


<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Installation Manual</label>
<div class="col-sm-10"><?php echo $this->Form->input('installation_manual',array('type'=>'text','class'=>'form-control','placeholder'=>'Installation Manual','label'=>false,'required'=>false));?></div></div>
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
<?php */?>
<br><br>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-success" value="Save">
</div></div>

<?php echo $this->Form->end(); }
elseif(isset($q['tab']) && $q['tab'] == 'videos'){
	$vArr = array();
	if(!empty($data['ItemDetail']['videos'])){$vArr = explode(',',$data['ItemDetail']['videos']);}
?>

<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Add new Video</h3>
            </div>
            <div class="box-body">
<?php echo $this->Form->create('ItemDetail', array('url' => array('controller' => 'labs', 'action' => 'add_utube')));
	if(isset($data['ItemDetail']) && !empty($data['ItemDetail'])){ $this->request->data['ItemDetail'] = $data['ItemDetail'];
	echo $this->Form->hidden('id'); }
            ?>
              <div class="row"><div class="col-xs-6">
              <?php echo $this->Form->input('vid',array('class'=>'form-control','placeholder'=>'Youtube Video ID or URL here','label'=>false,'required'=>true))?></div>
                <div class="col-xs-2"><input type="submit" class="btn btn-success" value="Save"></div>
                <?php echo $this->Form->end();?>
              </div>
            </div>
            <!-- /.box-body -->
          </div>

<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">All Video</h3>
            </div>
<div class="row">
<?php if(!empty($vArr)){
	foreach ($vArr as $k=>$v){ ?>
	 <div class="col-sm-2 col-md-3">
	<div class="thumbnail">
<img src="https://i.ytimg.com/vi/<?php echo trim($v,"'");?>/mqdefault.jpg" alt="" title="" class="margin">
 <div class="caption">
        <p><a href="javascript:void(0);" onclick="del(<?php echo $data['ItemDetail']['id'].",'".$v."'";?>);" class="btn btn-primary" role="button">Delete</a> 
        
      </div></div></div>
      
<?php } }?>
<div class="clearfix"></div>              
</div></div>
<?php }
elseif(isset($q['tab']) && $q['tab'] == 'quality'){ ?>
<div class="box box-success">
<div class="box-header with-border"><h3 class="box-title">Quality & Detail</h3></div>
<div class="box-body">
<div class="row"></div>
<div class="col-md-2"><input type="button" class="btn btn-success" value="Add Photos" onclick="add_q_images(<?php echo $data['ItemDetail']['id'];?>);"></div>
<input type="hidden" value="" id="slider">
</div>
</div>
</div>

<div class="box box-info"><div class="box-header"><h3 class="box-title">Images</h3></div><div class="row">
<?php 
if(isset($data['QualityDetail']) && !empty($data['QualityDetail'])){
	foreach ($data['QualityDetail'] as $list){
		$main = new_show_image('cdn/'.$list['Library']['full_path'],150,150,100,'cf',null);
	?>
<div class="col-sm-2 col-md-3">
<div class="thumbnail">
<img src="<?php echo $main;?>" alt="" title="" class="margin">
 <div class="caption">
<textarea rows="5" class="col-md-12" placeholder="Title" id="<?php echo $list['id'];?>"><?php echo $list['title'];?></textarea>
<div class="clearfix"></div>
<br><br>
<p>
<a href="javascript:void(0);" onclick="del_q_pic(<?php echo $list['id'];?>);" class="btn btn-default" role="button">Delete</a>
<a href="javascript:void(0);" onclick="save_text(<?php echo $list['id'];?>);" class="btn btn-success pull-right" role="button">Save</a>
</p> 
</div></div></div>
<?php } }?>
<div class="clearfix"></div></div></div>
<script>
function save_text(id){

	if(id!=""){
		var t = $.trim($('#'+id).val());
		if(t != ""){
	$('#preloader').show();
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL;?>lab/labs/up_quality_detail/',
			data: 'type=edit&id='+id+'&title='+t,
			success: function(data) { $("#pic_err").html(data); $('#preloader').hide();},
			error: function(comment) { $("#pic_err").html(comment);  $('#preloader').hide(); }});
		}else{ $('#'+id).focus(); }
		}
		
	}
function del_q_pic(id){

if(id!=""){
$('#preloader').show();
	$.ajax({type: 'POST',
		url: '<?php echo SITEURL;?>lab/labs/up_quality_detail/',
		data: 'type=del&id='+id+'',
		success: function(data) { $("#pic_err").html(data); location.reload(); },
		error: function(comment) { $("#pic_err").html(comment);  location.reload();}});
	}
	
}
</script>
<div id="pic_err"></div>
<?php }
elseif(isset($q['tab']) && $q['tab'] == 'images'){
	$sArr = array();
	
?>
<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Images</h3>
            </div>
            <div class="box-body">

<div class="row"></div>

<div class="col-md-2"><input type="button" class="btn btn-success" value="Slider" onclick="add_slider(<?php echo $data['ItemDetail']['id'];?>);"></div>
<div class="col-md-2"><input type="button" class="btn btn-success" value="Gallery" onclick="add_gallery(<?php echo $data['ItemDetail']['id'];?>);"></div>
<input type="hidden" value="" id="slider">
<input type="hidden" value="" id="gallery">
              </div>
            </div>
            <!-- /.box-body -->
          </div>

<div class="box box-info"><div class="box-header"><h3 class="box-title">Slider</h3></div><div class="row">
<?php 
if(isset($sliders) && !empty($sliders)){
	$n = 1;
	foreach ($sliders as $list){
		$main = show_image('cdn/'.$list['Library']['folder'],$list['Library']['file_name'],150,150,100,'cf',null);
	?>
<div class="col-sm-2 col-md-3">
<div class="thumbnail">
<img src="<?php echo $main;?>" alt="" title="" class="margin">
 <div class="caption">
<p><a href="javascript:void(0);" onclick="del_pic(<?php echo $list['Library']['id'].",'".$data['ItemDetail']['id']."','slider'";?>);" class="btn btn-primary" role="button">Delete</a> 
<?php if($n != 1){?>
<a href="javascript:void(0);" onclick="prim(<?php echo $list['Library']['id'].",'".$data['ItemDetail']['id']."','slider'";?>);" class="btn btn-primary" role="button">Make Primary</a><?php }?> 
</p>
</div></div></div>
<?php $n++; } }?>
<div class="clearfix"></div></div></div>


<div class="box box-info"><div class="box-header"><h3 class="box-title">Gallery</h3></div><div class="row">
<?php 
if(isset($gallery) && !empty($gallery)){
	foreach ($gallery as $list){
		$main = show_image('cdn/'.$list['Library']['folder'],$list['Library']['file_name'],150,150,100,'cf',null);
	?>
<div class="col-sm-2 col-md-3">
<div class="thumbnail">
<img src="<?php echo $main;?>" alt="" title="" class="margin">
 <div class="caption">
        <p><a href="javascript:void(0);" onclick="del_pic(<?php echo $list['Library']['id'].",'".$data['ItemDetail']['id']."','gallery'";?>);" class="btn btn-primary" role="button">Delete</a> 
</div></div></div>
<?php } }?>
<div class="clearfix"></div></div></div>
<div id="pic_err"></div>

<?php } ?>

                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          
<script>
function add_cat(id,type){
	$.magnificPopup.open({items: {
	    src: '<?php echo SITEURL;?>lab/labs/add_product/'+id+'/'+type,
	    type: 'ajax'},
	closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)"> </button>',
	closeOnContentClick: false, closeOnBgClick: false, showCloseBtn: true, enableEscapeKey: false,
	});
}

function prim(lid,id,ty){

	if(lid != "" && id!="" && ty != ""){
		$('#preloader').show();
	$.ajax({type: 'POST',
		url: '<?php echo SITEURL;?>lab/labs/primary_img/',
		data: 'type=primary&dtype='+ty+'&lid='+lid+'&id='+id+'',
		success: function(data) { $("#pic_err").html(data);  location.reload();  },
		error: function(comment) { $("#pic_err").html(comment);  location.reload(); }});
	}
	
}
function del_pic(lid,id,ty){

	if(lid != "" && id!="" && ty != ""){
		$('#preloader').show();
	$.ajax({type: 'POST',
		url: '<?php echo SITEURL;?>lab/labs/up_details/',
		data: 'type=del&dtype='+ty+'&lid='+lid+'&id='+id+'',
		success: function(data) { $("#pic_err").html(data); location.reload(); },
		error: function(comment) { $("#pic_err").html(comment);  location.reload();}});
	}
	
}
function add_gallery(id){
			$.magnificPopup.open({items: {
			    src: '<?php echo SITEURL."lab/labs/add_media/";?>'+id+'/galery',
			    type: 'ajax'},
			closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)"> </button>',
			closeOnContentClick: false, closeOnBgClick: false, showCloseBtn: true, enableEscapeKey: false,
			});
		}
function add_slider(id){
	$.magnificPopup.open({items: {
	    src: '<?php echo SITEURL."lab/labs/add_media/";?>'+id+'/slider',
	    type: 'ajax'},
	closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)"> </button>',
	closeOnContentClick: false, closeOnBgClick: false, showCloseBtn: true, enableEscapeKey: false,
	});
}

function add_q_images(id){
	$.magnificPopup.open({items: {
	    src: '<?php echo SITEURL."lab/labs/add_media/";?>'+id+'/q_images',
	    type: 'ajax'},
	closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)"> </button>',
	closeOnContentClick: false, closeOnBgClick: false, showCloseBtn: true, enableEscapeKey: false,
	});
}

function del(i,v){
	if(i != "" && v!=""){
		$('#preloader').show();
	$.ajax({type: 'POST',
		url: '<?php echo SITEURL;?>lab/labs/api_car/',
		data: 'type=del&i='+i+'&v='+v+'&tab=videos',
		success: function(data) { $("#cover").html(data); $('#preloader').hide();},
		error: function(comment) { $("#cover").html(comment);  $('#preloader').hide();}});
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
$(function () {
	$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
	    checkboxClass: 'icheckbox_flat-green',
	    radioClass: 'iradio_flat-green'
	  });
	});
	</script>
