<script type="text/javascript" src="<?php echo SITEURL;?>bootstrap_3_3_6/js/jquery.form.min.js"></script>
<style>
#preloader_photo, #preloader {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 9999999;
    background: rgba(255,255,255,0.8);
}
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
<div id="drag-box" id="free_gi">
<div id="preloader_photo" class="img-phote-st" style="display:none;"> <div class="percent">0%</div> </div>
    <div class="container-fluid">
    <div class="col-xs-6 bg-1">
     <img src="<?php echo SITEURL;?>bootstrap_3_3_6/file-img.jpg" alt=""/>
      <?php echo $this->Form->create('Photo',array( 'type' => 'file','class'=>'pos-abst','id'=>'pic_frm'));?>
      
        <h2>PHOTOS</h2>
        <h4>UPLOAD YOUR PHOTOS HERE, ONCE IT'S UPLOADED, PRESS SEND.</h4>
	<div class="box__input box" id="drop-area">			
	<?php echo $this->Form->hidden('type',array('id'=>'type','value'=>rand(111,9999)));?>
	<?php echo $this->Form->file('files.',array('id'=>'file','accept'=>'image/*','label'=>false, 'class'=>'box__file','data-multiple-caption'=>'{count} files selected','multiple'=>true));?>
			
			<label for="file" class="ui-frm">Drag&Drop the files.</label>
            <div class="selecd file-set">
    <div class="min-ht">        
      <div class="none-dsp" id="img_name"></div>
<div id="pics_err"></div>
</div>              
<p>Take 5-10 exhaust installation photos of your car and send it to us, you can win a free wristband or small stickers. (Shipping is not included)</p>    
</div>
<button type="button" class="box__button" id="send_pic" >Send</button>
</div>
		
	</form>
 </div>
 
 <div class="col-xs-6 bg-2">  
  <img src="<?php echo SITEURL; ?>bootstrap_3_3_6/file-video.jpg" alt=""/>
    <form method="post" action="#" enctype="multipart/form-data" novalidate class="box_2 pos-abst">    
      <h2>VIDEO</h2>
        <h4>UPLOAD YOUR VIDEO TO YOUTUBE FIRST, THEN PASTE THE LINK HERE AND PRESS SEND</h4>
		
		<div class="box__input" >			
			<input type="text" id="video_file" class="ui-frm" placeholder="Youtube Video URL" />			
            <div class="selecd ">
            <div class="min-ht">
             <div class="none-dsp"></div>
             <div id="v_err"></div>
            </div>   
           <p>Record and upload a video consist of revs and driving exhaust sounds,
must be minimum 720p quality and no less than 40 seconds, you can 
win a free t-shirt or a hat. (Shipping is not included)</p>              
 </div>         
          
            
<button type="button" class="box__button" id="v_btn">Send</button>
		</div>
		
	</form>
  </div>  
    </div>
  </div>




<style>

