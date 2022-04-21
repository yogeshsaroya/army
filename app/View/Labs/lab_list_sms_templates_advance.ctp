 <?php
if (!empty($data)) {
	foreach ($data as $list) { ?>
<tr class="odd gradeX">
<td class="center gnTxt"> <?php echo $list['SmsTemplate']['type']; ?></td>
<td class="center gnTxt"><?php echo substr($list['SmsTemplate']['about'],0,30)."..."; ?></td>
<td class="center gnTxt"> <?php echo substr($list['SmsTemplate']['message'],0,40)."..."; ?> </td>
<td class="center"> <?php echo date('M d,y',strtotime($list['SmsTemplate']['created'])); ?> </td>
<td class="center"> <?php if($list['SmsTemplate']['status'] == 1){ echo $this->Html->link('Active','/lab/labs/sms_status/'.$list['SmsTemplate']['id'].'/2',array('class' => 'green')); }
                                else{  echo $this->Html->link('Deactive','/lab/labs/sms_status/'.$list['SmsTemplate']['id'].'/1',array('class' => 'red')); } ?> </td>
<td class="center"> <?php echo $this->Html->link('Edit', array('controller' => 'labs', 'action' => 'my_sms_template', $list['SmsTemplate']['id'])); ?> </td>
                            </tr>
<?php } }else{ ?>
<tr class="odd gradeX"><td colspan="6">We couldn't find any results that matched your criteria.</td></tr>
<?php }?>
