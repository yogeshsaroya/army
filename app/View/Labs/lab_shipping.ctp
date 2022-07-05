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
.center{text-align: center !important}
</style>

<div class="content-wrapper" style="min-height: 916px;">
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Regions and Shipping</h1>
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
    <th class="center"><?php echo $this->Paginator->sort('CountryList.id', '#ID', array('escape' => false)); ?></th>
    <th class="center"><?php echo $this->Paginator->sort('CountryList.region', 'Region', array('escape' => false)); ?></th>
	<th class="center"><?php echo $this->Paginator->sort('CountryList.zone', 'Zone (motorcycle)', array('escape' => false)); ?></th>
    <th><?php echo $this->Paginator->sort('CountryList.short_name', 'Country Name', array('escape' => false)); ?></th>
    <th class="center"><?php echo $this->Paginator->sort('CountryList.catback', 'Cat-Back', array('escape' => false)); ?></th>
    <th class="center"><?php echo $this->Paginator->sort('CountryList.down_pipe', 'Down Pipe', array('escape' => false)); ?></th>
    <th class="center"><?php echo $this->Paginator->sort('CountryList.owrc', 'OWRC', array('escape' => false)); ?></th>
    <th class="center"><?php echo $this->Paginator->sort('CountryList.fedex_pack', 'Fedex Pack', array('escape' => false)); ?></th>
    <th class="center">Action</th>
</tr>
</thead>
<tbody id="table_rows">
 <?php
if (!empty($data)) { 
    foreach ($data as $list) { ?>
<tr class="odd gradeX">
    <td class="center gnTxt"> <?php echo $list['CountryList']['id']; ?></td>
    <td class="center gnTxt"><?php 
    if ($list['CountryList']['region'] == 1){ echo "Price";}
    elseif ($list['CountryList']['region'] == 2){ echo "No Price";}
    ?></td>
	<td class="center gnTxt"> <?php echo strtoupper($list['CountryList']['zone']); ?></td>
    <td class="gnTxt"><?php echo $list['CountryList']['short_name']; ?></td>
    <td class="center"> <?php echo "$".num_2($list['CountryList']['catback']); ?> </td>
    <td class="center"> <?php echo "$".num_2($list['CountryList']['down_pipe']); ?> </td>
    <td class="center"> <?php echo "$".num_2($list['CountryList']['owrc']); ?> </td>
    <td class="center"> <?php echo "$".num_2($list['CountryList']['fedex_pack']); ?> </td>
    <td class="center"> <?php echo $this->Html->link('Edit', array('controller' => 'labs', 'action' => 'edit_shipping', $list['CountryList']['id'])); ?> </td>
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