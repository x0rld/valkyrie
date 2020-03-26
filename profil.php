<?php require_once 'session.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
    <title>Mon profil</title>
</head>
<body>
<?php

include("include/header.php");
include("include/config.php");
$id=$_SESSION['id'];

$ladder = $db->prepare('SELECT win,total,rank FROM LADDER WHERE id_user = ? ');
$ladder ->execute([$id]);

$ladders = $ladder->fetch(PDO::FETCH_ASSOC);
if (empty($ladders)) {
  $ladders = array(
    'rank' =>0,
    'score'=>0,
    'win' =>0,
    'total'=>0
   );
}
$picture = $db -> prepare('SELECT profile_pic FROM USER WHERE id_user = ?');
$picture -> execute([$id]);
$pic = $picture->fetch(PDO::FETCH_ASSOC);

$oeuvre = $db->prepare('SELECT path FROM CHEF_DOEUVRE WHERE id_user = ?');
$oeuvre ->execute([$id]);
$number = $oeuvre->rowCount();
?>
<?php if ($_GET['partie']){ ?>
  <script>alert('vous avez essayez d\'entrer dans une partie déjà commencer') </script>
<?php }?>
<div class="container" style="background-color: #e9e9e9;">
    <div class="row">

        <div class="col-sm-2">
            <img onclick="createInput()"  src="<?= $pic['profile_pic'];  ?> " style="width: 60px;" alt="image profil ">
            <form id="form" class="form-group">
                <div>cliquer sur l'image pour la changer</div>
            </form>
            <p id="reply"></p>
        </div>

        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Voici ton profil <?= $_SESSION['username']; ?> </h4>
                    </div>
                <div class="col-sm-6">
                    <h3>STATISTIQUES</h3>

                    <p>Nombre de victoire <?= $ladders['win']; ?> </p>
                    <br>
                    <p>Nombre de partie total :<?= $ladders['total']; ?></p>
                    <br>
                    <p>Nombre de chef d'oeuvre : <?= $number ?> </p>
                </div>
                <div class="col-sm-6">

                    <p>Winrate :<?php if ($ladders['win']==0) {
                      echo '0 %</p>';
                    }
                    else {
                      echo $ladders['total']/$ladders['win'] .' %</p>';
                    } ?>
                    <br>
                    <p>Rank : <?= $ladders['rank']; ?></p>
                </div>
            </div>
        </div>

    </div>
</div>
<br>
<div class="container" style="background-color: #e9e9e9;">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <form action="changePassword.php" method="post">
                    <label for="pwd">Actual Password: <?php if (isset($_GET['errorpass'])) {
                            echo    $_GET['errorpass'];
                        } ?></b></label>
                    <input type="password" class="form-control" name="pwd">
                    <div class="form-group">
                        <br>
                        <label for="pwd">New Password:</label>
                        <input type="password" class="form-control" name="npwd">
                        <br>
                        <button type="submit" class="btn btn-dark">modifier</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <button type="button" onclick="exportdata()" class="btn btn-dark">export statistiques</button>
        <br>
        <br>

    </div>
</div>
</div>
<br>
<div class="container"  style="background-color: #e9e9e9;">
    <h1>Vos plus beau Chef-d'oeuvres</h1>

    <?php if ($number === 0){
      echo "vous n'avez aucun chef d'oeuvre";
    }
    else{
    foreach ($oeuvre as $item ){
        echo '<div class="row">';
        echo "<img src=".$item['path'] ." >";
        echo '</div>';
    }
  }
    ?>
</div>

<?php include("include/footer.php"); ?>
<script src="include/data.js"></script>
<script src="include/upload.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
