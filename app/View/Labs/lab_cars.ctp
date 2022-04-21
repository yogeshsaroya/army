<div class="content-wrapper" style="min-height:1066px">
<section class="content-header"><h1>Exhaust System > All Make</h1></section>
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
						<th><?php echo $this->Paginator->sort('ExhaustBrand.id', 'ID', array('escape' => false)); ?></th>
						<th><?php echo $this->Paginator->sort('ExhaustBrand.image', 'Image', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('ExhaustBrand.brand_name', 'Make', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('ExhaustBrand.title', 'Title/URL', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('ExhaustBrand.created', 'Created', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('ExhaustBrand.status', 'Status', array('escape' => false)); ?></th>
                        <th>Action</th>
                    </tr>
</thead>
<tbody id="table_rows">

<?php
if (!empty($data)) {
    foreach ($data as $list) { 
    	$imgg = show_image('cdn/'.$list['Library']['folder'],$list['Library']['file_name'],75,75,100,'cf',null);
    	?>
        <tr class="odd gradeX">
        <td class="center gnTxt"><?php echo $list['ExhaustBrand']['id'];?></td>
        <td class="center gnTxt"><img src="<?php echo $imgg;?>" class="img-thumbnail" alt=""> </td>
           <td class="center gnTxt"><?php echo $list['ExhaustBrand']['brand_name'];?></td>
           <td class="center gnTxt"><a href="<?php echo SITEURL."product-exhaust-brands/".$list['ExhaustBrand']['url'];?>" title="" target="_blank">
           <?php echo $list['ExhaustBrand']['title'];?></a></td>
           <td class="center gnTxt"> <?php echo date('M d,y',strtotime($list['ExhaustBrand']['created'])); ?> </td>
           
           <td class="center gnTxt"><a href="<?php echo SITEURL."lab/labs/cars?id=".$list['ExhaustBrand']['id'];?>" title=""><?php if($list['ExhaustBrand']['status'] == 1){ echo "<p class='text-green'>Active</p>";}else{ echo "<p class='text-red'>Deactivate</p>";}?></a></td>
           <td class="center gnTxt"><a href="<?php echo SITEURL."lab/labs/add_cars/".$list['ExhaustBrand']['id'];?>" title="">Edit</a></td>
           
           </tr>
	<?php } }else{ ?>
	<tr class="odd gradeX"><td colspan="5"> <center>Record not found <a href="<?php echo SITEURL."lab/labs/country/";?>">Go Back</a></center></td></tr>
	<?php }?>
</tbody>
											
</table>
									</div>
                  </div>
                </div>
              </div>
</div>
<div class="box-footer">
<?php if(isset($paging['ExhaustBrand']['pageCount']) && $paging['ExhaustBrand']['pageCount'] > 1){?>
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