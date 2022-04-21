<div class="content-wrapper" style="min-height: 1066px;">
<style>
@media (max-width: 767px) { .col-xs-2 { width: auto; } }
#table_rows .ui-sortable-handle { cursor: move; }
</style>
        <!-- Content Header (Page header) -->
<section class="content-header">
  <h1> All Make > Models </h1>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
<div class="box">
<div class="box-body">

<div id="app_err"></div>
<?php echo $this->Session->flash('msg');?>

<div class="col-md-12">
<?php 
if(isset($e['Model']['brand_id']) && !empty($e['Model']['brand_id'])){ $id = $e['Model']['brand_id'];}?>

          <div class="box box-success">
<div class="box-header"> <h3 class="box-title"><?php if(isset($e['Model']['name'])){ echo "Edit";}else{ echo "Add New";}?> Model</h3> 

</div>

<div class="box-body">
  <div class="row">
  <div class="col-md-4"> <label for="WorldName">Make</label>
  <?php echo $this->Form->input('brand_id', array('options'=>$brand,'empty'=>'Select Brand','default'=>$id, 'label' => false, 'error' => false, 'div' => false, 'class' => 'form-control'));?>
</div>

<div class="col-md-4"> <label for="WorldName">Model name</label>

<input id="name" type="text" class="form-control" name="name" value="<?php if(isset($e['Model']['name'])){ echo $e['Model']['name'];}?>" placeholder="Model name">
<input type="hidden" name="id" id="id" value="<?php if(isset($e['Model']['id'])){ echo $e['Model']['id'];}?>">
                    
                    
                    </div>
                    <div class="col-md-4"> 
                    <label for=""> &nbsp;&nbsp; </label>
                    <input type="button" value="Save" id="add_br" name="ct" class="btn btn-primary form-control"> </div>
                  </div>
                  <div id="app_err"> </div>
                </div>
              </div>

              
              <div class="box box-success">
                <div class="box-header"> <h3 class="box-title">All Model</h3> </div>
                <div class="box-body">
<div class="row">
<div class="col-sm-12" id="lab_table">
<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
<thead>
											
<tr role="row">
    <th><?php echo $this->Paginator->sort('Model.id', 'ID', array('escape' => false)); ?></th>
<th><?php echo $this->Paginator->sort('Model.name', 'Model', array('escape' => false)); ?></th>
<th><?php echo $this->Paginator->sort('Brand.name', 'Make', array('escape' => false)); ?></th>
<th><?php echo $this->Paginator->sort('Model.created', 'Created', array('escape' => false)); ?></th>
    <th>Edit</th>
    <th>Action</th>
</tr>
</thead>
<tbody id="<?php echo (isset($id) && !empty($id) ? 'table_rows': null);?>">

<?php if(!empty($model)) {  $n=1; foreach($model as $list){?>
<tr id="model_<?php echo $list['Model']['id'];?>">
<td><?php echo $list['Model']['id'];?></td>
<td><?php echo $list['Model']['name'];?></td>
<td><?php echo $list['Brand']['name'];?></td>
<td><?php echo date('m/d/Y',strtotime($list['Model']['created']));?></td>
<td><?php echo $this->html->link('Edit','/lab/labs/all_model?edit='.$list['Model']['id']);?></td>

<td> <?php 
if($list['Model']['status'] == 1){ echo $this->html->link('Active','/lab/labs/all_model/?status='.$list['Model']['id'],array('class' => 'text-green')); }
else{ echo $this->html->link('Deactive','/lab/labs/all_model/?status='.$list['Model']['id'],array('class' => 'text-red')); }

?></tb>
    
</tr>
<?php $n++; }}else{?>
<tr><td colspan="6">Your model tab is empty</td></tr>
<?php }?>  
</tbody>
											
</table>
									</div>
                  </div>
                  
								<div class="row" id="paginate_info">
									<div class="col-sm-5">
										<div class="dataTables_info" id="example2_info" role="status"
											aria-live="polite"><?php echo $this->Paginator->counter(
    'Page {:page} of {:pages}, showing {:current} records out of
     {:count} total, starting on record {:start}, ending on {:end}'
);?></div>
									</div>
									<div class="col-sm-7">
										<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
										
<ul class="pagination"> 
	<?php 
echo $this->Paginator->prev('Previous', array('tag'=>'li'), null, array('class' => 'paginate_button previous disabled')); 
echo $this->Paginator->numbers(array('modulus' => 1,'first' => 2,'last' => 2,'separator' =>'','tag'=>'li','ellipsis'=>false,'class'=>'paginate_button')); 
echo $this->Paginator->next('Next', array('tag'=>'li'), null, array('class' => 'paginate_button previous disabled')); ?> 
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

<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
$(document).ready(function(){
<?php if(isset($id) && !empty($id)) {?>
$("#table_rows").sortable({ opacity: 0.6, cursor: 'move', update: function() {
	var datastring = $(this).sortable("serialize");
	$.ajax({type: 'POST', 
		url: '<?php echo SITEURL;?>lab/labs/change_positions_model', 
		data: datastring,
		success: function(data) { $("#ajax_req").html(data); }, 
		error: function(comment) { } 
	}); 
}});
<?php }?>
		

	

	$( "#brand_id" ).change(function() {
		window.location.href = '<?php echo SITEURL;?>lab/labs/all_model/'+this.value;
		});

	
	$( "#add_br" ).click(function() {
		$("#app_err").html('');
		  var t = $.trim($('#name').val());
		  var id = $.trim($('#id').val());
		  var brand_id = $.trim($('#brand_id').val());
		  
		  if(t == ""){ $('#name').focus(); }
		  else if(brand_id == ""){ $('#brand_id').focus(); $("#app_err").html('<div class="alert alert-danger" role="alert"> Please select brand name.</div>'); }
		  else{

			  $("#add_br").prop("disabled",true); $("#add_br").val('Please wait...');			    
			  $.ajax({type: 'POST',
			  	url: ''+SITEURL+'lab/labs/all_model/',
			  	data: "name="+t+"&brand_id="+brand_id+"&id="+id+"",
			  	success: function(data) { btnDefault('add_br','Save'); $("#app_err").html(data);},
			  	error: function(comment) { btnDefault('add_br','Save'); $("#app_err").html(data); }});

			  
			  }
		});
	
});

</script>

