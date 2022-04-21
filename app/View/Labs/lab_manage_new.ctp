<?php echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min','/v/bootstrap.min'));?>
<style>
#new_library_id img {width: 100%;    margin: 10px 0 0 0;}
</style>
<div id="preloader" style="display:none"> <div id="status">&nbsp;</div> </div>
<div class="content-wrapper" style="min-height:1066px">
<section class="content-header">
<h1>Manage New Release</h1> 
</section>
<section class="content">
<div class="box">
<div class="box-body">
<div class="box box-primary">


<?php 
echo $this->Form->create('NewRelease',array('type' => 'file','id'=>'proFrm'));
if(isset($e) && !empty($e)){
	$this->request->data['NewRelease'] = $e['NewRelease'];
}
echo $this->Form->hidden('id',array('id'=>'id'));
echo $this->Form->hidden('library_id',array('id'=>'library_id'));
?>
<div class="box-body">
<div class="row">
<div class="col-md-12"><div class="form-group"><label for="">Title</label><?php echo $this->Form->input('title', array('label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div></div>
<div class="col-md-12"><div class="form-group"><label for="">Link</label><?php echo $this->Form->input('link', array('label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div></div>

<div class="col-md-12">
<div class="timeline-body">
<div class="form-group">
<div class="col-sm-12"><label for="">Photo <a onclick="add_lib('library_id','new_library_id','one');">Add new Photo</a></label>
<div class="clearfix"></div>
<div id="new_library_id" class="col-sm-3">
<img src="<?php 
if(isset($e['Library']['id']) && !empty($e['Library']['id']) ){
	echo  new_show_image('cdn/'.$e['Library']['full_path'],200,150,100,'ff',null);
}else{ echo SITEURL."cdn/img_text.png";}?>" alt="Click here" class="">
</div>
<div class="clearfix"></div>
<br><br>
</div></div></div></div>

</div>                
                
</div>
</div>
<div class="box-footer">
<div id="app_err"></div>
</div>
<div class="col-md-12">
<div class="form-group pull-right"><br><input type="button" value="Save" class="btn btn-block btn-primary btn-flat form-control pull-right" id="add_br"></div>
</div>
<div class="clearfix"></div>
</div>
</form>
</div>
<div class="box-footer">

</div>

</section>
</div>
<script>


function add_lib(library_id,new_library_id,one){
	$.magnificPopup.open({items: {
	    src: '<?php echo SITEURL."lab/labs/add_media/";?>?library_id='+library_id+'&new_library_id='+new_library_id+'&one='+one,
	    type: 'ajax'},
	closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)"> </button>',
	closeOnContentClick: false, closeOnBgClick: false, showCloseBtn: true, enableEscapeKey: false,
	});
}

$(document).ready(function(){

	
	window['btnState'] = function() { $("#add_br").prop("disabled",false); $("#add_br").val('Save'); };
	
	
	$( "#add_br" ).click(function() {
		$("#app_err").html('');
		  var library_id = $.trim($('#library_id').val());
		  var title = $.trim($('#NewReleaseTitle').val());
		  var path = $.trim($('#NewReleaseLink').val());

		  var re = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
		  
		  if(title == ""){ $('#NewReleaseTitle').focus(); $("#app_err").html('<div class="alert alert-danger" role="alert"> Please enter title.</div>');}
		  else if(path == ""){ $('#NewReleaseLink').focus(); $("#app_err").html('<div class="alert alert-danger" role="alert"> Please enter URL.</div>');}
		  else if (!re.test(path)) {  $('#NewReleaseLink').focus(); $("#app_err").html('<div class="alert alert-danger" role="alert"> Please enter valid URL.</div>'); }
		  else if(library_id == ""){ $("#app_err").html('<div class="alert alert-danger" role="alert"> Please select photo.</div>');}
		  else{

			  $("#add_br").prop("disabled",true); $("#add_br").val('Please wait...');
	 	       $("#proFrm").ajaxForm({ 
		    	   target: '#app_err',
		    	   beforeSubmit:function(){  }, 
		    	   success: function(response)  {  },
		    	   error : function(response)  { btnState(); } 
			    	   }).submit(); 
			  
		  }
		});


});
</script>