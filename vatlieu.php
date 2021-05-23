<?php
  $page_title = 'All categories';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  
  $all_vattu = find_all('vattu');
?>
<?php
 if(isset($_POST['add_cat'])){
   $req_field = array('name');
   validate_fields($req_field);
   $name = remove_junk($db->escape($_POST['name']));
   if(empty($errors)){
      $sql  = "INSERT INTO vattu (name)";
      $sql .= " VALUES ('{$name}')";
      if($db->query($sql)){
        $session->msg("s", "Thêm mới vật tư thành công!");
        redirect('vatlieu.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('vatlieu.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('vatlieu.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
   <div class="row">
    <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Thêm mới vật tư</span>
         </strong>
        </div>
        <div class="panel-body">
          <form method="post" action="vatlieu.php">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Categorie Name">
            </div>
            <button type="submit" name="add_cat" class="btn btn-primary">Thêm mới</button>
        </form>
        </div>
      </div>
    </div>
    <div class="col-md-7">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Tất cả vật tư</span>
       </strong>
      </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Vật tư</th>
                    <th class="text-center" style="width: 100px;"></th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_vattu as $cat):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td><?php echo remove_junk(ucfirst($cat['name'])); ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="edit_vatlieu.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                          <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="delete_vatlieu.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                          <span class="glyphicon glyphicon-trash"></span>
                        </a>
                      </div>
                    </td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
       </div>
    </div>
    </div>
   </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
