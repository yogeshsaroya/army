<div style="<?php if(isset($aj) && !empty($aj)){ echo "max-width:80%; margin:20px auto";}?> " class="gn_new_pop" id="lib_details">
<style>
<?php if( isset($aj) && !empty($aj) ){ echo ".edit_lib{ margin-left: 0px !important;}"; };?>
.dl-horizontal dt {text-align:left !important;}
.dl-horizontal dd {margin-left: 110px;}
.dl-horizontal dt {width: auto;}
.b-buffer { margin-bottom:5px; } 

#lib_details .caption p { text-transform: capitalize !important; }
#lib_details .thumbnail { text-align: center; }
#lib_details .fa-folder:before { font-size: 30pt; color: gray; }
#lib_details .pd10{padding-top: 20px}
#lib_details .lib_folder{ cursor: pointer;}
#lib_details .breadcrumb {background-color: inherit;}
#lib_details .active .thumbnail { border: 3px solid #000; }

.box-body{height: 600px; overflow-y: auto;    overflow-x: hidden;}
#lib_details .thumbnail { border: 1px solid #d3d3d3; height: 170px; }
</style>

<div class="box box-primary edit_lib">
<div class="box-header with-border"><h3 class="box-title">Attachment Details &nbsp;&nbsp; <input type="text" value="" name="s_f" id="s_f" placeholder="Filter "></h3></div>

<div class="box-body">
<div class="row" id="my_folder">
<?php 

if(isset($flist) && !empty($flist)){
foreach ($flist as $v){?>

<div class="col-sm-1 col-md-2 lib_folder" onclick="load('<?php echo $v['Library']['folder'];?>','<?php if(isset($q['one'])){ echo "s";}else{ echo "m";}?>');">
<div class="thumbnail">
<div class="caption"> <p> &nbsp; </p></div>
<i class="fa fa-folder" aria-hidden="true"></i>
 <div class="caption"> <p><?php echo $v['Library']['folder'];?></p></div></div></div>
<?php }}?>
</div>
<div class="row" id="my_files"></div>                
</div>
              

<div class="box-footer"><button type="button" class="btn btn-primary pull-right" onclick="cls();">Close</button></div>
<input type="hidden" value="<?php echo $id;?>" id="id">
<input type="hidden" value="<?php echo $type;?>" id="type">
<input type="hidden" value="<?php echo $for;?>" id="for">

<input type="hidden" value="<?php echo @$q['library_id'];?>" id="lid">
<input type="hidden" value="<?php echo @$q['new_library_id'];?>" id="img_path">

</div>
              
<div class="clearfix">
<script>
$(document).ready(function() {
	$( "#s_f" ).keyup(function() {
		var txt = $.trim($('#s_f').val());
		if( txt != ""){
			$('.lib_folder').hide();
		    var txt = $('#s_f').val();
		    $('.lib_folder:contains("'+txt+'")').show();
		}else{
			$('.lib_folder').show();
			}
	});
});	

function cls(){
	$.magnificPopup.close();
	<?php if( !isset($q['one']) ){?> parent.location.reload(); <?php }?>
	
	
}
function load(id,type){
	if(id !=''){
	$( "#s_f" ).val('');
	$('.lib_folder').show();
	$.ajax({type: 'POST',
		url: '<?php echo SITEURL."lab/labs/get_folder_img/";?>'+id+'/'+type,
		data: 'id='+id+'',
		success: function(data) { $('#my_folder').hide(); $('#my_files').show(); $("#my_files").html(data); parent.$('#preloader').hide();},
		error: function(comment) { $("#my_files").html(comment); parent.$('#preloader').hide(); }});
	
	}
	
	
}

</script>      
</div>