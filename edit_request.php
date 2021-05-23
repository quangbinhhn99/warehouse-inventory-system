<?php
  $page_title = 'Cập nhật yêu cầu sản xuất';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_group = find_by_id('requestproduct',(int)$_GET['id']);
  $product = find_by_id('product', $e_group['idPro']);
  $products = find_all('product');
 
?>
<?php
  if(isset($_POST['update'])){

   $req_fields = array('idPro','number','number_finished', 'status', 'note' );
   validate_fields($req_fields);
   if(empty($errors)){
    $idPro   = remove_junk($db->escape($_POST['idPro']));
    $pro = find_by_id('product', $idPro);
    $number   = (int)($db->escape($_POST['number']));
    $number_finished = (int)($db->escape($_POST['number']));
    $total_vai = $number*$pro['vai'];
    $total_chi = $number*$pro['chi'];
    $total_cuc = $number*$pro['cuc'];
    $status = $db->escape($_POST['status']);
    $note = $db->escape($_POST['note']);
        $query  = "UPDATE requestproduct SET ";
        $query .= "idPro='{$idPro}',
                number='{$number}',
               number_finished='{$number_finished}',
               total_vai='{$total_vai}',
               total_chi='{$total_chi}',
               total_cuc='{$total_cuc}',
                status = '{$status}',
                note = '{$note}' ";
        $query .= "WHERE ID='{$db->escape($e_group['id'])}'";
        $result = $db->query($query);
         if($result && $db->affected_rows() === 1){
          //sucess
          $session->msg('s',"Yêu cầu đã được cập nhật! ");
          redirect('yeuCauSanXuat.php?id='.(int)$e_group['id'], false);
        } else {
          //failed
          $session->msg('d','Lỗi cập nhật!');
          redirect('edit_request.php?id='.(int)$e_group['id'], false);
        }
   } else {
     $session->msg("d", $errors);
    redirect('edit_request.php?id='.(int)$e_group['id'], false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page" style="width:80%">
    <div class="text-center">
       <h3>Edit Group</h3>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="edit_request.php?id=<?php echo (int)$e_group['id'];?>" class="clearfix">
        <div class="form-group">
              <label for="name" class="control-label">Tên sản phẩm</label>
              <select class="form-control" name="idPro">
                  <?php foreach ($products as $data ):?>
                   <option <?php if($data['id'] === $product['id']) echo 'selected="selected"';?> value="<?php echo $data['id'];?>"><?php echo ucwords($data['name']);?></option>
                <?php endforeach;?>
                </select>        
        </div>
        <div class="form-group">
              <label for="number" class="control-label">Số lượng đặt</label>
              <input type="number" class="form-control" name="number" id="number" value="<?php echo (int)$e_group['number']; ?>">
        </div>
        <div class="form-group">
              <label for="number" class="control-label">Số lượng hoàn thành</label>
              <input type="number" class="form-control" name="number_finished" id="number" value="<?php echo (int)$e_group['number_finished']; ?>">
        </div>
        <div class="form-group">
              <label for="number" class="control-label">Vải (m):</label>
              <input readonly class="form-control" value="<?php echo (int)$e_group['total_vai']; ?>">
        </div>
        <div class="form-group">
              <label for="number" class="control-label">Chỉ (cuộn):</label>
              <input readonly class="form-control" value="<?php echo (int)$e_group['total_chi']; ?>">
        </div>
        <div class="form-group">
              <label for="number" class="control-label">Cúc (chiếc):</label>
              <input readonly value="<?php echo (int)$e_group['total_cuc']; ?>">
        </div>
      
        <div class="form-group">
              <label for="name" class="control-label">Tình trạng</label>
              <select class="form-control" name="status">
                   <option <?php if($e_group['status'] == 0) echo 'selected="selected"'; ?> value="0"><?php echo "Đã tiếp nhận";?></option>
                   <option <?php if($e_group['status'] == 1) echo 'selected="selected"'; ?> value="1"><?php echo "Đang thực hiện";?></option>
                   <option <?php if($e_group['status'] == 2) echo 'selected="selected"'; ?> value="2"><?php echo "Đã hoàn thành";?></option>

                <?php ?>
                </select>        
        </div>
          <div class="form-group">
                <label for="note">Ghi chú</label><br>
               <textarea name="note" id="note" cols="110" rows="5"><?php echo $e_group['note']; ?></textarea>
            </div>
            <div class="form-group clearfix">
                <button type="submit" name="update" class="btn btn-info">Cập nhật</button>
        </div>
    </form>
</div>

<?php include_once('layouts/footer.php'); ?>
