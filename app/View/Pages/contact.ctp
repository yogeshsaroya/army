<?php echo $this->html->script(array('jquery.form.min','contact_form'));?>
<script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('g-recaptcha', {
          'sitekey' : '<?php echo DataSitekey;?>'
        });
      };
    </script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<style type="text/css">
.row-fluid{width:100%;display:block;clear:both}
.row-fluid .span8{width:65.1%}
.row-fluid span.red {color: red;display: block;width: 100%;text-align: left;}
.row-fluid select{height:40px;padding:9px 18px;border:none;outline:none;background:#e2e3e4}
.row-fluid input[type="text"],.row-fluid input[type="email"],.row-fluid input[type="password"],.row-fluid textarea,.row-fluid select{margin:0}
.row-fluid .control-group{margin-bottom:10px}
#recaptcha_table tr{height:0!important}
#recaptcha_response_field{border:1px solid #cca940!important;background:#fff;margin:0;padding:0;height:auto;box-shadow:inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(82,168,236,0.6)}
#recaptcha_privacy{line-height:6px}
.contact_info_a{margin-left:15px}
.relpos{position:inherit}
.bg_title{padding-bottom:5px}
.contact_left{float:right;margin-left:25px}
#main_sec .contentarea .row {margin:0;}
#main_sec .contentarea {
    margin-bottom: 60px;
}

