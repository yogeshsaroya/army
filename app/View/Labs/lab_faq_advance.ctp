 <?php
if (!empty($data)) {
	foreach ($data as $list) { ?>
    	<tr class="odd gradeX">
        <td class="center gnTxt"> <?php echo $list['Category']['name']; ?></td>
        <td class="center gnTxt"><?php echo $list['Faq']['title']; ?></td>
        <td class="center"> <?php echo date('M d,y',strtotime($list['Faq']['created'])); ?> </td>
        <td class="center"> <?php echo $this->Html->link('Delete', array('controller' => 'labs', 'action' => 'faq?del='.$list['Faq']['id']),array('confirm'=>'Are you sure you want to delete?')); ?> </td>
        <td class="center"> <?php echo $this->Html->link('Edit', array('controller' => 'labs', 'action' => 'new_faq', $list['Faq']['id'])); ?> </td>
        </tr>
<?php } } else{ ?>
<tr class="odd gradeX"><td colspan="5">We couldn't find any results that matched your criteria.</td></tr>
<?php }?>

