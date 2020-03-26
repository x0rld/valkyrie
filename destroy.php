<?php
session_start();
session_destroy();
unset($_SESSION);
header('Location:signup_login.php');
