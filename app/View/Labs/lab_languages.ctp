<style>
@media only screen and (max-width:800px){#no-more-tables table,#no-more-tables thead,#no-more-tables tbody,#no-more-tables th,#no-more-tables td,#no-more-tables tr{display:block}
#no-more-tables thead tr{position:absolute;top:-9999px;left:-9999px}
#no-more-tables tr{border:1px solid #ccc}
#no-more-tables td{border:0;border-bottom:1px solid #eee;position:relative;padding-left:50%;white-space:normal;text-align:left}
#no-more-tables td:before{position:absolute;top:6px;left:6px;width:45%;padding-right:10px;white-space:nowrap;text-align:left;font-weight:bold}
#no-more-tables td:before{content:attr(data-title)}
}
</style>
<div class="content-wrapper" style="min-height: 1066px;">
        <!-- Content Header (Page header) -->
        <section class="content-header"> <h1>All Language</h1> </section>
        <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">
              <?php if( isset($this->request->data['Language']['id']) && !empty($this->request->data['Language']['id'])){ echo "Edit Language";}else { echo "Add new Language"; }?>
              <small> <a href="https://www.science.co.il/language/Codes.php" target="_blank">Check Language code here</a>  </small>
              </h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-xs-12">
                <?php echo $this->Form->create('Language');
                echo $this->Form->hidden('id'); ?>
                    <div class="col-sm-3"> <?php echo $this->Form->input('code',array('class'=>'form-control','label'=>false,'Placeholder'=>'Language Code Name'));?></div>
                    <div class="col-sm-6"> <?php echo $this->Form->input('language',array('class'=>'form-control','label'=>false,'Placeholder'=>'Language name'));?></div>
                    <div class="col-sm-3"> <input type="button" class="btn btn-success" value="Save" id="s_ser"> </div>
                  
                  <?php echo $this->Form->end();?>
                
                </div>
                <div class="clearfix"></div>
                <br>
<div id="err_msg" class="col-sm-12">
<?php echo $this->Session->flash('msg');?>
</div>
                
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box">
<div class="container">
    <div class="row">
        
        <div id="no-more-tables">
            <table class="col-md-11 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr>
        				<th><?php echo $this->Paginator->sort('Language.id', '#', array('escape' => false)); ?></th>
        				<th><?php echo $this->Paginator->sort('Language.code', 'Code', array('escape' => false)); ?></th>
        				<th><?php echo $this->Paginator->sort('Language.name', 'Name', array('escape' => false)); ?></th>
        				<th><?php echo $this->Paginator->sort('Language.status', 'Status', array('escape' => false)); ?></th>
        				<th><?php echo $this->Paginator->sort('Language.created', 'Created', array('escape' => false)); ?></th>
        				<th>String Translation</th>
        				<th>Action</th>
        				
        			</tr>
        		</thead>
        		<tbody>
<?php if(isset($data) && !empty($data) ){
    $num = 1;
    foreach ($data as $list) { ?>
        		<tr>
        				<td data-title="#"><?php echo $num;?> </td>
        				<td data-title="Code"><?php echo $list['Language']['code'];?> </td>
        				<td data-title="Name"><?php echo $this->html->link($list['Language']['language'],'/lab/labs/languages?edit='.$list['Language']['id'],array('class' => 'text-green','confirm' => 'Do you want to edit this Language?')); ?> </td>
        				<td data-title="Status"><?php 
        				if($list['Language']['status'] == 2){ echo '<button type="button" class="btn btn-default btn-flat margin btn-xs">Inactive</button>';}
        				elseif($list['Language']['status'] == 1){ echo '<button type="button" class="btn btn-success btn-flat margin btn-xs">Active</button>';}?> </td>
        				<td data-title="Created"><?php if( validateDate($list['Language']['created'],'Y-m-d H:i:s') ){ echo date('m/d/Y',strtotime($list['Language']['created'])); }?> </td>
        				<td data-title="Add"><?php echo $this->html->link('Translation','/lab/labs/string_translation/'. $list['Language']['id'],array('class' => 'text-green'));?> </td>
        				<td data-title="Action">
        				<?php 
        				if($list['Language']['status'] == 1){ echo $this->html->link('Active','/lab/labs/languages?dis='.$list['Language']['id'],array('class' => 'text-green','confirm' => 'Do you want to inactive this Language?')); }
        				if($list['Language']['status'] == 2){ echo $this->html->link('Inactive','/lab/labs/languages?dis='.$list['Language']['id'],array('class' => 'text-red','confirm' => 'Do you want to active this Language?')); }
        				?>
        				</td>
        				
        			</tr>
        	
    <?php $num++; } }else{?>
<tr> <td colspan="11"> <h3 class="text-center">This page does not have any Language </h3> </td> </tr>    
    <?php }?>  
        			
        		</tbody>
        	</table>
        </div>
    </div>
    
</div>


            <div class="box-footer">
<?php if(isset($paging['Language']['pageCount']) && $paging['Language']['pageCount'] > 1){?>            
<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
<ul class="pagination"> 
	<?php 
	echo $this->Paginator->prev('Previous', array('tag'=>'li'), null, array('class' => 'paginate_button previous disabled')); 
	echo $this->Paginator->numbers(array('modulus' => 1,'first' => 2,'last' => 2,'separator' =>'','tag'=>'li','ellipsis'=>false,'class'=>'paginate_button')); 
	echo $this->Paginator->next('Next', array('tag'=>'li'), null, array('class' => 'paginate_button previous disabled')); ?> 
	</ul>
</div>
<?php }?>

          </div><!-- /.box -->

        </section><!-- /.content -->
      </div>
      
<script>
$(document).ready(function(){
	$( "#s_ser" ).click(function() {

	       $("#LanguageLabLanguagesForm").ajaxForm({ 
	    	   target: '#err_msg',
	    	   beforeSubmit:function(){ $("#s_ser").prop("disabled",true); $("#s_ser").val('Saving...'); }, 
	    	   success: function(response)  {  },
	    	   error : function(response)  { $("#s_ser").prop("disabled",false); $("#s_ser").val('Save');  },
	    	   }).submit();
	});
});
</script>      