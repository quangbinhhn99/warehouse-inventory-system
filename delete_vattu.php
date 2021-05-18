<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_id('vattu',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","Xóa vật tư thành công.");
      redirect('vattu.php');
  } else {
      $session->msg("d","User deletion failed Or Missing Prm.");
      redirect('vattu.php');
  }
?>
