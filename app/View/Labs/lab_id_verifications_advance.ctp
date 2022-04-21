<?php
if (!empty($data)) {
    foreach ($data as $list) { ?>
        <tr class="odd gradeX">
        <td class="center gnTxt"> 
        <?php if(!empty($list['UserIdVerification']['photo'])){
                	if(file_exists('cdn/id_photo/'.$list['UserIdVerification']['photo'])){
                		$path = $list['UserIdVerification']['photo']; } 
                	if(!empty($path)){ $url = show_image('cdn/id_photo',$path,100,100,70,'ff','user',null); }
                	else{ $url = "https://placeholdit.imgix.net/~text?txtsize=30&bg=f39c12&txtclr=000000&txt=ID+Photo&w=100&h=100"; }
                }else{ $url = "https://placeholdit.imgix.net/~text?txtsize=30&bg=f39c12&txtclr=000000&txt=ID+Photo+not+uploaded&w=100&h=100"; }
                ?> 
                <img src="<?php echo $url;?>" alt="image" class="img-responsive">
        </td>
        
           <td class="center gnTxt"> <?php echo $list['User']['id']; ?></td>
           <td class="center gnTxt"> <?php echo $list['User']['first_name']." ".$list['User']['first_name']; ?> </td>
           <td class="center gnTxt"><a href="<?php echo SITEURL."lab/labs/user_profile/".$list['User']['id'];?>"><?php echo $list['User']['email'];?></a></td>
           <td class="center gnTxt"> <?php echo getAge($list['User']['dob']); ?> </td>
           <td class="center gnTxt"> <?php echo $list['UserIdVerification']['id_number'];?> </td>
           <td class="center gnTxt"> <?php if(!empty($list['User']['verifications'])){ echo $list['User']['verifications'];}else{ echo "N/A";} ?> </td>
           <td class="center gnTxt"> 
           <?php  if($list['UserIdVerification']['status'] == 1){ echo '<p class="text-green">Verified</p>';}
           elseif($list['UserIdVerification']['status'] == 2){ echo '<p class="text-red">Declined</p>';}
           elseif($list['UserIdVerification']['status'] == 0){ echo '<p class="text-muted">Pending</p>';}?></td>
           
           <td class="center gnTxt"><a href="<?php echo SITEURL."lab/labs/id_analysis/".$list['UserIdVerification']['id'];?>" class="GnResPopAjax" data-toggle="bgStatus"><p class="text-green">Aanalysis</p></a> </td>	
           <td class="center gnTxt"> <?php echo date('M d,y',strtotime($list['UserIdVerification']['created'])); ?> </td>
	<?php } } ?>
<script>
$('[data-toggle="bgStatus"]').popover({ trigger: 'hover', placement: 'top',title:"<i class=\"glyphicon glyphicon-info-sign\"></i> Background Check",
	html:true,
	content:"Click here to process user's Background Check." 
		});
var SITEURL = "<?php echo SITEURL?>";
$(document).ready(function() {
    $.ajaxSetup({cache: false});
    /* normal popup */
    $('.GnRespopAjax_cls').magnificPopup({type: 'ajax', closeOnContentClick:true,closeOnBgClick:true,closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)">X</button>'});
    /*pop up close only with close button*/
    $('.GnResPopAjax').magnificPopup({type: 'ajax', closeOnContentClick: false, closeOnBgClick: false, showCloseBtn: true, enableEscapeKey: false, closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)">X</button>'});
    /*popup with action */
    $('.GnResPopAjax_act').magnificPopup({type: 'ajax', closeOnContentClick: false, closeOnBgClick: false, showCloseBtn: true, enableEscapeKey: true, closeMarkup: '<button class="mfp-close mfp-new-close" type="button" title="Close (Esc)">X</button>'});
    /*popup with no close buttong */
    $('.GnResPopAjax').magnificPopup({type: 'ajax', closeOnContentClick: false, closeOnBgClick: false, showCloseBtn: false, enableEscapeKey: false});
    
});
</script>
