<div id="rotateepic" class="white-popup-block" style="max-width:700px;">
<div class="" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close mfp-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Rotat photo</h4>
      </div>
      <div class="modal-body">
      <?php if(!empty($data)){?>
      <center>
      <div id="rotatepic_div" class="roomImg">
		<?php
		$filename = 'cdn/profile/'.$data['UserImage']['image'];
	     if (file_exists($filename)) {
	     	 echo show_image('cdn/profile',$data['UserImage']['image'],300,300,100,'ff','user','photo'); }
	     	 else{
	     	 echo '<div class="callout callout-danger"> <p>Sorry, this is not working at the moment. Please try again later. </p> </div>';	
	     	 }
		?></div>
<div class="clear pd_10"></div>		
<div class="btn-group">
	<button class="btn btn-default rotatebtn" type="button" id="anti_clock" onclick="rotate('<?php echo $data['UserImage']['image'];?>','cdn/profile','anti_clock')" data-original-title="Rotate this picture by -90 anti clockwise" data-toggle="tooltip"><i class="fa fa-rotate-left"></i></button>
	<button class="btn btn-default rotatebtn" type="button" id="clock" onclick="rotate('<?php echo $data['UserImage']['image'];?>','cdn/profile','clock')" data-original-title="Rotate this picture by 90 clockwise" data-toggle="tooltip"><i class="fa fa-repeat"></i></button>
</div>		
		
	</center>
	<script>
	function rotate(img,path,type)
	{
		$(".rotatebtn").prop("disabled",true); $("#"+type).addClass('m-progress');
		    $.ajax({type: 'POST',
		            url: ''+SITEURL+'lab/labs/rotate_pic/',
		            data: {img:img,path:path,type:type},
		            cache: false,
		            success: function(data) { $("#rotatepic_div").html(data); $(".rotatebtn").prop("disabled",false); $("#"+type).removeClass('m-progress');},
		            error: function(comment) { $(".rotatebtn").prop("disabled",false); $("#"+type).removeClass('m-progress'); }});
		    	
		
	} 

	</script>
      <?php }else{?>
      <div class="callout callout-danger"> <p>Sorry, this is not working at the moment. Please try again later. </p> </div>
      <?php }?>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$.magnificPopup.close();">Close</button>
        
      </div>
    </div>
  </div>
</div>
    
</div>