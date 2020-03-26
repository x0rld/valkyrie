<?php

include("../include/config.php");
$q = $db->prepare('SELECT draw FROM GAMES where id_game = ?');
$q->execute([$_GET['id_game']]);
$p = $q->fetch();
$path = $p['draw'];
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
echo $base64 ;