.box.is-dragover{outline-offset:-20px;outline-color:#c8dadf;}
.box__dragndrop,.box__icon{display:none}
.box.has-advanced-upload .box__dragndrop{display:inline}
.box.has-advanced-upload .box__icon{width:100%;height:80px;fill:#92b0b3;display:block;margin-bottom:40px}
.box.is-uploading .box__input,.box.is-success .box__input,.box.is-error .box__input{visibility:hidden}
.box__uploading,.box__success,.box__error{display:none}
.box.is-uploading .box__uploading,.box.is-success .box__success,.box.is-error .box__error{display:block;position:absolute;top:50%;right:0;left:0;-webkit-transform:translateY(-50%);transform:translateY(-50%)}
.box__uploading{font-style:italic}
.box__success{-webkit-animation:appear-from-inside .25s ease-in-out;animation:appear-from-inside .25s ease-in-out}
@-webkit-keyframes appear-from-inside {
from{-webkit-transform:translateY(-50%) scale(0)}
75%{-webkit-transform:translateY(-50%) scale(1.1)}
to{-webkit-transform:translateY(-50%) scale(1)}
}
@keyframes appear-from-inside {
from{transform:translateY(-50%) scale(0)}
75%{transform:translateY(-50%) scale(1.1)}
to{transform:translateY(-50%) scale(1)}
}
.box__restart{font-weight:700}
.box__restart:focus,.box__restart:hover{color:#39bfd3}
.js .box__file{width:.1px;height:.1px;opacity:0;overflow:hidden;position:absolute;z-index:-1}
.js .box__file + label{max-width:80%;text-overflow:ellipsis;white-space:nowrap;cursor:pointer;display:inline-block;overflow:hidden}
.js .box__file + label:hover strong,.box__file:focus + label strong,.box__file.has-focus + label strong{color:#39bfd3}
.js .box__file:focus + label,.js .box__file.has-focus + label{outline:1px dotted #000;outline:-webkit-focus-ring-color auto 5px}
.no-js .box__file + label{display:none}
.no-js .box__button{display:block}
.box__button{font-weight:700;color:#e5edf1;background-color:#39bfd3;display:block;padding:8px 16px;margin:40px auto 0}
.box__button:hover,.box__button:focus{background-color:#0f3c4b}
#drag-box img{width:100%}
#drag-box .col-xs-6{padding:0}
#drag-box .container-fluid{padding:0}
.pos-abst{width:400px;position:absolute;margin:auto;left:50%;top:15%;right:0;transform:translate(-50%,-15%);-webkit-transform:translate(-50%,-15%);-ms-transform:translate(-50%,-15%);-moz-transform:translate(-50%,-15%);text-align:center}
#drag-box .pos-abst h2{font-size:40px;font-weight:600;margin:0 0 10px;color:#fff}
#drag-box .pos-abst h4{font-size:17px;color:#fff;margin:0}
#drag-box .pos-abst .ui-frm {
    font-size: 15px;
    font-weight: 400;
    color: rgba(128,128,128,1);
    font-weight: 300;
    display: block;
    margin: 15px 0 4px;
    padding: 8px 5px;
    position: relative;
    border: 1px solid rgba(204,204,204,1) !important;
    background: url(<?php echo SITEURL;?>bootstrap_3_3_6/arrow.png) no-repeat right center / 25px auto;
    overflow: hidden;
    padding-right: 50px;
    box-sizing: border-box;
    width: 100%;
    height: auto;
	text-align:center;
}

#drag-box .pos-abst input.ui-frm {background:none;}

#drag-box .min-ht{min-height:20px;}


#drag-box::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color: rgba(128,128,128,1) !important;
  opacity:1;
}
#drag-box::-moz-placeholder { /* Firefox 19+ */
  color: rgba(128,128,128,1) !important;
  opacity:1;
}
#drag-box:-ms-input-placeholder { /* IE 10+ */
  color: rgba(128,128,128,1) !important;
  opacity:1;
}
#drag-box:-moz-placeholder { /* Firefox 18- */
  color: rgba(128,128,128,1) !important;
  opacity:1;
}

#drag-box  input[type="text"]::-webkit-input-placeholder {
 color: rgba(128,128,128,1);
 }

#drag-box .pos-abst p{color:#fff;font-size:14px;font-weight:400;text-align:left;line-height:1.2}
.none-dsp{display:none}
.selecd.file-set .none-dsp{display:block}

#drag-box .box__file{width:.1px;height:.1px;opacity:0;overflow:hidden;position:absolute;z-index:-1}
#drag-box .box__button{font-weight:600;color:#fff;background-color:#319966;display:block;padding:15px 50px;margin:20px auto 0;border:0;border-radius:3px;font-size:22px;transition:all 500ms ease;-webkit-transition:all 500ms ease}
#drag-box .box__button:hover{background-color:#FF7105}
#drag-box .selecd{text-align:left}
#drag-box .selecd span{display:inline-block;margin-right:3px;position:relative;color:rgba(230,230,230,1);font-size:12px; margin-bottom:8px;}
#drag-box .selecd span i{vertical-align:middle;display:inline-block;font-size:11px;margin-left:3px;cursor:pointer; font-style:normal; cursor:pointer;}
#drag-box .selecd span:before{vertical-align:bottom;content:",";margin:0 6px 0 0}
#drag-box .selecd span:first-child:before{display:none}
#drag-box .pos-abst .has-focus + label{color:#fff;background:url(<?php echo SITEURL;?>bootstrap_3_3_6/ajax-loader_2.gif) no-repeat 120% center / 165px auto;text-align:left}
@media (min-width:1400px) {
.pos-abst{top:22%}
}
@media (max-width:1200px) {
#drag-box .pos-abst h2{font-size:25px}
#drag-box .box__button{padding:10px 40px;margin:10px auto 0;border:0;font-size:18px}
.pos-abst{width:450px}
.selecd{min-height:65px}
}
@media (max-width:991px) {
.pos-abst{top:25%}
#drag-box .pos-abst h2{font-size:40px}
#drag-box .pos-abst h4{font-size:18px}
#drag-box .pos-abst p{color:#fff!important}
#drag-box .col-xs-6{padding:0;width:100%;float:none}
div#drag-box{margin-top:-95px}
.selecd{min-height:85px}
}
@media (max-width:768px) {
#drag-box .pos-abst h2{font-size:30px}
#drag-box .pos-abst h4{font-size:15px}
.pos-abst{top:25%;width:100%;padding:15px;max-width:500px}
#drag-box .pos-abst p{min-height:20px;margin-bottom:30px}
#drag-box .col-xs-6.bg-2 .pos-abst{top:15%}
}
@media (max-width:580px) {
#drag-box img{display:none}
div#drag-box{margin-top:-50px}
#drag-box .col-xs-6{min-height:600px;height:100vh}
.pos-abst {
    min-height: 600px;
    min-height: 100vh;
    position: static;   
    /* margin-top: 20%; */
    padding-top: 80px;
    transform: translate(0,0);
    -webkit-transform: translate(0,0);
    -ms-transform: translate(0,0);
    -moz-transform: translate(0,0);
    position: static;
}
.bg-1{background:url(<?php echo SITEURL; ?>bootstrap_3_3_6/file-img.jpg) no-repeat center center;background-size:cover}
.bg-2{background:url(<?php echo SITEURL; ?>bootstrap_3_3_6/file-video.jpg) no-repeat center center;background-size:cover}
}

@media (max-width:480px) {
	.pos-abst {padding-top:60px;}
}

		
	</style>
    
    
    
    
 <script>

 'use strict';

 function rm(id){
			var p = $("#"+id).attr( "data_path" );
			var n = p.split('@');
			$.ajax({
				 url: "<?php echo SITEURL;?>pages/remove_pics",
				 type: "POST",
				 data: "type=remove&fl="+n[0]+"&file="+n[1]+"&id="+id+"",
				 
				 success: function(data){
				  $('#pics_err').html(data);
				  
				 }});


}

 window['matchYoutubeUrl'] = function(url) { 
	    var p = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
	    var matches = url.match(p);
	    if(matches){
	        return matches[1];
	    }
	    return false;
	}
	 

 window['sub_frm'] = function(formData) {

if( formData){
	if( $('#file').hasClass('has-focus') === false ){ $('#file').addClass('has-focus'); } 
	var type = $('#type').val();
	$.ajax({
		 url: "<?php echo SITEURL;?>pages/get_pics",
		 type: "POST",
		 data: formData,
		 contentType:false,
		 cache: false,
		 processData: false,
		 success: function(data){
		  $('#pics_err').html(data);
		  $('#file').removeClass('has-focus');
		 }});
}else{


	$("#pic_frm").ajaxForm({ 
	       target: '#pics_err',
	    	beforeSend: function() { $('#preloader_photo').show();  $('#preloader_photo .percent').html('0%');  },
	    	uploadProgress: function(event, position, total, percentComplete) { if( percentComplete < 100 ){ var percentVal = percentComplete + '%'; $('#preloader_photo .percent').html(percentVal);  } else{ $('#preloader_photo .percent').html('Wait'); } },
	    	complete: function(xhr) {  $('#preloader_photo').hide(); $('#file').removeClass('has-focus');} }).submit(); 
	 
      
}

	 };

	$(document).on('ready', function(){

		
        
        

        $( "#v_btn" ).click(function() {
            var u = $.trim($('#video_file').val());

            if( u ==  ""){ $('#v_err').html('<div class="alert alert-danger">Please enter Youtube Video URL.</div>');}
            else{
            var id = matchYoutubeUrl(u);
            if(id!=false){

            	$("#v_btn").prop("disabled",true); 
				$("#v_btn").html('Please wait..');
    			$.ajax({
   				 url: "<?php echo SITEURL;?>pages/remove_pics",
   				 type: "POST",
   				 data: "type=youtube&url="+u+"",
   				 success: function(data){
   				  $('#v_err').html(data);
   				$("#v_btn").prop("disabled",false); 
				$("#v_btn").html('Send');
   				  
   				 }});
            }else{ $('#v_err').html('<div class="alert alert-danger">Incorrect URL</div>'); }
            }
            });

		$( "#send_pic" ).click(function() {
			var type = $('#type').val();
			console.log($('#img_name').text().length);
			if ($('#img_name').text().length == 0  ){  $('#pics_err').html('<div class="alert alert-danger">Please upload some photo</div>'); }
			else{
				
				$("#send_pic").prop("disabled",true); 
				$("#send_pic").html('Please wait..');
				
				$.ajax({
					 url: "<?php echo SITEURL;?>pages/remove_pics",
					 type: "POST",
					 data: "type=em&fl="+type+"",
					 success: function(data){
					  $('#pics_err').html(data);
					  $("#send_pic").prop("disabled",false); 
						$("#send_pic").html('Send');
					  
					 }});
				}
			
			});


		
		  $('#file').on('change', function(){
			sub_frm();
		  });
		});

	

	$(document).ready(function()
			{
			 $("#drop-area").on('dragenter', function (e){
			  e.preventDefault();
			 // $(this).css('background', '#BBD5B8');
			 });

			 $("#drop-area").on('dragover', function (e){
			  e.preventDefault();
			 });

			 $("#drop-area").on('drop', function (e){
			 // $(this).css('background', '#D8F9D3');
			  e.preventDefault();
			  var image = e.originalEvent.dataTransfer.files;
			  var formImage = new FormData();
			  if( image )
				{
					$.each( image, function( i, file )
					{
						//ajaxData.append( $input.attr( 'name' ), file );
						formImage.append('files[]', file);
					});
				}
			  formImage.append('type', $('#type').val());
			  
			  //uploadFormData(formImage);
			  sub_frm(formImage);
			 });
			});

			

</script>

