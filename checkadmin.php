<?php
include("config.php");
include("function.php");
$user=isset($_POST['user']) && !empty($_POST['user']) ? $_POST['user'] : "??";
$newuser=isset($_POST['user']) && !empty($_POST['newuser']) ? $_POST['newuser'] : "??";
$userdelete= isset($_POST['userdelete']) && !empty($_POST['userdelete']) ? $_POST['userdelete'] : "??";
$wordlist = isset($_POST['wordlist']) && !empty($_POST['wordlist'])? $_POST['wordlist'] :"??";
$subject = isset($_POST['subject']) && !empty($_POST['subject'])? $_POST['subject'] :"??";

if($userdelete != "??" ){
  $q= $db ->prepare( 'UPDATE users SET banned = 1 where username = ?');
  $db->execute([$userdelete]);
  $db = null;
}

if($user != "??"){

  $q = $db ->prepare("UPDATE users SET=? where username = ?");

  $db->execute([$user,$newuser]);
  $db = null;
}

if($wordlist != "??"){

  $q = $db ->prepare("DELETE FROM SUBJECT  where wordlist=?");

  $q->execute([$wordlist]);

}
// Permet  d'ajouter une liste de mot

if( $subject != "?? " ){
  $fp = fopen ( $subject, "w+");
  fclose ($fp);


  // Ajouter une liste
  $q = $db ->prepare("INSERT INTO SUBJECTS(name) VALUES(?)" );
  $db->execute([$subject]);


  // Faut séparer les mots et les mettres dans un tableau et on rentre les mots 1 à 1 dans la BDD
  $words =explode(";", $words);

foreach ($words as $word) {
    $q=$db ->prepare( "INSERT INTO WORDS(word) VALUES(?)");
    $db->execute($word);
  }
  $db = null;
}



?>
