<?php $user_data = $this->Session->read('userData');
$imgPath = 'no-profile-image.jpg';
if (isset($user_data['UserImage']) && !empty($user_data['UserImage'])) {
  $imgPath = $this->Lab->getUserPrimeryImage($user_data['UserImage']);
}
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <?php $url = show_image('cdn/profile', $imgPath, 160, 160, 100, 'ff', 'user', null); ?>
        <img src="<?php echo $url; ?>" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">

        <p><?php echo $user_data['User']['first_name'] . " " . $user_data['User']['last_name']; ?></p>
      </div>
    </div>
    <!-- search form -->
    <?php /*?>
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <?php */ ?>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="<?php echo SITEURL . "lab/labs"; ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
      </li>


      <?php /*?><li class="treeview"><a href="<?php echo SITEURL."lab/labs/vote";?>"><i class="fa fa-dashboard"></i> <span>Vote</span></a></li><?php */ ?>

      <li class="treeview"><a href="<?php echo SITEURL . "lab/labs/shipping"; ?>"><i class="fa fa-truck"></i> <span>Shipping</span></a></li>
      <li class="treeview"><a href="<?php echo SITEURL . "lab/labs/warranty"; ?>"><i class="fa fa-support"></i> <span>Warranty</span></a></li>
      <?php /* ?>
<li class="treeview" id="menu_user">
  <a href="#">
    <i class="fa fa-fw fa-user-plus"></i> <span>Customers</span>
    <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
  	<li><a href="<?php echo SITEURL."lab/labs/all_users";?>"><i class="fa fa-circle-o"></i>Customers</a></li>
  	<li><a href="<?php echo SITEURL."lab/labs/all_dealers";?>"><i class="fa fa-circle-o"></i>Dealers</a></li> 
  	<li><a href="<?php echo SITEURL."lab/labs/all_admin";?>"><i class="fa fa-circle-o"></i>Admins</a></li>
  </ul>
</li>
<?php */ ?>

      <li class="treeview" id="menu_order">
        <a href="#">
          <i class="fa fa-fw fa-dollar"></i> <span>Order</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo SITEURL . "lab/labs/order_users"; ?>"><i class="fa fa-circle-o"></i>Customers</a></li>
          <?php /*?><li><a href="<?php echo SITEURL."lab/labs/order_dealers";?>"><i class="fa fa-circle-o"></i>Dealers</a></li>
              	<li><a href="<?php echo SITEURL."lab/labs/all_message";?>"><i class="fa fa-circle-o"></i>Message</a></li><?php */ ?>
          <li><a href="<?php echo SITEURL . "lab/labs/archive"; ?>"><i class="fa fa-circle-o"></i>Archive</a></li>
        </ul>
      </li>
      <?php /*?>
<li class="treeview" id="menu_tuning">
<a href="#"> <i class="fa fa-shirtsinbulk"></i> <span>Tuning Box</span> <i class="fa fa-angle-left pull-right"></i> </a>
<ul class="treeview-menu">
<li><a href="<?php echo SITEURL."lab/labs/new_tuning_box";?>"><i class="fa fa-circle-o"></i>New</a></li>
<li><a href="<?php echo SITEURL."lab/labs/tuning_box";?>"><i class="fa fa-circle-o"></i>All</a></li>
</ul> </li> <?php */ ?>

      <li class="treeview" id="slider_settings">
        <a href="#"><i class="fa fa-car"></i> <span>Cars</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
        <li><a href="<?php echo SITEURL . "lab/labs/all_make"; ?>"><i class="fa fa-circle-o"></i>Make</a></li>
          <li><a href="<?php echo SITEURL . "lab/labs/all_model"; ?>"><i class="fa fa-circle-o"></i>Model</a></li>
          <li><a href="<?php echo SITEURL . "lab/labs/all_motor"; ?>"><i class="fa fa-circle-o"></i>Motor</a></li>
          <li><a href="<?php echo SITEURL . "lab/labs/exhaust_product"; ?>"> <i class="fa fa-circle-o"></i>Exhaust Product</a></li>
          <li><a href="<?php echo SITEURL . "lab/labs/all_car_details"; ?>"> <i class="fa fa-circle-o"></i>All Cars</a></li>
          <?php /*?>
              <li><a href="<?php echo SITEURL."lab/labs/add_cars";?>" > <i class="fa fa-circle-o"></i>Add New Brand</a></li>
              <li><a href="<?php echo SITEURL."lab/labs/cars";?>" > <i class="fa fa-circle-o"></i>All Brand</a></li>
              <li><a href="<?php echo SITEURL."lab/labs/add_exhaust_model";?>" > <i class="fa fa-circle-o"></i>Add New Model</a></li>
              <li><a href="<?php echo SITEURL."lab/labs/exhaust_model";?>" > <i class="fa fa-circle-o"></i>All Model</a></li>
              <?php */ ?>
          
          <?php /*?> <li><a href="<?php echo SITEURL."lab/labs/inventory";?>" > <i class="fa fa-circle-o"></i>Inventory</a></li> <?php */ ?>

        </ul>
      </li>

      <li class="treeview" id="ext_pro">
        <a href="#"><i class="fa fa-shopping-cart"></i> <span>Extra Product (shop)</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo SITEURL . "lab/labs/add_extra_product"; ?>"> <i class="fa fa-circle-o"></i>Add New Product</a></li>
          <li><a href="<?php echo SITEURL . "lab/labs/extra_product"; ?>"> <i class="fa fa-circle-o"></i>All Product</a></li>
        </ul>
      </li>

      <li class="treeview" id="menu_make">
        <a href="#"> <i class="fa fa-motorcycle"></i> <span>Motorcycle</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo SITEURL . "lab/labs/motorcycle_make"; ?>"><i class="fa fa-circle-o"></i>Make</a></li>
          <li><a href="<?php echo SITEURL . "lab/labs/motorcycle_model"; ?>"><i class="fa fa-circle-o"></i>Model</a></li>
          <li><a href="<?php echo SITEURL . "lab/labs/motorcycle_year"; ?>"><i class="fa fa-circle-o"></i>Year</a></li>
          <li><a href="<?php echo SITEURL . "lab/labs/motorcycle_exhaust"; ?>"><i class="fa fa-circle-o"></i>Exhaust</a></li>
          <li><a href="<?php echo SITEURL . "lab/labs/motorcycles"; ?>"><i class="fa fa-circle-o"></i>Motorcycles</a></li>
        </ul>
      </li>


      <li class="treeview" id="menu_templates">
        <a href="#">
          <i class="fa fa-table"></i> <span>Templates</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo SITEURL . "lab/labs/my_email_template"; ?>"><i class="fa fa-circle-o"></i>New Email</a></li>
          <li><a href="<?php echo SITEURL . "lab/labs/email_templates"; ?>"><i class="fa fa-circle-o"></i> All Email</a></li>
        </ul>
      </li>


      <li class="treeview" id="menu_insta">
        <a href="#"><i class="fa fa-table"></i> <span>Instagram</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo SITEURL . "lab/labs/insta"; ?>"><i class="fa fa-circle-o"></i>New request</a></li>
          <li><a href="<?php echo SITEURL . "lab/labs/bg_img"; ?>"><i class="fa fa-circle-o"></i>Update BG</a></li>
        </ul>
      </li>

      <?php /*?>
<li class="treeview" id="slider_settings">
<a href="#"><i class="fa fa-th"></i> <span>Promo Code</span><i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
<li><a href="<?php echo SITEURL."lab/labs/new_promo_code";?>" > <i class="fa fa-circle-o"></i>Create</a></li>
<li><a href="<?php echo SITEURL."lab/labs/all_promo";?>" > <i class="fa fa-circle-o"></i>Manage</a></li>
</ul>
</li>
            
<li class="treeview" id="slider_settings">
  <a href="#"><i class="fa fa-file-image-o"></i> <span>Country</span><i class="fa fa-angle-left pull-right"></i></a>
  <ul class="treeview-menu">
  	<li><a href="<?php echo SITEURL."lab/labs/country";?>" > <i class="fa fa-circle-o"></i>Manage Country</a></li>
  	<li><a href="<?php echo SITEURL."lab/labs/import_country";?>" > <i class="fa fa-circle-o"></i>Import</a></li>
   </ul>
</li>
<?php */ ?>

      <li class="treeview" id="slider_settings"><a href="#"><i class="fa fa-folder"></i> <span>Media</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo SITEURL . "lab/labs/media"; ?>"> <i class="fa fa-circle-o"></i>Manage Media</a></li>
          <li><a href="<?php echo SITEURL . "lab/labs/ftp"; ?>"> <i class="fa fa-circle-o"></i>FTP</a></li>
        </ul>
      </li>

      <?php /*?>
            <li class="treeview" id="menu_email">
              <a href="#">
                <i class="fa fa-inbox"></i> <span>Message</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<li><a href="<?php echo SITEURL."lab/labs/send_message";?>" > <i class="fa fa-circle-o"></i>Send</a></li>
               </ul>
            </li>
            <?php */ ?>
      <li class="treeview" id="menu_settings">
        <a href="#"><i class="fa fa-cog"></i> <span>Settings</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          
          <li><a href="<?php echo SITEURL."lab/labs/languages";?>" > <i class="fa fa-circle-o"></i>Languages</a></li>
          
          <li><a href="<?php echo SITEURL . "lab/labs/home_slider"; ?>"> <i class="fa fa-circle-o"></i>Video Slider</a></li>

          <?php /*?><li><a href="<?php echo SITEURL . "lab/labs/new_releases"; ?>"> <i class="fa fa-circle-o"></i>New Releases</a></li><?php */?>
          <li><a href="<?php echo SITEURL . "lab/labs/settings"; ?>"> <i class="fa fa-circle-o"></i>Setting</a></li>
          <li><a href="<?php echo SITEURL . "lab/labs/change_pwd"; ?>"><i class="fa fa-circle-o"></i> Change password</a></li>
        </ul>
      </li>

      <li class="treeview" id="menu_dealer">
        <a href="#"><i class="fa fa-gears"></i> <span>Dealer</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <?php /*?><li><a href="<?php echo SITEURL."lab/labs/membership";?>" > <i class="fa fa-circle-o"></i>Membership</a></li> <?php */ ?>
          <li><a href="<?php echo SITEURL . "lab/labs/our_dealer"; ?>"> <i class="fa fa-circle-o"></i>Our Dealer</a></li>

        </ul>
      </li>

      <li><a href="<?php echo SITEURL . "lab/labs/faq"; ?>"> <i class="fa fa-book"></i> <span>FAQs</span></a></li>




    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<script>
  $(document).ready(function() {
    <?php if (isset($MenuHead) && !empty($MenuHead)) {
      echo "$('#" . $MenuHead . "').addClass('active');";
    } ?>
    $('a[href="' + document.URL + '"]').parent().addClass('active');
    $('a[href="' + document.URL + '"]').parent().parent().parent().addClass('active');
  });
</script>