<?php

 $base64_string=$_POST['data'];
 $output_file='../img/tmpdraw/';
 $output_file.=uniqid();
 $output_file.='.png';

 base64_to_png($base64_string,$output_file);
 function base64_to_png($base64_string, $output_file) {
     include_once '../include/config.php';
     // open the output file for writing
     $ifp = fopen( $output_file, 'wb' );

     // séparer le type d'image de la donnée
     // $data[ 0 ] == "data:image/png;base64"
     // $data[ 1 ] == données en base64
     $data = explode( ',', $base64_string );

     // on écrit dans le fichier la deuxième partie du tableau généré au dessus
     // qui contient les données de l'image( $data ) > 1
     fwrite( $ifp, base64_decode( $data[ 1 ] ) );

     // clean up the file resource
     fclose( $ifp );
     $q= $db ->prepare( 'SELECT draw FROM GAMES where id_game = ? ');
     $q->execute([$_POST['id_game']]);
     $old=$q->fetch();
     if ($old['draw']!== '../img/empty_canvas.png')
     unlink($old['draw']);

     $q= $db ->prepare( 'UPDATE GAMES SET draw = ? where id_game = ?');
     $q->execute([$output_file,$_POST['id_game']]);

     echo $output_file;
 }
