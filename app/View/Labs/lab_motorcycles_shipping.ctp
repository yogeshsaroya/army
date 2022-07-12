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
					<div class="box">
						<div class="box-body">
							<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div class="row mb-20">
									<div class="col-sm-6"></div>
									<div class="col-sm-6">
										<?php 
										echo $this->Html->link('Export (demo only)',SITEURL.'/doc/motorcycle_shipping.csv',['class'=>'pull-right btn btn-info btn-flat']);
										echo $this->Html->link('Import', '/lab/labs/import_bike_shipping', ['class' => 'GnResPopAjax pull-right btn btn-info btn-flat mr-20 ']); ?>
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
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>