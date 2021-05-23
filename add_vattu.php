<?php
  $page_title = 'Add vattu';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $groups = find_all('vattu_groups');
?>
<?php
  if(isset($_POST['add_vattu'])){

   $req_fields = array('full-name','username','password','tensp');
   validate_fields($req_fields);

   if(empty($errors)){
           $tenhang   = remove_junk($db->escape($_POST['full-name']));
       $vatpham   = remove_junk($db->escape($_POST['username']));
       $soluong   = remove_junk($db->escape($_POST['password']));
       $tensp = remove_junk($db->escape($_POST['tensp']));
        $query = "INSERT INTO vattu (";
        $query .="tenhang,vatpham,soluong,tensp,vattu_level";
        $query .=") VALUES (";
        $query .=" '{$tenhang}', '{$vatpham}', '{$soluong}', '{$tensp}',1";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"Them vat tu thanh cong! ");
          redirect('add_vattu.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry failed!');
          redirect('add_vattu.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_vattu.php',false);
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
          <span>Add Vật tư</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_vattu.php">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" name="tensp" placeholder="">
            </div>
            <div class="form-group">
                <label for="name">Chỉ(cuộn)</label>
                <input type="text" class="form-control" name="full-name" placeholder="">
            </div>
            <div class="form-group">
                <label for="username">Vải(m)</label>
                <input type="text" class="form-control" name="username" placeholder="">
            </div>
            <div class="form-group">
                <label for="password">Cúc(cái)</label>
                <input type="number" class="form-control" name ="password"  placeholder="">
            </div>
            <!-- <div class="form-group">
              <label for="level">Đơn vị </label>
                <select class="form-control" name="level">
                  <?php foreach ($groups as $group ):?>
                   <option value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_vattu']);?></option>
                <?php endforeach;?>
                </select>
            </div> -->
           
            <div class="form-group clearfix">
              <button type="submit" name="add_vattu" class="btn btn-primary">Add Vat Tu</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
