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

    public function getCompetencesByBrief(int $idBrief){
        return $this->model->getCompetecesByBrief($idBrief);
    }

    public function getCompetences(){
        return $this->model->getCompetences();
    }


    public function insertBrief(array $breif){
        return $this->model->insertBrief($breif);
    }

    public function insertCompetance(int $idComp){
        return $this->model->insertCmpt($idComp);
    }

    public function assigneProject(int $tID, int $idBrief)
    {
        foreach ($this->model->getAllstudents($tID) as $student) {
            $this->model->assigneBrief($idBrief, $student['ID']);
        }
    }

    public function update(mixed $params = null): array|bool
    {
        return false;
    }
    
}
