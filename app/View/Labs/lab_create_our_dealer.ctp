<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Dealer</h1>
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
                <?php echo $this->Form->create('OurDealer'); 
                
                echo $this->Form->hidden('id',array('id'=>'id'));
                echo $this->Form->hidden('library_id',array('id'=>'library_id'));
                
				?>
                  
<div class="form-group"><?php echo $this->Form->input('title',array('class'=>'form-control')); ?></div>
<div class="form-group"><?php echo $this->Form->input('address',array('type'=>'text','class'=>'form-control')); ?></div>
<div class="form-group"><?php echo $this->Form->input('country',array('class'=>'form-control')); ?></div>
<div class="form-group"><?php echo $this->Form->input('phone',array('class'=>'form-control')); ?></div>
<div class="form-group"><?php echo $this->Form->input('email',array('class'=>'form-control')); ?></div>
<div class="form-group"><?php echo $this->Form->input('website',array('class'=>'form-control')); ?></div>

<div class="form-group"><?php echo $this->Form->input('line',array('class'=>'form-control')); ?></div>

<div class="form-group"><?php echo $this->Form->input('sales_representative',array('class'=>'form-control','label'=>'Product Manager')); ?></div>
<div class="form-group"><?php echo $this->Form->input('installation',array('class'=>'form-control','label'=>'Shop Name')); ?></div>



<div class="">
<div class="timeline-body">
<div class="form-group"><div class="col-sm-3"><label for="">Photo</label>
<div id="new_library_id" onclick="add_lib('library_id','new_library_id','one');">

<img src="<?php 
if(isset($this->request->data['Library']['id']) && !empty($this->request->data['Library']['id']) ){
	echo  new_show_image('cdn/'.$this->request->data['Library']['full_path'],200,150,100,'ff',null);
}else{ echo SITEURL."cdn/img_text.png";}?>" alt="Click here" class=""></div>
</div></div></div></div>   
<div class="clearfix"></div>
<br><br>

                    
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
<script>
function add_lib(library_id,new_library_id,one){
	$.magnificPopup.open({items: {
	    src: '<?php echo SITEURL."lab/labs/add_media/";?>?library_id='+library_id+'&new_library_id='+new_library_id+'&one='+one,
	    type: 'ajax'},
	closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)"> </button>',
	closeOnContentClick: false, closeOnBgClick: false, showCloseBtn: true, enableEscapeKey: false,
	});
}
</script>