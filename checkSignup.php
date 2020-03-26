<?php
session_start();
    	function verifEmail($email){
          return  filter_var($email, FILTER_VALIDATE_EMAIL);
        }


        function verifPseudo($pseudo){
            if(strlen($pseudo)<=4 || strlen($pseudo)>20)

                  return false;
             else
                  return true;
        }

        function verifPasswd($passwd){
            if(strlen($passwd)<8 || strlen($passwd)>20 && !preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$#', $passwd) )
    	          return false;
            else
                return true;
        }

        function sameStr($str,$vstr)
          {
            if($str!=$vstr)
              return false;
            else
              return true;
          }


        function capchatCheck($captcha)
        {
            $captcha =strtoupper($_POST['captcha']);
            $captchaS =strtoupper($_SESSION['captcha']);

            if ($captcha != $captchaS) {
              return false;
          }
          else {
            return true;
          }
        }

  $fields=array('pseudo','email','vemail','pwd','vpwd','captcha');


foreach ($fields as $value)
{
		if(!isset($_POST[$value]) || empty($_POST[$value]))
	{
		header("Location:signup_login.php?error=".$value);
			exit;
	}
	       if(!verifEmail($_POST['email']))
         {
            header("Location:signup_login.php?error=email");
            exit;
          }
        if(!sameStr($_POST['email'],$_POST['vemail']))
          {
              header("Location:signup_login.php?error=same_email");
              exit;
          }


        if(!verifPseudo($_POST['pseudo']))
          {
            header("Location:signup_login.php?error= pseudo");
            exit;
          }
        if(!verifPasswd($_POST['pwd']))
          {
                  header("Location:signup_login.php?error= password");
            exit;
          }
        if (!sameStr($_POST['pwd'], $_POST['vpwd']))
          {
            header("Location:signup_login.php?error= same_password");
            exit;
          }

        /*  if(!capchatCheck($_POST['captcha']))
          {
            header("Location:signup_login.php?error= captcha ". $_SESSION['captcha']);
            exit;
          }*/

    }
	$pass=password_hash($_POST['pwd'], PASSWORD_ARGON2ID);
    $email=$_POST['email'];
    $username=$_POST['pseudo'];

	require('include/config.php');

             $q= $db->prepare("INSERT into USER (mail,username,password) VALUES (:email, :username,:password)");
             $q->execute(array(
                 ':email'=>$email,
                 ':username'=>$username,
                 'password'=>$pass
             ));

include ('mail.php');
