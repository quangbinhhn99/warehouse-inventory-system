<?php
$page_title = 'Admin Home Page';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
$c_categorie     = count_by_id('categories');
$c_product       = count_by_id('requestproduct');
//  $c_sale          = count_by_id('sales');
$c_sale = total_product('requestproduct');
$c_user          = count_by_id('users');
$products_sold = 0;
$recent_products = 0;
$recent_sales = 0;
$stt1 = count_by_status('0');
$stt2 = count_by_status('1');
$stt3 = count_by_status('2');
$stt4 = count_by_status('3');

?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>

<div class="row">
  <div class="col-md-3">
    <div class="panel panel-box clearfix">
      <div class="panel-icon pull-left bg-green">
        <i class="glyphicon glyphicon-user"></i>
      </div>
      <div class="panel-value pull-right">
        <h2 class="margin-top"> <?php echo $c_user['total']; ?> </h2>
        <p class="text-muted">Users</p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-box clearfix">
      <div class="panel-icon pull-left bg-red">
        <i class="glyphicon glyphicon-list"></i>
      </div>
      <div class="panel-value pull-right">
        <h2 class="margin-top"> <?php echo $c_categorie['total']; ?> </h2>
        <p class="text-muted">Categories</p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-box clearfix">
      <div class="panel-icon pull-left bg-blue">
        <i class="glyphicon glyphicon-shopping-cart"></i>
      </div>
      <div class="panel-value pull-right">
        <h2 class="margin-top"> <?php echo $c_product['total']; ?> </h2>
        <p class="text-muted">Requests</p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-box clearfix">
      <div class="panel-icon pull-left bg-yellow">
        <i class="glyphicon glyphicon-usd"></i>
      </div>
      <div class="panel-value pull-right">
        <h2 class="margin-top"> <?php echo $c_sale['total']; ?></h2>
        <p class="text-muted">Products</p>
      </div>
    </div>
  </div>
</div>

<h2 class="bg-primary" style="padding: 10px">Đơn Hàng: </h2>

<div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $stt1['total']; ?></div>
                                        <div>Đã xác nhận!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $stt2['total']; ?></div>
                                        <div>Đang thực hiện</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $stt3['total']; ?></div>
                                        <div>Đã hoàn thành!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $stt4['total']; ?></div>
                                        <div>Đã huỷ</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
</div>



<?php include_once('layouts/footer.php'); ?>