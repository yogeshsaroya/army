<div class="main_wrapper" id="order_page">
    	<div class="container">
  <ul class="breadcrumb">
        <li><a href="<?php echo SITEURL;?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo SITEURL;?>account">Account</a></li>
      </ul>
    <div class="row">
<?php echo $this->element('user_nav');?>
<div  class="col-sm-9">      
<h1 class="page-title">Order History</h1>
<div id="no-more-tables">
<table class="col-md-12 table-bordered table-condensed cf">
          <thead>
            <tr>
            <td class="text-right">Type</td>
              <td class="text-right">Order ID</td>
              <td class="text-left">Order Status</td>
              <td class="text-left">Ordered</td>
              <td class="text-right">No. of Products</td>
              <td class="text-right">Total $</td>
              <td class="text-right">Action</td>
            </tr>
          </thead>
          <tbody>
<?php
$order_status = $this->Lab->order_status();
if( isset($data) && !empty($data)){
	foreach ($data as $list){ ?>          
<tr>
<td data-title="Type" class="text-right"><?php if($list['Order']['type'] == 1){ echo "Order"; } elseif($list['Order']['type'] == 2){ echo "Inquiry"; } ?></td>
<td data-title="Order ID" class="text-right"><?php echo $list['Order']['order_number'];?></td>
<td data-title="Status" class="text-left"><?php if($list['Order']['order_status_id'] == 0){ echo "In progress"; } elseif( isset( $order_status[$list['Order']['order_status_id']] )){ echo $order_status[$list['Order']['order_status_id']]; }?></td>
<td data-title="Ordered" class="text-left"><?php echo date('m/d/Y',strtotime($list['Order']['created']));?></td>
<td data-title="No. of Products" class="text-right"><?php echo count($list['OrderItem']);?></td>
<td data-title="Total $" class="text-right"><?php echo "$".num_2($list['Order']['grand_total']);?></td>
<td data-title="Action" class="text-right">
<a href="<?php echo SITEURL."accounts/order_message/".$list['Order']['id'];?>" data-toggle="tooltip" title="" class="btn btn-success" data-original-title="View"><i class="fa fa-comments"> <?php if(!empty($list['OrderMessage'])){ echo "<span>".count($list['OrderMessage'])."</span>";}?> </i></a>
<a href="<?php echo SITEURL."accounts/order_status/".$list['Order']['order_number'];?>" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="View"><i class="fa fa-eye"></i></a>
</td>
</tr>
<?php }}else{?>
<tr><td data-title="" class="text-center" colspan="7">You have not made any previous orders!</td></tr>
<?php }?>            
</tbody>
        </table>
      </div>
      </div>
    </div>
</div>
</div>
