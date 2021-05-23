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
          <h3>Yêu cầu sản xuất</h3>
        </div>
        <div class="pull-right">
          <a href="add_request.php" class="btn btn-primary">Thêm mới</a>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered" id="request">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px;">#</th>
              <th class="text-center" style="width: 10%;"> Mã yêu cầu</th>
              <th class="text-center"> Sản phẩm </th>
              <th class="text-center" style="width: 10%;"> Số lượng </th>
              <th class="text-center"> Ngày yêu cầu </th>
              <th class="text-center"> Ngày hoàn thành </th>
              <th class="text-center"> Trạng thái </th>
              <th class="text-center"> Ghi chú </th>
              <th class="text-center"> Kế hoạch vật tư </th>
              <th class="text-center"> Lệnh sản xuất </th>
              <th class="text-center" style="width: 100px;"> </th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;
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
                <td class="text-center"> <?php echo remove_junk($data['id']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['name']); ?></td>
                <td class="text-center"> <?php echo remove_junk($data['number']); ?></td>
                <td class="text-center"> <?php echo read_date($data['dateStart']); ?></td>
                <td class="text-center"> <?php echo read_date($data['dateEnd']); ?></td>
                <td class="text-center"> <?php  
                                          if(isset($stt) && $stt!=null && $data['status']<2){
                                            echo $stt;
                                            $stt = null;
                                            }
                                            else{
                                              if ($data['status'] == 0) echo 'Đã tiếp nhận';
                                          else if ($data['status'] == 1) echo "Đang thực hiện";
                                          else if ($data['status' == 2]) echo "Đã hoàn thành";
                                            }?></td>
                <td class="text-center"> <?php echo remove_junk($data['note']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="keHoachVatTu.php?id=<?php echo (int)$data['id']; ?>" class="btn btn-xs btn-success" data-toggle="tooltip" title="detail">
                      <i class="glyphicon glyphicon-pencil"></i>
                    </a>

                  </div>
                </td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="lenhSanXuat.php?id=<?php echo (int)$data['id']; ?>" class="btn btn-xs btn-success" data-toggle="tooltip" title="detail">
                      <i class="glyphicon glyphicon-pencil"></i>
                    </a>

                  </div>
                </td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_request.php?id=<?php echo (int)$data['id']; ?>" class="btn btn-info btn-xs" title="Edit" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="delete_request.php?id=<?php echo (int)$data['id']; ?>" class="btn btn-danger btn-xs" title="Delete" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </div>
                </td>
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