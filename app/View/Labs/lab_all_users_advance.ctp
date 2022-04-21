<?php
if (!empty($data)) {
    foreach ($data as $list) { 
    $o = $this->Lab->getTotalOrder($list['User']['id']);?>
        <tr class="odd gradeX">
           <td class="center gnTxt"> <?php echo $list['User']['id']; ?></td>
           <td class="center gnTxt"><a href="<?php echo SITEURL."lab/labs/user_profile/".$list['User']['id'];?>"><?php echo $list['User']['email'];?></a></td>
           <td class="center gnTxt"> <?php echo $list['User']['first_name']; ?> </td>
           <td class="center gnTxt"> <?php echo $list['User']['last_name']; ?> </td>
           <td class="center gnTxt"> <?php 
           if($list['User']['role'] == 1){ echo "Admin";}
           elseif($list['User']['role'] == 2){ echo "User";}
           elseif($list['User']['role'] == 2){ echo "Dealer";}
           ?> </td>
           <td class="center gnTxt"><?php if(!empty($o)){ echo "$".num_2($o);}?></td>
           <td class="center gnTxt"><?php echo @$list['Address']['World']['name']; ?> </td> 
           <td class="center gnTxt"> 
           <a href="javascript:void(0);" data-toggle="uStatus"  
           id="user_st_<?php echo $list['User']['id'];?>" onclick="user_status(<?php echo $list['User']['id'].",".$list['User']['status'];?>);">
           	<?php if($list['User']['status'] == 1){ echo '<p class="text-green">Active<p>';} else{ echo '<p class="text-red">Inactive</p>';}?> </a> </td>
           <td class="center gnTxt"> <?php echo date('M d,y',strtotime($list['User']['created'])); ?> </td>
           </tr>
           
           
           
	<?php } }else{ ?>
	<tr class="odd gradeX"><td colspan="9">We couldn't find any results that matched your criteria.</td></tr>
	<?php }?>
<script>
$('[data-toggle="uStatus"]').popover({ html:true, trigger: 'hover', placement: 'top',title:"<i class=\"glyphicon glyphicon-info-sign\"></i> User Status",content:"Click here to change user profile status" });
$('[data-toggle="uVisibility"]').popover({ trigger: 'hover', placement: 'top',title:"<i class=\"glyphicon glyphicon-info-sign\"></i> User Visibility",
	html:true,
	content:"<b>Visibile:</b> User profile is visibile for public view.<br><br> <b>Hidden:</b> User profile is hidden for public view.<br><br> <b>Hidden (Admin):</b> Not approved by admin.<br><br> <b>Hidden (Guest):</b> Profile hidden by guest." 
		});
</script>
	