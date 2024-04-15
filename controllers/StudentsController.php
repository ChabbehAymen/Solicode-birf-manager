<?php
require_once dirname(dirname(__FILE__)).'/repositories/StudentsRepository.php';
require_once dirname(dirname(__FILE__)).'/models/StudentsModel.php';

$studentsRepo = new StudentsRepository(new StudentsModel());

$allStudents = $studentsRepo->getAll($_SESSION['user']['id']);

empty($_GET['id'])?$studentsRepo = '':$studentProjects = $studentsRepo->getOne($_GET['id']);