<?php
session_start();
$id = $_SESSION['id'];
include 'include/config.php';
$d = $db->prepare('SELECT link FROM NOTIFICATION WHERE id_user = ? ');
$d->execute([$id]);
$notifs = $d->fetchAll(PDO::FETCH_ASSOC);
$i=0;
foreach ($notifs as $notif) {
  echo '<a href="' . $notif['link'] .'">partie '.$i .'</a>,';
  $i++;
}
echo $i;
