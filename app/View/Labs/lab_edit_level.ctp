<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Edit Membership level</h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class='row'>
            <div class='col-md-7'>
              <div class='box box-info'>
                <div class='box-header'>
                <div class='box-body pad'>
                  <?php echo $this->Session->flash('msg');?>
                <!-- form start -->
                <?php echo $this->Form->create('DealerLevel');
                $this->request->data['DealerLevel'] = $data['DealerLevel'];
                echo $this->Form->hidden('id');   ?>
                  
      <div class="form-group"> <?php echo $this->Form->input('title',array('class'=>'form-control')); ?> </div>
      <div class="form-group"> <?php echo $this->Form->input('offer_1',array('class'=>'form-control','label'=>'Off for SS products (%)')); ?> </div>
      <div class="form-group"> <?php echo $this->Form->input('offer_2',array('class'=>'form-control','label'=>'Off for titanium products (%)')); ?> </div>
      
      
      <div class="box-footer">
         <div class="form-group "> <input type="submit" class="btn btn-block btn-success btn-flat" value="Save"></div>
       <?php echo $this->Form->end();?>
</div>
</div>
</div><!-- /.box -->
</div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
