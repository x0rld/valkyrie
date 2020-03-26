<?php
session_start();
$owner =$_SESSION['username'];
$id =$_SESSION['id'];
include '../include/config.php';

$q = $db->prepare('SELECT id_game FROM GAMES WHERE name = ? ');
$q->execute([$owner]);
$response = $q->fetch(PDO::FETCH_ASSOC);
if (!empty($response)) {
    echo "vous avez déjà une partie en cours";
    exit;
}

$q = $db->prepare('INSERT INTO GAMES(name,R18,ranked,id_user,id_sub,actual_player)
          VALUES (:name,:R18,:ranked,:id_user,:id_sub,:actual_player)');
$q->execute(
    array(
          ':name'=>$owner,
          ':R18'=>$_POST['R18'],
          ':ranked'=>$_POST['ranked'],
          ':id_user'=>$id,
          'id_sub'=>$_POST['id_sub'],
          'actual_player'=>$id
    )
);


$q = $db->prepare('SELECT id_game FROM GAMES WHERE name = ? ');
$q->execute([$owner]);

$response = $q->fetch(PDO::FETCH_ASSOC);
echo $response['id_game'];
