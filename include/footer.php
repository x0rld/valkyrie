<footer class="footer">
  <a href="#"><button type="button" class="btn btn-dark"><i class="fas fa-caret-up"></i> Revenir en haut</button></a>
  <a href="../legal_terme.html"><button type="button" class="btn btn-dark">Mentions legales</button></a>
<?php if(isset($_SESSION['id'])){
  echo   '<script type="text/javascript" src="../notif.js"></script>';
}  ?>
</footer>
