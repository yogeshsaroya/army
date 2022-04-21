<?php if(!empty($data)) {  $n=1; foreach($data as $list){

	$path = 'cdn/'.$list['Library']['folder'];
	 
	$imgg = show_image($path,$list['Library']['file_name'],100,100,100,'ff',null);
?>
                    <tr>
                        <td><?php echo $n;?></td>
                        <td class="center gnTxt"><img src="<?php echo $imgg;?>" class="img-thumbnail" alt=""> </td>
                        <td><?php if($list['Product']['type'] == 2){ echo "Cat-back";}
                        elseif($list['Product']['type'] == 3){ echo "Catalytic";}
                        ?></td>
                        <td><?php echo $list['Brand']['name']."/ ".$list['Model']['name']."/ ".$list['Motor']['name'];?></td>
                        <td><?php echo $list['Product']['title'];?></td>
                        <td><?php echo $list['Product']['part'];?></td>
                        <td><?php echo "$".$list['Product']['price'];?></td>
                        <td><?php echo  $list['Product']['total_order']."/".$list['Product']['quantity'];?></td>
                        <td><?php echo $this->html->link('Edit','/lab/labs/add_exhaust_product/'.$list['Product']['brand_id'].'/'.$list['Product']['model_id'].'/'.$list['Product']['motor_id'].'?edit='.$list['Product']['id']);?>
                         | <?php 
                        if($list['Product']['status'] == 1){ echo $this->html->link('Active','/lab/labs/exhaust_product?status='.$list['Product']['id'],array('class' => 'text-green')); }
                        else{ echo $this->html->link('Deactive','/lab/labs/exhaust_product?status='.$list['Product']['id'],array('class' => 'text-red')); }
                        ?></td>
                        <td> <?php echo $this->html->link('Delete','/lab/labs/exhaust_product?del='.$list['Product']['id'],array('class' => 'text-red','confirm' => 'Do you want to delete this Product?')); ?></td>
                    </tr>
                   <?php $n++; }}else{?>
                   <td colspan="10">Your Product tab is empty</td>
                   <?php }?> 
	