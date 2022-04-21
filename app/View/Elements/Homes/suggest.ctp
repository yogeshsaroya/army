<?php $bg_img = $this->Lab->getBgImgName('suggest');?>
<?php echo $this->html->script(array('jquery.form.min'));?>
<script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('g-recaptcha', {
          'sitekey' : '<?php echo DataSitekey;?>'
        });
      };
    </script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<style>
h1{font-size:32px}
.sub_head{font-size:20px}
@media (max-width:900px) {
#main_sec{margin-top:16%;color:#fff}
}
@font-face{font-family:big_noodle_titling;src:url(../fonts/big_noodle_titling.ttf)}
@font-face{font-family:builttitlingrg;src:url(../fonts/builttitlingrg.ttf)}
#bg-suggest .container{max-width:1260px;width:100%;padding:0 50px}
#bg-suggest{min-height:600px;min-height:100vh;padding:100px 0;background:url(<?php echo SITEURL."cdn/bg_image/".$bg_img;?>) no-repeat center center;background-size:cover;overflow-x:hidden}
.mid-boxes{max-width:650px;margin:0 auto 10px}
#bg-suggest p{color:#fff!important}
#bg-suggest .mid-boxes h6{font-size:20px;color:#fff;text-transform:inherit;letter-spacing:2px}
#bg-suggest .mid-boxes .txt-inpt{width:100%;background:rgba(0,0,0,0.7);border:1px solid #fff!important;color:#fff;padding:8px 15px}
#bg-suggest .mid-boxes textarea{height:140px; font-size: 18px}
#bg-suggest .form-box_sugst{padding:40px 60px;text-align:left}
#bg-suggest .row{margin:0 -15px;width:auto}
#bg-suggest .mid-boxes h1{display:inline-block;position:relative;margin:50px 0 35px}
.line-ups,.line-dwn{position:absolute;width:300px}
.line-ups{border-top:2px dashed #6499CB;left:-40px;top:-20px}
.line-ups::before{transform:rotate(30deg);-webkit-transform:rotate(20deg);content:"";border-top:2px dashed #6499CB;width:400px;top:60px;left:-393px!important;height:2px;display:block;position:absolute;top:-71px}
.line-dwn{border-top:2px dashed #6499CB;left:134px;bottom:-21px;width:550px}
.line-dwn::before{transform:rotate(-20deg);-webkit-transform:rotate(20deg);content:"";border-top:2px dashed #6499CB;width:500px;bottom:-86px;height:2px;display:block;position:absolute;right:-493px}
.snd-btn button{background:#38A343;font-size:30px;text-transform:uppercase;font-weight:700;border:0;color:#fff;padding:12px 30px;border-radius:3px;margin-top:20px;font-family:"NimbusSanL-Bol";letter-spacing:1px;transition:all 500ms ease;-webkit-transition:all 500ms ease;-ms-transition:all 500ms ease}
.snd-btn button:hover{background:green}
@media (max-width:1250px) {
#bg-suggest .mid-boxes h1{margin:0 0 35px}
}
@media (max-width:991px) {
#bg-welcome .container{padding:0 20px}
.mid-boxes{max-width:550px;margin:0 auto 10px}
.line-dwn{border-top:2px dashed #6499CB;left:54px;bottom:-21px;width:450px}
}
@media (max-width:979px) {
#main_sec{margin-bottom:0}
}
@media (max-width:767px) {
#main_sec{margin-top:0;color:#fff;padding:0;margin-bottom:0}
.bg-army-bx{padding:150px 0}
.line-ups{left:0}
.line-dwn{border-top:2px dashed #6499CB;left:124px;bottom:-21px;width:450px}
#bg-suggest .snd-btn button{font-size:24px;padding:5px 30px!important;margin-top:10px;font-family:"NimbusSanL-Bol"!important}
.line-dwn{width:300px}
#bg-suggest .container{padding:0 10px}
#bg-suggest .mid-boxes h6{text-align:center}
#bg-suggest .form-box_sugst{padding:30px}
#bg-suggest .mid-boxes h1{margin:50px 0 35px}
}
@media (max-width:480px) {
#bg-suggest{padding:50px 0}
#bg-suggest .mid-boxes h6{font-size:15px}
#bg-suggest .form-box_sugst{padding:30px 10px}
.line-dwn,.line-ups{left:0;width:150px;right:0;margin:auto}
.line-dwn:before,.line-ups:before{display:none}
#bg-suggest .row .col-xs-6{width:100%;float:none;margin:0 0 15px}
#bg-suggest .row .col-xs-6.text-right{text-align:left}
#bg-suggest .row .col-xs-6 button{margin-top:0}
}

</style>
<div id="bg-suggest" class="bg-suggest-pg">
  <div class="container">
      <div class="mid-boxes">
           <h1><img src="<?php echo SITEURL;?>/v/suggest-img.png"> <div class="line-ups"></div> <div class="line-dwn"></div></h1>
           <h6>Any languages are welcome!</h6>
           <div class="form-box_sugst">
            <?php echo $this->Form->create(null,array('id'=>'frm'));?>
             <p>in 140 character word limit</p>
             <div class="form-group">
               <textarea class="txt-inpt" name="msg" maxlength="140"></textarea>
             </div>

   <div id="app_err_msg"></div>             
             
            <div class="row"> 
             <div class="col-xs-6">
              <div id="g-recaptcha"></div>                            
             </div>             
             <div class="col-xs-6 text-right">
               <div class="snd-btn">
                 <button id="sd" onclick="process();" >send</button>
               </div>             
             </div>
            </div> 
           </form>  
           </div>
      </div>	
</div>
</div>

    <script>

function process() {

	$("#app_err_msg").html('');
	
$("#frm").ajaxForm({ 
   	   target: '#app_err_msg',
   	   beforeSubmit:function(){ $("#sd").prop("disabled",true); $("#sd").text('Wait..'); }, 
   	   success: function(response)  {  $("#sd").prop("disabled",false); $("#sd").text('Send'); },
   	   error : function(response)  { 

   		   $('#app_err_msg').html('<div class="alert alert-danger alert-dismissable fade in">Sorry, this is not working at the moment. Please try again later.</div>');
	    	   $("#sd").prop("disabled",false); $("#sd").text('Send'); },

   	   }).submit(); 
    }
    </script>