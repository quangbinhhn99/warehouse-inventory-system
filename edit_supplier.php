<?php
$page_title = 'Cập nhật yêu cầu sản xuất';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
$e_group = find_by_id('supplier', (int)$_GET['id']);

?>
<?php
if (isset($_POST['update'])) {

    $req_fields = array('name', 'email', 'phone', 'address', 'status');
    validate_fields($req_fields);
    if (empty($errors)) {
        $name   = remove_junk($db->escape($_POST['name']));
        $email   = remove_junk($db->escape($_POST['email']));
        $phone = remove_junk($db->escape($_POST['phone']));
        $address   = remove_junk($db->escape($_POST['address']));
        $status = $db->escape($_POST['status']);
        
        $query  = "UPDATE supplier SET ";
        $query .= "name='{$name}',
                email='{$email}',
               phone='{$phone}',
               address='{$address}', 
                status = '{$status}' ";
        $query .= "WHERE ID='{$db->escape($e_group['id'])}'";
        $result = $db->query($query);
        if ($result && $db->affected_rows() === 1) {
            //sucess
            $session->msg('s', "Cập nhật thành công! ");
            redirect('supplier.php?id=' . (int)$e_group['id'], false);
        } else {
            //failed
            $session->msg('d', 'Lỗi cập nhật!');
            redirect('edit_supplier.php?id=' . (int)$e_group['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('edit_supplier.php?id=' . (int)$e_group['id'], false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page" style="width:80%">
    <div class="text-center">
        <h3>Edit</h3>
    </div>
    <?php echo display_msg($msg); ?>
    <form method="post" action="edit_supplier.php?id=<?php echo (int)$e_group['id']; ?>" class="clearfix">
        <div class="form-group">
            <label class="control-label">Tên nhà cung cấp</label>
            <input type="text" class="form-control" name="name"value="<?php echo $e_group['name']; ?>">
        </div>
        <div class="form-group">
            <label for="number" class="control-label">Email</label>
            <input type="email" class="form-control" name="email" id="number" value="<?php echo $e_group['email']; ?>">
        </div>
        <div class="form-group">
            <label for="number" class="control-label">SĐT:</label>
            <input type="number" name="phone" class="form-control" value="<?php echo $e_group['phone']; ?>">
        </div>
        <div class="form-group">
            <label for="number" class="control-label">Địa chỉ:</label>
            <input type="text" name="address" class="form-control" value="<?php echo $e_group['address']; ?>">
        </div>
        <div class="form-group">
            <label for="name" class="control-label">Tình trạng</label>
            <select class="form-control" name="status">
                <option <?php if ($e_group['status'] == 0) echo 'selected="selected"'; ?> value="0"><?php echo "Đang cung cấp"; ?></option>
                <option <?php if ($e_group['status'] == 1) echo 'selected="selected"'; ?> value="1"><?php echo "Tạm ngừng cung cấp"; ?></option>

                <?php ?>
            </select>
        </div>

        <div class="form-group clearfix">
            <button type="submit" name="update" class="btn btn-info">Cập nhật</button>
        </div>
    </form>
</div>

<?php include_once('layouts/footer.php'); ?>