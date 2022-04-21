      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Add New Promo Code</h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
<?php echo $this->Session->flash('msg');?>
<?php echo $this->Form->create('PromoCode'); ?>

<div class="box-body">

<div class="form-group"><label for="pwd">Promo Code</label><?php echo $this->Form->input('code',array('class'=>'form-control','label'=>false,'required'=>true)); ?></div>
<div class="form-group"><label for="pwd">Discount</label><?php echo $this->Form->input('discount',array('class'=>'form-control','label'=>false,'required'=>true)); ?></div>
<div class="form-group"><label for="pwd">Min Amount</label><?php echo $this->Form->input('min_amount',array('class'=>'form-control','label'=>false,'required'=>true)); ?></div>
<div class="form-group"><label for="pwd">Valid for ( days) </label><?php echo $this->Form->input('days',array('class'=>'form-control','label'=>false,'required'=>true)); ?></div>
                    
                  </div><!-- /.box-body -->
                  

                  <div class="box-footer">
                    <input type="submit" class="btn btn-block btn-primary btn-flat" value="Save">
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<script>
function s(){$("#pro").prop("disabled",false); $("#pro").val('Save');}
function save(){
	var p = $('#pwd').val();
	var p1 = $('#reenter').val();

	$('#err').html('')
	$("#pro").prop("disabled",true); $("#pro").val('Please wait...');
	$.ajax({ type: 'POST', url: ""+SITEURL+"lab/labs/change_pwd",
		  data: { p: $.trim(p), p1: $.trim(p1) },
		  success: function( data ) { $( "#err" ).html(data); },error: function(comment) { s();} });
    }
</script>
