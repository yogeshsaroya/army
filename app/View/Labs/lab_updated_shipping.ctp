<div class="example-modal">
<div class="modal-dialog">
<div class="modal-content">

<?php if(isset($data) && !empty($data)){ ?>
<div class="modal-header"><h4 class="modal-title">Update Shipping Rate for <?php echo @$data['Country']['name']." - ".@$data['State']['name'];?></h4></div>
<?php echo $this->Form->create('Shipping');
$this->request->data['Shipping'] = $data['Shipping'];
echo $this->Form->hidden('id');
?>
<div class="modal-body">
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">For Customer</h3>
</div>
<div class="box-body">
<div class="row"><div class="col-sm-10">
<?php echo $this->Form->input('for_customer',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?></div>
</div>
</div>
</div>
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">For Dealer</h3>
</div>
<div class="box-body">
<div class="row">
<div class="col-sm-10">
<?php echo $this->Form->input('for_dealer',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?>
</div>
</div>
</div>
</div>
<div id="ap_err"></div>
</div>
<?php echo $this->Form->end();?>

<div class="modal-footer">
<button type="button" class="btn btn-default pull-left" onclick="$.magnificPopup.close()">Close</button>

<input type="button" class="btn btn-primary" onclick="btn_save();" id="pro_btn" value="Save changes">
</div>
<script type="text/javascript">
function validate(str, min, max) {
	  n = parseFloat(str);
	  return (!isNaN(n) && n >= min && n <= max);
	}
function btn_save(){
	var id = $('#ShippingId').val();
	var for_customer = $.trim($('#ShippingForCustomer').val());
	var for_dealer = $.trim($('#ShippingForDealer').val());

	if(id != ''){

		if(  !validate(for_customer,1,500) ){ $("#ap_err").html('<div class="alert alert-warning">Customer shipping cost must be between 1 and 500.</div>'); }
		else if( !validate(for_dealer,1,500) ){ $("#ap_err").html('<div class="alert alert-warning">Dealer shipping cost must be between 1 and 500.</div>'); }
		else{ 
		console.log(for_customer);
		console.log(for_dealer);
	$("#pro_btn").prop("disabled",true); $("#pro_btn").val('Please wait.....');			    
	$.ajax({type: 'POST',
		url: '<?php echo SITEURL."lab/labs/updated_shipping";?>',
		data: 'id='+id+'&for_customer='+for_customer+'&for_dealer='+for_dealer,
		success: function(data) { $("#ap_err").html(data);},
		error: function(comment) { $("#ap_err").html(comment);  $("#pro_btn").prop("disabled",false); $("#pro_btn").val('Save changes');}});
	}
		}
}
</script>
<?php }else{?>
<div class="modal-body">

<div class="alert alert-warning alert-dismissible">Please try again later</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default pull-right" onclick="$.magnificPopup.close()">Close</button>

</div>              
<?php }?>
</div>
</div>
</div>