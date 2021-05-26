<?php
$page_title = 'Thêm mới yêu cầu sản xuất';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
$products = find_all('product');

?>
<?php
if (isset($_POST['add_request'])) {

  $req_fields = array('sku', 'idPro', 'number', 'dateStart', 'dateEnd', 'status');
  validate_fields($req_fields);

  if (empty($errors)) {
    $sku   = remove_junk($db->escape($_POST['sku']));
    $idPro   = remove_junk($db->escape($_POST['idPro']));
    $product = find_by_id('product', $idPro);
    $number   = remove_junk($db->escape($_POST['number']));
    $number_finished = 0;
    $total_chi = $number * $product['chi'];
    $total_vai = $number * $product['vai'];
    $total_cuc = $number * $product['cuc'];
    $dateStart   = ($db->escape($_POST['dateStart']));
    $dateEnd = $db->escape($_POST['dateEnd']);
    $status = $db->escape($_POST['status']);
    $note = $db->escape($_POST['note']);
    $query = "INSERT INTO requestproduct (";
    $query .= "sku, idPro, number_datHang, number, number_finished, total_vai, total_chi, total_cuc ,dateStart,dateEnd, status, note";
    $query .= ") VALUES (";
    $query .= "'{$sku}', '{$idPro}', '{$number}','{$number}', '{$number_finished}' , '{$total_vai}' , '{$total_chi}', '{$total_cuc}', '{$dateStart}', '{$dateEnd}', '{$status}', '{$note}'";
    $query .= ")";

    if ($db->query($query)) {

      $session->msg('s', "Yêu cầu sản xuất thành công! ");
      redirect('yeuCauSanXuat.php', false);
    } else {
      //failed
      $session->msg('d', ' Sorry failed!');
      redirect('add_request.php', false);
    }
  } else {
    $session->msg("d", $errors);
    redirect('add_request.php', false);
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
        <span>Thêm mới yêu cầu sản xuất</span>
      </strong>
    </div>
    <div class="panel-body">
      <div class="col-md-6">
        <form method="post" action="add_request.php">
          <div class="form-group">
          <div class="form-group">
            <label for="username">Mã đơn</label>
            <input type="text" class="form-control" name="sku" placeholder="Mã đơn sản xuất">
          </div>
            <label for="name">Tên sản phẩm</label>
            <select class="form-control" name="idPro">
              <?php foreach ($products as $data) : ?>
                <option value="<?php echo $data['id']; ?>"><?php echo ($data['name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="username">Số lượng</label>
            <input type="number" class="form-control" name="number" placeholder="Số lượng">
          </div>
          <div class="form-group">
            <label for="password">Ngày bắt đầu</label>
            <input type="date" class="form-control" name="dateStart">
          </div>
          <div class="form-group">
            <label for="password">Ngày kết thúc</label>
            <input type="date" class="form-control" name="dateEnd">
          </div>
          <div class="form-group">
            <label for="level">Trạng thái </label>
            <select class="form-control" name="status">

              <option value="0">Đã tiếp nhận</option>
              <option value="1">Đang thực hiện</option>
              <option value="2">Đã hoàn thành</option>
              <option value="3">Đã huỷ</option>
            </select>
          </div>
          <div class="form-group">
            <label for="note">Ghi chú</label>
            <textarea name="note" id="note" cols="65" rows="5"></textarea>
          </div>
          <div class="form-group clearfix">
            <button type="submit" name="add_request" class="btn btn-primary">Thêm mới</button>
          </div>
        </form>
      </div>

    </div>

  </div>
</div>

<?php include_once('layouts/footer.php'); ?>