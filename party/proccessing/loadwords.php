<?php
include'../../include/config.php';
$id_game=$_GET['id_game'];
$q = $db->prepare('SELECT id_sub FROM GAMES where id_game = ?');
$q->execute([$id_game]);
$sub=$q->fetch(PDO::FETCH_ASSOC);


$q = $db->prepare('SELECT word FROM WORDS WHERE id_subject = ?');
$q->execute([$sub['id_sub']]);

$words=$q->fetchAll(PDO::FETCH_ASSOC);

foreach ($words as $word)
{
  echo $word['word'] . ',';
}
