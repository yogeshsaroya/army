<!-- DATA TABLES -->
<link href="<?php echo SITEURL."lab_root/";?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<style>


@media only screen and (max-width: 760px),(min-device-width: 768px) and (max-device-width: 1024px) {

#lab_table td:nth-of-type(1):before{content:"Type"}
#lab_table td:nth-of-type(2):before{content:"Sender"}
#lab_table td:nth-of-type(3):before{content:"Email"}
#lab_table td:nth-of-type(4):before{content:"Subject"}
#lab_table td:nth-of-type(5):before{content:"Created"}
#lab_table td:nth-of-type(6):before{content:"Status"}
#lab_table td:nth-of-type(7):before{content:"Action"}
}
</style>

<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Order List</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
			
				<div class="box">
				
				
					<div class="box-header">
						<div class="box-body">
<div class="row">
<div class="box-body col-xs-12">
<div class="col-xs-3"><?php echo $this->Form->input('order_status',array('options'=>$this->Lab->order_status(),'default'=>(isset($q['s'])? $q['s'] : null), 'empty'=>' --Select Order Status -- ','label'=>false,'class'=>'form-control'));?></div>
<div class="col-xs-3"><?php echo $this->Form->input('payment_by',array('options'=>$this->Lab->payment_by(),'default'=>(isset($q['p'])? $q['p'] : null),'empty'=>' --Select Payment Type -- ','label'=>false,'class'=>'form-control'));?></div>
<div class="col-xs-5">
<div class="input-group input-group-sm">
<input type="number" class="form-control" id="total" value="<?php echo (isset($q['t'])? $q['t'] : null);?>" placeholder="# Total"><span class="input-group-btn"> <button type="button" class="btn btn-info btn-flat" id="t_filter">Filter!</button> </span>
              </div>
</div>
</div>
</div>              
<?php  echo $this->element('labs/page_filter');?>
	</div>
</div>
<!-- /.box-header -->
<div class="box">
	
<div class="box-body">
<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

<div class="row">
	<div class="col-sm-12" id="lab_table">
		<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
			<thead>
						
<tr role="row">
	<th><?php echo $this->Paginator->sort('Order.type', 'Type', array('escape' => false)); ?></th>
	<th><?php echo $this->Paginator->sort('Order.region', 'Region', array('escape' => false)); ?></th>
    <th><?php echo $this->Paginator->sort('Order.order_number', 'Order Number', array('escape' => false)); ?></th>
    <th><?php echo $this->Paginator->sort('Order.first_name', '	Customer', array('escape' => false)); ?></th>
    <th><?php echo $this->Paginator->sort('Order.order_status_id', 'Status', array('escape' => false)); ?></th>
    <th><?php echo $this->Paginator->sort('Order.payment_by', 'Payment By', array('escape' => false)); ?></th>
    <th><?php echo $this->Paginator->sort('Order.grand_total', 'Total', array('escape' => false)); ?></th>
    <th><?php echo $this->Paginator->sort('Order.shipping_country', 'Country', array('escape' => false)); ?></th>
    <th><?php echo $this->Paginator->sort('Order.created', 'Created', array('escape' => false)); ?></th>
    <th>Action</th>
    <th>Hide</th>
</tr>
</thead>
<tbody id="table_rows">
<?php
$order_status = $this->Lab->order_status();
if (!empty($data)) {
    foreach ($data as $list) { ?>
<tr class="odd gradeX">
<td class="center gnTxt"> <?php if($list['Order']['type'] == 1){ echo "Order"; } elseif($list['Order']['type'] == 2){ echo "Inquiry"; } ?> </td>
<td class="center gnTxt"><?php 
    if ($list['Order']['region'] == 1){ echo "Price";}
    elseif ($list['Order']['region'] == 2){ echo "No Price";}
    
    ?></td>
    <td class="center gnTxt"><?php echo $list['Order']['order_number']; ?></td>
    <td class="center gnTxt"><?php echo $list['Order']['first_name']." ".$list['Order']['last_name']; ?></td>
    <td class="center gnTxt"> <?php
    if($list['Order']['order_status_id'] == 0){ echo "In progress"; }
    elseif( isset( $order_status[$list['Order']['order_status_id']] )){ echo $order_status[$list['Order']['order_status_id']]; }
    ?> </td>
    
    <td class="center gnTxt"><?php if($list['Order']['payment_by'] == 'paypal'){ echo "PayPal";} 
    elseif($list['Order']['payment_by'] == 'wire'){ echo "Bank Transfer ";} 
    elseif($list['Order']['payment_by'] == 'cc'){ echo "Credit Card";} ?> </td>
    
    <td class="center"> <?php echo "$".num_2($list['Order']['grand_total'],2); ?> </td>
    <td class="center"> <?php echo $list['Order']['shipping_country']; ?> </td>
    <td class="center"> <?php echo date('M d,y',strtotime($list['Order']['created'])); ?> </td>
    <td class="center"> 
    <a class="" href="<?php echo SITEURL."lab/labs/view_order/".$list['Order']['id'];?>" title="View Order"> <i class="fa fa-edit"></i> Edit </a></td>
    <td> 
    <?php if( !in_array($list['Order']['order_status_id'], array(1,2,13))){echo $this->html->link('Archive','/lab/labs/hide_order/'.$list['Order']['id'],array('class' => 'text-red','confirm' => 'Do you want to Archive this Order?')); }?>
    </td>
</tr>
<?php } } ?>
</tbody>
											
										</table>
									</div>
								</div>
								<div class="row" id="paginate_info">
									<div class="col-sm-5">
										<div class="dataTables_info" id="example2_info" role="status"
											aria-live="polite"><?php echo $this->Paginator->counter(
    'Page {:page} of {:pages}, showing {:current} records out of
     {:count} total, starting on record {:start}, ending on {:end}'
);?></div>
									</div>
									<div class="col-sm-7">
										<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
										
<ul class="pagination"> 
	<?php 
	echo $this->Paginator->prev('Previous', array('tag'=>'li'), null, array('class' => 'paginate_button previous disabled')); 
	echo $this->Paginator->numbers(array('modulus' => 1,'first' => 2,'last' => 2,'separator' =>'','tag'=>'li','ellipsis'=>false,'class'=>'paginate_button')); 
	echo $this->Paginator->next('Next', array('tag'=>'li'), null, array('class' => 'paginate_button previous disabled')); ?> 
	</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
	</div>
	</section>
	<!-- /.content -->
</div>
<script>
$(document).ready(function () {

	$( "#order_status" ).change(function() { window.location.href = '<?php echo SITEURL;?>lab/labs/order_users?s='+this.value; });
	$( "#payment_by" ).change(function() { window.location.href = '<?php echo SITEURL;?>lab/labs/order_users?p='+this.value; });

	$( "#t_filter" ).click(function() {
		var t = $.trim($('#total').val());
		if(t != ''){ window.location.href = '<?php echo SITEURL;?>lab/labs/order_users?t='+t; }
		});
		
	  var $rows = $('#table_rows tr');
	  $('#tab_search').keyup(function() {
	      var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
	      
	      $rows.show().filter(function() {
	          var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
	          return !~text.indexOf(val);
	      }).hide();
	  });
	});
</script>