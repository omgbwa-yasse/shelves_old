<?php

require_once 'models/connexion.class.php';
class authors extends connexion{



public function setAuthors($authors, $recordId) {

    $authorsList = explode(';', $authors);

    foreach ($authorsList as $author) {
        $authorId = $this->authorExists($author);
        if (!$authorId) {
            $authorId = $this->addAuthor($author);
        }
        $this->linkAuthorToRecord($authorId, $recordId);
    }
}


private function authorExists($author) {

    $sql = "SELECT author_id FROM author WHERE author_name = :author";
    $stmt = $this->getCnx()->prepare($sql);
    $stmt->bindValue(':author', $author);
    $stmt->execute();

    $result = $stmt->fetch();

    return $result ? $result['author_id'] : false;
}


public function addAuthor($author) {

    $sql = "INSERT INTO author (author_name) VALUES (:author)";
    $stmt = $this->getCnx()->prepare($sql);
    $stmt->bindValue(':author', $author);
    $stmt->execute();
    return $this->getCnx()->lastInsertId();
}


private function linkAuthorToRecord($authorId, $recordId) {

    $sql = "INSERT INTO record_author (author_id, record_id) VALUES (:authorId, :recordId)";
    $stmt = $this->getCnx()->prepare($sql);
    $stmt->bindValue(':authorId', $authorId);
    $stmt->bindValue(':recordId', $recordId);
    $stmt->execute();
}

public function getAuthors($associatedRecordId) {
      $sql = "SELECT authors.name AS author_name
              FROM authors
              INNER JOIN author_record ON authors.author_id = author_record.author_id
              WHERE author_record.record_id = :recordId";
      $stmt = $this->getCnx()->prepare($sql);
      $stmt->bindValue(':recordId', $associatedRecordId);
      $stmt->execute();
      $authors = $stmt->fetchAll(PDO::FETCH_COLUMN);
  
      return $authors;
  }





}




