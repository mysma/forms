<?php
session_start();
require_once "dbconfig.php";
error_reporting(E_ALL ^ E_NOTICE);
if(isset($_SESSION['user_session']))
{
    if(!empty($_POST['temat']) && !empty($_POST['comment'])) {
      $temat=$_POST['temat'];
      $text = $_POST['comment'];
      try {
        $stmt = $pdo->prepare("UPDATE tytulowa SET tytul=:tytu, tresc=:tres" );
        $stmt->bindParam(':tytu', $temat, PDO::PARAM_STR);
        $stmt->bindParam(':tres', $text, PDO::PARAM_STR);
        $stmt->execute();
        echo 1;
      } catch (\Exception $e) {
          echo "0";
      }

    }
}
?>
