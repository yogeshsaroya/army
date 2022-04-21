<div class="col-md-9" id="add_brand">
	<div class="thumbnail">
		<div class="caption-full form-inline">
		<div style="" class="input-group">
		<h3 class="panel-title"><?php if(isset($e['Brand']['name'])){ echo "Edit";}else{ echo "Add New";}?> Brand</h3>
		</div>
				<div style="" class="input-group">
					<input id="name" type="text" class="form-control" name="name" value="<?php if(isset($e['Brand']['name'])){ echo $e['Brand']['name'];}?>" placeholder="Brand name">
					<input type="hidden" name="id" id="id" value="<?php if(isset($e['Brand']['id'])){ echo $e['Brand']['id'];}?>">
				</div>
				
				<div style="" class="input-group">
					<input type="button" class="btn btn-success" id="add_br" value="Save">
				</div>
				<div class="clearfix pd_15"></div>
				<div id="app_err"> </div>
			
		</div> 
	</div>
</div>


<div class="col-md-9" >
	<div class="">

<div class="col-sm-12 ">
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">All Brand</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Created" disabled></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(!empty($data)) {  $n=1; foreach($data as $list){?>
                    <tr>
                        <td><?php echo $n;?></td>
                        <td><?php echo $list['Brand']['name'];?></td>
                        <td><?php echo date('m/d/Y',strtotime($list['Brand']['created']));?></td>
                        <td>
                        <?php echo $this->html->link('Edit','/pages/add_brand/'.$list['Brand']['id']);?>
                         | 
                        <?php echo $this->html->link('Delete','/pages/delete_brand/'.$list['Brand']['id'],array('confirm'=>'Are you sure you want to delete the Brand?'));?>
                        
                        </td>
                    </tr>
                   <?php $n++; }}else{?>
                   <td colspan="6">Your Brand tab is empty</td>
                   <?php }?> 
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
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
			  	url: ''+SITEURL+'pages/add_brand/',
			  	data: "name="+t+"&id="+id+"",
			  	success: function(data) { btnDefault('add_br','Save'); $("#app_err").html(data);},
			  	error: function(comment) { btnDefault('add_br','Save'); $("#app_err").html(data); }});

			  
			  }
		});
	
});

</script>


