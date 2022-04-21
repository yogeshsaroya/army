<style>
.chat .item>.message_new {
    margin-left: 55px;
    margin-top: -40px;
    
}
.chat .item {
    margin-bottom: 30px;
}
</style>
<div class="content-wrapper" style="min-height: 1066px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> <a href="<?php echo SITEURL;?>lab/labs/all_message" title="">Message Board</a> </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px; ">
            <div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: 250px;overflow: auto;">
              
<?php  if(isset($d['OrderMessage']) && !empty($d['OrderMessage'])){
	foreach ($d['OrderMessage'] as $oList){
		
		$a = null;
		if(!empty($oList['file_name'])){
			$p = SITEURL."cdn/order_doc/".$oList['file_name'];
			$imgExt = strtolower( pathinfo($oList['file_name'], PATHINFO_EXTENSION));
			if($imgExt == 'pdf'){ $a = '<a href="'.$p.'" target="_blank" class="">Attachment : '.$oList['file_name'].'</a>'; }
			else{ $a = '<a href="'.$p.'" class="image-popup-vertical-fit">Attachment : '.$oList['file_name'].'</a>'; }
		} 
		
		
		?>
		
		<div class="item"><img src="<?php 
		if($oList['Sender']['role'] == 1){ echo SITEURL."cdn/profile/armytrix.jpg"; }else{ echo SITEURL."cdn/no-profile-image.jpg";}?>" alt="user image" class="online"><p class="message_new">
                  <a href="javascript:void(0);" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?php echo date("Y-m-d H:i:s",strtotime($oList['created']));?></small>
                  <?php 
                  if($oList['Sender']['role'] == 1){ echo "(Admin)- ";}
                  
                  echo $oList['Sender']['first_name'];?></a>
                  <?php echo $oList['message'];?></p>
               <?php if(!empty($oList['file_name'])){?>   
                <div class="attachment">
                  <h4>Attachments:</h4>
                  <p class="filename"><?php echo $a;?></p>
                  <div class="pull-right">
                  <a href="<?php echo $p;?>" target="_blank" class="btn btn-primary btn-sm btn-flat">Open</a> </div>
                </div> <?php }?>
                <!-- /.attachment -->
              </div>
		
		<?php /* if( $oList['sender_id'] == $oList['User']['id']){ ?>
			 <div class="item"><img src="<?php echo SITEURL;?>cdn/no-profile-image.jpg" alt="user image" class="online"><p class="message_new">
                  <a href="javascript:void(0);" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?php echo date("Y-m-d H:i:s",strtotime($oList['created']));?></small>
                  <?php echo $d['User']['first_name'];?></a>
                  <?php echo $oList['message'];?></p>
               <?php if(!empty($oList['file_name'])){?>   
                <div class="attachment">
                  <h4>Attachments:</h4>
                  <p class="filename"><?php echo $a;?></p>
                  <div class="pull-right">
                  <a href="<?php echo $p;?>" target="_blank" class="btn btn-primary btn-sm btn-flat">Open</a> </div>
                </div> <?php }?>
                <!-- /.attachment -->
              </div>

		<?php }else{ ?>
		<div class="item"><img src="<?php echo SITEURL;?>cdn/profile/armytrix.jpg" alt="user image" class="online"><p class="message_new">
                  <a href="javascript:void(0);" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?php echo date("Y-m-d H:i:s",strtotime($oList['created']));?></small>
                  (Admin) - <?php echo $oList['Admin']['first_name'];?></a>
                  <?php echo $oList['message'];?></p>
               <?php if(!empty($oList['file_name'])){?>   
                <div class="attachment">
                  <h4>Attachments:</h4>
                  <p class="filename"><?php echo $a;?></p>
                  <div class="pull-right">
                  <a href="<?php echo $p;?>" target="_blank" class="btn btn-primary btn-sm btn-flat">Open</a> </div>
                </div> <?php }?>
                <!-- /.attachment -->
              </div>
			
	<?php 	} */ } }?>              

            </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 65px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 184.911px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            <!-- /.chat -->
            <div class="box-footer">
<?php echo $this->Form->create('OrderMessage',array( 'type' => 'file','class'=>'','id'=>'msg_frm'));
echo $this->Form->hidden('order_id',array('value'=>$d['Order']['id']));
?>            
<div class="input-group col-sm-12">
<?php echo $this->Form->input('message',array('type'=>'text','label'=>false,'placeholder'=>'Type your message here...', 'class'=>'form-control'));?>
<div class="clearfix"></div>

<div class="input-group"><br><label class="btn btn-primary" for="my-file-selector">
		<?php echo $this->Form->file('file',array('id'=>'my-file-selector','accept'=>'image/x-png,image/jpeg,application/pdf','label'=>false, 'class'=>'hide','onchange'=>'$("#upload-file-info").html($(this).val());'));?>
    Attach file</label>
<span class='label label-info' id="upload-file-info"></span></div>              
</div>
<br>
<div id="msg_err"></div>
<div class="box-footer"><button type="button" id="s_msg" class="btn btn-info pull-right">Send</button></div>
<?php echo $this->Form->end();?>	              
</div></div>
</section></div>

<script type="text/javascript">
$(document).ready(function(){
	  var wtf    = $('#chat-box');
	  var height = wtf[0].scrollHeight;
	  wtf.scrollTop(height);
	  
	$( "#s_msg" ).click(function() {
		$('#msg_err').html('');
		var m = $.trim( $('#OrderMessageMessage').val() );
		if( m == ''){ $('#msg_err').html('<div class="alert alert-danger ">Please enter message...</div>');}
		else{
			$("#msg_frm").ajaxForm({ 
		    	   target: '#msg_err',
		    	   beforeSubmit:function(){  $("#preloader").show(); }, 
		    	   success: function(response)  { $("#msg_err").html(response); },
		    	   error : function(response)  { 
		    		   $('#msg_err').html('<div class="alert alert-danger ">Sorry, this is not working at the moment. Please try again later.</div>');
		    		   $("#preloader").show();  
			    	   },
		    	   }).submit(); 
			}
		});
});
</script>	