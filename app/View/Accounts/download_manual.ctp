<div class="main_wrapper">
    	<div class="container">
  <ul class="breadcrumb">
        <li><a href="<?php echo SITEURL;?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo SITEURL;?>account">Account</a></li>
      </ul>
    <div class="row">
<?php echo $this->element('user_nav');?>
<div id="content" class="col-sm-9">      <h1 class="page-title">Download Manual</h1>
            <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <td class="text-left">Order</td>
              <td class="text-right">Download</td>
              
            </tr>
          </thead>
          <tbody>
<?php

if( isset($data) && !empty($data)){
	foreach ($data as $list){
		$getInstallationManual = $this->Lab->getInstallationManual($list['Product']['id']);
		if(isset($getInstallationManual['ItemDetail']['installation_manual']) && !empty($getInstallationManual['ItemDetail']['installation_manual']) && file_exists("cdn/installation_manual/".$getInstallationManual['ItemDetail']['installation_manual'])){
	?>          
<tr>
<td class="text-left"><?php echo $list['Product']['title'];?>
<br>
<?php if(!empty($list['Product']['part'])) {echo " <b>( ".$list['Product']['part']."</b>"; }?>
</td>
<td class="text-right"> 
<?php if($list['Order']['payment_by'] == 'wire'){
	if( isset($list['Order']['OrderHistory']['order_status_id']) && $list['Order']['OrderHistory']['order_status_id'] == 3){ ?>
	<a href="<?php echo SITEURL."cdn/installation_manual/".$getInstallationManual['ItemDetail']['installation_manual'];?>" target="_blank"><i class="fa fa-file-pdf-o" style="font-size: 32px;" aria-hidden="true"></i></a>	
	<?php }else{ echo "N/A";}
}
else{?>
<a href="<?php echo SITEURL."cdn/installation_manual/".$getInstallationManual['ItemDetail']['installation_manual'];?>" target="_blank"><i class="fa fa-file-pdf-o" style="font-size: 32px;" aria-hidden="true"></i></a>
<?php }?>
</td>
              
            </tr>
<?php }}}else{?>
<tr><td class="text-center" colspan="7">You have not made any previous orders!</td></tr>
<?php }?>            
                      </tbody>
        </table>
      </div>
      <div class="text-right"></div>
            <div class="buttons clearfix">
        <div class="pull-right"><a href="<?php echo SITEURL;?>account" class="btn btn-primary">Continue</a></div>
      </div>
      </div>
    </div>
</div>
</div>
