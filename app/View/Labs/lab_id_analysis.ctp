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
                	else{  $url = "https://placeholdit.imgix.net/~text?txtsize=30&bg=f39c12&txtclr=000000&txt=Profile+Photo&w=200&h=200"; }
                ?> 
                <img src="<?php echo $url;?>" alt="image" class="img-responsive"> 
                </dl>  
                </div><!-- /.box-body -->
          </div>
     <div class="box box-solid">
                <div class="box-header with-border">
                  <i class="glyphicon glyphicon-info-sign"></i>
                  <h3 class="box-title">ID Verification</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <dl class="dl-horizontal u_dl">
                    <dt>Full Name:</dt> <dd><?php echo $data['User']['first_name']." ".$data['User']['middle_name']." ".$data['User']['last_name'];?></dd>
                    <dt>Date of birth:</dt> <dd><?php echo $data['User']['dob'];?></dd>
                    <dt>Status:</dt> <dd><?php  if($data['UserIdVerification']['status'] == 1){ echo '<p class="text-green">Verified</p>';}
           elseif($data['UserIdVerification']['status'] == 2){ echo '<p class="text-red">Declined</p>';}
           elseif($data['UserIdVerification']['status'] == 0){ echo '<p class="text-muted">Pending</p>';}?></td></dd>
                    <dt>ID Number:</dt> <dd><?php echo $data['UserIdVerification']['id_number'];?></dd>
                  </dl>
                  
                  <dl class="dl-horizontal u_dl" id="new_id_photo">
                <?php if(!empty($data['UserIdVerification']['photo'])){
                	if(file_exists('cdn/id_photo/'.$data['UserIdVerification']['photo'])){
                		$path = $data['UserIdVerification']['photo']; } 
                	if(!empty($path)){ $url = show_image('cdn/id_photo',$path,200,200,70,'ff','user',null); }
                	else{ $url = "https://placeholdit.imgix.net/~text?txtsize=30&bg=f39c12&txtclr=000000&txt=ID+Photo&w=200&h=200"; }
                }else{ $url = "https://placeholdit.imgix.net/~text?txtsize=30&bg=f39c12&txtclr=000000&txt=ID+Photo+not+uploaded&w=200&h=200"; }
                ?> 
                <a href="<?php echo SITEURL."cdn/id_photo/".$data['UserIdVerification']['photo'];?>" target="_blank"><img src="<?php echo $url;?>" alt="image" class="img-responsive">Click here to view full image</a>
                 
                </dl> 
                  
                </div><!-- /.box-body -->
              </div> 
           
<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Upload ID Photo</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create('UserIdVerification',array('id'=>'UserIdVerificationForm','type' => 'file'));?>
                  <div class="box-body">
                    <div class="form-group">
                      <?php echo $this->Form->input('photo', array('type' => 'file','label'=>'select file'));?>
                      <input type="hidden" value="pic" id="pic" name="pic">
                      <input type="hidden" value="<?php echo $data['UserIdVerification']['id'];?>" id="id" name="id">
                      
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer" id="photo_err"></div>
                  <div class="box-footer">
                    <button class="btn bg-orange btn-flat margin" type="button" id="up_id" onclick="save_id();">Save ID Photo</button>
                  </div>
                <?php echo $this->Form->end();?>
              </div> 
                       
          
      <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"> Message</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                  <div class="box-body">
                    <div class="form-group">
                      <div class="form-group">
                      <textarea id="comment" placeholder="ID Photo response here....." rows="3" class="form-control"><?php echo $data['UserIdVerification']['message'];?></textarea>
                    </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer" id="app_msg"> </div>

                  <div class="box-footer">
                  <button class="btn bg-olive btn-flat margin" type="button" id="id_valid_1" onclick="bg_chk(1);">Valid id</button>
                  <button class="btn bg-maroon  margin" type="button" id="id_valid_2" onclick="bg_chk(2);">Invalid id</button>

                  </div>
              </div>
	<script>

	function save_id(){
		$("#UserIdVerificationForm").ajaxForm({ 
			   target: '#photo_err',
			   beforeSubmit:function() { $("#up_id").prop("disabled",true); $("#up_id").addClass('m-progress'); }, 
			   success: function(response)  { $("#up_id").prop("disabled",false); $("#up_id").removeClass('m-progress'); } }).submit();
		}
	
	function bg_chk(type)
	{
		$('#app_msg').html('');
		if(type != ""){
			var comment = $('#comment').val();
			comment = $.trim(comment);
			if(comment == ""){ $('#app_msg').html('<div class="text-red fadeIn animated"> Please enter message.</div>'); }
			else{
			var id = <?php echo $data['UserIdVerification']['id'];?>;
			$(".margin").prop("disabled",true); $("#bgchk_"+type).addClass('m-progress');
			$.ajax({type: 'POST',
	            url: ''+SITEURL+'lab/labs/id_analysis/',
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