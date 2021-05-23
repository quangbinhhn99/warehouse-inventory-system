<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_id('kho',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","Xóa kho thành công.");
      redirect('kho.php');
  } else {
      $session->msg("d","User deletion failed Or Missing Prm.");
      redirect('kho.php');
  }
?>
