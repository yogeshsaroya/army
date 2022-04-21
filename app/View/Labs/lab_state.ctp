<?php echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min','/v/bootstrap.min'));?>
<div class="content-wrapper" style="min-height: 1066px;">
<style>
@media (max-width: 767px) { .col-xs-2 { width: auto; } }
</style>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Manage <a href="<?php echo SITEURL."lab/labs/country";?>">Country</a> and States </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-body">
            
            
            <?php echo $this->Session->flash('msg');?>

		<div class="col-md-12">
              <div class="box box-success">
                <div class="box-header"> <h3 class="box-title">Add New State for <?php echo $c['World']['name'];?> </h3> 
                
                </div>
                
                <div class="box-body">
                  <div class="row">
                    
<?php echo $this->Form->create('World',array('cFrm'));
if(isset($all) && !empty($all)){ $this->request->data['World'] = $all['World']; }
echo $this->Form->hidden('id');
echo $this->Form->hidden('in_location',array('value'=>$c['World']['id']));
echo $this->Form->hidden('type',array('value'=>'st'));
?>                    
                    
<div class="col-md-12"><div class="box box-success"><div class="box-body"><div class="row">
<div class="col-xs-12"><div class="form-group"><?php echo $this->Form->input('World.name',array('type'=>'text','maxlength'=>50,'class'=>'form-control','label'=>'State name','required'=>true));?></div></div>
</div></div></div></div>
                    

<div class="col-md-6">            

<div class="box box-danger">
<div class="box-header with-border"><h3 class="box-title">Shipping cost for Cat Back Exhaust</h3></div>
<div class="box-body">
<div class="row">
<div class="col-xs-5"><div class="form-group"><label>For Customer</label><?php echo $this->Form->input('cat_back_user',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?></div></div>
<div class="col-xs-5"><div class="form-group"><label>For Dealer</label><?php echo $this->Form->input('cat_back_dealer',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?></div></div>

</div></div></div></div>


<div class="col-md-6">            

<div class="box box-info">
<div class="box-header with-border"><h3 class="box-title">Shipping cost for Catalytic Converter</h3></div>
<div class="box-body">
<div class="row">
<div class="col-xs-5"><div class="form-group"><label>For Customer</label><?php echo $this->Form->input('catalytic_user',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?></div></div>
<div class="col-xs-5"><div class="form-group"><label>For Dealer</label><?php echo $this->Form->input('catalytic_dealer',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?></div></div>

</div></div></div></div>


<div class="col-md-6">            

<div class="box box-success">
<div class="box-header with-border"><h3 class="box-title">Shipping cost for Tuning Box</h3></div>
<div class="box-body">
<div class="row">
<div class="col-xs-5"><div class="form-group"><label>For Customer</label><?php echo $this->Form->input('tuning_box_user',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?></div></div>
<div class="col-xs-5"><div class="form-group"><label>For Dealer</label><?php echo $this->Form->input('tuning_box_dealer',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?></div></div>

</div></div></div></div>


<div class="col-md-6">            

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Shipping cost for Extra Product</h3></div>
<div class="box-body">
<div class="row">
<div class="col-xs-5"><div class="form-group"><label>For Customer</label><?php echo $this->Form->input('extra_user',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?></div></div>
<div class="col-xs-5"><div class="form-group"><label>For Dealer</label><?php echo $this->Form->input('extra_dealer',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?></div></div>

</div></div></div></div>                    
                    
<div class="col-md-12">  <div id="app_err"></div></div>                    
                    
<div class="col-md-6"> 
<label for=""> &nbsp;&nbsp; </label>
<input type="submit" value="Save" id="ct" name="ct" class="btn btn-primary form-control"> </div>
<?php echo $this->Form->end();?>                    
                  </div>
                </div>
              </div>

              <div class="box box-success">
                <div class="box-header"> <h3 class="box-title">All State of <?php echo $c['World']['name'];?> <?php if(!empty($data)){ echo "(".count($data).")";}?></h3> </div>
                <div class="box-body">
                  								<div class="row">
									<div class="col-sm-12" id="lab_table">
										<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
											<thead>
											
					<tr role="row">
                        <th><?php echo $this->Paginator->sort('World.id', 'ID', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('World.name', 'Name', array('escape' => false)); ?></th>
                        <th>For Customer (catback/dp/box/extra)</th>
                        <th>For Dealer (catback/dp/box/extra)</th>
                        <th>Delete</th>
                        <th>Action</th>
                        
                    </tr>
</thead>
<tbody id="table_rows">

<?php
if (!empty($data)) {
	$n = 1;
    foreach ($data as $list) { ?>
        <tr class="odd gradeX">
           <td class="center gnTxt"><?php echo $n;?></td>
           <td class="center gnTxt"><a href="<?php echo SITEURL."lab/labs/state/".$c['World']['id']."?edit=".$list['World']['id']; ?>"><?php echo $list['World']['name'];?></a></td>
           
           <td class="center gnTxt"><?php echo $list['World']['cat_back_user']."/".$list['World']['catalytic_user']."/".$list['World']['tuning_box_user']."/".$list['World']['extra_user'];?></td>
           <td class="center gnTxt"><?php echo $list['World']['cat_back_dealer']."/".$list['World']['catalytic_dealer']."/".$list['World']['tuning_box_dealer']."/".$list['World']['extra_dealer'];?></td>
           <td class="center gnTxt"> <?php echo $this->html->link('Delete','/lab/labs/state/'.$c['World']['id'].'?del='.$list['World']['id'],array('class' => 'text-red','confirm' => 'Do you want to delete this state?')); ?></td>
           <td class="center gnTxt"> <?php if($list['World']['status'] == 1){ 
           	echo $this->html->link('Active','/lab/labs/state/'.$c['World']['id'].'?status='.$list['World']['id'],array('class' => 'text-green')); }
                        else{ echo $this->html->link('Deactive','/lab/labs/state/'.$c['World']['id'].'?status='.$list['World']['id'],array('class' => 'text-red')); }?></td>
                        
			                        
           </tr>
	<?php $n++; } }else{ ?>
	<tr class="odd gradeX"><td colspan="6"> <center>Record not found <a href="<?php echo SITEURL."lab/labs/country/";?>">Go Back</a></center></td></tr>
	<?php }?>
</tbody>
											
</table>
									</div>
                  </div>
                </div>
              </div>
            </div>              
            </div>
            
          </div>
<?php echo $this->Form->end();?>
        </section><!-- /.content -->
      </div>
      
<script>

$(document).ready(function(){
	$('#cFrm')
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
	


	
});

</script>      