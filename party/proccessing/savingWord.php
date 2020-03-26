<?php

include('../../include/config.php');

$id_user = $_POST['id_user'];
$id_game = $_POST['id_game'];
$word = $_POST['word'];

$d = $db->prepare('UPDATE PARTICIPATE SET word=:word WHERE id_game = :id_game and id_user=:id_user');
$d->execute
(
  array
  (
    'word' => $word  ,
    'id_game'=>$id_game,
    'id_user'=>$id_user
  )
);
