<!-- DATA TABLES -->
<link href="<?php echo SITEURL."lab_root/";?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

<div class="content-wrapper" style="min-height: 916px;">
<!-- Content Header (Page header) -->
<section class="content-header"><h1>Warranty Registration</h1></section>
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
				<div class="col-sm-6"> <a href="<?php echo SITEURL."lab/labs/export_warranty";?>" class="pull-right btn btn-info btn-flat"> Export </a> </div>
			</div>
			<div class="row">
				<div class="col-sm-12" id="lab_table">
					<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
						<thead>
						
<tr role="row">
    <th><?php echo $this->Paginator->sort('Warranty.id', '#ID', array('escape' => false)); ?></th>
    <th><?php echo $this->Paginator->sort('Warranty.first_name', 'Name', array('escape' => false)); ?></th>
    <th><?php echo $this->Paginator->sort('Warranty.email', 'Email', array('escape' => false)); ?></th>
    <th><?php echo $this->Paginator->sort('Warranty.country', 'Country', array('escape' => false)); ?></th>
    <th><?php echo $this->Paginator->sort('Warranty.seller', 'Seller', array('escape' => false)); ?></th>
    <th><?php echo $this->Paginator->sort('Warranty.serial_number', 'Serial Number', array('escape' => false)); ?></th>
    <th><?php echo $this->Paginator->sort('Warranty.shop', 'Installer', array('escape' => false)); ?></th>
    <th><?php echo $this->Paginator->sort('Warranty.installation_date', 'Installation Date', array('escape' => false)); ?></th>
    <th><?php echo $this->Paginator->sort('Warranty.created', 'Created', array('escape' => false)); ?></th>
    
</tr>
</thead>
<tbody id="table_rows">
 <?php
if (!empty($data)) { 
    foreach ($data as $list) { ?>
<tr class="odd gradeX">
    <td class="center gnTxt"> <?php echo $list['Warranty']['id']; ?></td>
    <td class="center gnTxt"><?php echo $list['Warranty']['first_name']." ".$list['Warranty']['last_name']; ?></td>
    <td class="center gnTxt"><?php echo $list['Warranty']['email']; ?></td>
    <td class="center gnTxt"><?php echo $list['Warranty']['country']; ?></td>
    <td class="center gnTxt"><?php echo $list['Warranty']['seller']; ?></td>
    <td class="center gnTxt"><?php echo $list['Warranty']['serial_number']; ?></td>
    <td class="center gnTxt"><?php echo $list['Warranty']['shop']; ?></td>
    <td class="center gnTxt"><?php echo $list['Warranty']['installation_date']; ?></td>
    <td class="center gnTxt"><?php echo date('Y-m-d',strtotime($list['Warranty']['created'])); ?></td>
    
    
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
