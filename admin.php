<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>

</head>
<body>
<?php
 include("database.php");
?>

  <main>

<form class="" action="checkadmin.php" method="post">
 modification pseudo : <br>
 <select class="" name="">
<?php

$all = 'SELECT name FROM USER';

foreach ($all as $names) {
echo '<option name = "user"' . $name . '</option>';
}
?>
</select>
<br>
  <input type="text" name="newuser" value="" placeholder="Nouveau nom">
  <input type="submit" value="Submit">

</form>

<form class="" action="checkadmin.php" method="post">
 supprimer utilisateur<br>
<input type="text" name="" value="userdelete">
<br>
  <input type="submit" value="Submit">

</form>
<form class="" action="checkadmin.php" method="post">
 suppression liste de mot : <br>
<input type="text" name="" value="wordlist">
<br>
  <input type="submit" value="Submit">

</form>


<form class="" action="checkadmin.php" method="post">
  ajout list de mot <br>
  <input type="text" name="subject" placeholder="nom de la liste">
  <input type="text" name="word" placeholder="mot">
<br>
  <input type="submit" value="Submit">


</form>

<form class="" action="checkadmin.php" method="post">
  <p>Création de tournoi : </p>
  <input type="text" name="tournament1" value="">
  <input type="text" name="tournament2" value="">
  <input type="text" name="tournament3" value="">
  <input type="text" name="tournament4" value="">
  <input type="text" name="tournament5" value="">
  <input type="text" name="tournament6" value="">
  <input type="text" name="tournament7" value="">
  <input type="text" name="tournament8" value="">
  <input type="text" name="tournament9" value="">
  <input type="text" name="tournament10" value="">
  <input type="text" name="tournament11" value="">
  <input type="text" name="tournament12" value="">
  <br>
  <input type="submit" value="Submit">
</form>
    </main>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  </html>
