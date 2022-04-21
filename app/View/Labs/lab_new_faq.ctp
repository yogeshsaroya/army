<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>FAQs <?php echo $this->html->link('Add New FAQ',array('controller'=>'labs','action'=>'new_faq',));?> </h1>
        </section>


        <!-- Main content -->
        <section class="content">

          <div class='row'>
            <div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header'>
                <div class='box-body pad'>
                  <?php echo $this->Session->flash('msg');?>
                <!-- form start -->
                <?php echo $this->Form->create('Faq'); 
                
                if(!empty($this->request->data)){
                echo $this->Form->hidden('id');
                
                }
				?>
                  
<div class="form-group"><?php echo $this->Form->input('category_id',array('options'=>@$cat,'empty'=>' -- Select Category -- ', 'class'=>'form-control')); ?></div>
<div class="form-group"> <?php echo $this->Form->input('title',array('class'=>'form-control')); ?> </div>
<div class="form-group"> <?php echo $this->Form->input('description',array('id'=>'editor1','readonly'=>'readonly'));  ?> </div>
<div class="box-footer">
<div class="form-group ">
<input type="submit" class="btn btn-primary" value="Save">
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
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    
    <script type="text/javascript">
      $(function () {
    	  CKEDITOR.replace( 'editor1',
					{
						//fullPage : true,
						//extraPlugins : 'docprops'
					height: '250px',
					});

      });
    </script>