<?php
if (!empty($_GET['value'])) {

  include_once '../include/config.php';
  $q= $db->prepare('SELECT username,id_user FROM USER where username like ? ');
  $q->execute([$_GET['value'] . '%']);
  $res = $q->fetchAll(PDO::FETCH_ASSOC);
  foreach ($res as $values){
  echo '<p onclick="invite(this)" id="'. $values['id_user'] . '">' . $values['username']. '</p><br>';
  }
}
