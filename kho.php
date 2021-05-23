<?php
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_kho = find_all('kho');
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
          <span>Kho</span>
       </strong>
         <a href="add_kho.php" class="btn btn-info pull-right">Add kho</a>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" >#</th>
            <th class="text-center" >Tên sản phẩm</th>
            <th>Số lượng tồn kho</th>
            <th class="text-center" >Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_kho as $a_kho): 
        $product = find_by_id('product',$a_kho['idSP'] )
          ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
            <td><?php echo remove_junk(ucwords($product['name']))?></td>
                   <td><?php echo remove_junk(ucwords($a_kho['inventory']))?></td>

           <td class="text-center">
             <div class="btn-group">
                <a href="edit_kho.php?id=<?php echo (int)$a_kho['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="delete_kho.php?id=<?php echo (int)$a_kho['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
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
