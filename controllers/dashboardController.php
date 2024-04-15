<?php
require_once dirname(dirname(__FILE__)).'/repositories/DashBoardRepository.php';
require_once dirname(dirname(__FILE__)).'/models/DashboardModel.php';

$dashBoardRepo = new DashBoardRepository(new DashboardModel);
$getTeacherName = $dashBoardRepo->getOne($_SESSION['user']['id']);
$allAssignedBrifs = $dashBoardRepo->getAllAssignedBrifs($_SESSION['user']['id']);
$studentsStatus = $dashBoardRepo->getStudentsStatusByBrif($_SESSION['user']['id'], $allAssignedBrifs[0]['TITRE']);
if (isset($_POST['selected-brif'])) {
    $studentsStatus = $dashBoardRepo->getStudentsStatusByBrif($_SESSION['user']['id'], $_POST['selected-brif']);
}


