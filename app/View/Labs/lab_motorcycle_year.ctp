<?php 
$years = getYears();
?>
<div class="content-wrapper" style="min-height: 1066px;">
	<style>
		@media (max-width: 767px) {
			.col-xs-2 {
				width: auto;
			}
		}
        #clr_btn{margin-left: 20px;}
	</style>
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1> Motorcycle Models Year </h1>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-body">

				<div id="app_err"></div>
				<?php echo $this->Session->flash('msg'); ?>

				<div class="col-md-12">

					<div class="box box-warning">
						<div class="box-header with-border">
							<h3 class="box-title"><?php if (isset($e['Model']['name'])) {
														echo "Edit";
													} else {
														echo "Add New";
													} ?> Model Year</h3>
						</div>
						<div class="box-body">
							<?php
							echo $this->Form->create('MotorcycleYear');
							if (isset($e['MotorcycleYear']) && !empty($e['MotorcycleYear'])) {
								$this->request->data['MotorcycleYear'] = $e['MotorcycleYear'];
							}
							echo $this->Form->hidden('id', array('id' => 'id'));
							?>

							<div class="box-footer">
								<div class="col-xs-3">
									<label>Make</label>
									<?php if (isset($e['MotorcycleModel']['motorcycle_make_id']) && !empty($e['MotorcycleModel']['motorcycle_make_id'])) {
										$id = $e['MotorcycleModel']['motorcycle_make_id'];
									} ?>
									<?php echo $this->Form->input('motorcycle_make_id', array('id' => 'brand_id', 'options' => $brand, 'empty' => 'Select Make', 'default' => $id, 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md')); ?>
								</div>
								<div class="col-xs-3">
									<label>Model</label><?php echo $this->Form->input('motorcycle_model_id', array('id' => 'model_id', 'options' => $model_list, 'empty' => 'Select Model', 'default' => $mid, 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md')); ?>
								</div>
								<div class="col-xs-3"><label>Year From</label><?php echo $this->Form->input('year_from', array('id' => 'year_from','options' => $years, 'empty' => 'Year From', 'default' =>(isset($year_from)?$year_from:null), 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md')); ?></div>
                                <div class="col-xs-3"><label>Year To</label><?php echo $this->Form->input('year_to', array('id' => 'year_to','options' => $years, 'empty' => 'Year To', 'default' => (isset($year_to)? $year_to:null), 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md')); ?></div>
							</div>
							<div class="clearfix"></div>
							<div class="box-footer">
                            <?php echo $this->Html->link('Clear','/lab/labs/motorcycle_year',['class'=>'btn btn-default pull-right','id'=>'clr_btn']);?>
								<input type="button" class="btn btn-success pull-right" id="add_br" value="Save">
                                
							</div>
						</div>
						<!-- /.box-body -->
					</div>


					<div class="box box-success">
						<div class="box-header">
							<h3 class="box-title">All Make</h3>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12" id="lab_table">
									<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
										<thead>

											<tr role="row">
												<th><?php echo $this->Paginator->sort('MotorcycleYear.id', 'ID', array('escape' => false)); ?></th>
												<th><?php echo $this->Paginator->sort('MotorcycleYear.year_from', 'Year', array('escape' => false)); ?></th>
												<th><?php echo $this->Paginator->sort('MotorcycleModel.name', 'Model', array('escape' => false)); ?></th>
												<th><?php echo $this->Paginator->sort('MotorcycleMake.name', 'Make', array('escape' => false)); ?></th>
												<th>Edit</th>
												<th>Delete?</th>
												<th><?php echo $this->Paginator->sort('Motor.status', 'Action', array('escape' => false)); ?></th>
												<th>Create</th>
											</tr>
										</thead>
										<tbody id="table_rows">

											<?php if (!empty($data)) {
												$n = 1;
												foreach ($data as $list) { ?>
													<tr id="tr_<?php echo $list['MotorcycleYear']['id']; ?>">
														<td><?php echo $list['MotorcycleYear']['id']; ?></td>
														<td><?php echo $list['MotorcycleYear']['year_from']." - ".(!empty($list['MotorcycleYear']['year_to'])? $list['MotorcycleYear']['year_to'] : 'present'); ?></td>
														<td><?php echo $list['MotorcycleModel']['name']; ?></td>
														<td><?php echo $list['MotorcycleMake']['name']; ?></td>
														<td> <?php echo $this->html->link('Edit', '/lab/labs/motorcycle_year/' . $list['MotorcycleYear']['motorcycle_make_id'] . '/' . $list['MotorcycleYear']['motorcycle_model_id'] . '?edit=' . $list['MotorcycleYear']['id']); ?></td>
														<td> <?php echo $this->html->link('Delete', '/lab/labs/motorcycle_year/' . $list['MotorcycleYear']['motorcycle_make_id'] . '/' . $list['MotorcycleYear']['motorcycle_model_id'] . '?del=' . $list['MotorcycleYear']['id'],['confirm'=>'Are you sure you wnat to delete this models year?']); ?></td>
														<td> <?php
																if ($list['MotorcycleYear']['status'] == 1) {
																	echo $this->html->link('Active', '/lab/labs/motorcycle_year?status=' . $list['MotorcycleYear']['id'], array('class' => 'text-green'));
																} else {
																	echo $this->html->link('Deactive', '/lab/labs/motorcycle_year?status=' . $list['MotorcycleYear']['id'], array('class' => 'text-red'));
																} ?></tb>

														<td class="center gnTxt"><a href="<?php echo SITEURL . "lab/labs/mk_motorcycle_page/" . $list['MotorcycleYear']['id'] . "/" . $list['MotorcycleYear']['motorcycle_model_id'] . "/" . $list['MotorcycleYear']['motorcycle_make_id']; ?>" title="">Add Page</a></td>

													</tr>
												<?php $n++;
												}
											} else { ?>
												<tr>
													<td colspan="8">Model years tab is empty</td>
												</tr>
											<?php } ?>
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
				</div>
			</div>

		</div>

	</section><!-- /.content -->
</div>

<script>
	$(document).ready(function() {
		$("#brand_id").change(function() {
			window.location.href = '<?php echo SITEURL; ?>lab/labs/motorcycle_year/' + this.value;
		});
		<?php if (isset($e['MotorcycleYear']) && !empty($e['MotorcycleYear'])) {
		} else { ?>
			$("#model_id").change(function() {
				var brand_id = $("#brand_id").val();
				window.location.href = '<?php echo SITEURL; ?>lab/labs/motorcycle_year/' + brand_id + '/' + this.value;
			});
		<?php } ?>



		$("#add_br").click(function() {
			$("#app_err").html('');
			var id = $.trim($('#id').val());
			var brand_id = $.trim($('#brand_id').val());
			var model_id = $.trim($('#model_id').val());

            var year_from = $.trim($('#year_from').val());
            var year_to = $.trim($('#year_to').val());
            
			

			if (brand_id == "") {
				$('#brand_id').focus();
				$("#app_err").html('<div class="alert alert-danger" role="alert"> Please select make name.</div>');
			} else if (model_id == "") {
				$('#model_id').focus();
				$("#app_err").html('<div class="alert alert-danger" role="alert"> Please select model name.</div>');
			} else if (year_from == "") {
				$('#year_from').focus();
				$("#app_err").html('<div class="alert alert-danger" role="alert"> Please select year from.</div>');
			} 
            else {

				$("#add_br").prop("disabled", true);
				$("#add_br").val('Please wait...');
				$.ajax({
					type: 'POST',
					url: '' + SITEURL + 'lab/labs/motorcycle_year',
					data : {motorcycle_make_id:brand_id,motorcycle_model_id:model_id,id:id,year_from:year_from,year_to:year_to},
					success: function(data) {
						btnDefault('add_br', 'Save');
						$("#app_err").html(data);
					},
					error: function(comment) {
						btnDefault('add_br', 'Save');
						$("#app_err").html(data);
					}
				});


			}
		});

	});
</script>