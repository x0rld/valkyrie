<?php
session_start();
include'../../include/config.php';
$q = $db->prepare(' SELECT id_game FROM VOTE where id_game=:id_game AND id_user = :id_user');
$q->execute
(
  array('id_game' =>$_POST['id_game'] ,'id_user'=>$_SESSION['id'])
);
$number = $q->rowCount();

if ($number == 0) {
  $q = $db->prepare('INSERT INTO VOTE(id_game,id_user) VALUES(:id_game,:id_user)');
  $q->execute
  (
    array('id_game' =>$_POST['id_game'] ,'id_user'=>$_SESSION['id'])
  );
}
