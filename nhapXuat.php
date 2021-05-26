<?php
$page_title = 'Cập nhật yêu cầu sản xuất';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
$supplier = find_all('supplier');
$vattu = find_all('vattu');


?>
<?php
if (isset($_POST['add'])) {

    $req_fields = array('idSupplier', 'date');
    validate_fields($req_fields);
    if (empty($errors)) {
        $idSupplier   = remove_junk($db->escape($_POST['idSupplier']));
        $total_vai = $_POST['total_vai'];
        $total_chi = $_POST['total_chi'];
        $total_cuc = $_POST['total_cuc'];
        $gia_vai = $_POST['gia_vai'];
        $gia_chi = $_POST['gia_chi'];
        $gia_cuc = $_POST['gia_cuc'];
        $date = $db->escape($_POST['date']);
        $note = $db->escape($_POST['note']);

        $query = "INSERT INTO phieunhap (";
        $query .= "idSupplier, total_vai, total_chi, total_cuc, gia_vai, gia_chi, gia_cuc, date, note";
        $query .= ") VALUES (";
        $query .= "'{$idSupplier}', '{$total_vai}', '{$total_chi}', '{$total_cuc}' ,  '{$gia_vai}', '{$gia_chi}', '{$gia_cuc}', '{$date}', '{$note}' ";
        $query .= ")";
        $result = $db->query($query);
        if ($result && $db->affected_rows() === 1) {
            //sucess
            $session->msg('s', "Thêm mới thành công! ");
            redirect('nhapXuat.php', false);
        } else {
            //failed
            $session->msg('d', 'Lỗi thêm mới!');
            redirect('nhapXuat.php', false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('nhapXuat.php', false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page" style="width:80%">
    <div class="text-center">
        <h3>Phiếu nhập</h3>
    </div>
    <?php echo display_msg($msg); ?>
    <form method="post" action="nhapXuat.php" class="clearfix">
        <div class="form-group">
            <label for="name" class="control-label">Nhà cung cấp</label>
            <select class="form-control" name="idSupplier">
                <?php foreach ($supplier as $data) : ?>
                    <option value="<?php echo $data['id']; ?>"><?php echo ucwords($data['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="name" class="control-label">Vải (m) nhập
                <input type="number" class="form-control" name="total_vai" id="number"></label>
            <label for="name" class="control-label">Giá nhập/m
                <input type="number" class="form-control" name="gia_vai" id="number"></label>

        </div>
        <div class="form-group">
            <label for="number" class="control-label">Chỉ (cuộn) nhập:
                <input type="text" class="form-control" name="total_chi"></label>
            <label for="name" class="control-label">Giá nhập/cuộn
                <input type="number" class="form-control" name="gia_chi" id="number"></label>
        </div>
        <div class="form-group">
            <label for="number" class="control-label">Cúc (chiếc) nhập:
                <input class="form-control" type="number" name="total_cuc"></label>
            <label for="name" class="control-label">Giá nhập/chiếc
                <input type="number" class="form-control" name="gia_cuc" id="number"></label>
        </div>
        <div class="form-group">
            <label>Ngày nhập</label><br>
            <input class="form-control" type="date" name="date">
        </div>
        <div class="form-group">
            <label for="note">Ghi chú</label><br>
            <textarea name="note" id="note" cols="110" rows="5"></textarea>
        </div>

        <div class="form-group clearfix">
            <button type="submit" name="add" class="btn btn-info">Thêm mới</button>
        </div>
    </form>
</div>

<?php include_once('layouts/footer.php'); ?>