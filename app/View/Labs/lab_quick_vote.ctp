<?php echo $this->Html->script(array('jquery.form.min'));?>
<div class="content-wrapper" style="min-height: 1066px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Quick Vote</h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-body">
              <div class="box box-primary">

<?php echo $this->Session->flash('msg');?>       
<?php 
echo $this->Form->create('Vote',array('type' => 'file','id'=>'proFrm'));
if(  !empty($e) ){ $this->request->data['Vote'] = $e['Vote']; }
echo $this->Form->hidden('id',array('id'=>'id'));
?>
            

<div class="box-body">

<div class="form-group"><label for="exampleInputEmail1">Title</label>
<?php echo $this->Form->input('title',array('class'=>'form-control','label'=>false));?></div>

<div class="form-group"><label for="exampleInputEmail1">Description</label>
<?php echo $this->Form->input('description',array('class'=>'form-control','label'=>false));?></div>


<?php

$t = 4;
if(isset($e['VoteOption']) && !empty($e['VoteOption'])){
	
	$t = count($e['VoteOption']);
	foreach ($e['VoteOption'] as $list1){ $op[$list1['id']] = $list1['vote_count']; }
	$t1 = array_sum ($op);
	$lList = array();
	foreach ($op as $k=>$v1){ $lList[$k] = num_2( ($v1 * 100.0 / ($t1)) ); }
}
for( $i=1; $i<=$t; $i++ ){ $n = $i-1; ?>
<div class="row"><div class="col-lg-6"><div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Options <?php echo $i;?>
<?php if(isset($lList) && !empty($lList)){
	echo "- ".$lList[@$e['VoteOption'][$n]['id']]."%";
}?>
</label>
<div class="col-sm-9"><?php 
echo $this->Form->hidden('VoteOption.id',array('name'=>'data[VoteOption]['.$i.'][id]','value'=>@$e['VoteOption'][$n]['id']));

echo $this->Form->input('VoteOption.title',array('name'=>'data[VoteOption]['.$i.'][title]','class'=>'form-control','label'=>false,'value'=>@$e['VoteOption'][$n]['title']));?></div></div></div>
<div class="col-lg-3"><div class="form-group">
<?php echo $this->Form->file('VoteOption.img',array('name'=>'data[VoteOption]['.$i.'][img]','accept'=>'image/x-png,image/gif,image/jpeg'));?></div></div>

<div class="col-lg-3"><div class="form-group"><div class=""><div class="timeline-body"><div class="form-group">
<img src="<?php 
if(isset($e['VoteOption'][$n]['image']) && !empty($e['VoteOption'][$n]['image']) ){
	echo  show_image('cdn/vote/',$e['VoteOption'][$n]['image'],75,75,100,'ff',null);
}else{ echo SITEURL."cdn/img_text.png";}?>" alt="Click here" class="" style="width: 75px"></div>
</div></div></div>
</div>
</div> 
<div class="clear"></div>
<?php }?>


              
                
               
<div id="app_err_msg"></div>                
                
              </div>
              <!-- /.box-body -->

<div class="box-footer">
<input type="button" value="Submit" class="btn btn-primary" id="svt">
                
              </div>
            </form>
          </div>
              
              
              
            </div><!-- /.box-body -->
            
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