<?php
  $page_title = 'All User';
  require_once('includes/load.php');
  page_require_level(1);

  if(isset($_POST['search'])){
    $keySearch = $_POST['keySearch'];
    // echo $keySearch; die();
    $all_vattu = find_by_name_product($keySearch);
  }else{
    
    $all_vattu = find_all('product');
  
  }
  
?>

<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Công thức sản phẩm</span>
       </strong>
         <a href="add_vattu.php" class="btn btn-info pull-right">Thêm mới +</a>
      </div>
      <form method="post" >
        <div class="input-group" style="width:50%; margin: 20px 20px">
          <input type="text" class="form-control" name="keySearch" placeholder="Mã đơn yêu cầu ..." value="<?php if(isset($keySearch) && $keySearch != null) echo $keySearch;?>">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit" name="search">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
      </form>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th class="text-center" style="width: 20%;">Tên sản phẩm</th>
            <th class="text-center">Phân loại</th>
            <th>Chỉ(cuộn)</th>
            <th>Vải(m)</th>
            
            <th class="text-center" style="width: 15%;">Cúc(cái)</th>
            
           <!--  <th style="width: 20%;">Last Login</th> -->
            <th class="text-center" style="width: 100px;">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_vattu as $a_vattu): 
          $loaiSP = find_by_id('categories', $a_vattu['idLoai']);
          ?>

          <tr>
           <td class="text-center"><?php echo count_id();?></td>
            <td class="text-center"><?php echo remove_junk(ucwords($a_vattu['name']))?></td>
            <td class="text-center"><?php echo remove_junk(ucwords($loaiSP['name']))?></td>
           <td><?php echo remove_junk(ucwords($a_vattu['chi']))?></td>
           <td><?php echo remove_junk(ucwords($a_vattu['vai']))?></td>
           <td><?php echo remove_junk(ucwords($a_vattu['cuc']))?></td>

        <!--    <td class="text-center"><?php echo remove_junk(ucwords($a_vattu['group_vattu']))?></td> -->
           <!-- <td class="text-center">
           <?php if($a_vattu['status'] === '1'): ?>
            <span class="label label-success"><?php echo "Active"; ?></span>
          <?php else: ?>
            <span class="label label-danger"><?php echo "Deactive"; ?></span>
          <?php endif;?>
           </td> -->
          <!--  <td><?php echo read_date($a_user['last_login'])?></td> -->
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_vattu.php?id=<?php echo (int)$a_vattu['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="delete_vattu.php?id=<?php echo (int)$a_vattu['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                  <i class="glyphicon glyphicon-remove"></i>
                </a>
                </div>
           </td>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>
