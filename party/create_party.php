<?php require_once '../session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Création de la partie</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="../css.css">
</head>
<body>
  <?php
  include("../include/header.php");
  ?>
  <main>
    <div class="container" width=100% height=100% style="background-color:rgba(255,255,255,1);">
      <div class="row">
        <div style="text-align:center;">
          <p> Creation de la partie </p>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col">
          <select id="safe" name="" oninput="typeParty()">
            <option value="PublicN" selected='selected'>Partie Publique Normal</option>
            <option value="PublicR" >Partie Publique Ranked</option>
            <option value="Private" >Partie Privé</option>
          </select>
        </div>

        <div class="col">
          <p id='type'> Type de Partie : </p>
          <br>
        </div>
      </div>
      <div class="row">
        <div class="col" id='listsandranked'>

        </div>
      </div>
      <div class="row">
        <div class="col" style="text-align:center;">
          <input type="button" onclick="createParty()" value="Creer la partie !">
        </div>
      </div>
    </div>
  </main>
  <?php include("../include/footer.php");?>
  <script src="create_party.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
