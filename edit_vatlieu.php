<?php
  $page_title = 'Cập nhật';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  //Display all catgories.
  $vattu = find_by_id('vattu',(int)$_GET['id']);
  if(!$vattu){
    $session->msg("d","Missing id.");
    redirect('vatlieu.php');
  }
?>

<?php
if(isset($_POST['edit_cat'])){
  $req_field = array('name');
  validate_fields($req_field);
  $name = remove_junk($db->escape($_POST['name']));
  if(empty($errors)){
        $sql = "UPDATE vattu SET name='{$name}'";
       $sql .= " WHERE id='{$vattu['id']}'";
     $result = $db->query($sql);
     if($result && $db->affected_rows() === 1) {
       $session->msg("s", "Success!");
       redirect('vatlieu.php',false);
     } else {
       $session->msg("d", "Fail!");
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
   <div class="col-md-5">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>Editing <?php echo remove_junk(ucfirst($vattu['name']));?></span>
        </strong>
       </div>
       <div class="panel-body">
         <form method="post" action="edit_vatlieu.php?id=<?php echo (int)$vattu['id'];?>">
           <div class="form-group">
               <input type="text" class="form-control" name="name" value="<?php echo remove_junk(ucfirst($vattu['name']));?>">
           </div>
           <button type="submit" name="edit_cat" class="btn btn-primary">Cập nhật</button>
       </form>
       </div>
     </div>
   </div>
</div>



<?php include_once('layouts/footer.php'); ?>
