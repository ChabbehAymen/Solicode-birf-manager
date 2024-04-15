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

    // var_dump($_POST);
    $imgFileName = './views/images/'.$_FILES['img-file']['name'];
    $pdfFileName = './views/files/'.$_FILES['atatchment']['name'];

    $imgTempFile = $_FILES['img-file']['tmp_name'];
    $pdfTempFile = $_FILES['atatchment']['tmp_name'];

    var_dump($imgFileName);

    if (move_uploaded_file($imgTempFile, $imgFileName) && move_uploaded_file($pdfTempFile,$pdfFileName)) {

        $msg = "Image uploaded successfully";
    } else {

        $msg = "Failed to upload image";
    }
}
