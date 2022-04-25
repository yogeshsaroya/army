<?php echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min', '/v/bootstrap.min')); ?>
<style>
	#new_library_id img {
		width: 100%;
		margin: 10px 0 0 0;
	}
</style>
<div id="preloader" style="display:none">
	<div id="status">&nbsp;</div>
</div>
<div class="content-wrapper" style="min-height:1066px">
	<section class="content-header">
		<h1>Manage Video Slider</h1>
	</section>
	<section class="content">
		<div class="box">
			<div class="box-body">
				<div class="box box-primary">


					<?php
					echo $this->Form->create('VideoSlider', array('type' => 'file', 'id' => 'proFrm'));
					if (isset($e) && !empty($e)) {
						$this->request->data['VideoSlider'] = $e['VideoSlider'];
					}
					echo $this->Form->hidden('id', array('id' => 'id'));
					?>
					<div class="box-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group"><?php echo $this->Form->input('heading', array('class' => 'form-control input-md', 'required' => true)); ?></div>
							</div>
							<div class="col-md-4">
								<div class="form-group"><?php echo $this->Form->input('button_title', array('class' => 'form-control input-md', 'required' => true)); ?></div>
							</div>
							<div class="col-md-4">
								<div class="form-group"><?php echo $this->Form->input('url', array('type' => 'url',  'class' => 'form-control input-md', 'required' => true)); ?></div>
							</div>

							<div class="form-group">
								<div class="col-md-6"><?php echo $this->Form->input('video_for_pc', array('label'=>'Video For PC','type' => 'url',  'class' => 'form-control input-md', 'required' => true)); ?></div>
								<div class="col-md-6"><?php echo $this->Form->input('poster_for_pc', array('label'=>'Poster For PC','type' => 'url', 'id' => 'path',  'class' => 'form-control input-md', 'required' => true)); ?></div>
							</div>
							<div class="clearfix"></div>
							<br>

							<div class="form-group">
								<div class="col-md-6"><?php echo $this->Form->input('video_for_mob', array('label'=>'Video For Mobile', 'type' => 'url',  'class' => 'form-control input-md', 'required' => false)); ?></div>
								<div class="col-md-6"><?php echo $this->Form->input('poster_for_mob', array('label'=>'Poster For Mobile','type' => 'url', 'id' => 'path',  'class' => 'form-control input-md', 'required' => false)); ?></div>
							</div>

							

						</div>

					</div>
				</div>
				<div class="box-footer">
					<div id="app_err"></div>
				</div>
				<div class="col-md-12">
					<div class="form-group pull-right"><br><input type="button" value="Save" class="btn btn-block btn-primary btn-flat form-control pull-right" id="add_br"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			</form>
		</div>
		<div class="box-footer">

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
				$("#add_br").prop("disabled", true);
				$("#add_br").val('Please wait...');
				$("#proFrm").ajaxForm({
					target: '#app_err',
					beforeSubmit: function() {},
					success: function(response) { btnState(); },
					error: function(response) {
						btnState();
					}
				}).submit();
		});


	});
</script>