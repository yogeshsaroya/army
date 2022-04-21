<?php
echo $this->Html->css(array('/lab_root/plugins/select2/select2.min'));
echo $this->Html->script(array('jquery.form.min','/lab_root/plugins/select2/select2.full.min','/lab_root/js/dropzone'));
?>

<style>/*<![CDATA[*/#preloader{position:fixed;top:0;left:0;right:0;bottom:0;z-index:9999999;background:rgba(255,255,255,0.8)}#status{width:128px;height:128px;position:absolute;left:50%;top:50%;background-image:url(<?php echo SITEURL;?>img/preload.gif);background-repeat:no-repeat;background-position:center;margin:-7.5px 0 0 -80px}img{-webkit-box-shadow:0 2px 6px 2px rgba(0,0,0,0.75);-moz-box-shadow:0 2px 6px 2px rgba(0,0,0,0.75);box-shadow:0 2px 6px 2px rgba(0,0,0,0.75);margin-bottom:20px}.media:first-child{margin-top:15px}/*]]>*/</style>
<script>$(document).ready(function() { 
    $('#LibraryImg').change(function(){
        var status = $('#text_err'); 
   	       $("#LibraryLabMediaForm").ajaxForm({ 
    	       target: '#text_err',
    	    	beforeSend: function() { $('#preloader_photo').show();  $('#preloader_photo .percent').html('0%'); },
    	    	uploadProgress: function(event, position, total, percentComplete) { if( percentComplete < 100 ){ var percentVal = percentComplete + '%'; $('#preloader_photo .percent').html(percentVal);  } else{ $('#preloader_photo .percent').html('Wait'); } },
    	    	complete: function(xhr) {  $('#preloader_photo').hide(); }, }).submit(); });

    $("#search").click(function() {
		var s = $.trim($('#s').val());
		if(s == '' ){ window.location = "<?php echo SITEURL."lab/labs/media";?>"; }
		else{ window.location = "<?php echo SITEURL."lab/labs/media";?>?s="+s; }
	});
    $(".select2").select2();
    
    $( "#s_folder" ).change(function() {
    	var s = $.trim($('#s_folder').val());
		if(s == '' ){ window.location = "<?php echo SITEURL."lab/labs/media";?>"; }
		else{ window.location = "<?php echo SITEURL."lab/labs/media";?>?s="+s; }
    	});

    
    $("#cdel").click(function() {
	    	var allVals = [];
	        $('.clr:checked').each(function() { allVals.push($(this).val()); });
	        if( allVals != '') { $('#myModal').modal('show'); }
	        
        });
    $("#_dl").click(function() {
    	var allVals = [];
        $('.clr:checked').each(function() { allVals.push($(this).val()); });
        if( allVals != '') {
        	$('#myModal').modal('hide');
			$('#preloader').show();        				    
        	$.ajax({type: 'POST',
        		url: ''+SITEURL+'lab/labs/cl_lib',
        		data: 'id='+allVals,
        		success: function(data) { $("#text_err").html(data);},
        		error: function(comment) {  $("#text_err").html(comment); $('#preloader').hide();   }}); 
        }
        
    });
    
    $("#sall").click(function () {
        if(this.value == 'Select All'){ $(".clr").prop("checked", true); $('#'+this.id).val('unSelect All'); }
        else{ $(".clr").prop("checked", false); $('#'+this.id).val('Select All'); } 
    });
    
});


