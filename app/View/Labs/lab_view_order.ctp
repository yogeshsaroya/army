<link rel="stylesheet" href="<?php echo SITEURL;?>lab_root/dist/css/skins/_all-skins.min.css">
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
<section class="content-header"><h1>Invoice<small>#<?php echo $d['Order']['order_number'];?></small></h1></section>

        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> <b>Invoice #<?php echo $this->html->link($d['Order']['order_number'],SITEURL.'pages/order/success/'.$d['Order']['order_number'],['target'=>'_blank']);?></b>
                <small class="pull-right">Date: <?php echo date('m/d/y h:i A',strtotime($d['Order']['created']));?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong>Armytrix Automotive</strong><br>
                Email: info@armytrix.com
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
               <strong> Shipping To </strong>
              <address>
                <?php echo $d['Order']['first_name']." ".$d['Order']['last_name'];?><br>
                <?php echo $d['Order']['email']; ?> <br>
                <?php echo $d['Order']['phone'];?><br>
                
                 <?php if(!empty($d['Order']['shipping_company'])){ echo $d['Order']['shipping_company']."<br>";}?>
            <?php echo $d['Order']['shipping_address']." ".$d['Order']['shipping_address_2'];?><br>
            <?php echo $d['Order']['shipping_city']." ".$d['Order']['shipping_zip'];?><br>
            <?php echo $d['Order']['shipping_state'];?><br>
            <?php echo $d['Order']['shipping_country'];?> <br>
            
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
               <strong>Billing Address</strong><br>
            <address>
             <?php if(!empty($d['Order']['billing_company'])){ echo $d['Order']['billing_company']."<br>";}?>
                <?php echo $d['Order']['billing_address']." ".$d['Order']['billing_address_2'];?><br>
                <?php echo $d['Order']['billing_city']." ".$d['Order']['billing_zip'];?><br>
                <?php echo $d['Order']['billing_country'];?><br>
                <?php echo $d['Order']['billing_state'];?>
              </address>
              <br>
              <b>Payment By :</b> <?php if($d['Order']['payment_by'] == 'paypal'){ echo "PayPal";}
            elseif($d['Order']['payment_by'] == 'wire'){ echo "Bank Transfer ";}
            elseif($d['Order']['payment_by'] == 'cc'){ echo "Credit Card";}?><br>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Product Name</th>
              		<th class="text-center">Quantity</th>
              		<th class="text-center">Price</th>
                    <th class="text-center">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                <?php if(isset($d['OrderItem']) && !empty($d['OrderItem'])){
foreach ($d['OrderItem'] as $oList){ ?>          
<tr>
              <td><?php echo $oList['Product']['title'].' '.$oList['size'];
              if( in_array($oList['Product']['type'], array(2,3,5)) ){
              echo " <b>( Part no : ".$oList['Product']['part'].") - ".$oList['Product']['material']." </b><br>";
              echo $oList['Product']['Brand']['name']."/".$oList['Product']['Model']['name']."/".$oList['Product']['Motor']['name'];}
              ?></td>
              <td class="text-center"><?php echo $oList['quantity'];?></td>
              <td class="text-center"><?php echo "$".$oList['amount'];?></td>
              <td class="text-center"><?php if($oList['is_gift'] == 0){ echo "$".$oList['amount'];}else{ echo "$00.00";}?></td>
            </tr>
<?php }}?>  
                  
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <p class="lead">Payment Methods: <b><?php if($d['Order']['payment_by'] == 'paypal'){ echo "PayPal";}
            elseif($d['Order']['payment_by'] == 'wire'){ echo "Bank Transfer ";}
            elseif($d['Order']['payment_by'] == 'cc'){ echo "Credit Card";}
            elseif($d['Order']['payment_by'] == 'inquiry'){ echo "Inquiry";}
            ?></b></p>
<?php if ( !empty($d['Order']['transaction_id']) ){?><p class="lead">Transaction ID:<b> <?php echo $d['Order']['transaction_id'];?></b></p><?php }?>            
<p class="lead">VIN Number:<b> <?php echo strtoupper($d['Order']['vin_number']);?></b></p>            
<p class="lead">Customer Message:</p><p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"><?php echo $d['Order']['note'];?></p>
</div><!-- /.col -->
            <div class="col-xs-6">
              
              <div class="table-responsive">
              
                <table class="table">
                  <tr><th style="width:50%">Subtotal (+)</th><td>$<?php echo $d['Order']['total_amount'];?></td></tr>
                  <tr><th>Shipping Cost (+)</th><td>$<?php echo $d['Order']['shipping_cost'];?></td></tr>
                  <tr><th>Seasonal Shipping Fee Discount (-)</th><td>$<?php echo $d['Order']['discount'];?></td></tr>
                  <tr> <th>Import duty (+)</th> <td>$<?php echo $d['Order']['import_duty'];?></td> </tr>
                  <tr> <th>VAT (+)</th> <td>$<?php echo $d['Order']['vat'];?></td> </tr>
                  <tr> <th>Warranty Extension (+)</th> <td>$<?php echo num_2($d['Order']['warranty_extension']);?></td> </tr>
                  <?php /*?>
                  <tr> <th>Discount:</th> <td>$<?php echo $d['Order']['discount'];?></td> </tr>
                  <tr> <th>SS Discount:</th> <td>$<?php echo $d['Order']['ss_discount'];?></td> </tr>
                  <tr> <th>Titanium Discount:</th> <td>$<?php echo $d['Order']['titanium_discount'];?></td> </tr>
                  <?php */?>
                  <tr> <th>Grand Total</th> <td>$<?php echo $d['Order']['grand_total'];?></td> </tr>
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="<?php echo SITEURL."lab/labs/shipping_label/".$d['Order']['id'];?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print Shipping Label</a>
              
            </div>
          </div>
          <br><br>
