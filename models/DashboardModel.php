<?php
require dirname(dirname(__FILE__)).'/models/DbConfModel.php';
class DashboardModel extends DbConfModel
{

    public function getAll(string $brif = 'all')
    {
        $query = $this->pdo->prepare("SELECT * FROM REALISER WHERE ID_FORMATEUR = ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getOne(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM FORMATEUR WHERE ID_FORMATEUR = ".$id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
