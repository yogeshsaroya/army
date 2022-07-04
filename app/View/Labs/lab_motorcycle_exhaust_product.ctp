<?php echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min','/v/bootstrap.min'));?>

<div class="content-wrapper" style="min-height:1066px">
<section class="content-header"><h1>Motorcycle Exhaust Product</h1></section>
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
<div class="col-sm-2 form-group"><label>Make</label> <?php if(isset($make_id) ){ $id = $make_id;}?> <?php echo $this->Form->input('motorcycle_make_id', array('id'=>'brand_id','options'=>$brand,'empty'=>'Select Brand','default'=>$make_id, 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div>
<div class="col-sm-2 form-group"><label>Model</label> <?php echo $this->Form->input('motorcycle_model_id', array('id'=>'model_id','options'=>$model_list,'empty'=>'Select model','default'=>$model_id, 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div>
<div class="col-sm-2 form-group"> <label>Motor</label> <?php echo $this->Form->input('motorcycle_year_id', array('id'=>'motor_id','options'=>$years,'empty'=>'Select Motor','default'=>$year_id, 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div>
<div class="col-sm-2 form-group"><label for="">Price $</label><?php echo $this->Form->input('price', array('id'=>'price','maxlength'=>'6', 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div>
<div class="col-sm-2 form-group"><label for="">Discount %</label><?php echo $this->Form->input('discount', array('id'=>'discount','min'=>'0','max'=>99,'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>false));?></div>
<div class="col-sm-2 form-group"><label for="">Pre Order</label><?php echo $this->Form->input('preorder', array('options'=>['0'=>'No','1'=>'Yes'],'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>false));?></div>
<div class="col-sm-2 form-group"><label for="">Quantity</label><?php echo $this->Form->input('quantity', array('maxlength'=>'6','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div>
<div class="col-sm-2 form-group"><label for="">Armytrix Weight</label><?php echo $this->Form->input('weight', array('label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>false));?></div>
<div class="col-sm-2 form-group"><label for="">OEM Weight</label><?php echo $this->Form->input('oem_weight', array('label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>false));?></div>
<div class="col-sm-2 form-group"><label for="">Box Size</label><?php echo $this->Form->input('box_size', array('options'=>getYears(1,9),'empty'=>' --Select Box Size-- ','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div>
<div class="col-sm-2 form-group"><label>Type</label> <?php echo $this->Form->input('type', array('options'=>getMotorProType(),'empty'=>' --Select Product Type-- ','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div>
<div class="clearfix"></div>
</div>

<div class="row" id="part_1" style="<?php echo(isset($this->request->data['Product']['type']) && in_array($this->request->data['Product']['type'],[6,7]) ? "display: block;":"display: none;") ?>">
<hr>
<div class="col-sm-6 form-group"><?php echo $this->Form->input('part', array('label'=>'Part Number','class' => 'form-control input-md','required'=>false));?></div>
<div class="col-sm-6 form-group"><?php echo $this->Form->input('material', array('lable'=>'Material','options'=>motorMaterial(),'empty'=>' --Select Material-- ','class' => 'form-control input-md','required'=>false));?></div>
<div class="col-sm-12 form-group"><?php echo $this->Form->input('details', array('type'=>'textarea','rows'=>2,'label' => 'Product Detail','class' => 'form-control input-md','required'=>false));?></div>
</div>
<div class="row" id="part_2"  style="<?php echo(isset($this->request->data['Product']['type']) && in_array($this->request->data['Product']['type'],[6]) ? "display: block;":"display: none;") ?>">
<hr>
<div class="col-sm-6 form-group"><?php echo $this->Form->input('full_part', array('label'=>'Part Number - 2','class' => 'form-control input-md','required'=>false));?></div>
<div class="col-sm-6 form-group"><?php echo $this->Form->input('full_material', array('lable'=>'Material - 2','options'=>motorMaterial(),'empty'=>' --Select Material-- ','class' => 'form-control input-md','required'=>false));?></div>
<div class="col-sm-12 form-group"><?php echo $this->Form->input('full_details', array('type'=>'textarea','rows'=>2,'label' => 'Product Detail - 2','class' => 'form-control input-md','required'=>false));?></div>

<div class="clearfix"></div>
</div>

<div class="row">
<div class="form-group col-sm-12"><?php echo $this->Form->input('title', array('class' => 'form-control input-md','required'=>true));?></div>
<div class="form-group col-sm-12"><?php echo $this->Form->input('description', array('type'=>'textarea','rows'=>2,'class' => 'form-control input-md','required'=>true));?></div>
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
<div class="form-group pull-right"><br>
<input type="button" value="Save" class="btn btn-block btn-primary btn-flat form-control pull-right" id="add_br">
</div>

<div class="form-group pull-left"><br>
<?php echo $this->Html->link('Back to List','/lab/labs/motorcycle_exhaust',['class'=>'btn btn-block btn-default btn-flat form-control pull-left']);?>
</div>
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

	$( "#brand_id" ).change(function() { window.location.href = '<?php echo SITEURL;?>lab/labs/motorcycle_exhaust_product/'+this.value; });
	$( "#model_id" ).change(function() { var brand_id = $( "#brand_id" ).val(); window.location.href = '<?php echo SITEURL;?>lab/labs/motorcycle_exhaust_product/'+brand_id+'/'+this.value; });
	$( "#motor_id" ).change(function() { 
		var brand_id = $( "#brand_id" ).val();
		var model_id = $( "#model_id" ).val(); 
	window.location.href = '<?php echo SITEURL;?>lab/labs/motorcycle_exhaust_product/'+brand_id+'/'+model_id+'/'+this.value; });
	
	$( "#ProductType" ).change(function() { 
		if( this.value == 6 ){ $("#part_1").show(); $("#part_2").show(); }
		else if( this.value == 7 ){ $("#part_1").show(); $("#part_2").hide(); }
	});
	
	

	
});

</script>
