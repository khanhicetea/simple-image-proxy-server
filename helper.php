<?php

function download_via_cURL($url, $dest) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, urlencode($url));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($ch);
    $error = curl_error($ch);
    curl_close ($ch);

    $file = fopen($dest, "w+");
    fputs($file, $data);
    fclose($file);
}