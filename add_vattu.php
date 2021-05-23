<?php
$page_title = 'Add vattu';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
$groups = find_all('vattu_groups');
$loaiSP = find_all('categories');
$vatlieu = find_all('vattu');
?>
<?php
if (isset($_POST['add_vattu'])) {

  $req_fields = array('name', 'idLoai', 'chi', 'vai', 'cuc', 'status');
  validate_fields($req_fields);

  if (empty($errors)) {
    $name   = remove_junk($db->escape($_POST['name']));
    $idLoai   = remove_junk($db->escape($_POST['idLoai']));
    $chi   = remove_junk($db->escape($_POST['chi']));
    $vai = remove_junk($db->escape($_POST['vai']));
    $cuc = remove_junk($db->escape($_POST['cuc']));
    $status = remove_junk($db->escape($_POST['status']));

    $query = "INSERT INTO product (";
    $query .= "name,idLoai,chi,vai,cuc, status";
    $query .= ") VALUES (";
    $query .= " '{$name}', '{$idLoai}', '{$chi}', '{$vai}', '{$cuc}', '{$status}'";
    $query .= ")";
    if ($db->query($query)) {
      //sucess
      $session->msg('s', "Thêm sản phẩm thành công! ");
      redirect('vattu.php', false);
    } else {
      //failed
      $session->msg('d', ' Sorry failed!');
      redirect('add_vattu.php', false);
    }
  } else {
    $session->msg("d", $errors);
    redirect('add_vattu.php', false);
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
        <span>Thêm mới</span>
      </strong>
    </div>
    <div class="panel-body">
      <div class="col-md-6">
        <form method="post" action="add_vattu.php">
          <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" name="name" placeholder="">
          </div>
          <div class="form-group">
            <label for="name">Phân loại</label>
            <select class="form-control" name="idLoai">
              <?php foreach ($loaiSP as $data) : ?>
                <option value="<?php echo $data['id']; ?>"><?php echo ($data['name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Chỉ(cuộn)</label>
            <input type="number" class="form-control" name="chi" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Vải(m)</label>
            <input type="number" class="form-control" name="vai" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Cúc(cái)</label>
            <input type="number" class="form-control" name="cuc" placeholder="">
          </div>
         
          <div class="form-group">
            <label for="name">Tình trạng</label>
            <select class="form-control" name="status">
              <option value="1">Đang sử dụng</option>
              <option value="0">Khoá</option>

            </select>
          </div>
          <!-- <div class="form-group">
              <label for="level">Đơn vị </label>
                <select class="form-control" name="level">
                  <?php foreach ($groups as $group) : ?>
                   <option value="<?php echo $group['group_level']; ?>"><?php echo ucwords($group['group_vattu']); ?></option>
                <?php endforeach; ?>
                </select>
            </div> -->

          <div class="form-group clearfix">
            <button type="submit" name="add_vattu" class="btn btn-primary">Thêm mới</button>
          </div>
        </form>
      </div>

    </div>

  </div>
</div>

<?php include_once('layouts/footer.php'); ?>