<?php
include '../include/config.php';

$q = $db->prepare('SELECT id_user FROM PARTICIPATE WHERE id_game= ? ');
$q->execute([$_GET['id_game']]);
$number=$q->rowCount($q);

echo $number;
