<?php $user_data = $this->Session->read('userData');
	$imgPath = 'no-profile-image.jpg';
	if(isset($user_data['UserImage']) && !empty($user_data['UserImage'])){
		$imgPath = $this->Lab->getUserPrimeryImage($user_data['UserImage']);
	}
?>
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo SITEURL;?>" target="_blank" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>S</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b> <?php echo WEBTITLE;?></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php $url = show_image('cdn/profile',$imgPath,160,160,100,'ff','user',null);?>
                  <img src="<?php echo $url;?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $_SESSION['Auth']['User']['first_name']." ".$_SESSION['Auth']['User']['last_name'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo $url;?>" class="img-circle" alt="User Image" />
                    <p><?php echo $_SESSION['Auth']['User']['first_name']." ".$_SESSION['Auth']['User']['last_name'];?> - Administrator
                      <small>Member since <?php echo date('M, Y',strtotime($_SESSION['Auth']['User']['created']));?></small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo SITEURL."lab/labs/user_profile/".$_SESSION['Auth']['User']['id'];?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                    <?php echo $this->Html->link('Sign out','/lab/users/logout',array('class'=>'btn btn-default btn-flat'));?>
                      
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                
              </li>
            </ul>
          </div>
        </nav>
      </header>
      