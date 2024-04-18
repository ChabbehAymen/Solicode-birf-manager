<?php
require_once(dirname(dirname(__FILE__)).'/repositories/BaseRepository.php');

class StudentWkRepository extends BaseRepository
{

    public function __construct(StudentWorkStationModel $studentModel) {
        $this->model = $studentModel;
    }

    public function getAll(mixed $params = null): array|bool{
        return $this->model->getAllProjects($params);
    }

    public function getOne(mixed $params = null): mixed{
        return $this->model->getBrief($params);
    }

    public function getStudentData(int $studentID){
        return $this->model->getStudentAccount($studentID);
    }

    public function getWorkingOnBriefs(int $studentID){
        return $this->model->getWorkingOnBriefs($studentID);
    }

    public function getCompetence(int $breifID){
        return $this->model->getCompetence($breifID);
    }

    public function getBreif(int $studentID, int $briefID){
        return $this->model->getBrief(array('ID'=>$studentID, 'bID'=>$briefID));
    }

    public function update(mixed $params = null): array|bool{
        return false;
    }
}