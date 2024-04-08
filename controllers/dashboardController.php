<?php
require_once dirname(dirname(__FILE__)).'/repositories/DashBoardRepository.php';
require_once dirname(dirname(__FILE__)).'/models/DashboardModel.php';

$dashBoardRepo = new DashBoardRepository(new DashboardModel);
$getTeacherName = $dashBoardRepo->getOne($_SESSION['user']['id']);

