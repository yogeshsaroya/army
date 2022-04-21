<link href="//fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
<div id="preloader" style="display: none;"> <div id="status">&nbsp;</div> </div>
<?php echo $this->Html->script(array('jquery.form.min'));
echo $this->html->script(array('/v/formValidation.min','/v/bootstrap.min'));?>
<style>
h1{font-size:32px}
.sub_head{font-size:20px}
@media (max-width:900px) {
#main_sec{margin-top:16%;color:#fff}
}
@font-face{font-family:big_noodle_titling;src:url(../fonts/big_noodle_titling.ttf)}
#bg-welcome.sponser-form .container{max-width:958px;width:100%!important}
@font-face{font-family:builttitlingrg;src:url(../fonts/builttitlingrg.ttf)}
.bg-army-bx{min-height:600px;min-height:100vh;padding:100px 0;background:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(../v/youtube.jpg) no-repeat center center;background-size:cover;letter-spacing:.3px}
#bg-welcome.sponser-form h1{color:#fff;font-size:50px;text-transform:uppercase;font-family:big_noodle_titling!important;margin:0;text-align:left;padding:0;color:#EC2828}
#bg-welcome.sponser-form h1 img{vertical-align:middle;vertical-align:text-bottom;max-width:250px}
#bg-welcome.sponser-form .head-ings{margin-bottom:40px;text-align:left;padding:0 15px;box-sizing:border-box}
#bg-welcome.sponser-form .head-ings p{margin:15px 0 0;display:block;color:#fff!important;font-size:15px}
#bg-welcome.sponser-form .inpt-spons{width:100%;height:auto!important;background:rgba(102,102,102,0.7);color:#fff!important;font-size:14px;font-family:'Titillium Web',sans-serif!important;color:#fff!important;font-weight:700;padding:10px 15px;border-radius:3px;border:0;text-align:left}
#bg-welcome.sponser-form ::-webkit-input-placeholder{color:#fff;opacity:1}
#bg-welcome.sponser-form ::-moz-placeholder{color:#fff;opacity:1}
#bg-welcome.sponser-form :-ms-input-placeholder{color:#fff;opacity:1}
#bg-welcome.sponser-form :-moz-placeholder{color:#fff;opacity:1}
#bg-welcome.sponser-form input:focus::-webkit-input-placeholder{opacity:0}
#bg-welcome.sponser-form input:focus::-moz-placeholder{color:#fff;opacity:0}
#bg-welcome.sponser-form input:focus:-ms-input-placeholder{color:#fff;opacity:0}
#bg-welcome.sponser-form input:focus:-moz-placeholder{color:#fff;opacity:0}
#bg-welcome.sponser-form textarea:focus::-webkit-input-placeholder{opacity:0}
#bg-welcome.sponser-form textarea:focus::-moz-placeholder{color:#fff;opacity:0}
#bg-welcome.sponser-form textarea:focus:-ms-input-placeholder{color:#fff;opacity:0}
#bg-welcome.sponser-form textarea:focus:-moz-placeholder{color:#fff;opacity:0}
.file-spons{position:relative;margin:20px 20px 10px}
.file-btn{border:2px dotted #fff;border-radius:0;padding:25px 10px;text-align:center;color:#fff!important}
.file-btn img{max-width:60px;padding-bottom:15px;display:block;margin:auto}
#bg-welcome.sponser-form input[type=file]{position:absolute;width:100%;height:100%;top:0;left:0;opacity:0;z-index:55}
#bg-welcome.sponser-form textarea.inpt-spons{height:200px!important}
#bg-welcome.sponser-form .sbmit-bttn{text-align:right}
#bg-welcome.sponser-form .sbmit-bttn input[type="button"]{background:rgba(51,51,51,0.9);border:1px solid #0F0;padding:10px 35px;width:auto;font-family:big_noodle_titling!important;font-size:20px !important;border-radius:0;color:#fff;transition:all 500ms ease-in;-webkit-transition:all 500ms ease-in}
#bg-welcome.sponser-form .sbmit-bttn input[type="button"]:hover{background:rgba(41,41,41,1)}
.upld-imgs{padding:0;list-style:none;text-align:left;min-height:160px;display:block}
.upld-imgs:after{position:relative;display:block;content:"";clear:both}
.upld-imgs li{width:25%;float:left;box-sizing:border-box;padding:2px}
.upld-img img{width:100%}
@media (min-width:768px) {
#bg-welcome.sponser-form h1{margin:0 -25px}
}
@media (max-width:1200px) {
#bg-welcome.sponser-form .sponser-form .col-md-3{width:33.33%}
}
@media (max-width:991px) {
#bg-welcome.sponser-form .container{width:100%;padding:20px;max-width:750px}
}
@media (max-width:767px) {
#bg-welcome h1{margin:0;font-size:40px}
#main_sec{margin-top:0;color:#fff;padding:0;margin-bottom:0}
.bg-army-bx{padding:150px 0}
#bg-welcome.sponser-form .sponser-form .col-md-4{width:100%}
#bg-welcome.sponser-form h1 img{max-width:180px}
#bg-welcome.sponser-form h1{font-size:35px}
#bg-welcome.sponser-form .head-ings p{font-size:12px}
#bg-welcome.sponser-form .sponser-form .col-md-3{width:100%}
}
@media (max-width:480px) {
.bg-army-bx{padding:80px 0}
#bg-welcome.sponser-form h1{font-size:25px}
#bg-welcome.sponser-form h1 img{vertical-align:middle;max-width:112px;padding-bottom:8px}
#bg-welcome.sponser-form .container,#bg-welcome.sponser-form .container .col-sm-12{padding:0}
#bg-welcome.sponser-form .head-ings p{margin:5px 0 0;font-size:12px}
}
small.help-block {
    text-align: left;
    color: chartreuse !important;
}
</style>
<div id="bg-welcome" class="bg-army-bx sponser-form">
  <div class="container">
   <div class="col-sm-12">
    <div class="head-ings">
    <h1><img src="<?php echo SITEURL;?>v/form-logo-youtube.png"/> PROGRAM SIGN UP</h1>
    <p>Please fill out this form to register your vehicle in the YouTube program</p>
    </div>
 <!----start form---->
  
<div class="sponser-form" id="y_sfrm">
<?php echo $this->Form->create('Youtube',array('id'=>'you_frm'));?>
<div class=" col-sm-4">
<div class="form-group"><?php echo $this->Form->input('youtube_id',array('type'=>'text','required'=>"required", 'placeholder'=>'Youtube channel ID*','autocomplete' => 'off','maxlength'=>'50','label'=>false,'div'=>false,'class'=>'form-control inpt-spons'));?></div>
<div class="form-group"><?php echo $this->Form->input('youtube_subscribers',array('type'=>'text', 'required'=>"required",'placeholder'=>'Youtube Subscribers*','autocomplete' => 'off','maxlength'=>'50','label'=>false,'div'=>false,'class'=>'form-control inpt-spons'));?></div>
<div class="form-group"><?php echo $this->Form->input('name',array('type'=>'text','required'=>"required", 'placeholder'=>'Name*','autocomplete' => 'off','maxlength'=>'50','label'=>false,'div'=>false,'class'=>'form-control inpt-spons'));?></div>

<div class="form-group"><?php echo $this->Form->input('email',array('type'=>'email','required'=>"required", 'placeholder'=>'Email Address*','autocomplete' => 'off','maxlength'=>'50','label'=>false,'div'=>false,'class'=>'form-control inpt-spons'));?></div>
<div class="form-group"><?php echo $this->Form->input('phone',array('type'=>'tel','required'=>"required", 'placeholder'=>'Phone Number**','autocomplete' => 'off','maxlength'=>'50','label'=>false,'div'=>false,'class'=>'form-control inpt-spons'));?></div>
<div class="form-group"><?php echo $this->Form->input('city',array('type'=>'text','required'=>"required", 'placeholder'=>'City*','autocomplete' => 'off','maxlength'=>'50','label'=>false,'div'=>false,'class'=>'form-control inpt-spons'));?></div>

<div class="form-group"><?php echo $this->Form->input('state',array('type'=>'text','required'=>"required", 'placeholder'=>'State*','autocomplete' => 'off','maxlength'=>'50','label'=>false,'div'=>false,'class'=>'form-control inpt-spons'));?></div>
<div class="form-group"><?php echo $this->Form->input('address',array('type'=>'text','required'=>"required", 'placeholder'=>'Address*','autocomplete' => 'off','maxlength'=>'50','label'=>false,'div'=>false,'class'=>'form-control inpt-spons'));?></div>
<div class="form-group"><?php echo $this->Form->input('postal_code',array('type'=>'text','required'=>"required", 'placeholder'=>'Postal Code*','autocomplete' => 'off','maxlength'=>'50','label'=>false,'div'=>false,'class'=>'form-control inpt-spons'));?></div>
</div>
<!---end the col--->      
      
<div class=" col-sm-4">
<div class="form-group"><?php echo $this->Form->input('make_year',array('type'=>'text', 'required'=>"required",'placeholder'=>'Vehicle Year*','autocomplete' => 'off','maxlength'=>'50','label'=>false,'div'=>false,'class'=>'form-control inpt-spons'));?></div>
<div class="form-group"><?php echo $this->Form->input('make_model',array('type'=>'text', 'required'=>"required",'placeholder'=>'Vehicle Year*','autocomplete' => 'off','maxlength'=>'50','label'=>false,'div'=>false,'class'=>'form-control inpt-spons'));?></div>
<div class="form-group"><?php echo $this->Form->input('required_parts',array('type'=>'text','required'=>"required", 'placeholder'=>'Required Parts*','autocomplete' => 'off','maxlength'=>'50','label'=>false,'div'=>false,'class'=>'form-control inpt-spons'));?></div>

<div class="form-group"><?php echo $this->Form->input('facebook',array('type'=>'url', 'placeholder'=>'Facebook','autocomplete' => 'off','maxlength'=>'50','label'=>false,'div'=>false,'class'=>'form-control inpt-spons'));?></div>
<div class="form-group"><?php echo $this->Form->input('instagram',array('type'=>'url', 'placeholder'=>'Instagram','autocomplete' => 'off','maxlength'=>'50','label'=>false,'div'=>false,'class'=>'form-control inpt-spons'));?></div>
<div class="form-group"><?php echo $this->Form->input('twitter',array('type'=>'url', 'placeholder'=>'Twitter','autocomplete' => 'off','maxlength'=>'50','label'=>false,'div'=>false,'class'=>'form-control inpt-spons'));?></div>
<div class="form-group"><?php echo $this->Form->input('message',array('type'=>'textarea','required'=>"required", 'placeholder'=>'Message*','autocomplete' => 'off','maxlength'=>'2000','label'=>false,'div'=>false,'class'=>'form-control inpt-spons'));?></div>
</div>
    <!---end the col--->
<?php 
echo $this->Form->hidden('images',array('id'=>'y_img'));
echo $this->Form->end();?>    

<?php echo $this->Form->create('Image',array('id'=>'img_frm','type' => 'file'));?>    
          <div class=" col-sm-4">
           <div class="inpt-spons form-group">
            Attached a photo of your vehicle*
             <div class="file-spons">
               <?php echo $this->Form->file('pic.',array('id'=>'uimg','class'=>"file","accept"=>"image/x-png,image/gif,image/jpeg",'multiple'=>true)); ?>
               <div class="file-btn"><img src="<?php echo SITEURL;?>v/upload-img.png"/> Chose files to Upload </div></div>
           </div>
           
           <div class="inpt-spons form-group">
             <ul class="upld-imgs" id="id_utube">
               
             </ul>
           </div>
           
<?php 


echo $this->Form->end();?>             
           
<div class="form-group sbmit-bttn"> <input type="button" name="" id="u_save" value="Sign up"> </div>
</div>
<div class="col-xs-12" id="u_err"></div>
<div class="clearfix"></div>
</div>
 <!----end start form---->   
</div>
<div class="clearfix"></div>   	 
</div>
</div>
<script>
$(document).ready(function(){

    $('#uimg').change(function(){
           $("#img_frm").ajaxForm({ 
    	       target: '#u_err',
    	    	beforeSend: function() { $('#preloader').show(); },
    	    	uploadProgress: function(event, position, total, percentComplete) { },
    	    	complete: function(xhr) { $('#preloader').hide(); }, }).submit(); 
   	     
   	});
	

	$('#you_frm').formValidation({
        framework: 'bootstrap',
        icon: { }, err: { }, fields: { }
    })    .on('success.form.fv', function(e) {
        // Prevent form submission
        e.preventDefault();

        var $form = $(e.target),
            fv    = $form.data('formValidation');

        // Use Ajax to submit form data
        fv.defaultSubmit();
    });
	

	window['chk'] = function(isBtn) {
		var yim = '';
		$('#id_utube li').each(function(i){ yim = yim+","+$(this).attr('img_name'); });
		$('#y_img').val(yim);
		};
	

	$('#u_save').click( function() {
		$("#u_err").html('');
		chk();
		$("#you_frm").ajaxForm({ 
		  	   target: '#u_err',
		  	   beforeSubmit:function(){  $("#u_save").prop("disabled",true); $("#u_save").val('Please wait...'); $("#u_err").html(''); }, 
		   	   success: function(response) { $("#u_err").html(response);  $("#u_save").prop("disabled",false); $("#u_save").val('Sign up'); } }).submit();
	   });
});	   

</script>