<?php
session_start();
require_once 'dbconfig.php';
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['name']) && !empty($_POST['paw'])) {
 $name = trim($_POST['name']);
 $paw1 = trim($_POST['paw']);
 $paw = md5($paw1);
 try {
   $stmt = $pdo->prepare("SELECT * FROM user WHERE login=:nazwa and haslo=:has");
   $stmt->execute(array(':nazwa'=>$name, ':has'=>$paw));
   $count = $stmt->rowCount();
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   if($row['haslo']==$paw){
     echo 1;
     $_SESSION['user_session'] = $row['login'];
   }
   else {

     echo 0;
   }
 } catch (\Exception $e) {
   echo $e->getMessage();
 }

}
?>
