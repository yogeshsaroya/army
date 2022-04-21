
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Version 2.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITEURL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
          <?php /*?>
                      <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Customers Registrations</span>
                  <span class="info-box-number"><?php echo $user;?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          
                      <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-user-secret"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Dealers Registrations</span>
                  <span class="info-box-number"><?php echo $dealer;?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
<?php */?>            
            
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Product</span>
                  <span class="info-box-number"><?php echo $pro;?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            
     <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Sales</span>
                  <span class="info-box-number"><?php echo $ord;?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            
            


            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>



          </div><!-- /.row -->
          <div class="row">
            <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $tot_ord;?></h3>
                  <p>All Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a class="small-box-footer" href="<?php echo SITEURL.'lab/labs/order_users';?>">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $ext_pro;?></h3><p>Extra Product</p>
                </div>
                <div class="icon">
                  <i class="fa fa-inbox"></i>
                </div>
                <a class="small-box-footer" href="<?php echo SITEURL."lab/labs/extra_product"?>">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $cat_pro;?></h3>
                  <p>Catback Exhaust</p>
                </div>
                <div class="icon">
                  <i class="fa  fa-gear"></i>
                </div>
                <a class="small-box-footer" href="<?php echo SITEURL."lab/labs/exhaust_product"?>">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $cata_pro;?></h3>
                  <p>Catalytic Converter</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a class="small-box-footer" href="<?php echo SITEURL."lab/labs/exhaust_product"?>">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->            
            
          </div>

          <!-- Main row -->
          <div class="row">
            

            <div class="col-md-12">
              <!-- Info Boxes Style 2 -->
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa  fa-dollar"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Order</span>
                  <span class="info-box-number"><?php echo "$".num_2($grand_total[0][0]['total']);?></span>
                  
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->

              <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-paypal"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Payment by Paypal</span>
                  <span class="info-box-number"><?php echo "$".num_2($paypal_total[0][0]['total']);?></span>
                  
                  
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-credit-card"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Payment by Credit Card</span>
                  <span class="info-box-number"><?php echo "$".num_2($cc_total[0][0]['total']);?></span>
                  
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->

              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
