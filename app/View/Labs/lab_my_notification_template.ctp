<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Edit notification template</h1>
        </section>
<div class="box-body">
<div class="alert alert-warning alert-dismissable">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
<h4><i class="icon fa fa-warning"></i> Alert!</h4>Note: Please Do Not Change Or Remove [CAPITAL LETTERS]
</div> </div>

        <!-- Main content -->
        <section class="content">

          <div class='row'>
            <div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header'>
                <div class='box-body pad'>
                  <?php echo $this->Session->flash('msg');?>
                <!-- form start -->
                <?php echo $this->Form->create('NotificationTemplate'); 
                $is_read = false;
                if(!empty($this->request->data['NotificationTemplate']['id'])){
                echo $this->Form->hidden('id');
                $is_read = true;	
                }
				?>
                  
                    <div class="form-group">
                    <?php echo $this->Form->input('type',array('class'=>'form-control','readonly'=>$is_read)); ?>
                    </div>
                    <div class="form-group">
                      <?php echo $this->Form->input('message',array('type'=>'textarea', 'class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                      <?php echo $this->Form->input('about',array('type'=>'text','class'=>'form-control')); ?>
                    </div>
                    
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
