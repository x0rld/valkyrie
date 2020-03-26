<?php
/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 31/03/2019
 * Time: 23:15
 */
if (empty($_POST['email']) && empty($_POST['pwd']) ){
    header('Location:signup_login.php?errorlogin=mot de passe ou mail vide');
    exit;
}

require('include/config.php');

$sth = $db->prepare("SELECT id_user,mail,username,password FROM USER where mail=?");
$sth -> execute(array($_POST['email']));
$result = $sth->fetch(PDO::FETCH_ASSOC);
if (password_verify($_POST['pwd'],$result['password']) && $_POST['email']===$result['mail'])
{

    session_start();
    $_SESSION['id']=$result['id_user'];
    $_SESSION['username']=$result['username'];
    header('Location:profil.php');
    exit;
}
else {
  header('Location:signup_login.php?errorlogin=mot de passe ou mail faux');
  exit;
}
