<?php
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_vattu = find_all_vattu();
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
          <span>Users</span>
       </strong>
         <a href="add_vattu.php" class="btn btn-info pull-right">Add vật tư</a>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>Tên Hàng</th>
            <th>Vật phẩm</th>
            
            <th class="text-center" style="width: 15%;">số lượng</th>
            <th class="text-center" style="width: 10%;">đơn vị</th>
           <!--  <th style="width: 20%;">Last Login</th> -->
            <th class="text-center" style="width: 100px;">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_vattu as $a_vattu): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_vattu['tenhang']))?></td>
           <td><?php echo remove_junk(ucwords($a_vattu['vatpham']))?></td>
           <td><?php echo remove_junk(ucwords($a_vattu['soluong']))?></td>

           <td class="text-center"><?php echo remove_junk(ucwords($a_vattu['group_vattu']))?></td>
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
