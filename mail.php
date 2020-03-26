<?php
    $token = sha1(uniqid());

    if (!preg_match("#^[a-z0-9._-]+@(hotemail|live|msn).[a-z]{2,4}$#", $email)) // On filtre les serveurs qui rencontrent des bugs.
    {
        $passage_ligne = "\r\n";
    }
    else
    {
        $passage_ligne = "\n";
    }
    //=====DÃ©claration des messages au format texte et au format HTML.
    $message_txt = "Activation de votre compte valkyrie draw veuillez cliquer sur ce
	lien pour activer votre compte
        lien pour activer votre compte http://syrsam.com/active_account.php?token=. rawurlencode($token)&mail=rawencode($email) .'' '. 'cliquer pour activer";

    $message_html = '<html><head></head><body><b>Salut à tous</b>, Activation de votre compte valkyrie draw veuillez cliquer sur ce lien pour activer
    votre compte lien pour activer votre compte
    <a href="http://syrsam.com/active_account.php?token=' . rawurlencode($token)."&mail=".rawurlencode($email) .'">clique pour activer</a></body></html>';
    //==========

    //=====CrÃ©ation de la boundary
    $boundary = "-----=".md5(rand());
    //==========

    //=====DÃ©finition du sujet.
    $sujet = "Activation de votre compte valkryiedraw!";
    //=========

    //=====CrÃ©ation du header de l'email.
    $header = "From: \"ValkyrieDraw\"<valkyrie@syrsam.com>".$passage_ligne;
    $header.= "Reply-to: \"\"".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
    //==========

    //=====CrÃ©ation du message.
    $message = $passage_ligne."--".$boundary.$passage_ligne;
    //=====Ajout du message au format texte.
    $message.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_txt.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary.$passage_ligne;
    //=====Ajout du message au format HTML
    $message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    //==========

    //=====Envoi de l'e-mail

     mail($email,$sujet,$message,$header);
    //==========

    $expire= time()+  60*60;
    $req=$db->prepare("INSERT INTO ACCOUNT_ACTIVATION (token,expire_date,mail) VALUES(:token,:expire,:mail)");
    $req->execute(array(
        'token'=>$token,
        'mail'=>$email,
        'expire'=>$expire
    ));

    header('Location:signup_login.php?error=mail envoyé');
