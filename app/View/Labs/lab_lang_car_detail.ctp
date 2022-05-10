<?php echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min', '/v/bootstrap.min')); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<?php echo $langArr[$data['ItemDetail']['language']]; ?>
			<a href="<?php echo SITEURL . "lab/labs/update_car_detail/" . $data['ItemDetail']['item_detail_id'] . "?tab=multilingual"; ?>">
				<?php
				echo $data['Brand']['name'] . "/" . $data['Model']['name'] . "/" . $data['Motor']['name'] . " > " . $data['ItemDetail']['name']; ?></a>
		</h1>
	</section>

	<section class="content">
		<div class="clearfix"></div>
		<?php echo $this->Session->flash('msg'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="<?php echo (empty($q)? "active" : null);?>"><a href="<?php echo SITEURL . "lab/labs/lang_car_detail/" . $data['ItemDetail']['id'] . "/" . $lang; ?>">General</a></li>
						
					</ul>
					<div class="tab-content">
						<div class="active tab-pane">
							<?php
							if (empty($q)) {
								echo $this->Form->create('ItemDetail', array('class' => 'form-horizontal','id'=>'proFrm'));
								if (isset($data['ItemDetail']) && !empty($data['ItemDetail'])) {
									$this->request->data['ItemDetail'] = $data['ItemDetail'];
									echo $this->Form->hidden('id');
								} ?>

								<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Title</label>
									<div class="col-sm-10"><?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Title', 'label' => false, 'required' => true)); ?></div>
								</div>

								<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Fitment</label>
									<div class="col-sm-10"><?php echo $this->Form->input('fitment', array('class' => 'form-control', 'placeholder' => 'Fitment', 'label' => false, 'required' => false)); ?></div>
								</div>
								<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Feature</label>
									<div class="col-sm-10"><?php echo $this->Form->input('feature', array('class' => 'form-control', 'placeholder' => 'Feature', 'label' => false, 'required' => false)); ?></div>
								</div>
								<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Note</label>
									<div class="col-sm-10"><?php echo $this->Form->input('note', array('class' => 'form-control', 'placeholder' => 'Note', 'label' => false, 'required' => false)); ?></div>
								</div>


								<div class="form-group"><label for="inputName" class="col-sm-2 control-label">SEO URL</label>
									<div class="col-sm-10"><?php echo $this->Form->input('url', array('class' => 'form-control', 'placeholder' => 'url', 'label' => false, 'required' => true)); ?></div>
								</div>

								<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Meta Title</label>
									<div class="col-sm-10"><?php echo $this->Form->input('meta_title', array('class' => 'form-control', 'placeholder' => 'Meta Title', 'label' => false, 'required' => false)); ?></div>
								</div>

								<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Meta Description</label>
									<div class="col-sm-10"><?php echo $this->Form->input('meta_description', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Meta Description', 'label' => false)); ?></div>
								</div>
								<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Meta Keywords</label>
									<div class="col-sm-10"><?php echo $this->Form->input('meta_keywords', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Meta Keywords', 'label' => false)); ?></div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									<div id="app_err"></div>
									<input type="button" class="btn btn-success" value="Save" id="add_br">
									</div>
								</div>

							<?php echo $this->Form->end();
							} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<script>
window['btnState'] = function() {
			$("#add_br").prop("disabled", false);
			$("#add_br").val('Save');
		};
	$(document).ready(function() {
		$('#proFrm')
	    .formValidation({
	        framework: 'bootstrap',
	        icon: { },
	        err: { },
	        fields: { }
	    })    .on('success.form.fv', function(e) {
	        // Prevent form submission
	        e.preventDefault();

	        var $form = $(e.target),
	            fv    = $form.data('formValidation');

	        // Use Ajax to submit form data
	        fv.defaultSubmit();
	    });
		$("#add_br").click(function() {
			$("#app_err").html('');
				$("#proFrm").ajaxForm({
					target: '#app_err',
					beforeSubmit: function() { $("#add_br").prop("disabled", true); $("#add_br").val('Please wait...'); },
					success: function(response) { btnState(); },
					error: function(response) {
						btnState();
					}
				}).submit();
		});
	});
</script>