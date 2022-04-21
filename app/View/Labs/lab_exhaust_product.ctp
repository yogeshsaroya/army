<div class="content-wrapper" style="min-height:1066px">
<section class="content-header"><h1>ARMYTRIX VALVETRONIC EXHAUST SYSTEM</h1></section>
<?php echo $this->Session->flash('msg');?>
<section class="content">
<div class="box">

<div class="box-body">
<div class="box box-success">
<div class="box-body">

				
					<div class="box-header">
						<div class="box-body">
<div class="row">
<div class="box-body col-xs-12">
<div class="col-xs-4"><?php echo $this->Form->input('brand_id',array('id'=>'brand_id', 'options'=>$brand,'default'=>@$q['brand'], 'empty'=>' --Select Make -- ','label'=>false,'class'=>'form-control'));?></div>
<div class="col-xs-4"><?php echo $this->Form->input('model_id',array('id'=>'model_id','options'=>@$model_list,'default'=>@$q['model'],'empty'=>' --Select Model -- ','label'=>false,'class'=>'form-control'));?></div>
<div class="col-xs-4"><?php echo $this->Form->input('motor_id',array('id'=>'motor_id','options'=>@$engList,'default'=>@$q['motor'],'empty'=>' --Select Year/Motor -- ','label'=>false,'class'=>'form-control'));?></div>
</div>
<div class="box-body col-xs-12">              
							<?php  echo $this->element('labs/page_filter');?>
						</div>
					</div>
</div>


<div class="row">
<div class="col-sm-12" id="lab_table">
<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
<thead>
					<tr role="row">
					<th><?php echo $this->Paginator->sort('Product.id', 'ID', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Product.library_id', 'Photo', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Product.type', 'Type', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Brand.name', 'Make/Model/Motor', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Product.title', 'Title', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Product.part', 'Part', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Product.price', 'Price', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Product.quantity', 'Order/Quantity', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Product.status', 'Action', array('escape' => false)); ?></th>
                        <th>Delete</th>
                    </tr>
</thead>
<tbody id="table_rows">

<?php if(!empty($data)) {  $n=1; foreach($data as $list){

	$path = 'cdn/'.$list['Library']['folder'];
	 
	$imgg = show_image($path,$list['Library']['file_name'],100,100,100,'ff',null);
?>
                    <tr>
                        <td><?php echo $list['Product']['id'];?></td>
                        <td class="center gnTxt"><img src="<?php echo $imgg;?>" class="img-thumbnail" alt=""> </td>
                        <td><?php if($list['Product']['type'] == 2){ echo "Cat-back";}
                        elseif($list['Product']['type'] == 3){ echo "Catalytic";}
                        elseif($list['Product']['type'] == 5){ echo "Accessory";}
                        ?></td>
                        <td><?php echo $list['Brand']['name']."/ ".$list['Model']['name']."/ ".$list['Motor']['name'];?></td>
                        <td><?php echo $list['Product']['title'];?></td>
                        <td><?php echo $list['Product']['part'];?></td>
                        <td><?php echo "$".$list['Product']['price'];?></td>
                        <td><?php echo  $list['Product']['total_order']."/".$list['Product']['quantity'];?></td>
                        <td><?php echo $this->html->link('Edit','/lab/labs/add_exhaust_product/'.$list['Product']['brand_id'].'/'.$list['Product']['model_id'].'/'.$list['Product']['motor_id'].'?edit='.$list['Product']['id']);?>
                         | <?php 
                        if($list['Product']['status'] == 1){ echo $this->html->link('Active','/lab/labs/exhaust_product?status='.$list['Product']['id'],array('class' => 'text-green')); }
                        else{ echo $this->html->link('Deactive','/lab/labs/exhaust_product?status='.$list['Product']['id'],array('class' => 'text-red')); }
                        ?></td>
                        <td> <?php echo $this->html->link('Delete','/lab/labs/exhaust_product?del='.$list['Product']['id'],array('class' => 'text-red','confirm' => 'Do you want to delete this Product?')); ?></td>
                    </tr>
                   <?php $n++; }}else{?>
                   <td colspan="10">Your Product tab is empty</td>
                   <?php }?> 
</tbody>
											
</table>
									</div>
                  </div>
                </div>
              </div>
</div>
<div class="box-footer">
<?php if(isset($paging['Product']['pageCount']) && $paging['Product']['pageCount'] > 1){?>
<div class="row" id="paginate_info">
<div class="col-sm-5">
<div class="dataTables_info" id="example2_info" role="status" aria-live="polite"><?php echo $this->Paginator->counter(
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
<?php }?>
</div>
</div>
</section>
</div>

<script>
$(document).ready(function(){
	$( "#brand_id" ).change(function() { window.location.href = '<?php echo SITEURL;?>lab/labs/exhaust_product?brand='+this.value; });
	$( "#model_id" ).change(function() { var brand_id = $( "#brand_id" ).val(); window.location.href = '<?php echo SITEURL;?>lab/labs/exhaust_product?brand='+brand_id+'&model='+this.value; });
	$( "#motor_id" ).change(function() { 
		var brand_id = $( "#brand_id" ).val();
		var model_id = $( "#model_id" ).val(); 
	window.location.href = '<?php echo SITEURL;?>lab/labs/exhaust_product?brand='+brand_id+'&model='+model_id+'&motor='+this.value; });
});

</script>
