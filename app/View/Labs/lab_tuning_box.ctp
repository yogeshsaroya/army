<div class="content-wrapper" style="min-height: 1066px;">
<style>
@media (max-width: 767px) { .col-xs-2 { width: auto; } }
</style>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> ECU Tuning Box </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-body">
            
            <div id="app_err"></div>
            <?php echo $this->Session->flash('msg');?>

		<div class="col-md-12">

              
              <div class="box box-success">
                <div class="box-header"> <h3 class="box-title">All ECU Tuning Box</h3> </div>
                <div class="box-body">
                  								<div class="row">
									<div class="col-sm-12" id="lab_table">
										<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
											<thead>
											
					<tr role="row">
                        <th><?php echo $this->Paginator->sort('Product.id', 'ID', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Brand.name', 'Make', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Model.name', 'Model/Motor', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Product.title', 'Title', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Product.part', 'Part', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Product.price', 'Price', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Product.quantity', 'Order/Quantity', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Product.status', 'Action', array('escape' => false)); ?></th>
                    </tr>
</thead>
<tbody id="table_rows">

                <?php if(!empty($data)) {  $n=1; foreach($data as $list){?>
                    <tr>
                        <td><?php echo $n;?></td>
                        <td><?php echo $list['Brand']['name'];?></td>
                        <td><?php echo $list['Model']['name']."<br>".$list['Motor']['name'];?></td>
                        
                        <td><?php echo $list['Product']['title'];?></td>
                        
                        <td><?php echo $list['Product']['part'];?></td>
                        <td><?php echo "$".$list['Product']['price'];?></td>
                        <td><?php echo  $list['Product']['total_order']."/".$list['Product']['quantity'];?></td>
                        <td>
                        <?php echo $this->html->link('Edit','/lab/labs/new_tuning_box/'.$list['Product']['brand_id'].'/'.$list['Product']['model_id'].'/'.$list['Product']['motor_id'].'?edit='.$list['Product']['id']);?>
                         | 
                        
                        <?php 
                        if($list['Product']['status'] == 1){ echo $this->html->link('Active','/lab/labs/tuning_box?status='.$list['Product']['id'],array('class' => 'text-green')); }
                        else{ echo $this->html->link('Deactive','/lab/labs/tuning_box?status='.$list['Product']['id'],array('class' => 'text-red')); }
                        ?> 
                        </td>
                    </tr>
                   <?php $n++; }}else{?>
                   <td colspan="6">Your Product tab is empty</td>
                   <?php }?> 
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
            </div>              
            </div>
            
          </div>

        </section><!-- /.content -->
      </div>
     