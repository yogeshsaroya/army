<?php echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min','/v/bootstrap.min'));?>
<div id="preloader" style="display:none"> <div id="status">&nbsp;</div> </div>
<div class="content-wrapper" style="min-height:1066px">
<section class="content-header">
<h1>Tuning box > Product</h1>
</section>
<section class="content">
<div class="box">
<div class="box-body">
<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Manage Product</h3></div>

<?php 
echo $this->Form->create('Product',array('type' => 'file','id'=>'proFrm'));
$v = $t = $id = $mid = null;
if(isset($e['Product']) && !empty($e['Product'])){ 

	$this->request->data['Product'] = $e['Product'];
	$v = $e['Product']['description'];
	$t = $e['Product']['tech_specs'];
	$this->request->data['Product']['description1'] = $e['Product']['description'];
	$this->request->data['Product']['tech_specs1'] = $e['Product']['tech_specs'];
	
}
echo $this->Form->hidden('id',array('id'=>'id'));
echo $this->Form->hidden('description',array('id'=>'description'));
echo $this->Form->hidden('tech_specs',array('id'=>'tech_specs'));


?>

<div class="box-body">

<div class="row">

<div class="form-group">
<div class="col-md-4"> <label>Make</label> <?php if(isset($brand_id) ){ $id = $brand_id;}?> <?php echo $this->Form->input('brand_id', array('id'=>'brand_id','options'=>$brand,'empty'=>'Select Brand','default'=>$id, 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md'));?></div>
<div class="col-md-4"> <label>Model</label> <?php echo $this->Form->input('model_id', array('id'=>'model_id','options'=>$model_list,'empty'=>'Select model','default'=>$model_id, 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md'));?></div>
<div class="col-md-4"> <label>Motor</label> <?php echo $this->Form->input('motor_id', array('id'=>'motor_id','options'=>$engList,'empty'=>'Select Motor','default'=>$engine_id, 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md'));?></div>
<div class="clearfix"></div>

</div>

<div class="form-group">
<div class="col-md-4"><label for="">Price</label><?php echo $this->Form->input('price', array('id'=>'price','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div>
<div class="col-md-4"><label for="">Quantity</label><?php echo $this->Form->input('quantity', array('id'=>'quantity','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div>
<div class="col-md-4"><label for="">Part Number</label><?php echo $this->Form->input('part', array('id'=>'part','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div>

</div>



<div class="col-md-12">
<div class="form-group"><label for="">Title</label><?php echo $this->Form->input('title', array('id'=>'title','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md'));?></div>
<div class="form-group"><label for="">Youtube</label><?php echo $this->Form->input('youtube', array('id'=>'youtube','type'=>'text','placeholder'=>'Youtube video id separated by comma','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md'));?></div>
</div>
<div class="col-md-6">
<div class="form-group"><label >Photo Slider</label><?php echo $this->Form->file('img.', array('id'=>'img','multiple','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md'));?></div>
</div>
<div class="col-md-5">
<div class="form-group"><label >Photo</label><?php echo $this->Form->file('more_photos.', array('id'=>'more_photos','multiple','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md'));?></div>

<?php if(isset($this->request->data['Product']['id']) && isset($this->request->data['Product']['more_photo']) && !empty($this->request->data['Product']['more_photo'])){
	$u = SITEURL.$this->request->url."?edit=".$this->request->query['edit'];
	$g = SITEURL."lab/labs/delete_photo/".$this->request->query['edit']."?url=".urlencode($u);
	?>
<div class="form-group"><label class="col-md-2 control-label" for="textinput"></label><div class="col-md-9">
<a href="<?php echo $g;?>">Remove Photos</a>
</div></div>
<div class="clearfix"></div>
<?php }?>
</div>
<div class="col-md-12">
<div class="form-group "><label for="">Meta Title</label><?php echo $this->Form->input('meta_title',array('type'=>'text','class'=>'form-control','placeholder'=>'Meta Title','label'=>false,'div'=>false));?></div>
<div class="form-group "><label for="">Meta Description</label><?php echo $this->Form->input('meta_description',array('type'=>'text','class'=>'form-control','placeholder'=>'Meta Description','label'=>false,'div'=>false));?></div>
<div class="form-group "><label for="">Meta Keywords</label><?php echo $this->Form->input('meta_keywords',array('type'=>'text','class'=>'form-control','placeholder'=>'Meta Keywords','label'=>false,'div'=>false));?></div>


<div class="form-group"><label for="">Description</label><?php echo $this->Form->input('description1', array('type'=>'textarea', 'id'=>'description1','value'=>$v,'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md'));?></div>

<div class="form-group"><label for="">Tech Specs</label><?php echo $this->Form->input('tech_specs1', array('type'=>'textarea', 'id'=>'tech_specs1','value'=>$t,'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md'));?></div>
</div>

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
</div>
</section>
</div>

<script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js"></script>

<script>
$(document).ready(function(){


	$('#title').focusout(function() {
		var v = $.trim( this.value );
		if(v != ""){
			$('#ProductMetaTitle').val(v.toLowerCase());
			
		}
	});

	
	 CKEDITOR.replace( 'description1' );
	 CKEDITOR.config.allowedContent = true;
	 CKEDITOR.replace( 'tech_specs1' );
	 CKEDITOR.config.allowedContent = true;
	
	window['btnState'] = function() { $("#add_br").prop("disabled",false); $("#add_br").val('Save'); };
	
	
	$( "#add_br" ).click(function() {
		$("#app_err").html('');
		  var id = $.trim($('#id').val());
		  var brand_id = $.trim($('#brand_id').val());
		  var model_id = $.trim($('#model_id').val());
		  var motor_id = $.trim($('#motor_id').val());
		  var title = $.trim($('#title').val());
		  var price = $.trim($('#price').val());
		  var quantity = $.trim($('#quantity').val());
		  var data = CKEDITOR.instances.description1.getData();
		  $('#description').val(data);

		  var data1 = CKEDITOR.instances.tech_specs1.getData();
		  $('#tech_specs').val(data1);
		  
		  
		  if(brand_id == ""){ $('#brand_id').focus(); $("#app_err").html('<div class="alert alert-danger" role="alert"> Please select brand name.</div>'); }
		  else if(title == ""){ $('#title').focus(); $("#app_err").html('<div class="alert alert-danger" role="alert"> Please enter title.</div>');}
		  else if(price == ""){ $('#price').focus(); $("#app_err").html('<div class="alert alert-danger" role="alert"> Please enter price.</div>');}
		  else if(quantity == ""){ $('#quantity').focus(); $("#app_err").html('<div class="alert alert-danger" role="alert"> Please enter quantity.</div>');}
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


	
   

	$('.number').keypress(function(event) {
	    if(event.which < 46
	    || event.which > 59) {
	        event.preventDefault();
	    } // prevent if not number/dot

	    if(event.which == 46
	    && $(this).val().indexOf('.') != -1) {
	        event.preventDefault();
	    } // prevent if already dot
	});

	$( "#brand_id" ).change(function() { window.location.href = '<?php echo SITEURL;?>lab/labs/new_tuning_box/'+this.value; });
	$( "#model_id" ).change(function() { var brand_id = $( "#brand_id" ).val(); window.location.href = '<?php echo SITEURL;?>lab/labs/new_tuning_box/'+brand_id+'/'+this.value; });
	$( "#motor_id" ).change(function() { 

		var brand_id = $( "#brand_id" ).val();
		var model_id = $( "#model_id" ).val(); 

	window.location.href = '<?php echo SITEURL;?>lab/labs/new_tuning_box/'+brand_id+'/'+model_id+'/'+this.value; });
	

	

	
});

</script>
