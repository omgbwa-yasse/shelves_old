<?php
require_once 'models/connexion.class.php';
class transferManager extends connexion{


public function allTransfer(){
        $stmt = $this->getCnx()->prepare("SELECT transfer_id as id FROM transfer");
        $stmt->execute($stmt);
        $stmt->fetch(PDO::FETCH_ASSOC);
        return $stmt;
}

public function allTransferOfYear($year)
{
        $stmt = $this->getCnx()->prepare("SELECT transfer_id as id FROM transfer WHERE date =:year");
        $stmt->execute(['year' => $year]);
        $transferIds = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $transferIds;
}

public function transferIdsBetweenDates($start_date, $end_date)
{
    $stmt = $this->getCnx()->prepare("SELECT transfer_id as id FROM transfer WHERE date >= :start_date AND date <= :end_date");
    $stmt->execute(['start_date' => $start_date, 'end_date' => $end_date]);
    $transferIds = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $transferIds;
}

public function transferIdsByStatus($status)
{
    $stmt = $this->getCnx()->prepare("SELECT transfer_id as id FROM transfer WHERE status = :status");
    $stmt->execute(['status' => $status]);
    $transferIds = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $transferIds;
}

public function transferIdsByTitle($keyword)
{
    $stmt = $this->getCnx()->prepare("SELECT transfer_id as id FROM transfer WHERE transfer_title LIKE :keyword");
    $stmt->execute(['keyword' => "%$keyword%"]);
    $transferIds = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $transferIds;
}



public function searchTransfersByPhrase($phrase)
{
    $words = preg_split('/[\s,]+/', $phrase);
    $keywords = array_filter($words, function ($word) {
        return strlen($word) > 2;
    });

    $stmt = $this->getCnx()->prepare("SELECT transfer_id as id, transfer_title FROM transfer WHERE transfer_title LIKE :keyword");
    $stmt->execute(['keyword' => '%' . implode('%', $keywords) . '%']);
    $transfers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $transfers;
}


public function searchTransfersDetailsByPhrase($phrase)
{
    $words = preg_split('/[\s,]+/', $phrase);
    $keywords = array_filter($words, function ($word) {
        return strlen($word) > 2;
    });

    $stmt = $this->getCnx()->prepare("SELECT producer_name, transfer_id as id, transfer_title, status FROM transfer WHERE transfer_title LIKE :keyword");
    $stmt->execute(['keyword' => '%' . implode('%', $keywords) . '%']);
    $transfers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $transfers;
}

}?>