<?php
if (isset($_GET['dir']) && isset($_GET['file'])) {
    $filepath = '/var/www/minifier.ytq.pl/uploads/' . $_GET['dir'] . '/' . $_GET['file'];
    $size = filesize($filepath);

    header('Content-Type: image/png');
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($filepath)); 
    header('Content-Transfer-Encoding: binary');
    header('Connection: Keep-Alive');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . $size);
    
    readfile($filepath);
    exit;
}