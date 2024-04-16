<?php
$url = $_SERVER['REQUEST_URI'];
$viewsFolder = './views/';
$baseFolder = '/BP15/';

switch (strtok($url, '?')){
    case $baseFolder:
        require $viewsFolder.'splashscreen.php';
        break;
    case $baseFolder.'login':
        require $viewsFolder . 'login.php';
        break;
    case $baseFolder.'error':
        require $viewsFolder.'404.php';
        break;
    case $baseFolder.'main':
        require $viewsFolder.'teacherMainPage.php';
        break;
    case $baseFolder.'mainStudent':
        require $viewsFolder.'StudentPage.php';
        break;
    case $baseFolder.'UpdateStatus':
        require $viewsFolder.'layout-student/UpdateStatus.php';
        break;
    default:
        require $viewsFolder.'404.php';
}
