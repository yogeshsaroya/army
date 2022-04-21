<style>
select, option {
    text-transform: capitalize;
}
.user-row{margin-bottom:14px}
.user-row:last-child{margin-bottom:0}
.dropdown-user{margin:13px 0;padding:5px;height:100%}
.dropdown-user:hover{cursor:pointer}
.table-user-information > tbody > tr{border-top:1px solid #ddd}
.table-user-information > tbody > tr:first-child{border-top:0}
.table-user-information > tbody > tr > td{border-top:0}
.toppad{margin-top:20px}
.col-md-6 { width: 88%; }

@media (max-width: 767px) { 
.col-md-6 { width: 100%; padding: 0 }
.image_box { width: 95%; }
}

@media (min-width: 768px) and (max-width: 1024px) {
/* @media only screen and (max-width: 760px),(min-device-width: 768px) and (max-device-width: 1024px) { */ 
.col-md-6 { width: 64%; }
.image_box{width: 170px;}
}
</style>
 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> User Profile Details</h1>
        </section>
<?php if(empty($data)){?>
        <div class="pad margin no-print">
          <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    User details not found or user does not exist or wrong url.
                  </div>
        </div>
        <?php }?>

        <!-- Main content -->
        <?php if(isset($data) && !empty($data)){ 
        	$p_img = '';
        	$imgArr = array();
        	if(!empty($data['UserImage'])){
        		foreach ($data['UserImage'] as $list){
        			if(file_exists(WWW_ROOT.'cdn/profile/'.$list['image'])){
        				if($list['is_primary'] == 1){ $p_img = show_image('cdn/profile',$list['image'],300,300,100,'ff','user',null); }
        				
        				$list['url'] = show_image('cdn/profile',$list['image'],300,300,100,'ff','user',null);
        				$imgArr[] = $list;
        				
        			}
        		}
        	}
        	?>
        <section class="invoice">
        
         <div class="container">
      <div class="row">
        <div class="col-md-6 " >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $data['User']['first_name']." ".$data['User']['last_name'];?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                 
                </div>
                
               
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information" id="userProfile">
                    <tbody>
                    <tr> <td class="text_bold">Role:</td> <td><?php if($data['User']['role'] == 1){ echo "Admin";}
           elseif($data['User']['role'] == 2){ echo "customer";}
           elseif($data['User']['role'] == 3){ echo "Dealer";} ?></td> </tr>
                      <tr> <td class="text_bold">Email:</td> <td><?php echo $data['User']['email']; ?></td> </tr>
                      <tr> <td class="text_bold">Total Order :</td> <td><?php if(isset($data['Order'][0]['Order'][0]['total'])){ echo "$".num_2($data['Order'][0]['Order'][0]['total']);}?></td> </tr>
                      <tr> <td class="text_bold">User ID:</td> <td><?php echo $data['User']['id'];?></td> </tr>
                      <tr> <td class="text_bold">Mobile:</td> <td><?php echo $data['User']['mobile'];?></td> </tr>
                      <tr> <td class="text_bold">Created:</td> <td><?php echo $data['User']['created'];?></td> </tr>
                      
                      <?php if($data['User']['role'] == 3){?>
                      <tr> <td class="text_bold">Website:</td> <td><?php echo $this->Text->autoLinkUrls($data['User']['website'],array('class' => 'my-class', 'target' => '_blank'));?></td> </tr>
                      <tr> <td class="text_bold">Facebook:</td> <td><?php echo $this->Text->autoLinkUrls($data['User']['facebook'],array('class' => 'my-class', 'target' => '_blank'));?></td> </tr>
                      <tr> <td class="text_bold">Instagram:</td> <td><?php echo $this->Text->autoLinkUrls($data['User']['instagram'],array('class' => 'my-class', 'target' => '_blank'));?></td> </tr>
                      
                      
                      <tr> <td class="text_bold">Dealer Level</td> <td>
                      <?php
                      $lList = $this->Lab->dealerType();
                      if($data['User']['dealer_level_id'] == 0){ echo '<p class="text-red">Level not assigned yet</p>';}
                      else{ echo '<p class="text-green">'.uc($lList[$data['User']['dealer_level_id']]).' Dealer</p>';}
                      
                      ?>
                      </td></tr>
                      
                      <tr> <td class="text_bold">Change Level:</td> <td>
                  <div class="col-sm-6"> <div class="form-group">
                  <?php echo $this->Form->input('dealer_level_id',array('options'=>$lList,'default'=>$data['User']['dealer_level_id'],'label'=>false,'empty'=>' --Select Level-- ','class'=>'form-control'));?>
                  </div></div>
                <div class="col-sm-6"> <div class="form-group">
                <button type="button" class="btn btn-info pull-right" onclick="up_l(<?php echo $data['User']['id'];?>);">Updte Level</button>
                </div></div>
                <div class="clearfix"></div>
                <div id="l_err"></div>
                </td></tr>
                      
                      
                      
                      <?php }?>
                      
                      <tr> <td class="text_bold">User Status:</td> <td><?php 
                      if($data['User']['status'] == 0){ echo '<p class="text-red">Inactive</p>';}
                      elseif($data['User']['status'] == 1){ echo '<p class="text-green">Active</p>';}
                      elseif($data['User']['status'] == 2){ echo '<p class="text-red">Inactive (By User)</p>'; }
                      elseif($data['User']['status'] == 3){ echo '<p class="text-red">Inactive (By Admin)</p>'; }
                      ?></td> </tr>
                      
                    </tbody>
                  </table>
                  
                </div>
              </div>

        </div>
        
      
<div class="panel-body">
<hr>
<label>Address</label>
<div class="row">
<div class="col-md-3 col-lg-3 " align="center">
</div>

<div class=" col-md-9 col-lg-9 ">
<?php if(!empty($data['Address'])){
$n = 1;
foreach ($data['Address'] as $add){?>
<label>Address - <?php echo $n;?></label> 
<table class="table table-user-information">
<tbody>
<tr> <td class="text_bold">Company</td> <td><?php echo $add['company']; ?></td> </tr>
<tr> <td class="text_bold">Address 1</td> <td><?php echo $add['address']; ?></td> </tr>
<tr> <td class="text_bold">Address 2</td> <td><?php echo $add['address_2']; ?></td> </tr>
<tr> <td class="text_bold">City</td> <td><?php echo $add['city']; ?></td> </tr>
<tr> <td class="text_bold">Postal Code</td> <td><?php echo $add['zip']; ?></td> </tr>
<tr> <td class="text_bold">Country</td> <td><?php echo $add['country_name']; ?></td> </tr>
<tr> <td class="text_bold">State</td> <td><?php echo $add['state_name']; ?></td> </tr>
</tbody>
</table>
<?php $n++;}}?>                  
                </div>
              </div>

        </div>  
        
        
        
<script>
function up_l(id){
	$('#l_err').html('');

	var l = $('#dealer_level_id').val();
	if( id != '' && l !== ''){

		$('#preloader').show();
		$.ajax({type: 'POST',
	         url: ''+SITEURL+'lab/labs/update_level',
	         data: { id:id,level:l}, success: function(data) { $("#l_err").html(data); $('#preloader').hide(); },
	         error: function(comment) { $("#l_err").html(comment); $('#preloader').hide(); }});
		
		}else{
			$('#l_err').html('<div class="alert alert-danger">Please select Dealdership level</div>');
			}
}

</script>
     <div class="panel-footer"> <a href="<?php echo SITEURL."lab/labs/edit_user/".$data['User']['id'];?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a> </div>
           
          </div>
        </div>
      </div>
    </div>
        
        </section><!-- /.content -->
        <?php } ?>
        <div class="clearfix"></div>
      </div><!-- /.content-wrapper -->
     