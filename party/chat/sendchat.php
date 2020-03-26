<?php
session_start();
include '../../include/config.php';

print_r($_POST);
  if(!empty($_POST['message'])){
    //	message	id_user	id_games
    $id_user = $_SESSION['id'];
    $id_game = $_POST['id_game'];//a definir coment on stock la partie
    $message = $_POST['message'];

    $insert = $db->prepare('INSERT INTO CHAT(id_user,id_games,message)
    VALUES(:id_user,:id_game ,:message)');
    $insert->execute(array(
      ':id_user' => $id_user,
      ':id_game' => $id_game,
      ':message' =>$message
    ));
  }
?>
