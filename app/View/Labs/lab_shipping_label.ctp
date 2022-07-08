<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Shipping label</title>
  <link rel="shortcut icon" href="<?php echo SITEURL; ?>favicon.ico" type="image/x-icon" />
  <!-- Bootstrap 3.3.4 -->
  <link href="<?php echo SITEURL . "lab_root/"; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="<?php echo SITEURL . "lab_root/"; ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo SITEURL . "lab_root/"; ?>dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
</head>

<style type="text/css" media="print">
  @page {
    size: auto;
    /* auto is the initial value */
    margin: 30px;
    /* this affects the margin in the printer settings */
  }
  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    line-height: 30px !important
    
}
</style>
<style>
  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    line-height: 30px !important
    
}
</style>

<body onload="window.print();">
  <div class="wrapper">
    <!-- Main content -->
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <b>Invoice #<?php echo $d['Order']['order_number']; ?></b>
            <small class="pull-right">Date: <?php echo date('m/d/y h:i A', strtotime($d['Order']['created'])); ?></small>
          </h2>
        </div><!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Armytrix Automotive</strong><br>
            Email: info@armytrix.com
          </address>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <strong> Shipping To </strong>
          <address>
            <?php echo $d['Order']['first_name'] . " " . $d['Order']['last_name']; ?><br>
            <?php echo $d['Order']['email']; ?> <br>
            <?php echo $d['Order']['phone']; ?><br>

            <?php if (!empty($d['Order']['shipping_company'])) {
              echo $d['Order']['shipping_company'] . "<br>";
            } ?>
            <?php echo $d['Order']['shipping_address'] . " " . $d['Order']['shipping_address_2']; ?><br>
            <?php echo $d['Order']['shipping_city'] . " " . $d['Order']['shipping_zip']; ?><br>
            <?php echo $d['Order']['shipping_state']; ?><br>
            <?php echo $d['Order']['shipping_country']; ?> <br>

          </address>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <strong>Billing Address</strong><br>
          <address>
            <?php if (!empty($d['Order']['billing_company'])) {
              echo $d['Order']['billing_company'] . "<br>";
            } ?>
            <?php echo $d['Order']['billing_address'] . " " . $d['Order']['billing_address_2']; ?><br>
            <?php echo $d['Order']['billing_city'] . " " . $d['Order']['billing_zip']; ?><br>
            <?php echo $d['Order']['billing_country']; ?><br>
            <?php echo $d['Order']['billing_state']; ?>
          </address>
          <br>
          <b>Payment By :</b> <?php if ($d['Order']['payment_by'] == 'paypal') {
                                echo "PayPal";
                              } elseif ($d['Order']['payment_by'] == 'wire') {
                                echo "Bank Transfer ";
                              } elseif ($d['Order']['payment_by'] == 'cc') {
                                echo "Credit Card";
                              } ?><br>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Product Name</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Price</th>
                <th class="text-center">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <?php if (isset($d['OrderItem']) && !empty($d['OrderItem'])) {
                foreach ($d['OrderItem'] as $oList) { ?>
                  <tr>
                    <td><?php echo $oList['Product']['title'] . ' ' . $oList['size'];
                        if (in_array($oList['Product']['type'], array(2, 3, 5))) {
                          echo " <b>( Part Number : " . $oList['Product']['part'] . ") - " . strtoupper($oList['Product']['material']) . " </b><br>";
                          echo $oList['Product']['Brand']['name'] . "/" . $oList['Product']['Model']['name'] . "/" . $oList['Product']['Motor']['name'];
                        } else if (in_array($oList['Product']['type'], array(6))) {
                          echo " <b>( Part Number : " . $oList['Product']['part'] . ") - " . strtoupper($oList['Product']['material']) . " </b><br>";
                          if (!empty($oList['Product']['full_part'])) {
                            echo " <b>( Other Part Number : " . $oList['Product']['full_part'] . ") - " . strtoupper($oList['Product']['full_material']) . " </b><br>";
                          }
                          echo $oList['Product']['MotorcycleMake']['name'] . "/" . $oList['Product']['MotorcycleModel']['name'] . "/" . $oList['Product']['MotorcycleYear']['year_from'] . " - " . (!empty($oList['Product']['MotorcycleYear']['year_from']) ? $oList['Product']['MotorcycleYear']['year_from'] : "present");
                        }
                        ?></td>
                    <td class="text-center"><?php echo $oList['quantity']; ?></td>
                    <td class="text-center"><?php echo "$" . $oList['amount']; ?></td>
                    <td class="text-center"><?php if ($oList['is_gift'] == 0) {
                                              echo "$" . $oList['amount'];
                                            } else {
                                              echo "$00.00";
                                            } ?></td>
                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <p class="lead">Payment Methods: <b><?php if ($d['Order']['payment_by'] == 'paypal') {
                                                echo "PayPal";
                                              } elseif ($d['Order']['payment_by'] == 'wire') {
                                                echo "Bank Transfer ";
                                              } elseif ($d['Order']['payment_by'] == 'cc') {
                                                echo "Credit Card";
                                              } ?></b></p>
          <?php if (!empty($d['Order']['transaction_id'])) { ?><p class="lead">Transaction ID:<b> <?php echo $d['Order']['transaction_id']; ?></b></p><?php } ?>
          <p class="lead">VIN Number:<b> <?php echo strtoupper($d['Order']['vin_number']); ?></b></p>


        </div>
        <div class="col-xs-6">

          <div class="table-responsive text-right">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal (+)</th>
                <td>$<?php echo $d['Order']['total_amount']; ?></td>
              </tr>
              <tr>
                <th>Shipping Cost (+)</th>
                <td>$<?php echo $d['Order']['shipping_cost']; ?></td>
              </tr>
              <tr>
                <th>Shipping Fee Discount (-)</th>
                <td>$<?php echo $d['Order']['discount']; ?></td>
              </tr>
              <tr>
                <th>Import duty (+)</th>
                <td>$<?php echo $d['Order']['import_duty']; ?></td>
              </tr>
              <tr>
                <th>VAT (+)</th>
                <td>$<?php echo $d['Order']['vat']; ?></td>
              </tr>
              <tr>
                <th>Warranty Extension (+)</th>
                <td>$<?php echo num_2($d['Order']['warranty_extension']); ?></td>
              </tr>
              <tr>
                <th>Grand Total</th>
                <td>$<?php echo $d['Order']['grand_total']; ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div></body>
</html>