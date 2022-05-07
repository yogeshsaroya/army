<div style="<?php if(isset($aj) && !empty($aj)){ echo "max-width:800px; margin:20px auto";}?> " class="gn_new_pop" id="lib_details">
<style>
<?php if( isset($aj) && !empty($aj) ){ echo ".edit_lib{ margin-left: 0px !important;}"; };?>
</style>

<div class="box box-primary edit_lib">
<?php if(!empty($i) && !empty($list)){?>
<div class="box-header with-border"><h3 class="box-title">Exhaust for <?php echo $i['Motorcycle']['title'];?></h3></div>

<div class="box-body" style="min-height: 100px;">
<div class="col-sm-12" id="">
<input type="hidden" id="pid" value="<?php echo $i['Motorcycle']['id'];?>">
<input type="hidden" id="type" value="<?php echo $type;?>">

<?php if(!empty($list)){ foreach ($list as $plist){ ?>

<div class="col-sm-12 catback"> <label>
<input type="checkbox" name="prod" class="flat-red pchkbox" value="<?php echo $plist['Product']['id'];?>">  <?php echo $plist['Product']['title']." (".$plist['Product']['part']." / ".$plist['Product']['full_part'].")";?></label></div>

<?php }}?>
</div>
<div id="pop_err"></div>                
</div>
<div class="box-footer">
<button type="button" class="btn btn-default" onclick="$.magnificPopup.close();">Cancel</button>
<button type="button" class="btn btn-info pull-right" onclick="upd();">Update</button>
</div>
<?php }else{?>
<div id="pop_err"></div>
<br><br>
<div class="box-footer"><div class="alert alert-warning alert-dismissible">Product not exist for this model </div></div>
<div class="box-footer">
<button type="button" class="btn btn-default" onclick="$.magnificPopup.close();">Close</button>
<button type="button" class="btn btn-info pull-right" onclick="upd();">Update</button>

</div>
<?php }?>


</div>
              
<div class="clearfix"></div>
<script>

$(function () {
	$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
	    checkboxClass: 'icheckbox_flat-green',
	    radioClass: 'iradio_flat-green'
	  });
	});

function upd(){
	var val = [];
	$('.pchkbox:checked').each(function(i){ val[i] = $(this).val(); });
	var ids = val.toString();
	var pid = $('#pid').val();
	var type = $('#type').val();

	$("#preloader").show();			    
	$.ajax({type: 'POST',
		url: '<?php echo SITEURL."lab/labs/up_pro";?>',
		data: 'pid='+pid+'&ids='+ids+'&type='+type+'',
		data:{pid:pid,ids:ids,type:type,tbl:'motorcycle'},
		success: function(data) { $('#pop_err').html(data); },
		error: function(comment) { $('#pop_err').html(comment);  $("#preloader").hide(); }});

	
	
	
	
}
</script>
</div>

