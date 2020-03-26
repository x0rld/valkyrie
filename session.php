<?php
session_start();
if (!isset($_SESSION['id'])){
    header('location: ../signup_login.php');
    exit;
}
