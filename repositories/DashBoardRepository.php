<?php

require_once(dirname(dirname(__FILE__)).'/repositories/BaseRepository.php');

class DashBoardRepository extends BaseRepository
{
    public function __construct(DashboardModel $dashboardModel) {
        $this->model = $dashboardModel;
    }
    
    public function getAll(mixed $params = null): array|bool
    {
        return $this->model->getAll($params);
    }
    public function getOne(mixed $params = null): mixed
    {
        return $this->model->getOne($params);
    }

    public function getAllAssignedBrifs(int $teacherID): array | bool
    {
        return $this->model->getAllAssignedBrifs($teacherID);
        
    }

    public function getStudentsStatusByBrif(int $teacherID,string $brif): array | bool
    {
        return $this->model->getStudentsBrifStatus($teacherID, $brif);
    }

    // There is no use for update function in this repo
    public function update(mixed $params = null): array|bool
    {
        return false;
    }
}
