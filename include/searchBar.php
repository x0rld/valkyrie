<?php
if (!empty($_GET['value'])) {

  include_once 'config.php';

  $q= $db->prepare('SELECT id_game,name FROM GAMES where name like ? ');
  $q->execute([$_GET['value'] . '%']);
  $res = $q->fetchAll(PDO::FETCH_ASSOC);
  foreach ($res as $values){
    ?>
    <a href="../party/game.php?id_game=<?=$values['id_game']; ?>">Partie de : <?= $values['name']; ?></a>
  <?php }
}
