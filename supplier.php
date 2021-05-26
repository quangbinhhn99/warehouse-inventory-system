<?php
$page_title = 'All Product';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//    page_require_level(2);
if(isset($_POST['search'])){
  $keySearch = $_POST['keySearch'];
  // echo $keySearch; die();
  $request = find_by_name_request($keySearch);
}else{
  
  $supplier = find_all('supplier');

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
          <h3>Danh sách nhà cung cấp</h3>
        </div>
        <div class="pull-right">
          <a href="add_supplier.php" class="btn btn-primary">Thêm mới</a>
        </div>
      </div>

      <div class="panel-body">
        <table class="table table-bordered" id="request">
          <thead>
            
              <th class="text-center"> Tên nhà cung cấp </th>
              <th class="text-center"> SĐT </th>
              <th class="text-center"> Email </th>
              <th class="text-center"> Địa chỉ </th>
              <th class="text-center"> Trạng thái </th>
              <th class="text-center" style="width: 100px;"> </th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;
            foreach ($supplier as $data) :

            ?>
              <tr>
               
                <td class="text-center"> <?php echo remove_junk($data['name']); ?></td>
                <td class="text-center"> <?php echo remove_junk($data['phone']); ?></td>
                <td class="text-center"> <?php echo remove_junk($data['email']); ?></td>
                <td class="text-center"> <?php echo remove_junk($data['address']); ?></td>
                <td class="text-center"> <?php

                                          if ($data['status'] == 0) echo '<p style="color:green">Đang cung cấp</p>';
                                          else if ($data['status'] == 1) echo "<p style='color:red'>Tạm ngừng cung cấp</p>";
                                          ?></td>
             
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_supplier.php?id=<?php echo (int)$data['id']; ?>" class="btn btn-info btn-xs" title="Edit" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="delete_supplier.php?id=<?php echo (int)$data['id']; ?>" class="btn btn-danger btn-xs" title="Delete" data-toggle="tooltip">
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