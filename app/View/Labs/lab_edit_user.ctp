      <!-- Content Wrapper. Contains page content -->
<style>

.month-select{margin: 10px}

</style>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> <?php if(isset($data['User'])) echo $data['User']['first_name']." ".$data['User']['last_name'];?> <small>Edit profile</small> </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-body">
            <?php echo $this->Session->flash('msg');?>
     <?php if(isset($data) && !empty($data)){ 
     	$this->request->data = $data;
     	?>         
		<div class="box box-primary">
                <!-- form start -->
                <?php echo $this->Form->create('User', array('url' => array('controller' => 'labs', 'action' => 'lab_edit_user') ));
                echo $this->Form->input('User.id',array('type'=>'hidden'));
                ?>
                  <div class="box-body">
                    
                    <div class="form-group"><?php echo $this->Form->input('User.email',array('class'=>'form-control'));?></div>
                    <div class="form-group"><?php echo $this->Form->input('User.first_name',array('class'=>'form-control'));?></div>
                    <div class="form-group"><?php echo $this->Form->input('User.last_name',array('class'=>'form-control'));?></div>
                    <div class="form-group"><?php echo $this->Form->input('User.mobile',array('class'=>'form-control'));?></div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
               <?php echo $this->Form->end(); ?>
              </div>
        <?php }else{?>
        
        <div class="box-body">
                  <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4> User profile not found.
                  </div>
                </div>
        <?php }?>      


            </div><!-- /.box-body -->
            <div class="box-footer">
            <?php if(isset($data)){?>
              <div class="box box-primary">
                <!-- form start -->
                <?php  echo $this->Form->input('User.id',array('type'=>'hidden','id'=>'user_id_new')); ?>
                  <div class="box-body">
                    <div class="form-group"><?php echo $this->Form->input('User.password',array('id'=>'new_pwd','value'=>'','type'=>'text','class'=>'form-control'));?></div>
                  </div>
                  <div class="box-footer" id="app_msg"> </div>
                  <div class="box-footer">
                    <input type="button" class="btn btn-primary" type="submit" value="Change password" onclick="change_pwd();" id="pwd">
                  </div>
                  </div>
                  

                  
             <?php }?>
                    
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<script>
function as(){ $(".btn").prop("disabled",false);}
function about_pro(act){
	var id = $('#user_id_about').val();
	var real_about = $('#real_about').val();
	$(".btn").prop("disabled",true);

	$.ajax({type: 'POST',
		url: ''+SITEURL+'lab/labs/update_user/',
		data: {id:id,real_about:$.trim(real_about),act:act,type:'about'},
		success: function(data) {$("#about_msg").html(data);},
		error: function(comment) { as(); }});
		
	
}

function s(){ $("#pwd").prop("disabled",false); $("#pwd").val('Change password');}
function change_pwd(){
var id = $('#user_id_new').val();
var new_pwd = $('#new_pwd').val();
$("#pwd").prop("disabled",true); $("#pwd").val('Please wait..');
$.ajax({type: 'POST',
	url: ''+SITEURL+'lab/labs/update_user/',
	data: {id:id,new_pwd:$.trim(new_pwd),type:'password'},
	success: function(data) {$("#app_msg").html(data);},
	error: function(comment) { s(); }});
}
</script>