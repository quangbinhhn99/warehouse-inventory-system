<?php
  $page_title = 'Edit kho';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_kho = find_by_id('kho',(int)$_GET['id']);
  if(!$e_kho){
    $session->msg("d","Missing user id.");
    redirect('kho.php');
  }
  $tensp = find_all_sp();
?>

<?php
//Update User basic info
  if(isset($_POST['update_kho'])) {
    $req_fields = array('tensp','tenhang','vatpham');
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$e_kho['id'];
              $tensp = remove_junk($db->escape($_POST['tensp']));
           $tenhang = remove_junk($db->escape($_POST['tenhang']));
       $vatpham = remove_junk($db->escape($_POST['vatpham']));
         
            $sql = "UPDATE kho SET soluong_kho ='{$tenhang}', vai_kho ='{$vatpham}',kho_level='1',ten_sp = '{$tensp}' WHERE id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Cập nhật kho thành công! ");
            redirect('edit_kho.php?id='.(int)$e_kho['id'], false);
          } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('edit_kho.php?id='.(int)$e_kho['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_kho.php?id='.(int)$e_kho['id'],false);
    }
  }
?>
<?php include_once('layouts/header.php'); ?>
 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-6">
     <div class="panel panel-default">
       <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Update KHo
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_kho.php?id=<?php echo (int)$e_kho['id'];?>" class="clearfix">
             <div class="form-group">
              <label for="tensp">Tên sản phẩm</label>
                <select class="form-control" name="tensp">
                  <?php foreach ($tensp as $group ):?>
                   <option value="<?php echo $group['tensp'];?>"><?php echo ucwords($group['tensp']);?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                  <label for="tenhang" class="control-label">Số lượng tồn kho</label>
                  <input type="name" class="form-control" name="tenhang" value="<?php echo remove_junk(ucwords($e_kho['soluong_kho'])); ?>">
            </div>
            <div class="form-group">
                  <label for="vatpham" class="control-label">Vải tồn kho(m)</label>
                  <input type="text" class="form-control" name="vatpham" value="<?php echo remove_junk(ucwords($e_kho['vai_kho'])); ?>">
            </div>
            
            <div class="form-group clearfix">
                    <button type="submit" name="update_kho" class="btn btn-info">Update</button>
            </div>
        </form>
       </div>
     </div>
  </div>

 </div>
<?php include_once('layouts/footer.php'); ?>
