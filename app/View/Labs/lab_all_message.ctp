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
		<h1>Customers Messages</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<!-- /.box-header -->
					<div class="box">
						
						<div class="box-body">
							<div id="example2_wrapper"
								class="dataTables_wrapper form-inline dt-bootstrap">
								<div class="row">
									<div class="col-sm-6"></div>
									<div class="col-sm-6"></div>
								</div>
								<div class="row">
									<div class="col-sm-12" id="lab_table">
										<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
											<thead>
											
					<tr role="row">
                        <th><?php echo $this->Paginator->sort('OrderMessage.id', 'ID', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Order.order_number', 'Order Number', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Order.payment_by', 'Payment By', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Order.order_status_id', 'Status', array('escape' => false)); ?></th>
                        <th>Action</th>
                    </tr>
</thead>
<tbody id="table_rows">

 <?php
 $order_status = $this->Lab->order_status();
                    if (!empty($data)) {
                        foreach ($data as $list) { ?>
                            <tr class="odd gradeX">
                                <td class="center gnTxt"> <?php echo $list['OrderMessage']['id']; ?></td>
                                <td class="center gnTxt"><?php echo $list['Order']['order_number']; ?></td>
                                <td class="center gnTxt"> <?php echo $list['Order']['payment_by']; ?> </td>
                                
                                <td class="center"> <?php
                                if($list['Order']['order_status_id'] == 0){ echo "In progress"; }
                                elseif( isset( $order_status[$list['Order']['order_status_id']] )){ echo $order_status[$list['Order']['order_status_id']]; }
                                ?> </td>
                                
                                <td class="center"> <?php echo $this->Html->link('View', array('controller' => 'labs', 'action' => 'view_message', $list['OrderMessage']['order_id'])); ?> </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
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
	
	</section>
	<!-- /.content -->
</div>
<script>
$(document).ready(function () {
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