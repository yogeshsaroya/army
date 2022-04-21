<div id="rotateepic" class="white-popup-block" style="max-width:700px;">
<style>
.dl-horizontal dt {text-align: left; }
.u_dl { float: left; margin: 10px; }
</style>
<div class="" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close mfp-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Manage Background Check</h4>
      </div>
      <div class="modal-body">
   <?php if(isset($data) && !empty($data)){ ?>  
     <div class="box box-default">
     <div class="box box-solid">
                <div class="box-header with-border">
                  <i class="glyphicon glyphicon-info-sign"></i>
                  <h3 class="box-title">User Details</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                
                  <dl class="dl-horizontal  u_dl">
                    <dt>Full Name:</dt> <dd><?php echo $data['User']['first_name']." ".$data['User']['middle_name']." ".$data['User']['last_name'];?></dd>
                    <dt>Date of birth:</dt> <dd><?php echo $data['User']['dob'];?></dd>
                    <dt>Status:</dt> <dd><?php  if($data['User']['status'] == 1){ echo '<p class="text-green">Verified</p>';}
           elseif($data['User']['status'] == 2){ echo '<p class="text-red">Deactived</p>';}
           elseif($data['User']['status'] == 0){ echo '<p class="text-muted">Pending</p>';}?></td></dd>
                  </dl>
                <dl class="dl-horizontal u_dl">
                <?php $path = $this->Lab->getUserPrimeryImage($data['User']['UserImage']);
                	if(!empty($path)){ $url = show_image('cdn/profile',$path,200,200,70,'ff','user',null); }
                	else{ $url = "http://placehold.it/200x200/f39c12/ffffff&text=Profile+Photo&txtsize=33";}
                ?> 
                <img src="<?php echo $url;?>" alt="image" class="img-circle img-responsive"> 
                </dl>  
                </div><!-- /.box-body -->
          </div>
     <div class="box box-solid">
                <div class="box-header with-border">
                  <i class="glyphicon glyphicon-info-sign"></i>
                  <h3 class="box-title">ID Verification</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <dl class="dl-horizontal">
                    <dt>Full Name:</dt> <dd><?php echo $data['User']['first_name']." ".$data['User']['middle_name']." ".$data['User']['last_name'];?></dd>
                    <dt>Date of birth:</dt> <dd><?php echo $data['User']['dob'];?></dd>
                    <dt>Status:</dt> <dd><?php  if($data['UserIdVerification']['status'] == 1){ echo '<p class="text-green">Verified</p>';}
           elseif($data['UserIdVerification']['status'] == 2){ echo '<p class="text-red">Declined</p>';}
           elseif($data['UserIdVerification']['status'] == 0){ echo '<p class="text-muted">Pending</p>';}?></td></dd>
                    
                  </dl>
                </div><!-- /.box-body -->
              </div>          
          <div class="box box-solid">
                <div class="box-header with-border">
                  <i class="glyphicon glyphicon-info-sign"></i>
                  <h3 class="box-title">Background Check</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <dl class="dl-horizontal">
                    <dt>Full Name:</dt> <dd><?php echo $data['UserBgCheck']['first_name']." ".$data['UserBgCheck']['middle_name']." ".$data['UserBgCheck']['last_name'];?></dd>
                    <dt>Date of birth</dt> <dd><?php echo $data['UserBgCheck']['dob'];?></dd>
                    <dt>Status</dt> <dd><?php  if($data['UserBgCheck']['status'] == 1){ echo '<p class="text-green">Verified</p>';}
           elseif($data['UserBgCheck']['status'] == 2){ echo '<p class="text-red">Declined</p>';}
           elseif($data['UserBgCheck']['status'] == 0){ echo '<p class="text-muted">Pending</p>';}?></td></dd>
                  </dl>
                </div><!-- /.box-body -->
              </div>
      <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"> Reason</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                  <div class="box-body">
                    <div class="form-group">
                      <div class="form-group">
                      <textarea id="comment" placeholder="Background check response here....." rows="3" class="form-control"><?php echo $data['UserBgCheck']['comment'];?></textarea>
                    </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer" id="app_msg"> </div>

                  <div class="box-footer">
                  <button class="btn bg-olive btn-flat margin" type="button" id="bgchk_1" onclick="bg_chk(1);">No Criminal case</button>
                  <button class="btn bg-maroon  margin" type="button" id="bgchk_2" onclick="bg_chk(2);">Criminal case</button>

                  </div>
              </div>
	<script>
	function bg_chk(type)
	{
		$('#app_msg').html('');
		if(type != ""){
			var comment = $('#comment').val();
			comment = $.trim(comment);
			if(comment == ""){ $('#app_msg').html('<div class="text-red fadeIn animated"> Please enter message.</div>'); }
			else{
			var id = <?php echo $data['UserBgCheck']['id'];?>;
			$(".margin").prop("disabled",true); $("#bgchk_"+type).addClass('m-progress');
			$.ajax({type: 'POST',
	            url: ''+SITEURL+'lab/labs/bg_analysis/',
	            data: {id:id,type:type,comment:comment},
	            cache: false,
	            success: function(data) { $("#app_msg").html(data); $(".margin").prop("disabled",false); $("#bgchk_"+type).removeClass('m-progress');},
	            error: function(comment) { $("#app_msg").html(comment); $(".margin").prop("disabled",false); $("#bgchk_"+type).removeClass('m-progress'); }});
			}
		}
	} 
	</script>              
    <?php }else{?>
    <div class="alert alert-warning alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    Sorry, this is not working at the moment. Please try again later. 
                  </div>
    <?php }?>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$.magnificPopup.close();">Close</button>
        
      </div>
    </div>
  </div>
</div>
    
</div>