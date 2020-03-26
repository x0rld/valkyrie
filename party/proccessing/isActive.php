<?php

include'../../include/config.php';
$d = $db->prepare('SELECT active FROM GAMES WHERE id_game=?');
$d->execute([$_GET['id_game']]);
$q=$d->fetch();
echo $q['active'];
