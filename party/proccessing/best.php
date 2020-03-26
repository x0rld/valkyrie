<?php
session_start();
include'../../include/config.php';
$q = $db->prepare(' SELECT id_game FROM VOTE where id_game = :id_game');
$q->execute
(
  array('id_game' =>$_POST['id_game'])
);
$number = $q->rowCount();

$q= $db->prepare('SELECT vote FROM GAMES where id_game = ?');
$q->execute([$_POST['id_game']]);
$compare = $q->fetch(PDO::FETCH_ASSOC);

if ($compare['vote']<=$number) {
  $q= $db->prepare('UPDATE GAMES SET vote = ? where id_game = ?');
  $q->execute([$number,$_POST['id_game']]);

  $q= $db->prepare('SELECT draw FROM GAMES WHERE id_game= ? ');
  $q->execute([$_POST['id_game']]);
  $draw = $q->fetch(PDO::FETCH_ASSOC);
  echo $draw['draw'];
  $q= $db->prepare('UPDATE GAMES SET tmpwin = ? where id_game = ?');
  $q->execute([$draw['draw'],$_POST['id_game']]);

  $q= $db->prepare('UPDATE GAMES SET id_winner = ? where id_game = ?');
  $q->execute([$_SESSION['id'],$_POST['id_game']]);
}


  $q = $db->prepare('DELETE FROM VOTE where id_game = ? ');
  $q->execute([$_POST['id_game']]);
