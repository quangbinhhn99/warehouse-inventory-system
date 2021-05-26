<?php
$page_title = 'Phân bổ sản phẩm';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
$e_group = find_by_id('requestproduct', (int)$_GET['id']);
$product = find_by_id('product', $e_group['idPro']);
$productKho = check_product_kho($e_group['idPro']);

?>
<?php
if (isset($_POST['update'])) {

    $req_fields = array('number_phanBo');
    validate_fields($req_fields);
    if (empty($errors) && $number_phanBo <= $productKho['inventory']) {

        $number_phanBo = (int)($db->escape($_POST['number_phanBo']));
        $number_datHang = $e_group['number_datHang'];
        $number = $number_datHang - $number_phanBo;
        $total_chi = $number * $product['chi'];
        $total_vai = $number * $product['vai'];
        $total_cuc = $number * $product['cuc'];

        $inventory = $productKho['inventory'] -  $number_phanBo;

        $query  = "UPDATE requestproduct SET ";
        $query .= "number='{$number}', total_vai ='{$total_vai}', total_chi='{$total_chi}', total_cuc='{$total_cuc}' ";
        $query .= "WHERE ID='{$db->escape($e_group['id'])}'";
        $result = $db->query($query);

        $query  = "UPDATE kho SET ";
        $query .= "inventory='{$inventory}'";
        $query .= "WHERE ID='{$db->escape($productKho['id'])}'";
        $result = $db->query($query);

        if ($result && $db->affected_rows() === 1) {
            //sucess
            $session->msg('s', "Success! ");
            redirect('yeuCauSanXuat.php?id=' . (int)$e_group['id'], false);
        } else {
            //failed
            $session->msg('d', 'Lỗi cập nhật!');
            redirect('phanBo.php?id=' . (int)$e_group['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('phanBo.php?id=' . (int)$e_group['id'], false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page" style="width:80%">
    <div class="text-center">
        <h3>Phân bổ sản phẩm</h3>
    </div>
    <?php echo display_msg($msg); ?>
    <?php if (!isset($productKho['inventory']) || $productKho['inventory'] == null)  echo "Sản phẩm không có hàng tồn kho!";
    else { ?>
        <form method="post" action="phanBo.php?id=<?php echo (int)$e_group['id']; ?>" class="clearfix">
            <div class="form-group">
                <label for="name" class="control-label">Tên sản phẩm</label>
                <input class="form-control" readonly value="<?php echo $product['name']; ?>">

            </div>
            <div class="form-group">
                <label for="number" class="control-label">Số lượng tồn kho</label>
                <input readonly class="form-control" value="<?php echo (int)$productKho['inventory']; ?>">
            </div>
            <div class="form-group">
                <label for="number" class="control-label">Số lượng phân bổ: </label>
                <input type="number" class="form-control" name="number_phanBo" id="number" value="<?php echo (int)$e_group['number_phanBo']; ?>">
            </div>
            <div class="form-group clearfix">
                <button type="submit" name="update" class="btn btn-info">Cập nhật</button>
            </div>
        </form>
    <?php } ?>
</div>

<?php include_once('layouts/footer.php'); ?>