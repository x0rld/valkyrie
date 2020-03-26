<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="css.css">



  <title>Login/Sign up</title>
</head>
<body>
  <?php include("header.php") ?>


  <div class="container" style="background-color: #e9e9e9;">

    <form method="post" action="checkSignup.php"><!--formulaire d'inscription -->
      <div class="form-group">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div>
                <?php if (isset($_GET['error'])) {
                  echo "this input is false: ".$_GET['error'];
                } ?>              
              </div >
              <br>
              <label for="pseudo">Pseudo</label>
              <input type="text" class="form-control" name="pseudo" value="">
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="email">Email address:</label> <!--Premiere boite Email -->
              <input type="email" class="form-control" name="email" value="">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="email">Confirm Email address</label> <!--Deuxieme servant a la verification boite Email -->
              <input type="email" class="form-control" name="vemail" value="">
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="pwd">Password:</label><!--Premiere boite password -->
                <input type="password" class="form-control" name="pwd">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="pwd">verification Password:</label> <!--Deuxieme boite verification password -->
                <input type="password" class="form-control" name="vpwd">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <img src="captcha/captcha.php" alt="captcha"><!--captcha-->
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <label for="pwd">captcha:</label>
                <input type="text" placeholder="taper le captcha" name="captcha">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-dark">inscription</button>
        </div>
      </div>
    </div>
  </form>

</div>

<div class="container" id="log_in" style="background-color: #e9e9e9;">
  <div class="row">
    <div class="col-sm-6">
      <form> <!--formulaire de connection -->
        <div class="form-group">
          <label for="text">Email</label>
          <input type="password" class="form-control" name="pwd">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="pwd">Password</label>
          <input type="password" class="form-control" name="vpwd">
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-dark">Se connecter</button>

  </form>
</div>
</div>
<?php include("footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
