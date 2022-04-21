<?php echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min','/v/bootstrap.min'));?>
<style>
#new_library_id img {width: 100%;    margin: 10px 0 0 0;}
.form-check.form-check-inline label {
    margin-left: 5px;
}
.form-check.form-check-inline {
    display: inline-block;
    padding-right: 10px;
}
</style>
<div id="preloader" style="display:none"> <div id="status">&nbsp;</div> </div>
<div class="content-wrapper" style="min-height:1066px">
<section class="content-header">
<h1>Extra Product > New</h1> 
</section>
<section class="content">
<div class="box">
<div class="box-body">
<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Manage Product</h3></div>

<?php 
echo $this->Form->create('Product',array('type' => 'file','id'=>'proFrm'));
$v = $id = $mid = null;
if(isset($e['Product']) && !empty($e['Product'])){ 

	$this->request->data['Product'] = $e['Product'];
	$v = $e['Product']['description'];
	$this->request->data['Product']['description1'] = $e['Product']['description'];
	
	if(!empty($this->request->data['Product']['sizes'])){
	    $this->request->data['Product']['size_list'] = json_decode($this->request->data['Product']['sizes'],true);
	}
	
}
echo $this->Form->hidden('id',array('id'=>'id'));
echo $this->Form->hidden('description',array('id'=>'description'));
echo $this->Form->hidden('extra_photos',array('id'=>'extra_photos'));

?>

<div class="box-body">

<div class="row">

<div class="col-md-12">
<div class="form-group"><label for="">Title</label><?php echo $this->Form->input('title', array('id'=>'title','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div>
</div>

<div class="form-group">
<div class="col-md-6"><label for="">Price</label><?php echo $this->Form->input('price', array('id'=>'price','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div>
<div class="col-md-6"><label for="">Quantity</label><?php echo $this->Form->input('quantity', array('type'=>'number', 'id'=>'quantity','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div>
</div>

<div class="col-md-12">
<div class="timeline-body">
<div class="form-group">
<div class="col-sm-12"><label for="">Photo <a onclick="add_slider('extra_photos','more');">Add new Photo</a></label>
<div class="clearfix"></div>
<div id="new_library_id" >
<?php if(isset($pics) && !empty($pics)){
foreach ($pics as $list){ 
	$img = new_show_image('cdn/'.$list['Library']['full_path'],100,100,100,'ff',null);?>
<div class="col-md-2 xya_<?php echo $list['Library']['id'];?>" id="xya_<?php echo $list['Library']['id'];?>">
<img src="<?php echo $img;?>" alt="" class=""><center onclick="del_pic(<?php echo $list['Library']['id'];?>);">Delete</center></div> 

<?php } }?> 
</div>
<div class="clearfix"></div>
<br><br>
</div></div></div></div>
<?php $sizes = ['S'=>'S','M'=>'M','L'=>'L','XL'=>'XL','2XL'=>'2XL','3XL'=>'3XL'];?>
 <div class="col-md-12"><div class="form-group"><label for="">Product Size</label>
<?php echo $this->Form->input('size_list', array('label'=>false, 'class' => 'form-check form-check-inline','type' => 'select', 'multiple' => 'checkbox', 'options' => $sizes));?>
</div></div>

<div class="col-md-12"><div class="form-group"><label for="">SEO URL</label><?php echo $this->Form->input('slug', array('id'=>'slug','label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md'));?></div></div>
<div class="col-md-12">
<div class="form-group "><label for="">Meta Title</label><?php echo $this->Form->input('meta_title',array('type'=>'text','class'=>'form-control','placeholder'=>'Meta Title','label'=>false,'div'=>false));?></div>
<div class="form-group "><label for="">Meta Description</label><?php echo $this->Form->input('meta_description',array('type'=>'text','class'=>'form-control','placeholder'=>'Meta Description','label'=>false,'div'=>false));?></div>
<div class="form-group "><label for="">Meta Keywords</label><?php echo $this->Form->input('meta_keywords',array('type'=>'text','class'=>'form-control','placeholder'=>'Meta Keywords','label'=>false,'div'=>false));?></div>
<div class="form-group"><label for="">Description</label><?php echo $this->Form->input('description1', array('type'=>'textarea', 'id'=>'description1','value'=>$v,'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div>
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
<?php echo $this->Form->end();?>
</div>
</section>
</div>


<script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js"></script>

<script>
function up(arr,id,t){ 
	var array = arr.split(',');
	if(t == 'r'){ array = $.grep(array, function(value) { return value != id; }); }
	else{  array.push(id);  }
	var str = array.toString()
	str = str.replace(/^,|,$/g,'');
	return str; 
	
}
function del_pic(id){

	var extra_photos = $('#extra_photos').val();
	n_str = up(extra_photos,id,'r');
	$('#extra_photos').val(n_str);
	$('.xya_'+id).remove();
}

function add_slider(id,type){
	$.magnificPopup.open({items: {
	    src: '<?php echo SITEURL."lab/labs/new_add_media/";?>'+id+'/'+type+'/1',
	    type: 'ajax'},
	closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)"> </button>',
	closeOnContentClick: false, closeOnBgClick: false, showCloseBtn: true, enableEscapeKey: false,
	});
}

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


	$('#title').focusout(function() {
		var v = $.trim( this.value );
		if(v != ""){
			$('#ProductMetaTitle').val(v.toLowerCase());
			$('#slug').val(ToSeoUrl(v));
			
		}
	});

	
	 CKEDITOR.replace( 'description1' );
	 CKEDITOR.config.allowedContent = true;
	
	window['btnState'] = function() { $("#add_br").prop("disabled",false); $("#add_br").val('Save'); };
	
	
	$( "#add_br" ).click(function() {
		$("#app_err").html('');
		  var id = $.trim($('#id').val());
		  var title = $.trim($('#title').val());
		  var price = $.trim($('#price').val());
		  var quantity = $.trim($('#quantity').val());
		  var data = CKEDITOR.instances.description1.getData();
		  $('#description').val(data);
		  
		  if(title == ""){ $('#title').focus(); $("#app_err").html('<div class="alert alert-danger" role="alert"> Please enter title.</div>');}
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
});
</script>