<?php echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min','/v/bootstrap.min'));?>
<div id="preloader" style="display:none"> <div id="status">&nbsp;</div> </div>
<div class="content-wrapper" style="min-height:1066px">
<section class="content-header">
<h1>Exhaust System > Make > Model</h1>
</section>
<section class="content">
<div class="box">
<div class="box-body">
<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title"><?php if( isset($data['ExhaustModel']['id'])){ echo "Edit";}else{ echo "Add";}?></h3></div>
<?php echo $this->Form->create('ExhaustModel',array('id'=>'mfrm'));
if(isset($data) && !empty($data)){
	$this->request->data['ExhaustModel'] = $data['ExhaustModel'];
	echo $this->Form->hidden('id');
}
?>
<div class="box-body">

<div class="row">
<div class="col-md-12">

<div class="row">
<div class="col-sm-4"><div class="form-group"> <label>Make</label> <?php if(isset($brand_id) ){ $id = $brand_id;}?> <?php echo $this->Form->input('exhaust_brand_id', array('id'=>'brand_id','options'=>@$brand,'empty'=>' --Select Brand-- ','default'=>@$id, 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div></div>
<div class="col-sm-4"> <div class="form-group"><label>Model</label> <?php echo $this->Form->input('model_id', array('id'=>'model_id','options'=>@$model_list,'empty'=>' --Select Model-- ','default'=>@$model_id, 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div></div>
<div class="col-sm-4"><div class="form-group"> <label>Motor</label> <?php echo $this->Form->input('motor_id', array('id'=>'motor_id','options'=>@$engList,'empty'=>' --Select Motor-- ','default'=>@$engine_id, 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div></div>
<div class="clearfix"></div>
</div>

<div class="form-group "><label for="">Brand</label><?php echo $this->Form->input('exhaust_brand_id',array('options'=>$car,'class'=>'form-control','empty'=>' --Select Brand-- ','label'=>false,'div'=>false,'required'=>true));?></div>

<div class="form-group "><label for="">Model</label><?php echo $this->Form->input('model_id',array('options'=>@$list_model,'class'=>'form-control','empty'=>' --Select Brand-- ','label'=>false,'div'=>false,'required'=>true));?></div>


<div class="form-group "><label for="">Model Name</label><?php echo $this->Form->input('model_name',array('class'=>'form-control','placeholder'=>'Car model name','label'=>false,'div'=>false,'required'=>true));?></div>
<div class="form-group "><label for="">Title</label><?php echo $this->Form->input('title',array('class'=>'form-control','placeholder'=>'Title','label'=>false,'div'=>false,'required'=>true));?></div>

<?php if(isset($this->request->data['ExhaustModel'])){?>
<div class="form-group"><label for="">Photo</label><?php echo $this->Form->input('new_image',array('class'=>'form-control','placeholder'=>'Image URL','label'=>false,'div'=>false));?></div>
<?php }else{?>
<div class="form-group"><label for="">Photo</label><?php echo $this->Form->input('image',array('class'=>'form-control','placeholder'=>'Image URL','label'=>false,'div'=>false,'required'=>true));?></div>
<?php }?>


<div class="form-group "><label for="">Page URL</label><?php echo $this->Form->input('url',array('class'=>'form-control','placeholder'=>'SEO URL','label'=>false,'div'=>false,'required'=>true));?></div>


<div class="form-group "><label for="">Meta Title</label><?php echo $this->Form->input('meta_title',array('type'=>'text','class'=>'form-control','placeholder'=>'Meta Title','label'=>false,'div'=>false));?></div>
<div class="form-group "><label for="">Meta Description</label><?php echo $this->Form->input('meta_description',array('class'=>'form-control','placeholder'=>'Meta Description','label'=>false,'div'=>false));?></div>
<div class="form-group "><label for="">Meta Keywords</label><?php echo $this->Form->input('meta_keywords',array('type'=>'text','class'=>'form-control','placeholder'=>'Meta Keywords','label'=>false,'div'=>false));?></div>
</div>                
                
</div>
</div>
<div class="box-footer">
<div id="app_error"></div>
</div>
<div class="col-md-12">
<div class="form-group pull-right"><br><input type="button" value="Save" class="btn btn-block btn-primary btn-flat form-control pull-right" id="save_b"></div>
</div>
<div class="clearfix"></div>
</div>
</form>
</div>
<div class="box-footer">

</div>
</div>
</section>
</div>
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
	  return encodedUrl; 
	};
$(document).ready(function(){

	$('#mfrm')
    .formValidation({
        framework: 'bootstrap',
        icon: { },
        err: { },
        fields: { }
    })    .on('success.form.fv', function(e) {
        // Prevent form submission
        e.preventDefault();

        var $form = $(e.target),
            fv    = $form.data('formValidation');

        // Use Ajax to submit form data
        fv.defaultSubmit();
    });

	$( "#ExhaustModelModelId" ).change(function() {
		var n = $("#"+this.id+" option:selected").html();
		var f = $('#ExhaustModelExhaustBrandId option:selected').html()+" "+n; 
		$('#ExhaustModelModelName, #ExhaustModelTitle').val(f); 
		});
	
$('#ExhaustModelTitle').focusout(function() {
	var v = $.trim( this.value );
	if(v != ""){
		$('#ExhaustModelMetaTitle').val(v.toLowerCase());
		var u = $.trim( $('#ExhaustModelUrl').val() );
		if( u == ""){ $('#ExhaustModelUrl').val(ToSeoUrl(v)); }
		$('#ExhaustModelLabAddCarsForm').formValidation('revalidateField', 'data[ExhaustModel][url]');
	}
});

$( "#ExhaustModelExhaustBrandId" ).change(function() {
	    var id =this.value;
    	var datastring = "id="+id+"";
    	var sel_option= $('#ExhaustModelModelId');
		$(function(){ $.ajax({type: 'POST',async:false,
		url: '<?php echo SITEURL;?>users/get_model/',
		data: datastring,
		success: function(data){ $('#app_error').html(data);},
		error: function(comment){  $('#app_error').html(comment); }  });  });
	
	
	});


$( "#save_b" ).click(function() {
	$('#app_error').html('');

	$("#mfrm").ajaxForm({ 
	    	   target: '#app_error',
	    	   beforeSubmit:function(){ $("#save_b").prop("disabled",true); $("#save_b").val('Please wait..'); }, 
	    	   success: function(response)  { $("#app_error").html(response); },
	    	   error : function(response)  { 
	    		   $('#app_error').html('<div class="alert alert-danger alert-dismissable fade in">Sorry, this is not working at the moment. Please try again later.</div>');
	    		   $("#save_b").prop("disabled",false); $("#save_b").val('Save');  
		    	   },
	    	   }).submit(); 
	});

});

</script>