<div class="content-wrapper" style="min-height: 1066px;">
<style>
@media (max-width: 767px) { .col-xs-2 { width: auto; } }
#table_rows tr {cursor: move;}
</style>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> <a href="<?php echo SITEURL."lab/labs/manage_slider"?>">Add New Video Slide </a></h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-body">
            
            <div id="app_err"></div>
            <?php echo $this->Session->flash('msg');?>
              <div class="box box-success">
                <div class="box-header"> <h3 class="box-title">All Slides</h3> </div>
                <div class="box-body">
                  								<div class="row">
									<div class="col-sm-12" id="lab_table">
										<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
											<thead>
											
					<tr role="row">
                        <th><?php echo $this->Paginator->sort('VideoSlider.id', 'ID', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('VideoSlider.poster_for_pc', 'Poster', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('VideoSlider.heading', 'Heading', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('VideoSlider.url', 'URL', array('escape' => false)); ?></th>
                        <th>Edit</th>
                        <th>Action</th>
                    </tr>
</thead>
<tbody id="table_rows">

                <?php if(!empty($data)) {  $n=1; foreach($data as $list){?>
                    <tr id="img_<?php echo $list['VideoSlider']['id'];?>">
                    <td><?php echo $list['VideoSlider']['id'];?></td>
                        <td><img src="<?php echo getCloudinary($list['VideoSlider']['poster_for_pc'],'c_scale,q_auto:good,w_150','.webp');?>" alt="" width="150"></td>
                        <td><?php echo $list['VideoSlider']['heading'];?></td>
                        <td><?php echo $list['VideoSlider']['url'];?></td>
                        <td> <?php echo $this->html->link('Edit','/lab/labs/manage_slider/'.$list['VideoSlider']['id']);?></tb>
                        <td> <?php  echo $this->html->link('Delete','/lab/labs/home_slider/?del='.$list['VideoSlider']['id'],array('class' => 'text-red','confirm' => 'Do you want to delete this slide?'));?></tb>
                        </td>
                    </tr>
                   <?php $n++; }}else{?>
                   <td colspan="5">Tab is empty</td>
                   <?php }?> 
</tbody>
											
</table>
									</div>
                  </div>
                </div>
              </div>
            </div>              
            
            </div>
            
          

        </section><!-- /.content -->
      </div>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
      
      <script>
$(document).ready(function(){

	$("#table_rows").sortable({ opacity: 0.6, cursor: 'move', update: function() {  
		var datastring = $('#table_rows').sortable("serialize");
		
		$.ajax({type: 'POST', url: '<?php echo SITEURL."lab/labs/home_slider_sort";?>', data: datastring, success: function(data) { $("#text_err").html(data); }, error: function(comment) { }});
		}});
	
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
      
