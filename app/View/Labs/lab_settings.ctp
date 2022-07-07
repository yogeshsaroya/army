<div class="content-wrapper">
<section class="content-header"> <h1>Web settings</h1> </section>
<section class="content">
<div class='row'>
<div class='col-md-12'>
<div class='box box-info'>
<div class='box-header'>
<div class='box-body pad'>
<?php echo $this->Session->flash('msg');?>
<?php echo $this->Form->create('WebSetting'); 
echo $this->Form->hidden('id');   ?>
<div class="form-group"> <?php echo $this->Form->input('description',array('class'=>'form-control')); ?> </div>
<div class="form-group"> <?php echo $this->Form->input('keyword',array('class'=>'form-control')); ?> </div>
<div class="form-group"> <?php echo $this->Form->input('shipping_discount',array('class'=>'form-control','label'=>'Shipping Fee Discount % (For all kind of shipping fee)','required'=>true,'min'=>0)); ?> </div>
<div class="form-group"> <?php echo $this->Form->input('email',array('class'=>'form-control')); ?> </div>
<div class="form-group"> <?php echo $this->Form->input('mobile',array('class'=>'form-control')); ?> </div>
<div class="form-group"> <?php echo $this->Form->input('facebook_link',array('class'=>'form-control')); ?> </div>
<div class="form-group"> <?php echo $this->Form->input('youtube_link',array('class'=>'form-control')); ?> </div>
<div class="form-group"> <?php echo $this->Form->input('instagram_link',array('class'=>'form-control')); ?> </div>
<div class="box-footer"> <div class="form-group "> <input type="submit" class="btn btn-block btn-success btn-flat" value="Save"></div>
<?php echo $this->Form->end();?>
</div></div></div>
</div></div>
</div></section></div>