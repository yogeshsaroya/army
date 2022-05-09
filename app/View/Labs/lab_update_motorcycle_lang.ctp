<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<?php echo $langArr[$data['Motorcycle']['language']]; ?>
			<a href="<?php echo SITEURL . "lab/labs/update_motorcycle/" . $data['Motorcycle']['motorcycle_id'] . "?tab=multilingual"; ?>">
				<?php
				echo $data['MotorcycleMake']['name'] . "/" . $data['MotorcycleModel']['name'] . "/" . $data['MotorcycleYear']['year_to']." - ".(!empty($data['MotorcycleYear']['year_to'])? $data['MotorcycleYear']['year_to'] :  'present') . " > " . $data['Motorcycle']['title']; ?></a>
		</h1>
	</section>

	<section class="content">
		<div class="clearfix"></div>
		<?php echo $this->Session->flash('msg'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="<?php echo (empty($q)? "active" : null);?>"><a href="<?php echo SITEURL . "lab/labs/update_motorcycle_lang/" . $data['Motorcycle']['id'] . "/" . $lang; ?>">General</a></li>
						
					</ul>
					<div class="tab-content">
						<div class="active tab-pane">
							<?php
							if (empty($q)) {
								echo $this->Form->create('Motorcycle', array('class' => 'form-horizontal'));
								if (isset($data['Motorcycle']) && !empty($data['Motorcycle'])) {
									$this->request->data['Motorcycle'] = $data['Motorcycle'];
									echo $this->Form->hidden('id');
								} ?>

								<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Title</label>
									<div class="col-sm-10"><?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Title', 'label' => false, 'required' => true)); ?></div>
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
										<input type="submit" class="btn btn-success" value="Save">
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