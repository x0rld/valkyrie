<?php
session_start();
$id=$_SESSION['id'];
    include('include/config.php');
    $sth = $db->query("SELECT mail,username,statut,banned,profile_pic,active FROM USER where id_user=$id");
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    $output_file = 'data';
    $output_file .= ".csv";


    $fp = fopen($output_file, 'w');

        fputcsv($fp, $result, ";");

    fclose($fp);
    echo $output_file;
