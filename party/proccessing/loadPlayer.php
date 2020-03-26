<?php

include'../../include/config.php';

$q = $db->prepare('SELECT id_user FROM PARTICIPATE WHERE id_game = ?');
$q->execute([$_GET['id_game']]);

$players=$q->fetchAll(PDO::FETCH_ASSOC);

foreach ($players as $player)
{
  echo $player['id_user'] . ',';
}
