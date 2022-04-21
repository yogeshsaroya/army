<div class="content-wrapper" style="min-height: 1066px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Get images</h1>
          
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">FTP</h3>
              
            </div>
            <div class="box-body">
            
<div class="row">
                <div class="col-xs-3">
                <?php echo $this->Form->input('folder',array('id'=>'folder','options'=>$directories,'empty'=>' -- Select folder -- ','class'=>'form-control','label'=>false));?>
                  
                </div>
                <div class="col-xs-4">
                <input type="button" class="btn btn-primary" value="Get images" id="getimg">
                </div>
                
              </div>            
            
            
              
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div id="app_err"></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div>
<script>
$(document).ready(function() {
	$( "#getimg" ).click(function() {
		  var f = $('#folder').val();
		  if( f != ""){
		  $("#preloader").show();			    
		  $.ajax({type: 'POST',
		  	url: ''+SITEURL+'lab/labs/ftp',
		  	data: "folder="+f,
		  	success: function(data) { $("#app_err").html(data);  $('#folder').val(''); setTimeout(function(){ $("#preloader").hide(); }, 1000); },
		  	error: function(comment) { $("#app_err").html(data); $('#folder').val(''); setTimeout(function(){ $("#preloader").hide(); }, 1000); }});
		  }else{  $("#app_err").html("<div class='alert alert-danger'>Please select folder.</div>"); }
		});
	
});
</script>