<?php
include '../include/config.php';
session_start();
$q = $db->prepare('SELECT id_user from PARTICIPATE where id_user=? AND id_game=? ');
$q->execute([$_SESSION['id'], $_POST['id_game']]);
$compare=$q->rowCount($q);
echo $compare;
if ($compare == 0) {
  $q = $db->prepare('INSERT INTO PARTICIPATE (id_game,id_user) VALUES(?,?)');
  $q->execute([ $_POST['id_game'],$_SESSION['id'] ]);
  echo '<script>console.log("vous avez été ajouté");</script>';
}
?>
