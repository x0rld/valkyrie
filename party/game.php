<?php require_once '../session.php';

include '../include/config.php';
$q = $db->prepare('SELECT active from GAMES where id_game=?');
$q->execute([$_GET['id_game']]);
$nb = $q->fetch(PDO::FETCH_ASSOC);

if ($nb['active'] == 0) {
  $q = $db->prepare('SELECT id_user from PARTICIPATE where id_game=? and id_user=? ');
  $q->execute([$_GET['id_game'],$_SESSION['id'] ]);
  $compare = $q->rowCount($q);
  if ($compare === 0) {
    $q = $db->prepare('INSERT INTO PARTICIPATE (id_game,id_user) VALUES(?,?)');

   $q->execute([$_GET['id_game'],$_SESSION['id'] ]);
  }
}

else
{
  echo "vous n'êtes dans aucune partie vous allez être redirigé";
  sleep(3);?>
  <script>
      window.location.href='../profil.php?partie=out';
  </script>
<?php
}
$q = $db->prepare('SELECT count(id_user) AS nb FROM NOTIFICATION where id_game=?');
$q->execute([$_GET['id_game']]);
$nb = $q->fetch();
if ($nb['nb'] != 0)
{
  $q = $db->prepare('DELETE FROM NOTIFICATION where id_game=?');
  $q->execute([$_GET['id_game']]);
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Partie en cours</title>
  <link rel="stylesheet"
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
  crossorigin="anonymous">
  <link rel="stylesheet"
  href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
  integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
  crossorigin="anonymous">

  <link rel="stylesheet" href="canvas/canvas.css" type="text/css">
  <link rel="stylesheet" href="../css.css">
</head>
<body>
  <?php
  include("../include/header.php");
  include("../include/config.php");
  ?>
  <div class="container" style="background-color: #e9e9e9;">
    <h1>Temps Restant</h1>
    <h1 id="timer"></h1>
    <?php include'canvas/canvas.php'; ?>
  </div>

  <div style="z-index:1; float:right;position:absolute;right:0px;top:20%;background-color:White;">
    <div class="">
      <p>Mot à trouver :</p>
      <p id="wordToFind"></p>
    </div>
    <?php

    include_once 'chat/chat.php';
    ?>
    <button type="button" onclick="vote()" id='vote'>appuyer pour voter</button>
    <button type="button" hidden='true' id="displayModal" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
      Choisir Votre Mot !
    </button>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="word1" onclick="chooseWord(this.innerHTML)"></p>

          <p id="word2" onclick="chooseWord(this.innerHTML)"></p>

          <p id="word3" onclick="chooseWord(this.innerHTML)"></p>
        </div>
        <div class="modal-footer">
          <button type="button" id='close' hidden='true' class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <?php include("../include/footer.php");?>

  <script src="canvas/jquery.js"></script>
  <script src="start.js" charset="utf-8"></script>
  <script src="chat/chat.js" charset="utf-8"></script>
  <script src="timerDrawer.js"></script>
  <script src="canvas.js"></script>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
  crossorigin="anonymous"></script>

</body>
</html>
