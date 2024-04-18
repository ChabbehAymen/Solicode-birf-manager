<?php
require_once dirname(dirname(__FILE__)).'/repositories/StudentWkRepository.php';
require_once dirname(dirname(__FILE__)).'/models/StudentWorkStationModel.php';

$studentWkRepo = new StudentWkRepository(new StudentWorkStationModel());

$studentAcount = $studentWkRepo->getStudentData($_SESSION['user']['id']);
$allBriefs = $studentWkRepo->getAll(intval($_SESSION['user']['id']));
$workingOnBrief = $studentWkRepo->getWorkingOnBriefs($_SESSION['user']['id']);
$brief = isset($_GET['briefid'])?$brief = $studentWkRepo->getBreif($_SESSION['user']['id'], $_GET['briefid'])[0]:null;

function getBriefByID(){
$studentWkRepo = new StudentWkRepository(new StudentWorkStationModel());
return $studentWkRepo->getOne(array('ID'=>intval($_SESSION['user']['id']), $_GET['briefID']));
}
function getCompetences(int $briefID){
    $studentWkRepo = new StudentWkRepository(new StudentWorkStationModel());
    return $studentWkRepo->getCompetence($briefID);
}

//if (isset($_POST['start'])){
//    $briefID = $_POST['briefId'];
//    header("Location: ./mainStudent?page=onBoard&briefid=$briefID");
//}