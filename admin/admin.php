<?php require_once('../session.php');
include("../include/config.php");
$q = $db->prepare('SELECT statut FROM USER WHERE id_user = ?');
$q->execute([$_SESSION['id']]);
$statut=$q->fetch(PDO::FETCH_ASSOC);
if( $statut['statut'] == 0 ){
  header("Location: https://syrsam.com/profil.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="../css.css">
</head>
<body>

  <?php
  include("../include/header.php");
  ?>

  <main>
    <div style="background-color:rgba(255,255,255,0.9); border-radius:10px;"
    class="container">

    <form action="checkadmin.php" method="post">
      <h5 style="text-align:center">Supprimer utilisateur </h5><br>
      <div class="form-group">

        <label>Choisir un pseudo</label>
        <select class="form-control" name="userdelete" style="width:50%">
          <?php
          $all = $db->prepare('SELECT username FROM USER');
          $all->execute();
          $names = $all->fetchAll(PDO::FETCH_ASSOC);
          foreach ($names as $name) {
            echo '<option selected="selected" value = ' . $name['username'] .
            '>' .$name['username'] . '</option>';
          }
          ?>
        </select>
      </div>
      <input class="btn btn-primary" type="submit" value="Submit">
    </form>



    <form action="checkadmin.php" method="post">
      <br>
      <h5 style="text-align:center">  modification pseudo : </h5><br>
      <select name="user" class="form-control" style="width:50%">
        <?php
        $all->execute();
        $names = $all->fetchAll(PDO::FETCH_ASSOC);
        foreach ($names as $name) {
          echo '<option selected="selected"  value = ' . $name['username'] . '>' .
          $name['username'] . '</option>';
        }
        ?>
      </select>
      <br>
      <input type="text"  class="form-control" name="newuser" value=""
      placeholder="Nouveau nom" style="width:50%">
      <input type="submit" class="btn btn-primary" value="Submit">

    </form>
  </div>


  <br>

  <div style="background-color:rgba(255,255,255,0.9); border-radius:10px;"
  class="container" style="width:50%">
  <form action="checkadmin.php" method="post">

    <h5 style="text-align:center">suppression liste de mot : </h5><br>
    <div class="form-group">

      <select class="form-control " style="width:50%" name="wordlist">
        <?php
        $subjects = $db->prepare('SELECT name FROM SUBJECTS where active = 1');
        $subjects->execute();
        $names = $subjects->fetchAll(PDO::FETCH_ASSOC);
        foreach ($names as $name) {
          echo '<option selected="selected" value = ' . $name['name'] . '>' .
          $name['name'] . '</option>';
        }
        ?>
      </select>
    </div>
    <br>
    <input class="btn btn-primary" type="submit" value="Submit">

  </form>

  <br>
  <br>

  <form  action="checkadmin.php" method="post">

    <h5 style="text-align:center">ajout liste de mot </h5><br>
    <div class="">
      <input type="text" name="subject" placeholder="Nom de la liste">
    </div>
    <div class="form-group">
      <label for="FormTextarea">Rentrez les mots, séparés par un " ; "</label>
      <textarea class="form-control" name="words" style="width:50%"></textarea>
    </div>
    <br>
    <select class="form-control" name="safe" style="width:50%">
      <option value="1">R18</option>
      <option value="0">Safe</option>
    </select>
    <input class="btn btn-primary" class="btn btn-primary" type="submit" value="Submit">
  </form>
</div>
<br>
<br>
  
<div style="background-color:rgba(255,255,255,0.9); border-radius:10px;" class="container">
  <form  action="checkadmin.php" method="post">

    <h5 style="text-align:center">Création de tournoi : </h5><br>
    <?php

    for ($i=0; $i <12 ; $i++) {
      $all->execute();
      echo "<select class='admin_size , form-control'  name='  t$i'>";
      $names = $all->fetchAll(PDO::FETCH_ASSOC);
      foreach ($names as $name) {
        echo '<option selected="selected" value = ' . $name['username'] . '>'
        . $name['username'] . '</option>';
      }
      echo "</select>";
      echo "<br>";
    }?>
    <br>
    <input type="submit" value="Submit">

  </form>
</div>
</main>

<?php include("../include/footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
