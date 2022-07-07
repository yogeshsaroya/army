<div class="content-wrapper">
<section class="content-header"><h1>Edit Region and Zone</h1></section>
<section class="content">
<div class='row'>
<div class='col-md-12'>
  <div class='box box-info'>
    <div class='box-header'>
    <div class='box-body pad'>
<?php echo $this->Session->flash('msg');?>
<?php 
$regions = regions(1);
echo $this->Form->create('CountryList'); 
    if(!empty($this->request->data)){
    echo $this->Form->hidden('id'); } ?>
          
<div class="form-group"><?php echo $this->Form->input('short_name',array('class'=>'form-control','required'=>true)); ?></div>
<div class="form-group"><?php echo $this->Form->input('region',array('label'=>'Region for Cars','options'=>$regions, 'empty'=>' Select Region for Car ', 'class'=>'form-control','required'=>true)); ?></div>
<div class="form-group"><?php echo $this->Form->input('bike_region',array('label'=>'Region for Motorcycels', 'options'=>$regions, 'empty'=>' Select Region for Motorcycle ', 'class'=>'form-control','required'=>true)); ?></div>
<div class="form-group"><?php echo $this->Form->input('zone',array('options'=>$this->Lab->getZone(), 'empty'=>' Select Zone ', 'class'=>'form-control','required'=>false)); ?></div>

<div class="box-footer">
<div class="form-group ">

<input type="submit" class="btn btn-primary" value="Save">
<a href="<?php echo SITEURL;?>lab/labs/regions" class="btn btn-default pull-right"> Back To List </a>
</div>
<?php echo $this->Form->end();?>
</div>
</div>
</div>
</div>
</div>
</section>
</div>