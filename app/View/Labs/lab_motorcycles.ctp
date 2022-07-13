<div class="content-wrapper" style="min-height:1066px">

<style>
@media only screen and (max-width: 760px),(min-device-width: 768px) and (max-device-width: 1024px) {
#lab_table td:nth-of-type(1):before{content:"ID"}
#lab_table td:nth-of-type(2):before{content:"Image"}
#lab_table td:nth-of-type(3):before{content:"Make/Model"}
#lab_table td:nth-of-type(4):before{content:"Title"}
#lab_table td:nth-of-type(5):before{content:"Status"}
#lab_table td:nth-of-type(6):before{content:"Created"}
#lab_table td:nth-of-type(7):before{content:"Action"}

}

</style>

<section class="content-header"><h1>Motorcycles List</h1></section>
<?php echo $this->Session->flash('msg');?>
<section class="content">
<div class="box">

<div class="box-body">
<div class="box box-success">
<div class="box-body">


<div class="box-body">
<div class="row">
<div class="box-body col-xs-12">
<div class="col-xs-4"><?php echo $this->Form->input('make_id',array('id'=>'brand_id', 'options'=>$make,'default'=>(isset($q['make'])? $q['make'] : null), 'empty'=>' --Select Make -- ','label'=>false,'class'=>'form-control'));?></div>
<div class="col-xs-4"><?php echo $this->Form->input('model_id',array('id'=>'model_id','options'=>$model_list,'default'=>(isset($q['model'])?$q['model']:null),'empty'=>' --Select Model -- ','label'=>false,'class'=>'form-control'));?></div>
<div class="col-xs-4"><?php echo $this->Form->input('motor_id',array('id'=>'motor_id','options'=>$years,'default'=>(isset($q['year'])? $q['year'] : null),'empty'=>' --Select Year/Motor -- ','label'=>false,'class'=>'form-control'));?></div>
</div>
</div>
</div>


<div class="row">
<div class="col-sm-12" id="lab_table">
<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
<thead>
					<tr role="row">
						<th><?php echo $this->Paginator->sort('Motorcycle.id', 'ID', array('escape' => false)); ?></th>
						<th><?php echo $this->Paginator->sort('Motorcycle.motorcycle_make_id', 'Make/Model', array('escape' => false)); ?></th>
            <th><?php echo $this->Paginator->sort('Motorcycle.title', 'Title', array('escape' => false)); ?></th>
            <th><?php echo $this->Paginator->sort('Motorcycle.status', 'Status', array('escape' => false)); ?></th>
            <th><?php echo $this->Paginator->sort('Motorcycle.created', 'Created', array('escape' => false)); ?></th>
            <th>Edit</th>
            <th>Delete</th>                        
          </tr>
</thead>
<tbody id="table_rows">

<?php
if (!empty($data)) {
	$n = 1;
    foreach ($data as $list) { ?>
        <tr class="odd gradeX">
        <td class="center gnTxt"><?php echo $n;?></td>
        <td class="center gnTxt"><?php echo $list['MotorcycleMake']['name']."/".$list['MotorcycleModel']['name']." - ".$list['MotorcycleYear']['year_from']." - ".(!empty($list['MotorcycleYear']['year_to']) ? $list['MotorcycleYear']['year_to'] : 'present');?></td>
        <td class="center gnTxt"><a href="<?php echo SITEURL."motorcycle/".$list['Motorcycle']['url'];?>" title="" target="_blank"><?php echo $list['Motorcycle']['title'];?></a></td>
        <td class="center gnTxt"><a href="<?php echo SITEURL."lab/labs/motorcycles?id=".$list['Motorcycle']['id'];?>" title=""><?php if($list['Motorcycle']['status'] == 1){ echo "<p class='text-green'>Active</p>";}else{ echo "<p class='text-red'>Deactivate</p>";}?></a></td>
        <td class="center gnTxt"><?php echo date('M d,Y',strtotime($list['Motorcycle']['created']));?></td>
        <td class="center gnTxt"><a href="<?php echo SITEURL."lab/labs/update_motorcycle/".$list['Motorcycle']['id'];?>" title="">Edit</a></td>
        <td> <?php echo $this->html->link('Delete','/lab/labs/del_bike/'.$list['Motorcycle']['id'],array('class' => 'text-red','confirm' => 'Do you want to delete this Motorcycle record?')); ?></td>   
           
           </tr>
	<?php $n++;} }else{ ?>
	<tr class="odd gradeX"><td colspan="8"> <center>Record not found </center></td></tr>
	<?php }?>
</tbody>
											
</table>
									</div>
                  </div>
                </div>
              </div>
</div>
<div class="box-footer">

<div class="row" id="paginate_info">
<div class="col-sm-5">
<div class="dataTables_info" id="example2_info" role="status" aria-live="polite"><?php echo $this->Paginator->counter(
    'Page {:page} of {:pages}, showing {:current} records out of
     {:count} total, starting on record {:start}, ending on {:end}'
);?></div>
</div>
<?php if(isset($paging['Motorcycle']['pageCount']) && $paging['Motorcycle']['pageCount'] > 1){?>
<div class="col-sm-7">
<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
<ul class="pagination">
<?php 
	echo $this->Paginator->prev('Previous', array('tag'=>'li'), null, array('class' => 'paginate_button previous disabled')); 
	echo $this->Paginator->numbers(array('modulus' => 1,'first' => 2,'last' => 2,'separator' =>'','tag'=>'li','ellipsis'=>false,'class'=>'paginate_button')); 
	echo $this->Paginator->next('Next', array('tag'=>'li'), null, array('class' => 'paginate_button previous disabled')); ?>
</ul>
</div>
</div><?php }?>
</div>

</div>
</div>
</section>
</div>

<script>
$(document).ready(function(){
	$( "#brand_id" ).change(function() { window.location.href = '<?php echo SITEURL;?>lab/labs/all_car_details?brand='+this.value; });
	$( "#model_id" ).change(function() { var brand_id = $( "#brand_id" ).val(); window.location.href = '<?php echo SITEURL;?>lab/labs/all_car_details?brand='+brand_id+'&model='+this.value; });
	$( "#motor_id" ).change(function() { 
		var brand_id = $( "#brand_id" ).val();
		var model_id = $( "#model_id" ).val(); 
	window.location.href = '<?php echo SITEURL;?>lab/labs/all_car_details?brand='+brand_id+'&model='+model_id+'&motor='+this.value; });
});

</script>