<?php
require_once(dirname(dirname(__FILE__)) . "/models/ProjectsModel.php");
require_once(dirname(dirname(__FILE__)) . "/repositories/ProjectsRepository.php");

$projectsRepo = new ProjectsRepository(new ProjectsModel());
$allBrifs = $projectsRepo->getAll(isset($_POST['year-select'])?isset($_POST['year-select']):date('Y'));
$avaliableYears = $projectsRepo->getOne(); 

function isBriefAssigned(int $briefID){
    $projectsRepo = new ProjectsRepository(new ProjectsModel());
    return $projectsRepo->idBriefAssined($_SESSION['user']['id'], $briefID);
} 

