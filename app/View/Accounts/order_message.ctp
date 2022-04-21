<style>
.right, .left {
    float: none !important;
}
#OrderMessageMessage {background: transparent;}
.1chat_window{position:absolute;width:calc(100% - 20px);max-width:800px;height:500px;border-radius:10px;background-color:#fff;left:50%;top:50%;transform:translateX(-50%) translateY(-50%);box-shadow:0 10px 20px rgba(0,0,0,0.15);background-color:#f8f8f8;overflow:hidden}
.top_menu{background-color:#fff;width:100%;padding:20px 0 15px;box-shadow:0 1px 30px rgba(0,0,0,0.1)}
.top_menu .buttons{margin:3px 0 0 20px;position:absolute}
.top_menu .buttons .button{width:16px;height:16px;border-radius:50%;display:inline-block;margin-right:10px;position:relative}
.top_menu .buttons .button.close{background-color:#f5886e}
.top_menu .buttons .button.minimize{background-color:#fdbf68}
.top_menu .buttons .button.maximize{background-color:#a3d063}
.top_menu .title{text-align:center;color:#bcbdc0;font-size:20px}
.messages{position:relative;list-style:none;padding:20px 10px 0;margin:0;height:347px;overflow:auto;}
.messages .message{clear:both;overflow:hidden;margin-bottom:20px;transition:all .5s linear;opacity:0}
.messages .message.left .avatar{background-color:#f5886e;float:left}
.messages .message.left .text_wrapper{background-color:#ffe6cb;margin-left:20px}
.messages .message.left .text_wrapper::after,.messages .message.left .text_wrapper::before{right:100%;border-right-color:#ffe6cb}
.messages .message.left .text{color:#c48843}
.messages .message.right .avatar{background-color:#fdbf68;float:right}
.messages .message.right .text_wrapper{background-color:#c7eafc;margin-right:20px;float:right}
.messages .message.right .text_wrapper::after,.messages .message.right .text_wrapper::before{left:100%;border-left-color:#c7eafc}
.messages .message.right .text{color:#45829b}
.messages .message.appeared{opacity:1}
.messages .message .avatar{width:60px;height:60px;border-radius:50%;display:inline-block}
.messages .message .text_wrapper{display:inline-block;padding:20px;border-radius:6px;width:calc(100% - 85px);min-width:100px;position:relative}
.messages .message .text_wrapper::after,.messages .message .text_wrapper:before{top:18px;border:solid transparent;content:" ";height:0;width:0;position:absolute;pointer-events:none}
.messages .message .text_wrapper::after{border-width:13px;margin-top:0}
.messages .message .text_wrapper::before{border-width:15px;margin-top:-2px}
.messages .message .text_wrapper .text{font-size:18px;font-weight:300}
.bottom_wrapper{position:relative;width:100%;background-color:#fff;padding:20px;position:absolute;bottom:0}
.bottom_wrapper .message_input_wrapper{display:inline-block;height:50px;border-radius:25px;border:1px solid #bcbdc0;width:calc(100% - 160px);position:relative;padding:0 20px}
.bottom_wrapper .message_input_wrapper .message_input{border:none;height:100%;box-sizing:border-box;width:calc(100% - 40px);position:absolute;outline-width:0;color:gray}
.bottom_wrapper .send_message{width:140px;height:50px;display:inline-block;border-radius:50px;background-color:#a3d063;border:2px solid #a3d063;color:#fff;cursor:pointer;transition:all .2s linear;text-align:center;float:right}
.bottom_wrapper .send_message:hover{color:#a3d063;background-color:#fff}
.bottom_wrapper .send_message .text{font-size:18px;font-weight:300;display:inline-block;line-height:48px}
.message_template{display:none}
</style>
<?php echo $this->Html->script(array('jquery.form.min'));?>
<div id="preloader" style="display: none;"><div id="status">&nbsp;</div></div>
<div class="main_wrapper" id="msg_div">
    	<div class="container">
  <ul class="breadcrumb">
        <li><a href="<?php echo SITEURL;?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo SITEURL;?>account">Account</a></li>
      </ul>
    <div class="row">
<?php echo $this->element('user_nav');?>

<div id="content" class="col-sm-9">

<div class="chat_window">
	<div class="top_menu">
		<div class="title">Message for Order # <?php echo $d['Order']['order_number'];?></div>
	</div>
	
	<ul class="messages" id="d_messages">
<?php if(isset($d['OrderMessage']) && !empty($d['OrderMessage'])){
	foreach ($d['OrderMessage'] as $oList){
		$a = null;
		if(!empty($oList['file_name'])){
			$p = SITEURL."cdn/order_doc/".$oList['file_name'];
			$imgExt = strtolower( pathinfo($oList['file_name'], PATHINFO_EXTENSION));
			if($imgExt == 'pdf'){ $a = '<a href="'.$p.'" target="_blank" class="">Attachment : '.$oList['file_name'].'</a>'; }
			else{ $a = '<a href="'.$p.'" class="image-popup-vertical-fit">Attachment : '.$oList['file_name'].'</a>'; }
		}
		if( $oList['sender_id'] == ME){
			echo '<li class="message right appeared"><div class="avatar"><img alt="" src="'.SITEURL.'cdn/no-profile-image.jpg"></div>
			<div class="text_wrapper"><div class="text">'.$oList['message'].'</div>
			'.$a.'
        		<br>
        		<span class="datetime">'.date("Y-m-d H:i:s",strtotime($oList['created'])).'<span></div></li>';
		}else{
			echo '<li class="message left appeared"><div class="avatar"><img alt="" src="'.SITEURL.'cdn/profile/armytrix.jpg"></div>
			<div class="text_wrapper"><div class="text">'.$oList['message'].'</div>'.$a.'<br>
			<span class="datetime">'.date("Y-m-d H:i:s",strtotime($oList['created'])).'<span></div></li>';
		}
	}
}else{?>
<li class="message left appeared"><div class="avatar"><img alt="" src="<?php echo SITEURL;?>cdn/profile/armytrix.jpg"></div>
			<div class="text_wrapper"><div class="text">How can we help you?</div></div></li>
<?php }?>	

	</ul>
<?php echo $this->Form->create('OrderMessage',array( 'type' => 'file','class'=>'','id'=>'msg_frm'));
echo $this->Form->hidden('order_id',array('value'=>$d['Order']['id']));
?>	
	<div class="bottom_wrapper clearfix">
		<div class="message_input_wrapper"><?php echo $this->Form->input('message',array('type'=>'text','label'=>false,'placeholder'=>'Type your message here...', 'class'=>'message_input'));?></div>
		<div class="row"><br><label class="btn btn-primary" for="my-file-selector">
		<?php echo $this->Form->file('file',array('id'=>'my-file-selector','accept'=>'image/x-png,image/jpeg,application/pdf','label'=>false, 'class'=>'hide','onchange'=>'$("#upload-file-info").html($(this).val());'));?>
    Attach file</label>
<span class='label label-info' id="upload-file-info"></span>
</div>

<div class="clearfix"></div>
<br>
<div id="msg_err"></div>		
		
		<div class="send_message" id="s_msg">
			<div class="icon"></div>
			<div class="text">Send</div>
		</div>
	</div>
<?php echo $this->Form->end();?>	
</div>
      

      </div>

</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	
		  var wtf    = $('#d_messages');
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
