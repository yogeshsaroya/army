<div class="content-wrapper" style="min-height: 1066px;">
<style>
@media (max-width: 767px) { .col-xs-2 { width: auto; } }
</style>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Fees settings </h1>
        </section>
        <!-- Main content -->
        <section class="content">
        <?php echo $this->Form->create('Fee');
        $this->request->data = $data;
        echo $this->Form->input('Fee.id',array('type'=>'hidden'));
                ?>

          <!-- Default box -->
          <div class="box">
            <div class="box-body">
            <div class="alert alert-info alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-info"></i> Detail!</h4>
                    <b>Inquiry Fee:</b> Guest and host need to pay for new inquery. <br>
                    <b>Guest Fee:</b> This service fee apply on rent, other fee and depoist amount. <br>
                    <b>Host Fee:</b> This service fee apply on rent, other fee and depoist amount. <br>
                  </div>
            <?php echo $this->Session->flash('msg');?>

		<div class="col-md-12">
              <div class="box box-success">
                <div class="box-header"> <h3 class="box-title">Inquiry Fee <small>($)</small></h3> </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-2"> <?php echo $this->Form->input('Fee.contact_fee_guest',array('type'=>'text','maxlength'=>5,'class'=>'form-control','data-original-title'=>'Guest must pay this amount to send inquiry to host','data-toggle'=>"tooltip"));?> </div>
                    <div class="col-xs-2"> <?php echo $this->Form->input('Fee.contact_fee_host',array('type'=>'text','maxlength'=>5,'class'=>'form-control','data-original-title'=>'Host must pay this amount to reply to guest','data-toggle'=>"tooltip"));?> </div>
                  </div>
                </div>
              </div>
              
              <div class="box box-success">
                <div class="box-header"> <h3 class="box-title">Guest Fees <small>(%)</small></h3> </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-2"> <?php echo $this->Form->input('Fee.guest_fee_night',array('type'=>'text','maxlength'=>5,'class'=>'form-control','data-original-title'=>'Service fee on nightly booking','data-toggle'=>"tooltip"));?> </div>
                    <div class="col-xs-2"> <?php echo $this->Form->input('Fee.guest_fee_week',array('type'=>'text','maxlength'=>5,'class'=>'form-control','data-original-title'=>'Service fee on weekly booking','data-toggle'=>"tooltip"));?> </div>
                    <div class="col-xs-2"> <?php echo $this->Form->input('Fee.guest_fee_month',array('type'=>'text','maxlength'=>5,'class'=>'form-control','data-original-title'=>'Service fee on monthly booking','data-toggle'=>"tooltip"));?> </div>
                    <div class="col-xs-2"> <?php echo $this->Form->input('Fee.guest_fee_other',array('type'=>'text','maxlength'=>5,'class'=>'form-control','data-original-title'=>'Service fee on other fee','data-toggle'=>"tooltip"));?> </div>
                    <div class="col-xs-2"> <?php echo $this->Form->input('Fee.guest_fee_deposit',array('type'=>'text','maxlength'=>5,'class'=>'form-control','data-original-title'=>'Service fee on deposit','data-toggle'=>"tooltip"));?> </div>
                  </div>
                </div>
              </div>
              
              <div class="box box-success">
                <div class="box-header"> <h3 class="box-title">Host Fees <small>(%)</small></h3> </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-2"> <?php echo $this->Form->input('Fee.host_fee_night',array('type'=>'text','maxlength'=>5,'class'=>'form-control','data-original-title'=>'Service fee on nightly booking','data-toggle'=>"tooltip"));?> </div>
                    <div class="col-xs-2"> <?php echo $this->Form->input('Fee.host_fee_week',array('type'=>'text','maxlength'=>5,'class'=>'form-control','data-original-title'=>'Service fee on weekly booking','data-toggle'=>"tooltip"));?> </div>
                    <div class="col-xs-2"> <?php echo $this->Form->input('Fee.host_fee_month',array('type'=>'text','maxlength'=>5,'class'=>'form-control','data-original-title'=>'Service fee on monthly booking','data-toggle'=>"tooltip"));?> </div>
                    <div class="col-xs-2"> <?php echo $this->Form->input('Fee.host_fee_other',array('type'=>'text','maxlength'=>5,'class'=>'form-control','data-original-title'=>'Service fee on other fee','data-toggle'=>"tooltip"));?> </div>
                    <div class="col-xs-2"> <?php echo $this->Form->input('Fee.host_fee_deposit',array('type'=>'text','maxlength'=>5,'class'=>'form-control','data-original-title'=>'Service fee on deposit','data-toggle'=>"tooltip"));?> </div>
                  </div>
                </div>
              </div>
            </div>              
            </div>
            <div class="box-footer">
              <input type="submit" class="btn btn-primary" type="submit" value="Save">
            </div><!-- /.box-footer-->
          </div>
<?php echo $this->Form->end();?>
        </section><!-- /.content -->
      </div>