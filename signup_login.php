<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>inscription/connexion</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="css.css">
</head>
<body>
  <?php include_once("include/header.php"); ?>
  <div>
    <!-- -->
  </div>
  <div class="container" style="background-color: #e9e9e9;">
    <?php if (isset($_GET['error'])) {
      echo "cet input est faux".$_GET['error'];
    } ?>

    <form method="post" action="checkSignup.php"><!--formulaire d'inscription -->
      <div class="form-group">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <label for="pseudo">Pseudo
              <input type="text" class="form-control" name="pseudo" value="">
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="email">Email address:<!--Premiere boite Email -->
              <input type="email" class="form-control" name="email" value="">
                </label>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="email">Confirm Email address<!--Deuxieme servant a la verification boite Email -->
              <input type="email" class="form-control" name="vemail" value="">
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="pwd">Password:Il faut une majuscule minuscule <br>un chiffre et 8 caractères min
                  <!--Premiere boite password -->
                <input type="password" class="form-control" name="pwd">
                </label>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="pwd">verification Password: <!--Deuxieme boite verification password -->
                <input type="password" class="form-control" name="vpwd">
                </label>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <img src="captcha/captcha.php" alt="captcha"><!--captcha-->
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <label for="pwd">captcha:
                <input type="text" placeholder="taper le captcha" name="captcha">
                </label>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-dark">inscription</button>
        </div>
      </div>
    </div>
  </form>
  <!--formulaire de connexion -->
  <div class="container" style="background-color: #e9e9e9;">
    <div class="row">
      <div class="col-sm-6">
        <form action="connect.php" method="POST">
          <div class="form-group">

            <label for="text">Email <b style="color: red"><?php if (isset($_GET['errorlogin'])) {
                        echo $_GET['errorlogin'];
                    } ?></b> </label>
            <input type="email" class="form-control" name="email">
          </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" class="form-control" name="pwd">
              </div>
            </div>
            <input type="submit"  value="se connecter" class="btn btn-dark">
        </form>
      </div>

  </div>

<?php include("include/footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
