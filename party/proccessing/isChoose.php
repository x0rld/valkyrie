<?php

include('../../include/config.php');

$id_game = $_GET['id_game'];
$id_user = $_GET['id_user'];
$d = $db->prepare(' SELECT word FROM PARTICIPATE WHERE id_game = :id_game and id_user=:id_user');
$d->execute
(
  array
  (
    'id_game'=>$id_game,
    'id_user'=>$id_user
  )
);

$q=$d->fetch(PDO::FETCH_ASSOC);
echo $q['word'];
