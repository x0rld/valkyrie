<?php
session_start();
if (empty($_POST['pwd']) && empty($_POST['npwd']) ){
    header('Location:profil.php?errorpass=mot de passe actuel ou nouveau vide');
    exit;
}

include('include/config.php');

$sth = $db->prepare("SELECT password FROM user where id_user=?");
$sth -> execute(array($_SESSION['id']));
$result = $sth->fetch(PDO::FETCH_ASSOC);
if (password_verify($_POST['pwd'],$result['password']))
{
    $hash=password_hash($_POST['npwd'],PASSWORD_ARGON2ID);
    $sth = $db->prepare("UPDATE USER SET password=? WHERE id_user=?");
    $sth -> execute(array($hash,$_SESSION['id']));

    header('Location:profil.php?errorpass=changement pris en compte');
    exit;
}