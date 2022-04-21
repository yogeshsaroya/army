<style>
.upload-img-bx_in .img-phote-st{background-image:url(../images/file-icon.png);background-repeat:no-repeat;background-position:center 40%}

.img-phote-st .percent {
    width: 100px;
    height: 100px;
    border-radius: 100%;
    position: absolute;
    top: 30%;
    background: #b1d7d9;
    background-repeat: no-repeat;
    background-position: center;
    text-align: center;
    line-height: 100px;
    font-size: 25px;
    left: 50%;
}
	
</style>
<div id="preloader_photo" class="img-phote-st" style="display: none"> <div class="percent">0%</div> </div>
<div class="content-wrapper" style="min-height: 1066px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Import shipping costs<small>Default</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">



          <!-- Default box -->
          <div class="box">
          
            
            <div class="box-body">
              <div class="col-md-6">
              <div class=" ">
            
            <!-- /.box-header -->
            <!-- form start -->
          <?php echo $this->Form->create('World',array('type' => 'file'));?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <?php echo $this->Form->file('file',array('multiple'=>'multiple','accept'=>'application/vnd.ms-excel'));?>
                </div>
              </div>
              <div id="text_err"></div>
              <div class="box-footer"><button type="button" class="btn btn-primary" id="bt">Submit</button></div>
            <?php echo $this->Form->end();?>
          </div>
              
              </div>
              
            </div><!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div>
<script>
$(document).ready(function() {
	
    $("#bt").click(function() {
    	
    	var status = $('#text_err'); 
	       $("#WorldLabImportCountryForm").ajaxForm({ 
 	       target: '#text_err',
 	    	beforeSend: function() { $('#preloader_photo').show();  $('#preloader_photo .percent').html('0%'); },
 	    	uploadProgress: function(event, position, total, percentComplete) { if( percentComplete < 100 ){ var percentVal = percentComplete + '%'; $('#preloader_photo .percent').html(percentVal);  } else{ $('#preloader_photo .percent').html('Wait'); } },
 	    	complete: function(xhr) {  $('#preloader_photo').hide(); }, }).submit();
	    	
    });
});   
</script>