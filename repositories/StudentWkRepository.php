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

    public function getWorkingOnBrief(int $studentID){
        return $this->model->getCurrentWorkingBrief($studentID);
    }

    public function update(mixed $params = null): array|bool{
        return false;
    }
}