<?php if ( in_array($d['Order']['region'], [1,2,3]) ){?>          
<div class="row">
<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Order History</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
<?php 
$order_status = $this->Lab->order_status();
$n=1; 
if(isset($d['OrderHistory']) && !empty($d['OrderHistory'])){
foreach ($d['OrderHistory'] as $hList){?>                
<tr>
 <th style="width: 10px">#<?php echo $n;?></th>
 <th><?php if( isset($order_status[$hList['order_status_id']])) { echo $order_status[$hList['order_status_id']];} ?></th>
 <th><?php echo $hList['comment'];?></th>
 <th><?php echo date('m/d/Y',strtotime($hList['created']));?></th>
 </tr>
<?php $n++; }} ?>                
</tbody></table>
</div>
<div class="box-footer clearfix">
</div>
</div>
</div> 
<br><br>

<div class="row">
<div class="col-md-8">

<div class="box box-info">
<div class="box-header with-border"><h3 class="box-title">Add Order Status</h3></div>
<div class="alert alert-info"><strong>Alert</strong> On shipped, Quantity will be decreased. </div>
<?php echo $this->Form->create('OrderHistory',array('class'=>'form-horizontal'));
echo $this->Form->hidden('order_id',array('value'=>$d['Order']['id'])); 
$arr = [];
if ( isset($d['OrderHistory']) && !empty($d['OrderHistory']) ){
    foreach ($d['OrderHistory'] as $hList ){ $arr[] = $hList['order_status_id']; }
}
$order_status = $this->Lab->order_status();
if ( !empty($arr) ){
    foreach ($arr as $k=>$v){
        if ( isset($order_status[$v]) ){
            unset($order_status[$v]);
        }
    }
}

?>
<div class="box-body">
<div class="form-group">
<label for="inputPassword3" class="col-sm-4 control-label">Order Status</label>
<div class="col-sm-8"><?php echo $this->Form->input('order_status_id',array('options'=>$order_status,'empty'=>' --Select Status--','label'=>false,'class'=>'form-control'));?></div>
</div>

<div class="form-group"><label for="inputPassword3" class="col-sm-4 control-label">Tracking Number</label>
<div class="col-sm-8"><?php echo $this->Form->input('tracking_number',array('value'=>$d['Order']['tracking_number'],'type'=>'text','label'=>false,'class'=>'form-control track','readonly'=>true));?></div></div>


<div class="form-group"><label for="inputPassword3" class="col-sm-4 control-label">Tracking URL</label>
<div class="col-sm-8"><?php echo $this->Form->input('tracking',array('value'=>$d['Order']['tracking'], 'type'=>'text','label'=>false,'class'=>'form-control track','readonly'=>true));?></div></div>


<div class="form-group">
<label class="col-sm-4 control-label">Message</label>
<div class="col-sm-8"><?php echo $this->Form->input('comment',array('type'=>'textarea','class'=>'form-control','label'=>false));?></div>
</div>

<div id="od_err"></div>
</div>
<div class="box-footer">
<input type="button" class="btn btn-info pull-right" id="up_o" value="Update Order Status">
</div>
<?php echo $this->Form->end();?>
</div>
</div>
</div>
<?php }?>
         
        </section><!-- /.content -->
        <div class="clearfix"></div>
      </div><!-- /.content-wrapper -->
      
<script>
$(document).ready(function() {

	$('#OrderHistoryOrderStatusId').on('change', function() { if ( this.value == 3 ){ $('.track').attr('readonly',false); } });
	$( "#up_o" ).click(function() {
		$('#od_err').html('');
		var id = $('#OrderHistoryOrderId').val();
		var st = $('#OrderHistoryOrderStatusId').val();
		var msg = $.trim($('#OrderHistoryComment').val());

		var tn = $.trim($('#OrderHistoryTrackingNumber').val());
		var tu = $.trim($('#OrderHistoryTracking').val());
		

		if( st == ""){ $('#od_err').html('<div class="alert alert-danger alert-dismissible">Pelease select order status.</div>');}
		else if ( st == 3 && tu == "" && tn == ""){ $('#od_err').html('<div class="alert alert-danger alert-dismissible">Pelease enter Tracking Number and URL.</div>'); }
		else{
			
		$("#preloader").show();			    
		$.ajax({type: 'POST',
			url: ''+SITEURL+'lab/labs/update_order',
			data: "type=update&id="+id+"&st="+st+"&msg="+msg+"&tu="+tu+"&tn="+tn,
			success: function(data) { $("#od_err").html(data); },
			error: function(comment) {  $("#od_err").html(comment); $("#preloader").hide(); }});
		}	
			
});
});
</script>      
      