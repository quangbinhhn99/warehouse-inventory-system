<?php
  $page_title = 'Edit Vat Tu';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_vattu = find_by_id('vattu',(int)$_GET['id']);
  $groups  = find_all('vattu_groups');
  if(!$e_vattu){
    $session->msg("d","Missing user id.");
    redirect('vattu.php');
  }
?>

<?php
//Update User basic info
  if(isset($_POST['update_vattu'])) {
    $req_fields = array('tenhang','vatpham','vattu_level','soluong');
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$e_vattu['id'];
           $tenhang = remove_junk($db->escape($_POST['tenhang']));
       $vatpham = remove_junk($db->escape($_POST['vatpham']));
          $vattu_level = remove_junk($db->escape($_POST['vattu_level']));
       $soluong   = (int)$db->escape($_POST['soluong']);
            $sql = "UPDATE vattu SET tenhang ='{$tenhang}', vatpham ='{$vatpham}',vattu_level='{$vattu_level}',soluong='{$soluong}' WHERE id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Cập nhật vật tu thành công! ");
            redirect('edit_vattu.php?id='.(int)$e_vattu['id'], false);
          } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('edit_vattu.php?id='.(int)$e_vattu['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_vattu.php?id='.(int)$e_vattu['id'],false);
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
          Update <?php echo remove_junk(ucwords($e_vattu['tenhang'])); ?> Vật Tư
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_vattu.php?id=<?php echo (int)$e_vattu['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="tenhang" class="control-label">tên hàng</label>
                  <input type="name" class="form-control" name="tenhang" value="<?php echo remove_junk(ucwords($e_vattu['tenhang'])); ?>">
            </div>
            <div class="form-group">
                  <label for="vatpham" class="control-label">Vật phẩm</label>
                  <input type="text" class="form-control" name="vatpham" value="<?php echo remove_junk(ucwords($e_vattu['vatpham'])); ?>">
            </div>
            <div class="form-group">
              <label for="vattu_level">đơn vị</label>
                <select class="form-control" name="vattu_level">
                  <?php foreach ($groups as $group ):?>
                   <option <?php if($group['group_level'] === $e_vattu['vattu_level']) echo 'selected="selected"';?> value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_vattu']);?></option>
                <?php endforeach;?>
                </select>
            </div>

            <div class="form-group">
                  <label for="soluong" class="control-label">Số lượng</label>
                  <input type="text" class="form-control" name="soluong" value="<?php echo (int)(ucwords($e_vattu['soluong'])); ?>">
            </div>
            <div class="form-group clearfix">
                    <button type="submit" name="update_vattu" class="btn btn-info">Update</button>
            </div>
        </form>
       </div>
     </div>
  </div>

 </div>
<?php include_once('layouts/footer.php'); ?>
