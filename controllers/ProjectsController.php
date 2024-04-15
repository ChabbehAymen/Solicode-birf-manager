<?php
require_once(dirname(dirname(__FILE__)) . "/models/ProjectsModel.php");
require_once(dirname(dirname(__FILE__)) . "/repositories/ProjectsRepository.php");

$projectsRepo = new ProjectsRepository(new ProjectsModel());
$allBrifs = $projectsRepo->getAll(isset($_POST['year-select']) ? isset($_POST['year-select']) : date('Y'));
$avaliableYears = $projectsRepo->getOne();
$avaliableCompetemces = $projectsRepo->getCompetences();
function isBriefAssigned(int $briefID)
{
    $projectsRepo = new ProjectsRepository(new ProjectsModel());
    return $projectsRepo->idBriefAssined($_SESSION['user']['id'], $briefID);
}

function getBriefCompetences(int $idBrief)
{
    $projectsRepo = new ProjectsRepository(new ProjectsModel());
    return $projectsRepo->getCompetencesByBrief($idBrief);
}

if (isset($_POST['create'])) {

    $imgFileName = dirname(dirname(__FILE__)).'/views/images/'.$_FILES['img-file']['name'];
    $pdfFileName = dirname(dirname(__FILE__)).'/views/files/'.$_FILES['atatchment']['name'];

    $imgTempFile = $_FILES['img-file']['tmp_name'];
    $pdfTempFile = $_FILES['atatchment']['tmp_name'];
    move_uploaded_file($pdfTempFile,$pdfFileName); // upload pdf
    move_uploaded_file($imgTempFile, $imgFileName);// upload imge
}
