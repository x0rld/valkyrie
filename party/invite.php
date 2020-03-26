<?php include'../session.php';
include '../include/config.php';
?>

<?php
$q = $db->prepare('SELECT id_user from PARTICIPATE where id_user=? AND id_game=? ');
$q->execute([$_SESSION['id'], $_GET['id_game']]);
$compare=$q->rowCount($q);
echo '<script>console.log('.$compare. ');</script>';
if ($compare == 0) {
  $q = $db->prepare('INSERT INTO PARTICIPATE (id_game,id_user) VALUES(?,?)');
  $q->execute([ $_GET['id_game'],$_SESSION['id'] ]);
  echo '<script>console.log("vous avez été ajouté");</script>';
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Preparation</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="../css.css">
</head>
<body>
  <?php
  include("../include/header.php");
  ?>

  <div class="row">
    <div class="container" width=100% height=100% style="background-color:rgba(255,255,255,1)";>
      <div class="row">
        <div class="col">
          <p id=<?= $_GET['id_game'];?>>Préparation au lancement de la partie</p>
          <p >Nombre de personne connecté :<i id="nbConnect"></i> </p>
        </div>
      </div>
      <div id='reply'></div>
      <div class="row">
        <div class="col">
          <p>Rechercher des personnes à inviter :</p>
          <input type="search" oninput="searchUser()" id="search">
          <div id="result">
          </div><br>
          <div id="start">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div id="chat">
      <?php  include'chat/chat.php'; ?>
    </div>
  </div>
  <?php include("../include/footer.php");?>
  <script src="invite.js"></script>
  <script src="chat/chat.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
