<?php
$url = $_SERVER['REQUEST_URI'];
$viewsFolder = './views/';
$baseFolder = '/BP15/';

switch (strtok($url, '?')){
    case $baseFolder:
        require $viewsFolder.'home.php';
        break;
    case $baseFolder.'/error':
    default:
        require $viewsFolder.'404.php';
}
