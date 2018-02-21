<?php
include "dbconfig.php";
session_start();
 if(isset($_SESSION['user_session']))
 {

   try {
     $stmt = $pdo->prepare("SELECT * FROM tytulowa");
     $stmt->execute(array());
     $count = $stmt->rowCount();
     $row = $stmt->fetch(PDO::FETCH_ASSOC);


   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form using jQuery Ajax and PHP MySQL</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/mobirise/css/admin.css">

<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/jquery/validation.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>
<script src="assets/mobirise/js/admin.js"></script>
<script src="assets/mobirise/js/up.js"></script>

</head>

<body>

<div class="container">
    <div class='alert alert-success'>
   <strong>Siema
     <?php
     $ja = $_SESSION['user_session'];
      echo $ja; ?>
    </strong>  Witaj w swoim super systemie.
    <a href="logout.php">Spadam!</a>
    </div>

    <button type="submit" id="submit1" class="btn btn-primary">Edycja tekstu z nagłówka</button>
    <div id="naglowek">
        <div class="form-group">
          <label for="temat">Temat:</label>
          <textarea class="form-control" name="temat" rows="1" id="temat"><?php echo $row['tytul']; ?></textarea>
        </div>
        <div class="form-group">
          <label for="comment">Text:</label>
          <textarea class="form-control" rows="5" name="comment" id="comment"><?php echo $row['tresc']; ?></textarea>
        </div>
        <div class="form-group">
          <button type="submit" id="popraw" name="popraw" class="btn btn-primary"> Popraw</button>
        </div>
    </div>
<?php
} catch (\Exception $e) {
  echo "Wystąpił błąd bazy danych";
} ?>
    <button type="submit" id="prace" class="btn btn-primary">Edycja prac</button>
    <div id="ShowPrace">
    <?php
    try {
      $stmt1 = $pdo->prepare("SELECT * FROM prace");
      $stmt1->execute(array());
      $count1 = $stmt1->rowCount();
      while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
    ?>

      <textarea class="form-control" name="id" rows="1" id="id"><?php echo $row1['id']; ?></textarea>
      <div class="form-group">
        <label for="img">Link do obrazka:</label>
        <textarea class="form-control" name="link" rows="1" id="link"><?php echo $row1['img']; ?></textarea>

      </div>
      <div class="form-group">
        <label for="title">Tytuł:</label>
        <textarea class="form-control" name="title" rows="1" id="title"><?php echo $row1['title']; ?></textarea>
      </div>
      <div class="form-group">
        <label for="opis">Opis:</label>
        <textarea class="form-control" name="opis" rows="1" id="opis"><?php echo $row1['opis']; ?></textarea>
      </div>
      <div class="form-group">
        <button type="submit" id="poprawa" name="poprawa" class="btn btn-primary"> Popraw</button>
      </div>
      <?php
      echo "\n\n\n";
        }

      } catch (\Exception $e) {
          echo "Wystąpił nieoczekiwany błąd!";
      }
      ?>
</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
else {
  echo "Ktoś tu chyba wjezdza na nielegalu!";
  header("Location: admin.php");
}
 ?>
