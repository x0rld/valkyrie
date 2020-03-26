<?php
include ('config.php');
$oldPassword = isset($_POST['oldPassword']);
$newPassword = isset($_POST['newPassword']);

$id= $_SESSION['id'];
$requete = $bdd->prepare("SELECT  password FROM USERS where id = :id");
$requete->execute(array("id" => $id));



if (isset($_POST['oldPassword']) && isset($_POST['newPassword'])) !empty($_POST['old'] && !empty($_POST['newPassword'] )) {
  if(isset($_POST['oldPassword'] === $requete){

$requete = $bdd->prepare("UPDATE USERS set password = ':newPassword' WHERE id = :id ");
$requete->execute( array("newPassword" => $newPassword ));

  }
}

$oldUsername = isset($_POST['oldUsername']);
$newUsername = isset($_POST['newUsername']);
$requete = $bdd->prepare('SELECT username FROM USERS where id = :id');
$requete->execute(array("id" => $id));



if (isset($_POST['oldUsername']) && isset($_POST['newUsername']) !empty($_POST['old'] && !empty($_POST['newUsername'] )) {
  if(isset($_POST['oldUsername'] === $requete)){

$requete = $bdd->prepare("UPDATE USERS set username = ':newUsername' WHERE id = :id ");
$requete->execute(
  array("newUsername" =>$newUsername,
        "id"=>$id
      );)

  }
}

$R18 = $_POST['R18'];

if($R18 === 1)
$requete = $bdd->prepare("UPDATE USER SET R18 = 0 where id = $id");
$requete->execute();

else {
  $requete = $bdd->prepare("UPDATE USER SET R18 = 1 where id = $id");
  $requete->execute();
}


 ?>
