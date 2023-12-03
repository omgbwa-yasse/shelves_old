<?php
require_once 'models/connexion.class.php';
class transferManager extends connexion{


public function allTransfer(){
    $stmt = $this->getCnx()->prepare("SELECT record_transfer_id as id FROM record_transfer");
    $stmt->execute();
    $stmt->fetch(PDO::FETCH_ASSOC);
    return $stmt;
}

public function lastTransfer(){
    $stmt = $this->getCnx()->prepare("SELECT record_transfer_id as id FROM record_transfer ORDER BY record_transfer_id DESC LIMIT 5");
    $stmt->execute();
    $stmt->fetch(PDO::FETCH_ASSOC);
    return $stmt;
}



public function transferByYear($annee)
{
    $stmt = $this->getCnx()->prepare("SELECT record_transfer_id as id FROM record_transfer WHERE record_transfer_date_authorize =:authorize");
    $stmt->execute(['authorize' => $annee]);
    $transferIds = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $transferIds;
}


public function transferByOrganization($organization)
{
    $stmt = $this->getCnx()->prepare("SELECT record_transfer_id as id FROM record_transfer WHERE organization_id =:organization");
    $stmt->execute(['organization' => $organization]);
    $transferIds = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $transferIds;
}


public function transferByStatusId(int $statusId)
{
    $stmt = $this->getCnx()->prepare("SELECT record_transfer_id as id FROM record_transfer WHERE record_transfer_status_id = :statut");
    $stmt->execute(['statut' => $statusId]);
    $transferIds = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $transferIds;
}


public function getAllTransferStatus()
{
    $stmt = $this->getCnx()->prepare("SELECT record_transfer_status_id as id FROM record_transfer_status");
    $stmt->execute();
    $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $stmt;
}

public function transferByKeyword($keyword)
{
    $stmt = $this->getCnx()->prepare("SELECT record_transfer_id as id FROM record_transfer WHERE record_transfer_title LIKE :keyword");
    $stmt->execute(['keyword' => "%$keyword%"]);
    $transferIds = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $transferIds;
}


public function transferByPhrase(string $phrase): array
{
    $words = preg_split('/[\s,]+/', $phrase);
    $keywords = array_map(function ($word) {
        return strlen($word) > 2;
    }, $words);
    $stmt = $this->getCnx()->prepare("SELECT record_transfer_id as id FROM record_transfer WHERE record_transfer_title LIKE :keywordsLikeClause");
    $stmt->execute(['keywordsLikeClause' => '%' . implode('%', $keywords) . '%']);
    $transfers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $transfers;
}


}?>