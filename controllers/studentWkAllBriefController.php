<?php
require_once dirname(dirname(__FILE__)).'/repositories/StudentWkRepository.php';
require_once dirname(dirname(__FILE__)).'/models/StudentWorkStationModel.php';

$studentWkRepo = new StudentWkRepository(new StudentWorkStationModel());

$studentAcount = $studentWkRepo->getStudentData($_SESSION['user']['id']);
$allBriefs = $studentWkRepo->getAll(intval($_SESSION['user']['id']));
$workingOnBrief = $studentWkRepo->getWorkingOnBrief($_SESSION['user']['id']);

function getBriefByID(){
$studentWkRepo = new StudentWkRepository(new StudentWorkStationModel());
return $studentWkRepo->getOne(array('ID'=>intval($_SESSION['user']['id']), $_GET['briefID']));
}
function getCompetences(int $briefID){
    $studentWkRepo = new StudentWkRepository(new StudentWorkStationModel());
    return $studentWkRepo->getCompetence($briefID);
}