<div style="<?php if(isset($aj) && !empty($aj)){ echo "max-width:90%;margin:20px auto";}?>" class="gn_new_pop" id="rental_all_history">
<style>
<?php if( isset($aj) && !empty($aj) ){ echo ".edit_lib{ margin-left: 0px !important;}"; };?>
.dl-horizontal dt {text-align:left !important;}
.dl-horizontal dd {margin-left: 110px;}
.dl-horizontal dt {width: auto;}
.b-buffer { margin-bottom:5px; } 
</style>
<div class="content-wrapper edit_lib">
<section class="content-header"><h1> Attachment Details</h1></section>
        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
<?php if(isset($data) && !empty($data)){
$main = show_image('cdn/'.$data['Library']['folder'],$data['Library']['file_name'],500,350,100,'cf',null);?>		  
<div class="box-body">
<div class="row">
        <div class="col-md-4">
          <div class="box box-solid">
            <div class="box-body">
              <img class="img-responsive pad" src="<?php echo $main;?>" alt="<?php echo $data['Library']['alt'];?>" title="<?php echo $data['Library']['title'];?>">
              <p><?php echo $data['Library']['description'];?></p>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="box box-solid">
            <div class="box-body">

<?php 
 $image = 'cdn/'.$data['Library']['folder'].'/'.$data['Library']['file_name'];
 
 if (file_exists($image)){
 	$path = pathinfo($image);
 	$name = $path['filename'];
 	$ext = $path['extension'];
 	list($width, $height) = getimagesize($image);
 	$resolution = $width . ' x '.$height;
 	$path = $path['dirname'];
 	$size = filesize($image);
 }
       
?>

<dl class="dl-horizontal">
<dt>Uploaded on</dt><dd><?php echo date('M d, Y',strtotime($data['Library']['created']));?></dd>
<?php if(isset($size)){?><dt>File size</dt><dd><?php echo $this->Lab->FileSizeConvert($size);?></dd><?php }?>
<?php if(isset($resolution)){?><dt>Dimensions</dt><dd><?php echo $resolution;?></dd><?php }?>
<dt>File path</dt><dd><?php echo  "<?php echo SITEURL;?>cdn/".$data['Library']['folder']."/".$data['Library']['file_name'];?></dd>
<?php if(isset($ext)){?><dt>File type</dt><dd><?php echo $ext;?></dd><?php }?>
</dl>  
</div>
<div class="box box-info">
<?php echo $this->Form->create('Library',array());
$this->request->data['Library'] = $data['Library'];
echo $this->Form->hidden('id');
?>
<div class="box-body">

<div class="form-group"><label class="col-sm-2 control-label">New image name</label>
<div class="col-sm-10"><?php echo $this->Form->input('new_image',array('maxlength'=>40,'class'=>'form-control','label'=>false,'div'=>false));?></div></div>
<div class="clearfix b-buffer"></div>

<div class="form-group"><label class="col-sm-2 control-label">Title</label>
<div class="col-sm-10"><?php echo $this->Form->input('title',array('maxlength'=>140,'class'=>'form-control','label'=>false,'div'=>false));?></div></div>
<div class="clearfix b-buffer"></div>
<div class="form-group"><label class="col-sm-2 control-label">Alt</label>
<div class="col-sm-10"><?php echo $this->Form->input('alt',array('maxlength'=>140,'class'=>'form-control','label'=>false,'div'=>false));?></div></div>
<div class="clearfix b-buffer"></div>
<div class="form-group"><label class="col-sm-2 control-label">Description</label>
<div class="col-sm-10"><?php echo $this->Form->input('description',array('class'=>'form-control','label'=>false,'div'=>false));?></div></div>
<div class="clearfix b-buffer"></div>
</div>

<div id="abc_error"></div>
<div class="box-footer">
<div class="col-sm-4 pull-right"><input type="button"  class="btn btn-success  pull-right" value="Save" id="lib_save"></div>

<div class="col-sm-2 pull-right"> <input type="button"  class="btn btn-danger pull-right" value="Delete" id="lib_del" data-toggle="modal" data-target=".bs-example-modal-sm"></div>


</div>
              <!-- /.box-footer -->
            </form>
          </div>            
            
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
              
              
            </div><!-- /.box-body -->
            <div class="box-footer">
            <div class="col-xs-2 col-xs-offset-10">
              <button type="button" class="btn btn-block btn-default btn-flat" onclick="$.magnificPopup.close();">Close</button>
              </div>
            </div><!-- /.box-footer-->
<?php }else{?>		
<div class="alert alert-danger alert-dismissible">
<h4><i class="icon fa fa-ban"></i> Alert!</h4>Sorry, this is not working at the moment. Please try again later. </div>	
<?php }?>
</div><!-- /.box -->
        </section><!-- /.content -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header">
<h4 class="modal-title">Default Modal</h4></div>
<div class="modal-body"><p>Are you sure you want to permanently delete this file</p></div>
<div class="modal-footer">
<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-danger" onclick="del(<?php echo $data['Library']['id'];?>);">Delete</button>
</div></div></div></div></div>
      
<script>
function del(id){
	if(id != ''){ parent.window.location = "<?php echo SITEURL."lab/labs/del_lib/";?>"+id; }
}
$(document).ready(function(){

	
	$("#lib_save").click(function() {
		$("#lib_save").prop("disabled",true); $("#lib_save").val('Please wait..');
		var d = $('#LibraryLabEditLibraryForm').serialize();			    
		$.ajax({type: 'POST',
			url: '<?php echo SITEURL."lab/labs/save_library";?>',
			data: d,
			success: function(data) { $("#abc_error").html(data); },
			error: function(comment) { $("#abc_error").html(comment); $('#lib_save').prop('disabled',false); $('#lib_save').val('Save');}});
		  
		});


});	
</script>      
</div>