<?php
if($_SERVER['SERVER_NAME']=='codegdrive' || $_SERVER['SERVER_NAME']=='loli'){

    try{
        $db = new PDO('mysql:host=localhost;dbname=valkyrie;charset=utf8', 'root', '',
            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    }
    catch (PDOException $e)
    {
        echo "Error ". $e->getMessage();
    }

}
else

try{
    $db = new PDO('mysql:host=localhost;dbname=valkyrie;charset=utf8', 'root', 'JSsuperieurC',
        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

}
catch (PDOException $e)
{
    echo "Error ". $e->getMessage();
}
