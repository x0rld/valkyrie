<?php

include('include/config.php');
?>
<div class="col-sm-4" >
  <div class="card">
    <div class="card-body">

      <div class="row">
        <div class="col">
          <h5 class="card-title">Partie de : <?= $card['name']?> </h5>
          </div>
          <div class="col">
          </div>
        </div>

        <div class="row">
          <div class="col">
            <?php $q = $db->prepare('SELECT name FROM SUBJECTS where id_sub = ?');
            $q->execute([$card['id_sub']]);
            $namesub= $q->fetch(PDO::FETCH_ASSOC);
            ?>
            <p>liste: <?= $namesub['name']; ?></p>
          </div>
          <div class="col">
            <?php $q = $db->prepare('SELECT id_user FROM PARTICIPATE where id_game = ?');
            $q->execute([$card['id_game']]);
            $nb= $q->rowCount(); ?>
            <p>Nombre de joueurs :<?= $nb; ?> / 12</p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p>R-18/safe : <?php if ($card['R18'] == 1 ) {echo 'R18';} else{echo 'Safe';} ;?></p>
          </div>
        </div>
        <p style="text-align:center;">___________________</p>
      </div>
      <p class="card-text"><?php
       $q  = $db->prepare('SELECT id_user FROM PARTICIPATE where id_game = ?');
       $q->execute([$card['id_game']]);

       $ids = $q->fetchAll(PDO::FETCH_ASSOC);
       foreach ($ids as $id)
       {
                 $a = $db->prepare('SELECT username FROM USER where id_user = ?');
                 $a->execute([$id['id_user']]);
                 $player = $a->fetch();
                 echo $player['username'] . "<br>";
       }
      ?></p>
      <a href="/party/game.php?id_game=<?= $card['id_game']; ?>" class="btn btn-primary">Entrer</a>
    </div>
  </div>
