<?php
$url = $_SERVER['REQUEST_URI'];
$viewsFolder = './views/';
$baseFolder = '/BP15/';

switch (strtok($url, '?')){
    case $baseFolder.'login':
        require $viewsFolder . 'login.php';
        break;
    case $baseFolder.'/error':
        require $viewsFolder.'404.php';
        break;
    default:
        require $viewsFolder.'404.php';
}
