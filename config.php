<?php
try{
$db = new PDO('mysql:host=localhost;dbname=valkyrie;charset=utf8', 'root', 'ThomasYanisArthur');

}
 catch (PDOException $e)
 {
        echo "Error ". $e->getMessage();
 }


