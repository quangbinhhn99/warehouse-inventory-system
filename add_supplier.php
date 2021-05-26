<?php
$page_title = 'Thêm mới nhà cung cấp';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
if (isset($_POST['add_supplier'])) {

  $req_fields = array('name', 'email', 'phone', 'address', 'status');
  validate_fields($req_fields);

  if (empty($errors)) {
    $name   = remove_junk($db->escape($_POST['name']));
    $email   = remove_junk($db->escape($_POST['email']));
    $phone = remove_junk($db->escape($_POST['phone']));
    $address   = remove_junk($db->escape($_POST['address']));
    $status = $db->escape($_POST['status']);
   
    $query = "INSERT INTO supplier (";
    $query .= "name, email, phone, address, status";
    $query .= ") VALUES (";
    $query .= "'{$name}', '{$email}', '{$phone}', '{$address}' , '{$status}' ";
    $query .= ")";

    if ($db->query($query)) {

      $session->msg('s', "Thêm mới nhà cung cấp thành công! ");
      redirect('supplier.php', false);
    } else {
      //failed
      $session->msg('d', ' Sorry failed!');
      redirect('add_supplier.php', false);
    }
  } else {
    $session->msg("d", $errors);
    redirect('add_supplier.php', false);
  }
}
?>
<?php include_once('layouts/header.php'); ?>
<?php echo display_msg($msg); ?>
<div class="row">
  <div class="panel panel-default">
    <div class="panel-heading">
      <strong>
        <span class="glyphicon glyphicon-th"></span>
        <span>Thêm mới nhà cung cấp</span>
      </strong>
    </div>
    <div class="panel-body">
      <div class="col-md-6">
        <form method="post" action="add_supplier.php">
          <div class="form-group">
          <div class="form-group">
            <label for="username">Tên nhà cung cấp</label>
            <input type="text" class="form-control" name="name" placeholder="Tên nhà cung cấp">
          </div>
          <div class="form-group">
            <label for="username">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="password">SĐT</label>
            <input type="number" class="form-control" name="phone">
          </div>
          <div class="form-group">
            <label for="password">Địa chỉ</label>
            <input type="text" class="form-control" name="address">
          </div>
          <div class="form-group">
            <label for="level">Trạng thái </label>
            <select class="form-control" name="status">

              <option value="0">Đang cung cấp</option>
              <option value="1">Tạm ngừng cung cấp</option>
              
            </select>
          </div>
         
          <div class="form-group clearfix">
            <button type="submit" name="add_supplier" class="btn btn-primary">Thêm mới</button>
          </div>
        </form>
      </div>

    </div>

  </div>
</div>

<?php include_once('layouts/footer.php'); ?>