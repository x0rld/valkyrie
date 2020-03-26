<?php
include'../../include/config.php';

$q=$db->prepare('SELECT id_winner FROM GAMES where id_game=?');
$q->execute([$_GET['id_game']]);
$win= $q->fetch(PDO::FETCH_ASSOC);

$q=$db->prepare('SELECT id_user FROM USER where id_user = ?');
$q->execute([$win['id_winner']]);
$win= $q->fetch(PDO::FETCH_ASSOC);
$str;
$str .='la partie est finie
le gagnant est : '. $win['id_user'] .'
vous allez être redirigé vers votre profile';

echo $str;

$q = $db->prepare('DELETE FROM GAMES where id_game = ?');
$q->execute([$_GET['id_game']]);
