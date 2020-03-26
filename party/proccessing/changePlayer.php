<?php

 include'../../include/config.php';

 $q = $db->prepare(' UPDATE GAMES SET actual_player= :id_user  where id_game = :id_game');
 $q->execute
 (
   array(
          'id_user'=> $_POST['id_user'],
          'id_game' =>$_POST['id_game']
        )
 );
