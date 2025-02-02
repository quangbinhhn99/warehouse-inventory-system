<?php
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
if (isset($_POST['search'])) {
    $key = addslashes('%'.$_POST['name'].'%');
    $keys = $_POST['name'];
    $all_users = find_product_by_user($key);
            
}
  else $all_users = find_all_user();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <form action="" method="POST" accept-charset="utf-8">
  
       <div class="input-group">
            <input type="text" value="<?php if(isset($key)) { echo $keys; } ?>" name="name" class="form-control" placeholder="Nhập tên nhân viên...">
            <span class="input-group-btn">
                <button class="btn btn-default" name="search" type="submit">Tìm kiếm</button>
            </span>
          </div><!-- /input-group -->
      </div>
    </form>
</div>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Tài khoản</span>
       </strong>
         <a href="add_user.php" class="btn btn-info pull-right">Add tài khoản</a>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>Name </th>
            <th>Username</th>
            <th class="text-center" style="width: 15%;">User Role</th>
            <th class="text-center" style="width: 15%;">Số cmt</th>
            <th class="text-center" style="width: 15%;">Quê quán</th>
            <th class="text-center" style="width: 15%;">Lương</th>
            <th class="text-center" style="width: 10%;">Trạng thái</th>
            <th style="width: 20%;">Last Login</th>
            <th class="text-center" style="width: 100px;">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_users as $a_user): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_user['name']))?></td>
           <td><?php echo remove_junk(ucwords($a_user['username']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_user['group_name']))?></td>
           <td><?php echo remove_junk(ucwords($a_user['so_cmt']))?></td>
           <td><?php echo remove_junk(ucwords($a_user['que_quan']))?></td>
           <td><?php echo remove_junk(ucwords($a_user['salary']))?> VNĐ</td>
           <td class="text-center">
           <?php if($a_user['status'] === '1'): ?>
            <span class="label label-success"><?php echo "Active"; ?></span>
          <?php else: ?>
            <span class="label label-danger"><?php echo "Deactive"; ?></span>
          <?php endif;?>
           </td>
           <td><?php echo read_date($a_user['last_login'])?></td>
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_user.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="delete_user.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
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
