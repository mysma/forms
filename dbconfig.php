<?php
$host = 'localhost';
$user = 'root';
$password = 'mysza1';
$db = 'mysma';
try {
  $pdo = new PDO('mysql:host='.$host.';dbname='.$db, $user, $password);
  $pdo -> query ('SET NAMES utf8');
  $pdo -> query ('SET CHARACTER_SET utf8_unicode_ci');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Exception $e) {
  echo 'Error: '.$e->getMessage();
  exit();
}
//echo 'Baza MysQl połączona';
?>
