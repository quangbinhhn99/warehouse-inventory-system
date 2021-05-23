<?php
  $page_title = 'Thêm mới yêu cầu sản xuất';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $product = find_all('products');
?>
<?php
  if(isset($_POST['add_request'])){

   $req_fields = array('idPro','number','dateStart','dateEnd', 'status', 'note' );
   validate_fields($req_fields);

   if(empty($errors)){
           $idPro   = remove_junk($db->escape($_POST['idPro']));
       $number   = remove_junk($db->escape($_POST['number']));
       $dateStart   = ($db->escape($_POST['dateStart']));
       $dateEnd = $db->escape($_POST['dateEnd']);
       $status = $db->escape($_POST['status']);
       $note = $db->escape($_POST['note']);
        $query = "INSERT INTO requestproduct (";
        $query .="idPro, number,dateStart,dateEnd, status, note";
        $query .=") VALUES (";
        $query .=" '{$idPro}', '{$number}', '{$dateStart}', '{$dateEnd}', '{$status}', '{$note}'";
        $query .=")";

        if($db->query($query)){
          
          $session->msg('s',"Yêu cầu sản xuất thành công! ");
          redirect('yeuCauSanXuat.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry failed!');
          redirect('add_request.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_request.php',false);
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
                <label for="name">Tên sản phẩm</label>
                <select class="form-control" name="idPro">
                  <?php foreach ($product as $data ):?>
                   <option value="<?php echo $data['id'];?>"><?php echo ($data['name']);?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="username">Số lượng</label>
                <input type="number" class="form-control" name="number" placeholder="Số lượng">
            </div>
            <div class="form-group">
                <label for="password">Ngày bắt đầu</label>
                <input type="date" class="form-control" name ="dateStart" >
            </div>
            <div class="form-group">
                <label for="password">Ngày kết thúc</label>
                <input type="date" class="form-control" name ="dateEnd" >
            </div>
            <div class="form-group">
              <label for="level">Trạng thái </label>
                <select class="form-control" name="status">
                
                   <option value="0">Đã tiếp nhận</option>
                   <option value="1">Đang thực hiện</option>
                   <option value="2">Đã hoàn thành</option>
               
                </select>
            </div>
            <div class="form-group">
                <label for="note">Ghi chú</label>
               <textarea name="note" id="note" cols="20" rows="40"></textarea>
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
