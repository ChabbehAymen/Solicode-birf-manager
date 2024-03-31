<?php
require_once(dirname(dirname(__FILE__)) ."/models/LoginModel.php");
require_once(dirname(dirname(__FILE__)) ."/Helpers/Router.php");
require_once(dirname(dirname(__FILE__)) ."/Helpers/ReportHandler.php");
session_start();

$model = new LoginModel();
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $teacher = $model->getTeachersByEmail($email);
    $student = $model->getStudentByEmail($email);

    if(!empty($teacher) || $teacher !== false){

        if ($password === $teacher["MOT_DE_PASSE"]) {
            $_SESSION['user'] = ['type'=>'T','id'=>$teacher["ID_FORMATEUR"]];
            // login to dashboard
        }else{
            ReportHandler::setRepoet(ReportHandler::$INCORRECT_PASS);
        }
    }elseif(!empty($student) || $student !== false){
        if ($password === $student["MOT_DE_PASSE"]) {
            $_SESSION['user'] = ['type'=>'S','id'=>$student["ID_APPRENANT"]];
            // login to dashboard
        }else{
            ReportHandler::setRepoet(ReportHandler::$INCORRECT_PASS);
        }
    }
    ReportHandler::setRepoet(ReportHandler::$NO_USER_FOUND);
}
Router::route("login");


