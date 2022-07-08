<?php if(isset($id) && $id == 'success' ){
    echo $this->html->css(['od'],['block' => 'cssTop']);
    $order_status = $this->Lab->order_status(); ?>
<!-- Event snippet for Website sale conversion page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-982355893/HkeICPqX0MkCELWfttQD',
      'transaction_id': ''
  });
</script>
<div class="invoice-page">
<div class="container">
<div class="customer-details sec-pad">
	<div class="row flex-box just-strch">
<div class="col-sm-7">
<div class="custmer-dtls">
<span class="dsp-block">Thank you for your order.</span>    
<span class="dsp-block">Details are below. <br>
We'll email you when your order ships.</span>
<span class="dsp-block">We ship items as soon as they're ready.</span>
<span class="dsp-block">We recommend hanging on to this email until  you've received everything in your order. </span>
<span class="dsp-block">And feel free to contact us with any questions.</span>
<span class="dsp-block">Thanks again,<br>
ARMYTRIX  CORP.</span>
</div>
</div>
		
<div class="col-sm-5 bg-gray">
	<h3>Ship to</h3>
	<address>
		<?php echo $data['Order']['first_name']." ".$data['Order']['first_name'];?><br>
<?php echo $data['Order']['shipping_company'];?><br>
<?php echo $data['Order']['shipping_address']." ".$data['Order']['shipping_address_2'];?><br>
<?php echo $data['Order']['shipping_city'].", ".$data['Order']['shipping_state']." ".$data['Order']['shipping_zip'];?><br>
<?php echo $data['Order']['shipping_country'];?><br>
<?php echo $data['Order']['phone'];?><br>
<?php echo $data['Order']['email'];?>
</address>
<div class="ordr-viw"><h4>ORDER NUMBER:</h4> <p><?php echo $data['Order']['order_number'];?></p> </div>
<div class="ordr-viw"><h4>ORDER DATE:</h4><p><?php echo date('m/d/Y',strtotime($data['Order']['created']));?></p></div>
<div class="ordr-viw"><h4>ORDER Status:</h4><p><?php if($data['Order']['order_status_id'] == 0){ echo "In progress"; } elseif( isset( $order_status[$data['Order']['order_status_id']] )){ echo $order_status[$data['Order']['order_status_id']]; } ?></p></div>

<?php 
if ( !empty($data['Order']['tracking']) && !empty($data['Order']['tracking_number'])){?>
<div class="ordr-viw"><h4>Tracking Number:</h4> <p><?php echo $this->html->link($data['Order']['tracking_number'],$data['Order']['tracking']);?></p> </div>
<?php }?>

	</div>
	</div>
</div>
<h1 class="order-revew"><span>ORDER REVIEW</span></h1>
<div class="product-dlts-box sec-pad">
<?php 

