<!-- DATA TABLES -->
<link href="<?php echo SITEURL."lab_root/";?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<style>
@media only screen and (max-width: 760px),(min-device-width: 768px) and (max-device-width: 1024px) {
#lab_table td:nth-of-type(1):before{content:"ID Copy"}
#lab_table td:nth-of-type(2):before{content:"ID"}
#lab_table td:nth-of-type(3):before{content:"Name"}
#lab_table td:nth-of-type(4):before{content:"Email"}
#lab_table td:nth-of-type(5):before{content:"Age"}
#lab_table td:nth-of-type(6):before{content:"ID number"}
#lab_table td:nth-of-type(7):before{content:"Status"}
#lab_table td:nth-of-type(8):before{content:"Action"}
#lab_table td:nth-of-type(9):before{content:"Created"}
}
</style>
<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Manage Id Verification</h1>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="box-body">
							<?php  echo $this->element('labs/page_filter');?>
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
						<th><a href="javascript:void(0);">ID Copy</a></th>
                        <th><?php echo $this->Paginator->sort('User.id', 'ID', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('UserIdVerification.first_name', 'Name', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('User.email', 'Email', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('User.dob', 'Age', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('UserIdVerification.id_number', 'ID number', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('User.verifications', 'Verifications', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('UserIdVerification.status', 'Status', array('escape' => false)); ?></th>
                        <th><a href="javascript:void(0);">Action</a></th>
                        <th><?php echo $this->Paginator->sort('UserIdVerification.created', 'Created', array('escape' => false)); ?></th>
                    </tr>
</thead>
<tbody id="table_rows">

<?php
if (!empty($data)) {
    foreach ($data as $list) { ?>
        <tr class="odd gradeX">
        <td class="center gnTxt"> 
        <?php if(!empty($list['UserIdVerification']['photo'])){
                	if(file_exists('cdn/id_photo/'.$list['UserIdVerification']['photo'])){
                		$path = $list['UserIdVerification']['photo']; } 
                	if(!empty($path)){ $url = show_image('cdn/id_photo',$path,100,100,70,'ff','user',null); }
                	else{ $url = "https://placeholdit.imgix.net/~text?txtsize=30&bg=f39c12&txtclr=000000&txt=ID+Photo&w=100&h=100"; }
                }else{ $url = "https://placeholdit.imgix.net/~text?txtsize=30&bg=f39c12&txtclr=000000&txt=ID+Photo+not+uploaded&w=100&h=100"; }
                ?> 
                <img src="<?php echo $url;?>" alt="image" class="img-responsive">
        </td>
        
           <td class="center gnTxt"> <?php echo $list['User']['id']; ?></td>
           <td class="center gnTxt"> <?php echo $list['User']['first_name']." ".$list['User']['first_name']; ?> </td>
           <td class="center gnTxt"><a href="<?php echo SITEURL."lab/labs/user_profile/".$list['User']['id'];?>"><?php echo $list['User']['email'];?></a></td>
           <td class="center gnTxt"> <?php echo getAge($list['User']['dob']); ?> </td>
           <td class="center gnTxt"> <?php echo $list['UserIdVerification']['id_number'];?> </td>
           <td class="center gnTxt"> <?php if(!empty($list['User']['verifications'])){ echo $list['User']['verifications'];}else{ echo "N/A";} ?> </td>
           <td class="center gnTxt"> 
           <?php  if($list['UserIdVerification']['status'] == 1){ echo '<p class="text-green">Verified</p>';}
           elseif($list['UserIdVerification']['status'] == 2){ echo '<p class="text-red">Declined</p>';}
           elseif($list['UserIdVerification']['status'] == 0){ echo '<p class="text-muted">Pending</p>';}?></td>
           
           <td class="center gnTxt"><a href="<?php echo SITEURL."lab/labs/id_analysis/".$list['UserIdVerification']['id'];?>" class="GnResPopAjax" data-toggle="bgStatus"><p class="text-green">Aanalysis</p></a> </td>	
           <td class="center gnTxt"> <?php echo date('M d,y',strtotime($list['UserIdVerification']['created'])); ?> </td>
	<?php } } ?>
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
$('[data-toggle="bgStatus"]').popover({ trigger: 'hover', placement: 'top',title:"<i class=\"glyphicon glyphicon-info-sign\"></i> ID Verification",
	html:true,
	content:"Click here to process user's ID Verification." 
		});

</script>
