<?php
  $page_title = 'Cập nhật yêu cầu sản xuất';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
    $id = (int)$_GET['id'];
    $request = find_by_id('requestproduct', $id);
    $product = find_by_id('products', $request['idPro']); 
    $plans = find_by_id('plansupply', $id);
  if($plans == null){
    
    $query = "INSERT INTO plansupply (";
    $query .="id, mVai ,mChi,mCuc";
    $query .=") VALUES (";
    $query .=" '{$id}', '{$dateStart}', '{$dateEnd}', '{$status}', '{$note}'";
    $query .=")";
  }
?>

<?php include_once('layouts/header.php'); ?>
<div class="login-page" style="width:80%">
    <div class="text-center">
       <h3>Kế hoạch vật tư</h3>
     </div>
        <div class="form-group">
              <label for="name" class="control-label">Mã sản xuất:</label>
            <p><?php echo $plans['id'];?></p>
        </div>
        <div class="form-group">
              <label for="name" class="control-label">Tên sản phẩm:</label>
            <p><?php echo $product['name'];?></p>
        </div>
        <div class="form-group">
              <label for="number" class="control-label">Số lượng:</label>
              <input type="number" class="form-control" name="number" id="number" value="<?php echo (int)$request['number']; ?>">
        </div>
        <div class="form-group">
              <label class="control-label">Số m vải:</label>
              <input type="date" class="form-control" name="dateStart" value="<?php echo (int)$e_group['dateStart']; ?>">
        </div>
        <div class="form-group">
              <label class="control-label">Ngày kết thúc</label>
              <input type="date" class="form-control" name="dateEnd" value="<?php echo (int)$e_group['dateEnd']; ?>">
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
               <textarea name="note" id="note" cols="100" rows="5"><?php echo $e_group['note']; ?></textarea>
            </div>
            <div class="form-group clearfix">
                <button type="submit" name="update" class="btn btn-info">Cập nhật</button>
        </div>
    </form>
</div>

<?php include_once('layouts/footer.php'); ?>
