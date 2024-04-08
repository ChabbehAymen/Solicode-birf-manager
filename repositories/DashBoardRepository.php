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
    public function update(mixed $params = null): array|bool
    {
        return false;
    }
}
