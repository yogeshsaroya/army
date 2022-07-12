<link href="<?php echo SITEURL . "lab_root/"; ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<style>
	.center {
		text-align: center !important
	}
</style>

<div class="content-wrapper" style="min-height: 916px;">
	<section class="content-header">
		<h1>Motorcycles Shipping</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">

					<!-- /.box-header -->
					<div class="box">

						<div class="box-body">
							<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
							<div class="row mb-20">
									<div class="col-sm-6"></div>
									<div class="col-sm-6">
									<?php 
									echo $this->Html->link('Export','lab/labs/export_zone',['class'=>'pull-right btn btn-info btn-flat']);
									echo $this->Html->link('Import','lab/labs/import_zone',['class'=>'pull-right btn btn-info btn-flat mr-20']);	
									?>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12" id="lab_table">
										<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
											<thead>

												<tr role="row">
													<th class="center"><?php echo $this->Paginator->sort('MotorcycleShipping.zone', 'Zone (motorcycle)', array('escape' => false)); ?></th>
													<th class="center"><?php echo $this->Paginator->sort('MotorcycleShipping.box_size', 'Box Size', array('escape' => false)); ?></th>
													<th class="center"><?php echo $this->Paginator->sort('MotorcycleShipping.price', 'Price', array('escape' => false)); ?></th>
												</tr>
											</thead>
											<tbody id="table_rows">
												<?php
												if (!empty($data)) {
													foreach ($data as $list) { ?>
														<tr class="odd gradeX">

															<td class="center gnTxt"> <?php echo strtoupper($list['MotorcycleShipping']['zone']); ?></td>
															<td class="center gnTxt"><?php echo $list['MotorcycleShipping']['box_size']; ?></td>
															<td class="center"> <?php echo "$" . num_2($list['MotorcycleShipping']['price']); ?> </td>
														</tr>
												<?php }
												} ?>
											</tbody>

										</table>
									</div>
								</div>
								<div class="row" id="paginate_info">
									<div class="col-sm-5">
										<div class="dataTables_info" id="example2_info" role="status" aria-live="polite"><?php echo $this->Paginator->counter(
																																'Page {:page} of {:pages}, showing {:current} records out of
     {:count} total, starting on record {:start}, ending on {:end}'
																															); ?></div>
									</div>
									<div class="col-sm-7">
										<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">

											<ul class="pagination">
												<?php
												echo $this->Paginator->prev('Previous', array('tag' => 'li'), null, array('class' => 'paginate_button previous disabled'));
												echo $this->Paginator->numbers(array('modulus' => 1, 'first' => 2, 'last' => 2, 'separator' => '', 'tag' => 'li', 'ellipsis' => false, 'class' => 'paginate_button'));
												echo $this->Paginator->next('Next', array('tag' => 'li'), null, array('class' => 'paginate_button previous disabled')); ?>
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
	$(document).ready(function() {
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