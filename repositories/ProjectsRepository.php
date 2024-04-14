<?php

require_once(dirname(dirname(__FILE__)).'/repositories/BaseRepository.php');

class ProjectsRepository extends BaseRepository
{
    public function __construct(ProjectsModel $projectsModel) {
        $this->model = $projectsModel;
    }
    
    public function getAll(mixed $params = null): array|bool
    {
        return $this->model->getAll($params);
    }

    public function getOne(mixed $params = null): mixed
    {
        return $this->model->getAvaliableYears();
    }

    public function idBriefAssined( int $teacherID, int $projectID){
        return $this->model->idBrifAssined($teacherID, $projectID);
    }

    public function getCompetences(int $idBrief){
        return $this->model->getCompeteces($idBrief);
    }

    public function update(mixed $params = null): array|bool
    {
        return false;
    }
    
}