</script>
<style>
.btn-file{position:relative;overflow:hidden}
.btn-file input[type=file]{position:absolute;top:0;right:0;min-width:100%;min-height:100%;font-size:100px;text-align:right;filter:alpha(opacity=0);opacity:0;outline:0;background:white;cursor:inherit;display:block}
body{background-color:#fafafa;font-family:'Open Sans'}
.container{margin-top:150px}
.upload-img-bx_in .img-phote-st{background-image:url(../images/file-icon.png);background-repeat:no-repeat;background-position:center 40%}
.img-phote-st .percent{width:100px;height:100px;border-radius:100%;position:absolute;top:30%;background:#b1d7d9;background-repeat:no-repeat;background-position:center;text-align:center;line-height:100px;font-size:25px;left:50%}
</style>

<div id="preloader_photo" class="img-phote-st" style="display: none"> <div class="percent">0%</div> </div>
<div class="content-wrapper" style="min-height:1066px">
<section class="content-header">
<h1><a href="<?php echo SITEURL."lab/labs/media";?>" title="">Library</a><small>manage all photos
<?php if(isset($paging['Library']['count']) && $paging['Library']['count'] > 0){ echo "(".$paging['Library']['count'].")";}?> 
</small></h1>
</section>
<section class="content">
<div class="box">
<div class="box-body">
<div class="box box-primary">

<div class="box-body col-md-3">
<div class="form-group">
<label for="exampleInputEmail1">Folder name</label>
<?php 
$f = null;
if(isset($q_data) && !empty($q_data)){ $f = $q_data; }
?>
</div>
<div class="input-group">
  <?php echo $this->Form->input('folder',array('class'=>'form-control','placeholder'=>'Folder name','label'=>false,'div'=>false));?>
  <span class="input-group-btn"><button class="btn btn-default" type="button"><i class="glyphicon glyphicon-ok"></i></button> </span>
</div>
</div>

<?php if(isset($q_data) && !empty($q_data)){?>
<div class="col-md-9"> <div class="dropzone2"></div> </div>
<?php }?>
<div id="text_err"></div>

</div>
</div>
<div class="box-body">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<div class="box-tools">
<div class="col-sm-12 ">
<div class="col-sm-1"><h3 class="box-title">All files <?php if(isset($paging['Library']['count']) && $paging['Library']['count'] > 0){ echo "(".$paging['Library']['count'].")";}?></h3></div>
<div class="col-sm-5"><div class="form-group"><?php echo $this->Form->input('folder',array('options'=>$f_list,'default'=>$f, 'id'=>'s_folder','class'=>'form-control select2','label'=>false,'empty'=>' --Select Folder-- '));?></div></div>
<div class="col-sm-2"><div class="input-group input-group-sm " >
<input type="text" name="table_search" id="s" class="form-control pull-right" placeholder="Search">
<div class="input-group-btn" id="search"><button type="button" class="btn btn-default" ><i class="fa fa-search"></i></button></div></div></div>
<div class="col-sm-2"> <input type="button" class="btn btn-default" id="sall" value="Select All"> </div>
<div class="col-sm-2"> <input type="button" class="btn btn-default" id="cdel" value="Delete"> </div>
                

</div>

</div>
</div>
<br><br>
<div class="box-body table-responsive no-padding">
<div class="col-sm-12" id="lab_table">
<div class="row">
<?php if(isset($data) && !empty($data)){
	foreach($data as $list){
		$im = $main = show_image('cdn/'.$list['Library']['folder'],$list['Library']['file_name'],150,150,100,'cf',null);
	?>
<div class="col-xs-6 col-sm-2 media">

<div class="checkbox"><label><input type="checkbox" value="<?php echo $list['Library']['id'];?>" name="del" class="clr">Select</label></div>

<a class="pull-left GnResPopAjax" href="<?php echo SITEURL."lab/labs/edit_library/".$list['Library']['id'];?>">
<img class="img-responsive" src="<?php echo $im;?>" alt="<?php echo $list['Library']['alt'];?>" title="<?php echo $list['Library']['title'];?>"/></a></div>
<?php } }else{?>
<center><h3>Your Library is empty.</h3></center>
<?php }?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="box-footer">
<?php if(isset($paging['Library']['pageCount']) && $paging['Library']['pageCount'] > 1){?>
<div class="row" id="paginate_info">
<div class="col-sm-5">
<div class="dataTables_info" id="example2_info" role="status" aria-live="polite"><?php echo $this->Paginator->counter(
    'Page {:page} of {:pages}, showing {:current} records out of
     {:count} total, starting on record {:start}, ending on {:end}'
);?></div>
</div>
<div class="col-sm-7">
<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
<ul class="pagination">
<?php 
	echo $this->Paginator->prev('Previous', array('tag'=>'li'), null, array('class' => 'paginate_button previous disabled')); 
	echo $this->Paginator->numbers(array('modulus' => 1,'first' => 2,'last' => 2,'separator' =>'','tag'=>'li','ellipsis'=>false,'class'=>'paginate_button')); 
	echo $this->Paginator->next('Next', array('tag'=>'li'), null, array('class' => 'paginate_button previous disabled')); ?>
</ul>
</div>
</div>
</div>
<?php }?>
</div>
</div>
</section>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Files</h4>
      </div>
      <div class="modal-body">
       are you sure you want to delete the selected song from your library?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="_dl">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
(function() {

    $(".dropzone2").dropzone({
        
        margin: 20,
        width:'100%',height:80,                         
        uploadMode:'all',     
        allowedFileTypes: 'image/x-png,image/gif,image/jpeg',
        params:{
            'action': "<?php echo $f;?>"
        },
        uploadOnDrop: true,
        uploadOnPreview: false,
        success: function(res, index){
        	location.reload();

        }
    });
}());
</script>