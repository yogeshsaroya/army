<div class="main_wrapper" id="od_st">
    	<div class="container">
  <ul class="breadcrumb">
        <li><a href="<?php echo SITEURL;?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo SITEURL;?>account">Account</a></li>
      </ul>
    <div class="row">
<?php echo $this->element('user_nav');?>

<div id="content" class="col-sm-9">	  <h1 class="page-title">Order Information</h1>
      <h2>Order Information</h2>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-left" colspan="2">Order Details</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-left" style="width: 50%;">              <b>Order ID:</b> <?php echo $d['Order']['order_number'];?><br>
              <b>Date Added:</b> <?php echo date('d/m/Y',strtotime($d['Order']['created']));?></td>
            <td class="text-left">              
            <b>Payment Method:</b> <?php if($d['Order']['payment_by'] == 'paypal'){ echo "PayPal";}
            elseif($d['Order']['payment_by'] == 'wire'){ echo "Bank Transfer "; echo '<br><div class="bnk-trns-add _r_info" id="wire_info"><p>Bank Wire Transfer Information</p> '.nl2br($WebSetting['WebSetting']['bank_details']).' </p></div> '; }
            elseif($d['Order']['payment_by'] == 'cc'){ echo "Credit Card";}
            else{ echo "Inquiry"; }
            ?><br>
            <b>Shipping Method:</b> Shipping cost              
            </td>
          </tr>
        </tbody>
      </table>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-left" style="width: 50%;">Payment Address</td>
                        <td class="text-left">Shipping Address</td>
                      </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-left">
            <?php if(!empty($d['Order']['billing_company'])){ echo $d['Order']['billing_company']."<br>";}?>
            <?php echo $d['Order']['billing_address']." ".$d['Order']['billing_address_2'];?><br>
            <?php echo $d['Order']['billing_city']." ".$d['Order']['billing_zip'];?><br>
            <?php echo $d['BillingState']['name'];?><br>
            <?php echo $d['BillingCountry']['name'];?></td>
            
           <td class="text-left">
           <?php if(!empty($d['Order']['shipping_company'])){ echo $d['Order']['shipping_company']."<br>";}?>
            <?php echo $d['Order']['shipping_address']." ".$d['Order']['shipping_address_2'];?><br>
            <?php echo $d['Order']['shipping_city']." ".$d['Order']['shipping_zip'];?><br>
            <?php echo $d['ShippingState']['name'];?><br>
            <?php echo $d['ShippingCountry']['name'];?>
           </td>
                      </tr>
        </tbody>
      </table>
<div id="no-more-tables">
<table class="col-md-12 table-bordered table-condensed cf">
          <thead>
            <tr>
              <td class="text-left">Product Name</td>
              <td class="text-right">Quantity</td>
              <td class="text-right">Price</td>
              <td class="text-right">Total</td>
             </tr>
          </thead>
          <tbody>
<?php if(isset($d['OrderItem']) && !empty($d['OrderItem'])){
foreach ($d['OrderItem'] as $oList){?>          
<tr>
<td data-title="Product Name" class="text-left"><?php if(isset($oList['Product']['title']) && !empty($oList['Product']['title'])){ echo $oList['Product']['title'];}else{ echo "Product not available ";}?></td>
<td data-title="Quantity" class="text-right"><?php echo $oList['quantity'];?></td>
<td data-title="Price" class="text-right"><?php echo "$".$oList['amount'];?></td>
<td data-title="Total" class="text-right"><?php if($oList['is_gift'] == 0){ echo "$".$oList['amount'];}else{ echo "$00.00";}?></td>
</tr>
<?php }}?>            
</tbody>
</table>

<table class="table table-bordered table-hover">
<tbody>
<tr><td colspan="3" class="text-right"><b>Sub-Total</b></td><td class="text-right">$<?php echo $d['Order']['total_amount'];?></td></tr>
<tr><td colspan="3" class="text-right text-danger"><b>Shipping Cost (+)</b></td><td class="text-right">$<?php echo $d['Order']['shipping_cost'];?></td></tr>
<?php if ( $d['Order']['discount'] >0 ){?>
<tr><td colspan="3" class="text-right text-danger"><b>Seasonal Shipping Fee Discount - <?php echo $d['Order']['shipping_discount'];?>% off (-)	</b></td><td class="text-right">$<?php echo $d['Order']['discount'];?></td></tr>
<?php }?>
<?php if ( $d['Order']['import_duty'] >0 ){?><tr><td colspan="3" class="text-right text-danger"><b>Import duty (+)</b></td><td class="text-right">$<?php echo $d['Order']['import_duty'];?></td></tr><?php }?>
<?php if ( $d['Order']['warranty_extension'] >0 ){?><tr><td colspan="3" class="text-right text-danger"><b>Warranty Extension (+)</b></td><td class="text-right">$<?php echo $d['Order']['warranty_extension'];?></td></tr><?php }?>
<?php if ( $d['Order']['vat'] >0 ){?>
<tr><td colspan="3" class="text-right text-danger"><b>VAT (+)</b></td><td class="text-right">$<?php echo $d['Order']['vat'];?></td></tr>
<?php }?>

<?php /*?>
<tr><td colspan="3" class="text-right text-danger"><b>Paypal Handling Fee (+)</b></td><td class="text-right">$<?php echo $d['Order']['total_service_fee'];?></td></tr>
<tr><td colspan="2"></td><td class="text-right text-success"><b>Coupon Discount (-)</b></td><td class="text-right">$<?php echo $d['Order']['discount'];?></td></tr>
<tr><td colspan="2"></td><td class="text-right text-success"><b>SS Discount (-)</b></td><td class="text-right">$<?php echo $d['Order']['ss_discount'];?></td></tr>
<tr><td colspan="2"></td><td class="text-right text-success"><b>Titanium Discount (-)</b></td><td class="text-right">$<?php echo $d['Order']['titanium_discount'];?></td></tr>
<?php */?>
<tr><td colspan="2"></td><td class="text-right"><b>Grand Total</b></td><td class="text-right">$<?php echo $d['Order']['grand_total'];?></td></tr>
</tbody>
</table>
</div>
<h3>Order History</h3>
<div id="no-more-tables">
<table class="col-md-12 table-bordered table-condensed cf">
        <thead>
          <tr>
            <th class="text-left">Created</td>
            <th class="text-left">Order Status</td>
            <th class="text-left">Comment</td>
          </tr>
        </thead>
        <tbody>
<?php 
$order_status = $this->Lab->order_status();
$n=1; 
if(isset($d['OrderHistory']) && !empty($d['OrderHistory'])){
foreach ($d['OrderHistory'] as $hList){?>                
<tr>
<td data-title="Created"><?php echo date('d/m/Y',strtotime($hList['created']));?></th>
<td data-title="Order Status"><?php if( isset($order_status[$hList['order_status_id']])) { echo $order_status[$hList['order_status_id']];} ?></th>
<td data-title="Comment"><?php echo $hList['comment'];?></th>
</tr>
<?php $n++; }} ?>  
</tbody>
</table>
</div>

<div class="clearfix"></div>
<br>
<div class="buttons clearfix"> <div class="pull-right"><a href="<?php echo SITEURL;?>order" class="btn btn-primary">Back to Order List</a></div></div>

</div></div></div></div>