<?php echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min','/v/bootstrap.min'));?>
<div id="preloader" style="display:none"> <div id="status">&nbsp;</div> </div>
<div class="content-wrapper" style="min-height:1066px">
<section class="content-header">
<h1>Exhaust System > Make</h1>
</section>
<section class="content">
<div class="box">
<div class="box-body">
<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title"><?php if( isset($data['ExhaustBrand']['id'])){ echo "Edit";}else{ echo "Add";}?></h3></div>
<?php echo $this->Form->create('ExhaustBrand');
if(isset($data) && !empty($data)){
	$this->request->data['ExhaustBrand'] = $data['ExhaustBrand'];
	echo $this->Form->hidden('id');
}
?>
<div class="box-body">

<div class="row">
<div class="col-md-12">

<div class="form-group"><label for="">Make</label><?php echo $this->Form->input('brand_id',array('options'=>$bid,'empty'=>' --Select Make-- ','class'=>'form-control','label'=>false,'div'=>false,'required'=>true));?></div>
<?php if(isset($this->request->data['ExhaustBrand'])){?>
<div class="form-group"><label for="">Photo</label><?php echo $this->Form->input('new_image',array('class'=>'form-control','placeholder'=>'Image URL','label'=>false,'div'=>false));?></div>
<?php }else{?>
<div class="form-group"><label for="">Photo</label><?php echo $this->Form->input('image',array('class'=>'form-control','placeholder'=>'Image URL','label'=>false,'div'=>false,'required'=>true));?></div>
<?php }?>
<div class="form-group"><label for="">Make name (for mobile)</label><?php echo $this->Form->input('brand_name',array('class'=>'form-control','placeholder'=>'Brand Name','label'=>false,'div'=>false,'required'=>true));?></div>

<div class="form-group "><label for="">Title</label><?php echo $this->Form->input('title',array('class'=>'form-control','placeholder'=>'Title','label'=>false,'div'=>false,'required'=>true));?></div>


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

	$('#ExhaustBrandLabAddCarsForm')
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
	

$( "#ExhaustBrandBrandId" ).change(function() { $('#ExhaustBrandBrandName').val( $("#"+this.id+" option:selected").html() ); });
	
$('#ExhaustBrandTitle').focusout(function() {
	var v = $.trim( this.value );
	if(v != ""){
		$('#ExhaustBrandMetaTitle').val(v.toLowerCase());
		$('#ExhaustBrandUrl').val(ToSeoUrl(v));
		$('#ExhaustBrandLabAddCarsForm').formValidation('revalidateField', 'data[ExhaustBrand][url]');
	}
});

$( "#save_b" ).click(function() {
	$('#app_error').html('');

	$("#ExhaustBrandLabAddCarsForm").ajaxForm({ 
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