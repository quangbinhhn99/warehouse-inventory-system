<?php
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//  if (isset($_POST['searchs'])) {
//     $key = addslashes('%'.$_POST['names'].'%');
//     $keys = $_POST['names'];
//     $all_kho = find_product_by_kho($key);
            
// }
 $all_kho = find_all('vatlieu');
 
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<!-- <div class="row">
  <div class="col-md-12">
    <form action="" method="POST" accept-charset="utf-8">
  
       <div class="input-group">
            <input type="text" value="<?php if(isset($key)) { echo $keys; } ?>" name="names" class="form-control" placeholder="Nhập tên sản phẩm..">
            <span class="input-group-btn">
                <button class="btn btn-default" name="searchs" type="submit">Tìm kiếm</button>
            </span>
          </div>
      </div>
    </form>
</div> -->
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Kho vật tư</span>
       </strong>
         <a href="nhapXuat.php" class="btn btn-info pull-right">Thêm mới</a>
      </div>
      <div class="panel-body">
          <table class="table table-bordered" id="request">
           
              <tr>
                <th  class="text-center" style="width: 40%;"> Tổng vải (m)</th>
                <td  class="text-center"> <?php echo remove_junk($all_kho[0]['total_vai']); ?></td>
              </tr>
              <tr>
                <th  class="text-center" style="width: 40%;"> Tổng chỉ (cuộn)</th>
                <td  class="text-center"> <?php echo remove_junk($all_kho[0]['total_chi']); ?></td>
              </tr>
              <tr>
                <th  class="text-center" style="width: 40%;"> Tổng cúc (chiếc)</th>
                <td  class="text-center"> <?php echo remove_junk($all_kho[0]['total_cuc']); ?></td>
              </tr>
             
          </tabel>
        </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>
