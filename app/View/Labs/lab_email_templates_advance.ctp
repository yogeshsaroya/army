 <?php
if (!empty($data)) {
	foreach ($data as $list) { ?>
    <tr class="odd gradeX">
    <td class="center gnTxt"> <?php echo $list['EmailTemplate']['type']; ?></td>
    <td class="center gnTxt"><?php echo $list['EmailTemplate']['sender_name']; ?></td>
    <td class="center gnTxt"> <?php echo $list['EmailTemplate']['email']; ?> </td>
    <td class="center"> <?php echo $list['EmailTemplate']['subject']; ?> </td>
    <td class="center"> <?php echo date('M d,y',strtotime($list['EmailTemplate']['created'])); ?> </td>
    <td class="center"> <?php if($list['EmailTemplate']['status'] == 1){ echo $this->Html->link('Active','/lab/labs/status_email_templates/'.$list['EmailTemplate']['id'].'/2',array('class' => 'green')); }
                                else{  echo $this->Html->link('Deactive','/lab/labs/status_email_templates/'.$list['EmailTemplate']['id'].'/1',array('class' => 'red')); } ?> </td>
    <td class="center"> <?php echo $this->Html->link('Edit', array('controller' => 'labs', 'action' => 'my_email_template', $list['EmailTemplate']['id'])); ?> </td>
    </tr>
<?php } }else{ ?>
<tr class="odd gradeX"><td colspan="6">We couldn't find any results that matched your criteria.</td></tr>
<?php }?>
