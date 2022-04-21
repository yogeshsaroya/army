<?php echo $this->Html->script(array('jquery.form.min'));?>
<div class="content-wrapper" style="min-height: 1066px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Update instagram images
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            
            <div class="box-body">
              
              <div class="box box-primary">


<?php 
echo $this->Form->create('Instagram',array('type' => 'file','id'=>'proFrm'));
if(isset($e) && !empty($e)){
	$this->request->data['Instagram'] = $e['Instagram'];
}
echo $this->Form->hidden('id',array('id'=>'id'));

?>
<div class="box-body">
<div class="row">
<div class="col-md-12"><div class="form-group"><label for="">Link</label><?php echo $this->Form->input('url', array('label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div></div>
<div class="col-md-12"><div class="form-group"><label for="">User Name</label><?php echo $this->Form->input('user_name', array('label' => false, 'error' => false, 'div' => false, 'class' => 'form-control input-md','required'=>true));?></div></div>

<div class="col-md-12">

<div class="row"><div class="col-lg-12"><div class="form-group">

<div class="col-lg-6"><div class="form-group">
<?php echo $this->Form->file('img',array('accept'=>'image/x-png,image/gif,image/jpeg'));?></div></div>

<div class="col-lg-6"><div class="form-group"><div class=""><div class="timeline-body"><div class="form-group">
<img src="<?php 
if(isset($e['Instagram']['image']) && !empty($e['Instagram']['image']) ){
	echo  show_image('cdn/instagram/',$e['Instagram']['image'],75,75,100,'ff',null);
}else{ echo SITEURL."cdn/img_text.png";}?>" alt="Click here" class="" style="width: 75px"></div>
</div></div></div>
</div>
</div> 
</div>
</div>                
</div>
<div class="clearfix"></div>
<div id="app_err_msg"></div>
</div>
</div><!-- /.box-body -->
<div class="box-footer">
<input type="button" value="Submit" class="btn btn-primary" id="svt">
</div>

<?php echo $this->Form->end();?>
</div><!-- /.box -->
</section><!-- /.content -->
</div>

<script>
$(document).ready(function() { 
	$("#svt").click(function() {

	$("#app_err_msg").html('');
	
     $("#proFrm").ajaxForm({ 
target: '#app_err_msg',
beforeSubmit:function(){ $("#svt").prop("disabled",true); $("#svt").val('Please wait.....'); }, 
success: function(response)  { $("#svt").prop("disabled",false); $("#svt").val('Submit'); },
error : function(response)  {  $("#svt").prop("disabled",false); $("#svt").val('Submit'); },

}).submit();
	});
	
});

</script>