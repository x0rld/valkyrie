<?php
session_start();
require_once'../include/config.php';
$q = $db->prepare('SELECT id_user from PARTICIPATE where id_user=? ');
$q->execute([$_SESSION['id']]);
$compare=$q->rowCount($q);
if ($compare === 0) {
  $q = $db->prepare('INSERT INTO PARTICIPATE (id_game,id_user) VALUES(?,?)');
  $q->execute([ $_POST['id_game'],$_SESSION['id']]);
}



$q = $db->prepare('SELECT id_user,active FROM GAMES WHERE id_user=? AND id_game=?');
$q->execute([$_SESSION['id'],$_POST['id_game']]);
$nb=$q->rowCount();

if ($nb !== 0)
{
  $q = $db->prepare('UPDATE GAMES set active=1 WHERE  id_game=?');
  $q->execute([$_POST['id_game']]);
  echo "start";
}
