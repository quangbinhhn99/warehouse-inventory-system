<?php
  $page_title = 'All Product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
//    page_require_level(2);
$id = $_GET['id'];
  $request = find_by_id('requestproduct', $id);
  $product = find_by_id('product', $request['idPro']);


?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
        <div class="pull-left"><h3>Lệnh sản xuất sản xuất</h3></div>
         
        </div>
        <div class="panel-body">
          <table class="table table-bordered" id="request">
           
              <tr>
                <th  class="text-center" style="width: 40%;"> Mã yêu cầu</th>
                <td  class="text-center"> <?php echo remove_junk($request['id']); ?></td>
              </tr>
              <tr>
                <th  class="text-center"> Sản phẩm </th>
                <td class="text-center"> <?php echo remove_junk($product['name']); ?></td>

              </tr>
              <tr>
                <th class="text-center" style="width: 10%;"> Số lượng đặt </th>
                <td class="text-center"> <?php echo remove_junk($request['number_datHang']); ?></td>
              </tr>
              <tr>
              <tr>
                <th class="text-center" style="width: 10%;"> Số lượng cần làm </th>
                <td class="text-center"> <?php echo remove_junk($request['number']); ?></td>
              </tr>
              <th class="text-center" style="width: 10%;"> Số lượng hoàn thành </th>
                <td class="text-center"> <?php echo remove_junk($request['number_finished'] ); ?></td>
              </tr>
              <tr>
              <th class="text-center" style="width: 10%;"> Số lượng còn lại </th>
                <td class="text-center"> <?php echo ($request['number'] - $request['number_finished']); ?></td>
              </tr>
              <tr>
              <tr>
              <th class="text-center" style="width: 10%;"> Ngày bắt đầu </th>
                <td class="text-center"> <?php echo remove_junk($request['dateStart']); ?></td>
              </tr>
              <tr>
              <th class="text-center" style="width: 10%;"> Ngày hoàn thành </th>
                <td class="text-center"> <?php echo remove_junk($request['dateEnd']); ?></td>
              </tr>
              <tr>
              <th class="text-center" style="width: 10%;"> Trạng thái </th>
                <td class="text-center"> <?php if($request['status']==0) echo "Đã tiếp nhận";
                                               else if($request['status']==1) echo "Đang thực hiện";
                                               else if($request['status']==2) echo "Đã hoàn thành"; ?></td>
              </tr>
              <tr>
              <th class="text-center" style="width: 10%;"> Ghi chú </th>
                <td class="text-center"> <?php echo remove_junk($request['note']); ?></td>
              </tr>
               
              </tr>
         
        
          </tabel>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>

  <script>
    $(document).ready(function () {
        $('#request').DataTable();
    });
</script>
