<?php session_start();  ?>
<header class="topnav">
  <div class="row">
    <div class="col-sm-2">
      <img id="logo" src="http://51.77.231.2/img/small_logo.png" alt="logo du site">
    </div>

    <div id="link" class="col" >
      <a><button type="button" id="up" class="btn btn-dark"><i class="fa fa-home" aria-hidden="true"></i>Home</button></a>
      <br>
      <a  class="fa fa-refresh" href="#start_party"><button type="button" id="down" class="btn btn-dark"><div class="spinner-grow spinner-grow-sm" role="status">
        <span class="sr-only">Loading...</span>
      </div> CrÃ©ation d'une partie</button></a>
    </div>

    <div class="col">
      <div class="search-container" >
        <form action="/action_page.php">
          <input class="searchbar" type="search" placeholder="Search..." name="search"/>
          <button class="searchbar" type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </div>

    <div class="col">

       <a href="signup_login.php">Connexion</a>

      ?>
    </div>
    <div class="col">
      <div class="">
        <div class="btn-group" id="notification" style="position:fixed;z-index:1;">
          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:rgba(35,39,43,1)">
            <i class="fas fa-bell" ></i><span class="badge badge-light" style="color:rgba(0,0,0,1);">3</span>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">partie1</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">partie2</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">partie3</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</header>
