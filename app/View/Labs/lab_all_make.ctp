<div class="content-wrapper" style="min-height: 1066px;">
<style>
@media (max-width: 767px) { .col-xs-2 { width: auto; } }
</style>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Manage Country and States </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-body">
            
            <div id="app_err"></div>
            <?php echo $this->Session->flash('msg');?>

		<div class="col-md-12">
			              <div class="box box-success">
                <div class="box-header"> <h3 class="box-title"><?php if(isset($e['Brand']['name'])){ echo "Edit";}else{ echo "Add New";}?> Brand</h3> 
                
                </div>
                
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-4"> <label for="WorldName">Make name</label>
                    <input id="name" type="text" class="form-control" name="name" value="<?php if(isset($e['Brand']['name'])){ echo $e['Brand']['name'];}?>" placeholder="Brand name">
					<input type="hidden" name="id" id="id" value="<?php if(isset($e['Brand']['id'])){ echo $e['Brand']['id'];}?>">
                    </div>
                    <div class="col-md-4"> 
                    <label for=""> &nbsp;&nbsp; </label>
                    <input type="button" value="Save" id="add_br" name="ct" class="btn btn-primary form-control"> </div>
                  </div>
                  <div id="app_err"> </div>
                </div>
              </div>


              
              <div class="box box-success">
                <div class="box-header"> <h3 class="box-title">All Make</h3> </div>
                <div class="box-body">
                  								<div class="row">
									<div class="col-sm-12" id="lab_table">
										<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
											<thead>
											
					<tr role="row">
                        <th><?php echo $this->Paginator->sort('Brand.id', 'ID', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('Brand.name', 'Title', array('escape' => false)); ?></th>
                        <th>Edit</th>
                        <th>Action</th>
                    </tr>
</thead>
<tbody id="table_rows">

                <?php if(!empty($data)) {  $n=1; foreach($data as $list){?>
                    <tr>
                        <td><?php echo $n;?></td>
                        <td><?php echo $list['Brand']['name'];?></td>
                        <td> <?php echo $this->html->link('Edit','/lab/labs/all_make/'.$list['Brand']['id']);?></tb>
                        <td> <?php 
                        if($list['Brand']['status'] == 1){ echo $this->html->link('Active','/lab/labs/all_make/?status='.$list['Brand']['id'],array('class' => 'text-green')); }
                        else{ echo $this->html->link('Deactive','/lab/labs/all_make/?status='.$list['Brand']['id'],array('class' => 'text-red')); }
                        ?></tb>
                        </td>
                    </tr>
                   <?php $n++; }}else{?>
                   <td colspan="4">Your Brand tab is empty</td>
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

        </section><!-- /.content -->
      </div>
      <script>
$(document).ready(function(){
	$( "#add_br" ).click(function() {
		$("#app_err").html('');
		  var t = $.trim($('#name').val());
		  var id = $.trim($('#id').val());
		  if(t == ""){ $('#name').focus(); }
		  else{

			  $("#add_br").prop("disabled",true); $("#add_br").val('Please wait...');			    
			  $.ajax({type: 'POST',
			  	url: '<?php echo SITEURL."lab/labs/all_make"?>',
			  	data: "name="+t+"&id="+id+"",
			  	success: function(data) { btnDefault('add_br','Save'); $("#app_err").html(data);},
			  	error: function(comment) { btnDefault('add_br','Save'); $("#app_err").html(data); }});

			  
			  }
		});
	
});

</script>
      
