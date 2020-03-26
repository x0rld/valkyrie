<?php
include("../include/config.php");

//ban user
if( isset($_POST['userdelete']) && !empty($_POST['userdelete']) ){
  $userdelete =  $_POST['userdelete'];
  $q= $db ->prepare( 'UPDATE USER SET banned = 1 where username = ?');
  $q->execute(array($userdelete));
  $db = null;
  header('Location:admin.php');
  exit;
}

//modifier le pseudo
if (isset($_POST['user']) && !empty($_POST['user']) &&
!empty($newuser=$_POST['newuser']) ) {

  $user = $_POST['user'];
  $newuser=$_POST['newuser'];
  $q = $db ->prepare("UPDATE USER SET username = ? where username = ?");
  $q->execute(array($newuser,$user));
  $db = null;
  header('Location:admin.php');
  exit;
}

// supprimer wordlist
if(isset($_POST['wordlist']) && !empty($_POST['wordlist'])){

  $wordlist = $_POST['wordlist'];

  $q = $db ->prepare("UPDATE SUBJECTS set active = 0 where name = ?");

  $q->execute(array($wordlist));

}
// Permet  d'ajouter une liste de mot
if(!empty($_POST['subject']) && !empty($_POST['words']) && !empty($_POST['safe']))
{
  $subject = $_POST['subject'];
  $words = $_POST['words'];

  // Ajouter une liste
  $q = $db ->prepare("INSERT INTO SUBJECTS(name,R18) VALUES (?,?)" );
  $q->execute(array($subject,$_POST['safe']));


  // Faut séparer les mots et les mettres dans un tableau et on rentre les
  //mots 1 à 1 dans la BDD
  $words =explode(";", $words);
  // array(3) { [0]=> string(8) "carapuce" [1]=> string(7) "pikachu" [2]=>
  // string(9) "tortipous" }

  $q=$db ->prepare('SELECT id_sub from SUBJECTS where name = ?');
  $q->execute(array($subject));

  $ids = $q->fetch(PDO::FETCH_ASSOC);
  $id = $ids['id_sub'];

  foreach ($words as $word) {
    $q=$db ->prepare(" INSERT INTO WORDS (word,id_subject) VALUES (?,?) ");
    $q->execute(array($word,$id));
  }
  $db = null;
}
// A FAIRE TOURNOI

$counter=0;
for ($i = 0; $i < 12; $i++ ){

  if(!empty($_POST["t$i"])){
    $counter++;
  }
}

if( $counter == 12 ){

  for($i = 0; $i < 12; $i++ ){

    $tName = $_POST["t$i"];
    $q = $db->prepare("INSERT INTO PLAYER_TOUR (username) VALUES (?) ");
    $q->execute(array($tName));

  }


}
header('Location: admin.php');
