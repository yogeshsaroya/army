<div class="main_wrapper" id="add_list">
    	<div class="container">
  <ul class="breadcrumb">
        <li><a href="<?php echo SITEURL;?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo SITEURL;?>account">Account</a></li>
      </ul>
<?php echo $this->Session->flash('msg');?>      
    <div class="row">
<?php echo $this->element('user_nav');?>
<div id="content" class="col-sm-9">	<h1 class="page-title">Address Book</h1>
<h2>Address Book Entries</h2>
<table class="table table-bordered table-hover">
<tbody>

<?php if(!empty($data)){
foreach ($data as $list){ ?> 
<tr>
          <td class="text-left">
          <?php echo $list['Address']['company']; if(!empty($list['Address']['company'])){ echo "<br>";}?><br>
          <?php echo $list['Address']['address'];?><br>
          <?php echo $list['Address']['address_2']; if(!empty($list['Address']['address_2'])){ echo "<br>";}?>
          <?php echo $list['Address']['city']." ".$list['Address']['zip'];?><br>
          <?php echo $list['Address']['state_name'];?><br>
          <?php echo $list['Address']['country_name'];?></td>
          <td class="text-right">
          <?php if($list['Address']['default_address'] == 0){?>
          <a href="<?php echo SITEURL;?>address/default/<?php echo $list['Address']['id'];?>" class="btn btn-success w100">Make Default</a> &nbsp;<?php }?> 
          <a href="<?php echo SITEURL;?>address/edit/<?php echo $list['Address']['id'];?>" class="btn btn-info w100">Edit</a>
          <br><br> 
          <a href="<?php echo SITEURL;?>address/delete/<?php echo $list['Address']['id'];?>" class="btn btn-danger w100">Delete</a></td>
        </tr>


<?php }}?>
   
              </tbody></table>
            <div class="buttons clearfix">
        <div class="pull-left"><a href="<?php echo SITEURL;?>account" class="btn btn-default">Back</a></div>
        <div class="pull-right"><a href="<?php echo SITEURL;?>address/add" class="btn btn-primary">New Address</a></div>
      </div>
      </div>
    </div>
</div>
</div>
