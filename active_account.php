<?php
include("include/config.php");
$req = $db->prepare("SELECT token,expire_date from ACCOUNT_ACTIVATION where mail=?");
$req->execute(array($_GET['mail']));
$res= $req->fetch(PDO::FETCH_ASSOC);

if($res['token']===$_GET['token']) {
 $q = 'UPDATE USER  set active = 1 WHERE mail  = ?';

 $req = $db->prepare($q);
 $req->execute([$_GET['mail']]);

 $q= $db->prepare('DELETE from ACCOUNT_ACTIVATION where token = ? ');
 $q->execute(array($res['token']));

 echo '<h3> Votre compte a été activé </h3>';
exit;
}
if (empty($res)) {
    print_r($res);
 echo '<h3> votre compte est déjà activé!</h3>';
 exit;
}
$email=$_GET['mail'];
include ('mail.php');
