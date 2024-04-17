<?php

require_once(dirname(dirname(__FILE__)) . "/models/DbConfModel.php");

class ProjectsModel extends DbConfModel
{

    function getAll(string $year)
    {
        $query = $this->pdo->prepare("SELECT ID_BRIEF, TITRE, BRIEF.DATE_AJOUTE, PIECE_JOINTE,IMAG,DATE_DEBUT, (SELECT NOM FROM FORMATEUR WHERE FORMATEUR.ID_FORMATEUR = BRIEF.ID_FORMATEUR) AS T FROM BRIEF WHERE YEAR(BRIEF.DATE_AJOUTE) = :tYear");
        $query->execute(array('tYear' => $year));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function briefDates(int $briefID){
        $query = $this->pdo->prepare("SELECT DATE(DATE_DEBUT+DURATION) AS END_DATE, IF(DATEDIFF( DATE(DATE_DEBUT+DURATION), NOW()) < 0, 'ENDED', DATEDIFF( DATE(DATE_DEBUT+DURATION), NOW())) AS REST_DAYS
        FROM REALISER INNER JOIN BRIEF USING(ID_BRIEF)
        WHERE ID_BRIEF = :ID");
        $query->execute(array('ID' => $briefID));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getAvaliableYears()
    {
        $query = $this->pdo->prepare("SELECT DISTINCT YEAR(DATE_AJOUTE) AS Y FROM BRIEF");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function idBrifAssined(int $teacherId, int $idBrief): bool
    {
        $query = $this->pdo->prepare("SELECT DISTINCT BRIEF.ID_BRIEF FROM REALISER INNER JOIN BRIEF USING (ID_BRIEF) INNER JOIN APPRENANT USING (ID_APPRENANT) INNER JOIN GROUPE USING(ID_GROUPE) WHERE APPRENANT.ID_GROUPE = (SELECT ID_GROUPE FROM GROUPE WHERE GROUPE.ID_FORMATEUR = :ID) AND ID_BRIEF = :ID_BRIEF");
        $query->execute(array('ID' => $teacherId, 'ID_BRIEF' => $idBrief));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return !empty($result) || $result === true;
    }

    function getCompetecesByBrief(int $idBrief): array|bool
    {
        $query = $this->pdo->prepare("SELECT NOM AS N FROM COMPETENCE INNER JOIN CONCERNE USING(ID_COMPETENCE) WHERE ID_BRIEF = :ID");
        $query->execute(array('ID' => $idBrief));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getCompetences(): array|bool
    {
        $query = $this->pdo->prepare("SELECT ID_COMPETENCE  ,NOM , DESCRIPTION FROM COMPETENCE");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    // SELECT COUNT(BRIEF.ID_BRIEF) FROM BRIEF
    function insertBrief(array $brief)
    {
        $query = $this->pdo->prepare("INSERT INTO BRIEF VALUE (DEFAULT, :tID, :title, :duration, :attatchment, :date_ajout)");
        return $query->execute(array('tID' => $brief['id'], 'title' => $brief['title'], 'duration' => $brief['duration'], 'attatchment' => $brief['att'], 'date_ajout' => $brief['date']));
    }

    private function getLastINsertedBriefID()
    {
        $query = $this->pdo->prepare("SELECT COUNT(BRIEF.ID_BRIEF) AS C FROM BRIEF");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertCmpt(int $compID)
    {
        $query = $this->pdo->prepare("INSERT INTO CONCERNE VALUES(:idB, :idC);");
        $idBrief = $this->getLastINsertedBriefID()['C'];
        return $query->execute(array('idB' => $idBrief, 'idC' => $compID));
    }

    public function getAllstudents(int $tID)
    {
        $query = $this->pdo->prepare("SELECT ID_APPRENANT AS ID FROM APPRENANT INNER JOIN GROUPE USING (ID_GROUPE) WHERE GROUPE.ID_FORMATEUR = :ID");
        $query->execute(array('ID' => $tID));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function assigneBrief(int $breifID, int $sID)
    {
        $query = $this->pdo->prepare("INSERT INTO REALISER VALUES(:stID, :bID, 'TODO', 'unset', NOW(), NOW())");
        return $query->execute(array('bID'=>$breifID, 'stID' => $sID));
    }
}
