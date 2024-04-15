<?php
require dirname(dirname(__FILE__)) . '/models/DbConfModel.php';
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
        $query = $this->pdo->prepare("SELECT * FROM FORMATEUR WHERE ID_FORMATEUR = " . $id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllAssignedBrifs(int $teacherID): array | bool
    {
        $query = $this->pdo->prepare("SELECT TITRE FROM REALISER INNER JOIN BRIEF USING (ID_BRIEF) WHERE ID_FORMATEUR = :ID GROUP BY BRIEF.TITRE;");
        $query->execute(array('ID' => $teacherID));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStudentsBrifStatus(int $teacherID, string $brifTitel): array | bool
    {
        $sql = $this->pdo->prepare("SELECT APPRENANT.NOM, APPRENANT.PRENOM, REALISER.ETAT, REALISER.DATE_AJOUTE FROM REALISER 
                                    INNER JOIN BRIEF USING (ID_BRIEF) INNER JOIN BP15.APPRENANT USING(ID_APPRENANT) 
                                    WHERE ID_FORMATEUR = :ID AND BRIEF.TITRE = :TITRE");
        $sql->execute(array('ID' => $teacherID, "TITRE" => $brifTitel));
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