#contact_us_page .fw_content_wrapper{background-color:#fff!important}
.clearfix{clear:both}
@media (min-width: 760px) and (max-width: 1200px) {
#contact_us_page .container{width:65%}
#contact_us_page .row{width:100%}
}
@media (min-width: 320px) and (max-width: 480px) {
#recaptcha_challenge_image{margin:0!important;width:100%!important}
#recaptcha_response_field{margin:0!important;width:100%!important}
.recaptchatable #recaptcha_image{margin:0!important;width:100%!important}
.recaptchatable .recaptcha_r1_c1,.recaptchatable .recaptcha_r3_c1,.recaptchatable .recaptcha_r3_c2,.recaptchatable .recaptcha_r7_c1,.recaptchatable .recaptcha_r8_c1,.recaptchatable .recaptcha_r3_c3,.recaptchatable .recaptcha_r2_c1,.recaptchatable .recaptcha_r4_c1,.recaptchatable .recaptcha_r4_c2,.recaptchatable .recaptcha_r4_c4,.recaptchatable .recaptcha_image_cell{margin:0!important;width:100%!important;background:none!important}
}
.hero_bg_contact{background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(http://imgur.com/gbFSp4b.jpg) no-repeat transparent 0 0;background-position:top center;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;width:100%;height:300px; margin-top:-60px;}
#main_sec select{color:#000;}
.hero_bg_contact .frame .container{padding:2em 15px 0;position:relative;z-index:2;color:#fff}
.container{margin:0 auto;max-width:1200px;padding:2em 15px;width:100%}
.hero_bg_contact .frame .main-title{font-size:5.5em;margin:0;line-height:2;color:#fff;text-align:left}
section.her0_sec{background:gray;width:100%;margin:auto;height:260px;color:#fff}
h6.testimonials_title{font-size:22px;color:#fff;text-align:left}
.contact-container-left div span{float:left;width:50%;line-height:1.6}
.contact-container-left div span b{font-weight:700;text-transform:uppercase}
h6.testimonials_title{padding:40px 0 40px 10px}
.contact-container{margin:0;width:100%}
.contact_form_container{width:1200px;margin:0 auto}
#contact_content_top{width:100%;background-color:#ececec}
#contact_info_defpertmet_contaner{width:1200px;margin:0 auto}
#contact-container-left{float:left;width:46.5%;padding:4.2em 3em}
#contact-container-left ul, #main_sec .mail_link{color:#363636}
#contact-container-left ul li{float:left;width:50%;line-height:1.6;text-align:left}
#contact-container-left ul li b{font-weight:700;text-transform:uppercase}
#contact-container-right{float:right;width:50%;border-left:1px solid #fff;padding:2.8em 6em}
#contact-container-right span{display:block;margin:.3em auto;font-weight:700;color:#666;text-align:left}
.copy-heading{font-size:27px;line-height:1.1;margin:0 0 1em;padding:0 3em 0 0;text-align:left;text-transform:uppercase;color:#363636}
.copy-heading_2{font-size:27px;line-height:1.1;margin:0 0 1em;padding:0 3em 0 0;text-align:left;text-transform:uppercase;color:#363636}
.section-heading{border:none;color:#363636;font:1.7em/1 ProximaNova,sans-serif;line-height:27px;padding:1em 13em;text-align:center;text-transform:uppercase}
.section-heading_2{border:none;color:#363636;font:1.7em/1 ProximaNova,sans-serif;line-height:27px;padding:1em 7em;text-align:center;text-transform:uppercase}
@media screen and (max-width: 830px) {
.hero_bg_contact .frame{height:400px}
#contact_info_defpertmet_contaner{width:100%}
.contact_form_container{width:100%}
.section-heading{padding:1em 4em}
.section-heading_2{padding:1em 2em}
.txt-heding_1{margin-left:5px}
.hero_bg_contact .frame .main-title{line-height:5}
#contact-container-left{float:left;width:100%;padding:3em}
#contact-container-right{float:left;width:100%;border-top:1px solid #fff;border-left:none;text-align:center;padding:3em}
.copy-heading{padding:0;text-align:center}
.copy-heading_2{margin:0 0 1em;padding:0;text-align:center}
#contact-container-left span.span_bottom{margin-top:0}
#contact-container-left span{display:block;margin:5px;text-align:center}
.from-section{width:50%;float:left;padding:5px 20px}
.legal-footer.container p{margin:0}


/*----contact page-----*/
  


#contact_us_page  .row{marging:0 !important;}


#contact_us_page input[type="text"], #contact_us_page input[type="email"], #contact_us_page input[type="password"], #contact_us_page textarea {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    display: block;
    width: 100% !important;
    background: none;
    text-shadow: none;
    font-size: 13px;
    line-height: 20px;
    color: #222222;
    background: #e2e3e4;
    height: 40px;
    padding: 9px 18px 11px 18px;
    border: none !important;
    border-radius: 0;
    margin: 0 0 7px 0;
    -webkit-appearance: none !important;
    outline: none;
}
 


h4.headInModule {
    font-size: 28px;
}

.fixed-head #mobile-heade_army{text-align:left;}

.content_wrapper .container .row{margin:0 !important;}


@media (max-width:767px){
	#main_sec .contentarea {
    margin-bottom: 60px;
    box-sizing: border-box;
}

}


@media (max-width:580px){
	.hero_bg_contact .frame .main-title {
    font-size: 4.3em;
    margin: 0 15px ;
    line-height: 2;
    color: #fff;
    text-align: left;
}

#contact-container-left , #contact-container-right { 
    
    padding: 1em;
}
   
.rc-anchor-normal {
    width: 268px;
}

}

@media (max-width:580px){
	.hero_bg_contact .frame .main-title {
    font-size: 28px;
    margin: 165px 15px 0;
    line-height: 2;
    color: #fff;
    text-align: left;
}
}

#contact_us_page .content_wrapper .container .row{margin:0 !important; padding-left:0; padding-right:0;}



</style>

    

<section class="hero_bg_contact content-section dark" id="contact_us_page" >
	<div class="frame">
		<div class="container">
			<div class="title">
				<h1 class="main-title">
					Contact us</h1>
			</div>
		</div>
	</div>
</section>	 

<section class="contact-container">
	<div id="contact_content_top">
		<div id="contact_info_defpertmet_contaner">
			<div id="contact-container-left">
				<h3 class="copy-heading">
					Contact Info</h3>
				<ul>
					<li>
						<b>For United States Orders & Support</b><br>
					
					</li>
					<li>
			
						<b>Tel:</b>&nbsp;480-346-3875<br>
				</li>
				</ul>
			</div>
			<div id="contact-container-right">
				<h3 class="copy-heading_2">
					Departments</h3>
				<span>General Inquiries <span style="color: #d22b2a; display: inline-block;font-weight: normal;"><a class="mail_link" href="mailto:info@armytrix.com">info@armytrix.com</a></span></span>
				<span>Tech Support <span style="color: #d22b2a; display: inline-block;font-weight: normal;"><a class="mail_link" href="mailto:support@armytrix.com">support@armytrix.com</a></span></span>
				<span>Shipping <span style="color: #d22b2a; display: inline-block;font-weight: normal;"><a class="mail_link" href="mailto:shipping@armytrix.com">shipping@armytrix.com</a></span></span> 
				</div>
		</div>
		<div class="clear">
			&nbsp;</div>
	</div>
	<div class="clear">
		&nbsp;</div>
</section>
          
    
    <div class="fw_content_wrapper1">
        <div class="">
            <div class="content_wrapper noTitle">
                <div class="container">
                    <div class="content_block row no-sidebar">
                        <div class="fl-container ">
                            <div class="row" style="margin:0;">
                                <div class="posts-block ">                                                    
                                    <div class="contentarea">
                                    	<div class="row" style="margin:0;  padding:0;">
                                        	<div class="span12 first-module module_number_1 module_cont pb0 module_html">

                                            	
                                                <div class="bg_title"><h4 class="headInModule">Get In Touch with Us</h4></div>
                                            	
                                                <div class="module_content contact_form">
                                                    <div style="color:red; margin-bottom:10px;"><?php echo @$_GET['msg']; ?></div>
                                                    <div id="fields">
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="fdealer">
                                                                <form class="form-horizontal" id="fformID" method="post" action="<?php echo SITEURL."contact";?>" name="mainform" enctype="multipart/form-data">
                                                                    <input type="hidden" name="formtype" value="0"/>
                                                                    <div class="row-fluid">
                                                                        <div class="control-group span2">
                                                                            <input type="text" class="span12" id="fname" name="fname" placeholder="First Name *"/> 
                                                                            <span class="red"></span>
                                                                        </div>
                                                                        <div class="control-group span2">
                                                                            <input type="text" class="span12" id="lname" name="lname" placeholder="Last Name"/> 
                                                                            <span class="red"></span>
                                                                        </div>
                                                                        
                                                                         <div class="control-group span4">
                                                                            <input type="text" class="span12" id="email" name="email" placeholder="Email *"/>
                                                                            <span class="red"></span>
                                                                        </div>
                                                                        <div class="control-group span4">
                                                                            <input type="text" class="span12" id="cemail" name="cemail" placeholder="Confirm Email *"/>
                                                                            <span class="red"></span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="row-fluid">
                                                                          <div class="control-group span4">
                                                                            <input type="text" class="span12" id="phone" name="phone" placeholder="Phone *"/> 
                                                                            <span class="red"></span>
                                                                        </div>
                                                                        <div class="control-group span4">
                                                                            <input type="text" class="span12" id="city" name="city" placeholder="City"/> 
                                                                            <span class="red"></span>
                                                                        </div>
                                                                            <div class="control-group span4">
                                                                            <input type="text" class="span12" id="state" name="state" placeholder="State *"/> 
                                                                            <span class="red"></span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="row-fluid">
                                                                        <div class="control-group span4">
                                                                            <select name="country" id="country" class="span12" >
                                                                                <option value="-1">Select Country *</option>                                                            
                                                                                <option value="Afganistan">Afghanistan</option>
                                                                                <option value="Albania">Albania</option>
                                                                                <option value="Algeria">Algeria</option>
                                                                                <option value="American Samoa">American Samoa</option>
                                                                                <option value="Andorra">Andorra</option>
                                                                                <option value="Angola">Angola</option>
                                                                                <option value="Anguilla">Anguilla</option>
                                                                                <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                                                                <option value="Argentina">Argentina</option>
                                                                                <option value="Armenia">Armenia</option>
                                                                                <option value="Aruba">Aruba</option>
                                                                                <option value="Australia">Australia</option>
                                                                                <option value="Austria">Austria</option>
                                                                                <option value="Azerbaijan">Azerbaijan</option>
                                                                                <option value="Bahamas">Bahamas</option>
                                                                                <option value="Bahrain">Bahrain</option>
                                                                                <option value="Bangladesh">Bangladesh</option>
                                                                                <option value="Barbados">Barbados</option>
                                                                                <option value="Belarus">Belarus</option>
                                                                                <option value="Belgium">Belgium</option>
                                                                                <option value="Belize">Belize</option>
                                                                                <option value="Benin">Benin</option>
                                                                                <option value="Bermuda">Bermuda</option>
                                                                                <option value="Bhutan">Bhutan</option>
                                                                                <option value="Bolivia">Bolivia</option>
                                                                                <option value="Bonaire">Bonaire</option>
                                                                                <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                                                                <option value="Botswana">Botswana</option>
                                                                                <option value="Brazil">Brazil</option>
                                                                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                                                <option value="Brunei">Brunei</option>
                                                                                <option value="Bulgaria">Bulgaria</option>
                                                                                <option value="Burkina Faso">Burkina Faso</option>
                                                                                <option value="Burundi">Burundi</option>
                                                                                <option value="Cambodia">Cambodia</option>
                                                                                <option value="Cameroon">Cameroon</option>
                                                                                <option value="Canada">Canada</option>
                                                                                <option value="Canary Islands">Canary Islands</option>
                                                                                <option value="Cape Verde">Cape Verde</option>
                                                                                <option value="Cayman Islands">Cayman Islands</option>
                                                                                <option value="Central African Republic">Central African Republic</option>
                                                                                <option value="Chad">Chad</option>
                                                                                <option value="Channel Islands">Channel Islands</option>
                                                                                <option value="Chile">Chile</option>
                                                                                <option value="China">China</option>
                                                                                <option value="Christmas Island">Christmas Island</option>
                                                                                <option value="Cocos Island">Cocos Island</option>
                                                                                <option value="Colombia">Colombia</option>
                                                                                <option value="Comoros">Comoros</option>
                                                                                <option value="Congo">Congo</option>
                                                                                <option value="Cook Islands">Cook Islands</option>
                                                                                <option value="Costa Rica">Costa Rica</option>
                                                                                <option value="Cote DIvoire">Cote D'Ivoire</option>
                                                                                <option value="Croatia">Croatia</option>
                                                                                <option value="Cuba">Cuba</option>
                                                                                <option value="Curaco">Curacao</option>
                                                                                <option value="Cyprus">Cyprus</option>
                                                                                <option value="Czech Republic">Czech Republic</option>
                                                                                <option value="Denmark">Denmark</option>
                                                                                <option value="Djibouti">Djibouti</option>
                                                                                <option value="Dominica">Dominica</option>
                                                                                <option value="Dominican Republic">Dominican Republic</option>
                                                                                <option value="East Timor">East Timor</option>
                                                                                <option value="Ecuador">Ecuador</option>
                                                                                <option value="Egypt">Egypt</option>
                                                                                <option value="El Salvador">El Salvador</option>
                                                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                                <option value="Eritrea">Eritrea</option>
                                                                                <option value="Estonia">Estonia</option>
                                                                                <option value="Ethiopia">Ethiopia</option>
                                                                                <option value="Falkland Islands">Falkland Islands</option>
                                                                                <option value="Faroe Islands">Faroe Islands</option>
                                                                                <option value="Fiji">Fiji</option>
                                                                                <option value="Finland">Finland</option>
                                                                                <option value="France">France</option>
                                                                                <option value="French Guiana">French Guiana</option>
                                                                                <option value="French Polynesia">French Polynesia</option>
                                                                                <option value="French Southern Ter">French Southern Ter</option>
                                                                                <option value="Gabon">Gabon</option>
                                                                                <option value="Gambia">Gambia</option>
                                                                                <option value="Georgia">Georgia</option>
                                                                                <option value="Germany">Germany</option>
                                                                                <option value="Ghana">Ghana</option>
                                                                                <option value="Gibraltar">Gibraltar</option>
                                                                                <option value="Great Britain">Great Britain</option>
                                                                                <option value="Greece">Greece</option>
                                                                                <option value="Greenland">Greenland</option>
                                                                                <option value="Grenada">Grenada</option>
                                                                                <option value="Guadeloupe">Guadeloupe</option>
                                                                                <option value="Guam">Guam</option>
                                                                                <option value="Guatemala">Guatemala</option>
                                                                                <option value="Guinea">Guinea</option>
                                                                                <option value="Guyana">Guyana</option>
                                                                                <option value="Haiti">Haiti</option>
                                                                                <option value="Hawaii">Hawaii</option>
                                                                                <option value="Honduras">Honduras</option>
                                                                                <option value="Hong Kong">Hong Kong</option>
                                                                                <option value="Hungary">Hungary</option>
                                                                                <option value="Iceland">Iceland</option>
                                                                                <option value="India">India</option>
                                                                                <option value="Indonesia">Indonesia</option>
                                                                                <option value="Iran">Iran</option>
                                                                                <option value="Iraq">Iraq</option>
                                                                                <option value="Ireland">Ireland</option>
                                                                                <option value="Isle of Man">Isle of Man</option>
                                                                                <option value="Israel">Israel</option>
                                                                                <option value="Italy">Italy</option>
                                                                                <option value="Jamaica">Jamaica</option>
                                                                                <option value="Japan">Japan</option>
                                                                                <option value="Jordan">Jordan</option>
                                                                                <option value="Kazakhstan">Kazakhstan</option>
                                                                                <option value="Kenya">Kenya</option>
                                                                                <option value="Kiribati">Kiribati</option>
                                                                                <option value="Korea North">Korea North</option>
                                                                                <option value="Korea Sout">Korea South</option>
                                                                                <option value="Kuwait">Kuwait</option>
                                                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                                <option value="Laos">Laos</option>
                                                                                <option value="Latvia">Latvia</option>
                                                                                <option value="Lebanon">Lebanon</option>
                                                                                <option value="Lesotho">Lesotho</option>
                                                                                <option value="Liberia">Liberia</option>
                                                                                <option value="Libya">Libya</option>
                                                                                <option value="Liechtenstein">Liechtenstein</option>
                                                                                <option value="Lithuania">Lithuania</option>
                                                                                <option value="Luxembourg">Luxembourg</option>
                                                                                <option value="Macau">Macau</option>
                                                                                <option value="Macedonia">Macedonia</option>
                                                                                <option value="Madagascar">Madagascar</option>
                                                                                <option value="Malaysia">Malaysia</option>
                                                                                <option value="Malawi">Malawi</option>
                                                                                <option value="Maldives">Maldives</option>
                                                                                <option value="Mali">Mali</option>
                                                                                <option value="Malta">Malta</option>
                                                                                <option value="Marshall Islands">Marshall Islands</option>
                                                                                <option value="Martinique">Martinique</option>
                                                                                <option value="Mauritania">Mauritania</option>
                                                                                <option value="Mauritius">Mauritius</option>
                                                                                <option value="Mayotte">Mayotte</option>
                                                                                <option value="Mexico">Mexico</option>
                                                                                <option value="Midway Islands">Midway Islands</option>
                                                                                <option value="Moldova">Moldova</option>
                                                                                <option value="Monaco">Monaco</option>
                                                                                <option value="Mongolia">Mongolia</option>
                                                                                <option value="Montserrat">Montserrat</option>
                                                                                <option value="Morocco">Morocco</option>
                                                                                <option value="Mozambique">Mozambique</option>
                                                                                <option value="Myanmar">Myanmar</option>
                                                                                <option value="Nambia">Nambia</option>
                                                                                <option value="Nauru">Nauru</option>
                                                                                <option value="Nepal">Nepal</option>
                                                                                <option value="Netherland Antilles">Netherland Antilles</option>
                                                                                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                                                <option value="Nevis">Nevis</option>
                                                                                <option value="New Caledonia">New Caledonia</option>
                                                                                <option value="New Zealand">New Zealand</option>
                                                                                <option value="Nicaragua">Nicaragua</option>
                                                                                <option value="Niger">Niger</option>
                                                                                <option value="Nigeria">Nigeria</option>
                                                                                <option value="Niue">Niue</option>
                                                                                <option value="Norfolk Island">Norfolk Island</option>
                                                                                <option value="Norway">Norway</option>
                                                                                <option value="Oman">Oman</option>
                                                                                <option value="Pakistan">Pakistan</option>
                                                                                <option value="Palau Island">Palau Island</option>
                                                                                <option value="Palestine">Palestine</option>
                                                                                <option value="Panama">Panama</option>
                                                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                                                <option value="Paraguay">Paraguay</option>
                                                                                <option value="Peru">Peru</option>
                                                                                <option value="Phillipines">Philippines</option>
                                                                                <option value="Pitcairn Island">Pitcairn Island</option>
                                                                                <option value="Poland">Poland</option>
                                                                                <option value="Portugal">Portugal</option>
                                                                                <option value="Puerto Rico">Puerto Rico</option>
                                                                                <option value="Qatar">Qatar</option>
                                                                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                                                <option value="Republic of Serbia">Republic of Serbia</option>
                                                                                <option value="Reunion">Reunion</option>
                                                                                <option value="Romania">Romania</option>
                                                                                <option value="Russia">Russia</option>
                                                                                <option value="Rwanda">Rwanda</option>
                                                                                <option value="St Barthelemy">St Barthelemy</option>
                                                                                <option value="St Eustatius">St Eustatius</option>
                                                                                <option value="St Helena">St Helena</option>
                                                                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                                                <option value="St Lucia">St Lucia</option>
                                                                                <option value="St Maarten">St Maarten</option>
                                                                                <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                                                                <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                                                                <option value="Saipan">Saipan</option>
                                                                                <option value="Samoa">Samoa</option>
                                                                                <option value="Samoa American">Samoa American</option>
                                                                                <option value="San Marino">San Marino</option>
                                                                                <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                                <option value="Senegal">Senegal</option>
                                                                                <option value="Serbia">Serbia</option>
                                                                                <option value="Seychelles">Seychelles</option>
                                                                                <option value="Sierra Leone">Sierra Leone</option>
                                                                                <option value="Singapore">Singapore</option>
                                                                                <option value="Slovakia">Slovakia</option>
                                                                                <option value="Slovenia">Slovenia</option>
                                                                                <option value="Solomon Islands">Solomon Islands</option>
                                                                                <option value="Somalia">Somalia</option>
                                                                                <option value="South Africa">South Africa</option>
                                                                                <option value="Spain">Spain</option>
                                                                                <option value="Sri Lanka">Sri Lanka</option>
                                                                                <option value="Sudan">Sudan</option>
                                                                                <option value="Suriname">Suriname</option>
                                                                                <option value="Swaziland">Swaziland</option>
                                                                                <option value="Sweden">Sweden</option>
                                                                                <option value="Switzerland">Switzerland</option>
                                                                                <option value="Syria">Syria</option>
                                                                                <option value="Tahiti">Tahiti</option>
                                                                                <option value="Taiwan">Taiwan</option>
                                                                                <option value="Tajikistan">Tajikistan</option>
                                                                                <option value="Tanzania">Tanzania</option>
                                                                                <option value="Thailand">Thailand</option>
                                                                                <option value="Togo">Togo</option>
                                                                                <option value="Tokelau">Tokelau</option>
                                                                                <option value="Tonga">Tonga</option>
                                                                                <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                                                                <option value="Tunisia">Tunisia</option>
                                                                                <option value="Turkey">Turkey</option>
                                                                                <option value="Turkmenistan">Turkmenistan</option>
                                                                                <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                                                                <option value="Tuvalu">Tuvalu</option>
                                                                                <option value="Uganda">Uganda</option>
                                                                                <option value="Ukraine">Ukraine</option>
                                                                                <option value="United Arab Erimates">United Arab Emirates</option>
                                                                                <option value="United Kingdom">United Kingdom</option>
                                                                                <option value="United States of America">United States of America</option>
                                                                                <option value="Uraguay">Uruguay</option>
                                                                                <option value="Uzbekistan">Uzbekistan</option>
                                                                                <option value="Vanuatu">Vanuatu</option>
                                                                                <option value="Vatican City State">Vatican City State</option>
                                                                                <option value="Venezuela">Venezuela</option>
                                                                                <option value="Vietnam">Vietnam</option>
                                                                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                                                <option value="Wake Island">Wake Island</option>
                                                                                <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                                                                <option value="Yemen">Yemen</option>
                                                                                <option value="Zaire">Zaire</option>
                                                                                <option value="Zambia">Zambia</option>
                                                                                <option value="Zimbabwe">Zimbabwe</option>
                                                                            </select>
                                                                            <span class="red"></span>
                                                                        </div>
                                                                        
                                                                        <div class="control-group span4">
                                                                            <input type="text" class="span12" id="zip" name="zip" placeholder="Zip code"/> 
                                                                            <span class="red"></span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="row-fluid">
                                                                        <div class="control-group span4">
                                                                            <select name="subject" id="subject" class="span12" >
                                                                                <option value="-1">Select Subject *</option>                                                                
                                                                                <option value="Request a quote">Request a quote</option>
                                                                                <option value="Collaboration">Collaboration</option>
                                                                                <option value="Sponsorship">Sponsorship</option>
                                                                                <option value="Complaints">Complaints</option>
                                                                            </select>
                                                                            <span class="red"></span>
                                                                        </div>
                                                                      
                                                                        <div class="control-group span4">
                                                                            <select name="hear" id="hear" class="span12" >
                                                                                <option value="-1">How did you hear about us? *</option>
                                                                                <option value="Automotive Forums">Automotive Forums</option>
                                                                                <option value="YouTube">YouTube</option>
                                                                                <option value="Instagram">Instagram</option>
                                                                                <option value="Facebook">Facebook</option>
                                                                                <option value="Dupont Registry Magazine">Dupont Registry Magazine</option>
                                                                                <option value="DUB Magazine">DUB Magazine</option>
                                                                                <option value="European Car Magazine">European Car Magazine</option>
                                                                                <option value="Rides Magazine">Rides Magazine</option>
                                                                                <option value="Heavy Hitters Magazine">Heavy Hitters Magazine</option>
                                                                                <option value="Corvette Magazine">Corvette Magazine</option>
                                                                                <option value="Performance Auto &amp; Sound Magazine">Performance Auto &amp; Sound Magazine</option>
                                                                                <option value="Wheel and Tire Guide">Wheel and Tire Guide</option>
                                                                                <option value="Friend">Friend</option>
                                                                                <option value="Other">Other</option>
                                                                                <option value="Search Engine">Search Engine</option>
                                                                            </select>
                                                                            <span class="red"></span>
                                                                        </div>
                                                                        <div class="control-group span4">
                                                                            <input type="text" class="span12" id="for" name="for" placeholder="For (Vehicle Year / Make / Model) *"/>
                                                                            <span class="red"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row-fluid">
                                                                        <div class="control-group span12">
                                                                            <textarea class="span12" id="message" name="message" placeholder="Message *" rows="6"></textarea>
                                                                            <span class="red"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row-fluid">    
                                                                        <div class="control-group span12">
                                                                        <div id="g-recaptcha"></div>
                                                                        
                                                                            
                                                                            <span class="red"></span>
                                                                        </div>
                                                                        <div class="clearfix"></div> 
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                    
                                                                    <div class="row-fluid">
                                                                    <div id="app_err_msg"></div>
                                                                    </div>
                                                                    
                                                                    <div class="row-fluid">
                                                                        <div class="control-group span3">
                                                                            <input type="button" name="clear" value="Clear"  class="span12 btn-large btn btn-danger clearid"/>
                                                                        </div>
                                                                        <div class="control-group span9">
                                                                            <input type="button" name="send" value="Send" onclick="process();"  class="span12 btn-large btn btn-danger" id="submitId"/>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            
                                                            <div style="clear:both;"></div>
                                                        </div>
                                                    </div>                                                       
                                                </div> 
                                                
                                                
                                            </div><!-- .module_cont -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
    <div class="fixed_bg1 map_bg1"></div>
    
    <script>

    function process()			
    {

	$("#app_err_msg").html('');
	
$("#fformID").ajaxForm({ 
   	   target: '#app_err_msg',
   	   beforeSubmit:function(){ $("#submitId").prop("disabled",true); $("#submitId").val('Please wait.....'); }, 
   	   success: function(response)  {  $("#submitId").prop("disabled",false); $("#submitId").val('Send'); },
   	   error : function(response)  { 

   		   $('#app_err_msg').html('<div class="alert alert-danger alert-dismissable fade in">Sorry, this is not working at the moment. Please try again later.</div>');
	    	   $("#submitId").prop("disabled",false); $("#submitId").val('Verify your card'); },

   	   }).submit(); 
    }
    </script>
    
    <link rel="stylesheet" href="<?php echo SITEURL;?>css/theme.css" type="text/css" media="all" />
    