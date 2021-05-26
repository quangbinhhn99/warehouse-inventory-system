<?php
$page_title = 'All Product';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//    page_require_level(2);
$request = find_all('requestproduct');

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <div class="pull-left">
          <h3>Kế hoạch vật tư</h3>
        </div>
      
      </div>
      <div class="panel-body">
        <table class="table table-bordered" id="request">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px;">#</th>
              <th class="text-center" style="width: 10%;"> Mã đơn</th>
              <th class="text-center"> Sản phẩm </th>
              <th class="text-center" style="width: 10%;"> Số lượng </th>
              <th class="text-center"> Tổng vải (m)</th>
              <th class="text-center"> Tổng chỉ (cuộn) </th>
              <th class="text-center"> Tổng cúc (cái) </th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;
            $sum_vai =0;
            $sum_chi = 0;
            $sum_cuc = 0;
            foreach ($request as $data) :
            $today = strtotime(date('Y/m/d'));
           
            if($today > strtotime($data['dateEnd'])){
              $stt = "<p style='color:red;'>Quá hạn hoàn thành!</p>";
            }
             ?>
              <tr>
                <?php $product = find_by_id('product', $data['idPro']) ?>
                <td class="text-center"><?php echo $i;
                                        $i++ ?></td>
                <td class="text-center"> <?php echo remove_junk($data['sku']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['name']); ?></td>
                <td class="text-center"> <?php echo remove_junk($data['number']); ?></td>
                <td class="text-center"> <?php echo ($data['total_vai']);  $sum_vai += $data['total_vai'];?></td>
                <td class="text-center"> <?php echo ($data['total_chi']); $sum_chi += $data['total_chi']; ?></td>
                <td class="text-center"> <?php echo ($data['total_cuc']); $sum_cuc += $data['total_cuc']; ?></td>

              </tr>
            <?php endforeach; ?>
            <tr>
            <th colspan="4"  class="text-center">TỔNG:</th>
            <td  class="text-center"><?php echo $sum_vai  ." (m)"; ?></td>
            <td  class="text-center"><?php echo $sum_chi ." (cuộn)"; ?></td>
            <td  class="text-center"><?php echo $sum_cuc . " (cái)"; ?></td>
            </tr>
           
          </tbody>
          </tabel>
      </div>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>

<script>
  $(document).ready(function() {
    $('#request').DataTable();
  });
</script>