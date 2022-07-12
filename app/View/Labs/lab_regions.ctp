<?php
$regions = regions();
?>
<style>
	@media only screen and (max-width: 760px),
	(min-device-width: 768px) and (max-device-width: 1024px) {

		#lab_table td:nth-of-type(1):before {
			content: "Type"
		}

		#lab_table td:nth-of-type(2):before {
			content: "Sender"
		}

		#lab_table td:nth-of-type(3):before {
			content: "Email"
		}

		#lab_table td:nth-of-type(4):before {
			content: "Subject"
		}

		#lab_table td:nth-of-type(5):before {
			content: "Created"
		}

		#lab_table td:nth-of-type(6):before {
			content: "Status"
		}

		#lab_table td:nth-of-type(7):before {
			content: "Action"
		}
	}

	.center {
		text-align: center !important
	}
	
</style>

<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Regions and Zones</h1>
	</section>

	<!-- Main content -->
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
									echo $this->Html->link('Export','/lab/labs/export_zone',['class'=>'pull-right btn btn-info btn-flat']);
									echo $this->Html->link('Import','/lab/labs/import_zone',['class'=>'GnResPopAjax pull-right btn btn-info btn-flat mr-20 ']);	
									?>
								</div>
							</div>
								<div class="row">
									<div class="col-sm-12" id="lab_table">
										<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
											<thead>

												<tr role="row">
													<th class="center"><?php echo $this->Paginator->sort('CountryList.id', '#ID', array('escape' => false)); ?></th>
													<th><?php echo $this->Paginator->sort('CountryList.short_name', 'Country Name', array('escape' => false)); ?></th>
													<th class="center"><?php echo $this->Paginator->sort('CountryList.region', 'Region (car)', array('escape' => false)); ?></th>
													<th class="center"><?php echo $this->Paginator->sort('CountryList.bike_region', 'Region (motorcycle)', array('escape' => false)); ?></th>
													<th class="center"><?php echo $this->Paginator->sort('CountryList.zone', 'Zone (motorcycle)', array('escape' => false)); ?></th>

													<th class="center">Action</th>
												</tr>
											</thead>
											<tbody id="table_rows">
												<?php
												if (!empty($data)) {
													foreach ($data as $list) { ?>
														<tr class="odd gradeX">
															<td class="center gnTxt"> <?php echo $list['CountryList']['id']; ?></td>
															<td class="gnTxt"><?php echo $list['CountryList']['short_name']; ?></td>
															<td class="center gnTxt"><?php if (in_array($list['CountryList']['region'], [1, 2])) {
																							echo $regions[$list['CountryList']['region']];
																						} ?></td>
															<td class="center gnTxt"><?php if (in_array($list['CountryList']['bike_region'], [1, 2])) {
																							echo $regions[$list['CountryList']['bike_region']];
																						} ?></td>
															<td class="center gnTxt"> <?php echo strtoupper($list['CountryList']['zone']); ?></td>
															<td class="center"> <?php echo $this->Html->link('Edit', array('controller' => 'labs', 'action' => 'edit_regions', $list['CountryList']['id'])); ?> </td>
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
