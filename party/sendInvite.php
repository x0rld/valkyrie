<?php
include '../include/config.php';
$q= $db->prepare('SELECT username FROM USER
  where username=? and id_user=?');
  $q->execute([$_POST['username'],$_POST['id_user']]);
  $count= $q->rowCount();

  if ( $count == 0 )  {
    echo "Veuillez sélectionner un utilisateur valide";
    exit;
  }
  $q= $db->prepare('INSERT INTO NOTIFICATION(link,id_user,id_game) VALUES (:link,:id_user,:id_game)');
  $q->execute
  (
    [
      ':link'=>'https://syrsam.com/party/game.php?id_game=' . $_POST['id_game'],
      ':id_user'=>$_POST['id_user'],
      ':id_game'=>$_POST['id_game']
    ]

    );
    echo "invitation envoyé";
