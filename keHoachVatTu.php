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
        <div class="pull-left"><h3>Kế hoạch vật tư</h3></div>
         
        </div>
        <div class="panel-body">
          <table class="table table-bordered" id="request">
           
              <tr>
                <th  class="text-center" style="width: 40%;"> Mã yêu cầu</th>
                <td  class="text-center"> <?php echo remove_junk($request['sku']); ?></td>
              </tr>
              <tr>
                <th  class="text-center"> Sản phẩm </th>
                <td class="text-center"> <?php echo remove_junk($product['name']); ?></td>

              </tr>
              <tr>
                <th  class="text-center"> Số lượng đặt </th>
                <td class="text-center"> <?php echo remove_junk($request['number_datHang']); ?></td>

              </tr>
              <tr>
                <th  class="text-center"> Số lượng cần sử dụng vật tư </th>
                <td class="text-center"> <?php echo remove_junk($request['number']); ?></td>

              </tr>
              <tr>
              <th class="text-center" style="width: 10%;"> Vải(m) </th>
                <td class="text-center"> <?php echo remove_junk($request['total_vai']); ?></td>
              </tr>
              <tr>
              <th class="text-center" style="width: 10%;"> Chỉ(cuộn) </th>
                <td class="text-center"> <?php echo remove_junk($request['total_chi']); ?></td>
              </tr>
              <tr>
              <th class="text-center" style="width: 10%;"> Cúc(chiếc) </th>
                <td class="text-center"> <?php echo remove_junk($request['total_cuc']); ?></td>
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
