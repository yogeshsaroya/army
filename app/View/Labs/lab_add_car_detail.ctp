      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

          <div class="row">
            
			<div class="col-md-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs"> <li class="active"><a href="javascript:void(0);" >General</a></li> </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="settings">
<?php echo $this->Session->flash('msg');?>                  
<?php echo $this->Form->create('ItemDetail',array('class'=>'form-horizontal'));
	  echo $this->Form->input('exhaust_model_id',array('type'=>'hidden','value'=>$mid));
?>                  

<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Title</label>
<div class="col-sm-10"><?php echo $this->Form->input('name',array('class'=>'form-control','placeholder'=>'Title','label'=>false,'required'=>true));?></div></div>

<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Description</label>
<div class="col-sm-10"><?php echo $this->Form->input('description',array('class'=>'form-control','placeholder'=>'Description','label'=>false,'required'=>true));?></div></div>

<div class="form-group"><label for="inputName" class="col-sm-2 control-label">SEO URL</label>
<div class="col-sm-10"><?php echo $this->Form->input('url',array('class'=>'form-control','placeholder'=>'url','label'=>false,'required'=>true));?></div></div>


<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Meta Title</label>
<div class="col-sm-10"><?php echo $this->Form->input('meta_title',array('class'=>'form-control','placeholder'=>'Meta Title','label'=>false));?></div></div>

<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Meta Description</label>
<div class="col-sm-10"><?php echo $this->Form->input('meta_description',array('type'=>'text','class'=>'form-control','placeholder'=>'Meta Description','label'=>false));?></div></div>

<div class="form-group"><label for="inputName" class="col-sm-2 control-label">Meta Keywords</label>
<div class="col-sm-10"><?php echo $this->Form->input('meta_keywords',array('type'=>'text','class'=>'form-control','placeholder'=>'Meta Keywords','label'=>false));?></div></div>


<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-success" value="Save">

</div>
</div>

                    </form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<script>
window['ToSeoUrl'] = function(url) {
	  // make the url lowercase         
	  var encodedUrl = url.toString().toLowerCase(); 
	  // replace & with and           
	  encodedUrl = encodedUrl.split(/\&+/).join("-and-")
	  // remove invalid characters 
	  encodedUrl = encodedUrl.split(/[^a-z0-9]/).join("-");       
	  // remove duplicates 
	  encodedUrl = encodedUrl.split(/-+/).join("-");
	  // trim leading & trailing characters 
	  encodedUrl = encodedUrl.trim('-');
	  encodedUrl = encodedUrl.replace(/^-|-$/g, ''); 
	  return encodedUrl; 
	};
$(document).ready(function(){
$('#ItemDetailName').focusout(function() {
	var v = $.trim( this.value );
	if(v != ""){
		$('#ItemDetailMetaTitle').val(v.toLowerCase());
		$('#ItemDetailUrl').val(ToSeoUrl(v));
		
	}
});

});
</script>
