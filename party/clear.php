<?php
include'../include/config.php';

$d = $db->prepare("UPDATE GAMES SET draw ='../img/empty_canvas.png' WHERE id_game = ?");
$d->execute([$_POST['id_game']]);
