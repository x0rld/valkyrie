<?php
$maxsize=8388608;
if (isset($_FILES) && $_FILES['file']['error'] === 0)
{

    if (pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION)!='png'  && pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION)!='jpeg')
    {
        echo'ce n\'est pas une image png ou jpeg';
        exit;
    }
    // comparer extension avec mime
    $extension = pathinfo ($_FILES['file']['name'],PATHINFO_EXTENSION);
    $mime = mime_content_type ($_FILES ['file']['tmp_name']);

    preg_match("/($extension)/" , "$mime" , $matches , PREG_OFFSET_CAPTURE);
    if (empty($matches)) {
        echo 'le type mime et l\'extension sont différents';
        exit;
    }

    // test mime png et jpeg
    if (mime_content_type($_FILES['file']['tmp_name'])!='image/png'
        && mime_content_type($_FILES['file']['tmp_name'])!='image/jpeg')
    {
        echo'le mime n\'est pas celui d\'un png ou jpeg';
        exit;
    }

    //test taille max via variable PHP au cas ou le HTML soit modifié
    if ($_FILES['file']['size'] > $maxsize)
        echo'fichier trop volumineux';
}
else {
    // Redirection avec message d'erreur s'il y a une erreur
    echo codeToMessage($_FILES['file']['error']);
    exit;
}

// modification du nom de l'image upload pour que ce soit compliqué a retrouver
// en utilisant uniquid() qui se base sur la date et l'heure donc 2 id pareil sont impossible
$id=sha1(uniqid());


//création du nom de l'image
$name=$id . "." . pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);

//création du chemin de l'image pour enregistrer dans la BDD
$path="img/profile_pic/".$name;

include_once('include/config.php');
session_start();

$q=$db ->prepare("SELECT profile_pic from USER where  id_user=?");
$q->execute(array($_SESSION['id']));
$imagepath=$q->fetch();

unlink($imagepath['profile_pic']);

$q=$db-> prepare("UPDATE USER SET profile_pic=? where id_user=?");
$q->execute(array($path,$_SESSION['id']));




$temp=$_FILES['file']['tmp_name'];
if (move_uploaded_file($temp,  $path )) {
    echo $path;
    exit;
} else {
    echo'il y a eu une erreur a l\'upload veuillez réessayer ';
}

//fonction pour le renvoi d'erreur au transfert dans $_FILES
function codeToMessage($code)
{
    switch ($code) {
        case UPLOAD_ERR_INI_SIZE:
            $message = "La taille du fichier téléchargé excède la valeur de upload_max_filesize, configurée dans le php.ini";
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $message = "La taille du fichier téléchargé excède la valeur de MAX_FILE_SIZE, qui a été spécifiée dans le formulaire HTML";
            break;
        case UPLOAD_ERR_PARTIAL:
            $message = "Le fichier n'a été que partiellement téléchargé";
            break;
        case UPLOAD_ERR_NO_FILE:
            $message = "Aucun fichier n'a été téléchargé";
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $message = "Un dossier temporaire est manquant.";
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $message = "Échec de l'écriture du fichier sur le disque.";
            break;
        case UPLOAD_ERR_EXTENSION:
            $message = "Une extension PHP a arrêté l'envoi de fichier";
            break;

        default:
            $message = "Erreur inconnu";
            break;
    }
    return $message;
}
