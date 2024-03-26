<?
require_once 'models/repository/authorManager.class.php';
class author extends authorManager{

    public $_author_title;
    public $_record_id;

    // Producteur
    public function setAuthors($authors, $recordId) {
        $authors = explode(";", $authors);
        foreach ($authors as $author) {
          // Check if author exists (avoid unnecessary null/0/1 check)
          if (!is_null($author) && trim($author) !== "") {
            if (!$this->authorExists($author)) {
            
            // Insert author if not found
              $stmt = $this->getCnx()->prepare("INSERT INTO author (author_name) VALUES (:author)");
              $stmt->bindValue(':author', $author, PDO::PARAM_STR);
              $stmt->execute();
            }
            
            // Get author ID (one query instead of nested ones)
            $authorId = $this->getAuthorIdByName($author);
            
            // Link author to record
            $stmt = $this->getCnx()->prepare("INSERT INTO record_author (record_id, author_id) VALUES (:recordId, :authorId)");
            $stmt->bindValue(':recordId', $recordId, PDO::PARAM_INT);
            $stmt->bindValue(':authorId', $authorId, PDO::PARAM_INT);
            $stmt->execute();
          }
        }
      }
      

    public function getAuthorIdByName($name) {
        $stmt = $this->getCnx()->prepare("SELECT author_id FROM author WHERE author_name = ?");
        $stmt->execute([$name]);
        $authorId = $stmt->fetchColumn();
        return $authorId ?: null; 
      }
    
    public function authorExists($authorName) {
            $stmt = $this->getCnx()->prepare("SELECT COUNT(*) FROM author WHERE author_name = ?");
            $stmt->execute([$authorName]);
            return $stmt->fetchColumn() > 0;
        }
    public function getAuthors($recordId) {
            $stmt = $this->getCnx()->prepare("SELECT author_id FROM record_author WHERE record_id = ?");
            $stmt->execute([$recordId]);
            $authors = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $authors;
        }
    



}
?>