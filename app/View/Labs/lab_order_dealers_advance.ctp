 <?php
 $order_status = $this->Lab->order_status();
 
                    if (!empty($data)) {
                        foreach ($data as $list) { ?>
                            <tr class="odd gradeX">
                                <td class="center gnTxt"><a href="<?php echo SITEURL."lab/labs/view_message/".$list['Order']['id'];?>" title="Send Message"> <?php echo $list['Order']['order_number']; ?></a></td>
                                <td class="center gnTxt"><?php echo $list['User']['first_name']." ".$list['User']['last_name']; ?></td>
                                <td class="center gnTxt"> <?php
                                if($list['Order']['order_status_id'] == 0){ echo "In progress"; }
                                elseif( isset( $order_status[$list['Order']['order_status_id']] )){ echo $order_status[$list['Order']['order_status_id']]; }
                                ?> </td>
                                
                                <td class="center gnTxt"><?php if($list['Order']['payment_by'] == 'paypal'){ echo "PayPal";} 
                                elseif($list['Order']['payment_by'] == 'wire'){ echo "Bank Transfer ";} 
                                elseif($list['Order']['payment_by'] == 'cc'){ echo "Credit Card";} ?> </td>
                                
                                <td class="center"> <?php echo "$".num_2($list['Order']['grand_total'],2); ?> </td>
                                <td class="center"> <?php echo date('M d,y',strtotime($list['Order']['created'])); ?> </td>
                                <td class="center"> 
                                <a class="" href="<?php echo SITEURL."lab/labs/view_order/".$list['Order']['id'];?>" title="View Order"> <i class="fa fa-edit"></i> Edit </a>
                                
                                </td>
                                <td> <?php if( !in_array($list['Order']['order_status_id'], array(1,2,3))){echo $this->html->link('Delete','/lab/labs/hide_order/'.$list['Order']['id'],array('class' => 'text-red','confirm' => 'Do you want to Hide this Order?')); }?></td>
                            </tr>
                            <?php
                        }
                    }else{
                    ?>
<tr class="odd gradeX"><td colspan="9">We couldn't find any results that matched your criteria.</td></tr>
<?php }?>
