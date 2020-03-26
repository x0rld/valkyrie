<?php
// page permettant de recuperer des informations du user pour la page de profl
include("config.php");

// Recupération des données
session_start();
$id=$_SESSION['id'];


$ladder = $db->prepare('SELECT win,total,winrate,rank FROM LADDER WHERE id = ? ');
$ladder ->execute([$id]);

$ladders = $ladder->fetch(PDO::FETCH_ASSOC);

$_GET['win'] = $ladders['win'];
$_GET['total'] = $ladders['total'];
$_GET['winrate'] = $ladders['winrate'];
$_GET['rank'] = $ladders['rank'];

$user = $db->prepare('SELECT username,profile_pic FROM USER WHERE id = ?');
$user ->execute([$id]);

$users = $user->fetch(PDO::FETCH_ASSOC);

$_GET['username'] = $users['username'];
$_GET['pic'] = $users['profile_pic'];

$stmt = $db->prepare('SELECT * FROM LADDER WHERE id = ?');
$stmt ->execute([$id]);
$rows =$stmt -> fetchAll(PDO::FETCH_ASSOC);


$oeuvre = $db->prepare('SELECT path FROM CHEF_DOEUVRE WHERE id = ?');
$oeuvre ->execute([$id]);
$number = $oeuvre->rowCount();

$_GET['number'] = $number;

$output_file="data.csv";
$ifp = fopen( $output_file, 'wb' );

fwrite( $ifp, $rows );

fclose( $ifp );

}
?>
