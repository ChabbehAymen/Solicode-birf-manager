<?php
require_once(dirname(dirname(__FILE__)) . "/models/LoginModel.php");
require_once(dirname(dirname(__FILE__)) . "/Helpers/Router.php");
require_once(dirname(dirname(__FILE__)) . "/Helpers/ReportHandler.php");
session_start();

$model = new LoginModel();
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $teacher = $model->getTeachersByEmail($email);
    $brief = $model->getStudentByEmail($email);


    if (!empty($teacher) || $teacher !== false) {
        if ($password === $teacher["MOT_DE_PASSE"]) {
            $_SESSION['user'] = ['type' => 'T', 'id' => $teacher["ID_FORMATEUR"]];
            Router::route("main");
        } else {
            setInccorectPass();
        }
    } elseif (!empty($brief) || $brief !== false) {
        if ($password === $brief["MOT_DE_PASSE"]) {
            $_SESSION['user'] = ['type' => 'S', 'id' => $brief["ID_APPRENANT"]];
            Router::route("mainStudent");
        } else {
            setInccorectPass();
        }
    } elseif ((empty($teacher) || $teacher === false) && (empty($brief) || $brief === false)) {
        ReportHandler::setRepoet(ReportHandler::$NO_USER_FOUND);
        Router::route("login");
    }
}

function setInccorectPass()
{
    ReportHandler::setRepoet(ReportHandler::$INCORRECT_PASS);
    Router::route("login");
}
