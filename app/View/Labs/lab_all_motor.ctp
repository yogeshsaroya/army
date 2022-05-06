<div class="content-wrapper" style="min-height: 1066px;">
	<style>
		@media (max-width: 767px) {
			.col-xs-2 {
				width: auto;
			}
		}
	</style>
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1> All Motors </h1>
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
													} ?> Motor</h3>
						</div>
						<div class="box-body">
							<?php
							echo $this->Form->create('Motor');
							if (isset($e['Motor']) && !empty($e['Motor'])) {
								$this->request->data['Motor'] = $e['Motor'];
							}
							echo $this->Form->hidden('id', array('id' => 'id'));
							echo $this->Form->hidden('library_id', array('id' => 'library_id'));
							?>

							<div class="box-footer">
								<div class="col-xs-3">
									<label>Make</label>
									<?php if (isset($e['Model']['brand_id']) && !empty($e['Model']['brand_id'])) {
										$id = $e['Model']['brand_id'];
									} ?>
									<?php echo $this->Form->input('brand_id', array('id' => 'brand_id', 'options' => $brand, 'empty' => 'Select Brand', 'default' => $id, 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md')); ?>
								</div>
								<div class="col-xs-3">
									<label>Model</label><?php echo $this->Form->input('model_id', array('id' => 'model_id', 'options' => $model_list, 'empty' => 'Select model', 'default' => $mid, 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md')); ?>
								</div>
								<div class="col-xs-3"><label>Motor Name</label>
									<?php echo $this->Form->input('name', array('id' => 'name', 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md')); ?>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="box-footer">
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
												<th><?php echo $this->Paginator->sort('Motor.id', 'ID', array('escape' => false)); ?></th>
												<th><?php echo $this->Paginator->sort('Motor.name', 'Motor', array('escape' => false)); ?></th>
												<th><?php echo $this->Paginator->sort('Model.name', 'Model', array('escape' => false)); ?></th>
												<th><?php echo $this->Paginator->sort('Brand.name', 'Make', array('escape' => false)); ?></th>
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
													<tr id="tr_<?php echo $list['Motor']['id']; ?>">
														<td><?php echo $list['Motor']['id']; ?></td>
														<td><?php echo $list['Motor']['name']; ?></td>
														<td><?php echo $list['Model']['name']; ?></td>
														<td><?php echo $list['Brand']['name']; ?></td>
														<td> <?php echo $this->html->link('Edit', '/lab/labs/all_motor/' . $list['Motor']['brand_id'] . '/' . $list['Motor']['model_id'] . '?edit=' . $list['Motor']['id']); ?></td>
														<td> <a href="javascript:void(0);" onclick="motor_del(<?php echo $list['Motor']['id']; ?>);">Delete</a></td>
														<td> <?php
																if ($list['Motor']['status'] == 1) {
																	echo $this->html->link('Active', '/lab/labs/all_motor?status=' . $list['Motor']['id'], array('class' => 'text-green'));
																} else {
																	echo $this->html->link('Deactive', '/lab/labs/all_motor?status=' . $list['Motor']['id'], array('class' => 'text-red'));
																} ?></tb>

														<td class="center gnTxt"><a href="<?php echo SITEURL . "lab/labs/create_car_page/" . $list['Motor']['id'] . "/" . $list['Motor']['model_id'] . "/" . $list['Motor']['brand_id']; ?>" title="">Add Details</a></td>

													</tr>
												<?php $n++;
												}
											} else { ?>
												<tr>
													<td colspan="6">Your Motors tab is empty</td>
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
	function motor_del(id) {
		var txt;
		var r = confirm("Are you sure you want to delete Motor record?");
		if (r == true) {
			$("#tr_" + id).remove();

			$.ajax({
				type: 'POST',
				url: '' + SITEURL + 'lab/labs/delete_motor',
				data: {
					id: id
				},
				success: function(data) {},
				error: function(comment) {}
			});

		}
	}

	$(document).ready(function() {

		$('.number').keypress(function(event) {
			if (event.which < 46 ||
				event.which > 59) {
				event.preventDefault();
			} // prevent if not number/dot

			if (event.which == 46 &&
				$(this).val().indexOf('.') != -1) {
				event.preventDefault();
			} // prevent if already dot
		});

		$("#brand_id").change(function() {
			window.location.href = '<?php echo SITEURL; ?>lab/labs/all_motor/' + this.value;
		});
		<?php if (isset($e['Motor']) && !empty($e['Motor'])) {
		} else { ?>
			$("#model_id").change(function() {
				var brand_id = $("#brand_id").val();
				window.location.href = '<?php echo SITEURL; ?>lab/labs/all_motor/' + brand_id + '/' + this.value;
			});
		<?php } ?>



		$("#add_br").click(function() {
			$("#app_err").html('');
			var t = $.trim($('#name').val());
			var id = $.trim($('#id').val());
			var brand_id = $.trim($('#brand_id').val());
			var model_id = $.trim($('#model_id').val());
			

			if (brand_id == "") {
				$('#brand_id').focus();
				$("#app_err").html('<div class="alert alert-danger" role="alert"> Please select brand name.</div>');
			} else if (model_id == "") {
				$('#model_id').focus();
				$("#app_err").html('<div class="alert alert-danger" role="alert"> Please select model name.</div>');
			} else if (t == "") {
				$('#name').focus();
				$("#app_err").html('<div class="alert alert-danger" role="alert"> Please select motor name.</div>');
			} else {

				$("#add_br").prop("disabled", true);
				$("#add_br").val('Please wait...');
				$.ajax({
					type: 'POST',
					url: '' + SITEURL + 'lab/labs/all_motor',
					data : {name:t,brand_id:brand_id,model_id:model_id,id:id},
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