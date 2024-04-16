<?php
require_once(dirname(dirname(__FILE__)).'/repositories/BaseRepository.php');

class StudentsRepository extends BaseRepository
{
    public function __construct(StudentsModel $studentsModel) {
        $this->model = $studentsModel;
    }
    
    public function getAll(mixed $params = null): array|bool
    {
        return $this->model->getAll($params);
    }
    public function getOne(mixed $params = null): mixed
    {
        return $this->model->getOne($params);
    }

    public function getCompetences(int $idBreif){
        return $this->model->getComp($idBreif);
    }

    public function update(mixed $params = null): array|bool
    {
        return false;
    }
}
