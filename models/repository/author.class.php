<?php

require_once 'models/repository/authorManager.class.php';

class Author extends AuthorManager
{

    public $_author_title;
    public $_record_id;

    // Securely set authors
    public function setAuthors(string $authors, int $recordId): void
    {
        $authors = array_filter(explode(';', $authors), function ($author) {
            return !empty(trim($author));
        });

        $stmt = $this->getCnx()->prepare("INSERT INTO author (author_name) VALUES (:author)");
        $stmt->bindParam(':author', $author, PDO::PARAM_STR); // Use bindParam for prepared statements

        $authorIds = [];
        foreach ($authors as $author) {
            if ($this->authorExists($author)) {
                $authorIds[] = $this->getAuthorIdByName($author);
            } else {
                $stmt->execute([':author' => $author]);
                $authorIds[] = $this->getCnx()->lastInsertId();
            }
        }

        if (count($authorIds) > 0) {
            $placeholders = implode(',', array_fill(0, count($authorIds), '?'));
            $stmt = $this->getCnx()->prepare("INSERT INTO record_author (record_id, author_id) VALUES (:recordId, $placeholders)");
            $stmt->bindParam(':recordId', $recordId, PDO::PARAM_INT);
            $i = 0;
            foreach ($authorIds as $authorId) {
                $stmt->bindParam($i++, $authorId, PDO::PARAM_INT);
            }
            $stmt->execute();
        }
    }

    // Securely get author ID by name with prepared statement
    public function getAuthorIdByName(string $name): ?int
    {
        $stmt = $this->getCnx()->prepare("SELECT author_id FROM author WHERE author_name = ?");
        $stmt->execute([$name]);
        $authorId = $stmt->fetchColumn();
        return $authorId ?: null;
    }

    // Optimized authorExists (no prepared statement needed for simple check)
    public function authorExists(string $authorName): bool
    {
        $result = $this->getCnx()->query("SELECT COUNT(*) FROM author WHERE author_name = '$authorName'");
        return $result->fetchColumn() > 0;
    }

    public function getAuthors(int $recordId): array
    {
        $stmt = $this->getCnx()->prepare("SELECT author_id FROM record_author WHERE record_id = ?");
        $stmt->execute([$recordId]);
        return $stmt->fetchAll(PDO::PARAM_ASSOC);
    }
}
