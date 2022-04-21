<style>
.col-xs-Div{width: 30%; display: block;float: left;padding: 10px}

@media ( max-width :767px) { .col-xs-Div{width: 100%} }
@media (min-width: 768px) and (max-width: 1024px)  { .col-xs-Div{width: 50%} }
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Send Message To User</h1>
        </section>
<div class="box-body">

        <!-- Main content -->
        <section class="content">

          <div class='row'>
            <div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header'>
                <div class='box-body pad'>
                <?php echo $this->Session->flash('msg');?>
                <!-- form start -->
                <?php echo $this->Form->create('MessageHistory');
                $sub = $body = null;
                if(!empty($s_mail)) {
                	$sub = $s_mail['EmailTemplate']['subject'];
                	$body = $s_mail['EmailTemplate']['message']; }
                ?>
                <div class="form-group"><?php echo $this->Form->input('email_type',array('options'=>$all_mail,'default' =>$types, 'empty'=>'Select Email template', 'class'=>'form-control')); ?></div>
				<div class="form-group"><?php echo $this->Form->input('from',array('options'=>$this->Lab->SysEmail(),'class'=>'form-control')); ?></div>
				<div class="form-group"><?php echo $this->Form->input('user_email',array('id'=>'user_emails','type'=>'email', 'class'=>'form-control'));?></div>
				<div class="form-group" id="app_msg"></div>
				<div class="clear"></div>
                <div class="form-group"> <?php echo $this->Form->input('subject',array('value'=>$sub,'class'=>'form-control')); ?> </div>
                <div class="form-group"> <?php echo $this->Form->input('sms',array('class'=>'form-control')); ?> </div>
                <div class="form-group"> <?php echo $this->Form->input('message',array('type'=>'textarea','class'=>'form-control')); ?> </div>
                <div class="form-group"><?php echo $this->Form->input('message1',array('id'=>'message', 'type'=>'textarea','id'=>'editor1','readonly'=>'readonly','value'=>$body,'label'=>'Email body'));?></div>
                  
                <div class="box-footer">
                <div class="form-group" id="msg_err"></div>
                  <div class="form-group ">
                      <button class="btn btn-primary" id="pro_btn" type="button" onclick="send_msg_data();">Submit</button>
                    </div>
                  <?php echo $this->Form->end();?>
              </div>
                </div>
              </div><!-- /.box -->
            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
          <!-- CK Editor -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script type="text/javascript">
    function send_msg_data() {
    	$("#msg_err").html('');
    	var real_msg = CKEDITOR.instances['editor1'].getData();
    	var datastring = 'preview=true&real_msg='+ escape(real_msg);
    	if(real_msg != ""){
    		$("#pro_btn").prop("disabled",true); $("#pro_btn").addClass('m-progress');

         	 $.ajax({type: 'POST',
    	                url: ''+SITEURL+'lab/labs/send_message',
    	                 data: $('#MessageHistoryLabSendMessageForm').serialize()+ 'preview=true&real_msg='+ escape(real_msg),
    	                 success: function(data) {
    	                	 $("#msg_err").html(data);
    	                	 $("#pro_btn").prop("disabled",false); $("#pro_btn").removeClass('m-progress');
    	               	}, error: function(comment){ $("#msg_err").html(comment); $("#pro_btn").prop("disabled",false); $("#pro_btn").removeClass('m-progress'); }});
    			 } 
    		 }

    		 function removes(id)
    		 { 
    			 if(id !=""){ $('#user_info_'+id).remove(); }
    		 }
      $(function () {

    	  $( "#user_emails" ).autocomplete({
    	      source: ""+SITEURL+"lab/labs/auto_complete_email",
    	      select: function( event, ui ) {
    	    	  var em = ui.item.value;// $('#user_emails').val();
    	 			var datastring = "email="+em+"&st=1";
    	 			 if(em != "") {  $.ajax({type: 'POST', url: ''+SITEURL+'lab/labs/check_email_data', data: datastring, success: function(data) { 
    	 	 			 $("#app_msg").prepend(data); 
    	 	 			 }, error: function(comment){ }}); }
    	      }
    	    });
          
    	  

   		
    	  
    	  $("#MessageHistoryEmailType" ).change(function(){
    		  var type = $(this).val();
    		  if(type != ''){  window.location.href = ""+SITEURL+"lab/labs/send_message/"+type; } else{ window.location.href = ""+SITEURL+"lab/labs/send_message/"; } 
    		});
    	  CKEDITOR.replace( 'editor1', { height: '400px', });

      });
    </script>