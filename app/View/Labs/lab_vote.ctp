<!-- DATA TABLES -->
<link href="<?php echo SITEURL."lab_root/";?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Vote </h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="box-body">
						<h4> <a href="<?php echo SITEURL."lab/labs/quick_vote";?>">Add new quick vote</a> </h4>	
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box">
						
						<div class="box-body">
							<div id="example2_wrapper"
								class="dataTables_wrapper form-inline dt-bootstrap">
								<div class="row">
									<div class="col-sm-6"></div>
									<div class="col-sm-6"></div>
								</div>
								<div class="row">
									<div class="col-sm-12" id="lab_table">
										<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
											<thead>
											
					<tr role="row">
                        <th><?php echo $this->Paginator->sort('id', 'Type', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('title', 'Sender', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('created', 'Created', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('status', 'Status', array('escape' => false)); ?></th>
                        <th>Action</th>
                    </tr>
</thead>
<tbody id="table_rows">

 <?php
                    if (!empty($data)) {
                        foreach ($data as $list) { ?>
                            <tr class="odd gradeX">
                                <td class="center gnTxt"> <?php echo $list['Vote']['id']; ?></td>
                                <td class="center gnTxt"><?php echo $list['Vote']['title']; ?></td>
                                
                                <td class="center"> <?php echo date('M d,y',strtotime($list['Vote']['created'])); ?> </td>
                                <td class="center"> <?php if($list['Vote']['status'] == 1){ echo $this->Html->link('Active','/lab/labs/vote?st='.$list['Vote']['id'],array('class' => 'green')); }
                                else{  echo $this->Html->link('Deactive','/lab/labs/vote?st='.$list['Vote']['id'],array('class' => 'red')); } ?> </td>
                                <td class="center"> <?php echo $this->Html->link('Edit', array('controller' => 'labs', 'action' => 'quick_vote', $list['Vote']['id'])); ?> </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
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
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
	
	</section>
	<!-- /.content -->
</div>
<script>
$(document).ready(function () {
	  var $rows = $('#table_rows tr');
	  $('#tab_search').keyup(function() {
	      var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
	      
	      $rows.show().filter(function() {
	          var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
	          return !~text.indexOf(val);
	      }).hide();
	  });
	});
</script>