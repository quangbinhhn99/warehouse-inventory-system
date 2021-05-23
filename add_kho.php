<?php
  $page_title = 'Add kho';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $group = find_all('product');
  $tensp = find_all_sp();
?>
<?php
  if(isset($_POST['add_kho'])){

   $req_fields = array('tensp','full-name','username');
   validate_fields($req_fields);

   if(empty($errors)){
      $tensp = remove_junk($db->escape($_POST['tensp']));
      $tenhang   = remove_junk($db->escape($_POST['full-name']));
       $vatpham   = remove_junk($db->escape($_POST['username']));
      
        $query = "INSERT INTO kho (";
        $query .="ten_sp,soluong_kho,vai_kho,kho_level";
        $query .=") VALUES (";
        $query .=" '{$tensp}', '{$tenhang}', '{$vatpham}',1";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"Them kho thanh cong! ");
          redirect('add_kho.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry failed!');
          redirect('add_kho.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_kho.php',false);
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
          <span>Add kho</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_kho.php">
            
              <div class="form-group">
              <label for="tensp">Tên sản phẩm</label>
                <select class="form-control" name="tensp">
                  <?php foreach ($group as $data ):?>
                   <option value="<?php echo $data['name'];?>"><?php echo ucwords($data['name']);?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Số lượng tồn kho</label>
                <input type="text" class="form-control" name="full-name" placeholder="">
            </div>
           
            <div class="form-group clearfix">
              <button type="submit" name="add_kho" class="btn btn-primary">Add kho</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
