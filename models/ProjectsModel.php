<?php

require_once(dirname(dirname(__FILE__))."/models/DbConfModel.php");

class ProjectsModel extends DbConfModel
{

    function getAll(string $year){
        $query = $this->pdo->prepare("SELECT ID_BRIEF, TITRE, BRIEF.DATE_AJOUTE, PIECE_JOINTE, (SELECT NOM FROM FORMATEUR WHERE FORMATEUR.ID_FORMATEUR = BRIEF.ID_FORMATEUR) AS T FROM BRIEF WHERE YEAR(BRIEF.DATE_AJOUTE) = :tYear");
        $query->execute(array('tYear' => $year));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getAvaliableYears(){
        $query = $this->pdo->prepare("SELECT DISTINCT YEAR(DATE_AJOUTE) AS Y FROM BRIEF");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function idBrifAssined(int $teacherId, int $idBrief) : bool
    {
        $query = $this->pdo->prepare("SELECT DISTINCT BRIEF.ID_BRIEF FROM REALISER INNER JOIN BRIEF USING (ID_BRIEF) INNER JOIN APPRENANT USING (ID_APPRENANT) INNER JOIN GROUPE USING(ID_GROUPE) WHERE APPRENANT.ID_GROUPE = (SELECT ID_GROUPE FROM GROUPE WHERE GROUPE.ID_FORMATEUR = :ID) AND ID_BRIEF = :ID_BRIEF");
        $query->execute(array('ID'=>$teacherId, 'ID_BRIEF'=>$idBrief));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return !empty($result) || $result === true;
    }

    function getCompetecesByBrief(int $idBrief): array|bool
    {
        $query = $this->pdo->prepare("SELECT NOM AS N FROM COMPETENCE INNER JOIN CONCERNE USING(ID_COMPETENCE) WHERE ID_BRIEF = :ID");
        $query->execute(array('ID'=>$idBrief));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getCompetences(): array|bool
    {
        $query = $this->pdo->prepare("SELECT NOM , DESCRIPTION FROM COMPETENCE");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
