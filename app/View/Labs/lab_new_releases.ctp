<div class="content-wrapper" style="min-height: 1066px;">
<style>
@media (max-width: 767px) { .col-xs-2 { width: auto; } }
#table_rows tr {cursor: move;}
</style>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> <a href="<?php echo SITEURL."lab/labs/manage_new"?>">Add new releases </a></h1>
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
                        <th><?php echo $this->Paginator->sort('NewRelease.id', 'ID', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('NewRelease.title', 'Title', array('escape' => false)); ?></th>
                        <th>Edit</th>
                        <th>Action</th>
                    </tr>
</thead>
<tbody id="table_rows">

                <?php if(!empty($data)) {  $n=1; foreach($data as $list){?>
                    <tr id="img_<?php echo $list['NewRelease']['id'];?>">
                        <td><?php echo $n;?></td>
                        <td><?php echo $list['NewRelease']['title'];?></td>
                        <td> <?php echo $this->html->link('Edit','/lab/labs/manage_new/'.$list['NewRelease']['id']);?></tb>
                        <td> <?php  echo $this->html->link('Delete','/lab/labs/new_releases/?status='.$list['NewRelease']['id'],array('class' => 'text-red','confirm' => 'Do you want to delete this slide?'));?></tb>
                        </td>
                    </tr>
                   <?php $n++; }}else{?>
                   <td colspan="4">Your NewRelease tab is empty</td>
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
		
		$.ajax({type: 'POST', url: '<?php echo SITEURL."lab/labs/new_releases_sort";?>', data: datastring, success: function(data) { $("#text_err").html(data); }, error: function(comment) { }});
		}});

	
});

</script>
      