if ( isset($data['OrderItem']) && !empty($data['OrderItem']) ){
    foreach ( $data['OrderItem'] as $list){
        $pImg = new_show_image('cdn/no_image_available.jpg',300,150,100,'ff',null);
        if( in_array($list['Product']['type'], [2,3,5,6]) && isset($list['Product']['Library']['full_path']) && !empty($list['Product']['Library']['full_path'])){
            $pImg = new_show_image('cdn/'.$list['Product']['Library']['full_path'],300,150,100,'ff',null); }
            elseif($list['Product']['type'] == 4){
                $abc = explode(',',$list['Product']['extra_photos']);
                $get_path = null;
                if(isset($abc[0]) && !empty($abc[0])){ $get_path = $this->Lab->getImage($abc[0]); }
                if(isset($get_path)){ $pImg = new_show_image('cdn/'.$get_path,300,150,100,'ff',null); }
                else{ $pImg = new_show_image('cdn/no_image_available.jpg',300,150,100,'ff',null); }
            }
            
            if ( in_array($list['Product']['type'], [2,3,5] ) ){ 
                echo '<div class="row flex-box align-cnter"> <div class="col-sm-6"> <img src="'.$pImg.'" alt="product image"> </div> <div class="col-sm-6"> <div class="prodt-dtls"><h3>'.$list['Product']['Brand']['name'].' '.$list['Product']['Model']['name'].' '.$list['Product']['Motor']['name'].'</h3><p> '.$list['Product']['title'].' </p></div> </div></div><hr>';
            }
            elseif ( in_array($list['Product']['type'], [6] ) ){ 
                echo '<div class="row flex-box align-cnter"> <div class="col-sm-6"> <img src="'.$pImg.'" alt="product image"> </div> <div class="col-sm-6"> <div class="prodt-dtls"><h3>'.$list['Product']['MotorcycleMake']['name'].' '.$list['Product']['MotorcycleModel']['name'].' '.$list['Product']['MotorcycleYear']['year_from'].' - '.(!empty($list['Product']['MotorcycleYear']['year_to'])? $list['Product']['MotorcycleYear']['year_to'] : 'present').'</h3><p> '.$list['Product']['title'].' </p></div> </div></div><hr>';
            }
            elseif ( in_array($list['Product']['type'], [4] ) ){ 
                echo '<div class="row flex-box align-cnter"> <div class="col-sm-6"> <img src="'.$pImg.'" alt="product image"> </div> <div class="col-sm-6"> <div class="prodt-dtls"><h3>'.$list['Product']['title'].' '.$list['size'].'</h3><p>  </p></div> </div> </div><hr>';
           }
    }
}
?>
</div>
<div class="invoice-total-box sec-pad">
<div class="row">
<div class="col-sm-6"></div>
<div class="col-sm-6">
<div class="flex-box flex-unwrap invoice-total"> <div class="txt-bx">Subtotal (+)</div> <div class="price-boxx">USD $<?php echo num_2($data['Order']['total_amount']);?></div> </div>
<div class="flex-box flex-unwrap invoice-total"> <div class="txt-bx">Shipping Cost (+)</div> <div class="price-boxx">USD $<?php echo num_2($data['Order']['shipping_cost']);?></div> </div>
<div class="flex-box flex-unwrap invoice-total"> <div class="txt-bx">Shipping Fee Discount (-)</div> <div class="price-boxx">USD $<?php echo num_2($data['Order']['discount']);?></div> </div>
<div class="flex-box flex-unwrap invoice-total"> <div class="txt-bx">Warranty Extension (+)</div> <div class="price-boxx">USD $<?php echo num_2($data['Order']['warranty_extension']);?></div> </div>
<div class="flex-box flex-unwrap invoice-total"> <div class="txt-bx"><b>Grand Total	</b></div> <div class="price-boxx">USD $<?php echo num_2($data['Order']['grand_total']);?></div> </div>
</div>
</div>
</div>
		<!-- end of total box -->

		<div class="contact-box sec-pad">
			<div class="row">
				<div class="col-sm-12">
					<a href="<?php echo SITEURL;?>contact" title="" >
					<div class="cntct-dlts">
						<h2>CAN  WE  HELP  ?</h2>
						<h6>Contact us <img src="<?php echo SITEURL;?>v/em/right-arrow.png" alt="arrow-images"></h6>
					</div>
				</a>
				</div>
			</div>
		</div>

	</div>
	<!-- end of container -->

	<div class="footer-box">
		<div class="bg-black">
			<div class="container">
				<p>© <?php echo date('Y');?> ARMYTRIX All Rights Reserved.</p>
			</div>
		</div>

	</div>

</div>
<?php  }
elseif(isset($id) && $id == 'fail' ){?>

<div class="col-md-12" id="msg_page">
<div class="fw_content_wrapper" id="pad-set-bd">
<div class="fw_content_padding">
<div class="container">


	<div class="row text-center">
        <div class="col-sm-10 col-sm-offset-1">
        <br><br> <h2 style="color:#0fad00">Failed</h2>
        <img src="<?php echo SITEURL;?>image/error.png">
        <h3>Failed - your order is not confirmed! </h3>
        <h2>Please check for the following common mistakes and omissions</h2>
        
         <p style="font-size:16px;color:#5C5C5C;    text-align: left;">
          1. Please check your credit card limit with your bank!<br>
         2. Please check with your bank if your credit card is enable for online shopping!<br>
         3. Your name may contain no more than 20 characters!<br>
        4. Your name must not contain any special characters, symbols or spaces!<br>
         5. Your phone number may contain no more than 20 number characters!<br>
         6. Your phone number must not contain any special characters, symbols or spaces!<br>
        </p>
        
        
    <br><br>
</div></div>
</div>


</div>
</div></div>

<div class="fixed_bg bg1"></div>
<style>
h2 {
    font-size: 20px;
} 
@media (max-width:900px) {

#msg_page img{border:0;width:auto;height:auto;}
#pad-set-bd h3, #pad-set-bd p{ line-height: inherit !important;}

}
#pad-set-bd h3{
    font-size: 20px;
    line-height: 65px;
}
#pad-set-bd p{
    font-size: 13px;
    line-height: 36px;
}
</style>

<?php }?>        
