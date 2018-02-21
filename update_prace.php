<?php
session_start();
require_once "dbconfig.php";
error_reporting(E_ALL ^ E_NOTICE);
if(isset($_SESSION['user_session']))
{
  $link = $_POST['link'];
  $title = $_POST['title'];
  $opis = $_POST['opis'];
  $id = $_POST['id'];
  if(!empty($link) && !empty($title)) {
    try {
      $stmt = $pdo->prepare("UPDATE prace SET img=:lin, title=:titl, opis=:opi WHERE id=:ie" );
      $stmt->bindParam(':lin', $link, PDO::PARAM_STR);
      $stmt->bindParam(':titl', $title, PDO::PARAM_STR);
      $stmt->bindParam(':opi', $opis, PDO::PARAM_STR);
      $stmt->bindParam(':ie', $id, PDO::PARAM_STR);
      $stmt->execute();
      echo 1;
    } catch (\Exception $e) {
        echo "0";
    }

  }
}
?>
