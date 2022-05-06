<?php echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min','/v/bootstrap.min'));?>

<div class="content-wrapper" style="min-height:1066px">
<section class="content-header"><h1>Catback/downpipe/Accessory</h1></section>
<section class="content">
<div class="box">
<div class="box-body">
<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">New Product</h3>
<?php echo $this->Session->flash('msg');?>       
<?php 
echo $this->Form->create('Product',array('type' => 'file','id'=>'proFrm'));
$v = $id = $mid = null;
if(isset($e['Product']) && !empty($e['Product'])){  $this->request->data['Product'] = $e['Product']; }
echo $this->Form->hidden('id',array('id'=>'id'));
echo $this->Form->hidden('library_id',array('id'=>'library_id'));
?>

<div class="box-body col-sm-12">

<div class="row">

<div class="row">
<div class="col-sm-4"><div class="form-group"> <label>Make</label> <?php if(isset($brand_id) ){ $id = $brand_id;}?> <?php echo $this->Form->input('brand_id', array('id'=>'brand_id','options'=>$brand,'empty'=>'Select Brand','default'=>$id, 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div></div>
<div class="col-sm-4"> <div class="form-group"><label>Model</label> <?php echo $this->Form->input('model_id', array('id'=>'model_id','options'=>$model_list,'empty'=>'Select model','default'=>$model_id, 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div></div>
<div class="col-sm-4"><div class="form-group"> <label>Motor</label> <?php echo $this->Form->input('motor_id', array('id'=>'motor_id','options'=>$engList,'empty'=>'Select Motor','default'=>$engine_id, 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div></div>
<div class="clearfix"></div>
</div>



<div class="row">
<div class="col-sm-2"> <div class="form-group"><label>Type</label> <?php echo $this->Form->input('type', array('id'=>'type','options'=>$this->Lab->producType(),'empty'=>' --Select Product Type-- ','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div></div>
<div class="col-sm-2"><div class="form-group"><label for="">Price $</label><?php echo $this->Form->input('price', array('id'=>'price','maxlength'=>'6', 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div></div>
<div class="col-sm-2"><div class="form-group"><label for="">Discount %</label><?php echo $this->Form->input('discount', array('id'=>'discount','min'=>'0','max'=>99,'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>false));?></div></div>
<div class="col-sm-2"><div class="form-group"><label for="">Pre Order</label><?php echo $this->Form->input('preorder', array('id'=>'preorder','options'=>['0'=>'No','1'=>'Yes'],'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>false));?></div></div>
<div class="col-sm-2"><div class="form-group"><label for="">Part Number</label><?php echo $this->Form->input('part', array('id'=>'part','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>false));?></div></div>
<div class="col-sm-2"><div class="form-group"> <label>Material</label> <?php echo $this->Form->input('material', array('id'=>'material','options'=>$this->Lab->material(),'empty'=>' --Select Material-- ', 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>false));?></div></div>
<div class="col-sm-2"><div class="form-group"><label for="">Quantity</label><?php echo $this->Form->input('quantity', array('id'=>'quantity','maxlength'=>'6','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div></div>



<div class="clearfix"></div>
</div>

<div class="row">
<div class="form-group"><div class="col-sm-12"><label for="">Title</label><?php echo $this->Form->input('title', array('id'=>'title','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div></div>
<div class="form-group"><div class="col-sm-12"><label for="">Description</label><?php echo $this->Form->input('description', array('type'=>'text','id'=>'description','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div></div>
</div>

<div class="">
<div class="timeline-body">
<div class="form-group"><div class="col-sm-3"><label for="">Photo</label>
<div id="new_library_id" onclick="add_lib('library_id','new_library_id','one');">
<img src="<?php 
if(isset($e['Library']['id']) && !empty($e['Library']['id']) ){
	echo  show_image('cdn/'.$e['Library']['folder'],$e['Library']['file_name'],200,150,100,'ff',null);
}else{ echo SITEURL."cdn/img_text.png";}?>" alt="Click here" class=""></div>
</div></div></div></div>

</div></div>

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

	$('#proFrm')
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
	
	window['btnState'] = function() { $("#add_br").prop("disabled",false); $("#add_br").val('Save'); };
	
	
	$( "#add_br" ).click(function() {
		$("#app_err").html('');
		
		
		     $("#proFrm").ajaxForm({ 
		    	   target: '#app_err',
		    	   beforeSubmit:function(){  $('#proFrm').formValidation(); $("#add_br").prop("disabled",true); $("#add_br").val('Please wait...'); }, 
		    	   success: function(response)  {  btnState(); },
		    	   error : function(response)  { btnState(); } 
			    	   }).submit(); 
			  
		  
		});



	$( "#brand_id" ).change(function() { window.location.href = '<?php echo SITEURL;?>lab/labs/add_exhaust_product/'+this.value; });
	$( "#model_id" ).change(function() { var brand_id = $( "#brand_id" ).val(); window.location.href = '<?php echo SITEURL;?>lab/labs/add_exhaust_product/'+brand_id+'/'+this.value; });
	$( "#motor_id" ).change(function() { 

		var brand_id = $( "#brand_id" ).val();
		var model_id = $( "#model_id" ).val(); 

	window.location.href = '<?php echo SITEURL;?>lab/labs/add_exhaust_product/'+brand_id+'/'+model_id+'/'+this.value; });
	

	

	
});

</script>
