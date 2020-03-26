<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.php"><img id="logo" src="../img/small_logo.png" style=" width: 100px ;" alt="logo du site"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../index.php">Valkyrie drAw</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../party/create_party.php">Création de partie</a>
        </li>
        <li class="nav-item">
          <?php
          require_once('config.php');

          if(isset($_SESSION['id']))
          {
            echo '<a  class="nav-link" href="../destroy.php">Deconnexion</a>';
          }
          else{
            echo '<a class="nav-link" href="../signup_login.php">Connexion</a>';
          }
          ?>

        </li>
        <?php  if(isset($_SESSION['id']))
        { ?>
          <li class="nav-item dropdown" style="background-color: white;">
            <div class="btn-group" id="notification" style="z-index:1;">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell" ></i><span class="badge badge-light" id="numbernotif" style="color:rgba(0,0,0,1);"></span> <!-- changer le numéro ici et la et par ici et par la -->
              </a>
              <!-- listes des invitations -->
              <div id="listnotification" class="dropdown-menu" aria-labelledby="navbarDropdown">
              </div>
            </div>
          </li>
        <?php }
        include("config.php");
        $q = $db->prepare('SELECT statut FROM USER WHERE id_user = ?');
        $q->execute([$_SESSION['id']]);
        $statut=$q->fetch(PDO::FETCH_ASSOC);
        if( $statut['statut'] == 1 ){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="../admin/admin.php">page administration</a>
          </li>

        <?php }
        ?>
      </ul>
      <?php if (isset($_SESSION['id'])){
        $picture = $db -> prepare('SELECT profile_pic FROM USER WHERE id_user = ?');
        $picture -> execute([$_SESSION['id']]);
        $pic = $picture->fetch(PDO::FETCH_ASSOC); ?>
        <a href='../profil.php'><img  style="width: 100px" src="<?php echo "../" .$pic['profile_pic'];  ?>"></a>
    <?php  } ?>

    <form class="form-inline my-2 my-lg-0">
      <input oninput="searchUser()" id="searching" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">

      <script src="../searchBar.js"></script>
    </form>

  </div>

</nav>
<p id="res" style="float:right;background-color:#f8f9fa;
margin-right:15px;padding:2px;
margin-bottom: 0px;
border-bottom-left-radius:2px;
border-bottom-right-radius:2px"></p><br>
</header>
