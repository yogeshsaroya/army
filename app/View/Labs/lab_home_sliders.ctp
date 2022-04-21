<div class="content-wrapper" style="min-height: 1066px;" id="home_slider_pic">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Manage Home page slider photos</h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Upload new photo for home page slider</h3>
              <?php echo $this->Form->create('HomePic',array('id'=>'HomePicForm','type' => 'file'));?>
                  <div class="box-body">
                    <div class="form-group">
                    <?php echo $this->Form->input('homeImg', array('type' => 'file','label'=>'select file'));?>
                      
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="button" class="btn btn-primary" id="home_pic_btn" value="Upload">
                  </div>
                <?php echo $this->Form->end();?>
            </div>
            <div class="box-body">
            <div id="msg_err">
            <?php echo $this->Session->flash('msg');?>
            </div>
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recently Added photos</h3>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                  <?php if(isset($data) && !empty($data)){
                  	$url = show_image('cdn/','no_image_available.jpg',100,100,100,'ff','place',null);
                  	foreach ($data as $list){
                  		if(file_exists('cdn/home_pictures/'.$list['HomePic']['img'])){ 
                  			$url = show_image('cdn/home_pictures',$list['HomePic']['img'],100,100,100,'ff','user',null);
                  		}
                  ?>
                    <li class="item">
                      <div class="product-img">
                        <img alt="Product Image" src="<?php echo $url;?>">
                      </div>
                      <div class="product-info">
                        <div class="product-title" href="javascript::;">
                        <a href="<?php echo SITEURL."lab/labs/home_pic_status/status/".$list['HomePic']['id'];?>" class="<?php if($list['HomePic']['status'] == 1){ echo "text-green";}else{ echo "text-red";}?>"><?php if($list['HomePic']['status'] == 1){ echo "Active";}else{ echo "Inactive";}?></a>
                        <a href="<?php echo SITEURL."lab/labs/home_pic_status/remove/".$list['HomePic']['id'];?>"><span class="label label-warning pull-right">Delete</span></a>
                        </div>
                        <span class="product-description">
                          Added on <?php echo date('M d,Y',strtotime($list['HomePic']['created']));?>
                        </span>
                      </div>
                    </li><!-- /.item -->
          	<?php }}else{?>
          	<div class="callout callout-warning">
                    <p>There is no photo for homepage slider.</p>
                  </div>
                    <?php }?>
                  </ul>
                </div><!-- /.box-body -->
                
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
            <?php if(isset($data) && !empty($data)){?>
              <div class="col-md-12">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Slider preview</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    
                    <div class="carousel-inner">
                      
               <?php 
               		$a=1;
                  	$url = show_image('cdn/','no_image_available.jpg',100,100,100,'ff','place',null);
                  	foreach ($data as $list){
                  		if(file_exists('cdn/home_pictures/'.$list['HomePic']['img'])){ 
                  			$url = show_image('cdn/home_pictures',$list['HomePic']['img'],1020,500,100,'cf','user',null);
                  		}
                  ?>
                      
                      <div class="item <?php if($a == 1){ echo "active"; }?>">
                        <img src="<?php echo $url; ?>" alt="First slide">
                        <div class="carousel-caption">
                          Second Slide
                        </div>
                      </div>
               <?php $a++;}?>
                      
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                      <span class="fa fa-angle-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                      <span class="fa fa-angle-right"></span>
                    </a>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <?php }?>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div>
<script>

$( document ).ready(function() {
	$( "#home_pic_btn" ).click(function() {
			$("#HomePicForm").ajaxForm({ 
				   target: '#msg_err',
				   beforeSubmit:function() { $("#home_pic_btn").prop("disabled",true); $("#home_pic_btn").addClass('m-progress'); }, 
				   success: function(response)  { $("#home_pic_btn").prop("disabled",false); $("#home_pic_btn").removeClass('m-progress'); } }).submit(); 
			
});
});
</script>      