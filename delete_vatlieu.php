<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $vattu = find_by_id('vattu',(int)$_GET['id']);
  if(!$categorie){
    $session->msg("d","Missing Categorie id.");
    redirect('vatlieu.php');
  }
?>
<?php
  $delete_id = delete_by_id('vattu',(int)$vattu['id']);
  if($delete_id){
      $session->msg("s","Deleted.");
      redirect('vatlieu.php');
  } else {
      $session->msg("d","Failed.");
      redirect('vatlieu.php');
  }
?>
