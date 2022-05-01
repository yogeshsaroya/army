<div class="content-wrapper">
<section class="content-header"><h1>Edit Shipping</h1></section>
<section class="content">
<div class='row'>
<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header'>
    <div class='box-body pad'>
<?php echo $this->Session->flash('msg');?>
<?php echo $this->Form->create('CountryList'); 
    if(!empty($this->request->data)){
    echo $this->Form->hidden('id'); } ?>
          
<div class="form-group"><?php echo $this->Form->input('short_name',array('class'=>'form-control','required'=>true)); ?></div>
<div class="form-group"><?php echo $this->Form->input('catback',array('type'=>'number','min'=>0,'max'=>'999','class'=>'form-control','required'=>true)); ?></div>
<div class="form-group"><?php echo $this->Form->input('down_pipe',array('type'=>'number','min'=>0,'max'=>'999','class'=>'form-control','required'=>true)); ?></div>
<div class="form-group"><?php echo $this->Form->input('owrc',array('type'=>'number','min'=>0,'max'=>'999','class'=>'form-control','required'=>true)); ?></div>
<div class="form-group"><?php echo $this->Form->input('fedex_pack',array('type'=>'number','min'=>0,'max'=>'999','class'=>'form-control','required'=>true)); ?></div>
<div class="form-group"><?php echo $this->Form->input('region',array('options'=>['1'=>'Price - can order','2'=>'No Price - can not order'], 'empty'=>' Select Region ', 'class'=>'form-control','required'=>true)); ?></div>

<div class="box-footer">
<div class="form-group ">

<input type="submit" class="btn btn-primary" value="Save">
<a href="<?php echo SITEURL;?>lab/labs/shipping" class="btn btn-default pull-right"> Back To List </a>
</div>
<?php echo $this->Form->end();?>
</div>
</div>
</div>
</div>
</div>
</section>
</div>