<?php
$page_title = 'All Product';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//    page_require_level(2);
if(isset($_POST['search'])){
  $date_start = $_POST['date_start'];
  $date_end   = $_POST['date_end'];
//   echo $date_start; die();
  $request = find_by_date($date_start, $date_end);
//   echo $request[0]; die();
}else{
  
  $request = find_all('phieunhap');

}
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
          <h3>Báo cáo nhập kho</h3>
        </div>
        <div class="pull-right">
          <a href="nhapXuat.php" class="btn btn-primary">Thêm mới</a>
        </div>
      </div>

      <form method="post" >
        <div class="input-group" style="width:auto; margin: 20px 20px">
        <label>Từ ngày:
          <input type="date" name="date_start" class="form-control" value="<?php if(isset($date_start) && $date_start != null) echo $date_start;?>" ></label>
          <label>Đến ngày:
          <input type="date" name="date_end" class="form-control" value="<?php if(isset($date_end) && $date_end != null) echo $date_end;?>" ></label>
          <div class="">
            <button class="btn btn-default" type="submit" name="search">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
      </form>

      <div class="panel-body">
        <table class="table table-bordered" id="request">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px;">#</th>
              <th class="text-center" style="width: 10%;">Nhà cung cấp</th>
              <th class="text-center"> Tổng vải (m) </th>
              <th class="text-center" style="width: 10%;"> Giá (m) vải </th>
              <th class="text-center"> Tổng chỉ (chỉ) </th>
              <th class="text-center" style="width: 10%;"> Giá (cuộn) chỉ </th>
              <th class="text-center"> Tổng cúc (m) </th>
              <th class="text-center" style="width: 10%;"> Giá (cái) cúc </th>
              <th class="text-center"> Ngày nhập kho </th>
              <th class="text-center"> Ghi chú </th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;
            foreach ($request as $data) :

            ?>
              <tr>
                <?php $supplier = find_by_id('supplier', $data['idSupplier']) ?>
                <td class="text-center"><?php echo $i;
                                        $i++ ?></td>
                <td class="text-center"> <?php echo remove_junk($supplier['name']); ?></td>
                <td class="text-center"> <?php echo remove_junk($data['total_vai']); ?></td>
                <td class="text-center"> <?php echo remove_junk($data['gia_vai']); ?></td>
                <td class="text-center"> <?php echo remove_junk($data['total_chi']); ?></td>
                <td class="text-center"> <?php echo remove_junk($data['gia_chi']); ?></td>
                <td class="text-center"> <?php echo remove_junk($data['total_cuc']); ?></td>
                <td class="text-center"> <?php echo remove_junk($data['gia_cuc']); ?></td>

                <td class="text-center"> <?php echo read_date($data['date']); ?></td>
                <td class="text-center"> <?php echo remove_junk($data['note']); ?></td>
               
              </tr>
            <?php endforeach; ?>
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