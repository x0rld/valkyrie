<?php
include '../../include/config.php';

$id_game = $_GET['id_game'];
$requete = $db->prepare('SELECT message,id_chat,id_user FROM CHAT WHERE
  id_games = :id_game ORDER BY id_chat ASC');
  $requete->execute(array("id_game" => $id_game ));

  $req = $db->prepare('SELECT username FROM USER WHERE id_user = :id');

  while($donnees = $requete->fetch()){

    $req->execute(array("id" =>$donnees['id_user'] ));
    $user = $req->fetch();

    echo  "<p id=\"" . $donnees['id_chat'] . "\">" . htmlspecialchars($user['username']) .
    " dit : " . htmlspecialchars($donnees['message']) . "</p>";
  }

  ?>
