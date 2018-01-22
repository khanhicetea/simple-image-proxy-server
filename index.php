<?php

require_once './vendor/autoload.php';
require_once './helper.php';

$url = base64_decode($_GET['url']);
$w = intval($_GET['w']);
$h = intval($_GET['h']);
$md5 = md5($url);
$hash = md5($url.$w.$h);
$storage_image = __DIR__.'/storage/image';
$storage_cache = __DIR__.'/storage/cache';
$download_dir = $storage_image.'/'.substr($md5, 0, 2);
$img_path = $download_dir.'/'.$md5;

$manager = new Intervention\Image\ImageManager(['driver'=>'imagick']);

if (file_exists($storage_cache.'/'.$hash)) {
    $image = $manager->make($storage_cache.'/'.$hash);
    echo $image->response();
    die;
}

if (!is_dir($download_dir)) {
    mkdir($download_dir);
}

if (!file_exists($img_path)) {
    download_via_cURL($url, $img_path);
}

$image = $manager->make($img_path)->resize($w, $h);
$image->save($storage_cache.'/'.$hash);
echo $image->response();