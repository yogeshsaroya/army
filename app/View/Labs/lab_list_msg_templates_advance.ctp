 <?php
if (!empty($data)) {
	foreach ($data as $list) { ?>
                            <tr class="odd gradeX">
                                <td class="center gnTxt"> <?php echo $list['MessageTemplate']['type']; ?></td>
                                <td class="center gnTxt"><?php echo substr($list['MessageTemplate']['subject'],0,30)."..."; ?></td>
                                <td class="center gnTxt"> <?php echo substr(strip_tags($list['MessageTemplate']['message']),0,40)."..."; ?> </td>
                                <td class="center"> <?php echo date('M d,y',strtotime($list['MessageTemplate']['created'])); ?> </td>
                                <td class="center"> <?php if($list['MessageTemplate']['status'] == 1){ echo $this->Html->link('Active','/lab/labs/msg_status/'.$list['MessageTemplate']['id'].'/2',array('class' => 'green')); }
                                else{  echo $this->Html->link('Deactive','/lab/labs/msg_status/'.$list['MessageTemplate']['id'].'/1',array('class' => 'red')); } ?> </td>
                                <td class="center"> <?php echo $this->Html->link('Edit', array('controller' => 'labs', 'action' => 'my_msg_template', $list['MessageTemplate']['id'])); ?> </td>
                            </tr>
<?php } }else{ ?>
<tr class="odd gradeX"><td colspan="6">We couldn't find any results that matched your criteria.</td></tr>
<?php }?>
