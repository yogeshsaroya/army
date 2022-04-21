<div class="content-wrapper" style="min-height:1066px">
<section class="content-header"><h1>ARMYTRIX EXTRA PRODUCT</h1></section>
<?php echo $this->Session->flash('msg');?>
<section class="content">
<div class="box">

<div class="box-body">
<div class="box box-success">
<div class="box-body">
<div class="row">
<div class="col-sm-12" id="lab_table">
<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
<thead>
					<tr role="row">
                        <th><?php echo $this->Paginator->sort('Product.id', 'ID', array('escape' => false)); ?></th>
                        <th>Photo</th>
                        <th><?php echo $this->Paginator->sort('Product.title', 'Title', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Product.price', 'Price', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Product.quantity', 'Order/Quantity', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Product.status', 'Action', array('escape' => false)); ?></th>
                        <th>Delete</th>
                    </tr>
</thead>
<tbody id="table_rows">

<?php if(!empty($data)) {  $n=1; foreach($data as $list){
	$abc = explode(',',$list['Product']['extra_photos']);
	
	$get_path = null;
	if(isset($abc[0]) && !empty($abc[0])){
		$get_path = $this->Lab->getImage($abc[0]);
	}
	if(isset($get_path)){
		$imgg = new_show_image('cdn/'.$get_path,100,100,100,'ff',null);
	}else{
		$imgg = new_show_image('cdn/no_image_available.jpg',100,100,100,'ff',null);
	}
?>
                    <tr>
                        <td><?php echo $n;?></td>
                        <td class="center gnTxt"><img src="<?php echo $imgg;?>" class="img-thumbnail" alt=""> </td>
                        <td><a href="<?php echo SITEURL."shop/".$list['Product']['slug'];?>" title="" target="_blank"><?php echo $list['Product']['title'];?></a></td>
                        <td><?php echo "$".$list['Product']['price'];?></td>
                        <td><?php echo  $list['Product']['total_order']."/".$list['Product']['quantity'];?></td>
                        <td><?php echo $this->html->link('Edit','/lab/labs/add_extra_product?edit='.$list['Product']['id']);?>
                         | <?php 
                        if($list['Product']['status'] == 1){ echo $this->html->link('Active','/lab/labs/extra_product?status='.$list['Product']['id'],array('class' => 'text-green')); }
                        else{ echo $this->html->link('Deactive','/lab/labs/extra_product?status='.$list['Product']['id'],array('class' => 'text-red')); }
                        ?> </td>
                        <td> <?php echo $this->html->link('Delete','/lab/labs/extra_product?del='.$list['Product']['id'],array('class' => 'text-red','confirm' => 'Do you want to delete this product?')); ?></td>
                    </tr>
                   <?php $n++; }}else{?>
                   <td colspan="6">Your Product tab is empty</td>
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