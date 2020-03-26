<?php
/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 30/03/2019
 * Time: 17:26
 */

$base64_string=$_POST['data'];
$output_file=uniqid();
$output_file.='.png';

base64_to_jpeg($base64_string,$output_file);
function base64_to_jpeg($base64_string, $output_file) {
    // open the output file for writing
    $ifp = fopen( $output_file, 'wb' );

    // séparer le type d'image de la donnée
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == données en base64
    $data = explode( ',', $base64_string );

    // we could add validation here with ensuring count( $data ) > 1
    fwrite( $ifp, base64_decode( $data[ 1 ] ) );

    // clean up the file resource
    fclose( $ifp );

    return $output_file;
}

echo '<img src="'.$output_file.'">';
